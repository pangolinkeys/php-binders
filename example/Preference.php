<?php

namespace PangolinKeys\Binders\Example;

use PangolinKeys\Binders\Binder\Bindable;

class Preference
{
    use Bindable;

    /**
     * Data structure for the example.
     *
     * @var array
     */
    protected $data = [
        'Dave' => 30,
        'Andy' => 55,
    ];

    /**
     * Array of strings containing all the keys available on a bindable object.
     *
     * @return String[]
     */
    public function getKeys()
    {
        return array_keys($this->data);
    }

    /**
     * Method which returns the age point in the array.
     *
     * Note the inclusion of & in the method declaration.
     *
     * @param $person
     * @return mixed
     */
    public function &getAge($person)
    {
        return $this->data[ $person ];
    }
}