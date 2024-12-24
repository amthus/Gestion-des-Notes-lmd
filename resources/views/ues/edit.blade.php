<!-- resources/views/ues/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier l'UE : {{ $ue->nom }}</h1>

        <form action="{{ route('ues.update', $ue->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" name="code" class="form-control" id="code" value="{{ $ue->code }}" required>
            </div>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" value="{{ $ue->nom }}" required>
            </div>

            <div class="form-group">
                <label for="credits_ects">Crédits ECTS</label>
                <input type="number" name="credits_ects" class="form-control" id="credits_ects" value="{{ $ue->credits_ects }}" required>
            </div>

            <div class="form-group">
                <label for="semestre">Semestre</label>
                <input type="number" name="semestre" class="form-control" id="semestre" value="{{ $ue->semestre }}" required>
            </div>

            <button type="submit" class="btn btn-warning mt-3">Mettre à jour</button>
        </form>
    </div>
@endsection
