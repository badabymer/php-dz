<?php
//Дано 6-значное число. Определите, является ли оно счастливым. Счастливо число -- это такое число, у которого сумма первых трех его цифр равна сумме последний трех цифр.

$digits="51151"; //



$summFirst=$digits[0]+$digits[1]+$digits[2];
$summLast=$digits[3]+$digits[4]+$digits[5];
if($summFirst === $summLast){
    echo "Результат первого решения ==> ";
    echo "Число $digits является счастливым";
    echo PHP_EOL;
}else{
    echo "Результат первого решения ==> ";
    echo "Число $digits не является счастливым";
    echo PHP_EOL;
}

// еще вариант
$summFirst = 0; // зададим значение т.к выше по коду у нас есть данная переменная.
$summLast = 0;
$count = count(str_split($digits));
for($i=0;$i<$count;$i++) {
  if($i <=2 ){
      $summFirst += $digits[$i];
  }elseif($i>=3){
      $summLast += $digits[$i];
  }

}
if($summFirst === $summLast){
    echo "Результат второго решения ==> ";
    echo "Число $digits является счастливым";
    echo PHP_EOL;
}else{
    echo "Результат второго решения ==> ";
    echo "Число $digits не является счастливым";
    echo PHP_EOL;
}

// функциями php
$firstDig = substr($digits, 0,3);
$lastDig = substr($digits, 3,3);
$summFirst=array_sum(str_split($firstDig));
$summLast=array_sum(str_split($lastDig));
if($summFirst === $summLast){
    echo "Результат третьего решения ==> ";
    echo "Число $digits является счастливым";
    echo PHP_EOL;
}else{
    echo "Результат третьего решения ==> ";
    echo "Число $digits не является счастливым";
    echo PHP_EOL;
}


// немного крови из глаз, но как Вы говорили лучше не делать и не будем)

if(array_sum(str_split(substr($digits, 0,3))) === array_sum(str_split(substr($digits, 3,3)))){
    echo "Результат четвертого решения ==> ";
    echo "Число $digits является счастливым";
    echo PHP_EOL;
}else{
    echo "Результат четвертого решения ==> ";
    echo "Число $digits не является счастливым";
    echo PHP_EOL;
}

