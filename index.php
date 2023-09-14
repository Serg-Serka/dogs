<?php
require "autoload.php";

use Helpers\Command;

$welcomeMessage = "Welcome to the program!" . PHP_EOL
                . "Here you can interact with Dogs and give them commands! Just try to type something like `mops sound`" . PHP_EOL
                . "To list all available Dogs, type `list`" . PHP_EOL;

echo $welcomeMessage . PHP_EOL;
$command = readline();

if ($command) {
    $commandHelper = new Command($command);
    echo $commandHelper->execute();
};