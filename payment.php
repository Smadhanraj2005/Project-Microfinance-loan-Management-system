<?php 
include_once 'connectdb.php';
session_start();


include_once 'header_kormocharitwo.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Digital Payment Integration</title>
  <style>
    .main-content-wrapper {
  margin-left: 230px; /* space for sidebar */
  padding: 20px;
  min-height: 100vh;
  background-color: #f9fafb; /* LIGHT color */
  box-sizing: border-box;
}
    
    .container {
      background: white;
      max-width: 700px;
      margin: 30px auto;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    h2 {
      margin-bottom: 5px;
    }
    p.subtext {
      font-size: 14px;
      color: #888;
      margin-bottom: 20px;
    }
    .tabs {
      display: flex;
      margin-bottom: 20px;
    }
    .tabs button {
      padding: 8px 15px;
      border: none;
      background: #f0f0f0;
      margin-right: 10px;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.2s;
    }
    .tabs button.active {
      background: white;
      border: 1px solid #ddd;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    .tab-content {
      display: none;
    }
    .tab-content.active {
      display: block;
    }
    .field-group {
      margin-bottom: 15px;
    }
    select, input[type="text"], input[type="number"] {
      width: calc(100% - 10px);
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin-top: 5px;
    }
    .payment-options {
      display: flex;
      justify-content: space-between;
      margin: 20px 0;
    }
    .payment-options div {
      flex: 1;
      text-align: center;
      padding: 15px;
      border: 1px solid #ddd;
      border-radius: 10px;
      margin: 0 10px;
      cursor: pointer;
    }
    .btn-primary {
      background: #00c29e;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 6px;
      cursor: pointer;
    }
    .method-card {
      display: flex;
      justify-content: space-between;
      padding: 15px;
      border: 1px solid #ccc;
      border-radius: 10px;
      margin-bottom: 15px;
    }
    .method-card.active {
      border: 2px solid #00c29e;
    }
    .method-actions button {
      margin: 0 3px;
    }
    .default-badge {
      background: #00c29e;
      color: white;
      padding: 2px 8px;
      border-radius: 6px;
      font-size: 12px;
      margin-left: 10px;
    }
    .add-btn {
      background: #00c29e;
      padding: 8px 16px;
      color: white;
      border: none;
      border-radius: 6px;
      float: right;
    }

    /* Modal */
    .modal {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.4);
      justify-content: center;
      align-items: center;
    }
    .modal-content {
      background: white;
      padding: 20px;
      width: 300px;
      border-radius: 10px;
      position: relative;
    }
    .modal-content h3 {
      margin-top: 0;
    }
    .modal-close {
      position: absolute;
      top: 10px; right: 10px;
      font-size: 18px;
      cursor: pointer;
    }
    .method-select {
      display: flex;
      justify-content: space-between;
      margin: 15px 0;
    }
    .method-select div {
      flex: 1;
      padding: 10px;
      border: 1px solid #ccc;
      text-align: center;
      border-radius: 6px;
      cursor: pointer;
      margin-right: 10px;
    }
    .method-select div:last-child {
      margin-right: 0;
    }
  </style>
</head>
<body>
<div class="main-content-wrapper">
<div class="container">
  <h2>Digital Payment Integration</h2>
  <p class="subtext">Make secure payments using various payment methods</p>

  <div class="tabs">
    <button class="tab-btn active" data-tab="makePayment">Make Payment</button>
    <button class="tab-btn" data-tab="paymentMethods">Payment Methods</button>
  </div>

  <div id="makePayment" class="tab-content active">
    <div class="field-group">
      <label>Select Loan</label>
      <select>
        <option>Select loan</option>
        <option>Personal Loan</option>
        <option>Business Loan</option>
      </select>
    </div>
    <div class="field-group">
      <label>Payment Amount (₹)</label>
      <input type="number" placeholder="Enter the amount you want to pay">
    </div>

    <label>Payment Method</label>
    <div class="payment-options">
      <div>📱<br>UPI</div>
      <div>💳<br>Card</div>
      <div>🏦<br>Net Banking</div>
    </div>

    <button class="btn-primary">Proceed to Pay</button>
  </div>

  <div id="paymentMethods" class="tab-content">
    <div style="margin-bottom: 15px;">
      <strong>Saved Payment Methods</strong>
      <button class="add-btn" onclick="showModal()">+ Add New Method</button>
    </div>

    <div class="method-card active">
      <div>
        <strong>💳 HDFC Credit Card</strong> <span class="default-badge">Default</span><br>
        Card Number: **** **** **** 1234<br>
        Expires: 12/25
      </div>
      <div class="method-actions">
        <button>✏️</button>
        <button>🗑️</button>
      </div>
    </div>

    <div class="method-card">
      <div>
        <strong>📱 Google Pay</strong><br>
        UPI ID: user@okicici
      </div>
      <div class="method-actions">
        <button>Set as Default</button>
        <button>✏️</button>
        <button>🗑️</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal" id="methodModal">
  <div class="modal-content">
    <span class="modal-close" onclick="hideModal()">&times;</span>
    <h3>Add Payment Method</h3>
    <p>Add a new payment method to your account.</p>

    <div class="method-select">
      <div style="border: 2px solid #00c29e;">💳 Card</div>
      <div>📱 UPI</div>
    </div>

    <div class="field-group">
      <label>Card Nickname</label>
      <input type="text" placeholder="e.g., My HDFC Credit Card">
    </div>
    <div class="field-group">
      <label>Card Number</label>
      <input type="text" placeholder="1234 5678 9012 3456">
    </div>
    <div class="field-group" style="display: flex; gap: 10px;">
      <div style="flex: 1;">
        <label>Expiry Date</label>
        <input type="text" placeholder="MM/YY">
      </div>
      <div style="flex: 1;">
        <label>CVV</label>
        <input type="text" placeholder="123">
      </div>
    </div>
    <button class="btn-primary" style="width: 100%;">Save Method</button>
  </div>
</div>
</div>
<script>
  const tabBtns = document.querySelectorAll('.tab-btn');
  const tabContents = document.querySelectorAll('.tab-content');

  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      tabBtns.forEach(b => b.classList.remove('active'));
      tabContents.forEach(c => c.classList.remove('active'));
      btn.classList.add('active');
      document.getElementById(btn.dataset.tab).classList.add('active');
    });
  });

  function showModal() {
    document.getElementById('methodModal').style.display = 'flex';
  }
  function hideModal() {
    document.getElementById('methodModal').style.display = 'none';
  }
</script>

</body>
</html>
