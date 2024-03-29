<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BookmarkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url', null, array(
                'label'         => 'bookmark.url',
                'attr'          => array(
                    'class'     => 'url'
                ),
            ))
            ->add('terms', EntityType::class, array(
                'class'         => 'AppBundle:Term',
                'label'         => 'bookmark.term',
                'required'      => false,
                'choice_label'  => 'name',
                'multiple'      => true,
            ))

            ->add('words', CollectionType::class, array(
                'entry_type' => WordType::class,
                'allow_add'     => true,
                'allow_delete'  => true,
                'prototype'     => true,
                'required'      => false,
                'attr'          => array(
                    'class' => 'word-collection',
                ),
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'bookmark.save'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Bookmark',
        ));
    }
}
