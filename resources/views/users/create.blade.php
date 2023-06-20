<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un utilisateur') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
                    @csrf

                    <div class="flex items-center">
                        <label for="name" class="w-48"><i class="fas fa-user mr-2"></i>Nom d'utilisateur</label>
                        <input type="text" id="name" name="name" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="email" class="w-48"><i class="fas fa-envelope mr-2"></i>Email</label>
                        <input type="email" id="email" name="email" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="nom" class="w-48"><i class="fas fa-address-card mr-2"></i>Nom</label>
                        <input type="text" id="nom" name="nom" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="prenom" class="w-48"><i class="fas fa-address-card mr-2"></i>Prénom</label>
                        <input type="text" id="prenom" name="prenom" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="date_naissance" class="w-48"><i class="fas fa-birthday-cake mr-2"></i>Date de naissance</label>
                        <input type="date" id="date_naissance" name="date_naissance" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="telephone" class="w-48"><i class="fas fa-phone mr-2"></i>Téléphone</label>
                        <input type="text" id="telephone" name="telephone" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div>
                        <button type="submit" class="py-2 px-4 text-white hover:text-gray-100 bg-blue-500 hover:bg-blue-600 rounded"><i class="fas fa-check mr-2"></i>Créer un utilisateur</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
