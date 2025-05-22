# Форматтер русских Ф.И.О.

RussianFullnameFormatter - позволяет удобно отформатировать Ф.И.О. Поддерживается только русские имена, фамилии и отчества.

## Требования

- PHP 8.0 или выше
- composer

## Установка

composer require asplekhanov/russian-fullname-formatter

## Использование
```php
<?php  

use Asplekhanov\RussianFullnameFormatter\RFFormatter;

$arFullname = [
    "LAST_NAME" => "Иванов",
    "NAME" => "Петр",
    "SECOND_NAME" => "Викторович"
];
$sFormat = "#LAST_NAME# #NAME_SHORT# #SECOND_NAME_SHORT#";

$formatter = new RFFormatter();  
echo $formatter->formattingFullname($arFullname, $sFormat); // Иванов П. В.
```

Параметр $sFormat отвечает за формат выводимого имени. Допустимы следующие поля:

> - #NAME# - имя
> - #LAST_NAME# - фамилия
> - #SECOND_NAME# - отчество
> - #NAME_SHORT# - имя сокращенно (первая буква плюс точка)
> - #LAST_NAME_SHORT# - фамилия сокращенно (первая буква плюс точка)
> - #SECOND_NAME_SHORT# - отчество сокращенно (первая буква плюс точка)

## В разработке
 - склонение по падежам