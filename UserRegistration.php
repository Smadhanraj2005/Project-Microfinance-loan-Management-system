<?php
include_once 'connectdb.php';
session_start();

if ($_SESSION['useremail'] == "") {
    header('location:index.php');
    exit;
}

$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$useremail = $_SESSION['useremail'];
$message = '';

// File upload function
function uploadFile($fieldName, $uploadDir, $allowedTypes, $maxFileSize) {
    if (!isset($_FILES[$fieldName])) return '';

    $file = $_FILES[$fieldName];
    $fileName = basename($file['name']);
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $targetFile = $uploadDir . uniqid() . '_' . $fileName;

    if (!in_array($fileExt, $allowedTypes)) return '';
    if ($file['size'] > $maxFileSize) return '';

    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        return $targetFile;
    }
    return '';
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf'];
    $maxFileSize = 5 * 1024 * 1024;

    // Personal info
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];

    // File uploads
    $aadhar = uploadFile('aadhar_card', $uploadDir, $allowedTypes, $maxFileSize);
    $pan = uploadFile('pan_card', $uploadDir, $allowedTypes, $maxFileSize);
    $address_proof = uploadFile('address_proof', $uploadDir, $allowedTypes, $maxFileSize);
    $passport_photo = uploadFile('passport_photo', $uploadDir, $allowedTypes, $maxFileSize);

    if ($aadhar && $pan && $address_proof && $passport_photo) {
        $stmt = $pdo->prepare("INSERT INTO kyc_documents (
            user_email, first_name, last_name, email, phone, gender, dob, address,
            city, state, pincode, aadhar_card, pan_card, address_proof, passport_photo
        ) VALUES (
            :useremail, :fname, :lname, :email, :phone, :gender, :dob, :address,
            :city, :state, :pincode, :aadhar, :pan, :address_proof, :passport_photo
        )");

        $stmt->execute([
            ':useremail' => $useremail,
            ':fname' => $fname,
            ':lname' => $lname,
            ':email' => $email,
            ':phone' => $phone,
            ':gender' => $gender,
            ':dob' => $dob,
            ':address' => $address,
            ':city' => $city,
            ':state' => $state,
            ':pincode' => $pincode,
            ':aadhar' => $aadhar,
            ':pan' => $pan,
            ':address_proof' => $address_proof,
            ':passport_photo' => $passport_photo
        ]);

        $message = "✅ KYC Registration Successful!";
    } else {
        $message = "❌ Error uploading documents. Please check file size/type.";
    }
}

include_once 'header_kormocharitwo.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Registration & KYC</title>
  <style>
    .main-content-wrapper {
  margin-left: 230px; /* space for sidebar */
  padding: 20px;
  min-height: 100vh;
  background-color: #f9fafb; /* LIGHT color */
  box-sizing: border-box;
}
    body { font-family: sans-serif; background: #f5f5f5; }
    .container {
      max-width: 900px; margin: 50px auto; background: white; border-radius: 10px;
      padding: 25px; box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }
    .tabs { display: flex; gap: 10px; margin-bottom: 20px; }
    .tabs button {
      border: none; background: #f2f4f7; padding: 10px 15px;
      border-radius: 6px; cursor: pointer;
    }
    .tabs button.active { background-color: #e1e5ef; font-weight: bold; }
    .form-section { display: none; }
    .form-section.active { display: block; }
    .form-grid {
      display: grid; grid-template-columns: 1fr 1fr; gap: 15px;
    }
    .form-group { display: flex; flex-direction: column; }
    label { font-size: 14px; margin-bottom: 5px; }
    input, select, textarea {
      padding: 10px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px;
    }
    textarea { resize: none; }
    .full-width { grid-column: span 2; }
    .submit-btn {
      background-color: #00b386; color: white; padding: 10px 20px;
      font-size: 15px; border: none; border-radius: 8px;
      cursor: pointer; float: right; margin-top: 15px;
    }
    .upload-box {
      border: 2px dashed #ccc; border-radius: 10px; padding: 30px;
      text-align: center; color: #888;
    }
    .upload-box:hover { background-color: #f1f1f1; }
    .card-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .card { border: 1px solid #eee; padding: 15px; border-radius: 10px; }
    .message {
      background: #e0f7e9; padding: 10px; border-left: 5px solid #00b386;
      margin-bottom: 20px; font-weight: bold;
    }
  </style>
</head>
<body>
<div class="main-content-wrapper">
<div class="container">
  <h2>User Registration & KYC</h2>
  <?php if ($message): ?>
    <div class="message"><?= $message ?></div>
  <?php endif; ?>

  <div class="tabs">
    <button class="tab-btn active" onclick="showTab(0)">Personal Details</button>
    <button class="tab-btn" onclick="showTab(1)">KYC Documents</button>
  </div>

  <form method="post" enctype="multipart/form-data">
    <!-- Personal Details -->
    <div class="form-section active">
      <div class="form-grid">
        <div class="form-group"><label>First Name</label><input name="first_name" required></div>
        <div class="form-group"><label>Last Name</label><input name="last_name" required></div>
        <div class="form-group"><label>Email</label><input type="email" name="email" required></div>
        <div class="form-group"><label>Phone Number</label><input name="phone" required></div>
        <div class="form-group"><label>Gender</label>
          <select name="gender" required>
            <option value="">Select gender</option>
            <option>Male</option><option>Female</option><option>Other</option>
          </select>
        </div>
        <div class="form-group"><label>Date of Birth</label><input type="date" name="dob" required></div>
        <div class="form-group full-width"><label>Address</label><textarea name="address" required></textarea></div>
        <div class="form-group"><label>City</label><input name="city" required></div>
        <div class="form-group"><label>State</label><input name="state" required></div>
        <div class="form-group"><label>Pincode</label><input name="pincode" required></div>
      </div>
    </div>

    <!-- KYC Documents -->
    <div class="form-section">
      <div class="card-grid">
        <div class="card">
          <h4>Aadhar Card</h4>
          <div class="upload-box">
            📤 Upload<br>
            <input type="file" name="aadhar_card" required>
          </div>
        </div>
        <div class="card">
          <h4>PAN Card</h4>
          <div class="upload-box">
            📤 Upload<br>
            <input type="file" name="pan_card" required>
          </div>
        </div>
        <div class="card">
          <h4>Address Proof</h4>
          <div class="upload-box">
            📤 Upload<br>
            <input type="file" name="address_proof" required>
          </div>
        </div>
        <div class="card">
          <h4>Passport Size Photo</h4>
          <div class="upload-box">
            📤 Upload<br>
            <input type="file" name="passport_photo" required>
          </div>
        </div>
      </div>
    </div>

    <button type="submit" class="submit-btn">Submit</button>
  </form>
</div>
</div>
<script>
  function showTab(index) {
    const tabs = document.querySelectorAll(".tab-btn");
    const sections = document.querySelectorAll(".form-section");
    tabs.forEach((tab, i) => {
      tab.classList.toggle("active", i === index);
      sections[i].classList.toggle("active", i === index);
    });
  }
</script>
</body>
</html>
