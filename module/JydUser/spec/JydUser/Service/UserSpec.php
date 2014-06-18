<?php

namespace spec\JydUser\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('JydUser\Service\User');
    }
}
