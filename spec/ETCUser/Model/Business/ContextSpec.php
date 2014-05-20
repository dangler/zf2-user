<?php
/**
 * Created by PhpStorm.
 * User: jdangler
 * Date: 5/17/14
 * Time: 10:04 PM
 */

namespace spec\ETCUser\Model\Business;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ContextSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(1, 'Test');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('ETCUser\Model\Business\Context');
    }
}