<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier un abonnement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div>

                    <form method="POST" action="{{ route('suscriptions.update', $suscription) }}">
                        @csrf
                        @method('PUT')

                        <!-- Champ d'utilisateur -->
                        <div>
                            <label for="user_id">{{ __('Utilisateur') }}</label>
                            <select id="user_id" name="user_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $suscription->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Champ de licence -->
                        <div>
                            <label for="license">{{ __('Licence') }}</label>
                            <input id="license" type="text" name="license" value="{{ $suscription->license }}" />
                        </div>

                        <!-- Champ d'acceptation -->
                        <div>
                            <label for="accepted">{{ __('Accepté') }}</label>
                            <input id="accepted" type="checkbox" name="accepted" {{ $suscription->accepted ? 'checked' : '' }} />
                        </div>

                        <!-- Champ de membre -->
                        <div>
                            <label for="member">{{ __('Membre') }}</label>
                            <input id="member" type="number" name="member" required value="{{ $suscription->member }}" />
                        </div>

                        <!-- Champ de prix total -->
                        <div>
                            <label for="total_price">{{ __('Prix total') }}</label>
                            <input id="total_price" type="number" step="0.01" name="total_price" required value="{{ $suscription->total_price }}" />
                        </div>

                        <!-- Champ de paiement -->
                        <div>
                            <label for="payed">{{ __('Paiement') }}</label>
                            <input id="payed" type="number" step="0.01" name="payed" required value="{{ $suscription->payed }}" />
                        </div>

                        <!-- Champ des tarifs -->
                        <div>
                            <label for="tarifs">{{ __('Tarifs') }}</label>
                            <select id="tarifs" name="tarifs[]" multiple>
                                @foreach($tarifs as $tarif)
                                    <option value="{{ $tarif->id }}" {{ in_array($tarif->id, old('tarifs', $suscription->tarifs->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $tarif->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <button>{{ __('Modifier') }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
