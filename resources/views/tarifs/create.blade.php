<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un nouveau tarif') }}
        </h2>
    </x-slot>

    <div>
        <form action="{{ route('tarifs.store') }}" method="POST">
            @csrf

            <div>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>

            <div>
                <label for="description">Description :</label>
                <textarea id="description" name="description" required></textarea>
            </div>

            <div>
                <label for="price">Prix :</label>
                <input type="number" id="price" name="price" step="0.01" required>
            </div>

            <div>
                <label for="obligatoire">Obligatoire :</label>
                <select id="obligatoire" name="obligatoire">
                    <option value="1">Oui</option>
                    <option value="0">Non</option>
                </select>
            </div>

            <div>
                <button type="submit">Créer</button>
            </div>
        </form>
    </div>
</x-app-layout>
