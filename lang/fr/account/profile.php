<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Profile Page Language Lines
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'title' => 'Profil',
    'heading' => 'Profil',
    'description' => [
        'subheading' => 'Gérez vos informations personnelles et la sécurité de votre compte.',
    ],
    'tab' => [
        'label' => 'Onglets du profil',
        'button' => [
            'information' => 'Informations',
            'security' => 'Securité',
        ],
    ],
    'button' => [
        'submit' => [
            'information' => 'Mise à jour',
            'security' => 'Mise à jour',
            'delete' => 'Supprimer',
        ],
    ],
    'input' => [
        'label' => [
            'username' => "Nom d'utilisateur",
            'current_password' => 'Mot de passe actuel',
            'password' => 'Nouveau mot de passe',
            'password_confirmation' => 'Confirmation du mot de passe',
        ],
    ],
    'select' => [
        'label' => [
            'locale' => 'Langue',
        ],
    ],
    'modal' => [
        'button' => [
            'show' => 'Supprimer mon compte',
            'close' => 'Annuler',
        ],
        'heading' => 'Supprimer mon compte',
        'question' => 'Souhaitez-vous vraiment supprimer votre compte ?',
        'warning' => 'Cette action est irréversible !',
    ],
    'status' => [
        'success' => [
            'information_updated' => 'Vos informations ont été mises à jour !',
            'password_updated' => 'Votre mot de passe a été mis à jour !',
            'account_deleted' => 'Votre compte a été supprimé !',
        ],
    ],
    'error' => [
        'password' => 'Votre nouveau mot de passe doit être différent de votre mot de passe actuel.',
    ],

];
