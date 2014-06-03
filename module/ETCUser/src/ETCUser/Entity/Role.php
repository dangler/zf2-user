<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/17/14
 * Time: 9:57 PM
 */

namespace EtcUser\Entity;

use EtcUser\Entity\User as User;

class Role
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $context;

    /**
     * @var User
     */
    private $user;

    /**
     * @param $context
     * @throws Exception
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->context;
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param &User $user
     */
    public function setUser(&$user)
    {
        $this->user = $user;
    }

    /**
     * @return Use
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Returns a string that describe the role with context.
     *
     * @return string
     */
    public function getDescription()
    {
        $description = '';

        if ($this->getUser() !== null ) {
            $description .= $this->getUser()->getName() . ' as ';
        }

        $description .= $this->getName();

        if ($this->getContext() !== null) {
            $description .= ' in ' . $this->getContext();
        }

        return $description;
    }
} 