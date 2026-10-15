

   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



  



    <!-- Content Header (Page header) -->



    <section class="content-header">



      <h1 align="center">B2B TAX PERCENTAGE WISE<small>Preview</small></h1>



      



      <ol class="breadcrumb">



        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>



        <li><a href="#">B2B TAX PERCENTAGE WISE</a></li>



      </ol>



    </section><br>



  <style>

 

  table, td, th {

  border: 1px solid #cac6c6;

}



#example2 {

  border-collapse: separate;

}

  </style>



    <!-- Main content -->



    <section class="content">

      

		<div class="row">

        <div class="col-xs-12">

          <div class="box">

            <div class="box-header">

              <h3 class="box-title">B2B TAX PERCENTAGE WISE</h3>

			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	





              <div class="box-tools">

                <!--<div class="input-group input-group-sm" style="width: 150px;">

                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">



                  <div class="input-group-btn">

                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>

                  </div>

                </div>-->

              </div>

            </div>

            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding">

            <table id="example2" class="table table-hover">

           

         
            <thead>
              <tr>

              <th>SL NO</th>

              <th>TAX %</th>

              <th>DATE</th>

              <th>TAXABLE VALUE</th>

              <th>SGST</th>

              <th>CGST</th>

              <th>IGST</th>

              <th>TOTAL GST</th>

              <th>CESS</th>

              <th>OTHER CHARGES</th>

              <th>DISCOUNT</th>

              <th>TOTAL </th>

              </tr>
              </thead>
              

               <tbody>

               <tr>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               </tr>

               <tr>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               </tr>

               <tr>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               </tr>

               <tr>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               </tr>

               <tr>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               <td></td>

               </tr>

             

               </tbody>

            

            </table>

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

        </div>

		</div>

		

     

    </section>





<script>



  function deletechecked(){



  if(confirm("Do you really want to delete this apartment?")){







return true;







  } 



  else{



    



    return false;



  }



    



  }



  



 



  



  </script>



<!-- jQuery 3 -->



<script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/jquery.min.js"></script>



<!-- Bootstrap 3.3.7 -->



<script src="<?php echo base_url();?>admin_styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>



<!-- FastClick -->



<script src="<?php echo base_url();?>admin_styles/bower_components/fastclick/lib/fastclick.js"></script>



<!-- AdminLTE App -->



<script src="<?php echo base_url();?>admin_styles/dist/js/adminlte.min.js"></script>



<!-- AdminLTE for demo purposes -->



<script src="<?php echo base_url();?>admin_styles/dist/js/demo.js"></script>







<script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/dbjs/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>

<script>

  $(function () {

    $('#example2').DataTable({

       dom: 'Bfrtip',

        buttons: [

            'excelHtml5',

            'csvHtml5'

        ]

    })

  })

</script>



</body>



</html>



