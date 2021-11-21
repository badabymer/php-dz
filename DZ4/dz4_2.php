<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$input = [
    'phone_code' => '+38',
    'phone_number' => '(000) 111-2233',
    'first_name' => 'John',
    'middle_name' => 'Malcolm',
    'last_name' => 'Doe'
];

// решил не усложнять, да и не уверен что тернарное выражение тут идеальное решение
//$phone = (!empty($input['phone_code']) ? $input['phone_code'] : "") . $input['phone_number'];
//$name = $input['first_name'] . ' ' . (!empty($input['middle_name']) ? $input['middle_name'] : ""). ' ' . $input['last_name'];
//$output = array('phone' => $phone, 'name' => $name);

// данная запись идентична предыдущей, как мне кажется
$output = array('phone' =>  $input['phone_code'].$input['phone_number'],  'name' => $input['first_name'].' '.$input['middle_name'].' '.$input['last_name']);
// либо тут тернарным выражением, если нет значения задаем.
//$output = array('phone' =>  (!empty($input['phone_code']) ? $input['phone_code'] : "+38").$input['phone_number'],  'name' => $input['first_name'].' '.$input['middle_name'].' '.$input['last_name']);

$html = ' <ul>
    <li><a href="tel:' . $output['phone'] . '">' . $output['phone'] . '</a></li>  <!-- не уверен что без кода страны пойдет вызов, могу ошибаться-->
    <li>' . $output['name'] . '</li>
  </ul>';

echo $html;
?>