<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Email Verification Page Language Lines
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'title' => "Vérification de l'adresse e-mail",
    'heading' => "Vérification de l'adresse e-mail",
    'description' => [
        'subheading' => 'Un e-mail de vérification a été envoyé dans votre boîte de réception. Veuillez cliquer sur le lien pour vérifier votre compte :app.',
    ],
    'button' => [
        'submit' => 'Envoyer',
    ],
    'status' => [
        'success' => [
            'sent' => 'Le lien de vérification a été envoyé !',
            'verified' => 'Votre compte a été validé !',
        ],
    ],
    'error' => [
        'throttle' => "Il y a eu trop de tentatives d'envoi de l'e-mail de vérification. Veuillez patienter avant de réessayer.",
        'invalid_signature' => "Le lien de vérification n'est plus valide. Veuillez demander un nouvel e-mail de vérification.",
    ],

];
