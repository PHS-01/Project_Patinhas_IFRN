<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use Illuminate\Http\Request;
use App\Mail\AdoptionApproved;
use Illuminate\Support\Facades\Mail;

class AdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $adoptions = Adoption::all();
        return view('adoption.index', compact('adoptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'pet_id' => 'required|exists:pets,id',
            'status' => 'in:Pending,Approved,Denied'
        ]);

        $adoption = Adoption::create($request->all());
        return redirect('/pet')->with('success', 'Pedido de adoção enviada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Adoption $adoption)
    {
        //
        return view('adoption.show', ['adoption' => $adoption]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adoption $adoption)
    {
        //
        return view('adoption.edit', ['adoption' => $adoption]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adoption $adoption)
    {
        //
        $request->validate([
            'status' => 'in:Pending,Approved,Denied'
        ]);

        $adoption->update($request->all());

        if ($request->status === 'Approved') {
            Mail::to($adoption->user->email)->send(new AdoptionApproved($adoption));
        }

        return back()->with('success', 'Pedido de adoção editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adoption $adoption)
    {
        //
        $adoption->delete();

        return redirect('/adoption')->with('success', 'Pedido de adoção deletada com sucesso!');
    }
}
