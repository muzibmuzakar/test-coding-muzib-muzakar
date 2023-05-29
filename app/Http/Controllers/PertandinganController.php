<?php

namespace App\Http\Controllers;

use App\Models\Klasemen;
use App\Models\Klub;
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

        foreach ($request->inputs as $key => $data) {
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pertandingan $pertandingan)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pertandingan $pertandingan)
    {
        $score_home = $pertandingan->score_home;
        $score_away = $pertandingan->score_away;

        $timHome = Klasemen::where('klub_id', $pertandingan->id_klub_home)->first();
        $timAway = Klasemen::where('klub_id', $pertandingan->id_klub_away)->first();

        if ($timHome && $timAway) {
            if ($score_home > $score_away) {
                $timHome->point -= 3;
                $timHome->ma -= 1;
                $timHome->me -= 1;
                $timHome->gm -= $score_home;
                $timHome->gk -= $score_away;
                $timHome->save();

                $timAway->ma -= 1;
                $timAway->k -= 1;
                $timAway->gm -= $score_away;
                $timAway->gk -= $score_home;
                $timAway->save();
            } elseif ($score_home < $score_away) {
                $timAway->point -= 3;
                $timAway->ma -= 1;
                $timAway->me -= 1;
                $timAway->gm -= $score_away;
                $timAway->gk -= $score_home;
                $timAway->save();

                $timHome->ma -= 1;
                $timHome->k -= 1;
                $timHome->gm -= $score_home;
                $timHome->gk -= $score_away;
                $timHome->save();
            } elseif ($score_home == $score_away) {
                $timHome->point -= 1;
                $timHome->ma -= 1;
                $timHome->s -= 1;
                $timHome->gm -= $score_home;
                $timHome->gk -= $score_away;
                $timHome->save();

                $timAway->point -= 1;
                $timAway->ma -= 1;
                $timAway->s -= 1;
                $timAway->gm -= $score_away;
                $timAway->gk -= $score_home;
                $timAway->save();
            }
        }

        $pertandingan->delete();

        return redirect()->back();
    }
}
