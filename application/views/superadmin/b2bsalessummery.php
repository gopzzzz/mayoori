

   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



  




    <section class="content-header">



      <h1 align="center">B2B SALES SUMMERY<small>Preview</small></h1>



      



      <ol class="breadcrumb">



        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>



        <li><a href="#">B2B SALES SUMMERY</a></li>



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

    
<style>
p a {
    color: #3c8dbc;
    padding: 11px;
    border: 1px solid #3c8dbc;
    background-color: #3c8dbc;
    color: white;
}
b, strong {
    font-weight: 700;
    margin: 10px;
}
</style>



    <!-- Main content -->



    <section class="content">

      

		<div class="row">

        <div class="col-xs-12">

          <div class="box">

            <div class="box-header">

              <h3 class="box-title">B2B SALES SUMMERY</h3>

			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	





              <div class="box-tools">

              <div class="input-group input-group-sm" style="width: 150px;">

                <form method="POST" action="">
                  <input type="date" name="fdate" class="form-control pull-right" value=""/>
                  <input type="date" name="tdate" class="form-control pull-right" value=""/>



                   <div class="input-group-btn">

                    <button type="submit" name="filter" class="btn btn-default">Filter</button>

                  </div> 
                  </form>

                </div>

              </div>

            </div>

            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding">

            <a href="<?php echo base_url('b2bsalessummery');?>"><button type="button" class="btn btn-success btn-sm">REFRESH</button></a>
            <a href="<?php echo base_url('b2bexportsale');?>"><button type="button" name="filter" class="btn btn-default">EXPORT</button></a>
            <table  class="table table-hover">
          

             

         
            <thead>
              <tr>

              <th>SL NO</th>

              <th>DATE</th>

              <th>BILL NO</th>

              <th>TAXALE</th>

              <th>GST</th>

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
              
              <th>Total:</th>
              <td><?php echo $grandsum->b2bsum;?></td>
            </tr>
           
               <?php 
                $i=1;
                foreach($b2bsalessummery as $key){
              ?>
               <tr>

               <td><?php echo $i;?></td>

               <td><?php echo date("d-m-Y",strtotime($key->billing_master_billdate));?></td>

               <td><?php echo $key->billing_master_billno	;?></td>

               <td><?php echo $key->billing_master_tot_taxable_amount	;?></td>

               <td><?php echo $key->billing_master_tot_gst_amount;?></td>

               <td><?php echo $key->billing_master_delivery_charge	;?></td>

               <td><?php echo $key->billing_master_discount	;?></td>

               <td><?php echo $key->billing_master_grandtotal	;?></td>

              

               </tr>

               <?php
                $i++;
                }
              ?>

              

             

               </tbody>

            

            </table>
            <p><?php echo $links; ?></p>

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


  $(document).ready(function(){
	
});

</script>



</body>



</html>



