<?php

class Model
{
    public $con;
    function _construct()
    {
        $this->con = new mysqli('localhost', 'root', '', 'male_fashion_mvc');
    }

    function insert($tbl, $data) // Register Page
    {
        $col_arr = array_keys($data);
        $col = implode(',', $col_arr);
        $val_arr = array_values($data);
        $val = implode("','", $val_arr);

        $sql = "insert into $tbl ($col) values ('$val')";


        $run = $this->con->query($sql);

        if ($run) {
            echo
                "<script>
            alert ('Account Created...!');
            window.location.href = 'sign_in'
            </script>";
        }
    }

    function select_where($table, $where) // Sign_In Page
    {
        $col_arr = array_keys($where);
        $val_arr = array_values($where);

        $select = "select * from $table where 1=1";

        $i = 0;
        foreach ($where as $w) {
            $select .= " and $col_arr[$i] = '$val_arr[$i]'";
            $i++;
        }

        $run = $this->con->query($select);
        return $run;

    }

    function select($tbl)
    {
        $sql = "select * from $tbl";
        $run = $this->con->query($sql);
        while ($fetch = $run->fetch_object()) // fetch data from mysql
        {
            $arr[] = $fetch;
        }
        if (!empty($arr)) {
            return $arr;
        }

    }
}