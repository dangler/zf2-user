<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/19/14
 * Time: 9:57 PM
 */

namespace spec\EtcUser\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use EtcUser\Entity\Context;
use EtcUser\Entity\Role;
use EtcUser\Entity\User;

class ProxySpec extends ObjectBehavior
{
    function let(\ETCUser\Model\Business\Role $role)
    {
        $role->getName()->willReturn('TestRole');
        $this->beConstructedWith('0', 'TestProxy', $role );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('EtcUser\Entity\Proxy');
    }

    function it_can_not_set_context(Context $context)
    {
        $this->shouldThrow('Exception')->duringSetContext($context);
    }
}