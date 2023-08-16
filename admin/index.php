<?php 
// include "./model/cart.php";
include "../model/connectDB.php";
// include "./model/product.php";
// include "./model/page.php";
 include "./model/login.php";
include "./model/user.php";
include "./model/product.php";
// include "./model/passwordBcrypt.php";

//Header
include "./view/header.php";
session_start();

if(isset($_GET['act']))
    {   
        switch($_GET['act'])
        {   
            case'user':
                include "./view/user.php";
                break;
            case 'login':
                if (isset($_POST['btn-login']))
                {   
                    login_admin(connectdb());
                }
                include "./view/login.php";
                break;
            case'logout':
                unset($_SESSION['auth_user']);
                include "./view/login.php";
                break;
            
            case 'user':
                include "./view/user.php";
                break;

            case 'category':
                include "./view/category.php";
                break;

            case 'product':
               list($page_left,$page_right,$page_current,$products,$pages) =paging(10);
                include "./view/product.php";
                break;

            default:
                include "./view/login.php";
                break;
        }
    }
else {
    include "./view/login.php";
   }
