<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 6/2/14
 * Time: 9:49 PM
 */

namespace EtcUser\Factory;

use Zend\ServiceManager\FactoryInterface;
use EtcUser\Mapper\RoleMapper;
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

        $mapper = new RoleMapper();

        // TODO: set dbAdapter
        $mapper->setDbAdapter($adapter);

        // TODO: set table name in mapper

        return $mapper;
    }
}