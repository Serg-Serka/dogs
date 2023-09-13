<?php

namespace dogs;
//require("dogs/Dog.php");

class Dachshund implements Dog
{
    public function sound(): string
    {
        return 'Woof, woof!';
    }

    public function hunt(): string
    {
        return 'Dachshund hunts for fox and badger!';
    }
}