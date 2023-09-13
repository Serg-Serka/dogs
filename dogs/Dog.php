<?php

namespace dogs;

interface Dog
{
    public function sound() :string;

    public function hunt() :array;
}