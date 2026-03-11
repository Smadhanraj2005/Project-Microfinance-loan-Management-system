<?php 

include_once 'connectdb.php';
session_start();

include_once 'header.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Lender Loan Registration Report
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

        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Loan Registration Report</h3>
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
                            <th>Customer Photo</th>
                            <th>Savings Customer Account</th>
                            <th>Customer Registration Number</th>
                            <th>Customer Name</th>
                            <th>Father's Name</th>
                            <th>Mother's Name</th>
                            <th>Husband/Wife name</th>
                            <th>Mobile Number</th>
                            <th>National Identity Card/Birth Registration Number</th>
                            <th>Address</th>  
                            <th>Name of Nominee</th>
                            <th>Nominee's Father Name</th>
                            <th>Nominee's Mother Name</th>
                            <th>Nominee's Spouse Name</th>
                            <th>Nominee's Mobile Number</th>
                            <th>Nominee's National Identity Card/Birth Registration Number</th>
                            <th>Nominee's Address</th>
                                                     
                            
                            <th>View</th>
                            <th>Edit</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php 
                    $select=$pdo->prepare("SELECT * FROM tbl_kormione_rin_registration ORDER BY id DESC");
                    $select->execute();

                    while($row=$select->fetch(PDO::FETCH_OBJ)){

                        echo'
                        <tr>
                        <td>'.$row->id.'</td>   
                        <td>'.$row->kormionerinregdate.'</td>
                        <td><img src="productimages/'.$row->kormionerinregimag.'" class="img-rounded" width="40px" height="40px"/></td>
                        <td>'.$row->kormionerinreghisab.'</td>
                        <td>'.$row->kormionerinregno.'</td>
                        <td>'.$row->kormionerinreggrahoknam.'</td>
                        <td>'.$row->kormionerinreggrahokpitarnam.'</td>
                        <td>'.$row->kormionerinreggrahokmatarnam.'</td>
                        <td>'.$row->kormionerinreggrahoksamirnam.'</td>
                        <td>'.$row->kormionereggrahokmobile.'</td>
                        <td>'.$row->kormionerinreggrahoknid.'</td>
                        <td>'.$row->kormionerinreggrahokaddress.'</td>
                        <td>'.$row->kormionerinregnomineernam.'</td>
                        <td>'.$row->kormionerinregnomineerpitarnam.'</td>
                        <td>'.$row->kormionesonchoyregnomineermatarnam.'</td>
                        <td>'.$row->kormionerinregnomineersamirnam.'</td>
                        <td>'.$row->kormionerinregnomineermobile.'</td>
                        <td>'.$row->kormionerinregnomineernid.'</td>
                        <td>'.$row->kormionerinregnomineeraddress.'</td>
                        

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

 <?php 

 include_once 'footer.php';

 ?>