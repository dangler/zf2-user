<?php

namespace EtcUser\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use EtcUser\Service\User as UserService;

class IndexController extends AbstractActionController
{
    private $userService;

    public function indexAction()
    {
        echo '<pre>';
        print_r($this->getUserService()->getUserMapper()->findById('E00152611'));
        die();

        return new ViewModel();
    }

    public function getUserService()
    {
        if (null === $this->userService) {
            $this->setUserService($this->getServiceLocator()->get('etcuser_user_service'));
        }
        return $this->userService;
    }

    public function setUserService(UserService $userService)
    {
        $this->userService = $userService;
    }

}

