<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\FormBuilderInterface;
use App\Utils\Enums\SimplePrettyEnum;


class EnumTestType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('UGLY_ENUM', EnumType::class, [
            'class' => SimplePrettyEnum::class]);
    }
 
}