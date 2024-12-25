<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-4">Modifier l'élément constitutif (EC) : {{ $ec->nom }}</h1>

                    <form action="{{ route('ecs.update', $ec->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
                            <input type="text" name="code" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="code" value="{{ $ec->code }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" name="nom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="nom" value="{{ $ec->nom }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="credits_ects" class="block text-sm font-medium text-gray-700">Crédits ECTS</label>
                            <input type="number" name="credits_ects" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="credits_ects" value="{{ $ec->credits_ects }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="ue_id" class="block text-sm font-medium text-gray-700">UE Associée</label>
                            <select name="ue_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="ue_id" required>
                                @foreach($ues as $ue)
                                    <option value="{{ $ue->id }}" {{ $ue->id == $ec->ue_id ? 'selected' : '' }}>{{ $ue->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="mt-3 bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
