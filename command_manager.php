<?php

require('dogs/Dog.php');
require('dogs/Dachshund.php');
require('dogs/Mops.php');
require('dogs/PlushLabrador.php');
require('dogs/RubberDachshund.php');
require('dogs/Sibainu.php');

$mappings = [
    'breeds' => [
        'mops' => \dogs\Mops::class,
        'dachshund' => \dogs\Dachshund::class,
        'plush_labrador' => \dogs\PlushLabrador::class,
        'rubber_dachshund' => \dogs\RubberDachshund::class,
        'sibainu' => \dogs\Sibainu::class,
    ],
    'actions' => [
        'sound', 'hunt'
    ]
];

function listDogs() {
    global $mappings;
    foreach ($mappings as $mapping => $class) {
        echo ' -' . $mapping . PHP_EOL;
    }
}

function createDog($breed) {
    global $mappings;
    return new $mappings['breeds'][$breed];
}

function explodeCommandBySpace($command) {
    global $mappings;
    $result = explode(' ', $command);

    if (count($result) > 1 &&
        in_array($result[0], array_keys($mappings['breeds'])) &&
        in_array($result[1], $mappings['actions'])
    ) {
        return ['dog' => $result[0], 'action' => $result[1]];
    } else {
        return array_shift($result);
    }

}

if ($command) {
    $command = explodeCommandBySpace($command);

    if ($command == 'list') {
        listDogs();
    } elseif (is_array($command)) {
        $dog = createDog($command['dog']);
        $action = $command['action'];
        var_dump($dog->$action());

    } else {
        echo 'You type a non-existing command!' . PHP_EOL;
    }
};