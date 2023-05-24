<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la catégorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div>
                    <form action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="nom">Nom :</label>
                            <input type="text" name="nom" id="nom" value="{{ $category->nom }}" required>
                        </div>

                        <div>
                            <label for="age_min">Âge minimum :</label>
                            <input type="number" name="age_min" id="age_min" value="{{ $category->age_min }}" required>
                        </div>

                        <div>
                            <label for="age_max">Âge maximum :</label>
                            <input type="number" name="age_max" id="age_max" value="{{ $category->age_max }}" required>
                        </div>

                        <div>
                            <button type="submit">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
