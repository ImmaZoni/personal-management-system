<?php

namespace App\Form\Files;

use App\Controller\Files\FileUploadController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UploadSubdirectoryRenameType extends AbstractType {

    const OPTION_UPLOAD_TYPE    = 'upload_type';
    const OPTION_SUBDIRECTORIES = 'subdirectories';

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add(FileUploadController::KEY_SUBDIRECTORY_CURRENT_NAME, ChoiceType::class, [
                'choices' => $options[static::OPTION_SUBDIRECTORIES]
            ])
            ->add(FileUploadController::KEY_SUBDIRECTORY_NEW_NAME, TextType::class, [

            ])
            ->add('submit', SubmitType::class, [

            ]);

    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            // Configure your form options here
        ]);

        $resolver->setRequired(static::OPTION_UPLOAD_TYPE);
        $resolver->setRequired(static::OPTION_SUBDIRECTORIES);
    }
}