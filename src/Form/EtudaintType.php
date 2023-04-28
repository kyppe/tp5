<?php

namespace App\Form;

use App\Entity\Etudaint;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class EtudaintType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mone')
            ->add('instit', EntityType::class,array
            ('class'=>'gestscolBundle:institut',
            'choice_label' => 'nomi',
            'choice_value' => 'id'
        ));

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudaint::class,
        ]);
    }
}
