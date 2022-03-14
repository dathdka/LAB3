<!DOCTYPE html>
<html>
<head>
<title>Web Bán Hàng </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
</head>

<body class="w3-content" style="max-width:1200px">

<?php include_once("footer.php");?>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3; width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>LOGO</b></h3>
  </div>

  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="/LAB3/list_product.php" class="w3-bar-item w3-button" target="_blank" style="display: float;">Danh sách sản phẩm</a>
    <title>Web</title>
    <a href="/LAB3/add_product.php" class="w3-bar-item w3-button" target="_blank">Thêm sản phẩm</a>
  </div>
</nav>
