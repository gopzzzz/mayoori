<style>
	input[type=radio] {
    width: 17px;
    height: 17px;
}
</style>
  
  <?php $data['leftmenu'] = 'receiptandpayment'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Receipt and Payment<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'respay';?>">Receipt and Payment</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
		<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog" style="width:60%;">
						<!-- Modal content-->
						<?php echo form_open_multipart('respay');?>
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Receipt and Payment</h4>
							</div>
                             
							<div class="col-sm-4">
							<label class="exampleInputEmail1">REF NO:</label>
							<input type="text" class="form-control" name="refno" value="<?php foreach($recipay as $keybill){ if($keybill->mycount==0){echo "1";}else{foreach($last_bill_number as $keybill1){ echo $keybill1->reference_num+1; }} }?>">
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1">DATE</label>
							<input type="date" class="form-control" name="todaydate" required>
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1">PAYMENT/RECEIPT ON</label>
							<select class="form-control" name="payorrepton"><option value="1">Normal</option>
							<option value="2">Against Sale Bill</option>
							<option value="3">Against Perchase Bill</option></select>
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1" >TYPE</label>
							<select class="form-control" id="payment_type" name="type">
							<option value="0">select</option>
							<option value="1">Receipt</option>
							<option value="2">Payment</option></select>
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1">BILL NO / VOUCHER NO :</label>
							<input type="text" class="form-control" name="receipt" id="voucher_num">
							<input type="text" class="form-control" name="payment" id="payment" style="display: none;">
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1" >LEDGER AC</label>
							<select class="form-control" name="ledac"><option value="1">1</option></select>
							</div>
							
							<div class="col-sm-4">
							<label class="exampleInputEmail1" >TRANSACTION MODE</label>
							<select class="form-control" name="transmode"><option value="1">By Bank</option>
							<option value="2">By Cash</option></select>
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1">Bank Name</label>
							<select class="form-control"  name="bank"><option value="1">bank1</option>
							<option value="2">bank2</option></select>
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1">PERTICULARS</label>
							<textarea class="form-control" name="particulars"></textarea>
							</div>
							<div class="col-sm-12" style="margin-top: 20px;">
								<div class="col-sm-2">
								<button type="submit" name="submit" class="btn btn-primary btn-sm">SAVE & PRINT</button>
							</div>
							<div class="col-sm-1">
								<button type="button" class="btn btn-secondary btn-sm">SAVE</button>
							</div>
							<div class="col-sm-1">
								<button type="button" class="btn btn-success btn-sm">VIEW</button>
							</div>
							<div class="col-sm-1">
								<button type="button" class="btn btn-danger btn-sm">CLAR</button>
							</div>
							<div class="col-sm-1">
								<button type="button" class="btn btn-warning btn-sm">DELETE</button>
							</div>
							</div>


							<div class="modal-footer">
							
							</div>
						</div>
						</form>
					</div>
		</div>
		
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Payment and Receipt</h3>
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
                  <th>#</th>
				  <th>Ref.no</th>
				  <th>Date</th>
				  <th>Type</th>
				  <th>Voucher Number</th>
				  <th>Payee/Receiver</th>
				  <th>Perticulars</th>
				  <th>Action</th>
                  
                </tr>
				 </thead>
				<?php
			$i=1;
			foreach($reandpay as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td><?php echo $key->reference_num;?></td>
				  <td><?php echo $key->date;?></td>
                  <td><?php if($key->type==1){echo "Receipt";}else{echo "Payment";}?></td>
                  <td><?php if($key->type==1){ echo $key->receipt_number;}else{echo $key->payment_number;}?></td>
                  <td><?php echo $key->payee_receiver;?></td>	
                  <td><?php echo $key->particulars;?></td>				  
                  <td><?php echo anchor('del_hsn/'.$key->payment_recipt_master_id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>  
				 <li class="fa fa-eye" data-toggle="modal" data-target="#myModal2<?php echo $key->payment_recipt_master_id;?>"></li>
				 </td>
                </tr>
				
				
				
				<!--------------------------------------------------------->
				<div class="modal fade" id="myModal2<?php echo $key->payment_recipt_master_id;?>" role="dialog">
				
					<div class="modal-dialog">
					
					 <?php
    $id=$key->payment_recipt_master_id;
    $edit_pr=$this->Admin_model->paymentreceipt_edit($id);
    foreach($edit_pr as $key2){
        
       
    }
    
    ?>
						<!-- Modal content-->
						<?php echo form_open_multipart('hsn');?>
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Payment And Receipt View</h4>
							</div>
							
							<div class="col-sm-4">
							<label class="exampleInputEmail1">REF NO:</label>
							<input type="text" class="form-control" value="<?php echo $key2->reference_num;?>">
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1">DATE</label>
							<input type="date" class="form-control" value="<?php echo $key2->date;?>">
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1">PAYMENT/RECEIPT ON</label>
							<select class="form-control" name="payorrepton"><option value="1" <?php if($key2->payment_receipt_on==1){echo 'selected';}?>>Normal</option>
							<option value="2" <?php if($key2->payment_receipt_on==2){echo 'selected';}?>>Against Sale Bill</option>
							<option value="3" <?php if($key2->payment_receipt_on==3){echo 'selected';}?>>Against Perchase Bill</option></select>
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1" >TYPE</label>
							<select class="form-control" id="payment_type_view" name="type">
							<option value="0">select</option>
							<option value="1" <?php if($key2->type==1){echo 'selected';}?>>Receipt</option>
							<option value="2" <?php if($key2->type==2){echo 'selected';}?>>Payment</option></select>
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1">BILL NO / VOUCHER NO :</label>
							<?php if($key2->type==1){ ?>
							<input type="text" class="form-control" name="receipt" id="voucher_num_view" value="<?php echo $key2->receipt_number;?>">
						    <?php } else if($key2->type==2) {?>
							<input type="text" class="form-control" name="payment" id="payment_view"  value="<?php echo $key2->payment_number;?>" >
						   <?php } else{ ?>
 							<input type="text" class="form-control" name="payment" id="payment_view"  value="Type is not mensioned" >
						   <?php }?>
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1" >LEDGER AC</label>
							<select class="form-control" name="ledac"><option value="1">1</option></select>
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1" >PAYEE / RECEIVER:</label>
							<input type="text" class="form-control" value="<?php echo $key2->payee_receiver;?>">
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1" >TRANSACTION MODE</label>
							<select class="form-control" name="transmode"><option value="1" <?php if($key2->transaction_mode==1){echo 'selected';}?>>By Bank</option>
							<option value="2" <?php if($key2->transaction_mode==2){echo 'selected';}?>>By Cash</option></select>
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1">Bank Name</label>
							<select class="form-control"  name="bank"><option value="1" <?php if($key2->bank_name==1){echo 'selected';}?>>bank1</option>
							<option value="2" <?php if($key2->bank_name==2){echo 'selected';}?>>bank2</option></select>
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1">PERTICULARS</label>
							<textarea class="form-control" ><?php echo $key2->particulars;?></textarea>
							</div>
							
							
							
							<div class="modal-footer">
								
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
						</form>
					</div>
					
		</div>
					
				
				
				
			
	  
	  
	
               
                
                <?php
				$i++;
				}
				?>
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
  
    $('#payment_type').on('change',function(){
	   
      var pay_type = this.value;  
	alert(pay_type);
	 if(pay_type==1){  
    $.ajax({
        type: "POST",
        url: "http://espylabs.com/mayoori_sw/admin/search_receipt_mode",
      
        data:{pay_type:pay_type},
        success: function(result){
			var obj=JSON.parse(result);
			
			$('#voucher_num').val(obj.receipt);
			$('#payment').hide();
			$('#voucher_num').show();
			
        console.log(obj.receipt);
    }});
}
 if(pay_type==2){  
    $.ajax({
        type: "POST",
        url: "http://espylabs.com/mayoori_sw/admin/search_payment_mode",
      
        data:{pay_type:pay_type},
        success: function(result){
			var obj=JSON.parse(result);
			
			$('#voucher_num').hide();
			$('#payment').show();
			$('#payment').val(obj.payment);
        console.log(obj.payment);
    }});
}
  }); 
	  
 
</script>

</body>

</html>

