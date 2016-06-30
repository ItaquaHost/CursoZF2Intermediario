<?php

namespace SONAcl\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class Privilege extends Form {

    protected $roles;
    protected $resources;

    public function __construct($name = null, array $roles = null, array $resources = null) {
        parent::__construct($name);

        $this->roles = $roles;
        $this->resources = $resources;

        $this->setAttribute('method', 'post');

        $id = new Element\Hidden('id');
        $this->add($id);

        $nome = new Element\Text('nome');
        $nome->setLabel('Nome: ')
                ->setAttribute('placeholder', 'Entre com o nome');
        $this->add($nome);

        $role = new Element\Select;
        $role->setLabel('Função: ')
                ->setName('role')
                ->setOptions(array('value_options' => $roles));
        $this->add($role);
        
        $resource = new Element\Select;
        $resource->setLabel('Recursos: ')
                ->setName('resource')
                ->setOptions(array('value_options' => $resources));
        $this->add($resource);

        $submit = new Element\Submit;
        $submit->setName('submit')
                ->setAttribute('value', 'Salvar')
                ->setAttribute('class', 'btn-success');
        $this->add($submit);
    }

}
