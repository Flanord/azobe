<?php

namespace App\Form;

use App\Entity\AppelProjet;
use App\Entity\Secteur;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AppelProjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add ('secteur', EntityType::class, [
                'class'=>Secteur::class,
                'choice_label'=>'nom'
            ])
            ->add('description',CKEditorType::class)
            ->add('start_date')
            ->add('end_date')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AppelProjet::class,
        ]);
    }
}
