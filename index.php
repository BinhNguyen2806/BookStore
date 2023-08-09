<?php 
include "./model/cart.php";
include "./model/connectDB.php";
include "./model/product.php";
include "./model/page.php";
include "./model/user.php";
include "./model/passwordBcrypt.php";



//Header
$header ='';

include_once "./view/header.php";

if(isset($_GET['act']))
    {   
        switch($_GET['act'])
        {   
            case 'home':
                $products_1=getByCategoryID_Limit('product',1,$conn=connectdb());
                $products_2=getByCategoryID_Limit('product',2,$conn=connectdb());
                $products_3=getByCategoryID_Limit('product',3,$conn=connectdb());
                include "./view/home.php";
                break;
            case'product':
                $header ='product';
                list($page_left,$page_right,$page_current,$products,$pages,$category_id)= paging(12);
                

                include "./view/product.php";
                break;
        
            case'cart':
                

                if(!isset($_SESSION['cart']))$_SESSION['cart']=[];
                if(isset($_POST['buy_now']))
                {   
                    add_cart();
                }
                //Delete item in cart
                if(isset($_GET['delete']))
                {   
                    array_splice($_SESSION['cart'],$_GET['delete'],1);
                    
                header('Location: index.php?act=cart');
                }
                 //Delete all items in cart
                if(isset($_GET['delete_all']))
                {
                    unset($_SESSION['cart']); 
                    header('Location: index.php?act=cart');
                }
               //Update cart 
                if(isset($_GET['add']))
                {
                    $index =$_GET['add'];
                    $_SESSION['cart'][$index]['quantity']++;
                    header('Location: index.php?act=cart');
                }
                if(isset($_GET['sub']))
                {
                    $index =$_GET['sub'];
                    if($_SESSION['cart'][$index]['quantity']-1==0)
                    array_splice($_SESSION['cart'],$index,1);
                    else $_SESSION['cart'][$index]['quantity']--;
                    header('Location: index.php?act=cart');
                }

                include "./view/cart.php";
                break;
            case 'login':
               
                if(isset($_POST['btn-login']))
                {
                    login();
                    check_info();
                }
                include "./view/login.php";
                break;
            case 'logout':
                unset($_SESSION['auth_user']);
                header('Location: index.php?act=login');
                break;
            case 'register':
                
                if(isset($_POST['btn-register']))
                {
                    register();
                    
                }
                
                include "./view/register.php";
                break;

            case'detail':
                if(isset($_GET['name'])) {
                    $product_name = $_GET['name'];
                    $product = getByName('product', $product_name, connectdb());
                }
                include "./view/product_detail.php";
                break;

        }
    }
else {
    // Get products home page
    $products_1=getByCategoryID_Limit('product',1,$conn=connectdb());
    $products_2=getByCategoryID_Limit('product',2,$conn=connectdb());
    $products_3=getByCategoryID_Limit('product',3,$conn=connectdb());
    include "./view/home.php";
   
}
//Footer
include_once "./view/footer.php";
?>