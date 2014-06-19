<?php

namespace JydUser\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use JydUser\Service\User as UserService;

class IndexController extends AbstractActionController
{
    /**
     * @var UserService
     */
    private $userService;

    public function indexAction()
    {
        $user = $this->getUserService()->createNewUser('moore', 'Preston', 'Moore', '');
        echo '<pre>'; print_r($user); die();
        return new ViewModel();
    }

    public function getUserService()
    {
        if (null === $this->userService) {
            $this->setUserService($this->getServiceLocator()->get('jyduser_user_service'));
        }
        return $this->userService;
    }

    public function setUserService(UserService $userService)
    {
        $this->userService = $userService;
    }

}

