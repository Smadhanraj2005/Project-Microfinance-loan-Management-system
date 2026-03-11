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
  <title>Repayment Tracking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Custom Styling -->
  <style>
    .main-content-wrapper {
  margin-left: 230px; /* space for sidebar */
  padding: 20px;
  min-height: 100vh;
  background-color: #f9fafb; /* LIGHT color */
  box-sizing: border-box;
}
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #ffffff;
      margin: 0;
      padding: 0;
      color: #333;
    }

    .container {
      max-width: 1100px;
      margin: 40px auto;
      padding: 20px;
      background-color: #f9f9f9;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    h2 {
      color: #2c3e50;
      border-bottom: 2px solid #8e44ad;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
    }

    th, td {
      padding: 14px 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #8e44ad;
      color: #fff;
      font-weight: 600;
    }

    tr:nth-child(even) {
      background-color: #f4f4f4;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    .status-paid {
      color: #27ae60;
      font-weight: bold;
    }

    .status-pending {
      color: #e67e22;
      font-weight: bold;
    }

    @media (max-width: 768px) {
      .container {
        margin: 20px 10px;
        padding: 15px;
      }

      table, thead, tbody, th, td, tr {
        display: block;
      }

      thead tr {
        display: none;
      }

      tr {
        margin-bottom: 15px;
      }

      td {
        position: relative;
        padding-left: 50%;
        border: none;
        border-bottom: 1px solid #ddd;
      }

      td::before {
        position: absolute;
        left: 15px;
        top: 10px;
        white-space: nowrap;
        font-weight: bold;
        color: #888;
      }

      td:nth-of-type(1)::before { content: "Loan ID"; }
      td:nth-of-type(2)::before { content: "Member Name"; }
      td:nth-of-type(3)::before { content: "Installment"; }
      td:nth-of-type(4)::before { content: "Due Date"; }
      td:nth-of-type(5)::before { content: "Status"; }
    }
  </style>
</head>
<body>
<div class="main-content-wrapper">
<div class="container">
  <h2>Repayment Tracking</h2>
  <table>
    <thead>
      <tr>
        <th>Loan ID</th>
        <th>Member Name</th>
        <th>Installment</th>
        <th>Due Date</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>LN1001</td>
        <td>Vijay Kumar</td>
        <td>₹2,500</td>
        <td>2025-05-20</td>
        <td class="status-paid">Paid</td>
      </tr>
      <tr>
        <td>LN1002</td>
        <td>Kavitha R.</td>
        <td>₹3,000</td>
        <td>2025-05-25</td>
        <td class="status-pending">Pending</td>
      </tr>
    </tbody>
  </table>
</div>
</div>
</body>
</html>
