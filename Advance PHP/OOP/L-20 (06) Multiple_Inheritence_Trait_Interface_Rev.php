<?php

trait A
{
    public $x=24;
}

trait B
{
    public $y=22;
}

trait C
{
    public function getfun()
    {
        echo "Hardi Chauhan";
    }
}

class D
{
    use A,B,C;
}

$obj = new D;

echo $obj -> x . "<br>" . $obj -> y . "<br>";

$obj -> getfun();


?>