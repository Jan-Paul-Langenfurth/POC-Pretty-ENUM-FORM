<?php 

namespace App\Utils\Enums;

enum SimplePrettyEnum: string {
    case European_UNION = "eu";
    case Other_String = "OS";

    function getPretty():array
    {
        $cases = self::cases();

        $prettyCases = [];
        foreach($cases as $case => $value) {
            $prettyCases[ str_replace('_', ' ', $case)] = $value;
        }


    }
}