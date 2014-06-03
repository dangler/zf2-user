<?php
namespace EtcUser;

class Module
{

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                'etcuser_user_service'  => 'EtcUser\Service\User',
            ),
            'factories' => array(
                // factory using abstract factory
                'etcuser_user_mapper'   => 'EtcUser\Factory\UserMapperFactory',
                'etcuser_role_mapper'   => 'EtcUser\Factory\RoleMapperFactory'
            ),
        );
    }
}
