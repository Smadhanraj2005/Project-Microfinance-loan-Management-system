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
  <title>View Loan Applications</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    h2 { color: #333; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
    th { background-color: #f2f2f2; }
    .main-content-wrapper {
  margin-left: 230px; /* space for sidebar */
  padding: 20px;
  min-height: 100vh;
  background-color: #f9fafb; /* LIGHT color */
  box-sizing: border-box;
}
  </style>
</head>
<body>
<div class="main-content-wrapper">
  <h2>View Loan Applications</h2>
  <table>
    <thead>
      <tr>
        <th>Application ID</th>
        <th>Member Name</th>
        <th>Loan Amount</th>
        <th>Term</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>APP001</td>
        <td>Ravi Kumar</td>
        <td>₹50,000</td>
        <td>12 months</td>
        <td>Pending</td>
      </tr>
      <tr>
        <td>APP002</td>
        <td>Meena Devi</td>
        <td>₹30,000</td>
        <td>6 months</td>
        <td>Approved</td>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>
