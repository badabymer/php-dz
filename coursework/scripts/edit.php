<?php

session_start();
require '../includes/function.php';
require '../includes/database.php';
$path = '/var/www/html/coursework';

$PostID = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];

if (isset($_POST['is_enabled']) && $_POST['is_enabled'] == 'on') {
    $is_enabled = 1;
} else {
    $is_enabled = 0;
}
if (isset($PostID)) {
    $database = database_connect();
    $result = $database->prepare('SELECT * FROM `posts` WHERE `id` = :id');
    $result->execute(['id' => (int)$PostID]);
    $post = $result->fetch();

    if (false === $post) {
        set_error_text('Публикация не найдена.');
        header('Location: ../admin.post.edit.php');
        exit;
    }

    if ($_FILES['photo']['name']) {
        if (((int)$_FILES['photo']['error']) !== UPLOAD_ERR_OK) {
            set_error_text('Ошибка загрузки картинки.');
            header('Location:../admin.post.edit.php');
            exit;
        }

        $fileName = uniqid('', true) . stripcslashes(strip_tags(trim($_FILES['photo']['name'])));
        $filePath = $path . '/img/post/' . basename($fileName);
        // echo $filePath;die();
        //$filePath = '/img/post/' . basename($fileName);
        $imagePath = '/coursework/img/post/' . basename($fileName);
        $fileDir = dirname($filePath);
        if (!is_dir($fileDir)) {
            mkdir($fileDir, 0755, true);
        }
        move_uploaded_file($_FILES['photo']['tmp_name'], $filePath);

        $result = $database->prepare('UPDATE `posts` SET `title` = :title, `image` = :image, `description` = :description, `is_enabled` = :is_enabled  WHERE `id` =' . (int)$PostID);

        $result->execute([
            'title' => $title,
            'image' => $imagePath,
            'description' => $description,
            'is_enabled' => $is_enabled

        ]);


        set_success_text('Статья успешно отредактирована.');
        header('Location: ../admin.post.edit.php?action=edit&post_id=' . $PostID);
        exit;

    } else {

        $result = $database->prepare('UPDATE `posts` SET `title` = :title, `description` = :description, `is_enabled` = :is_enabled  WHERE `id` =' . (int)$PostID);

        $result->execute([
            'title' => $title,
            'description' => $description,
            'is_enabled' => $is_enabled

        ]);

        set_success_text('Статья успешно отредактирована.');
        header('Location: ../admin.post.edit.php?action=edit&post_id=' . $PostID);
        exit;


    }


}








