<?php

namespace BrainGames\Games\Even;

use function BrainGames\Flow\gameFlow;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function run()
{
    $isEven = function ($number) {
        return $number % 2 === 0;
    };

    $getAnswer = function ($question) use ($isEven) {
        return $isEven($question) ? 'yes' : 'no';
    };

    $generateGameData = function () use ($getAnswer) {
        $question = mt_rand(1, 100);
        $answer = $getAnswer($question);
        $result = [$question, $answer];

        return $result;
    };

    gameFlow(DESCRIPTION, $generateGameData);
}
