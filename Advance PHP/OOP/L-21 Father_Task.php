<?php

class Father 
{ 
    public $rs = 100; 

    function fatheramount() 
    { 
        echo "Father Rs = " . $this->rs . "<br>"; 
    } 
}

class Mother extends Father 
{ 
    function motheramount() 
    { 
        return $this->rs - 20; 
    } 
}

class Son extends Mother
{ 
    function sonamount()
    {
        $sonamount = $this->motheramount() - 60;
        echo "Son Balance = " . $sonamount . "<br>";
    }
}

class Daughter extends Mother
{ 
    function daughteramount()
    {
        $daughteramount = $this->motheramount() - 50;
        echo "Daughter Balance = " . $daughteramount . "<br>";
    }
}

$fatherobj = new Father();
$motherobj = new Mother();
$sonobj = new Son();
$daughterobj = new Daughter();

$fatherobj->fatheramount();
echo "Mother Balance = " . $motherobj->motheramount() . "<br>";
$sonobj->sonamount();
$daughterobj->daughteramount();

?>

<?php

function circle ($c)
{
    echo "This Value of Circle is = ". 2 * 3.14 * $c . "<br>";
}

function square ($s)
{
    echo "This Value of Square is = ". $s * $s . "<br>";
}

circle(10);
square(5);

?>