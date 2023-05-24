<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails du tarif') }}
        </h2>
    </x-slot>

    <div>
        <p><strong>Nom:</strong> {{ $tarif->nom }}</p>
        <p><strong>Description:</strong> {{ $tarif->description }}</p>
        <p><strong>Prix:</strong> {{ $tarif->price }}</p>
        <p><strong>Obligatoire:</strong> {{ $tarif->obligatoire ? 'Oui' : 'Non' }}</p>
    </div>
</x-app-layout>
