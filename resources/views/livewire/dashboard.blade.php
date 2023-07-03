<div>
    <p>{{ $welcomeMessage }}</p>
</div>
<!-- Utilisateurs -->
@if ($user->role <= App\Models\User::ROLE_ADMIN)
<h3 class="text-lg font-semibold text-white mt-6">Utilisateurs</h3>
<div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
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
                    <td class="border-b border-gray-600 p-2 text-left">{{ $user['name'] }}</td>
                    <td class="border-b border-gray-600 p-2 text-left">{{ $user['email'] }}</td>
                    @if (isset($user['userData']))
                        <td class="border-b border-gray-600 p-2 text-left">{{ $user['userData']['nom'] }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">{{ $user['userData']['prenom'] }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">{{ $user['userData']['date_naissance'] }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">{{ $user['userData']['telephone'] }}</td>
                    @else
                        <td class="border-b border-gray-600 p-2 text-left">-</td>
                        <td class="border-b border-gray-600 p-2 text-left">-</td>
                        <td class="border-b border-gray-600 p-2 text-left">-</td>
                        <td class="border-b border-gray-600 p-2 text-left">-</td>
                    @endif
                    <td class="border-b border-gray-600 p-2 text-left">{{ $user['role'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@if ($users instanceof \Illuminate\Pagination\LengthAwarePaginator)
    {{ $users->links() }}
@endif
@endif

<!-- Tarifs -->
@if ($user->role <= App\Models\User::ROLE_MEMBRE_ASSO)
    <h3 class="text-lg font-semibold text-white mt-6">Tarifs</h3>
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
                        <td class="border-b border-gray-600 p-2 text-left">{{ $tarif['nom'] ?? '-' }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">{{ $tarif['description'] ?? '-' }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">{{ $tarif['price'] ?? '-' }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">{{ isset($tarif['obligatoire']) && $tarif['obligatoire'] ? 'Oui' : 'Non' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if ($tarifs instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $tarifs->links() }}
    @endif
@endif

<!-- Souscriptions -->
@if ($user->role <= App\Models\User::ROLE_SPORTIF)
    <h3 class="text-lg font-semibold text-white mt-6">Souscriptions</h3>
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="border-b border-gray-600 p-2 text-left">ID</th>
                    <th class="border-b border-gray-600 p-2 text-left">Utilisateur</th>
                    <th class="border-b border-gray-600 p-2 text-left">Licence</th>
                    <th class="border-b border-gray-600 p-2 text-left">Accepté</th>
                    <th class="border-b border-gray-600 p-2 text-left">Membre</th>
                    <th class="border-b border-gray-600 p-2 text-left">Prix total</th>
                    <th class="border-b border-gray-600 p-2 text-left">Paiement</th>
                    <th class="border-b border-gray-600 p-2 text-left">Tarifs</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suscriptions as $suscription)
                    <tr>
                        <td class="border-b border-gray-600 p-2 text-left">{{ $suscription['id'] }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">{{ $suscription['user_id'] }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">{{ $suscription['license'] }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">{{ $suscription['accepted'] ? 'Oui' : 'Non' }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">{{ $suscription['member'] }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">{{ $suscription['total_price'] }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">{{ $suscription['payed'] }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">
                            @foreach($suscription['tarifs'] as $tarif)
                                <p>{{ $tarif['nom'] }}</p>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if ($suscriptions instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $suscriptions->links() }}
    @endif
@endif

<!-- Cours -->
@if ($user->role <= App\Models\User::ROLE_MONITEUR)
    <h3 class="text-lg font-semibold mt-6">Cours</h3>
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="border-b border-gray-600 p-2 text-left">Jour</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td class="border-b border-gray-600 p-2 text-left">{{ $course['day_name'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if ($courses instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $courses->links() }}
    @endif
@endif

<!-- Catégories -->
@if ($user->role <= App\Models\User::ROLE_TUTEUR)
    <h3 class="text-lg font-semibold mt-6">Catégories</h3>
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
                        <td class="border-b border-gray-600 p-2 text-left">{{ $category['nom'] }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">{{ $category['age_min'] }}</td>
                        <td class="border-b border-gray-600 p-2 text-left">{{ $category['age_max'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if ($categories instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $categories->links() }}
    @endif
@endif

