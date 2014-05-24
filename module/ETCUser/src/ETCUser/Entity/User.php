<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/17/14
 * Time: 9:23 PM
 */

namespace EtcUser\Entity;

use EtcUser\Entity\Context;
use EtcUser\Entity\Role as Role;
use Zend\Validator\EmailAddress;

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
     * @var string
     */
    private $domain;

    /**
     * @var array
     */
    private $emails;

    /**
     * @var array[Role]
     */
    private $roles;

    /**
     * @param int $id
     * @param $firstName
     * @param $middleName
     * @param $lastName
     * @param $domain
     */
    function __construct($id, $firstName, $middleName, $lastName, $domain)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
        $this->domain = $domain;
        $this->roles = array();
        $this->emails = array();
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
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param array $emails
     */
    public function setEmails($emails)
    {
        $this->emails = $emails;
    }

    /**
     * @return array
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @param string $email
     * @throws \Exception
     */
    public function addEmail($email)
    {
        $validator = new EmailAddress();
        if ($validator->isValid($email)) {
            $this->emails[] = $email;
        } else {
            throw new \Exception('Invalid email');
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        $sep = ' ';

        $name = $this->getFirstName() . $sep;

        if (strlen(trim($this->getMiddleName()))) {
            $name .= substr($this->getMiddleName(), 0, 1) . $sep;
        }

        $name .= $this->getLastName();

        return $name;
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