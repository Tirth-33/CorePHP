<?php

class GetVar
{
    public static $a1=23;
    public $a=7;
    private $b=8;
    protected $c=9;

    public function getX()
    {
        echo "<br>A =" . $this->a;  
        echo "<br>B =" . $this->b;  
        echo "<br>C =" . $this->c;
        echo "<br> getX Function...!";
    }

    public static function fun1()
    {
        echo "<br> Static Fun1...!<br>";
    }
}

$obj = new GetVar; 
echo "A =" .$obj->a;
$obj->getX();
echo "<br> A1 = " .GetVar::$a1;
getVar::fun1();
?>