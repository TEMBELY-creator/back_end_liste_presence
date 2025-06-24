<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Etudiant;

class Etudiants extends Component
{
    use WithPagination;
    // Spécifiez explicitement le thème de pagination
    protected $paginationTheme = 'bootstrap';
    public $nom, $prenom, $date_naissance, $lieu_naissance,
    $sexe, $matricule_fseg, $matricule_cenou, $classe, $etudiant_id;
    public $search = '';
    protected $rules = [
        'nom'=> 'required',
        'prenom'=> 'required',
        'date_naissance'=> 'required',
        'lieu_naissance'=> 'required',
        'sexe'=> 'required',
        'matricule_fseg'=> 'required',
        'matricule_cenou'=> 'required',
        'classe'=> 'required',
    ];

    // Number of items per page
    public $perPage = 10;

    // Reset pagination when searching
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // List students with pagination and sorting
        $etudiants = Etudiant::orderBy('nom')
            ->orderBy('prenom')
            ->paginate($this->perPage);

        return view('livewire.etudiants', [
        'etudiants' => Etudiant::when($this->search, function($query) {
                $query->where('nom', 'like', '%'.$this->search.'%')
                      ->orWhere('prenom', 'like', '%'.$this->search.'%');
            })
            ->orderBy('nom')
            ->orderBy('prenom')
            ->paginate($this->perPage)
    ]);
    }

    public function resetInputFields()
    {
        $this->nom = null;
        $this->prenom = null;
        $this->date_naissance = null;
        $this->lieu_naissance = null;
        $this->sexe = null;
        $this->matricule_fseg = null;
        $this->matricule_cenou = null;
        $this->classe = null;
        $this->etudiant_id = null;
    }

    public function store()
    {
        $this->validate();
        Etudiant::create([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'date_naissance' => $this->date_naissance,
            'lieu_naissance' => $this->lieu_naissance,
            'sexe' => $this->sexe,
            'matricule_fseg' => $this->matricule_fseg,
            'matricule_cenou' => $this->matricule_cenou,
            'classe' => $this->classe
        ]);

        session()->flash('message', 'Étudiant ajouté avec succès !');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $this->etudiant_id = $id;
        $this->nom = $etudiant->nom;
        $this->prenom = $etudiant->prenom;
        $this->date_naissance = $etudiant->date_naissance;
        $this->lieu_naissance = $etudiant->lieu_naissance;
        $this->sexe = $etudiant->sexe;
        $this->matricule_fseg = $etudiant->matricule_fseg;
        $this->matricule_cenou = $etudiant->matricule_cenou;
        $this->classe = $etudiant->classe;

    }

    public function update()
    {
        $this->validate([
            'nom' => 'required|min:2',
            'prenom' => 'required|min:2',
            'date_naissance' => 'required',
            'lieu_naissance' => 'required',
            'sexe' => 'required',
            'matricule_fseg' => 'required',
            'matricule_cenou' => 'required',
            'classe' => 'required',
        ]);

        $etudiant = Etudiant::find($this->etudiant_id);
        $etudiant->update([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'date_naissance' => $this->date_naissance,
            'lieu_naissance' => $this->lieu_naissance,
            'sexe' => $this->sexe,
            'matricule_fseg' => $this->matricule_fseg,
            'matricule_cenou' => $this->matricule_cenou,
            'classe' => $this->classe
        ]);

        session()->flash('message', 'Mise à jour réussie !');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Etudiant::find($id)->delete();
        session()->flash('message', 'Étudiant supprimé !');
    }
}
