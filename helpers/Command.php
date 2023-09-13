<?php

namespace helpers;

class Command
{
    public $mappings = [
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

    public function listDogs() {
        foreach ($this->mappings['breeds'] as $breed => $class) {
            echo ' -' . $breed . PHP_EOL;
        }
    }

    protected function createDog($breed) {
        return new $this->mappings['breeds'][$breed];
    }

    public function explodeCommandBySpace($command) {
        $result = explode(' ', $command);

        if (count($result) > 1 &&
            in_array($result[0], array_keys($this->mappings['breeds'])) &&
            in_array($result[1], $this->mappings['actions'])
        ) {
            return ['dog' => $result[0], 'action' => $result[1]];
        } else {
            return array_shift($result);
        }

    }

}