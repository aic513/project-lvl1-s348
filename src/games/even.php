<?php

namespace BrainGames\Games;

use function \cli\line;
use function \cli\prompt;

define('COUNT_ANSWERS', 3);

function run()
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if number even otherwise answer "no".' . PHP_EOL);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($i = 1; $i <= COUNT_ANSWERS; $i++) {
        $number = rand(1, 1000);
        line("Question:{$number}");
        $answer = prompt('Your answer');
        checkAnswer($number, $answer, $name);
    }
}

function checkAnswer($number, $answer, $name)
{
    if (($number % 2 === 0 && $answer === "yes") || ($number % 2 !== 0 && $answer === "no")) {
        line('Correct!' . PHP_EOL);
    } else {
        line();
        isAnswerRight($number);
        line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'', $answer, isAnswerRight($number));
        line('Let\'s try again, %s!', $name);
        exit();
    }
    line('Congratulations, %s!', $name);
}

function isAnswerRight($number)
{
    return ($number % 2) === 0 ? "yes" : "no";
}


