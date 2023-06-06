<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Utilisateurs
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-3">
                <a href="{{ route('users.create') }}" class="text-blue-500">Créer un utilisateur</a>
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date de naissance</th>
                            <th>Téléphone</th>
                            <th>Rôle</th>  
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                @if ($user->userData)
                                    <td>{{ $user->userData->nom }}</td>
                                    <td>{{ $user->userData->prenom }}</td>
                                    <td>{{ $user->userData->date_naissance }}</td>
                                    <td>{{ $user->userData->telephone }}</td>
                                    <td>{{ $user->getRole() }}</td>
                                @else
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                @endif
                                <td>
                                    <a href="{{ route('users.show', $user) }}">Voir</a>
                                    <a href="{{ route('users.edit', $user) }}">Modifier</a>
                                    <form class="inline-block" action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?');">
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
