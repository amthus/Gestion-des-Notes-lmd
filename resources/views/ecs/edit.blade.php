<!-- resources/views/ecs/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier l'élément constitutif (EC) : {{ $ec->nom }}</h1>

        <form action="{{ route('ecs.update', $ec->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" name="code" class="form-control" id="code" value="{{ $ec->code }}" required>
            </div>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" value="{{ $ec->nom }}" required>
            </div>

            <div class="form-group">
                <label for="credits_ects">Crédits ECTS</label>
                <input type="number" name="credits_ects" class="form-control" id="credits_ects" value="{{ $ec->credits_ects }}" required>
            </div>

            <div class="form-group">
                <label for="ue_id">UE Associée</label>
                <select name="ue_id" class="form-control" id="ue_id" required>
                    @foreach($ues as $ue)
                        <option value="{{ $ue->id }}" {{ $ue->id == $ec->ue_id ? 'selected' : '' }}>{{ $ue->nom }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-warning mt-3">Mettre à jour</button>
        </form>
    </div>
@endsection
