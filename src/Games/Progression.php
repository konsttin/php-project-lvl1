<?php

namespace Brain\Games\Progression;

use function Brain\Engine\engine;

function progression()
{
    $task = 'What number is missing in the progression?';
    $gameData = [];
    for ($i = 0; $i <= 2; $i++) {
        $randomNumber1 = random_int(1, 50);
        $randomNumber2 = random_int(1, 10);
        $array[] = $randomNumber1;
        for ($index = 1; $index < 10; $index++) {
            $array[$index] = $array[$index - 1] + $randomNumber2;
        }
        $randomNumber3 = random_int(0, 9);
        $correctAnswer = $array[$randomNumber3];
        $array[$randomNumber3] = '..';

        $question = implode(' ', $array);
        $gameData[] = ['question' => $question, 'correctAnswer' => (string)$correctAnswer];
    }

    engine($task, $gameData);
}
