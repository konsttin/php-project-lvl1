<?php

namespace Brain\Games\Gcd;

use function Brain\Engine\engine;

function findGcd(int $number1, int $number2): int
{
    $result = 1;
    for ($index = 1; $index < ($number1 + 1); $index++) {
        if ($number1 % $index === 0 && $number2 % $index === 0) {
            $result = $index;
        }
    }
    return $result;
}

function gcd(): void
{
    $task = 'Find the greatest common divisor of given numbers.';
    $gameData = [];
    for ($i = 0; $i <= 2; $i++) {
        $randomNumber1 = random_int(1, 30);
        $randomNumber2 = random_int(1, 30);
        if ($randomNumber1 > $randomNumber2) {
            $temp = $randomNumber1;
            $randomNumber1 = $randomNumber2;
            $randomNumber2 = $temp;
        }
        $correctAnswer = findGcd($randomNumber1, $randomNumber2);
        $question = "{$randomNumber1 } {$randomNumber2}";
        $gameData[] = ['question' => $question, 'correctAnswer' => (string)$correctAnswer];
    }

    engine($task, $gameData);
}
