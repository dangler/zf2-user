<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 6/2/14
 * Time: 8:57 PM
 */

namespace EtcUser\Hydrator\Strategy;

use Zend\Stdlib\Hydrator\Strategy\DefaultStrategy;

class DbEmailStrategy extends DefaultStrategy
{
    public function hydrate($value) {
        return json_decode($value);
    }

    public function extract($value) {
        return json_encode($value);
    }
} 