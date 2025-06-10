<?php

abstract class Test1
{
    public $a = 250;
    abstract function AbsMethod();
    
    protected function P1()
    {
        echo "P1 Method ...!<br>";
    }
    
}

class Test2 extends Test1
{
    public function AbsMethod()
    {
        echo "Abstract Method ...!<br>";
    }

    public function getP1()
    {
        $this -> P1();
    }
}

$obj = new Test2;
echo $obj -> a . "<br>";
$obj -> AbsMethod();
$obj -> getP1();
?>