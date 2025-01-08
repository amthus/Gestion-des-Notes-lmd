<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-4">Créer un nouvel élément constitutif (EC)</h1>
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

                    <form action="{{ route('ecs.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
                            <input type="text" name="code" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="code" required>
                        </div>

                        <div class="mb-4">
                            <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" name="nom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="nom" required>
                        </div>

                        <div class="mb-4">
                            <label for="coefficient" class="block text-sm font-medium text-gray-700">Coefficient</label>
                            <input type="number" name="coefficient" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="coefficient" required>
                        </div>

                        <div class="mb-4">
                            <label for="ue_id" class="block text-sm font-medium text-gray-700">UE Associée</label>
                            <select name="ue_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" id="ue_id" required>
                                @foreach($ues as $ue)
                                <option value="{{ $ue->id }}">{{ $ue->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="mt-3 bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Créer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>