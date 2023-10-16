<?php
echo "<h2>Задание №1. Урок №10. Ответ: </h2>";

//Напишите функцию, которая будет принимать на вход 3 аргумента с типом float и возвращать минимальное значение.
//Напишите функцию, которая принимает на вход два аргумента по ссылкам и умножает каждый из них на 2.
//Напишите функцию, считающую факториал числа (произведение целых чисел от единицы до переданного). Реализуйте с помощью рекурсии.
//Напишите функцию, которая будет выводить на экран целые числа от 0 до переданного значения. И да, тут тоже нужно реализовать с помощью рекурсии (чтобы лучше с ней познакомиться, несмотря на то что вариант с циклом проще).

function getMin(float $num1, float $num2, float $num3) {
    if($num1 < $num2 && $num1 < $num3) return $num1;
    else if($num2 < $num1 && $num2 < $num3) return $num2;
    else return $num3;
};

echo "Minimal is: " . getMin(6.3, 4.5, 2.7);
echo "<br>";

function multiplyByTwo(&$num1, &$num2) {
    $num1 = $num1 ** 2;
    $num2 = $num2 ** 2;
};

$multyplyNum1 = 4;
$multiplyNum2 = 5;

multiplyByTwo($multyplyNum1, $multiplyNum2);

echo "Возвели в квадрат два числа (4 и 5) и получили: $multyplyNum1, $multiplyNum2 <br>";

function factorial($num1) {
    if($num1 == 0) return 1;
    return $num1 * factorial($num1 - 1);
}

echo "Факториал числа 5(120): " . factorial(5);
echo "<br>";

function numbersToZero($num1) {
    if($num1 == 0) {
        echo $num1;
        return 1;
    }
    numbersToZero($num1 - 1);
    echo ', ' . $num1;
};

echo "Выведем числа от 0 до 5: <br>";
numbersToZero(5);