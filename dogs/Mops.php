<?php

namespace dogs;
//require("dogs/Dog.php");

class Mops implements Dog
{

    public function sound(): string
    {
        return 'Woof, woof!';
    }

    public function hunt(): string
    {
        return 'Mops hunts for lin!';

    }

}