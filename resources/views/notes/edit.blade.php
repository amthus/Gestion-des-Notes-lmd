<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Modifier la note</h1>

        <form action="{{ route('notes.update', $note->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="etudiant_id" class="block text-sm font-medium text-gray-700">Étudiant</label>
                <select name="etudiant_id" id="etudiant_id" class="mt-1 block w-full rounded-md" required>
                    @foreach ($etudiants as $etudiant)
                    <option value="{{ $etudiant->id }}" {{ $note->etudiant_id == $etudiant->id ? 'selected' : '' }}>
                        {{ $etudiant->nom }} {{ $etudiant->prenom }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="ec_id" class="block text-sm font-medium text-gray-700">EC</label>
                <select name="ec_id" id="ec_id" class="mt-1 block w-full rounded-md" required>
                    @foreach ($ecs as $ec)
                    <option value="{{ $ec->id }}" {{ $note->ec_id == $ec->id ? 'selected' : '' }}>
                        {{ $ec->nom }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                <input type="number" name="note" id="note" value="{{ $note->note }}" class="mt-1 block w-full" min="0" max="20" step="0.25" required>
            </div>

            <div>
                <label for="session" class="block text-sm font-medium text-gray-700">Session</label>
                <select name="session" id="session" class="mt-1 block w-full" required>
                    <option value="normale" {{ $note->session == 'normale' ? 'selected' : '' }}>Normale</option>
                    <option value="rattrapage" {{ $note->session == 'rattrapage' ? 'selected' : '' }}>Rattrapage</option>
                </select>
            </div>

            <div>
                <label for="date_evaluation" class="block text-sm font-medium text-gray-700">Date_evaluation</label>
                <input type="date" name="date_evaluation" id="date_evaluation" value="{{ $note->date_evaluation }}" class="mt-1 block w-full" min="0" max="20" step="0.25" required>
            </div>

            <button type="submit" class="btn btn-warning mt-3 bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">
                Enregistrer les modifications
            </button>
        </form>
    </div>
</x-app-layout>