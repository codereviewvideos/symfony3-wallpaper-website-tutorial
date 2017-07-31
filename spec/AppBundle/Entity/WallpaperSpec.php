<?php

namespace spec\AppBundle\Entity;

use AppBundle\Entity\Wallpaper;
use AppBundle\Model\FileInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WallpaperSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Wallpaper::class);
    }

    function it_sets_the_updated_at_timestamp_when_setting_a_file(
        FileInterface $file
    )
    {
        $this->getUpdatedAt()->shouldBe(null);

        $this
            ->setFile($file)
            ->shouldReturnAnInstanceOf(Wallpaper::class)
        ;

        $this
            ->getUpdatedAt()
            ->shouldReturnAnInstanceOf(\DateTime::class)
        ;
    }
}
