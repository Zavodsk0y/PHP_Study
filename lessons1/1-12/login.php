<!--Сейчас если переданы неверные логин или пароль, выводится информация о том, что либо одно, либо другое неверно.-->
<!--Добавьте дополнительное условие, которое будет говорить о том, что пользователь не найден, если переданный логин не ‘admin’. -->
<!--И если пользователь не найден, то нет смысла проверять пароль, и это условие -->
<!--проверяться не будет. Если же логин ‘admin’, но пароль не совпадает, то писать о том, что пароль неверный.-->


<?php
$login = !empty($_GET['login']) ? $_GET['login'] : '';
$password = !empty($_GET['password']) ? $_GET['password'] : '';

// Первый способ, решил дальше повтыкать с флагами (под него работают 1 и 2 способы снизу)

//if ($login === 'admin') $loginAuthorized = true;
//else $loginAuthorized = false;
//if($loginAuthorized && $password === 'Pa$$wOrd') $isAuthorized = true;
//else $isAuthorized = false;

// Второй способ

if($login === 'admin' && $password === 'Pa$$wOrd') $result = "Вход успешен";
else if($login !== 'admin') $result = "Пользователя с таким логином не существует!";
else $result = "Введен неправильный пароль";


?>
<html>
<head>
    <title>Результат авторизации</title>
</head>
<body>
<p>
    <?php
    // Первый способ с флагами
    //
//        switch($loginAuthorized) {
//            case false:
//                echo "Пользователя с таким логином не существует!";
//                break;
//            case true:
//                switch($isAuthorized) {
//                    case true:
//                        echo "Вход успешен.";
//                        break;
//                    case false:
//                        echo "Введен неправильный пароль!";
//                        break;
//                }
//        }

    // Второй способ с флагами

//        if(!$loginAuthorized) echo "Пользователя с таким логином не существует!";
//        if($loginAuthorized && !$isAuthorized) echo "Введен неправильный пароль!";
//        if($loginAuthorized && $isAuthorized) echo "Вход успешен."

    // Третий способ для "второго" сверху. Просто выведем $result

    echo $result;

    ?>
</p>
</body>
</html>