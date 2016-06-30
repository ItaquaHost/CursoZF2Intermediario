<?php

namespace SONAcl\Controller;

use SONBase\Controller\CrudController;
use Zend\View\Model\ViewModel;

class RolesController extends CrudController {

    public function __construct() {
        $this->entity = "SONAcl\Entity\Role";
        $this->service = "SONAcl\Service\Role";
        $this->form = "SONAcl\Form\Role";
        $this->controller = "roles";
        $this->route = "sonacl-admin/default";
    }

    public function newAction() {

        $form = $this->getServiceLocator()->get($this->form);
        $request = $this->getRequest();

        if ($request->isPost()):
            $form->setData($request->getPost());
            if ($form->isValid()):
                $service = $this->getServiceLocator()->get($this->service);
                $service->insert($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            endif;
        endif;

        return new ViewModel(array('form' => $form));
    }

    public function editAction() {

        $form = $this->getServiceLocator()->get($this->form);
        $request = $this->getRequest();

        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id', 0));

        if ($this->params()->fromRoute('id', 0)):
            $form->setData($entity->toArray());
        endif;

        if ($request->isPost()):
            $form->setData($request->getPost());
            if ($form->isValid()):
                $service = $this->getServiceLocator()->get($this->service);
                $service->update($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            endif;
        endif;

        return new ViewModel(array('form' => $form));
    }

    public function testeAction() {

        $acl = $this->getServiceLocator()->get("SONAcl\Permissions\Acl");

        echo $acl->isAllowed("Redator", "Posts", "Visualizar") ? "Permitido" : "Negado";
        die;
    }

}
