<?php

namespace AppBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class FileTransformer
 * @package AppBundle\Form\DataTransformer
 */
class FileTransformer implements DataTransformerInterface
{
    /**
     * @param null $file
     * @return array
     */
    public function transform($file = null)
    {
        return [
            'file' => $file
        ];
    }

    /**
     * @param mixed $data
     * @return mixed
     */
    public function reverseTransform($data)
    {
        return $data['file'];
    }
}