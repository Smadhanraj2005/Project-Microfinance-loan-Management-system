<?php 
include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail'] == "") {
  header('location:index.php');
  exit();
}

include_once 'header_kormocharitwo.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Loan Status</title>
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f0f2f5;
      font-family: 'Segoe UI', sans-serif;
    }

    .content-wrapper {
      margin-left: 250px; /* adjust based on sidebar width */
      padding: 30px 20px;
      background-color: #ffffff;
      min-height: 100vh;
    }

    .container-box {
      background: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: bold;
      color: #2c3e50;
    }

    .loan-card {
      background-color: #f8f9fa;
      border: 1px solid #ddd;
      border-left: 5px solid #007bff;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 8px;
      transition: 0.3s;
    }

    .loan-card:hover {
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .loan-card h5 {
      color: #007bff;
    }

    .status-approved {
      color: green;
      font-weight: bold;
    }

    .status-pending {
      color: orange;
      font-weight: bold;
    }

    .status-rejected {
      color: red;
      font-weight: bold;
    }

    .progress {
      height: 20px;
      margin-top: 10px;
    }

    .label {
      font-weight: 500;
      color: #555;
    }

    @media (max-width: 768px) {
      .content-wrapper {
        margin-left: 0;
        padding: 15px;
      }

      h2 {
        font-size: 1.4rem;
      }
    }
  </style>
</head>
<body>

<div class="content-wrapper">
  <div class="container-box">
    <h2>📄 Your Loan Status</h2>

    <!-- Placeholder for dynamic loan cards -->
    <!-- Example card -->
    <div class="loan-card">
      <h5>Loan ID: LOAN123456</h5>
      <p class="label">Amount: ₹15,000</p>
      <p class="label">Date: 10 May 2025</p>
      <p class="label">Duration: 12 months</p>
      <p class="label">Status: <span class="status-approved">Approved</span></p>
      <div class="progress">
        <div class="progress-bar bg-success" style="width: 75%;">75%</div>
      </div>
    </div>

    <!-- Add more loan cards dynamically here -->
  </div>
</div>

</body>
</html>
