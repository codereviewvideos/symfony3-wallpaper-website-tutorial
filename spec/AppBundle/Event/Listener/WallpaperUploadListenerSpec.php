<?php

namespace spec\AppBundle\Event\Listener;

use AppBundle\Event\Listener\WallpaperUploadListener;
use AppBundle\Service\FileMover;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WallpaperUploadListenerSpec extends ObjectBehavior
{
    private $fileMover;

    function let(FileMover $fileMover)
    {
        $this->beConstructedWith($fileMover);

        $this->fileMover = $fileMover;
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(WallpaperUploadListener::class);
    }

    function it_can_prePersist(LifecycleEventArgs $eventArgs)
    {

        $fakeTempPath = '/tmp/some.file';
        $fakeRealPath =  '/path/to/my/project/some.file';

        $this->prePersist($eventArgs);

        $this->fileMover->move($fakeTempPath, $fakeRealPath)->shouldHaveBeenCalled();
    }

    function it_can_preUpdate(PreUpdateEventArgs $eventArgs)
    {
        $this->preUpdate($eventArgs);
    }
}
