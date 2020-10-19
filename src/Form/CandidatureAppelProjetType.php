<?php

namespace App\Form;

use App\Entity\CandidatureAppelProjet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatureAppelProjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('email')
            ->add('numero_tel')
            ->add('fiche_projet')
            ->add('fiche_budjet')
            ->add('recepisse')
            ->add('statut')
            ->add('proce_verbal')
            ->add('url_site')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CandidatureAppelProjet::class,
        ]);
    }
}
