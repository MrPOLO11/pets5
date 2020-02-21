<?php

class Pet
{
    private $_name;
    private $_color;

    function __construct($name="unknown",$color="?"){
        $this->_name = $name;
        $this->_color = $color;
    }

    function eat()
    {
        echo $this->_name." is eating<br>";
    }

    function getColor(){
        return $this->_color;
    }

    function setColor($color){
        $this->_color = $color;
    }


    function getName(){
        return $this->_name;
    }

    function setName($name){
        $this->_name = $name;
    }

    function talk()
    {
        echo $this->_name." is talking<br>";
    }
}