<?php

namespace PangolinKeys\Binders\Example;

use PangolinKeys\Binders\Binder\Bindable;

class Person
{
    use Bindable;

    /**
     * Method which returns an array of strings containing all the keys available on a bindable object.
     *
     * @return String[]
     */
    public function getKeys()
    {
        return ['Dave', 'Andy'];
    }

    protected $data;

    public function __construct()
    {
        $this->data = [
            'Dave' => [
                'Age' => 1,
            ],
            'Andy' => [
                'Age' => 1,
            ],
        ];
    }

    public function &getAge($person)
    {
        return $this->data[ $person ]['Age'];
    }
}