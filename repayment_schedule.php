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
  <title>Repayment Schedule</title>
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Segoe UI', sans-serif;
    }

    .content-wrapper {
      margin-left: 250px; /* Adjust this if your sidebar has different width */
      padding: 30px 20px;
      background-color: #ffffff;
      min-height: 100vh;
    }

    .container-box {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    h2 {
      margin-bottom: 30px;
      color: #343a40;
      text-align: center;
    }

    .table {
      margin-top: 20px;
    }

    .table thead {
      background-color: #007bff;
      color: white;
    }

    .table tbody tr:hover {
      background-color: #f1f1f1;
    }

    .status-paid {
      color: green;
      font-weight: bold;
    }

    .status-due {
      color: red;
      font-weight: bold;
    }

    .status-pending {
      color: orange;
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
    <h2>📅 Repayment Schedule</h2>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Installment No</th>
          <th>Loan ID</th>
          <th>Due Date</th>
          <th>Installment Amount (₹)</th>
          <th>Remaining Balance (₹)</th>
          <th>Payment Method</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <!-- Dynamic rows will go here -->
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
