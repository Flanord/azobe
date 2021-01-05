<?php

namespace App\Form;

use App\Entity\Actif;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('auteur')
            ->add('createdAt')
            ->add('imageActifs',FileType::class, [
                'label'=>false,
                'multiple'=>true,
                'mapped'=>false,
                'required'=>true])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actif::class,
        ]);
    }
}
