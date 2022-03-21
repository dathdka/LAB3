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
<div>
    <h3>Danh mục</h3>
    <?php
    foreach ($cates as $item) {
        echo "<li class='list-group-item'><a
                href=/LAB3/list_product.php?cateid=" . $item["CateID"] . ">" . $item["CategoryName"] . "</a></li>";
    }
    ?>
</div>
<div class="col-sm-4" style="display:inline-block; text-align:center; margin:20px; padding:20px; ;border:1px solid black;  ">
    <img src="<?php echo $prod["Picture"]; ?>" style="width:100px" />
    <p class="text-danger"> <?php echo $prod["ProductName"] ?></p>
    <p class="text-info"><?php echo $prod["Desscription"] ?></p>
    <p class="text-info"><?php echo $prod["Price"] ?></p>
    <p>
        <button class="btn btn-primary" type="button" style="background-color: #58257b; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block;font-size: 16px;cursor: pointer; border-radius:10px">Mua hang</button>
    </p>
</div>
<p>SẢN PHẨM LIÊN QUAN</p>
<div class="col-sm-4" style="display:inline-block; text-align:center; margin:20px; padding:20px; ;border:1px solid black;  ">
    <?php
    foreach ($prod_relate as $item) {
    ?>
        <a href="/LAB3/product_detail.php?id=<?php echo $item["ProductID"]; ?>">
            <img src=<?php echo "/LAB3/".$item["Picture"]; ?> class="img-responsive" style="width:200px">
        </a>
        <p class="text-danger"> <?php echo $item["ProductName"]; ?></p>
        <p class="text-info"><?php echo $item["Desscription"] ?></p>
        <p class="text-info"><?php echo $item["Price"] ?></p>
        <button class="btn btn-primary" type="button" style="background-color: #58257b; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block;font-size: 16px;cursor: pointer; border-radius:10px">Mua hang</button>
    <?php
    }
    ?>
</div>