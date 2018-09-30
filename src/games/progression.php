<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Flow\gameFlow;

const DESCRIPTION = 'What number is missing in this progression?';
const LENGTH_OF_PROGRESSION = 10;
const MIN_START_NUMBER = 1;
const MAX_START_NUMBER = 30;
const MIN_STEP_NUMBER = 2;
const MAX_STEP_NUMBER = 10;

function run()
{
    $getQuestion = function ($progression, $missingIndex) {
        $question = $progression;
        $question[$missingIndex] = '..';

        return implode(' ', $question);
    };

    $getProgression = function ($startNumber, $step, $endNumber) {
        return range($startNumber, $endNumber, $step);
    };

    $generateGameData = function () use ($getQuestion, $getProgression) {
        $startNumber = rand(MIN_START_NUMBER, MAX_START_NUMBER);
        $step = rand(MIN_STEP_NUMBER, MAX_STEP_NUMBER);
        $endNumber = ($startNumber - $step) + $step * LENGTH_OF_PROGRESSION;
        $progression = $getProgression($startNumber, $step, $endNumber);
        $missingIndex = array_rand($progression);
        $question = $getQuestion($progression, $missingIndex);
        $answer = (string)$progression[$missingIndex];

        return [$question, $answer];
    };

    gameFlow(DESCRIPTION, $generateGameData);
}
