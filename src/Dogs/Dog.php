<?php

namespace App\Dogs;

interface Dog
{
    public function sound() :string;

    public function hunt() :string;
}