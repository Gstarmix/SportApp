<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Details') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <dl>
                    <div class="mb-2">
                        <dt><i class="fas fa-calendar-day mr-2"></i>Day Name:</dt>
                        <dd>{{ $course->day_name }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
