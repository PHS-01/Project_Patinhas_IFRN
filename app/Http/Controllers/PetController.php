<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pets = Pet::all();
        return view('pet.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Pet::create($request->all());

        return redirect('/dashboard')->with('success', 'Pet criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        //
        return view('pet.show', ['pet' => $pet]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        //
        return view('pet.edit', ['pet' => $pet]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        //
        $pet->update([
            'image' => $request->filled('image') ? $request->image : $pet->image,
            'name' => $request->filled('name') ? $request->name : $pet->name,
            'age' => $request->filled('age') ? $request->age : $pet->age,
            'breed' => $request->filled('breed') ? $request->breed : $pet->breed,
            'description' => $request->filled('description') ? $request->description : $pet->description,
            'health_status' => $request->filled('health_status') ? $request->health_status : $pet->health_status,
            'size' => $request->filled('size') ? $request->size : $pet->size,
            'gender' => $request->filled('gender') ? $request->gender : $pet->gender,
            'available_for_adoption' => $request->filled('available_for_adoption') ? $request->available_for_adoption : $pet->available_for_adoption,
        ]);

        return back()->with('success', 'Pet editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        //
        $pet->delete();

        return redirect('/dashboard')->with('success', 'Pet deletado com sucesso!');
    }
}
