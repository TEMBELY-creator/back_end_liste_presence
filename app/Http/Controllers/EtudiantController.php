<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Etudiant::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $etudiant =$request->validate([
            'nom'=>'required|max:255',
            'prenom'=>'required|max:255',
            'date_naissance'=>'required',
            'lieu_naissance'=>'required|max:255',
            'sexe'=>'required',
            'matricule_fseg'=>'required|max:255',
            'matricule_cenou'=>'required|max:255',
            'classe'=>'required',
            ]
        );
        return Etudiant::create($etudiant);
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        return Etudiant::find($etudiant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $et =$request->validate([
            'nom'=>'required|max:255',
            'prenom'=>'required|max:255',
            'date_naissance'=>'required',
            'lieu_naissance'=>'required|max:255',
            'sexe'=>'required',
            'matricule_fseg'=>'required|max:255',
            'matricule_cenou'=>'required|max:255',
            'classe'=>'required',
            ]
        );
        $etudiant->update($et);
        return $et;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return ['messaege'=> 'Etudiant supprimé avec succès'];
    }
}
