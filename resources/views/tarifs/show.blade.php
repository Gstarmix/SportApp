<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails du tarif') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <p class="mb-2"><i class="fas fa-user mr-2"></i><strong>Nom :</strong> {{ $tarif->nom }}</p>
                <p class="mb-2"><i class="fas fa-envelope mr-2"></i><strong>Description :</strong> {{ $tarif->description }}</p>
                <p class="mb-2"><i class="fas fa-address-card mr-2"></i><strong>Prix :</strong> {{ $tarif->price }}</p>
                <p class="mb-2"><i class="fas fa-phone mr-2"></i><strong>Obligatoire :</strong> {{ $tarif->obligatoire ? 'Oui' : 'Non' }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
