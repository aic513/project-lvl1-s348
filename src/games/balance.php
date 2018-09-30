<?php

namespace BrainGames\Games\Balance;

use function BrainGames\Flow\gameFlow;

const DESCRIPTION = 'Balance the given number.';

function run()
{
    $balance = function ($number) {
        $numberAsString = (string)$number;
        $stringLength = strlen($numberAsString);
        $sum = array_sum(str_split($numberAsString));
        $min = floor($sum / $stringLength);
        $balance = $sum % $stringLength;
        $result = '';
        for ($i = 1; $i <= $stringLength; $i++) {
            if ($balance > 0) {
                $current = $min + 1;
            } else {
                $current = $min;
            }
            $balance--;
            $result = $current . $result;
        }

        return $result;
    };

    $generateGameData = function () use ($balance) {
        $question = rand(10, 9999);
        $answer = (string)$balance($question);

        return ["$question", $answer];
    };

    gameFlow(DESCRIPTION, $generateGameData);
}
