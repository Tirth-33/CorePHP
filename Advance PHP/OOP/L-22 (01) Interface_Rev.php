<?php
class Test1
{
    public $x = 100;
    public function p1()
    {
        echo "P1...!<br>";
    }
}

class Test2 extends Test1
{

}

$obj = new Test2;
echo $obj->x . "<br>";
$obj->p1();

interface Test3
{
    // public $y = 150; - Variable Declaration not Allowed
    public function p2();
}

interface Interface1
{
    public function p3();
}

class Test4 implements Test3
{
    public function p2()
    {
        echo "Test4 & P2...!<br>";
    }
}

$obj2 = new Test4;
$obj2->p2();

class Test5 implements Test3
{
    public function p2()
    {
        echo "Test5 & P2...!<br>";
    }
}

$obj3 = new Test5;
$obj3->p2();


class Test6 implements Test3, Interface1
{
    public function p2()
    {
        echo "Test6 & P2...!<br>";
    }

    public function p3()
    {
        echo "Test6 & P3...!<br>";
    }
}

$obj1 = new Test6;
$obj1->p2();
$obj1->p3();

?>