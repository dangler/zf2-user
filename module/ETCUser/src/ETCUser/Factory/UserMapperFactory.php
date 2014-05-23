<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/23/14
 * Time: 10:52 AM
 */

namespace EtcUser\Factory;

use Zend\ServiceManager\FactoryInterface;
use EtcUser\Mapper\UserMapper;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserMapperFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = new UserMapper();

        return $mapper;
    }
}