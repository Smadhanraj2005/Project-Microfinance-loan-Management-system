<?php
include_once 'connectdb.php';

if(isset($_POST['btn_register'])){

$username = $_POST['txt_username'];
$email = $_POST['txt_email'];
$password = $_POST['txt_password'];
$phone = $_POST['txt_phone'];
$role = $_POST['txt_role'];
$address = $_POST['txt_address'];

if($username=="" || $email=="" || $password=="" || $phone=="" || $role==""){

echo "<script>alert('All fields are required');</script>";

}else{

// CHECK IF EMAIL EXISTS
$select = $pdo->prepare("SELECT useremail FROM tbl_user WHERE useremail=?");
$select->execute([$email]);

if($select->rowCount()>0){

echo "<script>alert('Email already registered');</script>";

}else{

// PASSWORD HASHING (security best practice)
$passwordHash = password_hash($password,PASSWORD_DEFAULT);

// INSERT USER
$insert = $pdo->prepare("INSERT INTO tbl_user(username,useremail,password,phone,role,address)
VALUES(?,?,?,?,?,?)");

if($insert->execute([$username,$email,$passwordHash,$phone,$role,$address])){

echo "<script>
alert('Account Created Successfully');
window.location='login.php';
</script>";

}else{

echo "<script>alert('Registration Failed');</script>";

}

}

}

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Register | Microfinance</title>

<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">

<style>

body.login-page{
background-image:url('img/microfinance-1.jpg');
background-size:cover;
background-position:center;
}

.register-box{
width:420px;
margin:60px auto;
background:rgba(255,255,255,0.9);
padding:25px;
border-radius:10px;
box-shadow:0 0 15px rgba(0,0,0,0.3);
}

.login-logo{
text-align:center;
font-size:28px;
margin-bottom:20px;
}

</style>

</head>

<body class="hold-transition login-page">

<div class="register-box">

<div class="login-logo">
<b>Create</b> Account
</div>

<div class="login-box-body">

<form method="post">

<div class="form-group">
<input type="text" name="txt_username" class="form-control" placeholder="Full Name" required>
</div>

<div class="form-group">
<input type="email" name="txt_email" class="form-control" placeholder="Email Address" required>
</div>

<div class="form-group">
<input type="password" name="txt_password" class="form-control" placeholder="Password" required>
</div>

<div class="form-group">
<input type="text" name="txt_phone" class="form-control" placeholder="Phone Number" required>
</div>

<div class="form-group">
<textarea name="txt_address" class="form-control" placeholder="Address" required></textarea>
</div>

<div class="form-group">
<select name="txt_role" class="form-control" required>
<option value="">Select Role</option>
<option value="Borrower">Borrower</option>
<option value="Lender">Lender</option>
</select>
</div>

<button type="submit" name="btn_register" class="btn btn-success btn-block">
Register
</button>

<br>

<center>
Already have an account? <a href="login.php">Login</a>
</center>

</form>

</div>

</div>

</body>
</html>