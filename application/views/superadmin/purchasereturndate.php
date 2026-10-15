
   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">PURCHASE RETURN REPORT (DATE WISE)<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">PURCHASE RETURN REPORT (DATE WISE)</a></li>

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
              <h3 class="box-title">PURCHASE RETURN REPORT (DATE WISE)</h3>
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
			
                <tr>

                  <?php echo form_open_multipart('purchasereturndate');?>
                  <th colspan="3">
                  <input type="date" class="form-control" name="from">
                  <input type="date" class="form-control" name="to">
                  <button type="submit" class="btn btn-sm btn-success" name="filter">Search</button>
                  <a href="<?php echo base_url('purchasereturndate');?>"><button type="button" class="btn btn-sm btn-success" name="filter">Refresh</button></a>
                  </th>
				          <th colspan="5"></th>
                  <th colspan="2">Total: <?php 
              $total=0;
              foreach($purchasereturngst as $key){ $total+=$key->purreturn_trans_total; }?></th>
                  <th colspan="3"><?php echo $total;?></th>
				 
				
                  
                </tr>
                <tr>
                
                <th rowspan="2">SL.NO</th>
                <th rowspan="2">DATE</th>
                <th rowspan="2">DEBIT NOTE NO</th>
                
                <th rowspan="2">SUPPLIER NAME</th>
                <th rowspan="2">PRODUCT DETAILS</th>
                <th rowspan="2">QUANTITY</th>
                <th rowspan="2">RATE</th>
                <th rowspan="2">TAXABLE VALUE</th>
                <th rowspan="2">TAX %</th>
                <th rowspan="2">TAX </th>
               
                <th rowspan="2">TOTAL AMOUNT</th>
                </tr>
              
               
				
				<tbody>
          <?php $i=1;foreach($purchasereturngst as $key){?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td><?php echo $key->purreturn_master_date;?></td>
				   <td><?php echo $key->purreturn_master_debitno;?></td>
					
					  <td><?php echo $key->sup_name;?></td>
            <td><?php echo $key->itm_name;?></td>
				  <td><?php echo $key->purreturn_trans_qty;?></td>
				   <td><?php echo $key->purreturn_trans_rate;?></td>
					 <td><?php echo $key->purreturn_trans_taxable_value;?></td>
					  <td><?php echo $key->purreturn_trans_gst_percentage;?></td>
					  <td><?php echo $key->purreturn_trans_gst_amount;?></td>
					 
                      <td><?php echo $key->purreturn_trans_total;?></td>
					          
                  
                </tr>
                <?php $i++; } ?>
				
               
				
				
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

