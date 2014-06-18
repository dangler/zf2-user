<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/19/14
 * Time: 9:57 PM
 */

namespace spec\JydUser\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use JydUser\Entity\Role as Role;

class ProxySpec extends ObjectBehavior
{
    function let(Role $role)
    {
        $role->getName()->willReturn('TestRole');
        $this->beConstructedWith('0', 'TestProxy', $role );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('JydUser\Entity\Proxy');
    }

    function it_can_not_set_context()
    {

    }
}