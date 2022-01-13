<?php
$title = 'Редактирование постов';

require __DIR__ . '/templates/header.php';
require __DIR__ . '/includes/function.php';
require __DIR__ . '/includes/database.php';

if (!is_admin()) {
    access_denied();
}
$postID = (int)$_GET['post_id'];
$action = $_GET['action'];
$database = database_connect();
$result = $database->prepare('SELECT * FROM `posts` WHERE `id` = :id');
$result->execute([
    'id' => $postID
]);
$post = $result->fetch();
if ('edit' === $action && isset($postID)) {
    ?>
    <div class="container">
        <h2>Редактирование статьи</h2>
        <?php if (is_has_error()) {
            show_error();
        } ?>
        <?php if (is_has_success()) {
            show_success();
        } ?>
        <form action="scripts/edit.php" method="post" enctype="multipart/form-data">
            <div class="mb-3" hidden>
                <label for="exampleFormControlInput1" class="form-label">ID публикации</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="id"
                       value="<?php echo $post['id']; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Название</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title"
                       value="<?php echo $post['title']; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description"
                          rows="3"><?php echo $post['description']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Загрузите картинку</label>
                <input class="form-control" type="file" id="formFile" name="photo">
            </div>
            <br/>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="is_enabled"
                       id="flexSwitchCheckChecked" <?php if ($post['is_enabled']) {
                    echo "checked";
                } ?>>

                <label class="form-check-label" for="flexSwitchCheckChecked">Включить/Отключить публикацию</label>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
    <?php
} else {
    ?>
    <div class="container">
        <h2>Добавление статьи</h2>
        <?php if (is_has_error()) {
            show_error();
        } ?>
        <?php if (is_has_success()) {
            show_success();
        } ?>
        <form action="scripts/post.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Название</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title"">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Загрузите картинку</label>
                <input class="form-control" type="file" id="formFile" name="photo">
            </div>
            <br/>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="is_enabled"
                       id="flexSwitchCheckChecked" checked>

                <label class="form-check-label" for="flexSwitchCheckChecked">Включить/Отключить публикацию</label>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
    <?php
}
?>

<?php

require __DIR__ . '/templates/footer.php';
