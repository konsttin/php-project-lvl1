<?php

namespace Brain\Games\Prime;

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
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 0; $i <= 3; $i++) {
        $rand1 = random_int(2, 50);
        $result = true;
        for ($ind = 2; $ind < $rand1; $ind++) {
            if ($rand1 % $ind == 0) {
                $result = false;
                break;
            }
        }
        if ($result === true) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }

        $answer = prompt('Question:', $rand1);

        if ($answer === $correctAnswer) {
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
