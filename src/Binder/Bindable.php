<?php

namespace PangolinKeys\Binders\Binder;

trait Bindable
{
    /**
     * Method which performs the bind.
     *
     * @param Binder $rhs
     * @param String $key
     * @return Binder
     */
    public function bind($rhs, $key)
    {
        $method = "get" . $key;

        foreach ($this->getKeys() as $key) {
            $lhs = &$this->$method($key);
            $lhs = $rhs->$method($key);
        }

    }

    /**
     * Method which returns an array of strings containing all the keys available on a bindable object.
     *
     * @return String[]
     */
    public abstract function getKeys();
}