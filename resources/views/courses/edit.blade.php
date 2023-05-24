<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $course->exists ? 'Edit Course' : 'Create Course' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <form method="POST" action="{{ $course->exists ? route('courses.update', $course) : route('courses.store') }}">
                    @csrf
                    @if($course->exists) @method('PUT') @endif
                    <div>
                        <div>
                            <label for="day_name">Day Name</label>
                            <select id="day_name" name="day_name" autocomplete="day_name">
                                <option>lundi</option>
                                <option>mardi</option>
                                <option>mercredi</option>
                                <option>jeudi</option>
                                <option>vendredi</option>
                                <option>samedi</option>
                                <option>dimanche</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <button type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
