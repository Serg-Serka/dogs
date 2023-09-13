<?php

namespace helpers;

use dogs\Dachshund;
use dogs\Dog;
use dogs\Mops;
use dogs\PlushLabrador;
use dogs\RubberDachshund;
use dogs\Sibainu;

class Command
{
    protected $command;

    protected $mappings = [
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

    /**
     * Command class constructor
     *
     * @param $command
     */
    public function __construct($command)
    {
        $this->command = $command;
        $this->explodeCommandBySpace();
    }

    /**
     * Get a current command
     *
     * @return string|array
     */
    protected function getCommand()
    {
        return $this->command;
    }

    /**
     * Set a command
     *
     * @param $command
     * @return void
     */
    protected function setCommand($command) :void
    {
        $this->command = $command;
    }

    /**
     * Transform a command string
     *
     * @return void
     */
    private function explodeCommandBySpace() :void
    {
        $result = explode(' ', $this->getCommand());

        if (count($result) > 1 &&
            in_array($result[0], array_keys($this->mappings['breeds'])) &&
            in_array($result[1], $this->mappings['actions'])
        ) {
            $this->setCommand(['dog' => $result[0], 'action' => $result[1]]);
        } else {
            $this->setCommand(array_shift($result));
        }

    }

    /**
     * List all dogs
     *
     * @return string
     */
    public function listDogs(): string
    {
        $result = '';
        foreach ($this->mappings['breeds'] as $breed => $class) {
            $result .= ' -' . $breed . PHP_EOL;
        }

        return $result;
    }

    /**
     * Create a new instance of dog
     *
     * @param $breed
     * @return Dog
     */
    protected function createDog($breed) :Dog
    {
        return new $this->mappings['breeds'][$breed];
    }

    /**
     * Execute command
     *
     * @return string
     */
    public function execute(): string
    {
        $command = $this->getCommand();

        if ($command === 'list') {
            return $this->listDogs();
        } elseif (is_array($command) && array_key_exists('dog', $command)) {
            $dog = $this->createDog($command['dog']);
            $action = $command['action'];
            $actionResult = $dog->$action();
            return $actionResult . PHP_EOL;
        } else {
            return 'You type a non-existing command!' . PHP_EOL;
        }
    }

}