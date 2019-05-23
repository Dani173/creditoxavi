<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 05/02/19
 * Time: 17:23
 */

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', \Symfony\Component\Form\Extension\Core\Type\TextType::class,[
                'label' => 'Usuario',
                'required'=>'required',
                'attr'=>[
                    'class'=>'reg-form',
                    'placeholder'=>'Usuario'
                ]
            ])
            ->add('email', EmailType::class,[
                'label' => 'Email',
                'required'=>'required',
                'attr'=>[
                    'class'=>'reg-form2',
                    'placeholder'=>'Email@email'
                ]
            ])
            ->add('plainpassword', RepeatedType::class,[

                'type'=>PasswordType::class,
                'required'=>'required',
                'label' => 'Contraseña',
                'first_options'=>[
                    'attr'=>[
                        'class'=>'reg-form3',
                        'placeholder'=>'contraseña'
                    ]
                ],
                'second_options'=>[
                    'attr'=>[
                        'class'=>'reg-form5',
                        'placeholder'=>'repetir contraseña'

                    ]
                ]
            ])

            ->add('dateofbirth', DateType::class, [
                'label' => 'Nacimiento',
                'widget'=>'single_text',
                'attr'=>[
                    'class'=>'reg-form4'
                ]
            ])

        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class'=>'App\Entity\User']);
    }
    public function buildFormEdit(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', \Symfony\Component\Form\Extension\Core\Type\TextType::class,[

                'required'=>'required',
                'attr'=>[
                    'class'=>'form-username form-control',
                    'placeholder'=>'Usuario'
                ]
            ])
            ->add('email', EmailType::class,[
                'required'=>'required',
                'attr'=>[
                    'class'=>'form-email form-control',
                    'placeholder'=>'Email'
                ]
            ])
            ->add('plainpassword', RepeatedType::class,[
                'type'=>PasswordType::class,
                'required'=>'required',
                'first_options'=>[
                    'attr'=>[
                        'class'=>'form-password form-control',
                        'placeholder'=>'password'
                    ]
                ],
                'second_options'=>[
                    'attr'=>[
                        'class'=>'form-password form-control',
                        'placeholder'=>'repetir contraseña'
                    ]
                ]
            ])
            ->add('roles', CheckboxType::class,[
                'required'=>'required',
                'attr'=>[
                    'label'    => 'ROLE_ADMIN',
                    'label'    => 'ROLE_USER',
                    'required' => true
                ]
            ]);
    }
}