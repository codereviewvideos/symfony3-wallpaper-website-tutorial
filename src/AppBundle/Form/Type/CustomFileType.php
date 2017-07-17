<?php

namespace AppBundle\Form\Type;

use AppBundle\Form\DataTransformer\FileTransformer;
use Psr\Log\LoggerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;

class CustomFileType extends AbstractType
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', FileType::class)
        ;

        $builder
            ->addViewTransformer(
                new FileTransformer(
                    $this->logger
                )
            )
        ;
    }

}