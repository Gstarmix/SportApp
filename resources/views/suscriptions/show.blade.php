<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Abonnement') }}
        </h2>
    </x-slot>

    <div>
        <p><strong>ID:</strong> {{ $suscription->id }}</p>
        <p><strong>Utilisateur:</strong> {{ $suscription->user_id }}</p>
        <p><strong>Licence:</strong> {{ $suscription->license }}</p>
        <p><strong>Accepté:</strong> {{ $suscription->accepted ? 'Oui' : 'Non' }}</p>
        <p><strong>Membre:</strong> {{ $suscription->member }}</p>
        <p><strong>Prix total:</strong> {{ $suscription->total_price }}</p>
        <p><strong>Paiement:</strong> {{ $suscription->payed }}</p>

        <!-- Tarifs -->
        <p><strong>Tarifs:</strong></p>
        <ul>
            @foreach($suscription->tarifs as $tarif)
                <li>{{ $tarif->nom }}</li>
            @endforeach
        </ul>

        <div>
            <a href="{{ route('suscriptions.edit', $suscription) }}">Modifier</a>
        </div>
    </div>
</x-app-layout>
