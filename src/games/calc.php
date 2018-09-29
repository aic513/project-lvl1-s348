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
        switch ($operation) {
            case 'addition':
                return ["$first + $second", $first + $second];
            case 'subtraction':
                return ["$first - $second", $first - $second];
            case 'multiplication':
                return ["$first * $second", $first * $second];
        }
    };

    gameFlow(DESCRIPTION, $generateGameData);
}
