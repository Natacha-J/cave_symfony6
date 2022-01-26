<?php

namespace App\Form;

use App\Entity\CategorieMets;
use App\Entity\Mets;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MetsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom : '
            ])
            ->add('lienRecette', TextType::class, [
                'label' => 'Lien vers la recette : ',
                'attr' => ['maxlength' => 200]
            ])
            ->add('idCategorieMets', EntityType::class, [
                'class' => CategorieMets::class,
                'choice_label' => 'libellecategorie',
                'label' => 'Catégorie : '
            ])
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mets::class,
        ]);
    }
}
