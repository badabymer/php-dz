<?php

$title = 'Главная страница';
session_start();
require __DIR__ . '/includes/function.php';
require __DIR__ . '/includes/database.php';
require __DIR__ . '/templates/header.php';


$database = database_connect();
$result = $database->prepare(
    'SELECT * FROM `posts`
            WHERE `is_enabled` = 1
            ORDER BY `created_at` DESC'
);

$result->execute();
$posts = $result->fetchAll();

?>
    <head>
        <style>
            .card {
                margin: 0 auto; /* Added */
                float: none; /* Added */
                margin-bottom: 10px; /* Added */
            }

            .container {
                max-width: 960px;
            !important;
            }
        </style>

    </head>
    <div class="container">
        <?php foreach ($posts as $post): ?>
            <!--    <div class="card text-center" style="width: 18rem;">-->
            <!--        -->
            <!--        <img src="..." class="card-img-top" alt="...">-->
            <!--        <div class="card-body">-->
            <!--            <h5 class="card-title">--><?php //echo $post['title']; ?><!--</h5>-->
            <!--            <p class="card-text">--><?php //echo $post['description']; ?><!--</p>-->
            <!--            <a href="#" class="btn btn-primary">Go somewhere</a>-->
            <!--        </div>-->
            <!---->
            <!--    </div>-->
            <div class="card mb-3">
                <img src="<?php echo $post['image'] ? $post['image'] : 'img/noimage.jpeg'; ?>" class="card-img-top"
                     alt="<?php echo $post['title']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post['title']; ?></h5>
                    <p class="card-text"><?php echo mb_strimwidth($post['description'], 0, 500, "..."); ?></p>
                    <!--            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                    <a href="post.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">Читать далее</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php

require __DIR__ . '/templates/footer.php';
