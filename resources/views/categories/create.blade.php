<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une catégorie') }}
        </h2>
    </x-slot>

    <div>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" required>
            </div>

            <div>
                <label for="age_min">Âge minimum :</label>
                <input type="number" name="age_min" id="age_min" required>
            </div>

            <div>
                <label for="age_max">Âge maximum :</label>
                <input type="number" name="age_max" id="age_max" required>
            </div>

            <div>
                <button type="submit">Créer</button>
            </div>
        </form>
    </div>
</x-app-layout>
