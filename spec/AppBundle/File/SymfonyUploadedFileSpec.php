<?php

namespace spec\AppBundle\File;

use AppBundle\File\SymfonyUploadedFile;
use AppBundle\Model\FileInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SymfonyUploadedFileSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(SymfonyUploadedFile::class);
        $this->shouldHaveType(FileInterface::class);
    }
}
