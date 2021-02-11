<?php

namespace App\Form;

use App\Entity\AzobeChiffre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AzobeChiffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('acteur_repertories')
            ->add('action_concretises')
            ->add('evenement_organises')
            ->add('appele_projets')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AzobeChiffre::class,
        ]);
    }
}
