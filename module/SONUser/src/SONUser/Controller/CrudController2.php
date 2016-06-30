<?php

namespace SONUser\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

class CrudController extends AbstractActionController {

    protected $em;
    protected $service;
    protected $entity;
    protected $form;
    protected $route;
    protected $controller;

    public function indexAction() {

        $list = $this->getEm()
                ->getRepository($this->entity)
                ->findAll();

        $page = $this->params()->fromRoute('page');

        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page)
                ->setDefaultItemCountPerPage(2);

        return new ViewModel(array('data' => $paginator, 'page' => $page));
    }

    public function newAction() {

        $form = new $this->form();
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

        $form = new $this->form();
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

    public function deleteAction() {

        $service = $this->getServiceLocator()->get($this->service);

        if ($service->delete($this->params()->fromRoute('id', 0))):
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
        endif;
    }

    /**
     * 
     * @return EntityManager
     */
    protected function getEm() {

        if (null === $this->em):
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        endif;

        return $this->em;
    }

}
