<?php

namespace spec\EtcUser\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('EtcUser\Service\User');
    }
}
