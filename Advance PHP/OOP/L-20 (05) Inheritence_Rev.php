<?php
class Z
{
    protected $a;

    protected function test($b)
    {
        echo $b."<br>";
    }    
}

class Y extends Z
{
    public function getA($abc)
    {
        $this->a = $abc;
        $this->test(240822);
        echo $this->a;
    }
}

$obj = new Y;
$obj -> getA(150496);
?>