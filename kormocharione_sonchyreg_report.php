<?php 

include_once 'connectdb.php';
session_start();

if($_SESSION['useremail']=="" OR $_SESSION['role']==""){

  header('location:index.php');

}


include_once 'header.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Savings Registration report 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li class="active"></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->


        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Savings Registration</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">

              <div style="overflow-x:auto;">
              <table id="kormionesonchoyreg" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Customer photo</th>
                            <th>Savings Customer Account</th>
                            <th>Registration number</th>
                            <th>Customer Name</th>
                            <th>Father's Name</th>
                            <th>Mother's Name</th>
                            <th>Husband/Wife Name</th>
                            <th>Mobile No</th>
                            <th>National Identity Card/Birth Registration Number</th>
                            <th>Address</th>  
                            <th>Nominee's Name</th>
                            <th>Nominee Name</th>
                            <th>Nominee's Father Name</th>
                            <th>Nominee's Mother Name</th>
                            <th>Nominee's Spouse name</th>
                            <th>Nominee's National Identity Card/Birth Registration Number</th>
                            <th>Nominee's Address</th>
                                                     
                            
                            <th>View</th>
                            <th>Edit</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php 
                    $select=$pdo->prepare("SELECT * FROM tbl_kormione_sonchoy_registration ORDER BY id DESC");
                    $select->execute();

                    while($row=$select->fetch(PDO::FETCH_OBJ)){

                        echo'
                        <tr>
                        <td>'.$row->id.'</td>   
                        <td>'.$row->kormioneregdate.'</td>
                        <td><img src="productimages/'.$row->kormionesonchoyregimag.'" class="img-rounded" width="40px" height="40px"/></td>
                        <td>'.$row->kormionesonchoyreghisab.'</td>
                        <td>'.$row->kormionesonchoyregno.'</td>
                        <td>'.$row->kormionesonchoyreggrahoknam.'</td>
                        <td>'.$row->kormionesonchoyreggrahokpitarnam.'</td>
                        <td>'.$row->kormionesonchoyreggrahokmatarnam.'</td>
                        <td>'.$row->kormionesonchoyreggrahoksamirnam.'</td>
                        <td>'.$row->kormionesonchoyreggrahokmobile.'</td>
                        <td>'.$row->kormionesonchoyreggrahoknid.'</td>
                        <td>'.$row->kormionesonchoyreggrahokaddress.'</td>
                        <td>'.$row->kormionesonchoyregnomineernam.'</td>
                        <td>'.$row->kormionesonchoyregnomineerpitarnam.'</td>
                        <td>'.$row->kormionesonchoyregnomineermatarnam.'</td>
                        <td>'.$row->kormionesonchoyregnomineersamirnam.'</td>
                        <td>'.$row->kormionesonchoyregnomineermobile.'</td>
                        <td>'.$row->kormionesonchoyregnomineernid.'</td>
                        <td>'.$row->kormionesonchoyregnomineeraddress.'</td>
                        

                        <td>
                        <a href="#" class="btn btn-success" role="button"><span class="glyphicon glyphicon-eye-open" title="delete"></span></a>
                        </td>

                        <td>
                        <a href="#" class="btn btn-info" role="button"><span class="glyphicon glyphicon-edit" title="delete"></span></a>
                        </td>

                        <td>
                        <a href="#" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-trash" title="delete"></span></a>
                        </td>
  
                        </tr> 
                        ';

                    }



                    ?>

                    </tbody>
                </table>
                </div>

              </div>
        </div>




    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    $(document).ready(function(){
       $('#kormionesonchoyreg').DataTable(); 
    });
</script>

 <?php 

 include_once 'footer.php';

 ?>