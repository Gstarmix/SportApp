<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier l\'utilisateur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <form method="POST" action="{{ route('users.update', $user) }}">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="name">Nom d'utilisateur</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}" required>
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}" required>
                    </div>

                    <div>
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" value="{{ $user->userData->nom }}" required>
                    </div>

                    <div>
                        <label for="prenom">Prenom</label>
                        <input type="text" id="prenom" name="prenom" value="{{ $user->userData->prenom }}" required>
                    </div>

                    <div>
                        <label for="date_naissance">Date de naissance</label>
                        <input type="date" id="date_naissance" name="date_naissance" value="{{ $user->userData->date_naissance }}" required>
                    </div>

                    <div>
                        <label for="telephone">Telephone</label>
                        <input type="text" id="telephone" name="telephone" value="{{ $user->userData->telephone }}" required>
                    </div>

                    <div>
                        <label for="role">Rôle</label>
                        <input type="text" id="role" name="role" value="{{ $user->getRole() }}" required>
                    </div>

                    <div>
                        <button type="submit">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>