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
use Zend\Db\Adapter;

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
        // TODO: get dbAdapter from the serviceLocator, need to add dbAdapter to serviceManager
        $adapter = new Adapter\Adapter(array(
            'driver' => 'PDO_PGSQL',
            'database' => 'etc_user',
            'username' => 'dangler',
            'password' => 'password'
        ));

        $mapper = new UserMapper();

        // TODO: set dbAdapter
        $mapper->setDbAdapter($adapter);

        // TODO: set table name in mapper

        return $mapper;
    }
}