<?php

namespace App\Dogs;

class Sibainu implements Dog
{
    public function sound(): string
    {
        return 'Woof, woof!';
    }

    public function hunt(): string
    {
        return 'Sibainu hunts for bear and wolf!';
    }

}