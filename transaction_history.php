<?php  
include_once 'connectdb.php';
session_start();

if (empty($_SESSION['useremail'])) {
  header('location:index.php');
  exit();
}

include_once 'header_kormocharitwo.php'; // Side menu included here
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Transaction History</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .content-wrapper {
      margin-left: 250px; /* Width of your sidebar */
      padding: 30px 20px;
      background-color: #ffffff;
      min-height: 100vh;
    }

    .main-content-box {
      background: #fff;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #343a40;
    }

    .table thead th {
      background-color: #f8f9fa;
      color: #212529;
      text-align: center;
    }

    .table td, .table th {
      text-align: center;
      vertical-align: middle;
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: #f2f2f2;
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
    <div class="main-content-box">
      <h2>Transaction History</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Transaction ID</th>
              <th>Date</th>
              <th>Type</th>
              <th>Amount (₹)</th>
              <th>Status</th>
              <th>Payment Method</th>
              <th>Balance After</th>
              <th>Reference ID</th>
              <th>Remarks</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>TXN12345678</td>
              <td>18 May 2025, 10:00 AM</td>
              <td>Credit</td>
              <td>₹12,500</td>
              <td>Success</td>
              <td>UPI</td>
              <td>₹12,500</td>
              <td>REF20250518</td>
              <td>Loan disbursement</td>
            </tr>
            <tr>
              <td>2</td>
              <td>TXN12345679</td>
              <td>15 May 2025, 04:30 PM</td>
              <td>Debit</td>
              <td>₹750</td>
              <td>Success</td>
              <td>Bank Transfer</td>
              <td>₹10,000</td>
              <td>REF20250515</td>
              <td>Monthly repayment</td>
            </tr>
            <tr>
              <td>3</td>
              <td>TXN12345680</td>
              <td>12 May 2025, 12:00 PM</td>
              <td>Debit</td>
              <td>₹750</td>
              <td>Pending</td>
              <td>Card</td>
              <td>₹9,900</td>
              <td>REF20250512</td>
              <td>Payment in process</td>
            </tr>
            <tr>
              <td>4</td>
              <td>TXN12345681</td>
              <td>10 May 2025, 02:45 PM</td>
              <td>Credit</td>
              <td>₹1,000</td>
              <td>Failed</td>
              <td>UPI</td>
              <td>₹9,900</td>
              <td>REF20250510</td>
              <td>System error</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>
</html>
