<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    // Méthode pour afficher le formulaire de création
    public function create()
    {
        return view('etudiants.create');
    }

    // Méthode pour enregistrer un étudiant
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'numero_etudiant' => 'required|unique:etudiants,numero_etudiant',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'niveau' => 'required|string|max:255',
        ]);

        // Créer un étudiant dans la base de données
        Etudiant::create($validated);

        // Retourner à la page de création avec un message de succès
        return redirect()->route('etudiants.create')->with('success', 'Étudiant ajouté avec succès !');
    }
}
