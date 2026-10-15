

   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



  



    <!-- Content Header (Page header) -->



    <section class="content-header">



      <h1 align="center">GST PURCHASE (DATE WISE)<small>Preview</small></h1>



      



      <ol class="breadcrumb">



        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>



        <li><a href="#">GST PURCHASE (DATE WISE)</a></li>



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

              <h3 class="box-title">GST PURCHASE (DATE WISE)</h3>

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

			 
              <?php echo form_open_multipart('gst_purchase_datewise');?>

                <tr style="border:1px solid black;">

				

                  <th colspan="2"><select name="tax" class="form-control">
                  <option value="">Select Tax</option>
                  <option value="0">0%</option>
                  <option value="5">5%</option>
                  <option value="12">12%</option>
                  <option value="18">18%</option>
                  <option value="28">28%</option>
                  </select>
                  <select name="hsncode" class="form-control">
                  <option value="">Select HSN</option>
                  <?php foreach($hsncode as $hsncode){?>
                  <option value="<?php echo $hsncode->hsn_id;?>"><?php echo $hsncode->hsn_code;?></option>
                 <?php } ?>
                  </select>
                </th>
				          <th colspan="4"><input type="date" class="form-control" name="from"><input type="date" class="form-control" name="to"></th>

                  <th colspan="3">
                  <button type="submit" name="filter" class="btn btn-sm btn-success" style="margin-left: 16px;margin-top: 2px;">Search</button>
                  <a href="<?php echo base_url('gst_purchase_datewise');?>" ><button  class="btn btn-sm btn-success" style="margin-left: 16px;margin-top: 2px;" >Refresh</button></a>
                </th>

                  <th colspan="5"></a></th>

				 

				

                  

                </tr>

                <tr>

                

                <th rowspan="2">SL.NO</th>

                <th rowspan="2">BILL DATE</th>

                <th rowspan="2">BILL NO</th>

                <th rowspan="2">SUPPLIER NAME</th>

                <th rowspan="2">GST NO</th>

                <th rowspan="2">TAXABLE VALUE</th>

                <th colspan="2">SGST</th>

                <th colspan="2">CGST</th>

                <th colspan="2">IGST</th>

                <th rowspan="2">TOTAL GST</th>

                <th rowspan="2">INVOICE AMT</th>



                </tr>

                <tr>

                <th>%</th>

                <th>AMOUNT</th>

                <th>%</th>

                <th>AMOUNT</th>

                <th>%</th>

                <th>AMOUNT</th>

                </tr>

               

			

				<tbody>
 <?php 
 $i=1;
 foreach($gstdatewisepurchase as $key){?>
                <tr>

              <td><?php echo $i;?></td>

                <td><?php echo $key->purchase_master_billdate;?></td>

                <td><?php echo $key->invoiceno	;?></td>

                <td><?php echo $key->sup_name	;?></td>

                  <td><?php echo $key->sup_gst;?></td>

                <td><?php echo $key->purchase_trans_rate	;?></td>

                <td><?php if($key->purchase_master_tax_type==1){echo $key->hsn_tax;}?></td>

                <td><?php if($key->purchase_master_tax_type==1){echo $key->purchase_trans_tax/2	;}?></td>

                <td><?php  if($key->purchase_master_tax_type==1){echo $key->hsn_tax;} ?></td>

                  <td><?php if($key->purchase_master_tax_type==1){echo $key->purchase_trans_tax/2	;}	;?></td>

                  <td><?php if($key->purchase_master_tax_type==2){echo $key->hsn_tax;} ?></td>

                  <td><?php if($key->purchase_master_tax_type==2){echo $key->purchase_trans_tax;}	?></td> 

                  <td><?php echo $key->purchase_trans_tax	;?></td>

                  <td><?php echo $key->purchase_trans_tot_amount	;?></td>           

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



