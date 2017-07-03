<?php

namespace AppBundle\Model;

interface FileInterface
{
    public function getExistingFilePath();
    public function getNewFilePath();
}
