
<?php
    require_once("Entities/product.class.php");

    if(isset($_POST["btnsubmit"]))
    {
        $productName = $_POST["txtName"];
        $cateID = $_POST["txtcateID"];
        $price = $_POST["txtprice"];
        $quantity = $_POST["txtquantity"];
        $description = $_POST["txtdescription"];
        $picture = $_POST["txtpicture"];

        $newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture);

        $result = $newProduct -> save();
        if(!$result)
        {
            header("Location: add_product.php?failure");
        }
        else
        {
            header("Location: add_product.php?inserted");
        }
    }
?>

<?php
    if(isset($_GET["inserted"]))
    {
        echo "<h2>Thêm sản phẩm thành công</h2>";
    }
?>


<form method="post">
    <div class= "row">
        <div class = "lbltitle">
            <label>Tên sản phẩm</label>
        </div>
        <div class = "lblinput">
            <input type="text" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : "" ; ?>" />
        </div>
    </div>

<div class="row">
    <div class = "lbltitle">
        <label>Mô tả sản phẩm</label>
    </div>
    <div class = "lblinput">
        <textarea name="txtdesc" cols="21" rows="10" value="<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : "" ; ?>" ></textarea>
    </div>
</div>

<div class = "row">
    <div class = "lbltitle">
        <label> Số lượng sản phẩm</label>
    </div>
    <div class = "lblinput">
        <input type="number" name="txtquantity" value="<?php echo isset($_POST["txtquatity"]) ? $_POST["txtquatity"] : "" ; ?>" />
    </div>
</div>

<div class = "row">
    <div class = "lbltitle">
        <label>Giá sản phẩm</label>
    </div>
    <div class = "lblinput">
        <input type="number" name="txtprice" value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"] : "" ; ?>" />
    </div>
</div>

<div class = "row">
    <div class = "lbltitle">
        <label>Loại sản phẩm</label>
    </div>
    <div class = "lblinput">
        <input type="text" name="txtproduct" value="<?php echo isset($_POST["txtproduct"]) ? $_POST["txtproduct"] : "" ?>" />
    </div>
</div>

<div class = "row">
    <div class = "lbltitle">
        <label>Hình ảnh sản phẩm</label>
    </div>
    <div class = "lblinput">
        <input type="picture" name="txtpicture" value="<?php echo isset($_POST["txtpicture"]) ? $_POST["txtpicture"] : "" ; ?>" />
    </div>
</div>

<! --gửi form-->
<div class = "row">
    <div class = "submit">
        <input type="submit" name="btnsubmit" value="Thêm sản phẩm" />
    </div>
</div>
</form>
