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
  <title>Disbursed Loans</title>
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
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
    th { background-color: #e0f7fa; }
  </style>
</head>
<body>
<div class="main-content-wrapper">
  <h2>Disbursed Loans</h2>
  <table>
    <thead>
      <tr>
        <th>Loan ID</th>
        <th>Member Name</th>
        <th>Amount</th>
        <th>Disbursed On</th>
        <th>Payment Mode</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>LN1001</td>
        <td>Vijay Kumar</td>
        <td>₹25,000</td>
        <td>2025-05-10</td>
        <td>Bank Transfer</td>
      </tr>
    </tdiv>
    </tbody>
  </table>
</body>
</html>
