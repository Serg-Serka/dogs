<?php

namespace tests\Dogs;

use PHPUnit\Framework\TestCase;
use App\Dogs\RubberDachshund;

class RubberDachshundTest extends TestCase
{
    private $dog;

    protected function setUp(): void
    {
        $this->dog = new RubberDachshund();
    }

    protected function tearDown(): void
    {
        $this->dog = null;
    }

    public function testSound()
    {
        $this->assertEquals('weeee!', $this->dog->sound());
    }

    public function testHunt()
    {
        $this->assertEquals('', $this->dog->hunt());
    }

}