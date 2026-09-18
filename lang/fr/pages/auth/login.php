<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Login Language Lines
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'title' => 'Connexion',
    'heading' => 'Connexion',
    'description' => 'Connecte-toi à ton compte ' . config('app.name') . " afin d'accéder à tous les services.",
    'form' => [
        'input' => [
            'email' => 'E-mail',
            'password' => 'Mot de passe',
            'remember_me' => 'Se souvenir de moi',
        ],
        'button' => 'Connexion',
    ],
    'forgot_password' => [
        'link' => 'Mot de passe oublié ?',
    ],
    'register' => [
        'description' => "Tu n'as pas encore de compte " . config('app.name') . ' ?',
        'link' => 'Crée ton compte ' . config('app.name'),
    ],
    'status' => [
        'logged_in' => 'Tu es connecté !',
    ],
    'error' => [
        'credentials' => 'E-mail ou mot de passe invalide.',
    ],

];
