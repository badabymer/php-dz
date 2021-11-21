<?php

echo 'Ваш IP адресс - '.$_SERVER['REMOTE_ADDR'].'';
echo '<br>';
echo "Получить дополнительную информацию об данном IP адресе можно кликнув по ссылке <a href='https://ru.infobyip.com/ip-" . $_SERVER['REMOTE_ADDR'] . ".html'>".$_SERVER['REMOTE_ADDR']."</a>";
?>

