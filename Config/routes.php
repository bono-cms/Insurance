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
    '%s/module/insurance/issuer' => [
        'controller' => 'Insurance:Issuer@indexAction'
    ],

    '%s/module/insurance/issuer/add' => [
        'controller' => 'Insurance:Issuer@addAction'
    ],

    '%s/module/insurance/issuer/edit/(:var)' => [
        'controller' => 'Insurance:Issuer@editAction'
    ],

    '%s/module/insurance/issuer/delete/(:var)' => [
        'controller' => 'Insurance:Issuer@deleteAction'
    ]
];