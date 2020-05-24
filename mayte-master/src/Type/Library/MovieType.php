<?php

namespace App\Type\Library;

use App\Entity\Library\Movie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->setAttribute('class', 'col-md-4')
            ->add('title', TextType::class, [
                'attr' => [
                    'required' => true,
                ]
            ])
            ->add('rated', TextType::class, [
                'attr' => [
                    'required' => true,
                ]
            ])
            ->add('released', DateType::class, [
                'attr' => [
                    'required' => true,
                ],
                'widget' => 'single_text'
            ])
            ->add('runtime', IntegerType::class, [
                'attr' => [
                    'required' => true,
                ]
            ])
            ->add('genre', TextType::class, [
                'attr' => [
                    'required' => true,
                ]
            ])
            ->add('director', TextType::class, [
                'attr' => [
                    'required' => true,
                ]
            ])
            ->add('writer', TextareaType::class, [
                'attr' => [
                    'required' => true,
                ]
            ])

            ->add('actors', TextareaType::class, [
                'attr' => [
                    'required' => true,
                ]
            ])

            ->add('plot', TextareaType::class, [
                'attr' => [
                    'required' => true,
                ]
            ])

            ->add('language', TextType::class, [
                'attr' => [
                    'required' => true,
                ]
            ])
            ->add('country', TextType::class, [
                'attr' => [
                    'required' => true,
                ]
            ])
            ->add('awards', TextareaType::class, [
                'attr' => [
                    'required' => true,
                ]
            ])

            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-lg btn-primary btn-block',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }

}