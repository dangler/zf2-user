<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/19/14
 * Time: 9:57 PM
 */

namespace spec\ETCUser\Model\Business;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use ETCUser\Model\Business\Context;
use ETCUser\Model\Business\Role;
use ETCUser\Model\Business\User;

class ProxySpec extends ObjectBehavior
{
    function let(\ETCUser\Model\Business\Role $role)
    {
        $role->getName()->willReturn('TestRole');
        $this->beConstructedWith('0', 'TestProxy', $role );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('ETCUser\Model\Business\Proxy');
    }

    function it_can_not_set_context(Context $context)
    {
        $this->shouldThrow('Exception')->duringSetContext($context);
    }
}