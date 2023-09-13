<?php

namespace dogs;
//require("dogs/Dog.php");

class RubberDachshund implements Dog
{

    public function sound(): string
    {
        return 'weeee!';
    }

    public function hunt(): array
    {
        return [];
    }

}