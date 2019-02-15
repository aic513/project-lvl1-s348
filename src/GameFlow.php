<?php

namespace BrainGames\Flow;

use function BrainGames\Cli\greeting;
use function \cli\line;
use function \cli\prompt;

const COUNT_ANSWERS = 3;

function gameFlow($description, $infoAboutGame)
{
    greeting();
    line($description . PHP_EOL);
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line();
    $isVictory = gameLogic($infoAboutGame);
    $message = $isVictory ? 'Congratulations, %s!' : 'Let\'s try again, %s!';
    line($message, $name);
}

function gameLogic($infoAboutGame)
{
    for ($i = 1; $i <= COUNT_ANSWERS; $i++) {
        list($question, $rightAnswer) = $infoAboutGame();
        line('Question: ' . $question);
        $answer = prompt('Your answer');
        if ($answer !== $rightAnswer) {
            line("'$answer' is wrong answer ;(. Correct answer was '$rightAnswer'.");

            return false;
        }
        line('Correct!');
    }

    return true;
}
