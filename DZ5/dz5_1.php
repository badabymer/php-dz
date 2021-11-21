<?php
//Дан массив случайных целых чисел. Найдите количество максимумов и минимумов этого массива.

$array = array(111,66, 45, 116, 21, 19, 13, 21,12, 21,21, 14, 15, 12,2,2,2,2,2,2,2);

$maxNumber = PHP_INT_MIN;
$minNumber = PHP_INT_MAX;
$countMaxNumber = 0;
$countMinNumber = 0;
$countArr = count($array);
    for ($i = 0; $i < $countArr; $i++) {
        if ($maxNumber < $array[$i]) {
            $maxNumber = $array[$i];
        }elseif($minNumber > $array[$i]){
            $minNumber = $array[$i];
        }

    }
    for ($z = 0; $z < $countArr; $z++) {
        if ($maxNumber == $array[$z]) {
            $countMaxNumber++;
        }
    }

for ($k = 0; $k < $countArr; $k++) {
    if ($minNumber == $array[$k]) {
        $countMinNumber++;
    }
}
echo "Результат первого решения ==> ";
echo "Максимум массива $maxNumber, кол-во максимуммов $countMaxNumber";
echo PHP_EOL;
echo "Результат первого решения ==> ";
echo "Минимум массива $minNumber, кол-во минимумов $countMinNumber";
echo PHP_EOL;



$maxNumber = PHP_INT_MIN;
$minNumber = PHP_INT_MAX;
$countMaxNumber = 0;
$countMinNumber = 0;
foreach ($array as $value) {
    if ($maxNumber <= $value) {
        $maxNumber = $value;
    }elseif ($minNumber > $value){
        $minNumber = $value;
    }

}
foreach ($array as $value) {
    if ($maxNumber === $value) {
        $countMaxNumber++;
    }elseif ($minNumber === $value){
        $countMinNumber++;
    }
}


echo "Результат второго решения ==> ";
echo "Максимум массива $maxNumber, кол-во максимуммов $countMaxNumber";
echo PHP_EOL;
echo "Результат второго решения ==> ";
echo "Минимум массива $minNumber, кол-во минимумов $countMinNumber";
echo PHP_EOL;


// вариант стандартными функциями php

$maxNumber = PHP_INT_MIN;
$minNumber = PHP_INT_MAX;
$countMaxNumber = 0;
$countMinNumber = 0;

$maxNumber= max($array);
$minNumber= min($array);
$countMaxNumber = count(array_intersect($array, array($maxNumber)));
$countMinNumber = count(array_intersect($array, array($minNumber)));
echo "Результат третьего решения ==> ";
echo "Максимум массива $maxNumber, кол-во максимуммов $countMaxNumber";
echo PHP_EOL;
echo "Результат третьего решения ==> ";
echo "Минимум массива $minNumber, кол-во минимумов $countMinNumber";
echo PHP_EOL;
