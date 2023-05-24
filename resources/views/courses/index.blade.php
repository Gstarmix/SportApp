<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <a href="{{ route('courses.create') }}">Ajouter un cours</a>
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Jour</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $course->day_name }}</td>
                                <td>
                                    <a href="{{ route('courses.show', $course) }}">Voir</a>
                                    <a href="{{ route('courses.edit', $course) }}">Modifier</a>
                                    <form action="{{ route('courses.destroy', $course) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Supprimer</button>
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
