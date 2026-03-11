<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail'] == "") {
    header('location:index.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get updated values
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $address = $_POST['address'];

    // TODO: Update this into your DB
    // mysqli_query($pdo, "UPDATE users SET ...");

    header("Location: profile.php");
    exit();
}
include_once 'header_kormocharitwo.php';
// Simulated user data for prefill
$user = [
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'phone' => '9876543210',
    'gender' => 'Male',
    'dob' => '1990-01-01',
    'city' => 'Mumbai',
    'state' => 'Maharashtra',
    'address' => '123 Example Street'
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .main-content-wrapper {
      margin-left: 230px; /* space for sidebar */
      padding: 20px;
      min-height: 100vh;
      background-color: #f9fafb; /* LIGHT color */
      box-sizing: border-box;
    }

      .form-container {
        max-width: 700px;
        margin: 40px auto;
        background: #fff;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        border-radius: 10px;
      }
    </style>
</head>
<body>
<div class="main-content-wrapper">
<div class="container form-container">
  <h3>Edit Profile</h3>
  <form method="POST" action="">
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" value="<?php echo $user['name']; ?>" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Phone</label>
      <input type="text" name="phone" value="<?php echo $user['phone']; ?>" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Gender</label>
      <select name="gender" class="form-control">
        <option <?php if($user['gender'] == 'Male') echo 'selected'; ?>>Male</option>
        <option <?php if($user['gender'] == 'Female') echo 'selected'; ?>>Female</option>
      </select>
    </div>
    <div class="form-group">
      <label>Date of Birth</label>
      <input type="date" name="dob" value="<?php echo $user['dob']; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>City</label>
      <input type="text" name="city" value="<?php echo $user['city']; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>State</label>
      <input type="text" name="state" value="<?php echo $user['state']; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Address</label>
      <textarea name="address" class="form-control"><?php echo $user['address']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Save Changes</button>
    <a href="profile.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
    </div>
</body>
</html>
