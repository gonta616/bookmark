<?php

namespace AppBundle\Form;

use AppBundle\Entity\Item;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array(
                'label' => 'item.title'
            ))
            ->add('content', TextareaType::class, array(
                'label' => 'item.content'
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'item.save'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Item',
        ));
    }
}
