<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la catégorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="flex items-center">
                        <label for="nom" class="w-48"><i class="fas fa-heading mr-2"></i>Nom :</label>
                        <input type="text" name="nom" id="nom" value="{{ $category->nom }}" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="age_min" class="w-48"><i class="fas fa-sort-numeric-up mr-2"></i>Âge minimum :</label>
                        <input type="number" name="age_min" id="age_min" value="{{ $category->age_min }}" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="age_max" class="w-48"><i class="fas fa-sort-numeric-down mr-2"></i>Âge maximum :</label>
                        <input type="number" name="age_max" id="age_max" value="{{ $category->age_max }}" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div>
                        <button type="submit" class="py-2 px-4 text-white hover:text-gray-100 bg-blue-500 hover:bg-blue-600 rounded"><i class="fas fa-check mr-2"></i>Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
