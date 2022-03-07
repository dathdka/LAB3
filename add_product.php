<?php
    require_once("Entities/product.class.php");

    if(isset($_POST["btnsubmit"]))
    {
        
        $productName = $_POST["txtName"];
        $cateID = $_POST["txtCateID"];
        $price = $_POST["txtPrice"];
        $quantity = $_POST["txtQuantity"];
        $description = $_POST["txtdesc"];
        $uploadOk = 1;
        $target_dir = "uploads/";
        $target_file = $target_dir. basename($_FILES["fileToUpload"]["name"]);
        if(file_exists($target_file))
        {
            echo "da trung anh";
            $uploadOk = 0; 
        }
        if ($_FILES["fileToUpload"]["size"]>500000) {
            echo "da vuot qua gioi han";
            $uploadOk = 0;
        }
        if($uploadOk == 0)
        {
            echo "upload that bai";
        }
        else
        {
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        }

        $newProduct = new Product($productName, $productID, $cateID, $price, $quantity, $description, $target_file);

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



<form action="upload.php"method="POST" enctype="multipart/form-data">
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
        <input type="number" name="txtQuantity" value="<?php echo isset($_POST["txtQuantity"]) ? $_POST["txtquatity"] : "" ; ?>" />
    </div>
</div>

<div class = "row">
    <div class = "lbltitle">
        <label>Giá sản phẩm</label>
    </div>
    <div class = "lblinput">
        <input type="number" name="txtPrice" value="<?php echo isset($_POST["txtPrice"]) ? $_POST["txtprice"] : "" ; ?>" />
    </div>
</div>

<div class = "row">
    <div class = "lbltitle">
        <label>Loại sản phẩm</label>
    </div>
    <div class = "lblinput">
        <input type="text" name="txtCateID" value="<?php echo isset($_POST["txtCateID"]) ? $_POST["txtproduct"] : "" ?>" />
    </div>
</div>

<div class = "row">
    <div class = "lbltitle">
        <label>Hình ảnh sản phẩm</label>
    </div>
    <div class = "lblinput">
        <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
</div>

<! --gửi form-->
<div class = "row">
    <div class = "submit">
        <input type="submit" name="btnsubmit" value="Thêm sản phẩm" />
    </div>
</div>
</form>
<?php include_once("footer.php"); ?>
