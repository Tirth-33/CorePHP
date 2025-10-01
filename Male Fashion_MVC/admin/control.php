<?php

include 'model.php';

class Control extends Model
{
    function __construct()
    {
        session_start();
        Model::_construct();
        // parent::__construct() ;


        $url = $_SERVER['PATH_INFO'];

        switch ($url) {
            case '/login':

                if (isset($_POST['login'])) {

                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    // echo $email,$password;exit();


                    if ($email != '' && $password != "") {


                        $where = array('admin_name' => $email, 'admin_password' => $password);
                        $run = $this->select_where('admin', $where);

                        $fetch = $run->fetch_object();

                        $dbEmail = $fetch->admin_name;
                        $dbPwd = $fetch->admin_password;


                        if ($dbEmail == $email && $dbPwd == $password) {
                            if (isset($_POST['remember'])) {
                                setcookie('email', $email, time() + 5, '/');
                                setcookie('password', $password, time() + 5, '/');
                            }
                            echo
                                "<script>
                                alert ('Welcome Tirth...!');
                                window.location.href = 'dashboard'
                                </script>";
                        } else {
                            echo
                                "<script>
                                alert ('Invalid UserName / Password...!');
                                window.location.href = 'login'
                                </script>";
                        }
                    } else {
                        echo
                            "<script>
                                alert ('Please Enter Details...!');
                                window.location.href = 'login'
                                </script>";
                    }


                }

                include 'login.php';
                break;

            case '/dashboard':
                include 'dashboard.php';
                break;

            case '/add-user':
                include 'add-user.php';
                break;

            case '/manage-users':
                include 'manage-users.php';
                break;

            case '/add-products':
                if (isset($_REQUEST['add'])){
                    $name = $_POST['product_name'];
                    $price = $_POST['price'];
                    $category = $_POST['parent_category'];
                    $status = $_POST['status'];
                    $image = $_FILES['img']['name'];
                    $temp_file = $_FILES['img']['tmp_name'];

                    move_uploaded_file($temp_file, 'uploads/' . $image);

                    $data = array(
                        'product_name' => $name,
                        'price' => $price,
                        'parent_category' => $category,
                        'image' => $image,
                        'status' => $status,
                    );

                    $run = $this->insert('add_product',$data);
                    
                    if($run){
                        echo "<script>
                            alert('Product Added...!);
                            window.location.href = 'manage-products'
                            </script>";
                    }
                }
                include 'add-products.php';
                break;

            case '/manage-products':
                include 'manage-products.php';
                break;

            case '/men':
                include 'men.php';
                break;


            case '/women':
                include 'women.php';
                break;

                case '/kids':
                include 'kids.php';
                break;

                case '/view-cart':
                include 'view-cart.php';
                break;    

                case'/view-payment':
                include 'view-payment.php';
                break;

                case'/view-orders':
                include 'view-orders.php';
                break;


                case'/view-feedback':
                include 'view-feedback.php';
                break;

                case'/view-inquiry':
                include 'view-inquiry.php';
                break;

            //     case '/logout':

            //         unset($_SESSION['firstname']);

            //         header('location:index');
            //         break;



            //    case '/register':

            //     # code...
            //      if (isset($_REQUEST['insert']))
            //      {
            //          $fname = $_POST['firstname'];
            //          $lname = $_POST['lastname'];
            //          $add1 = $_POST['address1'];
            //          $add2 = $_POST['address2'];
            //          $city = $_POST['city'];
            //          $state = $_POST['state'];
            //          $pincode = $_POST['pincode'];
            //         $phone = $_POST['phone'];
            //         $email = $_POST['email'];
            //         $password = $_POST['password'];


            //     if ($fname!="" && $lname!="" && $add1!="" && $add2!="" && $city!="" && $state!="" && $pincode!="" && $phone!="" && $email!="" && $password!="")
            //     {
            //         $data = array('FirstName' => $fname,
            //         'LastName' => $lname,
            //         'Address1' => $add1,
            //         'Address2' => $add2,
            //         'City' => $city,
            //         'State' => $state,
            //         'Pincode' => $pincode,
            //         'Phone' => $phone,
            //         'Email' => $email,
            //         'Password' => $password );
            //         $this -> insert ('users', $data);
            //     }
            //     else
            //     {
            //         echo 
            //         "<script>
            //         alert('Fileds are Empty...!');
            //         window.location.href = 'register'
            //         </script>";
            //     }
            // }
            //     include 'register.php';
            //     break;

            
            default:
                # code...
                break;
        }

    }
}

$obj = new Control();
?>