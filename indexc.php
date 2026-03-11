<?php 
include_once 'connectdb.php';
session_start();

include_once 'header_kormocharitwo.php';

$emiResult = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $loanAmount = $_POST['loan_amount'];
    $interestRate = $_POST['interest_rate'];
    $loanTenure = $_POST['loan_tenure'];

    // EMI Calculation
    $monthlyRate = ($interestRate / 12) / 100;

    $emi = ($loanAmount * $monthlyRate * pow(1 + $monthlyRate, $loanTenure)) / 
           (pow(1 + $monthlyRate, $loanTenure) - 1);

    $emiResult = "Monthly EMI: ₹ " . number_format($emi, 2);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<title>Microfinance Loan Calculator</title>

<style>

body{
background-color:white;
font-family: Arial, sans-serif;
margin:0;
padding:0;
}

/* Main container */

.container{
width:450px;
margin:60px auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,0.15);
}

/* Heading */

h1{
text-align:center;
margin-bottom:25px;
color:#333;
}

/* Form inputs */

.form-group{
margin-bottom:15px;
}

label{
display:block;
margin-bottom:5px;
font-weight:bold;
}

input{
width:100%;
padding:10px;
border:1px solid #ccc;
border-radius:5px;
}

/* Button */

button{
width:100%;
padding:12px;
background:#007bff;
border:none;
color:white;
font-size:16px;
border-radius:5px;
cursor:pointer;
}

button:hover{
background:#0056b3;
}

/* Result box */

.result{
margin-top:20px;
background:#e8f5e9;
padding:15px;
border-radius:6px;
text-align:center;
font-size:18px;
font-weight:bold;
color:#2e7d32;
}

</style>

</head>

<body>

<div class="container">

<h1>Loan EMI Calculator</h1>

<form method="POST" action="">

<div class="form-group">
<label>Loan Amount (₹)</label>
<input type="number" name="loan_amount" required>
</div>

<div class="form-group">
<label>Annual Interest Rate (%)</label>
<input type="number" step="0.01" name="interest_rate" required>
</div>

<div class="form-group">
<label>Loan Tenure (Months)</label>
<input type="number" name="loan_tenure" required>
</div>

<button type="submit">Calculate EMI</button>

</form>

<?php if ($emiResult != ''): ?>

<div class="result">
<?php echo $emiResult; ?>
</div>

<?php endif; ?>

</div>

</body>
</html>