<?php

namespace spec\AppBundle\Form\Type;

use AppBundle\File\SymfonyUploadedFile;
use AppBundle\Form\Type\UploadedFileType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Webmozart\Assert\Assert;

class UploadedFileTypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(UploadedFileType::class);
    }

    function it_can_build_a_form(FormBuilderInterface $builder)
    {
        $this->buildForm($builder, []);

        $builder
            ->add('file', FileType::class, [
                'multiple' => false,
            ])
            ->shouldHaveBeenCalled()
        ;
    }

    function it_can_build_a_view(
        FormInterface $form
    )
    {
        $view = new FormView();
        $view->vars['full_name'] = 'qwerty';

        $this->buildView($view, $form, []);

        Assert::same(
            $view->vars['full_name'],
            'qwerty[file]'
        );
    }

    function it_can_correctly_configure_options(
        OptionsResolver $resolver
    )
    {
        $this->configureOptions($resolver);

        $resolver
            ->setDefaults([
                'data_class' => SymfonyUploadedFile::class
            ])
            ->shouldHaveBeenCalled()
        ;
    }
}
