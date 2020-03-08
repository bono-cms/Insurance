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
use Krystal\Stdlib\VirtualEntity;

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

    /**
     * {@inheritDoc}
     */
    protected function toEntity(array $row)
    {
        $entity = new VirtualEntity();
        $entity->setId($row['id'])
               ->setIssuerId($row['issuer_id'])
               ->setName($row['name'])
               ->setPassport($row['passport'])
               ->setBirthday($row['birthday']);

        return $entity;
    }

    /**
     * Returns last issuer client id
     * 
     * @return int
     */
    public function getLastId()
    {
        return $this->issuerClientMapper->getMaxId();
    }

    /**
     * Fetches issuer client by their id
     * 
     * @param int $id Issuer client id
     * @return mixed
     */
    public function fetchById($id)
    {
        return $this->prepareResult($this->issuerClientMapper->findByPk($id));
    }

    /**
     * Fetches issuer clients
     * 
     * @param int $issuerId
     * @return array
     */
    public function fetchAll($issuerId)
    {
        return $this->prepareResults($this->issuerClientMapper->fetchAll($issuerId));
    }

    /**
     * Deletes issuer client by their id
     * 
     * @param int $id
     * @return boolean
     */
    public function deleteById($id)
    {
        return $this->issuerClientMapper->deleteByPk($id);
    }

    /**
     * Saves issuer client
     * 
     * @param array $input Raw input data
     * @return boolean
     */
    public function save(array $input)
    {
        return $this->issuerClientMapper->persist($input);
    }
}
