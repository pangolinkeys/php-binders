<?php


use PangolinKeys\Binders\Example\Person;
use PangolinKeys\Binders\Example\Preference;

class BinderTests extends \PHPUnit\Framework\TestCase
{

    protected $person;

    protected $preferences;

    public function setUp()
    {
        parent::setUp();

        $this->person = new Person();
        $this->preferences = new Preference();

    }

    public function testCreates()
    {
        $this->assertNotEmpty($this->person);
    }

    public function testKeysCorrect()
    {
        $this->assertEquals($this->person->getKeys()[0], 'Dave');
    }

    public function testGetKeysOnBoth()
    {
        $this->assertEquals($this->person->getKeys(), $this->preferences->getKeys());
    }

    public function testPersonCanBind()
    {
        $this->person->bind($this->preferences, 'Age');

        $this->assertNotEquals($this->person->getAge('Dave'), 1);
    }

    public function testValuesDifferentBeforeBind()
    {
        $person = 'Dave';

        $this->assertNotEquals($this->person->getAge($person), $this->preferences->getAge($person));
    }

    public function testOutcomeOfBindCorrect()
    {
        $this->person->bind($this->preferences, 'Age');

        $person = 'Dave';
        $this->assertEquals($this->person->getAge($person), $this->preferences->getAge($person));
    }
}