<?php

namespace App\Form;

use App\Entity\Movie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, [
                'label' => 'Nom du film',
            ])
            ->add('realisateur', null,[
                'label' => 'Nom du réalisateur',
            ])
            ->add('actor', null,[
                'label' => 'Nom des acteurs',
            ])
            ->add('poster')
            ->add('type', null,[
                'label' => 'Nom des genres',
            ])
            ->add('releasedDate', null,[
                'label' => 'Quelle est la date de sortie ?',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
