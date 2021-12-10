<?php
function str_to_camel(string $string): string
{
    if (true === isCamelCase($string)) {
        return $string;
    }

    static $cache = array();
    if (isset($cache[$string])) {
        return $cache[$string] = $cache[$string];
//    return $cache[$string] = $cache[$string].' from cache'; // раскоментить для проверки кеша
    }

    $camelcase = '';
    $separator = array('-', '_', ' ');
    foreach ($separator as $separat) {
        if (strpos($string, $separat) !== false) {
            $camelcase = ucwords($string, $separat);
            $camelcase = str_replace($separat, '', $camelcase);

        }
    }

    $cache[$string] = $camelcase;
    return $camelcase;
}

function isCamelCase($string)
{
    $separator = " \t";
    $array_words = array();
    $token = strtok($string, $separator);
    while ($token) {
        $array_words[] = $token;
        $token = strtok($separator);
    }
    foreach ($array_words as $word) {
        $word = mb_substr($word, 0, 1, 'utf-8');
        if (mb_strtolower($word, 'utf-8') === $word) {
            return false;
        }
    }
    return true;
}

print_r(str_to_camel('Hello World'));
echo PHP_EOL;
print_r(str_to_camel('hello world'));
echo PHP_EOL;
print_r(str_to_camel('hello-world'));
echo PHP_EOL;
print_r(str_to_camel('hello world'));
echo PHP_EOL;
print_r(str_to_camel('Hello_World'));
echo PHP_EOL;
print_r(str_to_camel('Hello World'));
echo PHP_EOL;
