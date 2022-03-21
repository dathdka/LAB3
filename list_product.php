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
<div class="container-text-center">
    <div>
        <h1>Sản phẩm</h1>
    </div>
    <div class="navbar-listproduct"> 
        <ul>
        <h3>Danh mục</h3>
        <?php
            foreach($cates as $item){
                echo "<li class='list-group-item listproduct'><a
                href=/LAB3/list_product.php?cateid=".$item["CateID"].">".$item["CategoryName"]."</a></li>";
            }
        ?>
        </ul>
    </div>
    <div class="row row-listproduct">
        <?php
            foreach ( $prods as $item )
            {
        ?>
                <div class="col-sm-4">
                    <img src="<?php echo $item["Picture"];?>" style="width:100px"/>
                    <p class="text-danger"> <?php echo $item["ProductName"] ?></p>
                    <p class="text-info"><?php  echo $item["Price"]?></p>
                    <p>
                        <button class="btn-btn-primary" type="button">Mua hang</button>
                    </p>
                </div>
            <?php 
            }
            include_once("footer.php");
        ?>
    </div>
</div>