<?php

$welcomeMessage = "Welcome to the program!" . PHP_EOL
                . "Here you can interact with dogs and give them commands! Just try to type something like `mops sound`" . PHP_EOL
                . "To list all available dogs, type `list`" . PHP_EOL;

echo $welcomeMessage;
$command = readline();

require("command_manager.php");