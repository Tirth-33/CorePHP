    <?php
    class Bank
    {
        public $BankName = "ICICI";
        public $BankIFSC = "ICIC0000344";
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

        public static function BankDatabase()
        {
            echo "Your Account is Hacked <br><hr>";
        }
            

    }

    $Hardi = new Bank;
    $Hardi->UserDetails(2408,530000);
    $Shraddha = new Bank;
    $Shraddha->UserDetails(1504,44000);
    $Tirth = new Bank;
    $Tirth->UserDetails(1309,58000);
    $Tirth->BankDatabase();
    $Vedansh = new Bank; 
    $Vedansh->BankDatabase();

    ?>