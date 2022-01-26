<?php

namespace App\Form;

use App\Entity\Appellation;
use App\Entity\Cepage;
use App\Entity\Couleur;
use App\Entity\Region;
use App\Entity\Vin;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomCuvee', TextType::class, [
                'label' => 'Nom de la cuvée : ',
                'attr' => ['maxlength' => 150, 
                            'class' => 'form-control']

            ])
            ->add('codeappellation', EntityType::class, [
                'class' => Appellation::class,
                'choice_label' => 'nomappellation',
                'label' => 'Appellation : '
            ])
            ->add('coderegion', EntityType::class, [
                'class' => Region::class,
                'choice_label' => 'nomregion',
                'label' => 'Région : '
            ])
            ->add('codecouleur', EntityType::class, [
                'class' => Couleur::class,
                'choice_label' => 'nomcouleur',
                'label' => 'Couleur : '
            ])
            ->add('typeDeCulture', TextareaType::class, [
                'label' => 'Type de culture : ',
                'attr' => ['maxlength' => 1024]
            ])
            ->add('codecepage', EntityType::class, [
                'class' => Cepage::class,
                'label' => 'Cépages : ',
                'choice_label' => 'nomcepage',
                'multiple' => true,
                'expanded' => true,
                'attr' => ['class' => 'checkboxCepage']
            ])
            ->add('commentaires', TextareaType::class, [
                'label' => 'Commentaires',
            ])
            ->add('valider', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vin::class,
        ]);
    }
}
