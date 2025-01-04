<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Ajouter un étudiant</h1>

        @if ($errors->any())
        <div id="error-message" class="bg-red-500 text-white px-4 py-2 rounded mb-2">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        <script>
            setTimeout(function() {
                document.getElementById('error-message').style.display = 'none';
            }, 2000);
        </script>
        @endif

        <form action="{{ route('etudiants.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="numero_etudiant" class="block text-sm font-medium text-gray-700">Numéro d'étudiant</label>
                <input type="text" name="numero_etudiant" id="numero_etudiant" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" name="nom" id="nom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <div>
                <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <div>
                <label for="niveau" class="block text-sm font-medium text-gray-700">Niveau</label>
                <input type="text" name="niveau" id="niveau" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <button type="submit" class="btn btn-success mt-3 bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                Ajouter
            </button>
        </form>
    </div>
</x-app-layout>