<?php

namespace App\Form;

use App\Entity\Transaction;
use App\Entity\User;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('amount')
            ->add('date')
            ->add('category')
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'Débit' => 'debit',
                    'Crédit' => 'credit',
                ],
            ])
            ->add('owner', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'username',
                'expanded' => true,
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
        ]);
    }
}
