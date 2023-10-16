<?php
if (empty($_GET)) {
    return 'Ничего не передано!';
}

if (empty($_GET['operation'])) {
    return 'Не передана операция';
}

$x1 = filter_input(INPUT_GET, 'x1', FILTER_VALIDATE_FLOAT);
$x2 = filter_input(INPUT_GET, 'x2', FILTER_VALIDATE_FLOAT);

if ($x1 === false || $x2 === false) {
    return 'Аргументы 1 и/или 2 не переданы или не являются числами';
}

$expression = $x1 . ' ' . $_GET['operation'] . ' ' . $x2 . ' = ';

switch ($_GET['operation']) {
    case '+':
        $result = $x1 + $x2;
        break;
    case '-':
        $result = $x1 - $x2;
        break;
    case '/':
        if($x2 == 0) return "Вы делите на ноль!";
        $result = $x1 / $x2;
        break;
    case '*':
        $result = $x1 * $x2;
        break;
    default:
        return 'Операция не поддерживается';
}

return $expression . $result;