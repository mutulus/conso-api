<?php

namespace App\Form;

use App\Model\PersonneModel;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;

class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', Type\TextType::class,[
                'label'=>"Prenom de la personne",
                'attr'=> [
                    "placeholder"=>"Prénom entre 3 et 50 caractères"
                ],
                'required'=>false
            ])
            ->add('nom', Type\TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            "data_class"=>PersonneModel::class
        ]);
    }
}
