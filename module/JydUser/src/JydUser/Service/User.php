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

    /**
     * @param $id
     * @return JydUser/Entity/User
     */
    public function getUserForId($id)
    {
        /** @var EntityManager $em */
        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm.default');
        return $em->getRepository('JydUser\Entity\User')->find($id);
    }

    /**
     * @param $domain
     * @param $firstName
     * @param $lastName
     * @param $middleName
     *
     * @return JydUser/Entity/User
     */
    public function createNewUser($domain, $firstName, $lastName, $middleName)
    {
        $user = new \JydUser\Entity\User();
        $user->setDomain($domain);
        $user->setFirstName($firstName);
        $user->setMiddleName($middleName);
        $user->setLastName($lastName);

        /** @var EntityManager $em */
        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm.default');
        $em->persist($user);

        return $em->getRepository('JydUser\Entity\User')->find($id);
    }
}
