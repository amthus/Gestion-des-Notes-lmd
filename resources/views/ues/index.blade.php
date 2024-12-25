<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <!-- Titre -->
                        <h2 class="text-3xl font-extrabold text-gray-800">Unités d'Enseignement</h2>

                        <!-- Bouton Créer une UE -->
                        <a href="{{ route('ues.create') }}" 
                           class="bg-green-500 text-white px-6 py-2 rounded-md text-lg font-semibold hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Créer une UE
                        </a>
                    </div>

                    <div class="overflow-x-auto shadow rounded-lg">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100 text-left text-sm font-semibold text-gray-600 border-b">
                                    <th class="py-3 px-6">Code</th>
                                    <th class="py-3 px-6">Nom</th>
                                    <th class="py-3 px-6">Crédits ECTS</th>
                                    <th class="py-3 px-6">Semestre</th>
                                    <th class="py-3 px-6">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ues as $ue)
                                    <tr class="hover:bg-gray-50 border-b">
                                        <td class="py-4 px-6">{{ $ue->code }}</td>
                                        <td class="py-4 px-6">{{ $ue->nom }}</td>
                                        <td class="py-4 px-6">{{ $ue->credits_ects }}</td>
                                        <td class="py-4 px-6">S{{ $ue->semestre }}</td>
                                        <td class="py-4 px-6 flex items-center space-x-2">
                                            <!-- Modifier -->
                                            <a href="{{ route('ues.edit', $ue->id) }}" 
                                               class="bg-blue-500 text-white px-4 py-2 rounded-md text-xs font-medium hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                                Modifier
                                            </a>

                                            <!-- Supprimer -->
                                            <form action="{{ route('ues.destroy', $ue->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette unité ?');">
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
