<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 6/3/14
 * Time: 8:58 PM
 */

namespace EtcUser\Hydrator;


use EtcUser\Hydrator\Strategy\DbEmailStrategy;
use Zend\Stdlib\Hydrator\ClassMethods;


class UserHydrator extends ClassMethods
{
    public function __construct($underscoreSeparatedKeys = true)
    {
        $this->addStrategy('emails', new DbEmailStrategy());
        parent::__construct($underscoreSeparatedKeys);
    }
} 