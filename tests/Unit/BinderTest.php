<?php


use PangolinKeys\Binders\Example\Person;
use PangolinKeys\Binders\Example\Preference;

class BinderTest extends \Orchestra\Testbench\TestCase
{

    protected $person;

    protected $preferences;

    /**
     * Example of string name present in both example data structures.
     *
     * @var
     */
    protected $name;

    /**
     * Example of string key present in both example data structures.
     *
     * @var
     */
    protected $key;

    public function setUp()
    {
        parent::setUp();

        $this->person = new Person();
        $this->preferences = new Preference();
        $this->name = 'Dave';
        $this->key = 'Age';

    }

    public function testCreates()
    {
        $this->assertNotEmpty($this->person);
    }

    public function testKeysCorrect()
    {
        $this->assertEquals($this->person->getKeys()[0], $this->name);
    }

    public function testGetKeysOnBoth()
    {
        $this->assertEquals($this->person->getKeys(), $this->preferences->getKeys());
    }

    public function testPersonCanBind()
    {
        $this->person->bind($this->preferences, $this->key);
        $this->assertNotEquals($this->person->getAge($this->name), 1);
    }

    public function testValuesDifferentBeforeBind()
    {
        $this->assertNotEquals($this->person->getAge($this->name), $this->preferences->getAge($this->name));
    }

    public function testOutcomeOfBindCorrect()
    {
        $this->person->bind($this->preferences, $this->key);
        $this->assertEquals($this->person->getAge($this->name), $this->preferences->getAge($this->name));
    }

    public function testBindsCanBePerformedInTwoDirections()
    {
        $this->preferences->bind($this->person, $this->key);
        $this->assertEquals($this->preferences->getAge($this->name), $this->person->getAge($this->name));
    }
}