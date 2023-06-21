<x-app-layout>
    <x-slot name="header">
        @livewireStyles
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un abonnement') }}
        </h2>
    </x-slot>

    <div>
        <livewire:counter /> 
        @livewireScripts
    </div>
</x-app-layout>
