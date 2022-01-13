<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
require '../includes/function.php';
require '../includes/database.php';

if (empty($_POST['email']) || empty($_POST['password'])) {
    set_error_text('Все поля обязательные для заполнения.');
    header('Location: ../login.php');
    exit;
}

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

$database = database_connect();

$result = $database->prepare('SELECT * FROM `users` WHERE `email` = :email');

$result->execute(['email' => $email]);

$user = $result->fetch();

if (false === $user) {
    set_error_text('Пользователь ' . $email . ' не найден.');
    header('Location: ../login.php');
    exit;
}

if (!password_verify($password, $user['password'])) {
    set_error_text('Неверный пароль.');
    header('Location: ../login.php');
    exit;
}

$_SESSION['is_auth'] = true;
$_SESSION['user_id'] = $user['id'];
$_SESSION['email'] = $user['email'];

if ($user['is_admin']) {
    $_SESSION['is_admin'] = $user['is_admin'];
}

header('Location: ../index.php');
exit;
