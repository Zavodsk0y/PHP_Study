<?php
//Создайте массив с тремя уровнями вложенности. После создания массива
// добавьте новые элементы на самом глубоком уровне вложенности отдельным выражением.

$arr = [
    'subarray_1' => [
        'subarray_2' => [
            'subarray_3' => [
                'someInfo0', 'someInfo1'
            ]
        ]
    ]
];

$arr['subarray_1']['subarray_2']['subarray_3'][2] = 'someInfo2';

foreach ($arr as $subarray1) {
    foreach ($subarray1 as $subarray2) {
        foreach ($subarray2 as $subarray3) {
            foreach($subarray3 as $item) {
                echo "$item<br>";
            }
        }
    }
};