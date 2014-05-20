<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/17/14
 * Time: 10:05 PM
 */

namespace spec\ETCUser\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use ETCUser\Model\Context as Context;
use ETCUser\MOdel\User as User;

class RoleSpec extends ObjectBehavior
{
    function let(User $user)
    {
        $this->beConstructedWith(1, 'TestRole', $user);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('ETCUser\Model\Role');
    }

    function it_can_set_context(Context $context)
    {
        $this->setContext($context);
        $this->getContext()->shouldReturn($context);
    }

    function it_can_return_description(Context $context)
    {
        $this->getDescription()->shouldReturn('TestRole');

        $context->getName()->willReturn('TestContext');
        $this->setContext($context);
        $this->getDescription()->shouldReturn('TestRole in TestContext');
    }
}