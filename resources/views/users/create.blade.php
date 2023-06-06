<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un utilisateur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf

                    <div>
                        <label for="name">Nom d'utilisateur</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div>
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" required>
                    </div>

                    <div>
                        <label for="prenom">Prenom</label>
                        <input type="text" id="prenom" name="prenom" required>
                    </div>

                    <div>
                        <label for="date_naissance">Date de naissance</label>
                        <input type="date" id="date_naissance" name="date_naissance" required>
                    </div>

                    <div>
                        <label for="telephone">Telephone</label>
                        <input type="text" id="telephone" name="telephone" required>
                    </div>

                    <div>
                        <button type="submit">Créer un utilisateur</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
