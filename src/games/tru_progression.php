<?php

namespace BrainGames\Games\TruProgression;

use function BrainGames\Flow\gameFlow;

const DESCRIPTION = 'Is this sequence a progression??';
const LENGTH_OF_PROGRESSION = 10;
const MIN_START_NUMBER = -100;
const MAX_START_NUMBER = 100;
const MIN_STEP_NUMBER = 2;
const MAX_STEP_NUMBER = 30;

function run()
{
    $getQuestion = function ($progression) {
        $question = $progression;

        return implode(', ', $question);
    };

    $getProgression = function ($startNumber, $step, $endNumber) {
        return range($startNumber, $endNumber, $step);
    };

    $getNumbers = function () {
        $numbers = [];
        for ($i = 0; $i < 10; $i++) {
            $numbers[] = mt_rand(1, 100);
        }

        return $numbers;
    };

    $isSequence = function ($question) {
        if (empty($question)) {
            return false;
        }
        $question = explode(', ', $question);
        $flag = true;
        for ($i = 0; $i < count($question) - 1; $i++) {
            if ($question[$i] >= $question[$i + 1]) {
                $flag = false;
                break;
            }
        }

        return $flag;
    };

    $getAnswer = function ($question) use ($isSequence) {
        return $isSequence($question) ? 'yes' : 'no';
    };

    $generateGameData = function () use ($getQuestion, $getProgression, $getNumbers, $getAnswer) {
        $startNumber = mt_rand(MIN_START_NUMBER, MAX_START_NUMBER);
        $step = mt_rand(MIN_STEP_NUMBER, MAX_STEP_NUMBER);
        $endNumber = ($startNumber - $step) + $step * LENGTH_OF_PROGRESSION;
        $progression = $getProgression($startNumber, $step, $endNumber);
        $data = (bool)random_int(0, 1) ? $progression : $getNumbers();
        $question = $getQuestion($data);
        $answer = $getAnswer($question);

        return [$question, $answer];
    };

    gameFlow(DESCRIPTION, $generateGameData);
}
