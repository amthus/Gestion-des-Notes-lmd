<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EC;
use App\Models\UE;

class ECController extends Controller
{
    // Affiche la liste des ECs
    public function index()
    {
        $ecs = EC::all();
        return view('ecs.index', compact('ecs'));
    }

    // Affiche le formulaire pour créer un nouvel EC
    public function create()
    {
        $ues = UE::all(); // Pour lier un EC à une UE, on récupère les UEs
        return view('ecs.create', compact('ues'));
    }

    // Sauvegarde un nouvel EC
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:elements_constitutifs',
            'nom' => 'required',
            'coefficient' => 'required|integer',
            'ue_id' => 'required|exists:unites_enseignement,id',
        ]);

        EC::create($request->all());

        return redirect()->route('ecs.index')->with('success', 'EC créé avec succès');
    }

    // Affiche les détails d'un EC
    public function show(EC $ec)
    {
        return view('ecs.show', compact('ec'));
    }

    // Affiche le formulaire d'édition d'un EC
    public function edit(EC $ec)
    {
        $ues = UE::all(); // On récupère les UEs pour lier un EC à une UE
        return view('ecs.edit', compact('ec', 'ues'));
    }

    public function update(Request $request, EC $ec)
    {
        $request->validate([
            'code' => 'required|unique:elements_constitutifs,code,' . $ec->id,
            'nom' => 'required',
            'coefficient' => 'required|integer',
            'ue_id' => 'required|exists:unites_enseignement,id',
        ]);

        $ec->update($request->all());

        return redirect()->route('ecs.index')->with('success', 'EC mis à jour avec succès');
    }

    // Supprime un EC
    public function destroy(EC $ec)
    {
        $ec->delete();

        return redirect()->route('ecs.index')->with('success', 'EC supprimé avec succès');
    }}
