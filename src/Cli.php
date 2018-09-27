<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function run()
{
    greeting();
    nameAsking();
}

function greeting()
{
    line('Welcome to the Brain Game!');
}

function nameAsking()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
