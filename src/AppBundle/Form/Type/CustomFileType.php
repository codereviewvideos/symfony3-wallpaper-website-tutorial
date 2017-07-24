<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Wallpaper;
use AppBundle\Form\DataTransformer\FileTransformer;
use Psr\Log\LoggerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

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

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        /**
         * @var $entity Wallpaper
         */
        $entity = $form->getParent()->getData();

        if ($entity) {
            $view->vars['file_uri'] = (null === $entity->getFilename())
                ? null
                : '/images/' . $entity->getFilename()
            ;
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'file_uri' => null,
        ]);
    }


}