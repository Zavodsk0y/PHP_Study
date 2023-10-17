<?php

// Напишите программу, которая выводит свой собственный код.
// Сделайте так, чтобы в этой программе не было упоминания имени самого скрипта

// Решение: (закомментил, так как плохо отображаются остальные задачи)
//$file = fopen(__FILE__ , 'r');
//while  (!feof($file)) {
//echo fgets($file);
//echo '<br><br>';
//}

// Выведите список всех файлов в текущей директории скрипта.
// Создайте теперь в директории со скриптом несколько папок.
// Сделайте так, чтобы в списке, выводимом программой, остались только папки.

$files = scandir(__DIR__ . 'index.php/');
print_r($files);

echo "<br><br>";

$dirs = scandir(__DIR__ . 'index.php/');
foreach($dirs as $value) {
    if(is_dir($value)) echo $value . "<br>";
}

echo "<br><br>";

// На вход подается строка целых уникальных (не повторяющихся) чисел, разделенных пробелами.
// Найдите все возможные комбинации пар чисел и выведите их в любом порядке

$line = "1 2 3";
$array = explode(" ", $line);
for($i = 0; $i < count($array); $i++) {
    for($j = 0; $j < count($array); $j++) {
        if($array[$i] == $array[$j]) continue;
        else echo $array[$i] . " " . $array[$j] . PHP_EOL;
    }
}