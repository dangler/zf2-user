<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/17/14
 * Time: 9:57 PM
 */

namespace ETCUser\Model;

use ETCUser\Model\Context as Context;
use ETCUser\Model\User as User;

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
     * @var Context
     */
    private $context;

    /**
     * @var
     */
    private $user;

    /**
     * @param $id
     * @param $name
     * @param User $user
     * @param Context $context
     */
    function __construct($id, $name, User &$user, Context $context = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->context = $context;
    }

    /**
     * @param \ETCUser\Model\Context $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @return \ETCUser\Model\Context
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
     * Returns a string that describe the role with context.
     *
     * @return string
     */
    public function getDescription()
    {
        if ($this->getContext() === null){
            return $this->getName();
        }

        return $this->name . ' in ' . $this->getContext()->getName();
    }
} 