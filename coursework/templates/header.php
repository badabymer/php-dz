<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./templates/css/main.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <!--
        Переменная $title Должна быть определена в файле, который
        использует данный шаблон.
     -->
    <?php session_start(); ?>
    <title><?php echo $title; ?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">PHP CourseWork</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Главная</a>
                </li>
            </ul>
            <?php if(!$_SESSION['is_auth']):?>
                <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="./login.php">Войти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./register.php">Зарегистрироваться</a>
                </li>
            </ul>
            <?php  else: ?>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <?php if ($_SESSION['is_admin']):?>
    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Действия
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="./admin.posts.php">Список статей</a></li>
            <li><a class="dropdown-item" href="./admin.post.edit.php">Добавить статью</a></li>
          </ul>
        </li>
                    <?php  endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="./logout.php">Выход</a>
                </li>
            </ul>

            <?php  endif; ?>

        </div>
    </div>
</nav>
