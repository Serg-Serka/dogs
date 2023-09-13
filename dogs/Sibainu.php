<?php

namespace dogs;
//require("dogs/Dog.php");

class Sibainu implements Dog
{
    public function sound(): string
    {
        return 'Woof, woof!';
    }

    public function hunt(): array
    {
        return [
            'bear', 'wolf'
        ];
    }

}