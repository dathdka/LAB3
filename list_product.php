<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site.css">
    <link rel="stylesheet" href="index.html">
</head>
<body>
    <?php 
        require_once("Entities/product.class.php");
    ?>
    <?php
        include_once("header.php");
        $prods = Product::list_product();
        foreach ( $prods as $item )
    {
        echo"<p> tên sản phẩm".$item["ProductName"]."</p>";
        echo "<img src='$item[Picture]' style='width:40px'/>";
    }
        include_once("footer.php");
    ?>
</body>
</html>
