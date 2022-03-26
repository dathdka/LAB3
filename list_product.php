<title>Danh sach san pham</title>
<?php 
    require_once("Entities/product.class.php");
    require_once("Entities/category.class.php");
    include_once("header.php");

    if(!isset($_GET["cateid"])){
        $prods = Product::list_product();
    }
    else{
        $cateid = $_GET["cateid"];
        $prods = Product::list_product_by_cateid($cateid);
    }
    $cates = Category::list_categories();
?>

    <div class="row" style="padding: 5px; margin-right: 0; width: 85%; float: right;">
        <div style="background-color: darkgray; text-align: center; display: block;">
            <h1>Sản phẩm</h1>
        </div>
        <?php
            foreach ( $prods as $item )
            {
        ?>
               <div class="col-md-4 col-sm-6 col-xs-12 pro-loop" style="text-align: center; padding: 22px; ">
                    <div class="product-block">
                        <div class="product-img">
                        <img src="<?php echo $item["Picture"];?>" style="width:100px"/>
                        </div>
                        <div class="product-detail clearfix">
                        <p class="text-danger"> <?php echo $item["ProductName"] ?></p>
                        <p class="text-info"><?php  echo $item["Price"]?></p>
                        </div>
                        <a href="product_detail.php?id=<?php echo $item["ProductID"] ?>">
                            <button type="button" class="btn btn-primary">Xem chi tiết</button>
                        </a>
                    </div>
                </div>
            <?php 
            }
            include_once("footer.php");
        ?>
    </div>
