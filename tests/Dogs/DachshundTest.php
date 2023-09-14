<?php

namespace tests\Dogs;

use PHPUnit\Framework\TestCase;
use App\Dogs\Dachshund;

class DachshundTest extends TestCase
{
    private $dog;

    protected function setUp(): void
    {
        $this->dog = new Dachshund();
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
        $this->assertEquals('Dachshund hunts for fox and badger!', $this->dog->hunt());
    }

}