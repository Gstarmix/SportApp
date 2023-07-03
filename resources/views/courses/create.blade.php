<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un cours') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <form method="POST" action="{{ route('courses.store') }}" class="space-y-4">
                    @csrf

                    <div class="flex items-center">
                        <label for="day_name" class="w-48"><i class="fas fa-calendar-day mr-2"></i>Jour</label>
                        <select id="day_name" name="day_name" class="p-2 bg-gray-700 rounded w-full input-black">
                            <option value="lundi">{{ __('Lundi') }}</option>
                            <option value="mardi">{{ __('Mardi') }}</option>
                            <option value="mercredi">{{ __('Mercredi') }}</option>
                            <option value="jeudi">{{ __('Jeudi') }}</option>
                            <option value="vendredi">{{ __('Vendredi') }}</option>
                            <option value="samedi">{{ __('Samedi') }}</option>
                            <option value="dimanche">{{ __('Dimanche') }}</option>
                        </select>
                    </div>

                    <div class="flex items-center">
                        <label for="start_time" class="w-48"><i class="fas fa-clock mr-2"></i>Heure de début</label>
                        <input id="start_time" type="time" name="start_time" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="end_time" class="w-48"><i class="fas fa-clock mr-2"></i>Heure de fin</label>
                        <input id="end_time" type="time" name="end_time" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="capacity" class="w-48"><i class="fas fa-users mr-2"></i>Capacité</label>
                        <input id="capacity" type="number" name="capacity" required class="p-2 bg-gray-700 rounded w-full input-black">
                    </div>

                    <div class="flex items-center">
                        <label for="category_id" class="w-48"><i class="fas fa-list-alt mr-2"></i>Catégorie</label>
                        <select id="category_id" name="category_id" class="p-2 bg-gray-700 rounded w-full input-black">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="py-2 px-4 text-white hover:text-gray-100 bg-blue-500 hover:bg-blue-600 rounded"><i class="fas fa-check mr-2"></i>Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
