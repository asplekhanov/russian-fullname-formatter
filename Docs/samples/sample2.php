<?php

declare(strict_types=1);
mb_internal_encoding('UTF-8');

require_once "../../vendor/autoload.php";

use \Asplekhanov\RussianFullnameFormatter\RFFormatter;

$arFullname = [
    "LAST_NAME" => "Иванов",
    "NAME" => "Иван",
    "SECOND_NAME" => "Викторович"
];
$sFormat = "#LAST_NAME_SHORT##NAME_SHORT# #SECOND_NAME#";

$formatter = new RFFormatter();
echo $formatter->formattingFullname($arFullname, $sFormat);