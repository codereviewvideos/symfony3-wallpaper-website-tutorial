<?php

namespace AppBundle\Service;

use Symfony\Component\Filesystem\Filesystem;

class LocalFilesystemFileDeleter implements FileDeleter
{
    /**
     * @var Filesystem
     */
    private $filesystem;
    /**
     * @var string
     */
    private $filePath;

    public function __construct(Filesystem $filesystem, string $filePath)
    {
        $this->filesystem = $filesystem;
        $this->filePath = $filePath;
    }

    public function delete(string $pathToFile)
    {
        $this->filesystem->remove(
            $this->filePath . '/' . $pathToFile
        );
    }
}