<?php
require_once("Entities/product.class.php");
require_once("Entities/category.class.php");
include_once("header.php");
if (!isset($_GET["id"])) {
    header("Location: no_found.php");
} else {
    $id = $_GET["id"];
    $prod = Product::get_product($id);
    $prod_relate = Product::list_product_relate($prod["CateID"], $id);
}
$cates = Category::list_categories();

?>
<div class="block">
<div class="row" style="width: 85%;float: right;" >
    <div style="background-color: darkgray; text-align: center; display: block; padding: 0.2px 0 0.1px 0;">
            <h1>Sản phẩm</h1>
    </div>
    <div class="col-sm-4" style="display:inline-block; text-align:center; margin:20px; padding:20px ;border:1px solid black; float:initial;width: -webkit-fill-available;">
            <div class="product-img" style="float: left;">
                <img src="<?php echo $prod["Picture"]; ?>" style="width: 300px;" />
            </div>  
            <div class="product-detail">
                <p class="text-danger"  style="font-size: 40px;"> <?php echo $prod["ProductName"] ?></p>
                <p class="text-info"    style="font-size: 15px;"><?php echo $prod["Desscription"] ?></p>
                <p class="text-info"    style="font-size: 15px;"><?php echo $prod["Price"] ?></p>
            </div>
            <p>
                <button class="btn btn-primary" type="button" >Mua hang</button>
            </p>
    </div>
</div>
<div class="row" style="width: 85%;float: right;" >
    <div style="background-color: darkgray; text-align: center; display: block; padding: 0.2px 0 0.1px 0;">
        <h2>SẢN PHẨM LIÊN QUAN</h2>
    </div>

<div class="col-md-8">
    <?php
    foreach ($prod_relate as $item) {
    ?>
    <div class="col-md-4 col-sm-6 col-xs-12 pro-loop" style="text-align: center; padding: 22px;">
        <div class="product-block">
            <div class="product-img">
                <a href="/LAB3/product_detail.php?id=<?php echo $item["ProductID"]; ?>">
                <img src=<?php echo "/LAB3/".$item["Picture"]; ?> class="img-responsive" style="width:200px">
                </a>
            </div>
            <div class="product-detail clearfix">
                <p class="text-danger"> <?php echo $item["ProductName"]; ?></p>
                <p class="text-info"><?php echo $item["Desscription"] ?></p>
                <p class="text-info"><?php echo $item["Price"] ?></p>
            </div>
                <button class="btn btn-primary" type="button">Mua hang</button>
        </div>
    </div>
    <?php
    }
    ?>
</div>
</div>
</div>

