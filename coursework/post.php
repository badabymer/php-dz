<?php
session_start();
require __DIR__ . '/includes/function.php';
require __DIR__ . '/includes/database.php';
$postID = (int)$_GET['id'];

$database = database_connect();
$result = $database->prepare('SELECT * FROM `posts` WHERE `id` = :id AND `is_enabled` = 1');
$result->execute([
    'id' => $postID
]);
$post = $result->fetch();
if (empty($post)) {
    header('Location: ./404.php');
    exit;
}

$title = $post['title'];
require __DIR__ . '/templates/header.php';
?>

    <div class="container">
        <div class="card mb-3">
            <img class="card-img-top" src="<?php echo $post['image'] ? $post['image'] : 'img/noimage.jpeg'; ?>"
                 alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $post['title']; ?></h5>
                <p class="card-text"><?php echo $post['description']; ?></p>
                <!--            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
            </div>
        </div>
    </div>

<?php
require __DIR__ . '/comments.php';
require __DIR__ . '/templates/footer.php';

