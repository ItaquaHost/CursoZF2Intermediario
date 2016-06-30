<?php

namespace SONUser\Form;

use Zend\Form\Form;

class Login extends Form {

    public function __construct($name = null, $options = array()) {
        parent::__construct('Login', $options);

        $this->setAttribute('method', 'post');

        $email = new \Zend\Form\Element\Text('email');
        $email->setLabel("E-mail: ")
                ->setAttribute('placeholder', 'Entre com o e-mail');
        $this->add($email);

        $password = new \Zend\Form\Element\Password('password');
        $password->setLabel("Senha: ")
                ->setAttribute('placeholder', 'Entre com a senha');
        $this->add($password);

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Entrar',
                'class' => 'btn-success'
            )
        ));
    }

}
