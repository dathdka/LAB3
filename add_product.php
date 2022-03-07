



<form action="upload.php" method="POST" enctype="multipart/form-data">
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
        <input type="text" name="txtCateID" value="<?php echo isset($_POST["txtCateID"]) ? $_POST["txtCateID"] : "" ?>" />
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
