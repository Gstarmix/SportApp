<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-3">
                <a href="{{ route('courses.create') }}" class="py-2 px-4 text-white hover:text-gray-100 bg-blue-500 hover:bg-blue-600 rounded"><i class="fas fa-plus-circle mr-2"></i>Ajouter un cours</a>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="border-b border-gray-600 p-2 text-left">Jour</th>
                            <th class="border-b border-gray-600 p-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td class="border-b border-gray-600 p-2 text-left">{{ $course->day_name }}</td>
                                <td class="border-b border-gray-600 p-2 text-left">
                                    <a href="{{ route('courses.show', $course) }}" class="text-blue-400 hover:text-blue-500 mr-4"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('courses.edit', $course) }}" class="text-yellow-400 hover:text-yellow-500 mr-4"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('courses.destroy', $course) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-500"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
