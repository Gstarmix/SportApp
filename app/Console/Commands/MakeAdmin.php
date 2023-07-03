<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakeAdmin extends Command
{
    protected $signature = 'make:admin {userName} {password} {mail} {nom} {prenom} {date_naissance} {telephone} {email?}';

    protected $description = 'Créé un utilisateur admin pour l\'application';

    public function handle()
    {
        $args = $this->arguments();
        if (
            empty($args['mail']) ||
            empty($args['userName']) ||
            empty($args['password']) ||
            empty($args['nom']) ||
            empty($args['prenom']) ||
            empty($args['date_naissance']) ||
            empty($args['telephone'])
        ) {
            $this->error('Les information ne sont pas complètes !');
            return;
        }

        $this->info('Création en cours...');
        $user = new User();
        $user->email = $args['mail'];
        $user->name = $args['userName'];
        $user->password = Hash::make($args['password']);
        $user->role = 0;
        $user->save();

        $userData = new UserData();
        $userData->user_id = $user->id;
        $userData->nom = $args['nom'];
        $userData->prenom = $args['prenom'];
        $userData->date_naissance = $args['date_naissance'];
        $userData->telephone = $args['telephone'];
        $userData->save();

        $this->info('L\'utilisateur a bien été créé');
    }
}
