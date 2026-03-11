
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>

  <script src="bower_components/sweetalert/sweetalert.js"></script>

  <!-- DataTables -->
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  


  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">


  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- date-range-picker -->
  <script src="bower_components/moment/min/moment.min.js"></script>
  <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <style>
  html, body {
    height: 100%;
    margin: 0;
    background-color: #f4f6f9;
    font-family: 'Segoe UI', sans-serif;
  }

  .wrapper,
  .content-wrapper {
    background-color: #f4f6f9 !important;
  }

  .content-wrapper {
    min-height: 100vh;
    margin-left: 230px;
    padding: 20px;
    transition: all 0.3s ease;
  }

  .main-header,
  .main-sidebar,
  .logo,
  .navbar {
    background-color: #3c8dbc !important;
    border: none;
  }

  .main-sidebar {
    width: 230px;
    border-right: 1px solid #ddd;
    box-shadow: none !important;
    transition: all 0.3s ease;
  }

  .sidebar {
    padding: 0;
    list-style-type: none;
   
    height: 100vh;
    overflow-y: auto;
  }

  .sidebar li {
    border-bottom: 1px solid #f1f1f1;
  }

  .sidebar li a {
    display: flex;
    align-items: center;
    padding: 13px 20px;
    color: #2c3e50;
    font-size: 15px;
    font-weight: 500;
    text-decoration: none;
    transition: background 0.3s, padding-left 0.3s;
  }

  .sidebar li a i {
    margin-right: 12px;
    font-size: 16px;

    width: 20px;
    text-align: center;
  }

  .sidebar li a:hover {
    background-color: #ecf0f1;
    color: #000;
    padding-left: 25px;
  }

  .sidebar li a.active {
    background-color: #d0e6f6;
    font-weight: bold;
    color: #000;
  }

  .logo-lg,
  .logo-mini {
    color: white !important;
    font-weight: bold;
  }

  
  .user-panel {
    padding: 10px 15px;
    border-bottom: 1px solid #eee;
    margin-bottom: 10px;
  }

  .user-panel .image img {
    width: 35px;
    height: 35px;
    object-fit: cover;
  }

  .user-panel .info p {
    margin: 5px 0 0;
    font-weight: 600;
  }

  .user-panel .info a {
    font-size: 12px;
    color: #27ae60;
  }

  .user-panel > .info > p,
  .user-panel > .info > a {
    color: white !important;
  }

  .user-header,
  .user-footer {
    background-color: #3c8dbc !important;
    color: white;
  }

  .dropdown-menu > li > a {
    color: #333 !important;
  }

  /* Optional: Scrollbar for sidebar */
  .sidebar::-webkit-scrollbar {
    width: 6px;
  }

  .sidebar::-webkit-scrollbar-thumb {
    background-color: #ccc;
    border-radius: 3px;
  }

  /* Responsive Fix */
  @media (max-width: 768px) {
    .main-sidebar {
      position: relative;
      height: auto;
    }

    .sidebar {
      height: auto;
    }

    .content-wrapper {
      margin-left: 0;
    }
  }
</style>



</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>Date</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Micro </b>Finance</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="https://cdn.pixabay.com/photo/2016/09/16/09/21/money-1673582_960_720.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="https://cdn.pixabay.com/photo/2016/09/16/09/21/money-1673582_960_720.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['useremail']; ?>
                  <small>Member since Nov. 2021</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="https://cdn.pixabay.com/photo/2016/09/16/09/21/money-1673582_960_720.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username']; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <!-- Optionally, you can add icons to the links -->
        <!-- <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li> -->
      
        <ul class="sidebar-menu">
  <li><a href="kormocharione_dashboard.php" class="active"><i class="fa fa-tachometer"></i> Dashboard</a></li>
  <li><a href="lenderview_applications.php"><i class="fa fa-file-text-o"></i> View Loan Applications</a></li>
  <li><a href="verify_loans.php"><i class="fa fa-check-square-o"></i> Verify & Approve Loans</a></li>
  <li><a href="disbursed_loans.php"><i class="fa fa-money"></i> Disbursed Loans</a></li>
  <li><a href="repayment_tracking.php"><i class="fa fa-line-chart"></i> Repayment Tracking</a></li>
  <li><a href="lender_profile.php"><i class="fa fa-user-circle"></i> My Profile</a></li>
  <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
</ul>

        
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>