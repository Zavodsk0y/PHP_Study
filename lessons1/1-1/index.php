<?php
//Присвойте переменным $a и $b значения 3 и 5 соответственно. С помощью третьей переменной $c поменяйте значения этих переменных (в $a будет 5, а в $b будет 3)
//Проделайте тоже самое, но без использования третьей переменной, при условии что в качестве значений могут быть только целые числа

$a = 3;
$b = 5;
$c = $a;
$a = $b;
$b = $c;

echo "<h2>Задание №1. Урок №6. Ответ:</h2> $a, $b <br>";