<?php

namespace AppBundle\Service;

interface FileDeleter
{
    public function delete(string $pathToFile);
}