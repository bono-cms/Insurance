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

use Insurance\Storage\IssuerMapperInterface;
use Cms\Service\AbstractManager;
use Krystal\Stdlib\VirtualEntity;
use Krystal\Date\TimeHelper;

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

    /**
     * {@inheritDoc}
     */
    protected function toEntity(array $row)
    {
        $entity = new VirtualEntity();
        $entity->setId($row['id'])
               ->setName($row['name'])
               ->setPhone($row['phone'])
               ->setEmail($row['email'])
               ->setCreatedAt($row['created_at']);

        return $entity;
    }

    /**
     * Returns last issuer id
     * 
     * @return mixed
     */
    public function getLastId()
    {
        return $this->issuerMapper->getLastId();
    }

    /**
     * Persist an issuer
     * 
     * @param array $input Raw input data
     * @return boolean
     */
    public function save(array $input)
    {
        // Add date with time on creation
        if (empty($input['id'])){
            $input['created_at'] = TimeHelper::getNow();
        }

        return $this->issuerMapper->persist($input);
    }

    /**
     * Deletes an issuer by their id
     * 
     * @param int $id Issuer id
     * @return mixed
     */
    public function deleteById($id)
    {
        return $this->issuerMapper->deleteByPk($id);
    }

    /**
     * Fetches an issuer by their id
     * 
     * @param int $id Issuer id
     * @return mixed
     */
    public function fetchById($id)
    {
        return $this->prepareResult($this->issuerMapper->findByPk($id));
    }

    /**
     * Fetch all issuers
     * 
     * @return array
     */
    public function fetchAll()
    {
        return $this->prepareResults($this->issuerMapper->fetchAll());
    }
}
