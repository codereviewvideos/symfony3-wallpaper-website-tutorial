<?php

namespace spec\AppBundle\Form\DataTransformer;

use AppBundle\Form\DataTransformer\FileTransformer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\DataTransformerInterface;

class FileTransformerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(FileTransformer::class);
        $this->shouldImplement(DataTransformerInterface::class);
    }

    function it_can_transform_1()
    {
        $file = null;

        $this->transform($file)->shouldReturn([
            'file' => $file,
        ]);
    }

    function it_can_transform_2()
    {
        $file = '123';

        $this->transform($file)->shouldReturn([
            'file' => $file,
        ]);
    }

    function it_can_reverse_transform_1()
    {
        $data = [
            'file' => null,
        ];

        $this->reverseTransform($data)->shouldReturn(null);
    }

    function it_can_reverse_transform_2()
    {
        $data = [
            'file' => 'abc',
        ];

        $this->reverseTransform($data)->shouldReturn('abc');
    }
}
