<?php
$title = 'Список постов';

require __DIR__ . '/templates/header.php';
require __DIR__ . '/includes/function.php';
require __DIR__ . '/includes/database.php';
if (!is_admin()) {
    access_denied();
}
$database = database_connect();
$result = $database->prepare(
    'SELECT * FROM `posts`'
);

$result->execute();
$posts = $result->fetchAll();
?>

    <table class="table table-striped">
        <?php if (is_has_error()) {
            show_error();
        } ?>
        <?php if (is_has_success()) {
            show_success();
        } ?>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название</th>
            <th scope="col">Статус</th>
            <th scope="col">Добавлено</th>
            <th scope="col">Обновлено</th>
            <th scope="col">...</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <th scope="row"><?php echo $post['id']; ?></th>
                <td><?php echo $post['title']; ?></td>
                <td><?php echo $post['is_enabled'] ? "Опубликовано" : "Скрыто"; ?></td>
                <td><?php echo $post['created_at']; ?></td>
                <td><?php echo $post['updated_at']; ?></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            Редактировать
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item"
                                   href="admin.post.edit.php?action=edit&post_id=<?php echo $post['id']; ?>">Редактировать</a>
                            </li>
                            <li><a class="dropdown-item"
                                   href="scripts/action.php?action=changestatus&post_id=<?php echo $post['id']; ?>">Вкл/Выкл.</a>
                            </li>
                            <li><a class="dropdown-item"
                                   href="scripts/action.php?action=delete&post_id=<?php echo $post['id']; ?>">Удалить</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

    </table>

<?php

require __DIR__ . '/templates/footer.php';
