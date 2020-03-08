<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

return [
    // Issuer
    '/%s/module/insurance/issuer' => [
        'controller' => 'Admin:Issuer@indexAction'
    ],

    '/%s/module/insurance/issuer/add' => [
        'controller' => 'Admin:Issuer@addAction'
    ],

    '/%s/module/insurance/issuer/edit/(:var)' => [
        'controller' => 'Admin:Issuer@editAction'
    ],

    '/%s/module/insurance/issuer/delete/(:var)' => [
        'controller' => 'Admin:Issuer@deleteAction'
    ],

    '/%s/module/insurance/issuer/save' => [
        'controller' => 'Admin:Issuer@saveAction'
    ],
    
    // Issuer client
    '/%s/module/insurance/issuer-client/add/(:var)' => [
        'controller' => 'Admin:IssuerClient@addAction'
    ],

    '/%s/module/insurance/issuer-client/edit/(:var)' => [
        'controller' => 'Admin:IssuerClient@editAction'
    ],

    '/%s/module/insurance/issuer-client/delete/(:var)' => [
        'controller' => 'Admin:IssuerClient@deleteAction'
    ],
    
    '/%s/module/insurance/issuer-client/save' => [
        'controller' => 'Admin:IssuerClient@saveAction'
    ],
    
    // Scanner
    '/insurance/scan/(:var)' => [
        'controller' => 'Insurance@scanAction'
    ]
];