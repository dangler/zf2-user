<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/18/14
 * Time: 8:33 PM
 */

namespace ETCUser\Model;

use ETCUser\Model\Role as Role;
use ETCUser\Model\User as User;
use Exception;

class Proxy extends Role
{
    /**
     * @var Role
     */
    private $role;

    /**
     * @param int $id
     * @param string $name
     * @param User $user
     * @param Role $role
     */
    function __construct($id, $name, User &$user, Role $role)
    {
        $this->role = $role;
        parent::__construct($id, $name, $user);
    }

    /**
     * Not allowed to set context, assumed to be context of role being proxied
     *
     * @param Context $context
     * @throws Exception
     */
    public function setContext($context)
    {
        throw new Exception('Not allowed to set context for proxy, assumed context is the role being proxied');
    }

    /**
     * Context is assumed to be same as role being proxied
     *
     * @return Context
     */
    public function getContext()
    {
        return $this->role->getContext();
    }

    /**
     * @param \ETCUser\Model\Role $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return \ETCUser\Model\Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Returns a string that describe the role with context.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getName() . ' as ' . $this->getRole()->getName();
    }


} 