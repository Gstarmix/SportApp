<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un abonnement') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <form method="POST" action="{{ route('suscriptions.store') }}" class="space-y-4">
                    @csrf

                    <div class="flex items-center">
                        <label for="user_id" class="w-48"><i class="fas fa-user mr-2"></i>Utilisateur</label>
                        <select id="user_id" name="user_id" class="p-2 bg-gray-700 rounded w-full input-black">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center">
                        <label for="license" class="w-48"><i class="fas fa-id-card mr-2"></i>Licence</label>
                        <input id="license" type="text" name="license" class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="accepted" class="w-48"><i class="fas fa-check-circle mr-2"></i>Accepté</label>
                        <input type="hidden" name="accepted" value="0">
                        <input id="accepted" type="checkbox" name="accepted" value="1" {{ old('accepted') == '1' ? 'checked' : '' }} class="p-2 bg-gray-700 rounded input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="member" class="w-48"><i class="fas fa-users mr-2"></i>Membre</label>
                        <input id="member" type="number" name="member" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="total_price" class="w-48"><i class="fas fa-dollar-sign mr-2"></i>Prix total</label>
                        <input id="total_price" type="number" step="0.01" name="total_price" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="payed" class="w-48"><i class="fas fa-money-bill-alt mr-2"></i>Paiement</label>
                        <input id="payed" type="number" step="0.01" name="payed" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="tarifs" class="w-48"><i class="fas fa-tags mr-2"></i>Tarifs</label>
                        <select id="tarifs" name="tarifs[]" multiple class="p-2 bg-gray-700 rounded w-full input-black">
                            @foreach($tarifs as $tarif)
                                <option value="{{ $tarif->id }}">{{ $tarif->nom }}</option>
                            @endforeach
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
