<?php
include_once 'connectdb.php';

if(isset($_POST['btn_reset'])){

$email = $_POST['txt_email'];
$newpass = $_POST['txt_password'];

$update = $pdo->prepare("UPDATE tbl_user SET password=? WHERE useremail=?");
$update->execute([$newpass,$email]);

if($update){

echo "<script>
alert('Password Updated Successfully');
window.location='login.php';
</script>";

}else{

echo "<script>alert('Email not found');</script>";

}

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Forgot Password</title>

<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">

<style>

body.login-page{
background:url('img/microfinance-1.jpg');
background-size:cover;
}

.login-box{
margin-top:120px;
background:rgba(255,255,255,0.9);
padding:20px;
border-radius:10px;
}

</style>

</head>

<body class="hold-transition login-page">

<div class="login-box">

<div class="login-logo">
<b>Reset</b> Password
</div>

<div class="login-box-body">

<p class="login-box-msg">Enter Email and New Password</p>

<form method="post">

<div class="form-group">
<input type="email" name="txt_email" class="form-control" placeholder="Email" required>
</div>

<div class="form-group">
<input type="password" name="txt_password" class="form-control" placeholder="New Password" required>
</div>

<button type="submit" name="btn_reset" class="btn btn-primary btn-block">
Reset Password
</button>

</form>

<br>

<center>
<a href="login.php">Back to Login</a>
</center>

</div>

</div>

</body>
</html>