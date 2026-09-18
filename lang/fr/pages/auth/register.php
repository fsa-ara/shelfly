<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Register Language Lines
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'title' => 'Inscription',
    'heading' => 'Inscription',
    'description' => 'Crée ton compte ' . config('app.name') . " afin d'accéder à tous les services.",
    'form' => [
        'input' => [
            'email' => 'E-mail',
            'password' => 'Mot de passe',
            'password_confirmation' => 'Confirmation du mot de passe',
        ],
        'button' => 'Inscription',
    ],
    'login' => [
        'description' => 'Tu as déjà un compte ' . config('app.name') . ' ?',
        'link' => 'Connexion',
    ],
    'status' => [
        'registered' => 'Ton compte a été créé !',
    ],

];
