<?php

namespace AppBundle\Form\DataTransformer;

use Psr\Log\LoggerInterface;
use Symfony\Component\Form\DataTransformerInterface;

class FileTransformer implements DataTransformerInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * converts the data used in code to a format that can be rendered in the form
     *
     * @var mixed|null $file
     */
    public function transform($file = null)
    {
//        dump('transform');
//        dump($file);

        $this->logger->debug('transformer', [
            'file' => $file,
        ]);

        return [
            'file' => $file
        ];
    }

    /**
     * converts the data from the form submission to a format that can be used in code
     *
     * @var array $data
     */
    public function reverseTransform($data)
    {
//        dump('reverseTransform');
//        dump($data);

        $this->logger->debug('reverseTransform', [
            'data' => $data,
        ]);

        return $data['file'];
    }
}