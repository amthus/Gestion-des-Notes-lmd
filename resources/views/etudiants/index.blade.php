<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-3xl font-extrabold text-gray-800">Liste des étudiants</h2>
                        <a href="{{ route('etudiants.create') }}"
                            class="bg-green-500 text-white px-6 py-2 rounded-md text-lg font-semibold hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Ajouter un étudiant
                        </a>
                    </div>

                    @if(session('success'))
                    <div id="success-message" class="bg-green-500 text-white px-4 py-2 rounded-md mb-4">
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
                                    <th class="py-3 px-6">Numéro</th>
                                    <th class="py-3 px-6">Nom</th>
                                    <th class="py-3 px-6">Prénom</th>
                                    <th class="py-3 px-6">Niveau</th>
                                    <th class="py-3 px-6">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($etudiants as $etudiant)
                                <tr class="hover:bg-gray-50 border-b">
                                    <td class="py-4 px-6 text-gray-800">{{ $etudiant->numero_etudiant }}</td>
                                    <td class="py-4 px-6 text-gray-800">{{ $etudiant->nom }}</td>
                                    <td class="py-4 px-6 text-gray-800">{{ $etudiant->prenom }}</td>
                                    <td class="py-4 px-6 text-gray-800">{{ $etudiant->niveau }}</td>
                                    <td class="py-4 px-6 flex items-center space-x-2">
                                        <!-- Bouton Voir la moyenne -->
                                        <a href="{{ route('notes.moyenne', $etudiant->id) }}"
                                            class="bg-yellow-500 text-white px-4 py-2 rounded-md text-xs font-medium hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                                            Voir la moyenne
                                        </a>

                                        <!-- Bouton Modifier -->
                                        <a href="{{ route('etudiants.edit', $etudiant->id) }}"
                                            class="bg-blue-500 text-white px-4 py-2 rounded-md text-xs font-medium hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            Modifier
                                        </a>

                                        <!-- Formulaire de suppression -->
                                        <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">
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