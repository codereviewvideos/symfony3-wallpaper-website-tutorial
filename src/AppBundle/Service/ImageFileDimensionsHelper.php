<?php

namespace AppBundle\Service;

class ImageFileDimensionsHelper
{
    private $filepath;
    private $imageSizeAttributes;

    public function setImageFilePath(string $filepath)
    {
        $this->filepath = $filepath;

        $this->imageSizeAttributes = getimagesize($filepath);
    }

    public function getWidth()
    {
        try {
            return (int) $this->imageSizeAttributes[0];
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function getHeight()
    {
        try {
            return (int) $this->imageSizeAttributes[1];
        } catch (\Exception $e) {
            return 0;
        }
    }
}
