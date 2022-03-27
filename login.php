<link rel="stylesheet" href="style.css">
<?php
require_once("Entities/user.class.php");
session_start();
if(isset($_POST["btn-login"])){
    $u_name = $_POST["txtname"];
    $u_pass = $_POST["txtpass"];
    $user = User::checkLogin($u_name,$u_pass);
    if($user!=null){
        
        $_SESSION["user"] = $u_name;
        header("Location: index.php");
    }else{
        echo "<h1>Tên tài khoản hoặc mật khẩu không đúng</h1>";
    }
}
?>
<body style="display: grid;font-family: 'Open Sans', sans-serif;line-height: 1.5;place-items: center;">
<div id="login">
<form method="POST">
    <fieldset>
    <legend>Login</legend>
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
            Password:
        </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Password" name="txtpass">
        </div>
    <!-- </div> -->
    <!-- <div class="form-group row"> -->
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="btn-login" value="Login">
        </div>
    <!-- </div> -->
</fieldset>
</form>
</div>
</body>