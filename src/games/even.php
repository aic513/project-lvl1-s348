<?php

namespace BrainGames\Games;

use function \cli\line;
use function \cli\prompt;

const COUNT_ANSWERS = 3;

function run()
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if number even otherwise answer "no".' . PHP_EOL);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($i = 1; $i <= COUNT_ANSWERS; $i++) {
        $question = rand(1, 1000);
        line("Question:{$question}");
        $answer = prompt('Your answer');
        if (($question % 2 === 0 && $answer === "yes") || ($question % 2 !== 0 && $answer === "no")) {
            line('Correct!' . PHP_EOL);
        } else {
            line();
            getAnswer($question);
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'', $answer, getAnswer($question));
            line('Let\'s try again, %s!', $name);
            return;
        }
        line('Congratulations, %s!', $name);
    }
}

function isEven($number)
{
    return ($number % 2 === 0) ? true : false;
}

function getAnswer($question)
{
    return isEven($question) ? "yes" : "no";
}
