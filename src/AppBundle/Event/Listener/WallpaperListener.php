<?php

namespace AppBundle\Event\Listener;

use AppBundle\Entity\Wallpaper;
use AppBundle\Service\FileDeleter;
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
    /**
     * @var FileDeleter
     */
    private $fileDeleter;

    public function __construct(
        FileMover $fileMover,
        WallpaperFilePathHelper $wallpaperFilePathHelper,
        ImageFileDimensionsHelper $imageFileDimensionsHelper,
        FileDeleter $fileDeleter
    )
    {
        $this->fileMover = $fileMover;
        $this->wallpaperFilePathHelper = $wallpaperFilePathHelper;
        $this->imageFileDimensionsHelper = $imageFileDimensionsHelper;
        $this->fileDeleter = $fileDeleter;
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

        if ($entity->getFilename() !== null) {
            $this->fileDeleter->delete(
                $entity->getFilename()
            );
        }

        $file = $entity->getFile();

        $newFileLocation = $this->wallpaperFilePathHelper->getNewFilePath(
            $file->getFilename()
        );

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

    public function preRemove(LifecycleEventArgs $eventArgs)
    {
        /**
         * @var $entity Wallpaper
         */
        $entity = $eventArgs->getEntity();

        if (false === $entity instanceof Wallpaper) {
            return false;
        }

        $entity->setFile(null);

        $this->fileDeleter->delete(
            $entity->getFilename()
        );
    }
}
