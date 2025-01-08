<x-app-layout>
    <div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Moyennes des UEs</h1>

        <div class="mb-4">
            <h2 class="text-xl font-semibold text-gray-700">Étudiant :</h2>
            <p class="text-lg text-gray-800">{{ $etudiant->nom }} {{ $etudiant->prenom }}</p>
        </div>

        <div class="mb-4">
            <h2 class="text-xl font-semibold text-gray-700 mb-3">Moyenne de l'étudiant par UE :</h2>
            <ul class="list-disc pl-6">
                @foreach ($moyennesParUE as $ue => $moyenne)
                <li>
                    <strong>{{ $ue }} :</strong> {{ number_format($moyenne, 2) }}
                </li>
                @endforeach
            </ul>
        </div>

        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700">Moyenne générale :</h2>
            <p class="text-lg">{{ number_format($moyenneGenerale, 2) }}</p>
        </div>

        <a href="{{ route('notes.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
            Retour à la liste des notes
        </a>
    </div>
</x-app-layout>