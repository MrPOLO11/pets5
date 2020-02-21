<?php

class Bird extends Pet
{
    function talk()
    {
        echo "<p>".$this->getName()." is chirping</p>";
    }
}
