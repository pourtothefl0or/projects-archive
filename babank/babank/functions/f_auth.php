<?php
session_start();
require ('config.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if(isset($_POST['login'])) {
    $query = "SELECT * FROM `users` WHERE `users_email` = '$email' AND `users_password` = '$password'";
    $check_user = mysqli_query($db, $query);

    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            'id' => $user['users_id'],
            'name' => $user['users_name'],
            'email' => $user['users_email']
        ];

        header ('Location: ../index.php');
    } else {
        $_SESSION['error'] = 'Ошибка! Проверьте вводимые данные!';
        header ('Location: ../login.php');
    }
}

if(isset($_POST['register'])) {
    if ($name != '' && $email != '' && $password != ''&& $password_confirm != '') {
        $query = "SELECT * FROM `users`";
        $check_user = mysqli_query($db, $query);
        while ($user = mysqli_fetch_assoc($check_user)) {
            if ($user['users_email'] === $email) {
                $_SESSION['error'] = 'Данная почта уже зарегистрировна!';
                header ('Location: ../register.php');
                die();
            }
        }
    
        if ($password != $password_confirm) {
            $_SESSION['error'] = 'Пароли не совпадают!';
            header ('Location: ../register.php');
            die();
        }
        
        $query = "INSERT INTO `users` (`users_name`, `users_email`, `users_password`) VALUES ('$name', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['error'] = 'Регистрация прошла успешно!';
        header ('Location: ../login.php');
    } else {
        header ('Location: ../register.php');
    }
}

if(isset($_POST['exit'])) {
    unset ($_SESSION['user']);
    session_destroy();
    header ('Location: ../login.php');
}
?>