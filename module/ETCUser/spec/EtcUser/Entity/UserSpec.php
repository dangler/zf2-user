<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/17/14
 * Time: 9:30 PM
 */

namespace spec\EtcUser\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use EtcUser\Entity\Role as Role;
use EtcUser\Entity\Context as Context;

class UserSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(0, 'First', 'Middle', 'Last', 'last');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('EtcUser\Entity\User');
    }

    function it_can_add_roles(Role $role)
    {
        // add a role
        $role->getId()->willReturn(0);
        $this->addRole($role);
        $this->getRoles()->shouldHaveCount(1);

        // add the same role
        $this->addRole($role);
        $this->getRoles()->shouldHaveCount(1);

        // add a different role
        $role->getId()->willReturn(1);
        $this->addRole($role);
        $this->getRoles()->shouldHaveCount(2);

    }

    function it_can_check_for_role(Role $role)
    {
        $role->getName()->willReturn('Test');
        $role->getId()->willReturn(0);

        $this->addRole($role);
        $this->hasRole($role)->shouldReturn(true);
    }

    function it_can_check_for_role_and_context(Role $role, Context $context)
    {
        $role->getName()->willReturn('TestRole');
        $role->getId()->willReturn(0);
        $role->getContext()->willReturn($context);
        $context->getName()->willReturn('TestContext');

        $this->addRole($role);
        $this->hasRoleForContext($role, $context)->shouldReturn(true);
    }

    function it_can_return_full_name()
    {
        $this->getName()->shouldReturn('First M Last');
    }

    function it_will_not_allow_bad_emails()
    {
        $this->shouldThrow('Exception')->duringAddEmail('bademail');
    }

}