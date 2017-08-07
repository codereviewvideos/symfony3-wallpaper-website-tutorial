<?php

namespace AppBundle\Event\Listener;

use AppBundle\Entity\Wallpaper;
use AppBundle\Service\FileMover;
use AppBundle\Service\ImageFileDimensionsHelper;
use AppBundle\Service\WallpaperFilePathHelper;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class WallpaperListener
{
    /**
     * @var FileMover
     */
    private $fileMover;
    /**
     * @var WallpaperFilePathHelper
     */
    private $wallpaperFilePathHelper;
    /**
     * @var ImageFileDimensionsHelper
     */
    private $imageFileDimensionsHelper;

    public function __construct(
        FileMover $fileMover,
        WallpaperFilePathHelper $wallpaperFilePathHelper,
        ImageFileDimensionsHelper $imageFileDimensionsHelper
    )
    {
        $this->fileMover = $fileMover;
        $this->wallpaperFilePathHelper = $wallpaperFilePathHelper;
        $this->imageFileDimensionsHelper = $imageFileDimensionsHelper;
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        return $this->upload(
            $eventArgs->getEntity()
        );
    }

    public function preUpdate(PreUpdateEventArgs $eventArgs)
    {
        return $this->upload(
            $eventArgs->getEntity()
        );
    }

    private function upload($entity)
    {
        // if not Wallpaper entity, return false
        if (false === $entity instanceof Wallpaper) {
            return false;
        }

        /**
         * @var $entity Wallpaper
         */

        $file = $entity->getFile();

        $newFileLocation = $this->wallpaperFilePathHelper->getNewFilePath(
            $file->getFilename()
        );

        // got here
        $this->fileMover->move(
            $file->getPathname(),
            $newFileLocation
        );

        $this->imageFileDimensionsHelper->setImageFilePath($newFileLocation);

        $entity
            ->setFilename(
                $file->getFilename()
            )
            ->setHeight(
                $this->imageFileDimensionsHelper->getHeight()
            )
            ->setWidth(
                $this->imageFileDimensionsHelper->getWidth()
            )
        ;

        return $entity;
    }

    public function preRemove($argument1)
    {
        // TODO: write logic here
    }
}
