<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class , [
                'label'=>'votre nom',
                'attr'=>[
                    'placeholder'=>'Entrez votre nom',
                    'class'=>'form-control',
                    'maxlength'=>50,
                ],
            ])
            ->add('prenom', TextType::class, [
                'label'=>'Votre prenom',
                'attr'=>[
                    'placeholder'=>'exemple@email.com',
                    'class'=>'form-control',
                ],
            ])
            ->add('email', EmailType::class, [
                'label'=>'Votre email',
                'attr'=>[
                    'placeholder'=>'Votre email ici...',
                    'class'=>'form-control',
                    'rows'=>6,
                ]
            ])
            ->add('telephone', IntegerType::class, [
                'label'=>'Votre telephone',
                'attr'=>[
                    'placeholder'=>'Entrez votre numero de telephone',
                    'class'=>'form-control',
                ]
            ])

            ->add('message', TextareaType::class, [
                'label'=>'Votre message',
                'attr'=>[
                    'placeholder'=>'Entrez votre message ici...',
                    'class'=>'form-control',
                ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
