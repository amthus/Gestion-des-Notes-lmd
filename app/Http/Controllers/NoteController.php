<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\EC;
use App\Models\Note;

class NoteController extends Controller
{

    public function index()
    {
        $etudiants = Etudiant::all();
        $notes = Note::with(['etudiant', 'ec'])->get();

        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        $etudiants = Etudiant::all();
        $ecs = EC::all();

        return view('notes.create', compact('etudiants', 'ecs'));
    }

    public function edit(Note $note)
    {
        $etudiants = Etudiant::all();
        $ecs = EC::all();
        return view('notes.edit', compact('note', 'etudiants', 'ecs'));
    }


    public function update(Request $request, Note $note)
    {
        $validated = $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'ec_id' => 'required|exists:elements_constitutifs,id',
            'note' => 'required|numeric|min:0|max:20',
            'session' => 'required|in:normale,rattrapage',
            'date_evaluation' => 'required|date',
        ]);

        $note->update();

        return redirect()->route('notes.index')->with('success', 'Note mise à jour avec succès.');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'ec_id' => 'required|exists:elements_constitutifs,id',
            'note' => 'required|numeric|min:0|max:20',
            'session' => 'required|in:normale,rattrapage',
            'date_evaluation' => 'required|date',
        ]);

        Note::create($validated);

        return redirect()->route('notes.index')->with('success', 'Note ajoutée avec succès !');
    }


    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note supprimée avec succès.');
    }


    public function moyenneParUE($etudiant_id, $ue_id)
    {
        $moyenne = Note::moyenneParUE($etudiant_id, $ue_id);

        return view('notes.moyenne', compact('moyenne'));
    }

    public function afficherMoyennes($etudiant_id)
    {
        // Récupérer les informations de l'étudiant
        $etudiant = Etudiant::findOrFail($etudiant_id);

        // Récupérer les notes de l'étudiant
        $notes = Note::with('ec.ue')->where('etudiant_id', $etudiant_id)->get();

        // Calcul des moyennes par UE
        $moyennesParUE = [];
        $totalNotes = 0;
        $totalCoefficients = 0;

        foreach ($notes->groupBy('ec.ue_id') as $ueId => $notesParUE) {
            $ueNom = $notesParUE->first()->ec->ue->nom; // Récupérer le nom de l'UE
            $sommeNotesUE = 0;
            $sommeCoefficientsUE = 0;

            foreach ($notesParUE as $note) {
                $sommeNotesUE += $note->note * $note->ec->coefficient;
                $sommeCoefficientsUE += $note->ec->coefficient;
            }

            $moyennesParUE[$ueNom] = $sommeCoefficientsUE > 0 ? $sommeNotesUE / $sommeCoefficientsUE : 0;

            $totalNotes += $sommeNotesUE;
            $totalCoefficients += $sommeCoefficientsUE;
        }

        // Calcul de la moyenne générale
        $moyenneGenerale = $totalCoefficients > 0 ? $totalNotes / $totalCoefficients : 0;

        return view('notes.moyenne', compact('moyennesParUE', 'moyenneGenerale', 'etudiant'));
    }
}
