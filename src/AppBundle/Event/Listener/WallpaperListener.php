<?php

namespace AppBundle\Event\Listener;

use AppBundle\Entity\Wallpaper;
use AppBundle\Service\FileDeleter;
use AppBundle\Service\FileMover;
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
     * @var FileDeleter
     */
    private $fileDeleter;

    public function __construct(
        FileMover $fileMover,
        WallpaperFilePathHelper $wallpaperFilePathHelper,
        FileDeleter $fileDeleter
    )
    {
        $this->fileMover = $fileMover;
        $this->wallpaperFilePathHelper = $wallpaperFilePathHelper;
        $this->fileDeleter = $fileDeleter;
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $entity = $eventArgs->getEntity();

        $this->upload($entity);
    }

    public function preUpdate(PreUpdateEventArgs $eventArgs)
    {
        $this->upload(
            $eventArgs->getEntity()
        );
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

    private function upload($entity)
    {
        // if not Wallpaper entity, return false
        if (false === $entity instanceof Wallpaper) {
            return false;
        }

        /**
         * @var $entity Wallpaper
         */

        // get access to the file
        $file = $entity->getFile();

        $temporaryLocation = $file->getPathname();

        $newFileLocation = $this->wallpaperFilePathHelper->getNewFilePath(
            $file->getClientOriginalName()
        );

        // todo:
        //   - move the uploaded file
        $this->fileMover->move($temporaryLocation, $newFileLocation);


        //   - update the entity with additional info
        [
            0 => $width,
            1 => $height,
        ] = getimagesize($newFileLocation);

        $entity
            ->setFilename(
                $file->getClientOriginalName()
            )
            ->setHeight($height)
            ->setWidth($width)
        ;

        return true;
    }
}
