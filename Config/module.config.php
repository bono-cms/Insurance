<?php

/**
 * Module configuration container
 */

return [
    'caption' => 'Insurance',
    'description' => 'Insurance module let\'s you handle common insurance tasks',
    'menu' => [
        'name' => 'Insurance',
        'icon' => 'fas fa-umbrella fa-5x',
        'items' => [
            [
                'route' => 'Insurance:Admin:Issuer@indexAction',
                'name' => 'View all policies'
            ]
        ]
    ]
];