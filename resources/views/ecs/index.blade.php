<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Éléments Constitutifs (EC)</h2>
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Nom</th>
                                <th>Crédits ECTS</th>
                                <th>UE Associée</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ecs as $ec)
                                <tr>
                                    <td>{{ $ec->code }}</td>
                                    <td>{{ $ec->nom }}</td>
                                    <td>{{ $ec->credits_ects }}</td>
                                    <td>{{ $ec->ue ? $ec->ue->nom : 'Non associé' }}</td>
                                    <td>
                                        <a href="{{ route('ecs.edit', $ec->id) }}" class="text-yellow-600 hover:text-yellow-800">Modifier</a>
                                        <form action="{{ route('ecs.destroy', $ec->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 ml-4">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('ecs.create') }}" class="mt-4 inline-block bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">Créer un nouvel EC</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
