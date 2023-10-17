<?php
// Придумайте способ обойтись без использования функции count.
$carsSpeeds = [
    95,
    140,
    78
];

$sumOfSpeeds = 0;
$countOfCars = 0; // Инициализируем переменную для подсчета кол-ва машин

foreach ($carsSpeeds as $speed) {
    $sumOfSpeeds += $speed;
    $countOfCars++; // Инкрементируем данную переменную, foreach переберет нам массив со всеми скоростями всех машин (которых 3)
};


$averageSpeed = $sumOfSpeeds / $countOfCars;

echo 'Средняя скорость движения по трассе: ' . $averageSpeed;