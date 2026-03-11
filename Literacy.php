<?php 
include_once 'connectdb.php';
session_start();


include_once 'header_kormocharitwo.php';
?>

<!-- Begin Wrapper -->
<!-- End Wrapper -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Financial Literacy</title>
  <style>
    
    .main-content-wrapper {
  margin-left: 230px; /* space for sidebar */
  padding: 20px;
  min-height: 100vh;
  background-color: #f9fafb; /* LIGHT color */
  box-sizing: border-box;
}

    h1 {
      color: #111827;
    }
    p.description {
      color: #6b7280;
      margin-top: -10px;
    }
    .tabs {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
    }
    .tabs button {
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      background-color: #e5e7eb;
      cursor: pointer;
    }
    .tabs button.active {
      background-color: #d1d5db;
      font-weight: bold;
    }
    .tab-content {
      display: none;
    }
    .tab-content.active {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 20px;
    }
    .card {
      background: white;
      border-radius: 12px;
      padding: 15px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .card img {
      width: 100%;
      border-radius: 8px;
      background: #ccc;
    }
    .card h3 {
      margin: 10px 0 5px;
    }
    .badge {
      font-size: 12px;
      background-color: #d1fae5;
      color: #065f46;
      padding: 2px 8px;
      border-radius: 20px;
      display: inline-block;
      margin-bottom: 5px;
    }
    .button {
      margin-top: 10px;
      display: inline-block;
      padding: 8px 16px;
      background-color: #f3f4f6;
      border-radius: 8px;
      text-align: center;
      cursor: pointer;
    }
    .progress-bar {
      height: 5px;
      background: #d1fae5;
      margin-top: 8px;
      border-radius: 4px;
      position: relative;
    }
    .progress-bar span {
      display: block;
      height: 100%;
      background: #10b981;
      border-radius: 4px;
    }
  </style>
</head>
<body>


<div class="main-content-wrapper">
  <!-- Your Literacy Content Here -->
 <h1 style="text-align:center;">Financial Literacy</h1>

<p class="description">Learn about financial management and improve your financial knowledge</p>
<div class="content-container" style="margin-left: 230px;">
  <!-- Your existing literacy.php HTML code -->
  <!-- Like tabs, video cards, quizzes, etc -->
</div>

<div class="tabs">
  <button onclick="switchTab('videos')" class="active">Educational Videos</button>
  <button onclick="switchTab('articles')">Articles</button>
  <button onclick="switchTab('quizzes')">Quizzes</button>
</div>
<div id="videos" class="tab-content active">

  <!-- Card 1 -->
  <div class="card" style="border: 1px solid #ddd; border-radius: 10px; padding: 15px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 20px;">
    <video width="100%" height="auto" controls style="border-radius: 10px;">
      <source src="vedio/WhatsApp Video 2025-05-25 at 18.26.59_117900f6.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <div class="badge" style="display: inline-block; background-color: #3c8dbc; color: white; padding: 5px 10px; border-radius: 5px; margin-top: 10px;">
      Basics
    </div>
    <h3 style="margin-top: 10px;">Understanding Interest Rates</h3>
    <p>Learn how interest rates work and affect your loans and savings.</p>
    <div class="button" style="margin-top: 10px;">
      <a href="video/WhatsApp Video 2025-05-25 at 18.26.59_117900f6.mp4" target="_blank" class="btn btn-primary">Watch Now</a>
    </div>
  </div>

  <!-- Card 2 -->
  <div class="card" style="border: 1px solid #ddd; border-radius: 10px; padding: 15px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 20px;">
    <video width="100%" height="auto" controls style="border-radius: 10px;">
      <source src="vedio/small.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <div class="badge" style="display: inline-block; background-color: #3c8dbc; color: white; padding: 5px 10px; border-radius: 5px; margin-top: 10px;">
      Basics
    </div>
    <h3 style="margin-top: 10px;">Understanding Interest Rates</h3>
    <p>Learn how interest rates work and affect your loans and savings.</p>
    <div class="button" style="margin-top: 10px;">
      <a href="video/WhatsApp Video 2025-05-25 at 18.26.59_117900f6.mp4" target="_blank" class="btn btn-primary">Watch Now</a>
    </div>
  </div>

  <!-- Card 3 -->
  <div class="card" style="border: 1px solid #ddd; border-radius: 10px; padding: 15px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 20px;">
    <video width="100%" height="auto" controls style="border-radius: 10px;">
      <source src="vedio/bis.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <div class="badge" style="display: inline-block; background-color: #5cb85c; color: white; padding: 5px 10px; border-radius: 5px; margin-top: 10px;">
      Business
    </div>
    <h3 style="margin-top: 10px;">Small Business Financing</h3>
    <p>Explore funding options for small businesses.</p>
    <div class="button" style="margin-top: 10px;">
      <a href="video/small_business_financing.mp4" target="_blank" class="btn btn-success">Watch Now</a>
    </div>
  </div>

</div>


  

<div id="articles" class="tab-content">
  <div class="card">
    <img src="" alt="Article Thumbnail">
    <div class="badge">Personal Finance</div>
    <h3>10 Tips for Effective Money Management</h3>
    <p>Practical tips to manage your money effectively.</p>
    <div class="button">Read Article</div>
  </div>
  <div class="card">
    <img src="" alt="Article Thumbnail">
    <div class="badge">Microfinance</div>
    <h3>Understanding Microfinance Loans</h3>
    <p>A comprehensive guide to microfinance loans.</p>
    <div class="button">Read Article</div>
  </div>
  <div class="card">
    <img src="" alt="Article Thumbnail">
    <div class="badge">Credit</div>
    <h3>Building a Strong Credit History</h3>
    <p>Steps to build and maintain strong credit history.</p>
    <div class="button">Read Article</div>
  </div>
</div>

<div id="quizzes" class="tab-content">
  <div class="card">
    <div class="badge">Basics</div>
    <h3>Financial Basics Quiz</h3>
    <p>10 questions - 0% complete</p>
    <div class="progress-bar"><span style="width:0%"></span></div>
    <div class="button">Start Quiz</div>
  </div>
  <div class="card">
    <div class="badge">Loans</div>
    <h3>Loan Management Quiz</h3>
    <p>8 questions - 25% complete</p>
    <div class="progress-bar"><span style="width:25%"></span></div>
    <div class="button">Continue Quiz</div>
  </div>
  <div class="card">
    <div class="badge">Investments</div>
    <h3>Investment Fundamentals</h3>
    <p>15 questions - 75% complete</p>
    <div class="progress-bar"><span style="width:75%"></span></div>
    <div class="button">Continue Quiz</div>
  </div>
</div>

<script>
function switchTab(tabName) {
  document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
  document.querySelectorAll('.tabs button').forEach(btn => btn.classList.remove('active'));
  document.getElementById(tabName).classList.add('active');
  event.target.classList.add('active');
}
</script>

</body>
</html>
