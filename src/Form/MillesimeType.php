<?php

namespace App\Form;

use App\Entity\Millesime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MillesimeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('millesime', IntegerType::class, [
                'label' => 'Année du millésime : ',
                'invalid_message' => 'Vous devez entrer un nombre entre 1900 et '.date("Y")." .",
                'attr' => ['min' => 1900,
                            'max' => date("Y")]
            ])
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Millesime::class,
        ]);
    }
}
