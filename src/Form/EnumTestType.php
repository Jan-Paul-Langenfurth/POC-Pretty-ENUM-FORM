<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use App\Utils\Enums\SimplePrettyEnum;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\Type\PrettyEnumType;

class EnumTestType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('UGLY_ENUM', EnumType::class, ['class' => SimplePrettyEnum::class])
                ->add('Simple_ENUM', ChoiceType::class, ['choices' => SimplePrettyEnum::getPretty() ])
                ->add('PrettyParent', PrettyEnumType::class, ['enum' => SimplePrettyEnum::class] )
                ->add('submit', SubmitType::class)
            ;
    }
 
}