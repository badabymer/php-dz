<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    header('Location: test.php');

    die;
}
$isNotFullData = empty($_POST['answer_user']) ||
    empty($_POST['question_first']) ||
    empty($_POST['question_second']);

if ($isNotFullData) {
    header('Location: test.php');
    die;
}
$answer_user_user=$_POST['answer_user'];
$question_first = $_POST['question_first'];
$question_second = $_POST['question_second'];
$answer_user_array = [];
for ($i = 0; $i <= 11; $i++) {
    if ($i <= 2) {
        $answer_user_array[$i] = $question_first[$i] + $question_second[$i];
    } elseif ($i >= 3 && $i <= 5) {
        $answer_user_array[$i] = $question_first[$i] - $question_second[$i];
    } elseif ($i >= 6 && $i <= 8) {
        $answer_user_array[$i] = $question_first[$i] * $question_second[$i];
    } elseif ($i >= 9 && $i <= 11) {
        $answer_user_array[$i] = $question_first[$i] / $question_second[$i];
        $answer_user_array[$i] = round($answer_user_array[$i]);
    }
}

$result = count(array_intersect_assoc($answer_user_user, $answer_user_array));
?>

<table border="1" align="center">
    <caption>Ваш результат <?php echo $result ?>/12</caption>
    <tr>
        <th>№ вопроса</th>
        <th>Ваш ответ</th>
        <th>Правильный ответ</th>
        <th>Результат</th>
    </tr>

<?php

for ($z = 0; $z <= 11; $z++) {
    if($answer_user_user[$z] == $answer_user_array[$z]){
        ?> <tr><td><?php echo $z+1;?></td><td><?php echo $answer_user_user[$z];?></td><td><?php echo $answer_user_array[$z];?></td><td><font color="green">Правильно</font></td></tr><?php
}else{
        ?> <tr><td><?php echo $z+1;?></td><td><?php echo $answer_user_user[$z];?></td><td><?php echo $answer_user_array[$z];?></td><td><font color="red">Ошибка</font></td></tr><?php
    }
}
?>
</table>
