<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-4">Modifier l'UE : {{ $ue->nom }}</h1>

                    <form action="{{ route('ues.update', $ue->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
                            <input type="text" name="code" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="code" value="{{ $ue->code }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" name="nom" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="nom" value="{{ $ue->nom }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="credits_ects" class="block text-sm font-medium text-gray-700">Crédits ECTS</label>
                            <input type="number" name="credits_ects" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="credits_ects" value="{{ $ue->credits_ects }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="semestre" class="block text-sm font-medium text-gray-700">Semestre</label>
                            <input type="number" name="semestre" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="semestre" value="{{ $ue->semestre }}" required>
                        </div>

                        <button type="submit" class="btn btn-warning mt-3 bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
