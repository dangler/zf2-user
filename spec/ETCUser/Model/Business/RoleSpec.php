<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/17/14
 * Time: 10:05 PM
 */

namespace spec\ETCUser\Model\Business;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use ETCUser\Model\Business\Context as Context;
use ETCUser\Model\Business\User as User;

class RoleSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(1, 'TestRole');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('ETCUser\Model\Business\Role');
    }

    function it_can_set_context(\ETCUser\Model\Business\Context $context)
    {
        $this->setContext($context);
        $this->getContext()->shouldReturn($context);
    }

    function it_can_return_description(Context $context, User $user)
    {
        $this->getDescription()->shouldReturn('TestRole');

        $context->getName()->willReturn('TestContext');
        $this->setContext($context);
        $this->getDescription()->shouldReturn('TestRole in TestContext');

        /*
         * Can't test pass by reference
         *
        $user->getName()->willReturn('TestName');
        $this->setUser(&$user);
        $this->getDescription()->shouldReturn('TestName as TestRole in TestContext');

        */
    }
}