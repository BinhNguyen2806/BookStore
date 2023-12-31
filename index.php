<?php 
include "./model/cart.php";
include "./model/connectDB.php";
include "./model/product.php";
include "./model/page.php";
include "./model/user.php";
include "./model/passwordBcrypt.php";

//Header


include_once "./view/header.php";

if(isset($_GET['act']))
    {   
        switch($_GET['act'])
        {   
            case 'home':
                $products_1=getByCategoryID_Limit('product',1,$conn=connectdb());
                $products_2=getByCategoryID_Limit('product',2,$conn=connectdb());
                $products_3=getByCategoryID_Limit('product',3,$conn=connectdb());

                $views_1=getLimit_category_View_Desc('product',1,0,4,$conn=connectdb());
                $views_2 = getLimit_category_View_Desc('product',2,0,4,$conn=connectdb());
                $views_3 = getLimit_category_View_Desc('product',3,0,4,$conn=connectdb());
                include "./view/home.php";
                break;
            case'product':
                $header ='product';
                if(!isset($_GET['sort']))
                {
                    $page_bar_opt ='1';
                    list($page_left,$page_right,$page_current,$products,$pages,$category_id)= paging_to_category(12);

                }
                else
                {   $page_bar_opt ='2';
                    list($page_left,$page_right,$page_current,$products,$pages,$category_id,$sort)= paging_to_category_sort(12);
                }

                include "./view/product.php";
                break;
        
            case'cart':
                

                if(!isset($_SESSION['cart']))$_SESSION['cart']=[];
                if(isset($_POST['add_cart']))
                {   
                    add_cart();
                    echo'<script> window.location.href="index.php?act=detail&name='.$_POST['product_name'].'";</script>';
                    //header('Location: index.php?act=detail&name='.$_POST['product_name'].'');
                }
                if(isset($_POST['buy_now']))
                {   
                    add_cart();

                }
                //Delete item in cart
                if(isset($_GET['delete']))
                {   
                    array_splice($_SESSION['cart'],$_GET['delete'],1);
                    echo'<script> window.location.href="index.php?act=cart";</script>';
                    //header('Location: index.php?act=cart');
                }
                
                 //Delete all items in cart
                if(isset($_GET['delete_all']))
                {
                    unset($_SESSION['cart']); 
                    echo'<script> window.location.href="index.php?act=cart";</script>';
                   //header('Location: index.php?act=cart');
                }
               //Update cart 
                if(isset($_GET['add']))
                {
                    $index =$_GET['add'];
                    $_SESSION['cart'][$index]['quantity']++;
                    echo'<script> window.location.href="index.php?act=cart";</script>';
                    // header('Location: index.php?act=cart');
                }
                if(isset($_GET['sub']))
                {
                    $index =$_GET['sub'];
                    if($_SESSION['cart'][$index]['quantity']-1==0)
                    array_splice($_SESSION['cart'],$index,1);
                    else $_SESSION['cart'][$index]['quantity']--;
                    echo'<script> window.location.href="index.php?act=cart";</script>';
                   //header('Location: index.php?act=cart');
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
                echo'<script> window.location.href="index.php?act=home";</script>';
                //header('Location: index.php?act=home');
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
                    foreach ($product as $product) {
                        $name =
                        $price = number_format($product['price'])."đ";
                        $price_old = number_format($product['price_old'])."đ";
                        $discount = number_format($product['price_old'] - $product['price'])."đ";
                        $discount_percent = 100 - (round($product['price'] / $product['price_old'], 2) * 100);
                        $view = $product['view'] + 1;
                        $product_id = $product['product_id'];
                        addView('product', $view, $product_id, connectdb());
                        if($product['category_id'] == 1) {
                            $link_img = "./static/images/sach-truyen-kiem-hiep/";
                            $category = "Truyện kiếm hiệp";
                        }
                        else if($product['category_id']==2) {
                            $link_img = "./static/images/sach-van-hoc/";
                            $category = "Sách văn học";
                        }
                        else  {
                            $link_img = "./static/images/truyen-tranh-comic/";
                            $category = "Truyện tranh manga-comic";
                        }
                    }
                }
                //Add feedback 
                if(isset($_POST['btn-submit-feedback']))
                {
                    $feedback = $_POST['feedback'];
                    $user_name = $_SESSION['auth_user']['name'];
                    add_feedback('feedback',$product_id,$feedback,$user_name,connectdb());
                }
                $feedbacks = getALL_feedback('feedback',$product_id ,connectdb());
               
                include "./view/product_detail.php";
                break;

            case 'search':
                
                $search = $_GET['search'];
                $page_bar_opt ='3';
                list($page_left,$page_right,$page_current,$products,$pages)=paging_search(12,$search);
                if(mysqli_num_rows(getALL_Search('product',$search, connectdb())) >0 )
                    $_SESSION['search']=mysqli_num_rows(getALL_Search('product',$search, connectdb()));
                else
                 {
                    
                    $_SESSION['search']=0;
                    
                }
                
                include "./view/product.php";
                break;

            case 'account':
                
              
                //Update info
                if(isset($_POST['save_change']))
                {
                    $user_name = $_POST['user_name'];
                    $full_name = $_POST['full_name'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $birthday = date('Y-m-d',strtotime($_POST['birthday']));
                   
                    
                    update_user_info('user',$_SESSION['auth_user']['email'],$user_name, $full_name,  $address, $phone, $birthday,connectdb());
                    Update_user_data( $_SESSION['auth_user']['email'],connectdb());
                    echo'<script> window.location.href="index.php?act=account";</script>';
                    //header('Location: index.php?act=account');
                }

                //Upload img
                if(isset($_POST['upload']))
                {   
                    $temp_img = $_SESSION['auth_user']['image'];
                    list($_SESSION['msg'],$status)  = update_img_1();
                    
                   if($status==1)
                   {
                    
                        $link ='./static/images/user/'.$temp_img;
                        delete_file($link);
                        $_SESSION['auth_user']['image']=$_FILES["uploadfile"]["name"];
                    }
                    else $_SESSION['auth_user']['image'] = $temp_img;
    
                    update_user_img('user',$_SESSION['auth_user']['email'],$_SESSION['auth_user']['image'],connectdb());
                    echo'<script> window.location.href="index.php?act=account";</script>';
                    //header('Location: index.php?act=account');
                    exit(0);
                }

                include "./view/myaccount.php";
                break;
            
            case 'checkout':
                if(isset($_POST['btn-submit']))
                {
                    $_SESSION['id_cart']= get_AUTO_INCREMENT('orders',connectdb());
                   
                }
                include "./view/checkout.php";
                break;

            case 'about':

                include "./view/about.php";
                break;
            case 'forgot':
                if(isset($_POST['btn-forgot']))
                {
                    $email  = $_POST['email'];
                    check_email($email,connectdb());
                    
                }
                include "./view/forgotpassword.php";
                break;
            
            case 'contact':
                include "./view/contact.php";
                break;
        }
    }
else {
    // Get products home page
    $products_1=getByCategoryID_Limit('product',1,$conn=connectdb());
    $products_2=getByCategoryID_Limit('product',2,$conn=connectdb());
    $products_3=getByCategoryID_Limit('product',3,$conn=connectdb());

    $views_1=getLimit_category_View_Desc('product',1,0,4,$conn=connectdb());
    $views_2=getLimit_category_View_Desc('product',2,0,4,$conn=connectdb());
    $views_3=getLimit_category_View_Desc('product',3,0,4,$conn=connectdb());
    include "./view/home.php";
   
}
//Footer
include_once "./view/footer.php";
?>