<?php

namespace App\Form;

use App\Entity\Chantier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ChantierForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class , [
                'attr'=>[
                    'class'=>'form-control w-100',
                    'maxlength'=>50,
            ]])
            ->add('description', TextareaType::class , [
                'attr' =>[
                     'class'=>'form-control w-100',
            ]])
            ->add('image', FileType::class , [
                'label' => 'Image (JPG, PNG, GIF)',
                'required' => false,
                'mapped' => false,
                'data_class' => null,
                'attr' => [
                    'class' => 'form-control w-100',
                ],
                    'constraints' => [
                        new File([
                            'maxSize' => '1024k',
                            'mimeTypes' => [
                                'image/jpeg',
                                'image/png',
                                'image/gif',
                            ],
                            'mimeTypesMessage' => 'Veuillez télécharger une image valide (JPG, PNG, GIF)',
                        ]),
                    ],
            ])
            ->add('date', DateType::class , [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control w-100',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chantier::class,
        ]);
    }
}
