<?php 

include_once 'connectdb.php';
session_start();

if($_SESSION['useremail']==""){

  header('location:index.php');

}


include_once 'header_kormocharitwo.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Loan Application</title>
  <style>
        .main-content-wrapper {
      margin-left: 230px; /* space for sidebar */
      padding: 20px;
      min-height: 100vh;
      background-color: #f9fafb; /* LIGHT color */
      box-sizing: border-box;
    }

    .tabs {
      margin-bottom: 15px;
      display: flex;
      gap: 10px;
    }

    .tabs button {
      padding: 10px 20px;
      background-color: #d1d1d1;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      background-color: #f0f0f0; 
    }

    .tabs button.active {
      background-color: #007bff;
      color: white;
    }

    .tab-content {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .row {
      display: flex;
      gap: 20px;
      margin-bottom: 15px;
    }

    .row > div {
      flex: 1;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input, select, textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin-bottom: 10px;
    }

    textarea {
      resize: vertical;
    }

    .submit-btn {
      padding: 10px 20px;
      background-color: #28a745;
      border: none;
      color: white;
      border-radius: 5px;
      cursor: pointer;
    }

    h3 {
      margin-top: 0;
    }

    ul {
      line-height: 1.8;
    }

    pre {
      background: #f8f9fa;
      padding: 10px;
      border-radius: 5px;
    }
    
  </style>
</head>
<body>
<div class="main-content-wrapper">
  <div class="tabs">
  
    <button onclick="showTab('eligibility')">Check Eligibility</button>
    <button class="active" onclick="showTab('apply')">Apply for Loan</button>
  </div>

  <!-- Eligibility Tab -->
  <div id="eligibility" class="tab-content" style="display: none;">
    <h3>Loan Eligibility Criteria</h3>
    <ul>
      <li>Minimum monthly income: ₹10,000</li>
      <li>Age: 21 - 58 years</li>
      <li>No previous loan defaults</li>
      <li>Valid employment or business proof</li>
    </ul>
  </div>

  <!-- Apply Tab -->
  <div id="apply" class="tab-content" style="display: block;">
    <form method="POST" action="">
      <div class="row">
        <div>
          <label for="loan_type">Loan Type</label>
          <select name="loan_type" required>
            <option value="">Select loan type</option>
            <option value="personal">Personal Loan</option>
            <option value="business">Business Loan</option>
          </select>
        </div>
        <div>
          <label for="loan_amount">Loan Amount (₹)</label>
          <input type="number" name="loan_amount" min="5000" max="500000" value="25000" required>
          <small>Enter an amount between ₹5,000 and ₹5,00,000</small>
        </div>
      </div>

      <div class="row">
        <div>
          <label for="loan_tenure">Loan Tenure</label>
          <select name="loan_tenure" required>
            <option value="">Select loan tenure</option>
            <option value="6">6 months</option>
            <option value="12">12 months</option>
            <option value="24">24 months</option>
          </select>
        </div>
        <div>
          <label for="monthly_income">Monthly Income (₹)</label>
          <input type="number" name="monthly_income" required>
        </div>
      </div>

      <label for="loan_purpose">Loan Purpose</label>
      <textarea name="loan_purpose" rows="3" placeholder="Describe the purpose of your loan application" required></textarea>

      <div class="row">
        <div>
          <label for="employment_type">Employment Type</label>
          <select name="employment_type" required>
            <option value="">Select employment type</option>
            <option value="salaried">Salaried</option>
            <option value="self_employed">Self Employed</option>
          </select>
        </div>
        <div>
          <label for="employer_name">Employer/Business Name</label>
          <input type="text" name="employer_name" required>
        </div>
      </div>

      <label for="work_experience">Work Experience</label>
      <select name="work_experience" required>
        <option value="">Select work experience</option>
        <option value="0-1">0-1 years</option>
        <option value="1-3">1-3 years</option>
        <option value="3+">3+ years</option>
      </select>

      <br>
      <button type="submit" class="submit-btn">Submit Application</button>
    </form>

    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h3>✅ Application Submitted Successfully!</h3>";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
      }
    ?>
  </div>
</div>
  <!-- Status Tab -->
  <div id="status" class="tab-content" style="display: none;">
    <h3>Application Status</h3>
    <p>Your last application is under review. You will be notified within 2 working days.</p>
  </div>
    </div>
  <!-- JavaScript -->
  <script>
    function showTab(tabName) {
      const tabs = document.querySelectorAll('.tab-content');
      const buttons = document.querySelectorAll('.tabs button');

      tabs.forEach(tab => tab.style.display = 'none');
      document.getElementById(tabName).style.display = 'block';

      buttons.forEach(btn => btn.classList.remove('active'));
      if (tabName === 'eligibility') buttons[0].classList.add('active');
      if (tabName === 'apply') buttons[1].classList.add('active');
      if (tabName === 'status') buttons[2].classList.add('active');
    }
  </script>

</body>
</html>