<?php

namespace AppBundle\Service;

use Symfony\Component\Filesystem\Filesystem;

class FileMover
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function move($existingFilePath, $newFilePath)
    {
        $this->filesystem->rename($existingFilePath, $newFilePath);

        return true;
    }
}
