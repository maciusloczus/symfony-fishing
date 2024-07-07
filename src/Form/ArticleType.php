<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType; // Import the SubmitType
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('content', TextareaType::class, ['attr' => ['rows' => 8]])
            ->add('created', DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'dd.MM.yyyy HH:mm',
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('imageFile', FileType::class, [
                'required' => false,
            ])
            ->add('save', SubmitType::class, [ // Use SubmitType to add a submit button
                'label' => 'Dodaj artykuł', // Button label
                'attr' => ['class' => 'btn btn-primary'], // Optional CSS classes for styling
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
