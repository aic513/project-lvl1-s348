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

    $infoAboutGame = function () use ($getAnswer) {
        $question = rand(1, 100);
        $result = [$question, $getAnswer($question)];

        return $result;
    };

    gameFlow(DESCRIPTION, $infoAboutGame);
}
