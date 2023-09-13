<?php

namespace dogs;
//require("dogs/Dog.php");

class Dachshund implements Dog
{
    public function sound(): string
    {
        return 'Woof, woof!';
    }

    public function hunt(): array
    {
        return [
            'fox', 'badger'
        ];
    }
}