<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un cours') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <form method="POST" action="{{ route('courses.store') }}">
                    @csrf

                    <div>
                        <label for="day_name">{{ __('Jour') }}</label>
                        <select id="day_name" name="day_name">
                            <option value="lundi">{{ __('Lundi') }}</option>
                            <option value="mardi">{{ __('Mardi') }}</option>
                            <option value="mercredi">{{ __('Mercredi') }}</option>
                            <option value="jeudi">{{ __('Jeudi') }}</option>
                            <option value="vendredi">{{ __('Vendredi') }}</option>
                            <option value="samedi">{{ __('Samedi') }}</option>
                            <option value="dimanche">{{ __('Dimanche') }}</option>
                        </select>
                    </div>

                    <div>
                        <label for="start_time">{{ __('Heure de début') }}</label>
                        <input id="start_time" type="time" name="start_time" required>
                    </div>

                    <div>
                        <label for="end_time">{{ __('Heure de fin') }}</label>
                        <input id="end_time" type="time" name="end_time" required>
                    </div>

                    <div>
                        <label for="capacity">{{ __('Capacité') }}</label>
                        <input id="capacity" type="number" name="capacity" required>
                    </div>

                    <div>
                        <label for="category_id">{{ __('Catégorie') }}</label>
                        <select id="category_id" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button type="submit">{{ __('Créer') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
