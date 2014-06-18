<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/17/14
 * Time: 10:05 PM
 */

namespace spec\JydUser\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use JydUser\Entity\User as User;

class RoleSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(1, 'TestRole');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('JydUser\Entity\Role');
    }

    function it_can_set_context()
    {
        $this->setContext('TestContext');
        $this->getContext()->shouldReturn('TestContext');
    }

    function it_can_return_description(User $user)
    {
        $this->getDescription()->shouldReturn('TestRole');

        $this->setContext('TestContext');
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