<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (!isset($_GET['role']) || !isset($_GET['include'])) {
    die('Отстутствует роль или включения, проверьте корректность запроса');
}
$role = $_GET['role'];
$includes = explode(',', $_GET['include']);
$employee = ['administrator', 'editor'];
$permissions = ['administrator' => ['post', 'comments', 'stats'], 'editor' => ['post', 'comments']];

if (!in_array($role, $employee)) {
    die('{Код HTTP Ответа} Неизвестный уровень доступа. Доступ запрещен');
}
foreach ($includes as $include) {
    if (!in_array($include, $permissions[$role])) {
        die('{Код HTTP Ответа} Неверный запрос');
    }
}
echo('{Код HTTP Ответа} данные успешно получены');
?>

