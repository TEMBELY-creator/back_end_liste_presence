<div class="container">
    <h2 class="mb-3">Gestion des Étudiants</h2>

    {{-- <form wire:submit.prevent="{{ $etudiant_id ? 'update' : 'store' }}">
        <input type="text" wire:model="nom" placeholder="Nom" class="form-control mb-2">
        <input type="email" wire:model="email" placeholder="Email" class="form-control mb-2">
        <input type="text" wire:model="filiere" placeholder="Filière" class="form-control mb-2">
        <button class="btn btn-primary" type="submit">
            {{ $etudiant_id ? 'Modifier' : 'Ajouter' }}
        </button>
    </form>

    <hr> --}}

    @if (session()->has('message'))
        <div class="alert alert-success mt-2">{{ session('message') }}</div>
    @endif
    {{-- Recherche --}}
    <input type="text" wire:model.live="search" placeholder="Rechercher étudiants..." class="form-control mb-3">

    <table class="table table-responsive-sm table-light table-bordered table-striped table-hover">
        <caption>Liste des Étudiants</caption>
        <thead >
            <tr>
                <th>nom</th>
                <th>prenom</th>
                <th>date_naissance</th>
                <th>lieu_naissance</th>
                <th>sexe</th>
                <th>matricule_fseg</th>
                <th>matricule_cenou</th>
                <th>classe</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etudiants as $e)
                <tr>
                    {{-- mettre le nom en majuscule --}}
                    <td>{{ strtoupper($e->nom) }}</td>
                    <td>{{ $e->prenom }}</td>
                    <td>{{ $e->date_naissance }}</td>
                    <td>{{ $e->lieu_naissance }}</td>
                    <td>{{ $e->sexe }}</td>
                    <td>{{ $e->matricule_fseg }}</td>
                    <td>{{ $e->matricule_cenou }}</td>
                    <td>{{ $e->classe }}</td>

                    <td>
                        <button wire:click="edit({{ $e->id }})" class="btn btn-warning btn-sm">
                            <span class="fa fa-edit"></span>
                        </button>
                        <button wire:click="delete({{ $e->id }})"
                                class="btn btn-danger btn-sm"
                                title="Supprimer"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination links -->
    {{-- comment le centrer --}}

    <div class="m-4 d-flex justify-content-center">
        {{-- {{ $etudiants->links() }} --}}
         <!-- Ou pour forcer un style spécifique -->
        {{ $etudiants->links('livewire::bootstrap') }}
    </div>
</div>
