<?php
session_start();
require '../includes/function.php';
require '../includes/database.php';

if (empty($_POST['email'])) {
    set_error_text('Поле E-mail обязательно для заполнения.');
    header('Location: ../register.php');
    exit;
}

if (empty($_POST['password'])) {
    set_error_text('Поле Пароль обязательно для заполнения.');
    header('Location: ../register.php');
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    set_error_text('Неверный формат e-mail.');
    header('Location: ../register.php');
    exit;
}

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$database = database_connect();
$result = $database->prepare('SELECT `id` FROM `users` WHERE `email` = :email');
$result->execute(['email' => $email]);

if ($result->rowCount()) {
    set_error_text('Пользователь с таким e-mail уже существует.');
    header('Location: ../register.php');
    exit;
}
$result = $database->prepare(
    'INSERT INTO `users` (`email`, `password`) VALUES (:email, :password)'
);

$result->execute([
    'email' => $email,
    'password' => $password
]);
set_success_text('Вы успешно зарегистрированны. Авторизуйтесь.');
header('Location: ../login.php');
exit;

