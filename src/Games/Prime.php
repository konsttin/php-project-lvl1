<?php

namespace Brain\Games\Prime;

use function Brain\Engine\playGame;

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

function playPrime(): void
{
    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameData = [];
    for ($i = 0; $i <= ROUNDCOUNT; $i++) {
        $randomNumber = random_int(2, 50);
        $correctAnswer = isPrime($randomNumber) ? 'yes' : 'no';

        $question = (string)$randomNumber;
        $gameData[] = ['question' => $question, 'correctAnswer' => $correctAnswer];
    }

    playGame($task, $gameData);
}
