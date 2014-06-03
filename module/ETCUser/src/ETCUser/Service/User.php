<?php

namespace EtcUser\Service;

use EtcUser\EventManager\EventProvider;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use EtcUser\Mapper\UserMapper;
use EtcUser\Mapper\RoleMapper;

class User extends EventProvider implements ServiceManagerAwareInterface
{
    /**
     * @var ServiceManager
     */
    protected $serviceManager;

    /**
     * @var UserMapper
     */
    protected $userMapper;

    /**
     * @var RoleMapper
     */
    protected $roleMapper;

    /**
     * Set service manager instance
     *
     * @param ServiceManager $serviceManager
     * @return User
     */
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
        return $this;
    }

    /**
     * @return \EtcUser\Mapper\UserMapper
     */
    public function getUserMapper()
    {
        if (null === $this->userMapper) {
            $this->setUserMapper($this->serviceManager->get('etcuser_user_mapper'));
        }
        return $this->userMapper;
    }

    /**
     * @param \EtcUser\Mapper\UserMapper $userMapper
     */
    public function setUserMapper($userMapper)
    {
        $this->userMapper = $userMapper;
    }

    /**
     * @param \EtcUser\Mapper\RoleMapper $roleMapper
     */
    public function setRoleMapper($roleMapper)
    {
        if (null === $this->roleMapper) {
            $this->setRoleMapper($this->serviceManager->get('etcuser_role_mapper'));
        }
        $this->roleMapper = $roleMapper;
    }

    /**
     * @return \EtcUser\Mapper\RoleMapper
     */
    public function getRoleMapper()
    {
        return $this->roleMapper;
    }
}
