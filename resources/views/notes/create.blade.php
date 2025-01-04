<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Ajouter une note</h1>

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

        <form action="{{ route('notes.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="etudiant_id" class="block text-sm font-medium text-gray-700">Étudiant</label>
                <select name="etudiant_id" id="etudiant_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="">Sélectionner un étudiant</option>
                    @foreach($etudiants as $etudiant)
                    <option value="{{ $etudiant->id }}">{{ $etudiant->nom }} {{ $etudiant->prenom }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="ec_id" class="block text-sm font-medium text-gray-700">EC</label>
                <select name="ec_id" id="ec_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="">Sélectionner un EC</option>
                    @foreach($ecs as $ec)
                    <option value="{{ $ec->id }}">{{ $ec->code }} - {{ $ec->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                <input type="number" name="note" id="note" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" min="0" max="20" step="0.25" required>
            </div>

            <div>
                <label for="session" class="block text-sm font-medium text-gray-700">Session</label>
                <select name="session" id="session" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="normale">Session Normale</option>
                    <option value="rattrapage">Rattrapage</option>
                </select>
            </div>

            <div>
                <label for="date_evaluation" class="block text-sm font-medium text-gray-700">Date d'Évaluation</label>
                <input type="date" name="date_evaluation" id="date_evaluation"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <button type="submit" class="btn btn-success mt-3 bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                Créer
            </button>

        </form>
    </div>
</x-app-layout>