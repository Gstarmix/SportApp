<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le tarif') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <form action="{{ route('tarifs.update', $tarif->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="nom">Nom:</label>
                        <input type="text" id="nom" name="nom" value="{{ $tarif->nom }}" required>
                    </div>

                    <div>
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" required>{{ $tarif->description }}</textarea>
                    </div>

                    <div>
                        <label for="price">Prix:</label>
                        <input type="number" id="price" name="price" value="{{ $tarif->price }}" step="0.01" required>
                    </div>

                    <div>
                        <label for="obligatoire">Obligatoire:</label>
                        <select id="obligatoire" name="obligatoire">
                            <option value="1" {{ $tarif->obligatoire ? 'selected' : '' }}>Oui</option>
                            <option value="0" {{ !$tarif->obligatoire ? 'selected' : '' }}>Non</option>
                        </select>
                    </div>

                    <input type="submit" value="Modifier">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
