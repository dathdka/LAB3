<link rel="stylesheet" href="style.css">
<?php
    // include_once("header.php");
    if(isset($_SESSION["user"])){
        header("Location: index.php");
    }
    require_once("Entities/user.class.php");
    if(isset($_POST["btn-signup"])){
        $u_name = $_POST["txtname"];
        $u_email = $_POST["txtemail"];
        $u_pass = $_POST["txtpass"];
        $u_pass = md5($u_pass);
        $account = new User($u_name, $u_email, $u_pass);
        $result = $account->save();
        if(!$result){
            ?>
                <script>alert("Có lỗi xảy ra")</script>
            <?php
        }
        else{
            echo "<h1>Đăng ký thành công</h1>";
        }
    }
?>

<body style="display: grid;font-family: 'Open Sans', sans-serif;line-height: 1.5;place-items: center;">
<div id="register">
<form method="POST" >
    <fieldset>
    <legend>Register</legend>
    <!-- <div class="form-group row"> -->
        <label for="txtname">
            Username:
        </label>    
        <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Username" name="txtname">
        </div>
    <!-- </div> -->
    <!-- <div class="form-group row"> -->
        <label for="txtemail">
            Email:
        </label>    
        <div class="col-sm-10">
            <input type="email" class="form-control" placeholder="Email" name="txtemail">
        </div>
    <!-- </div>  -->
    <!-- <div class="form-group row"> -->
        <label for="txtpass">
            Password:
        </label>    
        <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Password" name="txtpass">
        </div>
    <!-- </div> -->
    <!-- <div class="form-group row"> -->
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit"  name="btn-signup" value="Sign up">
        </div>
    <!-- </div> -->
    </fieldset>
    
</form>
</div>
</body>
<?php include_once("footer.php"); ?>