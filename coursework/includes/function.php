<?php
function is_has_error(): bool
{
    return !empty($_SESSION['error']);
}


function show_error(): void
{
    ?>
    <div class="container">
        <div class="alert alert-danger" role="alert">
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?></div>
    </div>
    <?php
}

function set_error_text(string $text): void
{
    $_SESSION['error'] = htmlspecialchars($text, ENT_QUOTES | ENT_HTML5);
}


function is_has_success(): bool
{
    return !empty($_SESSION['success']);
}

function show_success(): void
{
    ?>
    <div class="container">
        <div class="alert alert-success" role="alert">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?></div>
    </div>
    <?php
}

function set_success_text(string $text): void
{
    $_SESSION['success'] = htmlspecialchars($text, ENT_QUOTES | ENT_HTML5);
}

function is_admin(): bool
{
    return !empty($_SESSION['is_admin']);
}

function logOut(): void
{
    $_SESSION['is_auth'] = false;
    $_SESSION['is_admin'] = 0;
    header('Location: index.php');
    exit;

}

function access_denied(): void
{
    set_error_text('Доступ запрещен! Будете перемещены на главную!');
    show_error();
    header("Refresh:2; url=index.php", true, 303);
    exit;
}

function DeletePost($PostID): void
{
    $database = database_connect();
    $result = $database->prepare('DELETE FROM `posts` WHERE `id` = :id');
    $result->execute(['id' => (int)$PostID]);
    set_success_text('Статья успешно удалена.');
    header('Location: ../admin.posts.php');
    exit;
}

function ChangeStatusPost($PostID): void
{
    $database = database_connect();
    $result = $database->prepare('SELECT `is_enabled` FROM `posts` WHERE `id` =:id');
    $result->execute(['id' => $PostID]);
    $row = $result->fetch();

    if (1 === $row['is_enabled']) {
        $result = $database->prepare('UPDATE `posts` SET `is_enabled` = 0 WHERE `id` =:id');
        $result->execute(['id' => (int)$PostID]);
    } else {
        $result = $database->prepare('UPDATE `posts` SET `is_enabled` = 1 WHERE `id` =:id');
        $result->execute(['id' => (int)$PostID]);
    }

    set_success_text('Статус публикации статьи изменен.');
    header('Location: ../admin.posts.php');
    exit;
}