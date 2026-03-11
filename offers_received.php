<?php  
include_once 'connectdb.php';
session_start();

if (empty($_SESSION['useremail'])) {
  header('location:index.php');
  exit();
}

include_once 'header_kormocharitwo.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Loan Offers Received</title>
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #eef2f7;
      font-family: 'Segoe UI', sans-serif;
    }

    .content-wrapper {
      margin-left: 250px; /* Adjust according to sidebar width */
      padding: 30px 20px;
      background-color: #ffffff;
      min-height: 100vh;
    }

    .container-box {
      background: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }

    .table thead {
      background-color: #007bff;
      color: white;
    }

    .table-hover tbody tr:hover {
      background-color: #f5f5f5;
    }

    .btn-accept {
      background-color: #28a745;
      color: white;
      border-radius: 20px;
      padding: 5px 15px;
    }

    .btn-reject {
      background-color: #dc3545;
      color: white;
      border-radius: 20px;
      padding: 5px 15px;
    }

    .status-pending {
      color: orange;
      font-weight: bold;
    }

    .status-accepted {
      color: green;
      font-weight: bold;
    }

    .status-rejected {
      color: red;
      font-weight: bold;
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
    <h2>📨 Loan Offers Received</h2>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Offer ID</th>
          <th>Lender Name</th>
          <th>Loan Amount (₹)</th>
          <th>Interest Rate (%)</th>
          <th>Tenure (Months)</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Dynamic rows go here -->
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
