<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Éditer l'étudiant</h1>

        @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="numero_etudiant" class="block text-sm font-medium text-gray-700">Numéro d'étudiant</label>
                <input type="text" name="numero_etudiant" id="numero_etudiant" value="{{ $etudiant->numero_etudiant }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" name="nom" id="nom" value="{{ $etudiant->nom }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <div>
                <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                <input type="text" name="prenom" id="prenom" value="{{ $etudiant->prenom }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <div>
                <label for="niveau" class="block text-sm font-medium text-gray-700">Niveau</label>
                <input type="text" name="niveau" id="niveau" value="{{ $etudiant->niveau }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <button type="submit" class="btn btn-success mt-3 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Mettre à jour
            </button>
        </form>
    </div>
</x-app-layout>