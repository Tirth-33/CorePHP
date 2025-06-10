<?php
    class SBIBank
    {
        public $BankName = "SBI";
        public $BankIFSC = "SBIN0002684";
        private $ATMPin;
        private $Balance;

        public function UserDetails ($pin, $bal)
        {
            $this-> ATMPin = $pin;
            $this-> Balance = $bal;

            echo $this-> BankName."<br>";
            echo $this-> BankIFSC."<br>";
            echo $this-> ATMPin."<br>";
            echo $this-> Balance."<br><hr>";
        }

        protected function BankDatabase()
        {
            echo "Your Account is Hacked <br><hr>";
        }
            

    }

    class GSCBank extends SBIBank
    {
        public function getSBI()
        {
            $this->BankDatabase(); // Type-1
            SBIBank::BankDatabase(); // Type-2
        }
    }

    $obj = new GSCBank();
    $obj->getSBI();
    // $obj->BankDatabase(); // Generate Error
    ?>