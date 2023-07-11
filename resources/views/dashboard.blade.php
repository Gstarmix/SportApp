<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Tableau de bord
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <div>
                    <p>{{ $welcomeMessage }}</p>
                </div>
                <h3 class="text-lg font-semibold text-white mt-6">Utilisateurs</h3>
                <livewire:user-table />
                <h3 class="text-lg font-semibold text-white mt-6">Tarifs</h3>
                <livewire:tarif-table />
                <h3 class="text-lg font-semibold mt-6">Catégories</h3>
                <livewire:categorie-table/>
            </div>
        </div>
    </div>
</x-app-layout>