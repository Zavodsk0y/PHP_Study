<?php
// На вход подается строка из чисел, разделенных пробелами.
// Переместите все нули в конец строки. Порядок остальных чисел должен сохраниться.

$line2 = "7 0 39 0 282 2 4 0 45";
$array2 = explode(" ", $line2);
foreach($array2 as $index => $item) {
    if($item == 0) {
        unset($array2[$index]);
        $array2[] = 0;
    }
}

$line2 = implode(" ", $array2);

echo $line2;
