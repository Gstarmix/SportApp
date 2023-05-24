<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Liste des tarifs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Obligatoire</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tarifs as $tarif)
                            <tr>
                                <td>{{ $tarif->nom }}</td>
                                <td>{{ $tarif->description }}</td>
                                <td>{{ $tarif->price }}</td>
                                <td>{{ $tarif->obligatoire ? 'Oui' : 'Non' }}</td>
                                <td>
                                    <a href="{{ route('tarifs.show', $tarif->id) }}">Voir</a>
                                    <a href="{{ route('tarifs.edit', $tarif->id) }}">Modifier</a>
                                    <form action="{{ route('tarifs.destroy', $tarif->id) }}" method="POST" class="inline-block">
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
