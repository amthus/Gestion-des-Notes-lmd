<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Unités d'Enseignement</h2>
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Nom</th>
                                <th>Crédits ECTS</th>
                                <th>Semestre</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ues as $ue)
                                <tr>
                                    <td>{{ $ue->code }}</td>
                                    <td>{{ $ue->nom }}</td>
                                    <td>{{ $ue->credits_ects }}</td>
                                    <td>S{{ $ue->semestre }}</td>
                                    <td>
                                        <!-- Ajouter des actions ici -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
