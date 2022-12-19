<?php
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    if(mb_strlen($login) < 5 || mb_strlen($login) > 30){
        echo "Email lenght is invalid!";
        exit();
    }
    else if(mb_strlen($name) < 2 || mb_strlen($name) > 12){
        echo "Username lenght is invalid!";
        exit();
    }
    else if(mb_strlen($pass) < 3 || mb_strlen($pass) > 10){
        echo "Password lenght is invalid! (from 3 to 10 symblos)";
        exit();
    }

    $pass = md5($pass."ghjkl12345");

    $mysql = new mysqli('localhost', 'root', '', 'pagesdb');
    $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`) VALUES ('$login', '$pass', '$name')");

    $mysql->close();

    header('Location: login.php');
?>