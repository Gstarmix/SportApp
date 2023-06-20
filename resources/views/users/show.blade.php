<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de l\'utilisateur') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <p class="mb-2"><i class="fas fa-user mr-2"></i><strong>Nom d'utilisateur:</strong> {{ $user->name }}</p>
                <p class="mb-2"><i class="fas fa-envelope mr-2"></i><strong>Email:</strong> {{ $user->email }}</p>
                <p class="mb-2"><i class="fas fa-address-card mr-2"></i><strong>Nom:</strong> {{ $user->userData->nom ?? '-' }}</p>
                <p class="mb-2"><i class="fas fa-address-card mr-2"></i><strong>Prénom:</strong> {{ $user->userData->prenom ?? '-' }}</p>
                <p class="mb-2"><i class="fas fa-birthday-cake mr-2"></i><strong>Date de naissance:</strong> {{ $user->userData->date_naissance ?? '-' }}</p>
                <p class="mb-2"><i class="fas fa-phone mr-2"></i><strong>Téléphone:</strong> {{ $user->userData->telephone ?? '-' }}</p>
                <p class="mb-2"><i class="fas fa-user-tag mr-2"></i><strong>Rôle:</strong> {{ $user->getRole() }}</p>
                <a href="{{ route('users.index') }}" class="inline-block mt-4 py-2 px-4 text-white hover:text-gray-100 bg-blue-500 hover:bg-blue-600 rounded"><i class="fas fa-arrow-left mr-2"></i>Retour à la liste</a>
            </div>
        </div>
    </div>
</x-app-layout>
