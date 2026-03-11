<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail'] == "") {
    header('location:index.php');
    exit();
}

// Dummy user data (Replace with database query as needed)
$user = [
  'name' => 'John Doe',
  'email' => 'john.doe@example.com',
  'phone' => '9876543210',
  'gender' => 'Male',
  'dob' => '1990-01-01',
  'address' => '123 Example Street',
  'city' => 'Mumbai',
  'state' => 'Maharashtra',
  'profile_pic' => 'profile.jpg'
];

include_once 'header_kormocharione.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Profile</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f9fafb;
      font-family: 'Segoe UI', sans-serif;
    }

    .main-content-wrapper {
      margin-left: 250px; /* Matches sidebar width */
      padding: 30px 20px;
      min-height: 100vh;
      background-color: #ffffff;
    }

    .profile-card {
      max-width: 900px;
      margin: 40px auto;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 5px 25px rgba(0,0,0,0.1);
      background: #fff;
    }

    .profile-header {
      background: linear-gradient(90deg, #007bff, #0056b3);
      color: white;
      padding: 30px 20px;
      position: relative;
    }

    .profile-name {
      font-size: 24px;
      font-weight: bold;
      margin: 0;
    }

    .profile-role {
      font-size: 14px;
      margin: 5px 0 0;
    }

    .profile-pic-top-right {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #fff;
      position: absolute;
      top: 20px;
      right: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.3);
      background-color: #eee;
    }

    .profile-body {
      padding: 40px 30px 30px;
    }

    .info-label {
      font-weight: bold;
      color: #333;
    }

    .row + .row {
      margin-top: 20px;
    }

    @media (max-width: 768px) {
      .main-content-wrapper {
        margin-left: 0;
        padding: 15px;
      }

      .profile-pic-top-right {
        width: 50px;
        height: 50px;
      }

      .profile-name {
        font-size: 20px;
      }
    }
  </style>
</head>
<body>

<div class="main-content-wrapper">
  <div class="profile-card">
    <div class="profile-header">
      <img src="images/<?php echo $user['profile_pic']; ?>" alt="Profile Picture" class="profile-pic-top-right">
      <h2 class="profile-name"><?php echo $user['name']; ?></h2>
      <p class="profile-role">Borrower Profile</p>
    </div>

    <div class="profile-body">
      <div class="row">
        <div class="col-md-6"><strong class="info-label">Email:</strong> <br><?php echo $user['email']; ?></div>
        <div class="col-md-6"><strong class="info-label">Phone:</strong> <br><?php echo $user['phone']; ?></div>
      </div>
      <div class="row">
        <div class="col-md-6"><strong class="info-label">Gender:</strong> <br><?php echo $user['gender']; ?></div>
        <div class="col-md-6"><strong class="info-label">Date of Birth:</strong> <br><?php echo date("d M Y", strtotime($user['dob'])); ?></div>
      </div>
      <div class="row">
        <div class="col-md-6"><strong class="info-label">City:</strong> <br><?php echo $user['city']; ?></div>
        <div class="col-md-6"><strong class="info-label">State:</strong> <br><?php echo $user['state']; ?></div>
      </div>
      <div class="row">
        <div class="col-md-12"><strong class="info-label">Address:</strong> <br><?php echo $user['address']; ?></div>
      </div>
      <br>
      <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
    </div>
  </div>
</div>

</body>
</html>
