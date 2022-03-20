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
<div class="container text-center">
    </div>
        <h1 style="text-align: center; background-color:darkgrey">Sản phẩm</h1>
    </div>
    <div>
        <h3>Danh mục</h3>
        <?php
            foreach($cates as $item){
                echo "<li class='list-group-item'><a
                href=/LAB3/list_product.php?cateid=".$item["CateID"].">".$item["CategoryName"]."</a></li>";
            }
        ?>
    </div>
    <div class="row">
        <?php
            foreach ( $prods as $item )
            {
        ?>
                <div class="col-sm-4" style="display:inline-block; text-align:center; margin:20px; padding:20px; ;border:1px solid black;  ">
                    <img src="<?php echo $item["Picture"];?>" style="width:100px"/>
                    <p class="text-danger"> <?php echo $item["ProductName"] ?></p>
                    <p class="text-info"><?php  echo $item["Price"]?></p>
                    <p>
                        <button class="btn btn-primary" type="button" style="background-color: #58257b; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block;font-size: 16px;cursor: pointer; border-radius:10px">Mua hang</button>
                    </p>
                </div>
            <?php 
            }
            include_once("footer.php");
        ?>
    </div>
</div>