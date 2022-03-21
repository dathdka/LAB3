<title>Them San Pham</title>
<link rel="stylesheet" href="style.css">
<?php
    require_once("Entities/product.class.php");
    require_once("Entities/category.class.php");
    // include_once("header.php");
    if(isset($_POST["btnsubmit"]))
    {
        $productName = $_POST["txtName"];
        $cateID = $_POST["txtCateID"];
        $price = $_POST["txtPrice"];
        $quantity = $_POST["txtQuantity"];
        $description = $_POST["txtDesc"];
        $uploadOk = 1;
        $target_dir = "uploads/";
        $timestamp = date("d"). date("m"). date("y").date("h").date("i").date("s");
        $target_file = $target_dir.$timestamp. basename($_FILES["fileToUpload"]["name"]);
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

        $newProduct = new Product( $productName, $cateID, $price, $quantity, $description, $target_file);

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


<form  method="post" enctype="multipart/form-data">
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
        <textarea name="txtDesc" cols="21" rows="10" value="<?php echo isset($_POST["txtDesc"]) ? $_POST["txtDesc"] : "" ; ?>" ></textarea>
    </div>
</div>

<div class = "row">
    <div class = "lbltitle">
        <label> Số lượng sản phẩm</label>
    </div>
    <div class = "lblinput">
        <input type="number" name="txtQuantity" value="<?php echo isset($_POST["txtQuantity"]) ? $_POST["txtQuantity"] : "" ; ?>" />
    </div>
</div>

<div class = "row">
    <div class = "lbltitle">
        <label>Giá sản phẩm</label>
    </div>
    <div class = "lblinput">
        <input type="number" name="txtPrice" value="<?php echo isset($_POST["txtPrice"]) ? $_POST["txtPrice"] : "" ; ?>" />
    </div>
</div>

<div class = "row">
    <div class = "lbltitle">
        <label>Loại sản phẩm</label>
    </div>
    <div class = "lblinput">
        <select name ="txtCateID">
            <option value="" selected></option>
            <?php
            $cates = Category::list_categories();
            foreach ($cates as $item) {
                echo "<option value=".$item["CateID"].">".$item["CategoryName"]."</option>"; 
            }
            ?>
        </select>
    </div>
</div>

<!-- xu li hinh anh -->
<div class = "row">
    <div class = "lbltitle">
        <label>Hình ảnh sản phẩm</label>
    </div>
    <div class = "lblinput button-images">
        <!-- <button type="file"  style="background-color: #58257b;border-color:white;margin-bottom: 5px; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block;font-size: 16px;cursor: pointer; border-radius:10px" name="fileToUpload" id="fileToUpload" accept= ".PNG,.GIF,.JPG" >Upload File</button> -->
        <input type="file" name="fileToUpload" id="fileToUpload" accept= ".PNG,.GIF,.JPG" display="none">
    </div>
</div>


<!--gửi form-->
<div class = "row" >
    <div class = "submit">
    <button type="submit" name="btnsubmit"> Xac Nhan </button>
    </div>
</div>
</form>
<?php include_once("footer.php"); ?>
