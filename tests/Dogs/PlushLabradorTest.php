<?php

namespace tests\Dogs;

use PHPUnit\Framework\TestCase;
use App\Dogs\PlushLabrador;

class PlushLabradorTest extends TestCase
{
    private $dog;

    protected function setUp(): void
    {
        $this->dog = new PlushLabrador();
    }

    protected function tearDown(): void
    {
        $this->dog = null;
    }

    public function testSound()
    {
        $this->assertEquals('', $this->dog->sound());
    }

    public function testHunt()
    {
        $this->assertEquals('', $this->dog->hunt());
    }

}