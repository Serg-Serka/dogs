<?php

namespace tests\Dogs;

use PHPUnit\Framework\TestCase;
use App\Dogs\Sibainu;

class SibainuTest extends TestCase
{
    private $dog;

    protected function setUp(): void
    {
        $this->dog = new Sibainu();
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
        $this->assertEquals('Sibainu hunts for bear and wolf!', $this->dog->hunt());
    }

}