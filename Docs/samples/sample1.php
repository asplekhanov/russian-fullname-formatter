<?php

declare(strict_types=1);
mb_internal_encoding('UTF-8');

require_once "../../vendor/autoload.php";

use \Asplekhanov\RussianFullnameFormatter\RFFormatter;

$arFullname = [
    "LAST_NAME" => "Иванов",
    "NAME" => "Петр",
    "SECOND_NAME" => "Викторович"
];
$sFormat = "#LAST_NAME# #NAME_SHORT# #SECOND_NAME_SHORT#";

$formatter = new RFFormatter();
echo $formatter->formattingFullname($arFullname, $sFormat);