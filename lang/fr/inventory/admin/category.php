<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Category Admin Page Language Lines
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'title' => [
        'categories' => 'Admin - Catégories',
        'add_category' => 'Admin - Ajouter une catégorie',
        'edit_category' => 'Admin - Éditer une catégorie',
    ],
    'heading' => [
        'categories' => 'Catégories',
        'add_category' => 'Ajouter une catégorie',
        'edit_category' => 'Éditer une catégorie',
    ],
    'description' => [
        'subheading' => [
            'categories' => 'Gérer les catégories.',
            'add_category' => 'Ajoutez une catégorie et ses traductions',
            'edit_category' => 'Éditez une catégorie et ses traductions',
        ],
        'empty_categories' => "Il n'y a pas encore de catégories. Commencez par en créer une.",
    ],
    'input' => [
        'label' => [
            'name' => 'Nom',
        ],
    ],
    'button' => [
        'submit' => [
            'categories' => [
                'delete' => 'Supprimer',
            ],
            'add_category' => [
                'create' => 'Créer',
            ],
            'edit_category' => [
                'delete' => 'Supprimer',
                'update' => 'Mise à jour',
            ],
        ],
    ],
    'modal' => [
        'categories' => [
            'button' => [
                'close' => 'Annuler',
            ],
            'heading' => 'Supprimer toutes les catégories',
            'question' => 'Souhaitez-vous vraiment supprimer toutes les catégories ?',
            'warning' => 'Cette action est irréversible !',
            'informations' => [
                'Toutes les catégories seront supprimées.',
                'Les produits seront conservés, mais ne seront plus rattachés à une catégorie.',
            ],
        ],
        'edit_category' => [
            'button' => [
                'close' => 'Annuler',
            ],
            'heading' => 'Supprimer la catégorie',
            'question' => 'Souhaitez-vous vraiment supprimer cette catégorie ?',
            'warning' => 'Cette action est irréversible !',
            'informations' => [
                'Cette catégorie sera supprimée.',
                'Les produits seront conservés, mais ne seront plus rattachés à cette catégorie.',
            ],
        ],
    ],
    'status' => [
        'success' => [
            'categories_deleted' => 'Les catégories ont été supprimées !',
            'category_deleted' => 'La catégorie :name a été supprimée !',
            'category_created' => 'La catégorie :name a bien été créée !',
            'category_updated' => 'La catégorie :name a bien été mise à jour !',
        ],
    ],

];
