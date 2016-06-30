<?php

namespace SONAcl\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="sonacl_privileges")
 * @ORM\Entity(repositoryClass="SONAcl\Entity\PrivilegeRepository")
 */
class Privilege {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $nome;

    /**
     * @ORM\OneToOne(targetEntity="SONAcl\Entity\Role")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     */
    protected $role;

    /**
     * @ORM\OneToOne(targetEntity="SONAcl\Entity\Resource")
     * @ORM\JoinColumn(name="resource_id", referencedColumnName="id")
     */
    protected $resource;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    protected $updatedAt;

    public function __construct($options = array()) {

        (new Hydrator\ClassMethods)->hydrate($options, $this);
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getRole() {
        return $this->role;
    }

    public function getResource() {
        return $this->resource;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function setRole($role) {
        $this->role = $role;
        return $this;
    }

    public function setResource($resource) {
        $this->resource = $resource;
        return $this;
    }

    public function setCreatedAt() {
        $this->createdAt = new \DateTime("now");
        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function setUpdatedAt() {
        $this->updatedAt = new \DateTime("now");
        return $this;
    }

    public function toArray() {

        return array(
            'id' => $this->id,
            'nome' => $this->nome,
            'role' => $this->role->getId(),
            'resource' => $this->resource->getId()
        );
    }

}
