<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Abonnements') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <a href="{{ route('suscriptions.create') }}">Ajouter une souscription</a>
            </div>
            <div>
                @foreach($suscriptions as $suscription)
                    <div>
                        <p><strong>ID:</strong> {{ $suscription->id }}</p>
                        <p><strong>Utilisateur:</strong> {{ $suscription->user_id }}</p>
                        <p><strong>Licence:</strong> {{ $suscription->license }}</p>
                        <p><strong>Accepté:</strong> {{ $suscription->accepted ? 'Oui' : 'Non' }}</p>
                        <p><strong>Membre:</strong> {{ $suscription->member }}</p>
                        <p><strong>Prix total:</strong> {{ $suscription->total_price }}</p>
                        <p><strong>Paiement:</strong> {{ $suscription->payed }}</p>
                        <p><strong>Tarifs:</strong>
                            <ul>
                            @foreach($suscription->tarifs as $tarif)
                                <li>{{ $tarif->nom }}</li>
                            @endforeach
                            </ul>
                        </p>
                        <div>
                            <a href="{{ route('suscriptions.show', $suscription) }}">Voir</a>
                            <a href="{{ route('suscriptions.edit', $suscription) }}">Modifier</a>
                            <form method="POST" action="{{ route('suscriptions.destroy', $suscription) }}" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Supprimer</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>