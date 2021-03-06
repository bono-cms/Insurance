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
use Insurance\Storage\IssuerClientMapperInterface;

final class IssuerClientMapper extends AbstractMapper implements IssuerClientMapperInterface
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return self::getWithPrefix('bono_module_insurance_issuer_clients');
    }

    /**
     * Fetch all issuers by client id
     * 
     * @param int $issuerId
     * @return array
     */
    public function fetchAll($issuerId)
    {
        $db = $this->db->select('*')
                       ->from(self::getTableName())
                       ->whereEquals('issuer_id', $issuerId)
                       ->orderBy('id')
                       ->desc();

        return $db->queryAll();
    }
}
