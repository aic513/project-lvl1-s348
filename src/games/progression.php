<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Flow\gameFlow;

const DESCRIPTION = 'What number is missing in this progression?';
const LENGTH_OF_PROGRESSION = 10;

function run()
{
    $getQuestion = function ($progression, $missingIndex) {
        $question = $progression;
        $question[$missingIndex] = '..';

        return implode(' ', $question);
    };

    $getProgression = function () {
        $startNumber = rand(1, 30);
        $step = rand(2, 10);
        $endNumber = ($startNumber - $step) + $step * LENGTH_OF_PROGRESSION;

        return range($startNumber, $endNumber, $step);
    };

    $generateGameData = function () use ($getQuestion, $getProgression) {
        $progression = $getProgression();
        $missingIndex = array_rand($progression);
        $question = $getQuestion($progression, $missingIndex);
        $answer = $progression[$missingIndex];

        return [$question, $answer];
    };

    gameFlow(DESCRIPTION, $generateGameData);
}




