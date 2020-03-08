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

final class Issuer extends AbstractController
{
    /**
     * Renders a grid
     * 
     * @return string
     */
    public function indexAction()
    {
        // Append a breadcrumb
        $this->view->getBreadcrumbBag()
                   ->addOne('Insurance');

        return $this->view->render('issuer/index', [
            'issuers' => $this->getModuleService('issuerService')->fetchAll()
        ]);
    }

    /**
     * Renders shared form
     * 
     * @param \Krystal\Stdlib\VirtualEntity $issuer
     * @param string $title Page title
     * @return string
     */
    private function createForm(VirtualEntity $issuer, $title)
    {
        // Append breadcrumbs
        $this->view->getBreadcrumbBag()
                   ->addOne('Insurance', 'Insurance:Admin:Issuer@indexAction')
                   ->addOne($title);

        return $this->view->render('issuer/form', [
            'issuer' => $issuer,
            'clients' => $issuer->getId() ? $this->getModuleService('issuerClientService')->fetchAll($issuer->getId()) : []
        ]);
    }

    /**
     * Renders a form to add an issuer
     * 
     * @return string
     */
    public function addAction()
    {
        return $this->createForm(new VirtualEntity, 'Add new issuer');
    }

    /**
     * Renders edit form
     * 
     * @param int $id Issuer id
     * @return string
     */
    public function editAction($id)
    {
        $issuer = $this->getModuleService('issuerService')->fetchById($id);

        if ($issuer !== false) {
            $title = $this->translator->translate('Edit issuer "%s"', $issuer->getName());

            return $this->createForm($issuer, $title);
        } else {
            return false;
        }
    }

    /**
     * Deletes an issuer by their id
     * 
     * @param int $id Issuer id
     * @return mixed
     */
    public function deleteAction($id)
    {
        $this->getModuleService('issuerService')->deleteById($id);

        $this->flashBag->set('success', 'Selected issuer has been removed successfully');
        return 1;
    }

    /**
     * Saves an issuer
     * 
     * @return mixed
     */
    public function saveAction()
    {
        // Raw POST data
        $data = $this->request->getPost('issuer');

        $issuerService = $this->getModuleService('issuerService');
        $issuerService->save($data);

        if (!empty($data['id'])) {
            $this->flashBag->set('success', 'The issuer has been updated successfully');
            return 1;
        } else {
            $this->flashBag->set('success', 'The issuer has been created successfully');
            return $issuerService->getLastId();
        }
    }
}
