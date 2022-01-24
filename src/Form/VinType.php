<?php

namespace App\Form;

use App\Entity\Vin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomCuvee')
            ->add('typeDeCulture')
            ->add('commentaires')
            ->add('codecouleur')
            ->add('codeappellation')
            ->add('coderegion')
            ->add('codecepage')
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vin::class,
        ]);
    }
}
