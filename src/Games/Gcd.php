<?php

namespace Brain\Games\Gcd;

use function Brain\Engine\engine;

function gcd()
{
    $task = 'Find the greatest common divisor of given numbers.';
    $gameData = [];
    for ($i = 0; $i <= 2; $i++) {
        $randomNumber1 = random_int(1, 20);
        $randomNumber2 = random_int(1, 20);
        if ($randomNumber1 > $randomNumber2) {
            $temp = $randomNumber1;
            $randomNumber1 = $randomNumber2;
            $randomNumber2 = $temp;
        }

        for ($index = 1; $index < ($randomNumber1 + 1); $index++) {
            if ($randomNumber1 % $index === 0 && $randomNumber2 % $index === 0) {
                $correctAnswer = $index;
            }
        }

        $question = "{$randomNumber1 } {$randomNumber2}";
        $gameData[] = ['question' => $question, 'correctAnswer' => (string)$correctAnswer];
    }

    engine($task, $gameData);
}
