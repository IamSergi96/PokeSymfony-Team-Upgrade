<?php

namespace App\Form;

use App\Entity\Debilidad;
use App\Entity\Pokemon;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PokemonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre', TextType::class, [
                'attr'=>['placeholder'=>'introduce aquí el nombre'],
                'label'=>'Nombre del pokemon'
            ])
            ->add('description')
            ->add('image')
            ->add('codigo')
            ->add('debilidades', EntityType::class, [
                'class' => Debilidad::class,
'choice_label' => 'nombre',
'multiple' => true,
'expanded' => true
            ])
            ->add("Enviar", SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pokemon::class,
        ]);
    }
}
