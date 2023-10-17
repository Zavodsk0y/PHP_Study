<?php

// На вход подается строка целых чисел, разделенных пробелами.
// Найдите наибольшее возможное число, составленное путём конкатенации этих чисел друг к другу.

function largestNumber($nums) {
    function compare($x, $y) {
        return $y . $x <=> $x . $y;
    }

    usort($nums, 'compare');

    $result = implode('', $nums);

    return $result;
}

$numbers = [100, 95, 9, 2, 42, 11, 81];
$result = largestNumber($numbers);
echo $result;