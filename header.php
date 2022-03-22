<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Hoang Dat">
        <title>Web Ban Hang</title>
        <link href="/LAB3/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!-- < id="wrapper"> -->
            <h2>Web Ban Hang</h2>
            <div class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="container" style="display: grid; margin-left:0">
                    <div class="navbar-header">
                     <ul>
                        <li><a class="navbar-brand" href="/LAB3/list_product.php">Product List</a> </li>
                        <li><a class="navbar-brand" href="/LAB3/add_product.php">Add Product</a> </li>
                     </ul>
                    </div>
                </div>  
            </div>

<div class="clearfix">
    <div class="box-left">
            <ul class="sidebar-menu">
                <h3 class="sidebar-title">Danh Mục</h3>
                <li class="has-child"><a href="/LAB3/list_product.php?cateid=1" >Laptop<i class="icon"></i></a> </li>
                <li class="has-child"><a href="/LAB3/list_product.php?cateid=2" >Máy tính bảng <i class="icon"></i></a> </li>
                <li class="has-child"><a href="/LAB3/list_product.php?cateid=3" >Điện thoại <i class="icon"></i></a> </li>
                <li class="has-child"><a href="/LAB3/list_product.php?cateid=4" >Đồng hồ <i class="icon"></i></a> </li>
            </ul>
    </div>  
</div>