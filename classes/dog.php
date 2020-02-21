<?php
class Dog extends Pet
{
    function __construct(){
        $this->setName('dog');
    }

    function talk()
    {
        echo "<p>".$this->getName()." is barking</p>";
    }

    function fetch()
    {
        echo "<p>".$this->getName()." is fetching</p>";
    }
}
