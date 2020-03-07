<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Insurance\Controller\Admin;

use Cms\Controller\Admin\AbstractController;
use Krystal\Stdlib\VirtualEntity;

final class IssuerClient extends AbstractController
{
    /**
     * Creates shared form
     * 
     * @param \Krystal\Stdlib\VirtualEntity $issuerClient
     * @param string $title Page title
     * @return string
     */
    private function createForm(VirtualEntity $issuerClient, $title)
    {
        $issuer = $this->getModuleService('issuerService')->fetchById($issuerClient->getIssuerId());

        // Append breadcrumbs
        $this->view->getBreadcrumbBag()->addOne('Insurance', 'Insurance:Admin:Issuer@indexAction')
                                       ->addOne(sprintf('Issuer "%s"', $issuer->getName()), $this->createUrl('Insurance:Admin:Issuer@editAction', [$issuer->getId()]))
                                       ->addOne($title);

        return $this->view->render('issuer-client/form', [
            'issuerClient' => $issuerClient
        ]);
    }

    /**
     * Renders adding form
     * 
     * @param int $issuerId
     * @return string
     */
    public function addAction($issuerId)
    {
        $issuer = new VirtualEntity;
        $issuer->setIssuerId($issuerId);

        return $this->createForm($issuer, 'Add new issuer client');
    }

    /**
     * Renders edit form
     * 
     * @param int $id Client id
     * @return string
     */
    public function editAction($id)
    {
        $issuerClient = $this->getModuleService('issuerClientService')->fetchById($id);

        if ($issuerClient !== false) {
            $title = $this->translator->translate('Edit issuer client "%s"', $issuerClient->getName());
            return $this->createForm($issuerClient, $title);
        } else {
            return false;
        }
    }

    /**
     * Deletes a client
     * 
     * @param int $id
     * @return mixed
     */
    public function deleteAction($id)
    {
        $this->getModuleService('issuerClientService')->deleteById($id);
        return 1;
    }

    /**
     * Saves issuer client
     * 
     * @return mixed
     */
    public function saveAction()
    {
        $data = $this->request->getPost('client');

        $issuerClientService = $this->getModuleService('issuerClientService');
        $issuerClientService->save($data);

        if (!empty($data['id'])) {
            return 1;
        } else {
            return $issuerClientService->getLastId();
        }
    }
}
