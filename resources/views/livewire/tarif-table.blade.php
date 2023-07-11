<div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="border-b border-gray-600 p-2 text-left">Nom</th>
                    <th class="border-b border-gray-600 p-2 text-left">Description</th>
                    <th class="border-b border-gray-600 p-2 text-left">Prix</th>
                    <th class="border-b border-gray-600 p-2 text-left">Obligatoire</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tarifs as $tarif)
                    <tr>
                        <td class="border-b border-gray-600 p-2 text-left">{{ isset($tarif->nom) ? $tarif->nom : '-' }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">{{ isset($tarif->description) ? $tarif->description : '-' }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">{{ isset($tarif->price) ? $tarif->price : '-' }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">{{ isset($tarif->obligatoire) ? ($tarif->obligatoire ? "Oui" : "Non") : "-" }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tarifs->links() }}
</div>

