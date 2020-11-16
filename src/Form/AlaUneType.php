<?php

namespace App\Form;

use App\Entity\AlaUne;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlaUneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('auteur')
            ->add('createdAt')
            ->add('images', FileType::class, [
                'label'=>false, 
                'multiple'=>true,
                'mapped'=>false,
                'required'=>true]
              );
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AlaUne::class,
        ]);
    }
}
