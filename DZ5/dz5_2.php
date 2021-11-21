<?php
//Дан массив случайных целых чисел. Определите, есть ли в массиве повторяющиеся элементы.
// предложил пару вариантов, но не для всех типов массивов они подойдут.

$array = array(12, 19, 13, 14, 15, 12, 16);
//$array = array('a'=>12, 19, 13, 14, 15, 12, 16); крашанет первый вариант
$arrHaveDouble = false;
$countarr = count($array);
for ($i = 0; $i < $countarr; $i++) {
    for ($z = 0; $z < $countarr; $z++) {
        if ($z === $i) {
            continue;
        }
        if ($array[$i] === $array[$z]) {
            $arrHaveDouble = true;
            break;
        }
    }
    if ($arrHaveDouble) {
        break;
    }

}
if ($arrHaveDouble) {
    echo "Результат первого решения ==> ";
    echo("В массиве есть повторяющиеся элементы");
    echo PHP_EOL;
} else {
    echo "Результат первого решения ==> ";
    echo "В массиве нет повторяющихся элементов";
    echo PHP_EOL;
}


/// вариант функциями php

$array_uniq = array_unique($array);
if (count($array) !== count($array_uniq)) {
    echo "Результат второго решения ==> ";
    echo "В массиве есть повторяющиеся элементы.";
    echo PHP_EOL;
} else {
    echo "Результат второго решения ==> ";
    echo "В массиве нет повторяющихся элементов.";
    echo PHP_EOL;
}

/// еще альтернативный вариант

$array_uniq = array_unique($array);
if (array_diff_key($array, $array_uniq)) {
    echo "Результат третьего решения ==> ";
    echo "В массиве есть повторяющиеся элементы.";
    echo PHP_EOL;
} else {
    echo "Результат третьего решения ==> ";
    echo "В массиве нет повторяющихся элементов.";
    echo PHP_EOL;
}

