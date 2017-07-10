<?php

namespace spec\AppBundle\Service;

use AppBundle\Service\ImageFileDimensionsHelper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ImageFileDimensionsHelperSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ImageFileDimensionsHelper::class);
    }
}
