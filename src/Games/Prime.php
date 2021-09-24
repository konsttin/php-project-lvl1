<?php

namespace Brain\Games\Prime;

use function Brain\Engine\engine;

function prime()
{
    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameData = [];
    for ($i = 0; $i <= 2; $i++) {
        $randomNumber = random_int(2, 50);
        $result = true;
        for ($index = 2; $index < $randomNumber; $index++) {
            if ($randomNumber % $index == 0) {
                $result = false;
                break;
            }
        }
        $correctAnswer = $result ? 'yes' : 'no';

        $question = "{$randomNumber}";
        $gameData[] = ['question' => $question, 'correctAnswer' => (string)$correctAnswer];
    }

    engine($task, $gameData);
}
