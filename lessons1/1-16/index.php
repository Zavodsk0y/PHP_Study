<?php
require __DIR__ . '/auth.php';
$login = getUserLogin();
?>
<html>
<head>
    <title>Главная страница</title>
</head>
<body>
<?php if ($login === null): ?>
    <a href="/login.php">Авторизуйтесь</a>
<?php else: ?>
    Добро пожаловать, <?= $login ?>
    <br>
    <a href="/logout.php">Выйти</a><br>
    <?= var_dump($_COOKIE); ?>
<?php endif; ?>
</body>
</html>
<?php

// На вход подается строка целых чисел, разделенных пробелами.
// Нужно найти последовательность подряд идущих чисел, у которой сумма элементов будет максимальной.

echo "<br><br>";
$line = "-8 -3 -6 -2 -5 -4";
$array = explode(" ", $line);

$currentSum = $array[0];
$totalSum = $array[0];

for ($i = 1; $i < count($array); $i++) {
    $currentSum += $array[$i];

    if ($currentSum < $array[$i]) {
        $currentSum = $array[$i];
    }

    if ($currentSum > $totalSum) {
        $totalSum = $currentSum;
    }
}

echo $totalSum;