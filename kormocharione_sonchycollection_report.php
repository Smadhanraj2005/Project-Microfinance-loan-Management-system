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
      Lender Accumulation Collection Report
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
              <h3 class="box-title">Savings Collection Report</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">

              <div class="box-body">

              <div style="overflow-x:auto;">
              <table id="kormionesonchoycoll" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Customer mu</th>
                            <th>Customer Mobile Mong</th>
                            <th>Money Deposit</th>
                                                     
                            
                            <th>View</th>
                            <th>Edit</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php 
                    $select=$pdo->prepare("SELECT * FROM tbl_kormione_sonchoy_collection ORDER BY id DESC");
                    $select->execute();

                    while($row=$select->fetch(PDO::FETCH_OBJ)){

                        echo'
                        <tr>
                         
                        <td>'.$row->reg_no.'</td>
                        <td>'.$row->date.'</td>
                        <td>'.$row->grahok_nam.'</td>
                        <td>'.$row->mobile.'</td>
                        <td>'.$row->amount_deposit.'</td>
                        
                        

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
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    $(document).ready(function(){
       $('#kormionesonchoycoll').DataTable(); 
    });
</script>

 <?php 

 include_once 'footer.php';

 ?>