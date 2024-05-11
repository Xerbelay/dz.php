<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label for="login">Логин:</label><br>
        <input type="text" id="login" name="login"><br><br>
        <label for="pass">Пароль:</label><br>
        <input type="pass" id="pass" name="pass"><br><br>
        <label for="pass2">Повторите пароль:</label><br>
        <input type="pass" id="pass2" name="pass2"><br><br>
        <label for="phrase">Секретная фраза (5 букв):</label><br>
        <input type="text" id="phrase" name="phrase"><br><br>
        <input type="submit" value="Отправить">
    </form>
</body>
</html>

<?php
    function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $login = validate_input($_POST["login"]);
    $pass = validate_input($_POST["pass"]);
    $pass2 = validate_input($_POST["pass2"]);
    $phrase = validate_input($_POST["phrase"]);
    
    if (strlen($login) < 3 || strlen($login) > 16) {
        echo "Логин должен быть больше 3 и меньше 16 символов <br>";
    } elseif ($pass != $pass2 || strlen($pass) < 8) {
        echo "Пароль должен совпадать c повтором и быть больше 8 символов <br>";
    } elseif (strlen($phrase) != 5) {
        echo "Секретная фраза должна состоять ровно из 5 букв <br>";
    }else {
        echo "Данные прошли валидацию";
    }
?>