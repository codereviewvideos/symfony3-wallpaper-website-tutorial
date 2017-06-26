<?php

namespace AppBundle\Service;

interface FileMover
{
    public function move($existingFilePath, $newFilePath);
}