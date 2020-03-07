<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Insurance;

use Cms\AbstractCmsModule;
use Insurance\Service\IssuerService;
use Insurance\Service\IssuerClientService;

final class Module extends AbstractCmsModule
{
    /**
     * {@inheritDoc}
     */
    public function getServiceProviders()
    {
        return [
            'issuerService' => new IssuerService($this->getMapper('\Insurance\Storage\MySQL\IssuerMapper')),
            'issuerClientService' => new IssuerClientService($this->getMapper('\Insurance\Storage\MySQL\IssuerClientMapper'))
        ];
    }
}
