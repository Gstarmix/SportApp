<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Abonnement') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <p class="mb-2"><i class="fas fa-id-card mr-2"></i><strong>ID:</strong> {{ $suscription->id }}</p>
                <p class="mb-2"><i class="fas fa-user mr-2"></i><strong>Utilisateur:</strong> {{ $suscription->user_id }}</p>
                <p class="mb-2"><i class="fas fa-id-card mr-2"></i><strong>Licence:</strong> {{ $suscription->license }}</p>
                <p class="mb-2"><i class="fas fa-check mr-2"></i><strong>Accepté:</strong> {{ $suscription->accepted ? 'Oui' : 'Non' }}</p>
                <p class="mb-2"><i class="fas fa-users mr-2"></i><strong>Membre:</strong> {{ $suscription->member }}</p>
                <p class="mb-2"><i class="fas fa-money-bill-alt mr-2"></i><strong>Prix total:</strong> {{ $suscription->total_price }}</p>
                <p class="mb-2"><i class="fas fa-money-check-alt mr-2"></i><strong>Paiement:</strong> {{ $suscription->payed }}</p>

                <p class="mb-2"><i class="fas fa-tags mr-2"></i><strong>Tarifs:</strong></p>
                <ul>
                    @foreach($suscription->tarifs as $tarif)
                        <li>{{ $tarif->nom }}</li>
                    @endforeach
                </ul>

                <div>
                    <a href="{{ route('suscriptions.edit', $suscription) }}" class="py-2 px-4 text-white hover:text-gray-100 bg-blue-500 hover:bg-blue-600 rounded"><i class="fas fa-edit mr-2"></i>Modifier</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
