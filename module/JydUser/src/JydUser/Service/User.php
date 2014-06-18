<?php

namespace JydUser\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Doctrine\ORM\EntityManager;

class User implements ServiceLocatorAwareInterface
{
    /**
     * @var ServiceLocatorInterface
     */
    protected $services;

    /**
     * Set service locator
     *
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->services = $serviceLocator;
    }

    /**
     * Get service locator
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->services;
    }

    /**
     * @param $domain
     * @return JydUser/Entity/User
     */
    public function getUserForDomainAccount($domain)
    {
        /** @var EntityManager $em */
        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        return $em->getRepository('JydUser\Entity\User')->findBy(array('domain' => $domain));
    }
}
