<?php

namespace PangolinKeys\Binders\Example;

use PangolinKeys\Binders\Binder\Bindable;

class Preference
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

    protected $data = [
        'Dave' => 30,
        'Andy' => 55,
    ];

    public function getAge($person)
    {
        return $this->data[ $person ];
    }
}