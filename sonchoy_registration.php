<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
include("connectdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $member_id = $_POST['member_id'];
    $amount = $_POST['amount'];
    $date = date("Y-m-d");

    $query = "INSERT INTO savings (member_id, amount, date) VALUES ('$member_id', '$amount', '$date')";
    if (mysqli_query($conn, $query)) {
        $success = "Savings successfully added!";
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Savings</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="mb-4">Savings Registration</h2>

  <?php if (isset($success)): ?>
    <div class="alert alert-success"><?php echo $success; ?></div>
  <?php elseif (isset($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
  <?php endif; ?>

  <form method="POST" action="sonchoy_registration.php">
    <div class="mb-3">
      <label for="member_id" class="form-label">Member ID</label>
      <input type="text" class="form-control" id="member_id" name="member_id" required>
    </div>

    <div class="mb-3">
      <label for="amount" class="form-label">Amount (₹)</label>
      <input type="number" class="form-control" id="amount" name="amount" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
  </form>
</div>
</body>
</html>
