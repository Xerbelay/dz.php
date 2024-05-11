<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label for="name">Имя:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <label for="surname">Фамилия:</label><br>
        <input type="text" id="surname" name="surname"><br><br>
        <label for="inn">ИНН:</label><br>
        <input type="text" id="inn" name="inn"><br><br>
        <label for="snils">Снилс:</label><br>
        <input type="text" id="snils" name="snils"><br><br>
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
    
    $name = validate_input($_POST["name"]);
    $surname = validate_input($_POST["surname"]);
    $snils = validate_input($_POST["snils"]);
    $inn = validate_input($_POST["inn"]);
    
    if (!preg_match("/^[a-zA-Zа-яА-ЯёЁ]+$/u", $name)) {
        echo "Имя может содержать только буквы <br>";
        return;
    } 
    elseif (!preg_match("/^[a-zA-Zа-яА-ЯёЁ]+$/u", $name)) {
        echo "Фамилия может содержать только буквы <br>";
        return;
    } 
    elseif (!preg_match("/^\d{12}$/", $inn)) {
        echo "ИНН должен состоять из 12 цифр <br>";
        return;
    }
    elseif (!preg_match("/^\d{3}-\d{3}-\d{3} \d{2}$/", $snils)) {
        echo "СНИЛС должен быть в формате xxx-xxx-xxx уу.";
        return;
    }
    else {
        echo "Данные прошли валидацию";
    }
?>