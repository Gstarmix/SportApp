<div class="py-12 bg-gray-900">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
            <form class="space-y-4" wire:submit.prevent="submit">
                @csrf
                @method('PATCH')

                <div class="flex items-center">
                    <label for="name" class="w-48"><i class="fas fa-user mr-2"></i>Nom d'utilisateur</label>
                    <input type="text" id="name" name="name" required class="p-2 bg-gray-700 rounded w-full input-black" wire:model="user.name">
                    @error('user.name') 
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center">
                    <label for="email" class="w-48"><i class="fas fa-envelope mr-2"></i>Email</label>
                    <input type="{{ $mineur ? 'text' : 'email' }}" id="email" name="email" {{ $mineur ? '' : 'required' }} class="p-2 bg-gray-700 rounded w-full input-black" wire:model="user.email">
                    @error('user.email') 
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center">
                    <label for="nom" class="w-48"><i class="fas fa-address-card mr-2"></i>Nom</label>
                    <input type="text" id="nom" name="nom" required class="p-2 bg-gray-700 rounded w-full input-black" wire:model="user_data.nom">
                    @error('user_data.nom') 
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center">
                    <label for="prenom" class="w-48"><i class="fas fa-address-card mr-2"></i>Prénom</label>
                    <input type="text" id="prenom" name="prenom" required class="p-2 bg-gray-700 rounded w-full input-black" wire:model="user_data.prenom">
                    @error('user_data.prenom') 
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center">
                    <label for="date_naissance" class="w-48"><i class="fas fa-birthday-cake mr-2"></i>Date de naissance</label>
                    <input type="date" id="date_naissance" name="date_naissance" required class="p-2 bg-gray-700 rounded w-full input-black" wire:model="user_data.date_naissance">
                    @error('user_data.date_naissance') 
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center">
                    <label for="telephone" class="w-48"><i class="fas fa-phone mr-2"></i>Téléphone</label>
                    <input type="text" id="telephone" name="telephone" required class="p-2 bg-gray-700 rounded w-full input-black" wire:model="user_data.telephone">
                    @error('user_data.telephone') 
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center">
                    <label for="role" class="w-48"><i class="fas fa-user-tag mr-2"></i>Rôle</label>
                    <select id="role" name="role" required class="p-2 bg-gray-700 rounded w-full input-black" wire:model="user.role">
                        @foreach($roles as $index => $role)
                        <option value="{{ $index }}">{{ ucfirst($role) }}</option>
                        @endforeach
                    </select>
                </div>
                @error('user.role') 
                    <span class="error">{{ $message }}</span>
                @enderror
                
                @if ($mineur)
                    <div class="mt-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                        <p class="font-bold">Attention!</p>
                        <p>Vous devez ajouter un tuteur légal car vous êtes mineur.</p>
                    </div>
                    <div class="flex items-center">
                        <label for="tuteur_nom" class="w-48"><i class="fas fa-user mr-2"></i>Nom du tuteur</label>
                        <input type="text" id="tuteur_nom" name="tuteur_nom" required class="p-2 bg-gray-700 rounded w-full input-black" wire:model="tuteur_data.nom">
                        @error('tuteur_data.nom') 
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <label for="tuteur_prenom" class="w-48"><i class="fas fa-user mr-2"></i>Prénom du tuteur</label>
                        <input type="text" id="tuteur_prenom" name="tuteur_prenom" required class="p-2 bg-gray-700 rounded w-full input-black" wire:model="tuteur_data.prenom">
                        @error('tuteur_data.prenom') 
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <label for="tuteur_email" class="w-48"><i class="fas fa-envelope mr-2"></i>Email du tuteur</label>
                        <input type="email" id="tuteur_email" name="tuteur_email" required class="p-2 bg-gray-700 rounded w-full input-black" wire:model="tuteur.email">
                        @error('tuteur_data.email') 
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <label for="tuteur_telephone" class="w-48"><i class="fas fa-phone mr-2"></i>Téléphone du tuteur</label>
                        <input type="text" id="tuteur_telephone" name="tuteur_telephone" required class="p-2 bg-gray-700 rounded w-full input-black" wire:model="tuteur_data.telephone">
                        @error('tuteur_data.telephone') 
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <label for="tuteur_date_naissance" class="w-48"><i class="fas fa-phone mr-2"></i>Date de naissance du tuteur</label>
                        <input type="date" id="tuteur_date_naissance" name="tuteur_date_naissance" required class="p-2 bg-gray-700 rounded w-full input-black" wire:model="tuteur_data.date_naissance">
                        @error('tuteur_data.date_naissance') 
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                @endif

                <div>
                    <button type="submit" class="py-2 px-4 text-white hover:text-gray-100 bg-blue-500 hover:bg-blue-600 rounded">
                        <i class="fas fa-check mr-2"></i>Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
