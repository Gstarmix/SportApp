<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de l\'utilisateur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <p>Nom d'utilisateur: {{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>
                <p>Nom: {{ $user->userData->nom }}</p>
                <p>Prénom: {{ $user->userData->prenom }}</p>
                <p>Date de naissance: {{ $user->userData->date_naissance }}</p>
                <p>Téléphone: {{ $user->userData->telephone }}</p>
                <p>Rôle: {{ $user->role }}</p>
        <a href="{{ route('users.index') }}">Retour à la liste</a>
    </div>
</x-app-layout>