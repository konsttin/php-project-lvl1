<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

function engine(string $task, array $gameData = []): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("{$task}");
    $count = 0;
    foreach ($gameData as $round) {
        $question = $round['question'];
        $correctAnswer = $round['correctAnswer'];

        $userAnswer = prompt("Question: {$question}");

        if ($count === 2 && $userAnswer === $correctAnswer) {
            line("Correct!\nCongratulations, %s!", $name);
            break;
        }

        if ($userAnswer === $correctAnswer) {
            line("Your answer: %s\nCorrect!", $userAnswer);
            $count++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.\n" .
                "Let's try again, %s!", $userAnswer, $correctAnswer, $name);
            break;
        }
    }
}
