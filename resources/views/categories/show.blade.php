<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de la catégorie') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <div class="mb-2">
                    <p><i class="fas fa-tags mr-2"></i><strong>Nom :</strong> {{ $category->nom }}</p>
                </div>
                <div class="mb-2">
                    <p><i class="fas fa-sort-numeric-up-alt mr-2"></i><strong>Âge minimum :</strong> {{ $category->age_min }}</p>
                </div>
                <div class="mb-2">
                    <p><i class="fas fa-sort-numeric-down-alt mr-2"></i><strong>Âge maximum :</strong> {{ $category->age_max }}</p>
                </div>
                <div class="mb-2">
                    <p><i class="fas fa-dumbbell mr-2"></i><strong>Sport :</strong> {{ $category->sport }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
