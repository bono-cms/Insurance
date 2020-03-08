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
        // Columns to be selected
        $columns = [
            self::column('id'),
            self::column('phone'),
            self::column('name'),
            self::column('email'),
            self::column('created_at'),
        ];

        $db = $this->db->select($columns)
                       ->count(IssuerClientMapper::column('id'), 'clients_count')
                       ->from(self::getTableName())
                       // Issuer client relation
                       ->leftJoin(IssuerClientMapper::getTableName(), [
                            IssuerClientMapper::column('issuer_id') => self::getRawColumn('id')
                       ])
                       ->groupBy($columns)
                       ->orderBy('id')
                       ->desc();

        return $db->queryAll();
    }
}
