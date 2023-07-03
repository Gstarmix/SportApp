<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un nouveau tarif') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <form action="{{ route('tarifs.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div class="flex items-center">
                        <label for="nom" class="w-48"><i class="fas fa-tags mr-2"></i>Nom</label>
                        <input type="text" id="nom" name="nom" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="description" class="w-48"><i class="fas fa-align-left mr-2"></i>Description</label>
                        <textarea id="description" name="description" required class="p-2 bg-gray-700 rounded w-full input-black"></textarea>
                    </div>

                    <div class="flex items-center">
                        <label for="price" class="w-48"><i class="fas fa-dollar-sign mr-2"></i>Prix</label>
                        <input type="number" id="price" name="price" step="0.01" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="obligatoire" class="w-48"><i class="fas fa-check-circle mr-2"></i>Obligatoire</label>
                        <select id="obligatoire" name="obligatoire" class="p-2 bg-gray-700 rounded w-full input-black">
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="py-2 px-4 text-white hover:text-gray-100 bg-blue-500 hover:bg-blue-600 rounded"><i class="fas fa-check mr-2"></i>Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>