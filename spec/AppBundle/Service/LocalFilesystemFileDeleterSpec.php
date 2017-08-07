<?php

namespace spec\AppBundle\Service;

use AppBundle\Service\FileDeleter;
use AppBundle\Service\LocalFilesystemFileDeleter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Filesystem\Filesystem;

class LocalFilesystemFileDeleterSpec extends ObjectBehavior
{
    private $filesystem;

    function let(Filesystem $filesystem)
    {
        $this->beConstructedWith($filesystem, '/expected/path');

        $this->filesystem = $filesystem;
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(LocalFilesystemFileDeleter::class);
        $this->shouldImplement(FileDeleter::class);
    }

    function it_can_delete()
    {
        $this->delete('to/some-file.jpg');

        $this
            ->filesystem
            ->remove('/expected/path/to/some-file.jpg')
            ->shouldHaveBeenCalled()
        ;
    }
}
