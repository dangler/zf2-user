<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/17/14
 * Time: 9:23 PM
 */

namespace ETCUser\Model;

use ETCUser\Model\Role as Role;


class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $middleName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var array[Role]
     */
    private $roles;

    /**
     * @param int $id
     * @param $firstName
     * @param $lastName
     * @param $middleName
     * @param array $roles
     * @internal param string $name
     */
    function __construct($id, $firstName, $lastName, $middleName)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
        $this->roles = array();
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setFirstName($name)
    {
        $this->firstName = $name;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    /**
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getFirstName() . ' ' . substr($this->getMiddleName(), 0, 1) . ' ' . $this->getLastName();
    }

    /**
     * @param Role $role
     */
    public function addRole(Role $role)
    {
        $this->roles[$role->getId()] = $role;
    }

    /**
     * @param int $id
     */
    public function removeRole($id)
    {
        unset($this->roles[$id]);
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param Role $r
     * @return bool
     */
    public function hasRole(Role $r)
    {
        foreach ($this->roles as $role) {
            if ($role->getName() == $r->getName())
                return true;
        }
        return false;
    }

    /**
     * @param Role $r
     * @param Context $c
     * @return bool
     */
    public function hasRoleForContext(Role $r, Context $c)
    {
        foreach ($this->roles as $role) {
            if ($role->getName() == $r->getName() && $role->getContext()->getName() == $c->getName())
                return true;
        }
        return false;
    }

} 