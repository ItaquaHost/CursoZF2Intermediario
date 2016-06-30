<?php

namespace SONAcl\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class Role extends Form {

    protected $parent;

    public function __construct($name = null, array $parent = null) {
        parent::__construct('roles');
        $this->parent = $parent;

        $this->setAttribute('method', 'post');

        $id = new Element\Hidden('id');
        $this->add($id);

        $nome = new Element\Text('nome');
        $nome->setLabel('Nome: ')
                ->setAttribute('placeholder', 'Entre com o nome');
        $this->add($nome);

        $allparent = array_merge(array(0 => 'nenhum'), $this->parent);
        $parent_ = new Element\Select;
        $parent_->setLabel('Herda: ')
                ->setName('parent')
                ->setOptions(array('value_options' => $allparent));
        $this->add($parent_);

        $isAdmin = new Element\Checkbox('isAdmin');
        $isAdmin->setLabel('Admin?: ');
        $this->add($isAdmin);


        $submit = new Element\Submit;
        $submit->setName('submit')
                ->setAttribute('value', 'Salvar')
                ->setAttribute('class', 'btn-success');
        $this->add($submit);
    }

}
