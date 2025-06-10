<?php

class X
{
    public $a=150496;

    public function test()
    {
        echo $this->a;
    }
}

$obj = new X;
echo $obj->a."<br><br>";
$obj -> test();
?>