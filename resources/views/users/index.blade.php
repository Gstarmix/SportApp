<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Utilisateurs
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Auth::user()->role == \App\Models\User::ROLE_ADMIN)
                <div class="mb-3">
                    <a href="{{ route('users.create') }}" class="py-2 px-4 text-white hover:text-gray-100 bg-blue-500 hover:bg-blue-600 rounded"><i class="fas fa-user-plus mr-2"></i>Créer un utilisateur</a>
                </div>
            @endif
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="border-b border-gray-600 p-2 text-left">Nom</th>
                            <th class="border-b border-gray-600 p-2 text-left">Email</th>
                            <th class="border-b border-gray-600 p-2 text-left">Nom</th>
                            <th class="border-b border-gray-600 p-2 text-left">Prénom</th>
                            <th class="border-b border-gray-600 p-2 text-left">Date de naissance</th>
                            <th class="border-b border-gray-600 p-2 text-left">Téléphone</th>
                            <th class="border-b border-gray-600 p-2 text-left">Rôle</th>
                            @if(Auth::user()->role == \App\Models\User::ROLE_ADMIN)
                                <th class="border-b border-gray-600 p-2 text-left">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border-b border-gray-600 p-2 text-left">{{ $user->name }}</td>
                                <td class="border-b border-gray-600 p-2 text-left">{{ $user->email }}</td>
                                @if ($user->userData)
                                    <td class="border-b border-gray-600 p-2 text-left">{{ $user->userData->nom }}</td>
                                    <td class="border-b border-gray-600 p-2 text-left">{{ $user->userData->prenom }}</td>
                                    <td class="border-b border-gray-600 p-2 text-left">{{ $user->userData->date_naissance }}</td>
                                    <td class="border-b border-gray-600 p-2 text-left">{{ $user->userData->telephone }}</td>
                                    <td class="border-b border-gray-600 p-2 text-left">{{ $user->getRole() }}</td>
                                @else
                                    <td class="border-b border-gray-600 p-2 text-left">-</td>
                                    <td class="border-b border-gray-600 p-2 text-left">-</td>
                                    <td class="border-b border-gray-600 p-2 text-left">-</td>
                                    <td class="border-b border-gray-600 p-2 text-left">-</td>
                                    <td class="border-b border-gray-600 p-2 text-left">-</td>
                                @endif
                                @if(Auth::user()->role == \App\Models\User::ROLE_ADMIN)
                                    <td class="border-b border-gray-600 p-2 text-left">
                                        <a href="{{ route('users.show', $user) }}" class="text-blue-400 hover:text-blue-500 mr-4"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('users.edit', $user) }}" class="text-yellow-400 hover:text-yellow-500 mr-4"><i class="fas fa-edit"></i></a>
                                        <form class="inline-block" action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-500"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
