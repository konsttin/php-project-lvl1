<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;

function greeting()
{
    global $name;
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}

function question()
{
    global $name;
    line('What number is missing in the progression?');
    for ($i = 0; $i <= 3; $i++) {
        $rand1 = random_int(0, 50);
        $rand2 = random_int(0, 10);
        $array[] = $rand1;
        for ($ind = 1; $ind <= 10; $ind++) {
            $array[$ind] = $array[$ind - 1] + $rand2;
        }
        $rand3 = random_int(0, 9);
        $correctAnswer = $array[$rand3];
        $array[$rand3] = '..';

        $answer = prompt('Question:', implode(' ', $array));

        if (intval($answer) === intval($correctAnswer)) {
            if ($i === 2) {
                line("Correct!\nCongratulations, %s!", $name);
                break;
            }
            line("Your answer: %s\nCorrect!", $answer);
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.\n" .
                "Let\'s try again, %s!", $answer, $correctAnswer, $name);
            break;
        }
    }
}
