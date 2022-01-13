<?php
session_start();
$title = 'Авторизация';
require __DIR__ . '/includes/function.php';
require __DIR__ . '/templates/header.php';

?>
    <head>
        <style>
            .container {
                max-width: 500px;
            }
        </style>
    </head>
    <div class="container">
        <h2><?php $title ?></h2>
        <?php if (is_has_success()) {
            show_success();
        } ?>
        <?php if (is_has_error()) {
            show_error();
        } ?>
        <form action="scripts/login.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="email" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
<?php

require __DIR__ . '/templates/footer.php';

