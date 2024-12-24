<!-- resources/views/ues/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Créer une nouvelle UE</h1>

        <form action="{{ route('ues.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" name="code" class="form-control" id="code" required>
            </div>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" required>
            </div>

            <div class="form-group">
                <label for="credits_ects">Crédits ECTS</label>
                <input type="number" name="credits_ects" class="form-control" id="credits_ects" required>
            </div>

            <div class="form-group">
                <label for="semestre">Semestre</label>
                <input type="number" name="semestre" class="form-control" id="semestre" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Créer</button>
        </form>
    </div>
@endsection
