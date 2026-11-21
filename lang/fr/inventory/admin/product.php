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
        'edit_product' => 'Admin - Éditer un produit',
    ],
    'heading' => [
        'products' => 'Produits',
        'add_product' => 'Ajouter un produit',
        'edit_product' => 'Éditer un produit',
    ],
    'description' => [
        'subheading' => [
            'products' => 'Gérer les produits.',
            'add_product' => 'Renseigner les informations du produit',
            'edit_product' => 'Éditer les informations du produit',
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
            'edit_product' => [
                'delete' => 'Supprimer',
                'update' => 'Mise à jour',
            ],
        ],
    ],
    'searchbar' => [
        'placeholder' => 'Recherche par code-barres',
    ],
    'filters' => [
        'brands' => 'Marques',
        'categories' => 'Catégories',
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
        'edit_product' => [
            'button' => [
                'close' => 'Annuler',
            ],
            'heading' => 'Supprimer le produit',
            'question' => 'Souhaitez-vous vraiment supprimer le produit ?',
            'warning' => 'Cette action est irréversible !',
            'informations' => [
                'Le produit sera supprimé.',
                'La catégorie sera conservée.',
            ],
        ],
    ],
    'status' => [
        'success' => [
            'products_deleted' => 'Les produits ont été supprimés !',
            'product_deleted' => 'Le produit :name a été supprimé !',
            'product_created' => 'Le produit :name a été créé !',
            'product_updated' => 'Le produit :name a été mis à jour !',
        ],
    ],

];
