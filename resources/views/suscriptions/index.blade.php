<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Abonnements') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Auth::user()->role == \App\Models\User::ROLE_ADMIN)
                <div class="mb-3">
                    <a href="{{ route('suscriptions.create') }}" class="py-2 px-4 text-white hover:text-gray-100 bg-blue-500 hover:bg-blue-600 rounded"><i class="fas fa-plus-circle mr-2"></i>Créer une souscription</a>
                </div>
            @endif
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <div class="grid grid-cols-1 gap-4">
                    @foreach(Auth::user()->suscriptions as $suscription) <!-- a souvenir pour oim de ptetre virer Auth:user -->
                        <div class="border border-gray-600 p-4">
                            <p class="mb-2"><strong>ID:</strong> {{ $suscription->id }}</p>
                            <p class="mb-2"><strong>Utilisateur:</strong> {{ $suscription->user_id }}</p>
                            <p class="mb-2"><strong>Licence:</strong> {{ $suscription->license }}</p>
                            <p class="mb-2"><strong>Accepté:</strong> {{ $suscription->accepted ? 'Oui' : 'Non' }}</p>
                            <p class="mb-2"><strong>Membre:</strong> {{ $suscription->member }}</p>
                            <p class="mb-2"><strong>Prix total:</strong> {{ $suscription->total_price }}</p>
                            <p class="mb-2"><strong>Paiement:</strong> {{ $suscription->payed }}</p>
                            <p class="mb-2"><strong>Tarifs:</strong>
                                @foreach($suscription->tarifs as $tarif)
                                    {{ $tarif->nom }}
                                @endforeach
                            </p>
                            <div>
                                @if(Auth::user()->role == \App\Models\User::ROLE_ADMIN)
                                    <a href="{{ route('suscriptions.show', $suscription) }}" class="text-blue-400 hover:text-blue-500 mr-4"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('suscriptions.edit', $suscription) }}" class="text-yellow-400 hover:text-yellow-500 mr-4"><i class="fas fa-edit"></i></a>
                                    <form class="inline-block" action="{{ route('suscriptions.destroy', $suscription) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette souscription?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-500"><i class="fas fa-trash"></i></button>
                                    </form>
                                @endif
                            </<div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
