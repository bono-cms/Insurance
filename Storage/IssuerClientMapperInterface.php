<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Insurance\Storage;

interface IssuerClientMapperInterface
{
    /**
     * Fetch all issuers by client id
     * 
     * @param int $issuerId
     * @return array
     */
    public function fetchAll($issuerId);
}
