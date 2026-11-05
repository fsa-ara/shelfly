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
        'categories' => 'Admin - Categories',
        'add_category' => 'Admin - Add a category',
        'edit_category' => 'Admin - Edit a category',
    ],
    'heading' => [
        'categories' => 'Categories',
        'add_category' => 'Add a category',
        'edit_category' => 'Edit a category',
    ],
    'description' => [
        'subheading' => [
            'categories' => 'Manage the categories.',
            'add_category' => 'Add a category and its translations',
            'edit_category' => 'Edit a category and its translations',
        ],
        'empty_categories' => 'No categories yet. Start by creating one.',
    ],
    'input' => [
        'label' => [
            'name' => 'Name',
        ],
    ],
    'button' => [
        'submit' => [
            'categories' => [
                'delete' => 'Delete',
            ],
            'add_category' => [
                'create' => 'Create',
            ],
            'edit_category' => [
                'delete' => 'Delete',
                'update' => 'Update',
            ],
        ],
    ],
    'modal' => [
        'categories' => [
            'button' => [
                'close' => 'Cancel',
            ],
            'heading' => 'Delete all categories',
            'question' => 'Are you sure?',
            'warning' => 'This action cannot be undone!',
            'informations' => [
                'All categories will be deleted.',
                'Products will remain, but will no longer be assigned to a category.',
            ],
        ],
        'edit_category' => [
            'button' => [
                'close' => 'Cancel',
            ],
            'heading' => 'Delete the category',
            'question' => 'Are you sure?',
            'warning' => 'This action cannot be undone!',
            'informations' => [
                'This category will be deleted.',
                'Products will remain, but will no longer be assigned to this category.',
            ],
        ],
    ],
    'status' => [
        'success' => [
            'categories_deleted' => 'The categories have been deleted!',
            'category_created' => 'The :name category has been created!',
            'category_updated' => 'The :name category has been updated!',
        ],
    ],

];
