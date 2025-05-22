<?php

/**
 * @license Dual licensed under the MIT or GPL Version 2 licenses.
 * @package RussianFullnameFormatter
 */

declare(strict_types = 1);

namespace Asplekhanov\RussianFullnameFormatter;

class RFFormatter
{
    private const FORMAT = "#LAST_NAME# #NAME_SHORT# #SECOND_NAME_SHORT#";

    public function __construct()
    {
    }

    public function formattingFullname(array $arFullname, string $sFormat = null): ?string
    {
        // Парсим строку формата через регулярные выражения
        // на выходе получаем массив плейсхолдеров
        if ($sFormat)
        {
            preg_match_all("/\#(\w*?)\#/i", $sFormat, $placeholders);
        }
        else
        {
            preg_match_all("/\#(\w*?)\#/i", self::FORMAT, $placeholders);
        }

        // Сопоставляем плейсхолдер с данными и производим форматирование
        $sFormated = $sFormat;
        foreach ($placeholders[1] as $placeholder)
        {
            if ($placeholder === "NAME")
                $sFormated = str_replace("#".$placeholder."#", $arFullname["NAME"], $sFormated);
            if ($placeholder === "SECOND_NAME")
                $sFormated = str_replace("#".$placeholder."#", $arFullname["SECOND_NAME"], $sFormated);
            if ($placeholder === "LAST_NAME")
                $sFormated = str_replace("#".$placeholder."#", $arFullname["LAST_NAME"], $sFormated);
            if ($placeholder === "NAME_SHORT")
                $sFormated = str_replace("#".$placeholder."#", mb_substr($arFullname["NAME"], 0, 1).".", $sFormated);
            if ($placeholder === "SECOND_NAME_SHORT")
                $sFormated = str_replace("#".$placeholder."#", mb_substr($arFullname["SECOND_NAME"], 0, 1).".", $sFormated);
            if ($placeholder === "LAST_NAME_SHORT")
                $sFormated = str_replace("#".$placeholder."#", mb_substr($arFullname["LAST_NAME"], 0, 1).".", $sFormated);
        }

        return $sFormated;
    }
}