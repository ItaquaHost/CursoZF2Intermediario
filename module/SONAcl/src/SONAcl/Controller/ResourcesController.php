<?php

namespace SONAcl\Controller;

use SONBase\Controller\CrudController;

class ResourcesController extends CrudController {

    public function __construct() {
        $this->entity = "SONAcl\Entity\Resource";
        $this->service = "SONAcl\Service\Resource";
        $this->form = "SONAcl\Form\Resource";
        $this->controller = "resources";
        $this->route = "sonacl-admin/default";
    }

}
