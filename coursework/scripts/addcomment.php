<?php

session_start();
require '../includes/function.php';
require '../includes/database.php';

$PostID = $_POST['id'];
$autor = $_SESSION['email'];
$commentText = $_POST['commentText'];
$userId = $_SESSION['user_id'];


if (!empty($PostID) && !empty($commentText) && !empty($autor)) {
    $database = database_connect();
    $result = $database->prepare('INSERT INTO `comments` (`user_id`,`post_id`, `autor`,`comment`) VALUES (:user_id, :post_id,:autor,:comment)');

    $result->execute([
        'user_id' => $userId,
        'post_id' => $PostID,
        'autor' => $autor,
        'comment' => $commentText
    ]);
    $newId = $database->lastInsertId();


    set_success_text('Комменатрий успешно добавлен.');
    header('Location: ../post.php?id=' . $PostID);
    exit;

} else {
    set_error_text('Ошибка добавления комментария.');
    header('Location: ../post.php?id=' . $PostID);
    exit;
}