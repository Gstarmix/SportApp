<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de la catégorie') }}
        </h2>
    </x-slot>

    <div>
        <p>Nom : {{ $category->nom }}</p>
        <p>Âge minimum : {{ $category->age_min }}</p>
        <p>Âge maximum : {{ $category->age_max }}</p>
        <p>Sport : {{ $category->sport }}</p>
    </div>
</x-app-layout>
