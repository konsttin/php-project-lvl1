<?php

namespace Brain\Games\Even;

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
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $num = random_int(0, 99);
        $numEven = $num % 2;

        if ($numEven === 0) {
            $correctAnswer = 'yes';
            } else {
            $correctAnswer = 'no';
            }

        $answer = prompt('Question:', $num);

        if($answer === $correctAnswer){
            line("Your answer: %s\nCorrect!", $answer);
                    } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.\nLet\'s try again, %s", $answer, $correctAnswer, $name);
            break;
        }
        }
    line("Congratulations, %s!", $name);

}
