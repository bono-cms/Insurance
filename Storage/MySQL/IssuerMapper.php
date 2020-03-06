<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Insurance\Storage\MySQL;

use Cms\Storage\MySQL\AbstractMapper;
use Insurance\Storage\IssuerMapperInterface;

final class IssuerMapper extends AbstractMapper implements IssuerMapperInterface
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return self::getWithPrefix('bono_module_insurance_issuer');
    }

    /**
     * Fetch all issuers
     * 
     * @return array
     */
    public function fetchAll()
    {
        $db = $this->db->select('*')
                       ->from(self::getTableName())
                       ->orderBy('id')
                       ->desc();

        return $db->queryAll();
    }
}
