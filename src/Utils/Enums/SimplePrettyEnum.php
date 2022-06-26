<?php 

namespace App\Utils\Enums;

enum SimplePrettyEnum:string implements EnumInterface {
    case European_UNION = "eu";
    case Other_String = "OS";

    static function getPretty():array
    {
        /**
         * @var Enum $cases
         */
        $cases = self::cases();
        

        $prettyCases = [];
        foreach($cases as $enum) {
            $prettyCases[ str_replace('_', ' ', $enum->name)] = $enum->value;
        }

        return $prettyCases;
    }
}