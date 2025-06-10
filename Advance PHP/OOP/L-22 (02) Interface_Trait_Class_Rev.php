<?php
class Test1 extends SuperClass implements Test3
{
    use Test2;
    public function Test1T4()
    {
        echo "This is Test1-T4<br>";
    }

    public function interfaceT2()
    {
        echo "This is Interface-T2<br>";
    }
}

$obj = new Test1;
$obj->Test1T4();
$obj->TraitT1();
$obj->interfaceT2();
$obj->SuperClassT3();

trait Test2
{
    public function TraitT1()
    {
        echo "This is Trait<br>";
    }   
}

interface Test3
{
    public function interfaceT2();
}

class SuperClass
{
    public function SuperClassT3()
    {
        echo "This is SuperClass<br>";
    }
}


?>