<?php

class GenFun
{
    public static function staticfunction()
    {
        echo "Static Fun...!<br>";
    }
    public function publicfunction()
    {
        echo "Fun-1...!<br>";
        $this->privatefunction();
        $this->protectedfunction();
    }
    private function privatefunction()
    {
        echo "Fun-2...!<br>";
    }
    protected function protectedfunction()
    {
        echo "Fun-3...!<br>";
    }
}
$obj= new GenFun();
$obj->publicfunction();
GenFun::staticfunction();
$obj->staticfunction();
//$obj->privatefunction();
//$obj->protectedfunction();
?>