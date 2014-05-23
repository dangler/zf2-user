<?php

namespace spec\EtcUser\Mapper;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserMapperSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('EtcUser\Mapper\UserMapper');
    }
}
