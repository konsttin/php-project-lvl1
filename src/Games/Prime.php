<?php

namespace Brain\Games\Prime;

use function Brain\Engine\engine;

function isPrime(int $number): bool
{
    $result = true;
    for ($index = 2; $index < $number; $index++) {
        if ($number % $index === 0) {
            $result = false;
            break;
        }
    }
    return $result;
}

function prime(): void
{
    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameData = [];
    for ($i = 0; $i <= 2; $i++) {
        $randomNumber = random_int(2, 50);
        $correctAnswer = isPrime($randomNumber) ? 'yes' : 'no';

        $question = (string)$randomNumber;
        $gameData[] = ['question' => $question, 'correctAnswer' => $correctAnswer];
    }

    engine($task, $gameData);
}
