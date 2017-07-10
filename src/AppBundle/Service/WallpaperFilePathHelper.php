<?php

namespace AppBundle\Service;

class WallpaperFilePathHelper
{
    /**
     * @var string
     */
    private $wallpaperFileDirectory;

    public function __construct(string $wallpaperFileDirectory)
    {
        $this->wallpaperFileDirectory = $this->ensureHasTrailingSlash(
            $wallpaperFileDirectory
        );
    }

    public function getNewFilePath(string $newFileName)
    {
        $newFileName = $this->ensureHasNoLeadingSlash($newFileName);

        return $this->wallpaperFileDirectory . $newFileName;
    }

    private function ensureHasTrailingSlash(string $path)
    {
        if (substr($path, -1) === '/') {
            return $path;
        }

        return $path . '/';
    }

    private function ensureHasNoLeadingSlash(string $path)
    {
        if (substr($path, 0, 1) === '/') {
            return substr($path, 1);
        }

        return $path;
    }
}