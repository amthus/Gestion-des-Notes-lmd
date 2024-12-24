<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\UE;

class UEController extends Controller
{
    public function index()
    {
        $ues = UE::all();
        return view('ues.index', compact('ues'));
    }
    
    public function create()
    {
        return view('ues.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:unites_enseignement,code',
            'nom' => 'required',
            'credits_ects' => 'required|integer|min:1|max:30',
            'semestre' => 'required|integer|min:1|max:6',
        ]);
    
        UE::create($request->all());
        return redirect()->route('ues.index')->with('success', 'UE créée avec succès');
    }

        public function show(UE $ue)
        {
            return view('ues.show', compact('ue'));
        }
    
        public function edit(UE $ue)
        {
            return view('ues.edit', compact('ue'));
        }
    
        public function update(Request $request, UE $ue)
        {
            $request->validate([
                'code' => 'required|unique:unites_enseignement,code,' . $ue->id,
                'nom' => 'required',
                'credits_ects' => 'required|integer',
                'semestre' => 'required|integer|min:1|max:6',
            ]);
    
            $ue->update($request->all());
    
            return redirect()->route('ues.index')->with('success', 'UE mise à jour avec succès');
        }
    
        public function destroy(UE $ue)
        {
            $ue->delete();
    
            return redirect()->route('ues.index')->with('success', 'UE supprimée avec succès');
        }
    
}
