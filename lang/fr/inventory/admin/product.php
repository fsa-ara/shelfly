<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Product Admin Page Language Lines
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'title' => [
        'products' => 'Admin - Produits',
        'add_product' => 'Admin - Ajouter un produit',
    ],
    'heading' => [
        'products' => 'Produits',
        'add_product' => 'Ajouter un produit',
    ],
    'description' => [
        'subheading' => [
            'products' => 'Gérer les produits.',
            'add_product' => 'Renseigner les informations du produit',
        ],
        'empty_products' => "Il n'y a pas encore de produits. Commencez par en créer un.",
    ],
    'input' => [
        'label' => [
            'barcode' => 'Code-barres',
            'brand' => 'Marque',
            'name' => 'Nom',
            'unit_count' => "Nombre d'unités",
            'measure_value' => 'Mesure',
        ],
    ],
    'select' => [
        'label' => [
            'category' => 'Catégorie',
            'measure_unit' => 'Unité de mesure',
        ],
    ],
    'button' => [
        'submit' => [
            'products' => [
                'delete' => 'Supprimer',
            ],
            'add_product' => [
                'create' => 'Créer',
            ],
        ],
    ],
    'modal' => [
        'products' => [
            'button' => [
                'close' => 'Annuler',
            ],
            'heading' => 'Supprimer tous les produits',
            'question' => 'Souhaitez-vous vraiment supprimer tous les produits ?',
            'warning' => 'Cette action est irréversible !',
            'informations' => [
                'Tous les produits seront supprimés.',
                'Les catégories seront conservées.',
            ],
        ],
    ],
    'status' => [
        'success' => [
            'products_deleted' => 'Les produits ont été supprimés !',
            'product_created' => 'Le produit :name a été créé !',
        ],
    ],

];
