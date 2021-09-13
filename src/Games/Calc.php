<?php

namespace Brain\Games\Calc;

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
    line('What is the result of the expression?');
    for ($i = 0; $i <= 3; $i++) {
        $rand1 = random_int(0, 10);
        $rand2 = random_int(0, 10);
        $operator = array('*', '+', '-');
        $randOperator = $operator[random_int(0, 2)];
        switch ($randOperator) {
            case '+':
                $correctAnswer = $rand1 + $rand2;
                break;
            case '-':
                $correctAnswer = $rand1 - $rand2;
                break;
            case '*':
                $correctAnswer = $rand1 * $rand2;
                break;
        }
        $question = "{$rand1 } {$randOperator } {$rand2}";

        $answer = prompt('Question:', $question);

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
