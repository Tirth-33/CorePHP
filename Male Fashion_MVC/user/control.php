<?php

include 'model.php';

class Control extends Model
{
    function __construct()
    {
        session_start();
        Model::_construct();
        $url = $_SERVER['PATH_INFO'];

        switch ($url) 
        {
                case '/about':
                include 'about.php';
                break;

                case '/blog-details':
                include 'blog-details.php';
                break;
                
                case '/blog':
                include 'blog.php';
                break;

                case '/checkout':
                include 'checkout.php';
                break;

                case '/contact':
                include 'contact.php';
                break;

                case '/index':
                include 'index.php';
                break;
                
                case '/logout':
                    
                    unset($_SESSION['firstname']);

                    header('location:index');
                    break;


                case '/main':
                include 'main.php';
                break;
                
               case '/register':
            
                # code...
                 if (isset($_REQUEST['insert']))
                 {
                     $fname = $_POST['firstname'];
                     $lname = $_POST['lastname'];
                     $add1 = $_POST['address1'];
                     $add2 = $_POST['address2'];
                     $city = $_POST['city'];
                     $state = $_POST['state'];
                     $pincode = $_POST['pincode'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                

                if ($fname!="" && $lname!="" && $add1!="" && $add2!="" && $city!="" && $state!="" && $pincode!="" && $phone!="" && $email!="" && $password!="")
                {
                    $data = array('FirstName' => $fname,
                    'LastName' => $lname,
                    'Address1' => $add1,
                    'Address2' => $add2,
                    'City' => $city,
                    'State' => $state,
                    'Pincode' => $pincode,
                    'Phone' => $phone,
                    'Email' => $email,
                    'Password' => $password );
                    $this -> insert ('users', $data);
                }
                else
                {
                    echo 
                    "<script>
                    alert('Fileds are Empty...!');
                    window.location.href = 'register'
                    </script>";
                }
            }
                include 'register.php';
                break;
                
                case '/shop':
                include 'shop.php';
                break;

                case '/shop-details':
                include 'shop-details.php';
                break;    
           
                case '/sign_in':
                    
                        if(isset($_POST['insert']))
                        {
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            // echo $email,$password;exit();

                            $where = array('Email' => $email, 'Password'=> $password);
                            $run = $this->select_where('users', $where);

                            $fetch = $run -> fetch_object();

                            $dbEmail = $fetch->Email;
                            $dbPwd = $fetch->Password;
                            $dbFName = $fetch->FirstName;
                            $dbSrNo = $fetch->SrNo;

                            $_SESSION['firstname'] = $dbFName;
                            $_SESSION['srno'] = $dbSrNo;
                            

                            if ($dbEmail == $email && $dbPwd == $password)
                            {
                                if(isset($_POST['remember']))
                                {
                                    setcookie('email', $email, time() + 20,'/');  
                                    setcookie('password', $password, time() + 20,'/');
                                }
                                echo
                                "<script>
                                alert ('Welcome User...!');
                                window.location.href = 'shop'
                                </script>";
                            }
                            else
                            {
                                echo
                                "<script>
                                alert ('Invalid Email / Password...!');
                                window.location.href = 'sign_in'
                                </script>";
                            }

                        }
                    
                    include 'sign_in.php';
                    break;

                    case'/shopping-cart':
                        include 'shopping-cart.php';
                        break;

                

                

                default:
                # code...
                break;
        }
        
    }
}

$obj = new Control();
?>