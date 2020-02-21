<?php
class Cat extends Pet
{

    function __construct(){
        $this->setName('cat');
    }

    function talk()
    {
        echo "<p>".$this->getName()." is meowing</p>";
    }
}
