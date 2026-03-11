<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
include("connectdb.php");
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Microfinance Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card {
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    .sidebar {
      height: 100vh;
      background-color: #343a40;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      padding: 15px;
      display: block;
    }
    .sidebar a:hover {
      background-color: #495057;
    }
  </style>
</head>
<body>

<div class="d-flex">
  <!-- Sidebar -->
  <div class="sidebar p-3">
    <h4 class="text-white">Microfinance</h4>
    <a href="dashboard.php">Dashboard</a>
    <a href="sonchoy_registration.php">Add Savings</a>
    <a href="rin_registration.php">Apply Loan</a>
    <a href="profile.php">My Profile</a>
    <a href="logout.php" class="text-danger">Logout</a>
  </div>

  <!-- Main Dashboard -->
  <div class="p-4 w-100">
    <h2 class="mb-4">Welcome, <?php echo htmlspecialchars($username); ?> 👋</h2>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="card text-center p-4">
          <h5>Total Savings</h5>
          <h3>₹ 12,500</h3>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center p-4">
          <h5>Loan Status</h5>
          <h3>Active</h3>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center p-4">
          <h5>Last Transaction</h5>
          <h3>Apr 16, 2025</h3>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
