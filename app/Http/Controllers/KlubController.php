<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use Illuminate\Http\Request;

class KlubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klubs = Klub::get();

        return view('klub.listKlub')->with(['klubs' => $klubs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('klub.addKlub');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:klubs,name',
            'city' => 'required'
        ]);

        Klub::create($request->all());

        return redirect()->route('klub.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Klub $klub)
    {
        return view('klub.showKlub', compact('klub'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Klub $klub)
    {
        return view('klub.editKlub', compact('klub'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Klub $klub)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required'
        ]);

        $klub->update($request->all());

        return redirect()->route('klub.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Klub $klub)
    {
        $klub->delete();

        return redirect()->route('klub.index');
    }
}
