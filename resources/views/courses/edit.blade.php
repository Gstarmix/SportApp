<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $course->exists ? 'Modifier un cours' : 'Créer un cours' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <form method="POST" action="{{ $course->exists ? route('courses.update', $course) : route('courses.store') }}" class="space-y-4">
                    @csrf
                    @if($course->exists) @method('PUT') @endif

                    <div class="flex items-center">
                        <label for="day_name" class="w-48"><i class="fas fa-calendar-day mr-2"></i>Day Name</label>
                        <select id="day_name" name="day_name" autocomplete="day_name" class="p-2 bg-gray-700 rounded w-full input-black">
                            <option value="lundi" {{ $course->day_name === 'lundi' ? 'selected' : '' }}>lundi</option>
                            <option value="mardi" {{ $course->day_name === 'mardi' ? 'selected' : '' }}>mardi</option>
                            <option value="mercredi" {{ $course->day_name === 'mercredi' ? 'selected' : '' }}>mercredi</option>
                            <option value="jeudi" {{ $course->day_name === 'jeudi' ? 'selected' : '' }}>jeudi</option>
                            <option value="vendredi" {{ $course->day_name === 'vendredi' ? 'selected' : '' }}>vendredi</option>
                            <option value="samedi" {{ $course->day_name === 'samedi' ? 'selected' : '' }}>samedi</option>
                            <option value="dimanche" {{ $course->day_name === 'dimanche' ? 'selected' : '' }}>dimanche</option>
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="py-2 px-4 text-white hover:text-gray-100 bg-blue-500 hover:bg-blue-600 rounded">
                            {{ $course->exists ? 'Mettre à jour' : 'Enregistrer' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
