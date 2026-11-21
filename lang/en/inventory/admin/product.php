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
        'products' => 'Admin - Products',
        'add_product' => 'Admin - Add a product',
        'edit_product' => 'Admin - Edit a product',
    ],
    'heading' => [
        'products' => 'Products',
        'add_product' => 'Add a product',
        'edit_product' => 'Edit a product',
    ],
    'description' => [
        'subheading' => [
            'products' => 'Manage the products.',
            'add_product' => 'Add product information',
            'edit_product' => 'Edit information product',
        ],
        'empty_products' => 'No products yet. Start by creating one.',
    ],
    'input' => [
        'label' => [
            'barcode' => 'Barcode',
            'brand' => 'Brand',
            'name' => 'Name',
            'unit_count' => 'Unit count',
            'measure_value' => 'Measure value',
        ],
    ],
    'select' => [
        'label' => [
            'category' => 'Category',
            'measure_unit' => 'Measure unit',
        ],
    ],
    'button' => [
        'submit' => [
            'products' => [
                'delete' => 'Delete',
            ],
            'add_product' => [
                'create' => 'Create',
            ],
            'edit_product' => [
                'delete' => 'Delete',
                'update' => 'Update',
            ],
        ],
    ],
    'searchbar' => [
        'placeholder' => 'Search by barcode',
    ],
    'filters' => [
        'brands' => 'Brands',
        'categories' => 'Categories',
    ],
    'modal' => [
        'products' => [
            'button' => [
                'close' => 'Cancel',
            ],
            'heading' => 'Delete all products',
            'question' => 'Are you sure?',
            'warning' => 'This action cannot be undone!',
            'informations' => [
                'All products will be deleted.',
                'Categories will remain.',
            ],
        ],
        'edit_product' => [
            'button' => [
                'close' => 'Cancel',
            ],
            'heading' => 'Delete the product',
            'question' => 'Are you sure?',
            'warning' => 'This action cannot be undone!',
            'informations' => [
                'This product will be deleted.',
                'Category will remain.',
            ],
        ],
    ],
    'status' => [
        'success' => [
            'products_deleted' => 'The products have been deleted!',
            'product_deleted' => 'The :name product have been deleted!',
            'product_created' => 'The :name product has been created!',
            'product_updated' => 'The :name product has been updated!',
        ],
    ],

];
