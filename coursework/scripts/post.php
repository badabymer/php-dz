<?php
session_start();
require '../includes/function.php';
require '../includes/database.php';
$path = '/var/www/html/coursework';

$title = $_POST['title'];
$description = $_POST['description'];
$user_id = $_SESSION['user_id'];

if (isset($_POST['is_enabled']) && $_POST['is_enabled'] == 'on') {
    $is_enabled = 1;
} else {
    $is_enabled = 0;
}
if (isset($title) && isset($description)) {
    if ($_FILES['photo']['name']) {
        if (((int)$_FILES['photo']['error']) !== UPLOAD_ERR_OK) {
            set_error_text('Ошибка загрузки картинки.');
            header('Location:../admin.post.edit.php');
            exit;
        }

        $fileName = uniqid('', true) . stripcslashes(strip_tags(trim($_FILES['photo']['name'])));
        $filePath = $path . '/img/post/' . basename($fileName);
        $imagePath = '/coursework/img/post/' . basename($fileName);
        $fileDir = dirname($filePath);
        if (!is_dir($fileDir)) {
            mkdir($fileDir, 0755, true);
        }
        move_uploaded_file($_FILES['photo']['tmp_name'], $filePath);
        $database = database_connect();
        $result = $database->prepare('INSERT INTO `posts` (`title`, `user_id`,`image`, `description`,`is_enabled`) VALUES (:title, :user_id,:image, :description,:is_enabled)'
        );

        $result->execute([
            'title' => $title,
            'user_id' => $user_id,
            'image' => $imagePath,
            'description' => $description,
            'is_enabled' => (int)$is_enabled
        ]);
        $newId = $database->lastInsertId();


        set_success_text('Статья успешно добавлена.');
        header('Location: ../admin.post.edit.php?action=edit&post_id=' . $newId);
        exit;

    } else {
        $database = database_connect();
        $result = $database->prepare(
            'INSERT INTO `posts` (`title`, `user_id`,`image`, `description`,`is_enabled`) VALUES (:title, :user_id,:image, :description,:is_enabled)'
        );

        $result->execute([
            'title' => $title,
            'user_id' => $user_id,
            'image' => '',
            'description' => $description,
            'is_enabled' => (int)$is_enabled
        ]);
        $newId = $database->lastInsertId();
        set_success_text('Статья успешно добавлена.');
        header('Location: ../admin.post.edit.php?action=edit&post_id=' . $newId);
        exit;


    }


}
