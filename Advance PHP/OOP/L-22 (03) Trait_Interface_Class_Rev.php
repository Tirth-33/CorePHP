<?php

/*-> Imp Notes:
1.  Class will Extends Class.
2.  Class will use Trait.
3.  Class will implement Interface. */

class A
{
    protected function FunA()
    {
        echo "Fun-A Class !<br>";
    }
}

trait T
{
    public function FunT()
    {
        echo "Fun-T Trait !<br>";
    }
}

trait T1
{
    public function FunT1()
    {
        echo "Fun-T Trait-T1 !<br>";
    }
}

interface I
{
    public function FunI();
    /* Abstract Method : Which does not have any body, You can Provide Different Body of the Same Function in Multiple Child Class With Implements the Interface */
}

interface I1
{
    public function FunI1();
}

class B extends A implements I, I1
{ 
    use T, T1;

    public function GetA()
    {
        $this->FunA();
    }

    public function FunI()
    {
        echo "Interface I !<br>";
    }

    public function FunI1()
    {
        echo "Interface I1 !<br>";
    }

}

$obj = new B;
$obj-> GetA();
$obj-> FunT();
$obj-> FunT1();
$obj-> FunI();
$obj-> FunI1();
?>