<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un abonnement') }}
        </h2>
    </x-slot>

    <div>
        <form method="POST" action="{{ route('suscriptions.store') }}">
            @csrf

            <!-- Champ d'utilisateur -->
            <div>
                <label for="user_id">Utilisateur :</label>
                <select id="user_id" name="user_id">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Champ de licence -->
            <div>
                <label for="license">Licence :</label>
                <input id="license" type="text" name="license" />
            </div>

            <!-- Champ d'acceptation -->
            <div>
                <label for="accepted">Accepté :</label>
                <input id="accepted" type="checkbox" name="accepted" />
            </div>

            <!-- Champ de membre -->
            <div>
                <label for="member">Membre :</label>
                <input id="member" type="number" name="member" required />
            </div>

            <!-- Champ de prix total -->
            <div>
                <label for="total_price">Prix total :</label>
                <input id="total_price" type="number" step="0.01" name="total_price" required />
            </div>

            <!-- Champ de paiement -->
            <div>
                <label for="payed">Paiement :</label>
                <input id="payed" type="number" step="0.01" name="payed" required />
            </div>

            <!-- Champ des tarifs -->
            <div>
                <label for="tarifs">Tarifs :</label>
                <select id="tarifs" name="tarifs[]" multiple>
                    @foreach($tarifs as $tarif)
                        <option value="{{ $tarif->id }}">{{ $tarif->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit">Créer</button>
            </div>
        </form>
    </div>
</x-app-layout>
