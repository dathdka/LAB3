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

        $newProduct = new Product($productName, $cateID, $price, $quantity, $description, $target_file);

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