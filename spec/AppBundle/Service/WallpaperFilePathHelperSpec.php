<?php

namespace spec\AppBundle\Service;

use AppBundle\Service\WallpaperFilePathHelper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WallpaperFilePathHelperSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('/new/path/to/');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(WallpaperFilePathHelper::class);
    }

    function it_can_get_a_new_file_path_when_given_a_filename()
    {
        $this
            ->getNewFilePath('some/file.name')
            ->shouldReturn('/new/path/to/some/file.name')
        ;
    }

    function it_gracefully_handles_no_trailing_slash_in_the_constructor_argument()
    {
        $this->beConstructedWith('/whoops/no/trailing/slash');

        $this
            ->getNewFilePath('some/file.name')
            ->shouldReturn('/whoops/no/trailing/slash/some/file.name')
        ;
    }

    function it_removes_leading_slash_in_new_file_path()
    {
        $this
            ->getNewFilePath('/another/file.name')
            ->shouldReturn('/new/path/to/another/file.name')
        ;
    }

    function it_throws_if_not_constructed_properly()
    {
        $this->beConstructedWith();

        $this->shouldThrow()->duringInstantiation();
    }
}
