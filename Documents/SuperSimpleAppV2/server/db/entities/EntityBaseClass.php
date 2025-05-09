<?php

/**
 * Created by PhpStorm.
 * User: zukisani
 * Date: 2020/12/07
 * Time: 9:14 AM
 */
class EntityBaseClass
{
    public function setProp($propertyName, $propertyValue) {
        if($this->hasProp($propertyName)) {
            $reflection = new \ReflectionClass($this);
            $property = $reflection->getProperty($propertyName);
            $property->setAccessible(true);
            $property->setValue($this, $propertyValue);
        }
    }
    public function getProp($propertyName,$makeNullIfDoesNotExist = false) {
        if($makeNullIfDoesNotExist) {
            if(!$this->hasProp($propertyName)) {
                return null;
            }
        }

        $reflection = new \ReflectionClass($this);
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);

        return $property->getValue($this);
    }
    public function hasProp($propertyName) {
        $reflection = new \ReflectionClass($this);
        return $reflection->hasProperty($propertyName);
    }
}