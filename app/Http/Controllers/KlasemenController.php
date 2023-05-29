<?php

namespace App\Http\Controllers;

use App\Models\Klasemen;
use App\Models\Klub;
use App\Models\Pertandingan;
use Illuminate\Http\Request;

class KlasemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $klasemens = Pertandingan::klasemen();

        $klasemens = Klasemen::with('klub')
        ->orderBy('point', 'desc')
        ->orderByRaw('(gm - gk) DESC')
        ->get();

        return view('klasemen.klasemen')->with(['klasemens' => $klasemens]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klubs = Klub::all();

        return view('klasemen.addPeserta')->with(['klubs' => $klubs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'klub_id' => 'required|unique:klasemens,klub_id',
        ]);

        $selected_values = $request->input('klub_id');

        foreach ($selected_values as $value){
            klasemen::create([
                'klub_id' => $value
            ]);
        }

        return redirect()->route('klasemen.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Klasemen $klasemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Klasemen $klasemen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Klasemen $klasemen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Klasemen $klasemen)
    {
        //
    }
}
