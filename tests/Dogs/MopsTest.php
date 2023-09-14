<?php

namespace tests\Dogs;

use PHPUnit\Framework\TestCase;
use App\Dogs\Mops;

class MopsTest extends TestCase
{
    private $dog;

    protected function setUp(): void
    {
        $this->dog = new Mops();
    }

    protected function tearDown(): void
    {
        $this->dog = null;
    }

    public function testSound()
    {
        $this->assertEquals('Woof, woof!', $this->dog->sound());
    }

    public function testHunt()
    {
        $this->assertEquals('Mops hunts for lin!', $this->dog->hunt());
    }

}