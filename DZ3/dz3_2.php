<?php
$ip_arr = explode('.', $_GET['ip']);
for ($i = 0; $i < count($ip_arr); $i++) {
    if (!(is_numeric($ip_arr[$i])) || !((int)$ip_arr[$i] <= 255) || !(strlen((string)$ip_arr[$i]) <= 3) || !(4 === count($ip_arr))) {
        die('IP address is not valid please try again');
    }
}
echo 'Ваш IP адресс - ' . $_GET['ip'] . '';
echo '<br>';
echo "Получить дополнительную информацию об данном IP адресе можно кликнув по ссылке <a href='https://ru.infobyip.com/ip-" . $_GET['ip'] . ".html'>" . $_GET['ip'] . "</a>";
?>

