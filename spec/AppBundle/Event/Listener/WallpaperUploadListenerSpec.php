<?php

namespace spec\AppBundle\Event\Listener;

use AppBundle\Entity\Category;
use AppBundle\Entity\Wallpaper;
use AppBundle\Event\Listener\WallpaperUploadListener;
use AppBundle\Service\FileMover;
use AppBundle\Model\FileInterface;
use AppBundle\Service\WallpaperFilePathHelper;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WallpaperUploadListenerSpec extends ObjectBehavior
{
    private $fileMover;
    private $wallpaperFilePathHelper;

    function let(FileMover $fileMover, WallpaperFilePathHelper $wallpaperFilePathHelper)
    {
        $this->beConstructedWith($fileMover);

        $this->fileMover = $fileMover;
        $this->wallpaperFilePathHelper = $wallpaperFilePathHelper;
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(WallpaperUploadListener::class);
    }

    function it_returns_early_if_prePersist_LifecycleEventArgs_entity_is_not_a_Wallpaper_instance(
        LifecycleEventArgs $eventArgs
    )
    {
        $eventArgs->getEntity()->willReturn(new Category());

        $this->prePersist($eventArgs)->shouldReturn(false);

        $this->fileMover->move(
            Argument::any(),
            Argument::any()
        )->shouldNotHaveBeenCalled();
    }

    function it_can_prePersist(
        LifecycleEventArgs $eventArgs,
        FileInterface $file
    )
    {
        $fakeTempPath = '/tmp/some.file';
        $fakeFilename = 'some.file';

        $file->getPathname()->willReturn($fakeTempPath);
        $file->getFilename()->willReturn($fakeFilename);

        $wallpaper = new Wallpaper();
        $wallpaper->setFile($file->getWrappedObject());

        $eventArgs->getEntity()->willReturn($wallpaper);

        $fakeNewFileLocation = '/some/new/fake/' . $fakeFilename;
        $this
            ->wallpaperFilePathHelper
            ->getNewfilePath($fakeFilename)
            ->willReturn($fakeNewFileLocation)
        ;

        $this->prePersist($eventArgs)->shouldReturn(true);

        $this->fileMover->move($fakeTempPath, $fakeNewFileLocation)->shouldHaveBeenCalled();
    }

    function it_can_preUpdate(PreUpdateEventArgs $eventArgs)
    {
        $this->preUpdate($eventArgs);
    }
}
