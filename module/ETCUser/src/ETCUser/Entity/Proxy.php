<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/18/14
 * Time: 8:33 PM
 */

namespace EtcUser\Entity;

use EtcUser\Entity\Context as Context;
use EtcUser\Entity\Role as Role;
use EtcUser\Entity\User as User;
use Exception;

class Proxy extends Role
{
    /**
     * @var Role
     */
    private $role;

    /**
     * Not allowed to set context, assumed to be context of role being proxied
     *
     * @param string $context
     */
    public function setContext($context)
    {
        return;
    }

    /**
     * Context is assumed to be same as role being proxied
     *
     * @return string
     */
    public function getContext()
    {
        return $this->role->getContext();
    }

    /**
     * @param \EtcUser\Entity\Role $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return \EtcUser\Entity\Role
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