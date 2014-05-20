<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/19/14
 * Time: 9:57 PM
 */

namespace spec\ETCUser\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use ETCUser\Model\Context;
use ETCUser\Model\Role;
use ETCUser\Model\User;

class ProxySpec extends ObjectBehavior
{
    function let(User $user, Role $role)
    {
        $role->getName()->willReturn('TestRole');
        $this->beConstructedWith('0', 'TestProxy', &$user, $role );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('ETCUser\Model\Proxy');
    }

    function it_can_not_set_context(Context $context)
    {
        $this->shouldThrow('Exception')->duringSetContext($context);
    }
}