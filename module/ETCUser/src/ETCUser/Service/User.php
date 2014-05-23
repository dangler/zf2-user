<?php

namespace EtcUser\Service;

use EtcUser\EventManager\EventProvider;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use EtcUser\Mapper\UserMapper;

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
}
