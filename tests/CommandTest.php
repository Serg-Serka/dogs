<?php
namespace tests;

use PHPUnit\Framework\TestCase;
use App\Helpers\Command;
use App\Dogs\Dog;
class CommandTest extends TestCase
{
    public function testListDogs()
    {
        $commandObject = new Command('list');

        $this->assertEquals('list', $commandObject->getCommand());
        $mappings = $commandObject->getMappings();
        $dogList = $commandObject->listDogs();

        foreach (array_keys($mappings['breeds']) as $breed) {
            $this->assertStringContainsString($breed, $dogList);
        }

    }

    public function testCreateDog()
    {
        $commandObject = new Command('mops sound');

        $this->assertArrayHasKey('dog', $commandObject->getCommand());
        $this->assertArrayHasKey('action', $commandObject->getCommand());
        $this->assertEquals('mops', $commandObject->getCommand()['dog']);
        $this->assertEquals('sound', $commandObject->getCommand()['action']);

        $dog = $commandObject->createDog($commandObject->getCommand()['dog']);

        $this->assertInstanceOf(Dog::class, $dog);
    }

    public function testExecuteListDogs()
    {
        $commandObject = new Command('list');
        $mappings = $commandObject->getMappings();
        $dogList = $commandObject->execute();
        foreach (array_keys($mappings['breeds']) as $breed) {
            $this->assertStringContainsString($breed, $dogList);
        }
    }

    public function testExecuteSibainuHunt()
    {
        $commandObject = new Command('sibainu hunt');
        $this->assertStringStartsWith('Sibainu hunts for bear and wolf!', $commandObject->execute());
    }

    public function testExecuteWrongCommand()
    {
        $commandObject = new Command('non-existing command');
        $this->assertStringStartsWith('You type a non-existing command!', $commandObject->execute());
    }

}