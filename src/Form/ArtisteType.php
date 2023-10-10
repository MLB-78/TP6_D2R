<?php

namespace App\Form;

use App\Entity\Artiste;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArtisteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr'=>[
                    'placeholder'=>"Nom de l'artiste"
                ]
            ])
            ->add('description', TextareaType::class, [
                'attr'=>[
                    'placeholder'=>"Saisir une description"
                ]
            ])
            ->add('site', UrlType::class, [
                'attr' => [
                    'placeholder' => "Exemple : https://www.amazon.fr/"
                ]
            ])
            ->add('image', TextType::class, [
                'attr'=>[
                    'placeholder'=>"Saisir une URL d'image valide"
                ]
            ])
            ->add('type', ChoiceType::class , [
                "choices"=>[
                    "Solo"=>0,
                    "En Groupe"=>1
                ]
            ])
            // ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artiste::class,
        ]);
    }
}
