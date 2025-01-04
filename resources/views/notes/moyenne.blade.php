<x-app-layout>
    <div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Moyenne pour l'UE</h1>

        <div class="mb-4">
            <h2 class="text-xl font-semibold">Moyenne de l'étudiant : {{ number_format($moyenne, 2) }}</h2>
        </div>

        <a href="{{ route('notes.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
            Retour à la liste des notes
        </a>
    </div>
</x-app-layout>