<!-- resources/views/ecs/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Créer un nouvel élément constitutif (EC)</h1>

        <form action="{{ route('ecs.store') }}" method="POST">
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
                <label for="ue_id">UE Associée</label>
                <select name="ue_id" class="form-control" id="ue_id" required>
                    @foreach($ues as $ue)
                        <option value="{{ $ue->id }}">{{ $ue->nom }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">Créer</button>
        </form>
    </div>
@endsection
