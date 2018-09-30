<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Flow\gameFlow;

const DESCRIPTION = 'What is the result of the expression?';
const
OPERATIONS = ['addition', 'subtraction', 'multiplication'];

function run()
{
    $generateGameData = function () {
        $operation = OPERATIONS[rand(0, 2)];
        $first = rand(1, 100);
        $second = rand(1, 100);
        $sumResult = $first + $second;
        $subtractionResult = $first - $second;
        $multiplicationResult = $first * $second;
        switch ($operation) {
            case 'addition':
                return ["$first + $second", (string)$sumResult];
            case 'subtraction':
                return ["$first - $second", (string)$subtractionResult];
            case 'multiplication':
                return ["$first * $second", (string)$multiplicationResult];
        }
    };

    gameFlow(DESCRIPTION, $generateGameData);
}
