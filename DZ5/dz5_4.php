<?php

//Напишите программу, которая преобразует формат номера телефона из 0661002030 в +38 (066) 100-20-30.

$phoneMobile = '0661002030';
$newPhoneMobile= "+38";
//если закреплять тему циклов
$count = count(str_split($phoneMobile));
for($i=0;$i<$count;$i++)
{
    if($i === 0){
        $newPhoneMobile .= " (";
    }
    if($i<=2){
        $newPhoneMobile .= $phoneMobile[$i];
    }
    if($i === 3){
        $newPhoneMobile .= ") ";
    }
    if($i>=3 && $i<=5){
        $newPhoneMobile .= $phoneMobile[$i];
    }
    if($i === 5){
        $newPhoneMobile .= "-";
    }
    if($i>=6 && $i<=7){
        $newPhoneMobile .= $phoneMobile[$i];
    }
    if($i === 7){
        $newPhoneMobile .= "-";
    }
    if($i>=8){
        $newPhoneMobile .= $phoneMobile[$i];
    }

}
echo "Результат первого решения ==> ";
echo $newPhoneMobile;
echo PHP_EOL;

// еще вариант

$newPhoneMobile = '+38 ('
    .$phoneMobile[0].$phoneMobile[1].$phoneMobile[2].') '
    .$phoneMobile[3].$phoneMobile[4].$phoneMobile[5].'-'
    .$phoneMobile[6].$phoneMobile[7].'-'.$phoneMobile[8].$phoneMobile[9];
echo "Результат второго решения ==> ";
echo $newPhoneMobile;
echo PHP_EOL;


// еще вариант
$str1 = substr($phoneMobile,0,3);
$str2 = substr($phoneMobile,3,3);
$str3 = substr($phoneMobile,6,2);
$str4 = substr($phoneMobile,8,2);
$newPhoneMobile = '+38 ('.$str1.') '.$str2.'-'.$str3.'-'.$str4;
echo "Результат третьего решения ==> ";
echo $newPhoneMobile;
echo PHP_EOL;

