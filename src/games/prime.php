<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Flow\gameFlow;

const DESCRIPTION = 'Answer "yes" if number prime otherwise answer "no".';

function run()
{
    $isPrime = function ($number) {
        if ($number <= 1) {
            return false;
        }
        for ($i = 2; $i <= $number / 2; $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }

        return true;
    };

    $getAnswer = function ($question) use ($isPrime) {
        return $isPrime($question) ? 'yes' : 'no';
    };

    $generateGameData = function () use ($getAnswer) {
        $question = rand(1, 50);
        $answer = $getAnswer($question);

        return [$question, $answer];
    };

    gameFlow(DESCRIPTION, $generateGameData);
}
