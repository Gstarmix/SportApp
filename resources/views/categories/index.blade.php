<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Liste des catégories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Créer une catégorie</a>
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Âge minimum</th>
                            <th>Âge maximum</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->nom }}</td>
                                <td>{{ $category->age_min }}</td>
                                <td>{{ $category->age_max }}</td>
                                <td>
                                    <a href="{{ route('categories.show', $category) }}">Voir</a>
                                    <a href="{{ route('categories.edit', $category) }}">Modifier</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

