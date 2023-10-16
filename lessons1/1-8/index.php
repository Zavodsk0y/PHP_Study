<?php
//С помощью цикла while создайте массив, содержащий чётные числа от 345 до
// 357. Затем выведите элементы массива с помощью цикла foreach.

$arr = [];
$value = 345;

while($value < 357) {
    if($value % 2 === 0) $arr[] = $value;
    $value++;
};

foreach($arr as $item) {
    echo $item . ', ';
}

// Запустите следующий код:
//<?php
//while (true) {
//echo 1;
//}
//К чему это привело?
//Изучите, для чего нужна директива max_execution_time в файле конфигурации php.ini

// Ответ: запустив просто данный цикл - он будет бесконечно выводить нам единицу, предположительно, в течение 30 секунд
// Изменив max_execution_time на 1 в php.ini выполняться цикл будет ровно 1 секунду.