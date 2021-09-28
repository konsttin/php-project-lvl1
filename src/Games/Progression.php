<?php

namespace Brain\Games\Progression;

use function Brain\Engine\engine;

function generateProgression(): array
{
    $startProgression = random_int(1, 50);
    $stepProgression = random_int(1, 10);
    $arrayProgression = [];
    for ($x = $startProgression, $loopsMax = count($arrayProgression); $loopsMax < 10; $x++) {
        $x += $stepProgression;
        $arrayProgression[] = $x;
    }
    return $arrayProgression;
}

function progression()
{
    $task = 'What number is missing in the progression?';
    $gameData = [];
    for ($i = 0; $i <= 2; $i++) {
        $progression = generateProgression();
        $randomNumberQuestion = random_int(0, 9);
        $correctAnswer = $progression[$randomNumberQuestion];
        $progression[$randomNumberQuestion] = '..';

        $question = implode(' ', $progression);
        $gameData[] = ['question' => $question, 'correctAnswer' => (string)$correctAnswer];
    }
    engine($task, $gameData);
}
