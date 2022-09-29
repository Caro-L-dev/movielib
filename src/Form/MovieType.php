<?php

namespace App\Form;

use App\Entity\Movie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, [
                'label' => 'Titre',
                'attr' => array(
                    'placeholder' => 'Nom du film'
                )
            ])
            ->add('realisateur', null,[
                'label' => 'Réalisateur',
                'attr' => array(
                    'placeholder' => 'Nom du réalisateur'
                )
            ])
            ->add('actor', null,[
                'label' => 'Acteurs',
                'attr' => array(
                    'placeholder' => 'Nom des acteurs'
                )
            ])
            ->add('poster', FileType::class, array('label' => 'Image(JPG)'))
            ->add('type', null,[
                'label' => 'Genre',
                'attr' => array(
                    'placeholder' => 'Nom des genres'
                )
            ])
            ->add('releasedDate', BirthdayType::class, [
                'widget' => 'text',
                'label' => 'Date de sortie',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ]
        ]);
    }
}
