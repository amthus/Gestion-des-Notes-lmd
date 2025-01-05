<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Message principal -->
                    {{ __("You're logged in!") }}

                    <!-- Contenu supplémentaire -->
                    <div class="mt-6">
                        <h1 class="text-2xl font-bold mb-4">Bienvenue dans le système de gestion</h1>

                        <p class="text-gray-600 mb-6">
                            Gérez efficacement les UEs, ECs, les notes des étudiants et bien plus encore.
                        </p>

                        <!-- Liste des fonctionnalités -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Gestion des UEs -->
                            <div class="bg-gray-100 p-4 rounded-lg shadow">
                                <h3 class="text-lg font-semibold mb-2">Gestion des UEs</h3>
                                <p class="text-gray-700 mb-4">
                                    Créez, modifiez et gérez les Unités d'Enseignement (UEs).
                                </p>
                                <a href="{{ route('ues.index') }}" 
                                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    Accéder aux UEs
                                </a>
                            </div>

                            <!-- Gestion des ECs -->
                            <div class="bg-gray-100 p-4 rounded-lg shadow">
                                <h3 class="text-lg font-semibold mb-2">Gestion des ECs</h3>
                                <p class="text-gray-700 mb-4">
                                    Ajoutez, modifiez et gérez les Éléments Constitutifs (ECs).
                                </p>
                                <a href="{{ route('ecs.index') }}" 
                                   class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                    Accéder aux ECs
                                </a>
                            </div>

                            <!-- Gestion des Notes -->
                            <div class="bg-gray-100 p-4 rounded-lg shadow">
                                <h3 class="text-lg font-semibold mb-2">Gestion des Notes</h3>
                                <p class="text-gray-700 mb-4">
                                    Saisissez, modifiez et consultez les notes des étudiants.
                                </p>
                                <a href="{{ route('notes.index') }}" 
                                   class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                    Accéder aux Notes
                                </a>
                            </div>

                            <!-- Gestion des Étudiants -->
                            <div class="bg-gray-100 p-4 rounded-lg shadow">
                                <h3 class="text-lg font-semibold mb-2">Gestion des Étudiants</h3>
                                <p class="text-gray-700 mb-4">
                                    Gérez les informations des étudiants.
                                </p>
                                <a href="{{ route('etudiants.index') }}" 
                                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-purple-600">
                                    Accéder aux Étudiants
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
