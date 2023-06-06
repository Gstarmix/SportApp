<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {userName} {password} {mail}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Créé un utilisateur admin pour l\'application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $args = $this->arguments();
        if (
            empty($args['mail']) ||
            empty($args['userName']) ||
            empty($args['password'])
        ) {
            $this->error('Les information ne sont pas complètes (nom, mot de passe, mail)!');
            return;
        }
        $this->info('Création en cours...');
        $user = new User();
        $user->email = $args['mail'];
        $user->name = $args['userName'];
        $user->password = Hash::make($args['password']);
        $user->role = 0;
        $user->save();
        $this->info('L\'utilisateur a bien été créé');
    }
}
