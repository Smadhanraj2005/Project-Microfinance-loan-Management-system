<?php 

include_once 'connectdb.php';
session_start();


function fill_product($pdo){

$output='';
$select=$pdo->prepare("SELECT * FROM tbl_kormione_sonchoy_registration ORDER BY kormionesonchoyregno ASC");
$select->execute();
$result=$select->fetchAll();

foreach($result as $row){

  $output.='<option value="'.$row["id"].'">'.$row["kormionesonchoyregno"].'</option>';

}

  return $output;

}




include_once 'header.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Savings Collection Form 
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
        <form action="" method="post" name="">

            <div class="box-header with-border">
              <h3 class="box-title">Savings Collection Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">


                <div class="col-md-6">

                <div class="form-group">
                  <label >Lender Name</label>

                    <div class="input-group ">
                        <div class="input-group-addon">
                            <i class="fa fa-user" style="color: red;"></i>
                        </div>
                  <input type="text"  class="form-control" name="kormionesonchoykorminam_name" placeholder="Enter Employee Name..." required>
                    </div>
                </div>


                </div>

                <div class="col-md-6">

                  <div class="form-group">
                        <label>Date:</label>

                        <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar" style="color: red;"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" name="kormionesoncoldate_name" value="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd" >
                        </div>
                        <!-- /.input group -->
                    </div>

                </div>
              
              </div>


              <div class="box-body">

                <div class="col-md-12">

                <div style="overflow-x:auto;">
                <table id="kormionesontable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Customer Account</th>
                            <th>Registration Number</th>
                            <th>Customer Name</th>
                            <th>Customer Mobile Number</th>
                            <th>Amount Deposit</th>                              
                            <th>
                            <center>
                            <button type="button" name="add" class="btn btn-success btn-sm btnadd" ><span class="glyphicon glyphicon-plus" ></span></button>  
                            </center>

                            </th>
                            
                        </tr>
                    </thead>

                </table>
                </div>

                </div>

              </div>

              <div class="box-body"></div>

              <hr>

              <div align="center">

                  <input type="submit" name="btnsubmit" value="Submit" class="btn btn-info" id="submitbtn">

              </div>

              <hr>

              </form>

          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
      $('#datepicker').datepicker({
      autoclose: true
    });

    $(document).ready(function(){

      $(document).on('click','.btnadd',function(){

        var html='';
        html+='<tr>';

        html+='<td><input type="text"  class="form-control grahokhisabsearch_cl" name="grahokhisabsearch_name[]" readonly></td>';

        html+='<td><select class="form-control regnosearch_cl" name="regnosearch_name[]" style="width: 250px"; required><option value="">Select Option</option><?php echo fill_product($pdo); ?></select></td>';

        html+='<td><input type="text"  class="form-control grahoknamsearch_cl" name="grahoknamsearch_name[]" readonly></td>';

        html+='<td><input type="text"  class="form-control grahokmob_cl" name="grahokmob_name[]" readonly></td>';

        html+='<td><input type="number" min="1" step="1" class="form-control depositsearch_cl" name="depositsearc_name[]" required></td>';

        html+='<td><center><button type="button" name="remove" class="btn btn-danger btn-sm btremove" ><span class="glyphicon glyphicon-remove" ></span></button></center></td>';

        $('#kormionesontable').append(html);


        //Initialize Select2 Elements
        $('.regnosearch_cl').select2()



        $(".regnosearch_cl").on('change',function(e){

          var registerno = this.value;
          var tr=$(this).parent().parent();

          $.ajax({

            url:"getregno.php",
            method:"get",
            data:{id:registerno},
            success:function(data){

              //console.log(data);

              tr.find(".grahoknamsearch_cl").val(data["kormionesonchoyreggrahoknam"]);
              tr.find(".grahokhisabsearch_cl").val(data["kormionesonchoyreghisab"]);
              tr.find(".grahokmob_cl").val(data["kormionesonchoyreggrahokmobile"]);
              tr.find(".depositsearch_cl").val();
              



            }

          });


        });


      }); // btnadd end here


      $(document).on('click','.btremove',function(){

        $(this).closest('tr').remove();

      }); // btnremove end here



// --------------------------



      // $("#kormionesontable").delegate(".depositsearch_cl","keyup change" ,function(){

      //   var deposits = $(this);
      //   var tr=$(this).parent().parent();

      //   if( (deposits.val()-0)>(tr.find(".amountbssearch_cl").val()-0) ){

      //     swal("WARNING!","SORRY! This much of amount is not available","warning");

      //     deposits.val(1);

      //     tr.find(".amountbssearch_cl").val(tr.find(".depositsearch_cl") - deposits.val());

      //   }else{

      //     tr.find(".amountbssearch_cl").val(tr.find(".depositsearch_cl") - deposits.val());

      //   }


      // });


      // function calculate(){


        
      // }



// ----------------------------



    });

  </script>

 <?php 

 include_once 'footer.php';

 ?>