<?php 
    include_once('header.php'); 
    require_once("Entities/product.class.php");
    require_once("Entities/category.class.php");
    $cates = Category::list_categories();

    error_reporting(E_ALL);
    ini_set('display_errors','1');
    if(isset($_GET["id"])){
        $pro_id = $_GET["id"];
        $was_found = false;
        $i = 0;
        if(!isset($_SESSION["cart_item"]) || count($_SESSION["cart_item"])<1){
            $_SESSION["cart_item"] = array(0 => array("pro_id" => $pro_id,"quantity"=>1));
        }
        else{
            foreach($_SESSION["cart_item"] as $item){
                $i++; 
                foreach($item as $key=>$value){
                    if($key=="pro_id" && $value == $pro_id){
                        array_splice($_SESSION["cart_item"],$i-1, 1, 
                        array(array("pro_id" => $pro_id,"quantity"=> $item["quantity"]+1)));
                        $was_found = true;
                    }
                }
            }
            if($was_found ==false){
                array_push($_SESSION["cart_item"], array("pro_id" => $pro_id,"quantity"=>1));
            }
        }
        header("Location: shopping_cart.php");
    }
?>
    <div class="container-fluid text-center" >
        <div class="col-sm-10" >
            <h3>Thông tin giỏ hàng</h3><br>
            <table class="table table-condensed">
                <thead>
                    <tr id="shopcard-text-center">
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $total_money=0;
                        if(isset($_SESSION["cart_item"])&& count($_SESSION["cart_item"])>0){
                            foreach($_SESSION["cart_item"] as $item){
                                $id = $item["pro_id"];
                                $product = Product::get_product($id);
                                $prod = $product;
                                $total_money += $item["quantity"]*$prod["Price"];
                                echo "<tr><td>".$prod["ProductName"]."</td>
                                <td><img style='width:100px;' src=". $prod["Picture"]."></td>
                                <td>".$item["quantity"]."</td>
                                <td>".$prod["Price"]."</td>
                                <td>".$prod["Price"]*$item["quantity"]."</td></tr>";
                                
                            }
                            echo "<tr> <td colspan=5><p class='text-right text-danger'>Tổng tiền: " .$total_money."</p></td></tr>" ;
                            echo "<tr><td colspan= 3><p class='text-right'><button type='button' class='btn btn-primary'>Tiếp tục mua hàng
                            </button></p></td><td colspan=2><p class='text-right'><button type='button' class='btn btn-sucess'>Thanh toán
                            </button></p></td></tr>";
                        }
                        else{
                            echo "Không có sản phẩm nào trong giỏ hàng";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php  include_once("footer.php"); ?>