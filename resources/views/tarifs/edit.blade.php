<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le tarif') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <form action="{{ route('tarifs.update', $tarif->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="flex items-center">
                        <label for="nom" class="w-48"><i class="fas fa-user mr-2"></i>Nom</label>
                        <input type="text" id="nom" name="nom" value="{{ $tarif->nom }}" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="description" class="w-48"><i class="fas fa-address-card mr-2"></i>Description</label>
                        <textarea id="description" name="description" required class="p-2 bg-gray-700 rounded w-full input-black">{{ $tarif->description }}</textarea>
                    </div>

                    <div class="flex items-center">
                        <label for="price" class="w-48"><i class="fas fa-dollar-sign mr-2"></i>Prix</label>
                        <input type="number" id="price" name="price" value="{{ $tarif->price }}" step="0.01" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="obligatoire" class="w-48"><i class="fas fa-check-circle mr-2"></i>Obligatoire</label>
                        <select id="obligatoire" name="obligatoire" class="p-2 bg-gray-700 rounded w-full input-black">
                            <option value="1" {{ $tarif->obligatoire ? 'selected' : '' }}>Oui</option>
                            <option value="0" {{ !$tarif->obligatoire ? 'selected' : '' }}>Non</option>
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="py-2 px-4 text-white hover:text-gray-100 bg-blue-500 hover:bg-blue-600 rounded"><i class="fas fa-check mr-2"></i>Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
