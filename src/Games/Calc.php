<?php

namespace Brain\Games\Calc;

use PHPUnit\Util\Exception;

use function Brain\Engine\engine;

function calc()
{
    $task = 'What is the result of the expression?';
    $gameData = [];
    for ($i = 0; $i <= 2; $i++) {
        $randomNumber1 = random_int(0, 10);
        $randomNumber2 = random_int(0, 10);
        $operator = ['*', '+', '-'];
        $randomOperator = $operator[random_int(0, 2)];
        switch ($randomOperator) {
            case '+':
                $correctAnswer = $randomNumber1 + $randomNumber2;
                break;
            case '-':
                $correctAnswer = $randomNumber1 - $randomNumber2;
                break;
            case '*':
                $correctAnswer = $randomNumber1 * $randomNumber2;
                break;
            default:
                throw new Exception('Неизвестный оператор');
        }
        $question = "{$randomNumber1 } {$randomOperator } {$randomNumber2}";
        $gameData[] = ['question' => $question, 'correctAnswer' => (string)$correctAnswer];
    }

    engine($task, $gameData);
}
