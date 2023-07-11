<div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
    <table class="w-full">
        <thead>
            <tr>
                <th class="border-b border-gray-600 p-2 text-left">Nom</th>
                <th class="border-b border-gray-600 p-2 text-left">Âge minimum</th>
                <th class="border-b border-gray-600 p-2 text-left">Âge maximum</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td class="border-b border-gray-600 p-2 text-left">{{ $category->nom }}</td>
                    <td class="border-b border-gray-600 p-2 text-left">{{ $category->age_min }}</td>
                    <td class="border-b border-gray-600 p-2 text-left">{{ $category->age_max }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
</div>

