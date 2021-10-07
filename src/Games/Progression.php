<?php

namespace Brain\Games\Progression;

use function Brain\Engine\playGame;

define("MAXELEMENTSCOUNT", 10);

function generateProgression(): array
{
    $startProgression = random_int(1, 50);
    $stepProgression = random_int(1, 10);
    $arrayProgression = [];
    for ($x = $startProgression; count($arrayProgression) < MAXELEMENTSCOUNT; $x++) {
        $x += $stepProgression;
        $arrayProgression[] = $x;
    }
    return $arrayProgression;
}

function playProgression(): void
{
    $task = 'What number is missing in the progression?';
    $gameData = [];
    for ($i = 0; $i <= ROUNDCOUNT; $i++) {
        $progression = generateProgression();
        $randomNumberQuestion = random_int(0, 9);
        $correctAnswer = $progression[$randomNumberQuestion];
        $progression[$randomNumberQuestion] = '..';

        $question = implode(' ', $progression);
        $gameData[] = ['question' => $question, 'correctAnswer' => (string)$correctAnswer];
    }
    playGame($task, $gameData);
}
