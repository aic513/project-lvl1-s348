<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Flow\gameFlow;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function run()
{
    $gcd = function ($a, $b) use (&$gcd) {
        $large = $a > $b ? $a : $b;
        $small = $a > $b ? $b : $a;
        $remainder = $large % $small;

        return 0 === $remainder ? $small : $gcd($small, $remainder);
    };
    $generateGameData = function () use ($gcd) {
        $first = rand(1, 100);
        $second = rand(1, 100);

        $question = "{$first} {$second}";
        $answer = $gcd($first, $second);

        return [$question, (string)$answer];
    };

    gameFlow(DESCRIPTION, $generateGameData);
}
