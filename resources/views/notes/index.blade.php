<x-app-layout>
    <div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Liste des Notes</h1>

        <!-- Bouton Ajouter une note -->
        <div class="mb-4">
            <a href="{{ route('notes.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Ajouter une note
            </a>
        </div>

        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Étudiant</th>
                    <th class="border border-gray-300 px-4 py-2">EC</th>
                    <th class="border border-gray-300 px-4 py-2">Note</th>
                    <th class="border border-gray-300 px-4 py-2">Session</th>
                    <th class="border border-gray-300 px-4 py-2">Date d'Évaluation</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notes as $note)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $note->etudiant->nom }} {{ $note->etudiant->prenom }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $note->ec->nom }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $note->note }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ ucfirst($note->session) }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        {{ $note->date_evaluation }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('notes.edit', $note->id) }}" class="text-blue-500 hover:underline">Modifier</a>
                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>