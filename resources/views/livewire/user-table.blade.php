<div>
    <table class="w-full">
        <thead>
            <tr>
                <th class="border-b border-gray-600 p-2 text-left">Nom</th>
                <th class="border-b border-gray-600 p-2 text-left">Email</th>
                <th class="border-b border-gray-600 p-2 text-left">Nom</th>
                <th class="border-b border-gray-600 p-2 text-left">Prénom</th>
                <th class="border-b border-gray-600 p-2 text-left">Date de naissance</th>
                <th class="border-b border-gray-600 p-2 text-left">Téléphone</th>
                <th class="border-b border-gray-600 p-2 text-left">Rôle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="border-b border-gray-600 p-2 text-left">{{ isset($user->name) ? $user->name : "-" }}</td>
                    <td class="border-b border-gray-600 p-2 text-left">{{ isset($user->email) ? $user->email : "-"  }}</td>
                    <td class="border-b border-gray-600 p-2 text-left">{{ isset($user->nom) ? $user->nom : "-" }}</td>
                    <td class="border-b border-gray-600 p-2 text-left">{{ isset($user->prenom) ? $user->prenom : "-" }}</td>
                    <td class="border-b border-gray-600 p-2 text-left">{{ isset($user->date_naissance) ? $user->date_naissance : "-" }}</td>
                    <td class="border-b border-gray-600 p-2 text-left">{{ isset($user->telephone) ? $user->telephone : "-" }}</td>
                    <td class="border-b border-gray-600 p-2 text-left">{{ isset($user->role) ? $user->role : "-" }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
