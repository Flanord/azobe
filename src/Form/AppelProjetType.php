<?php

namespace App\Form;

use App\Entity\AppelProjet;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\DomCrawler\Field\InputFormField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AppelProjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('start_date')
            ->add('end_date')
            ->add('secteur')
            ->add('user')
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
            'data_class' => AppelProjet::class,
        ]);
    }
}
