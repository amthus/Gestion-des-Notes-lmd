<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-3xl font-extrabold text-gray-800">Liste des Notes</h1>
                        <a href="{{ route('notes.create') }}"
                            class="bg-green-500 text-white px-6 py-2 rounded-md text-lg font-semibold hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Ajouter une note
                        </a>
                    </div>

                    @if(session('success'))
                    <div id="success-message" class="bg-green-100 text-green-800 px-4 py-2 rounded-md mb-4">
                        {{ session('success') }}
                    </div>
                    <script>
                        setTimeout(function() {
                            document.getElementById('success-message').style.display = 'none';
                        }, 2000);
                    </script>
                    @endif

                    <div class="overflow-x-auto shadow rounded-lg">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100 text-left text-sm font-semibold text-gray-600 border-b">
                                    <th class="py-3 px-6">Étudiant</th>
                                    <th class="py-3 px-6">EC</th>
                                    <th class="py-3 px-6">Note</th>
                                    <th class="py-3 px-6">Session</th>
                                    <th class="py-3 px-6">Date d'Évaluation</th>
                                    <th class="py-3 px-6">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notes as $note)
                                <tr class="hover:bg-gray-50 border-b">
                                    <td class="py-4 px-6">{{ $note->etudiant->nom }} {{ $note->etudiant->prenom }}</td>
                                    <td class="py-4 px-6">{{ $note->ec->nom }}</td>
                                    <td class="py-4 px-6">{{ $note->note }}</td>
                                    <td class="py-4 px-6">{{ ucfirst($note->session) }}</td>
                                    <td class="py-4 px-6">{{ $note->date_evaluation }}</td>
                                    <td class="py-4 px-6 flex items-center space-x-2">
                                        <a href="{{ route('notes.edit', $note->id) }}"
                                            class="bg-blue-500 text-white px-4 py-2 rounded-md text-xs font-medium hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            Modifier
                                        </a>
                                        <!-- Supprimer -->
                                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette note ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white px-4 py-2 rounded-md text-xs font-medium hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                                Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>