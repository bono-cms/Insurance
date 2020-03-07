<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Insurance\Service;

use Cms\Service\AbstractManager;
use Insurance\Storage\IssuerClientMapperInterface;

final class IssuerClientService extends AbstractManager
{
    /**
     * Any compliant client issuer mapper
     * 
     * @var \Insurance\Storage\IssuerClientMapperInterface
     */
    private $issuerClientMapper;

    /**
     * State initialization
     * 
     * @param \Insurance\Storage\IssuerClientMapperInterface $issuerClientMapper
     * @return void
     */
    public function __construct(IssuerClientMapperInterface $issuerClientMapper)
    {
        $this->issuerClientMapper = $issuerClientMapper;
    }
}
