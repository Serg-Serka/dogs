<?php

namespace App\Dogs;

class RubberDachshund implements Dog
{

    public function sound(): string
    {
        return 'weeee!';
    }

    public function hunt(): string
    {
        return '';
    }

}