<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/17/14
 * Time: 9:57 PM
 */

namespace ETCUser\Model\Business;

use ETCUser\Model\Business\Context as Context;
use ETCUser\Model\Business;
use ETCUser\Model\Business\User as User;

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
     * @var \ETCUser\Model\Business\Context
     */
    private $context;

    /**
     * @var User
     */
    private $user;

    /**
     * @param $id
     * @param $name
     * @param \ETCUser\Model\Business\Context $context
     */
    function __construct($id, $name, Business\Context $context = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->context = $context;
        $this->user = null;
    }

    /**
     * @param \ETCUser\Model\Business\Context $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @return \ETCUser\Model\Business\Context
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
            $description .= ' in ' . $this->getContext()->getName();
        }

        return $description;
    }
} 