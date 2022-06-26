<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;

class PrettyEnumType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /**
         * @var array[Enum] $enum
         */
        $enum = ($options['enum'])::cases();
        $choices = $this->getPretty($enum);
        preg_match('/[a-zA-Z]*$/', $options['enum'], $name);

        $builder->add(
            'pretty_ENUM', ChoiceType::class,
            [
                'choices' => $choices
            ]);
    }

    public function getParent(){
        return ChoiceType::class;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {

        $resolver->setAllowedTypes('enum', 'string');
        
        $resolver->setDefaults([
            'enum' => '',
        ]);
        
        
    }

    private function getPretty(array $cases)
    {

        $prettyCases = [];
        foreach($cases as $case) {
            $prettyCases[ str_replace('_', ' ', $case->name)] = $case->value;
        }

        return $prettyCases;
    }
}
