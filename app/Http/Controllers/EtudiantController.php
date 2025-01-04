<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all();

        return view('etudiants.index', compact('etudiants'));
    }
    public function create()
    {
        return view('etudiants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_etudiant' => 'required|unique:etudiants|numeric',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'niveau' => 'required|string|max:255',
        ]);

        Etudiant::create($validated);

        return redirect()->route('etudiants.index')->with('success', 'Étudiant ajouté avec succès');
    }

    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiants.edit', compact('etudiant'));
    }

    public function update(Request $request, $id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->update($request->all());

        return redirect()->route('etudiants.index')->with('success', 'Étudiant mis à jour avec succès!');
    }

    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();

        return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé avec succès!');
    }
}
