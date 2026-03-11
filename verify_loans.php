<?php 
include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail'] == "") {
  header('location:index.php');
  exit();
}

include_once 'header_kormocharione.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Verify Loan Applications</title>
  <style>
    .main-content-wrapper {
  margin-left: 230px; /* space for sidebar */
  padding: 20px;
  min-height: 100vh;
  background-color: #f9fafb; /* LIGHT color */
  box-sizing: border-box;
}
    body { font-family: Arial, sans-serif; margin: 20px; }
    h2 { color: #333; }
    .card {
      border: 1px solid #ccc;
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 8px;
    }
    button {
      padding: 6px 12px;
      margin-right: 10px;
      border: none;
      cursor: pointer;
      border-radius: 4px;
    }
    .approve { background-color: #4CAF50; color: white; }
    .reject { background-color: #f44336; color: white; }
  </style>
</head>
<body>
<div class="main-content-wrapper">
  <h2>Verify Loan Applications</h2>
  <div class="card">
    <p><strong>Application ID:</strong> APP001</p>
    <p><strong>Member:</strong> Rani Sharma</p>
    <p><strong>Loan Amount:</strong> ₹40,000</p>
    <p><strong>Duration:</strong> 10 months</p>
    <button class="approve">Approve</button>
    <button class="reject">Reject</button>
  </div>
</div>
</body>
</html>
