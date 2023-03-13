<?php

namespace App\Http\Controllers;

use App\Models\Klasemen;
use App\Models\Pertandingan;
use Illuminate\Http\Request;

class PertandinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pertandingans = Pertandingan::with('klub_home', 'klub_away')->get();

        return view('pertandingan.listPertandingan')->with(['pertandingans' => $pertandingans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klubs = Klasemen::all();
        return view('pertandingan.addPertandingan')->with(['klubs' => $klubs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'inputs.*.id_klub_home' => 'required',
            'inputs.*.id_klub_away' => 'required',
            'inputs.*.score_home' => 'required',
            'inputs.*.score_away' => 'required'
        ]);

        foreach ($request->inputs as $key => $data){
            Pertandingan::create($data);

            if ($data['score_home'] > $data['score_away']) {
                $timHome = Klasemen::where('klub_id', $data['id_klub_home'])->first();
                $timHome->update([
                    'point' => $timHome->point + 3,
                    'ma' => $timHome->ma + 1,
                    'me' => $timHome->me + 1,
                    'gm' => $timHome->gm + $data['score_home'],
                    'gk' => $timHome->gk + $data['score_away'],
                ]);

                $timAway = Klasemen::where('klub_id', $data['id_klub_away'])->first();
                $timAway->update([
                    'ma' => $timAway->ma + 1,
                    'k' => $timAway->k + 1,
                    'gm' => $timAway->gm + $data['score_away'],
                    'gk' => $timAway->gk + $data['score_home'],
                ]);
            } elseif ($data['score_home'] < $data['score_away']) {
                # code...
                $timHome = Klasemen::where('klub_id', $data['id_klub_home'])->first();
                $timHome->update([
                    'ma' => $timHome->ma + 1,
                    'k' => $timHome->k + 1,
                    'gm' => $timHome->gm + $data['score_home'],
                    'gk' => $timHome->gk + $data['score_away'],
                ]);

                $timAway = Klasemen::where('klub_id', $data['id_klub_away'])->first();
                $timAway->update([
                    'point' => $timAway->point + 3,
                    'ma' => $timAway->ma + 1,
                    'me' => $timAway->me + 1,
                    'gm' => $timAway->gm + $data['score_away'],
                    'gk' => $timAway->gk + $data['score_home'],
                ]);
            } elseif ($data['score_home'] == $data['score_away']) {
                # code...
                $timHome = Klasemen::where('klub_id', $data['id_klub_home'])->first();
                $timHome->update([
                    'point' => $timHome->point + 1,
                    'ma' => $timHome->ma + 1,
                    's' => $timHome->s + 1,
                    'gm' => $timHome->gm + $data['score_home'],
                    'gk' => $timHome->gk + $data['score_away'],
                ]);

                $timAway = Klasemen::where('klub_id', $data['id_klub_away'])->first();
                $timAway->update([
                    'point' => $timAway->point + 1,
                    'ma' => $timAway->ma + 1,
                    's' => $timAway->s + 1,
                    'gm' => $timAway->gm + $data['score_away'],
                    'gk' => $timAway->gk + $data['score_home'],
                ]);
            }
        }

        

        return redirect()->route('pertandingan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pertandingan $pertandingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pertandingan $pertandingan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pertandingan $pertandingan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pertandingan $pertandingan)
    {
        //
    }
}
