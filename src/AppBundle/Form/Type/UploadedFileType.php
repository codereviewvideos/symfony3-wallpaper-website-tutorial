<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Wallpaper;
use AppBundle\File\SymfonyUploadedFile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UploadedFileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', FileType::class, [
                'multiple' => false,
            ])
        ;
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['full_name'] = $view->vars['full_name'] . '[file]';

        /**
         * @var $entity Wallpaper
         */
        $entity = $form->getParent()->getData();

        if ($entity instanceof Wallpaper) {
            $view->vars['file_uri'] = (null === $entity->getFilename())
                ? null
                : '/images/' . $entity->getFilename()
            ;
        }
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'data_class' => SymfonyUploadedFile::class,
                'file_uri'   => null,
            ])
        ;
    }

}

