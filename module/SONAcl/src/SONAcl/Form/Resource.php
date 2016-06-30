<?php

namespace SONAcl\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class Resource extends Form {

    public function __construct($name = null) {
        parent::__construct('resources');

        $this->setAttribute('method', 'post');

        $id = new Element\Hidden('id');
        $this->add($id);

        $nome = new Element\Text('nome');
        $nome->setLabel('Nome: ')
                ->setAttribute('placeholder', 'Entre com o nome');
        $this->add($nome);

        $submit = new Element\Submit;
        $submit->setName('submit')
                ->setAttribute('value', 'Salvar')
                ->setAttribute('class', 'btn-success');
        $this->add($submit);
    }

}
