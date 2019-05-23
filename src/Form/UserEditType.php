<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
Use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')

            ->add('password')

            ->add('username')
            ->add('accountnumber')
            ->add('dateofbirth', DateType::class, [
                'label' => 'Published at',
                'widget'=>'single_text',
                'attr'=>[
                    'class'=>'form-control js-datepicker'
                ]
            ])

            ->add('name')
            ->add('phone', TextType::class,[


                'attr'=>[
                    'class'=>'form-username form-control',
                    'placeholder'=>'phone'
                ]
            ])
            ->add('surname')
            ->add('address')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
