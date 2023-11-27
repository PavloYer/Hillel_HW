<?php
declare(strict_types=1);

//$array = [
//    ['name' => 'Bob', 'id' => 1, 'position' => 'editor', 'age' => 43],
//    ['name' => 'Bob', 'id' => 4, 'position' => 'editor', 'age' => 56],
//    ['name' => 'Marlin', 'id' => 6, 'position' => 'xor', 'age' => 27],
//    ['name' => 'Andy', 'id' => 5, 'position' => 'editor', 'age' => [63,4]],
//    ['name' => 'Max', 'id' => 2, 'position' => 'trainee', 'age' => 19],
//];
//
//$array_keys = ['first', 'second', 'third', 'fourth'];
//
//$a = array_replace($array[2], $array[3]);
//var_dump($a);



//var_dump(mb_detect_encoding(mb_convert_encoding('рно', "UTF-8")));
//die;

function checkGuess ($userGuess, $secretWord, $length): array {
    $guessCount = [];
    for($i = 0; $i < $length; $i++) {
        if($userGuess == $secretWord[$i]) {
            $guessCount[] = $i;
        }
    }
    return $guessCount;
}

function getUserGuess (): string {
//    $a = trim(fgets(STDIN));
//    var_dump(mb_detect_encoding(mb_convert_encoding($a, "UTF-8")));
//    die;
    return trim(fgets(STDIN));
}

$dictionary = explode(PHP_EOL, file_get_contents('dd.txt'));
$secretWord = $dictionary[array_rand($dictionary)];
var_dump($secretWord);
$length = mb_strlen($secretWord);
var_dump($length);

$hidden = str_pad('', $length, '*');

$tries = 6;
while($tries) {
    $userGuess = getUserGuess();
    $arrayGuessedChar = checkGuess($userGuess, $secretWord, $length);
    foreach ($arrayGuessedChar as $value) {
        $hidden[$value] = $userGuess;
    }
    var_dump($hidden);

    $tries--;
}