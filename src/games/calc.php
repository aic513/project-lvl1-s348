<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Flow\gameFlow;

const DESCRIPTION = 'What is the result of the expression?';

function run()
{
    $getGameData = function () {
        $operations = ['addition', 'subtraction', 'multiplication'];
        $operation = $operations[rand(0, 2)];
        $first = rand(1, 100);
        $second = rand(1, 100);
        if ($operation === 'addition') {
            return ["$first + $second", $first + $second];
        } elseif ($operation === 'subtraction') {
            return ["$first - $second", $first - $second];
        } else {
            return ["$first * $second", $first * $second];
        }
    };
    gameFlow(DESCRIPTION, $getGameData);
}
