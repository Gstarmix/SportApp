<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier un abonnement') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <form method="POST" action="{{ route('suscriptions.update', $suscription) }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="flex items-center">
                        <label for="user_id" class="w-48"><i class="fas fa-user mr-2"></i>{{ __('Utilisateur') }}</label>
                        <select id="user_id" name="user_id" class="p-2 bg-gray-700 rounded w-full input-black">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $suscription->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center">
                        <label for="license" class="w-48"><i class="fas fa-id-card mr-2"></i>{{ __('Licence') }}</label>
                        <input id="license" type="text" name="license" value="{{ $suscription->license }}" class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="accepted" class="w-48"><i class="fas fa-check-square mr-2"></i>{{ __('Accepté') }}</label>
                        <input id="accepted" type="checkbox" name="accepted" {{ $suscription->accepted ? 'checked' : '' }} class="p-2 bg-gray-700 rounded input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="member" class="w-48"><i class="fas fa-users mr-2"></i>{{ __('Membre') }}</label>
                        <input id="member" type="number" name="member" required value="{{ $suscription->member }}" class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="total_price" class="w-48"><i class="fas fa-money-bill-alt mr-2"></i>{{ __('Prix total') }}</label>
                        <input id="total_price" type="number" step="0.01" name="total_price" required value="{{ $suscription->total_price }}" class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="payed" class="w-48"><i class="fas fa-money-check-alt mr-2"></i>{{ __('Paiement') }}</label>
                        <input id="payed" type="number" step="0.01" name="payed" required value="{{ $suscription->payed }}" class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="tarifs" class="w-48"><i class="fas fa-tags mr-2"></i>{{ __('Tarifs') }}</label>
                        <select id="tarifs" name="tarifs[]" multiple class="p-2 bg-gray-700 rounded w-full input-black">
                            @foreach($tarifs as $tarif)
                                <option value="{{ $tarif->id }}" {{ in_array($tarif->id, old('tarifs', $suscription->tarifs->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $tarif->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="py-2 px-4 text-white hover:text-gray-100 bg-blue-500 hover:bg-blue-600 rounded"><i class="fas fa-check mr-2"></i>{{ __('Modifier') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
