<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Email Verification Language Lines
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'title' => "Vérification de l'e-mail",
    'heading' => "Vérification de l'e-mail",
    'description' => "Merci de cliquer sur le lien qui t'as été envoyé par e-mail afin de valider ton compte " . config('app.name'),
    'form' => [
        'button' => 'Renvoyer',
    ],
    'status' => [
        'verified' => 'Ton compte a été validé !',
        'already_verified' => 'Ton compte a déjà été validé !',
        'resent' => "Le lien de vérification t'as été renvoyé !",
    ],
    'error' => [
        'throttle' => "Trop de tentatives de réenvoi de l'e-mail de vérification. Merci de patienter avant de réessayer.",
    ],

];
