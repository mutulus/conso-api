<?php

namespace App\Form;

use App\Model\LoginModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoginFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
             ->add('mail',EmailType::class,[
                 'label'=>"Mail"
             ])
             ->add('pass', TextType::class,[
                 'label'=>"Mot de passe"
             ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            "data_class"=>LoginModel::class
        ]);
    }
}
