<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Система тестирования учащихся младших классов</title>
    <form method="post" action="check.php">
        <ol>
            <?php for ($i = 1; $i <= 12; $i++) {
                $a = random_int(-100, 100);
                do {
                    $b = random_int(-100, 100); // делить на 0 нельзя, генерируем число не равное 0
                } while ($b == 0);
                if ($i <= 3) { ?>
                    <li>
                        <?php echo '' . $a . ' + ' . $b . ' = ' ?>
                        <input type="number" placeholder="введите ответ" name="answer_user[<?php $i ?>]" required>
                        <input type="number" name="question_first[<?php $i ?>]" value="<?php echo "$a" ?>" hidden>
                        <input type="number" name="question_second[<?php $i ?>]" value="<?php echo "$b" ?>" hidden></li>
                <?php } elseif ($i >= 4 && $i <= 6) { ?>
                    <li><?php echo '' . $a . ' - ' . $b . ' = ' ?>
                        <input type="number" placeholder="введите ответ" name="answer_user[<?php $i ?>]" required>
                        <input type="number" name="question_first[<?php $i ?>]" value="<?php echo $a ?>" hidden>
                        <input type="number" name="question_second[<?php $i ?>]" value="<?php echo $b ?>" hidden></li>
                <?php } elseif ($i >= 7 && $i <= 9) { ?>
                    <li><?php echo '' . $a . ' * ' . $b . ' = ' ?>
                        <input type="number" placeholder="введите ответ" name="answer_user[<?php $i ?>]" required>
                        <input type="number" name="question_first[<?php $i ?>]" value="<?php echo $a ?>" hidden>
                        <input type="number" name="question_second[<?php $i ?>]" value="<?php echo $b ?>" hidden></li>
                <?php } elseif ($i >= 9 && $i <= 12) { ?>
                    <li><?php echo '' . $a . ' / ' . $b . ' = ' ?>
                        <input type="number" placeholder="введите ответ" name="answer_user[<?php $i ?>]" required>
                        <input type="number" name="question_first[<?php $i ?>]" value="<?php echo $a ?>" hidden>
                        <input type="number" name="question_second[<?php $i ?>]" value="<?php echo $b ?>" hidden></li>
                <?php } ?>
            <?php } ?>
        </ol>
        <button>Отправить ответы</button>
    </form>
</head>
</html>
