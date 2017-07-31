<?php

namespace spec\AppBundle\Event\Listener;

use AppBundle\Entity\Category;
use AppBundle\Entity\Wallpaper;
use AppBundle\Event\Listener\WallpaperListener;
use AppBundle\Service\FileMover;
use AppBundle\Model\FileInterface;
use AppBundle\Service\ImageFileDimensionsHelper;
use AppBundle\Service\WallpaperFilePathHelper;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WallpaperListenerSpec extends ObjectBehavior
{
    private $fileMover;
    private $wallpaperFilePathHelper;
    private $imageFileDimensionsHelper;

    function let(
        FileMover $fileMover,
        WallpaperFilePathHelper $wallpaperFilePathHelper,
        ImageFileDimensionsHelper $imageFileDimensionsHelper
    )
    {
        $this->beConstructedWith($fileMover, $wallpaperFilePathHelper, $imageFileDimensionsHelper);

        $this->fileMover = $fileMover;
        $this->wallpaperFilePathHelper = $wallpaperFilePathHelper;
        $this->imageFileDimensionsHelper = $imageFileDimensionsHelper;
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(WallpaperListener::class);
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
            ->getNewFilePath($fakeFilename)
            ->willReturn($fakeNewFileLocation)
        ;

        $this->imageFileDimensionsHelper->setImageFilePath($fakeNewFileLocation)->shouldBeCalled();
        $this->imageFileDimensionsHelper->getWidth()->willReturn(1024);
        $this->imageFileDimensionsHelper->getHeight()->willReturn(768);

        $outcome = $this->prePersist($eventArgs);

        $this->fileMover->move($fakeTempPath, $fakeNewFileLocation)->shouldHaveBeenCalled();

        $outcome->shouldBeAnInstanceOf(Wallpaper::class);
        $outcome->getFilename()->shouldReturn($fakeFilename);
        $outcome->getWidth()->shouldReturn(1024);
        $outcome->getHeight()->shouldReturn(768);
    }

    function it_returns_early_if_preUpdate_LifecycleEventArgs_entity_is_not_a_Wallpaper_instance(
        PreUpdateEventArgs $eventArgs
    )
    {
        $eventArgs->getEntity()->willReturn(new Category());

        $this->preUpdate($eventArgs)->shouldReturn(false);

        $this->fileMover->move(
            Argument::any(),
            Argument::any()
        )->shouldNotHaveBeenCalled();
    }

    function it_can_preUpdate(
        PreUpdateEventArgs $eventArgs,
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
            ->getNewFilePath($fakeFilename)
            ->willReturn($fakeNewFileLocation)
        ;

        $this->imageFileDimensionsHelper->setImageFilePath($fakeNewFileLocation)->shouldBeCalled();
        $this->imageFileDimensionsHelper->getWidth()->willReturn(1024);
        $this->imageFileDimensionsHelper->getHeight()->willReturn(768);

        $outcome = $this->preUpdate($eventArgs);

        $this->fileMover->move($fakeTempPath, $fakeNewFileLocation)->shouldHaveBeenCalled();

        $outcome->shouldBeAnInstanceOf(Wallpaper::class);
        $outcome->getFilename()->shouldReturn($fakeFilename);
        $outcome->getWidth()->shouldReturn(1024);
        $outcome->getHeight()->shouldReturn(768);
    }
}
