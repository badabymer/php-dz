<?php

session_start();
require '../includes/function.php';
require '../includes/database.php';
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$PostID = $_GET['post_id'];

if (!empty($_GET['action']) && !empty($_GET['post_id'])) {
    if ('changestatus' === $_GET['action'] && 1 <= $_GET['post_id']) {
        ChangeStatusPost($PostID);
    } elseif ('delete' === $_GET['action'] && 1 <= $_GET['post_id']) {
        DeletePost($PostID);
    } else {
        set_error_text('Ошибка. Повторите действие снова');
        header('Location: ../admin.posts.php');
        exit;
    }
}
