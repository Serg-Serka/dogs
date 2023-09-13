<?php
require "autoload.php";
use helpers\Command;

$welcomeMessage = "Welcome to the program!" . PHP_EOL
                . "Here you can interact with dogs and give them commands! Just try to type something like `mops sound`" . PHP_EOL
                . "To list all available dogs, type `list`" . PHP_EOL;

echo $welcomeMessage . PHP_EOL;
$command = readline();

if ($command) {
    $commandHelper = new Command($command);
    echo $commandHelper->execute();
};