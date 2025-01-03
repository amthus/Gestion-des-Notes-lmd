<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Éléments Constitutifs (EC)</h2>
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

                        <a href="{{ route('ecs.create') }}" 
                           class="bg-blue-600 text-white py-2 px-4 rounded-lg text-lg font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Créer un nouvel EC
                        </a>
                    </div>

                    <div class="overflow-x-auto shadow rounded-lg">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100 text-left text-sm font-semibold text-gray-600 border-b">
                                    <th class="py-3 px-6">Code</th>
                                    <th class="py-3 px-6">Nom</th>
                                    <th class="py-3 px-6">Coefficient</th>
                                    <th class="py-3 px-6">UE Associée</th>
                                    <th class="py-3 px-6">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ecs as $ec)
                                    <tr class="hover:bg-gray-50 border-b">
                                        <td class="py-4 px-6">{{ $ec->code }}</td>
                                        <td class="py-4 px-6">{{ $ec->nom }}</td>
                                        <td class="py-4 px-6">{{ $ec->coefficient }}</td>
                                        <td class="py-4 px-6">{{ $ec->ue ? $ec->ue->nom : 'Non associé' }}</td>
                                        <td class="py-4 px-6 flex items-center space-x-2">
                                            <!-- Modifier -->
                                            <a href="{{ route('ecs.edit', $ec->id) }}" 
                                               class="bg-yellow-500 text-white px-4 py-2 rounded-md text-xs font-medium hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                                                Modifier
                                            </a>

                                            <!-- Supprimer -->
                                            <form action="{{ route('ecs.destroy', $ec->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément constitutif ?');">
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
