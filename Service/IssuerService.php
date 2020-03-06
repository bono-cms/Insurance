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

use Insurance\Storage\IssuerMapperInterface;
use Cms\Service\AbstractManager;

final class IssuerService extends AbstractManager
{
    /**
     * Any compliant issuer mapper
     * 
     * @var \Insurance\Storage\IssuerMapperInterface $issuerMapper
     */
    private $issuerMapper;

    /**
     * State initialization
     * 
     * @param \Insurance\Storage\IssuerMapperInterface $issuerMapper
     * @return void
     */
    public function __construct(IssuerMapperInterface $issuerMapper)
    {
        $this->issuerMapper = $issuerMapper;
    }
}
