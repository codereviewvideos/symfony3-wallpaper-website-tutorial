<?php

namespace AppBundle\Event\Listener;

use AppBundle\Entity\Wallpaper;
use AppBundle\Service\FileMover;
use AppBundle\Service\WallpaperFilePathHelper;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class WallpaperUploadListener
{
    /**
     * @var FileMover
     */
    private $fileMover;
    /**
     * @var WallpaperFilePathHelper
     */
    private $wallpaperFilePathHelper;

    public function __construct(FileMover $fileMover, WallpaperFilePathHelper $wallpaperFilePathHelper)
    {
        $this->fileMover = $fileMover;
        $this->wallpaperFilePathHelper = $wallpaperFilePathHelper;
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $entity = $eventArgs->getEntity();

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


        //   - update the entity with additonal info

        return true;
    }

    public function preUpdate(PreUpdateEventArgs $eventArgs)
    {
    }
}
