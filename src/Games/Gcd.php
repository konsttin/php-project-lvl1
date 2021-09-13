<?php

namespace Brain\Games\Gcd;

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
    line('Find the greatest common divisor of given numbers.');
    for ($i = 0; $i <= 3; $i++) {
        $rand1 = random_int(1, 20);
        $rand2 = random_int(1, 20);
        if ($rand1 > $rand2) {
            $temp = $rand1;
            $rand1 = $rand2;
            $rand2 = $temp;
        }

        for ($ind = 1; $ind < ($rand1 + 1); $ind++) {
            if ($rand1 % $ind === 0 && $rand2 % $ind === 0) {
                $correctAnswer = $ind;
            }
        }

        $answer = prompt('Question:', "{$rand1 } {$rand2}");

        if ((int)$answer === (int)$correctAnswer) {
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
