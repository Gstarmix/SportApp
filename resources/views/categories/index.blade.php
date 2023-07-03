<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Liste des catégories') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Auth::user()->role == \App\Models\User::ROLE_ADMIN)
                <div class="mb-3">
                    <a href="{{ route('categories.create') }}" class="py-2 px-4 text-white hover:text-gray-100 bg-blue-500 hover:bg-blue-600 rounded"><i class="fas fa-plus-circle mr-2"></i>Créer une catégorie</a>
                </div>
            @endif
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="border-b border-gray-600 p-2 text-left">Nom</th>
                            <th class="border-b border-gray-600 p-2 text-left">Âge minimum</th>
                            <th class="border-b border-gray-600 p-2 text-left">Âge maximum</th>
                            @if(Auth::user()->role == \App\Models\User::ROLE_ADMIN)
                                <th class="border-b border-gray-600 p-2 text-left">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td class="border-b border-gray-600 p-2 text-left">{{ $category->nom }}</td>
                                <td class="border-b border-gray-600 p-2 text-left">{{ $category->age_min }}</td>
                                <td class="border-b border-gray-600 p-2 text-left">{{ $category->age_max }}</td>
                                @if(Auth::user()->role == \App\Models\User::ROLE_ADMIN)
                                    <td class="border-b border-gray-600 p-2 text-left">
                                        <a href="{{ route('categories.show', $category) }}" class="text-blue-400 hover:text-blue-500 mr-4"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('categories.edit', $category) }}" class="text-yellow-400 hover:text-yellow-500 mr-4"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-block">
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
