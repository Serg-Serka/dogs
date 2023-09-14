<?php

namespace App\Dogs;

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