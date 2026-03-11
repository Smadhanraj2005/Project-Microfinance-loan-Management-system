<?php 

include_once 'connectdb.php';
session_start();

include_once 'header.php';


if(isset($_POST['btnsonchoyreg'])){


$kormionerinreghisab=$_POST['kormionerinreghisab_name'];
$kormionerinregno=$_POST['kormionerinregno_name'];
$kormionerinreggrahoknam=$_POST['kormionerinreggrahoknam_name'];
$kormionerinreggrahokpitarnam=$_POST['kormionerinreggrahokpitarnam_name'];
$kormionerinreggrahokmatarnam=$_POST['kormionerinreggrahokmatarnam_name'];
$kormionerinreggrahoksamirnam=$_POST['kormionerinreggrahoksamirnam_name'];
$kormionerinreggrahokmobile=$_POST['kormionerinreggrahokmobile_name'];
$kormionerinreggrahoknid=$_POST['kormionerinreggrahoknid_name'];
$kormionerinreggrahokaddress=$_POST['kormionerinreggrahokaddress_name'];
$kormionerinregdate=$_POST['kormionerinregdate_name'];
$kormionerinregnomineernam=$_POST['kormionerinregnomineernam_name'];
$kormionerinregnomineerpitarnam=$_POST['kormionerinregnomineerpitarnam_name'];
$kormionerinregnomineermatarnam=$_POST['kormionerinregnomineermatarnam_name'];
$kormionerinregnomineersamirnam=$_POST['kormionerinregnomineersamirnam_name'];
$kormionerinregnomineermobile=$_POST['kormionerinregnomineermobile_name'];
$kormionerinregnomineernid=$_POST['kormionerinregnomineernid_name'];
$kormionerinregnomineeraddress=$_POST['kormionerinregnomineeraddress_name'];
$kormionerinregamount=$_POST['kormionerinregamount_name'];


$f_name= $_FILES['myfile']['name'];
$f_tmp = $_FILES['myfile']['tmp_name'];


$f_size = $_FILES['myfile']['size'];
$f_extension = explode('.',$f_name);
$f_extension= strtolower(end($f_extension));

$f_newfile = uniqid().'.'.$f_extension;
$store = "productimages/".$f_newfile;


if($f_extension=='jpg' || $f_extension=='jpeg' || $f_extension=='png' || $f_extension=='gif'){

    if($f_size>=1000000){

        //echo 'Max file should be 1MB';

        $error = '<script type="text/javascript">
        jQuery(function validation(){

        swal({
            title: "Error!",
            text: "only jpg, jpeg, png and gif can be upload!",
            icon: "warning",
            button: "Ok",
        });

        });
        </script>';

        echo $error;

    }else{

        if(move_uploaded_file($f_tmp,$store)){

            $productimage=$f_newfile;

        }

    }

}else{

    //echo 'only jpg png and gif can be upload';

    $error = '<script type="text/javascript">
        jQuery(function validation(){

        swal({
            title: "Warning!",
            text: "only jpg, jpeg, png and gif can be upload!",
            icon: "error",
            button: "Ok",
        });

        });
        </script>';

        echo $error;

}


if(!isset($error)){

    $insert=$pdo->prepare("INSERT INTO tbl_kormione_rin_registration(kormionerinreghisab,kormionerinregno,kormionerinreggrahoknam,kormionerinreggrahokpitarnam,kormionerinreggrahokmatarnam,kormionerinreggrahoksamirnam,kormionereggrahokmobile,kormionerinreggrahoknid,kormionerinreggrahokaddress,kormionerinregdate,kormionerinregnomineernam,kormionerinregnomineerpitarnam,kormionesonchoyregnomineermatarnam,kormionerinregnomineersamirnam,kormionerinregnomineermobile,kormionerinregnomineernid,kormionerinregnomineeraddress,kormionerinregamount,kormionerinregimag) VALUES(:kormionerinreghisab,:kormionerinregno,:kormionerinreggrahoknam,:kormionerinreggrahokpitarnam,:kormionerinreggrahokmatarnam,:kormionerinreggrahoksamirnam,:kormionereggrahokmobile,:kormionerinreggrahoknid,:kormionerinreggrahokaddress,:kormionerinregdate,:kormionerinregnomineernam,:kormionerinregnomineerpitarnam,:kormionesonchoyregnomineermatarnam,:kormionerinregnomineersamirnam,:kormionerinregnomineermobile,:kormionerinregnomineernid,:kormionerinregnomineeraddress,:kormionerinregamount,:kormionerinregimag)");


    $insert->bindParam(':kormionerinreghisab',$kormionerinreghisab);
    $insert->bindParam(':kormionerinregno',$kormionerinregno);
    $insert->bindParam(':kormionerinreggrahoknam',$kormionerinreggrahoknam);
    $insert->bindParam(':kormionerinreggrahokpitarnam',$kormionerinreggrahokpitarnam);
    $insert->bindParam(':kormionerinreggrahokmatarnam',$kormionerinreggrahokmatarnam);
    $insert->bindParam(':kormionerinreggrahoksamirnam',$kormionerinreggrahoksamirnam);
    $insert->bindParam(':kormionereggrahokmobile',$kormionerinreggrahokmobile);
    $insert->bindParam(':kormionerinreggrahoknid',$kormionerinreggrahoknid);
    $insert->bindParam(':kormionerinreggrahokaddress',$kormionerinreggrahokaddress);
    $insert->bindParam(':kormionerinregdate',$kormionerinregdate);
    $insert->bindParam(':kormionerinregnomineernam',$kormionerinregnomineernam);
    $insert->bindParam(':kormionerinregnomineerpitarnam',$kormionerinregnomineerpitarnam);
    $insert->bindParam(':kormionesonchoyregnomineermatarnam',$kormionerinregnomineermatarnam);
    $insert->bindParam(':kormionerinregnomineersamirnam',$kormionerinregnomineersamirnam);
    $insert->bindParam(':kormionerinregnomineermobile',$kormionerinregnomineermobile);
    $insert->bindParam(':kormionerinregnomineernid',$kormionerinregnomineernid);
    $insert->bindParam(':kormionerinregnomineeraddress',$kormionerinregnomineeraddress);
    $insert->bindParam(':kormionerinregamount',$kormionerinregamount);
    $insert->bindParam(':kormionerinregimag',$productimage);

    if($insert->execute()){

        //echo 'Registration Successfull';

    $error = '<script type="text/javascript">
        jQuery(function validation(){

        swal({
            title: "Registration Successfull!",
            text: "Registration Added!",
            icon: "success",
            button: "Ok",
        });

        });
        </script>';

        echo $error;

    }else{

        //echo 'Add registration fail';

    $error = '<script type="text/javascript">
        jQuery(function validation(){

        swal({
            title: "Error!",
            text: "Add registration fail!",
            icon: "error",
            button: "Ok",
        });

        });
        </script>';

        echo $error;


    }


}





}



?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Loan Registration Form 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

        <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"><a href="kormocharione_rinreg_report.php" class="btn btn-success" role="button">Loan Registration</a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form action="" method="post" name="kormione_form_name" enctype="multipart/form-data">
            
              <div class="box-body">

                

                    <div class="col-md-6">

                <div class="form-group">
                  <label>Loan Customer Account</label>
                  <select class="form-control" name="kormionerinreghisab_name" required>
                    <option>Daily Calculation</option>
                    <option>Weekly Calculation</option>
                    <option>Monthly Account </option>
                  </select>
                </div>

                <div class="form-group">
                  <label >Loan Registration Number</label>
                  <input type="number" min="1" step="1" class="form-control" name="kormionerinregno_name" placeholder="Enter..." required>
                </div>

                <div class="form-group">
                  <label >Customer Name</label>
                  <input type="text" class="form-control" name="kormionerinreggrahoknam_name" placeholder="Enter..." required>
                </div>

                <div class="form-group">
                  <label >Father Name</label>
                  <input type="text" class="form-control" name="kormionerinreggrahokpitarnam_name" placeholder="Enter..." required>
                </div>

                <div class="form-group">
                  <label >Mother Name</label>
                  <input type="text" class="form-control" name="kormionerinreggrahokmatarnam_name" placeholder="Enter..." required>
                </div>

                <div class="form-group">
                  <label >Spouse</label>
                  <input type="text" class="form-control" name="kormionerinreggrahoksamirnam_name" placeholder="Enter..." required>
                </div>

                <div class="form-group">
                  <label >Mobile Number</label>
                  <input type="number" min="1" step="1" class="form-control" name="kormionerinreggrahokmobile_name" placeholder="Enter..." required>
                </div>

                <div class="form-group">
                  <label >National Identity Csrd/Birth Registration Number</label>
                  <input type="number" min="1" step="1" class="form-control" name="kormionerinreggrahoknid_name" placeholder="Enter..." required>
                </div>

                <div class="form-group">
                  <label >Address</label>
                  <input type="text" class="form-control" name="kormionerinreggrahokaddress_name" placeholder="Enter..." required>
                </div><hr>

                <!-- <div class="form-group">
                  <label >Name</label>
                  <input type="text" class="form-control" name="txtname" placeholder="Enter..." required>
                </div>

                <div class="form-group">
                  <label >NUMBER</label>
                  <input type="number" class="form-control" name="txtemail" placeholder="Enter..." required>
                </div>
            
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="txtselect_option" required>
                    <option value="" disabled selected>Select role</option>         
                    <option>User</option>
                    <option>Admin</option>
                  </select>
                </div> -->

                    </div>

                    <div class="col-md-6">

                    <div class="form-group">
                        <label>Date:</label>

                        <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar" style="color: red;"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" name="kormionerinregdate_name" value="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd" >
                        </div>
                        <!-- /.input group -->
                    </div>

                    <div class="form-group">
                        <label >Nominee Name</label>
                        <input type="text" class="form-control" name="kormionerinregnomineernam_name" placeholder="Enter..." required>
                    </div>

                    <div class="form-group">
                        <label >Nominee's Father name</label>
                        <input type="text" class="form-control" name="kormionerinregnomineerpitarnam_name" placeholder="Enter..." required>
                    </div>

                    <div class="form-group">
                        <label >Nominee's Mother Name</label>
                        <input type="text" class="form-control" name="kormionerinregnomineermatarnam_name" placeholder="Enter..." required>
                    </div>

                    <div class="form-group">
                        <label >Nominee's Spouse Name</label>
                        <input type="text" class="form-control" name="kormionerinregnomineersamirnam_name" placeholder="Enter..." required>
                    </div>

                    <div class="form-group">
                        <label >Nominee's Mobile Number</label>
                        <input type="number" min="1" step="1" class="form-control" name="kormionerinregnomineermobile_name" placeholder="Enter..." required>
                    </div>

                    <div class="form-group">
                        <label >Nominee's National Identity Card/Birth Registration Number</label>
                        <input type="number" min="1" step="1" class="form-control" name="kormionerinregnomineernid_name" placeholder="Enter..." required>
                    </div>

                    <div class="form-group">
                        <label >Nominee's Address</label>
                        <input type="text" class="form-control" name="kormionerinregnomineeraddress_name" placeholder="Enter..." required>
                    </div><hr>

                    <div class="form-group" style="display:none;">
                        <label >Deposits Amount</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                            <!-- <i class="fa fa-usd"></i> -->
                            <i class="" style="color: red;">৳</i>
                        </div>

                        <input type="number" min="1" step="1" class="form-control" name="kormionerinregamount_name" placeholder="Enter..." >
                    </div>
                        
                    </div>

                    <!-- <div class="form-group">
                        <label >Name</label>
                        <input type="text" class="form-control" name="txtname" placeholder="Enter..." required>
                    </div>

                    <div class="form-group">
                        <label >NUMBER</label>
                        <input type="number" class="form-control" name="txtemail" placeholder="Enter..." required>
                    </div> -->

                    <div class="form-group">
                        <label >Customer Image</label>
                        <input style="color: red;" type="file" class="input-group" name="myfile" required>
                        <p>Send Image</p>
                    </div>
                    

                    </div>

                

            </div>

            <div class="box-footer">
                

                <button type="submit" class="btn btn-success" name="btnsonchoyreg">SUBMIT</button>

            </div>

            </form>

        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php 

 include_once 'footer.php';

 ?>