<?php
// autoloader for dogs classes
spl_autoload_register(function ($className) {
    $className = str_replace('\\', '/', $className);
    if (strpos($className, 'dogs/') === false) {
        $className = 'dogs/' . $className;
    }
    require $className . '.php';
});

use dogs\Dachshund;
use dogs\Mops;
use dogs\PlushLabrador;
use dogs\RubberDachshund;
use dogs\Sibainu;

$welcomeMessage = "Welcome to the program!" . PHP_EOL
                . "Here you can interact with dogs and give them commands! Just try to type something like `mops sound`" . PHP_EOL
                . "To list all available dogs, type `list`" . PHP_EOL;

echo $welcomeMessage;
$command = readline();


$mappings = [
    'breeds' => [
        'mops' => Mops::class,
        'dachshund' => Dachshund::class,
        'plush_labrador' => PlushLabrador::class,
        'rubber_dachshund' => RubberDachshund::class,
        'sibainu' => Sibainu::class,
    ],
    'actions' => [
        'sound', 'hunt'
    ]
];

function listDogs() {
    global $mappings;
    foreach ($mappings['breeds'] as $breed => $class) {
        echo ' -' . $breed . PHP_EOL;
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
        $result = $dog->$action();

        if (is_array($result)) {
            foreach ($result as $item) {
                echo $command['dog'] . " hunts " . $item . PHP_EOL;
            }
        } else {
            echo $result;
        }

    } else {
        echo 'You type a non-existing command!' . PHP_EOL;
    }
};