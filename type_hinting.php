<?php

class Person
{
}

$person = new Person();
class Person1
{
}

$person1 = new Person1();

class Auto
{

    public function fahre(Person $x)
    {
        echo get_class($x);
    }
}

$auto = new Auto();

// $auto->fahre($person);
// $auto->fahre(7);
$auto->fahre($person1);



