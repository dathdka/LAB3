
<?php 
    require_once("Entities/product.class.php");
    include_once("header.php");
    $prods = Product::list_product();
?>
<div class="container text-center">
    <h1>Sản phẩm </h1>
    <div class="row">
        <?php
            foreach ( $prods as $item )
            {
        ?>
                <div class="col-sm-4">
                    <img src="<?php echo $item["Picture"];?>" style="width:100px"/>
                    <p class="text-danger"> <?php echo $item["ProductName"] ?></p>
                    <p class="text-info"><?php  echo $item["Price"]?></p>
                    <p>
                        <button class="btn btn-primary" type="button">Mua hang</button>
                    </p>
                </div>
            <?php 
            }
            include_once("footer.php");
        ?>
    </div>
</div>