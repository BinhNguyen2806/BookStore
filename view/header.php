<?php 
if(isset($_GET['act']))
{
    switch($_GET['act'])
    {
        case 'product':
            $header='product';
            break;
        case 'cart':
            $header='cart';
            break;
        default:
            $header='home';
            break;
    }
}
else $header='home';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../static/font/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/cart.css">
    <link rel="stylesheet" href="../static/css/common.css">
    <link rel="stylesheet" href="../static/css/Style.css">

</head>

<body>
    <div class="header-wrapper">
        <div class="container">
            <nav class="navbar navbar-expand-lg d-flex justify-content-between">
                <a class="navbar-brand" href="index.php">
                    <img src="../static/images/logo/logo1.png" alt="logo" width="100" height="40">
                </a>
                <div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a  <?php if($header=='home')echo 'class=" nav-link active"';else echo 'class=" nav-link "'; ?>aria-current="page" href="index.php">Home</a>
                            <a <?php if($header=='product')echo 'class=" nav-link active"';else echo 'class=" nav-link "'; ?>href="index.php?act=product">Product</a>
                            <a <?php if($header=='cart')echo 'class=" nav-link active"';else echo 'class=" nav-link "'; ?> href="index.php?act=cart">Cart</a>
                        </div>
                    </div>
            </nav>
        </div>
    </div>
