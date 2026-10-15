<style>
	input[type=radio] {
    width: 17px;
    height: 17px;
}
.fa{
	margin-left: 17px;
}
</style>
  
  <?php $data['leftmenu'] = 'receiptandpayment';$data['mainmenu'] = 'transaction'; echo $this->load->view('common/leftmenu',$data,true);?> 

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Cash Payment<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'respay';?>">Cash Payment</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
		<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog" style="width:60%;">
						<!-- Modal content-->
						
						<form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('cashpaymentadd');?>" >
				
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Cash Payment</h4>
							</div>
                             
							<div class="col-sm-4">
							<label class="exampleInputEmail1">REF NO:</label>
							<input type="hidden" class="form-control" name="refno" value="<?php foreach($recipay as $keybill){ if($keybill->mycount==0){echo "1";}else{foreach($last_bill_number as $keybill1){ echo $keybill1->referalnumber+1; }} }?>">
							<input type="text" class="form-control" readonly name="refnoview" value="CPAY<?php foreach($recipay as $keybill){ if($keybill->mycount==0){echo "1";}else{foreach($last_bill_number as $keybill1){ echo $keybill1->referalnumber+1; }} }?>">
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1">DATE</label>
							<input type="date" class="form-control " value="<?php echo date('Y-m-d');?>" name="todaydate" required>
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1">PAYMENT</label>
							<select class="form-control cleardata" name="payorrepton" id="pron">
                            <option value="0">Select</option>
                            <option value="1">Normal</option>
							<option value="2">Against B2B sale</option>
                            <option value="3">Against B2C sale</option>
							<option value="4">Against Purchase Bill</option>
							<option value="5">Salary Ledger</option>
							<option value="7">Sales Order</option>
							<option value="8">Bank Ledger</option>
							</select>
							</div>
							
							<div class="col-sm-4">
							<label class="exampleInputEmail1">BILL NO / VOUCHER NO :</label>
							
							<input type="text" class="form-control cleardata" name="payment" id="payment" required>
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1" >LEDGER AC</label>
							<select class="form-control cleardata" name="ledac" id="ledger">
                            
                            </select>
							</div>
							
						
							<div class="col-sm-4">
							<label class="exampleInputEmail1" >AMOUNT :</label>
							<input type="text" class="form-control cleardata" name="amount" required>
							</div>
              				<input type="hidden" name="savetype" id="savetype" />
							<div class="col-sm-4">
							<label class="exampleInputEmail1">PARTICULARS</label>
							<textarea class="form-control cleardata" name="particulars"></textarea>
							</div>
							<div class="col-sm-12" style="margin-top: 20px;">
								<div class="col-sm-2">
								<button type="submit" name="submit" id="saveprint" class="btn btn-primary btn-sm">SAVE & PRINT</button>
							</div>
							<div class="col-sm-1">
								<button type="submit" name="save" id="saveonly" class="btn btn-secondary btn-sm">SAVE</button>
							</div>
							<!-- <div class="col-sm-1">
								<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#mymodallisting">VIEW</button>
							</div> -->
							<div class="col-sm-1">
								<button type="button" class="btn btn-danger btn-sm reset">CLEAR</button>
							</div>
							<!-- <div class="col-sm-1">
								<button type="button" class="btn btn-warning btn-sm">DELETE</button>
							</div> -->
							</div>


							<div class="modal-footer">
							
							</div>
						</div>
						</form>
					</div>
		</div>

		<div class="modal fade" id="editModal" role="dialog">
					<div class="modal-dialog" style="width:60%;">
						<!-- Modal content-->
						<?php echo form_open_multipart('edit_cashpayment');?>
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Cash Payment</h4>
							</div>
                             
							<div class="col-sm-4">
							<label class="exampleInputEmail1">REF NO:</label>
							<input type="hidden" class="form-control" name="refno" id="refno" value="<?php foreach($recipay as $keybill){ if($keybill->mycount==0){echo "1";}else{foreach($last_bill_number as $keybill1){ echo $keybill1->referalnumber+1; }} }?>">
							<input type="text" class="form-control" readonly name="refnoview" id="refnoview" value="CPAY<?php foreach($recipay as $keybill){ if($keybill->mycount==0){echo "1";}else{foreach($last_bill_number as $keybill1){ echo $keybill1->referalnumber+1; }} }?>">
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1">DATE</label>
							<input type="date" class="form-control " value="<?php echo date('Y-m-d');?>" name="todaydate" id="todaydate" required>
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1">PAYMENT</label>
							<select class="form-control cleardata" name="payorrepton" id="pron">
                            <option value="0">Select</option>
                            <option value="1">Normal</option>
							<option value="2">Against B2B sale</option>
                            <option value="3">Against B2C sale</option>
							<option value="4">Against Purchase Bill</option>
							<option value="5">Salary Ledger</option>
							<option value="7">Sales Order</option>
							<option value="8">Bank Ledger</option>
							</select>
							</div>
							
							<div class="col-sm-4">
							<label class="exampleInputEmail1">BILL NO / VOUCHER NO :</label>
							
							<input type="text" class="form-control cleardata" name="payment" id="vouchernumber" >
							</div>
							<div class="col-sm-4">
							<label class="exampleInputEmail1" >LEDGER AC</label>
							<!-- <select class="form-control cleardata" name="ledac" id="ledger">
								
                            </select> -->
							<input type="text" name="ledac" id="ledgernew" class="form-control" readonly>
							<input type="hidden" name="ledgertemp" id="ledgertemp">
							<input type="hidden" name="bpid" id="bpid">
							</div>
							
						
							<div class="col-sm-4">
							<label class="exampleInputEmail1" >AMOUNT :</label>
							<input type="text" class="form-control cleardata" name="amount" id="amount" required>
							</div>
              				<input type="hidden" name="savetype" id="savetype" />
							<div class="col-sm-4">
							<label class="exampleInputEmail1">PARTICULARS</label>
							<textarea class="form-control cleardata" name="particulars" id="particulars"></textarea>
							</div>
							<div class="col-sm-12" style="margin-top: 20px;">
								<div class="col-sm-2">
								<button type="submit" name="submit" id="saveprint" class="btn btn-primary btn-sm">SAVE & PRINT</button>
							</div>
							<div class="col-sm-1">
								<button type="submit" name="save" id="saveonly" class="btn btn-secondary btn-sm">SAVE</button>
							</div>
							<!-- <div class="col-sm-1">
								<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#mymodallisting">VIEW</button>
							</div> -->
							<div class="col-sm-1">
								<button type="button" class="btn btn-danger btn-sm reset">CLEAR</button>
							</div>
							<!-- <div class="col-sm-1">
								<button type="button" class="btn btn-warning btn-sm">DELETE</button>
							</div> -->
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
              <h3 class="box-title">Cash Payments</h3>
			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	


              <div class="box-tools">
              
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
				  <th>Payment For</th>
				 
				  <th>Ledger Account</th>
				
				  <th>Particulars</th>
                  <th>Amount</th>
				  <th>Action</th>
                  
                </tr>
				 </thead>
				<?php
			$i=1;
			foreach($reandpay as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td>CPAY<?php echo $key->referalnumber;?></td>
				  <td><?php echo date('d-m-Y', strtotime($key->date));?></td>
				  <td><?php if($key->receiptorpay_on==1){echo "Normal";}else if($key->receiptorpay_on==2){echo "B2B";}else if($key->receiptorpay_on==3){echo "B2C";}else if($key->receiptorpay_on==4){echo "Purchase";}else if($key->receiptorpay_on==5){echo "Salary";}else if($key->receiptorpay_on==7){echo "Sale Order";}else if($key->receiptorpay_on==8){echo "Bank Ledger";}?></td>

                  
                  <td><?php if($key->receiptorpay_on==1){ echo $key->le_name; }else if($key->receiptorpay_on==4){echo $key->sup_name; }else if($key->receiptorpay_on==5){echo $key->stf_name;}else{ echo $key->cus_name; } ?></td>	
                  <td><?php echo $key->narration;?></td>
                  <td><?php echo $key->amount;?></td>				  
                  <td> 
					
					<i class="fa fa-pencil" aria-hidden="true" onclick="editthis(this.id);" id="<?php echo $key->bp_id;?>"></i>
				 </td>
                </tr>
				
				
				
				<!--------------------------------------------------------->
		
				
				
				
			
	  
	  
	
               
                
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

  if(confirm("Do you really want to delete this record?")){



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
    $('#example1').DataTable({
       
    })
  })
  
//     $('#payment_type').on('change',function(){
	   
//       var pay_type = this.value;  
// 	//alert(pay_type);
// 	 if(pay_type==1){  
//     $.ajax({
//         type: "POST",
//         url: "http://espylabs.com/mayoori_sw/admin/search_receipt_mode",
      
//         data:{pay_type:pay_type},
//         success: function(result){
// 			var obj=JSON.parse(result);
			
// 			$('#voucher_num').val(obj.receipt);
// 			$('#payment').hide();
// 			$('#voucher_num').show();
			
//         console.log(obj.receipt);
//     }});
// }
//  if(pay_type==2){  
//     $.ajax({
//         type: "POST",
//         url: "http://espylabs.com/mayoori_sw/admin/search_payment_mode",
      
//         data:{pay_type:pay_type},
//         success: function(result){
// 			var obj=JSON.parse(result);
			
// 			$('#voucher_num').hide();
// 			$('#payment').show();
// 			$('#payment').val(obj.payment);
//         console.log(obj.payment);
//     }});
// }
//   }); 
	
  $('#pron, #editModal #pron').on('change',function(){
	   
       var pay_type = $(this).val();  
	   
     
       $.ajax({
        type: "POST",
        dataType: "json",
				url: '<?php echo site_url('Admin/getledgerdropdrown');?>',
				data: { pay_type: pay_type },
				success: function (res) {
                   
                    $('#ledger').empty();
                    var html_each='<option value="0">select</option>';
                    if(pay_type==1){
											$.each( res, function( key, value ) {
					html_each +='<option value="'+value.le_id+'">'+value.le_name+'</option>';
					});
										}else if(pay_type==4){
											$.each( res, function( key, value ) {
					html_each +='<option value="'+value.sup_id+'">'+value.sup_name+'</option>';
				});  
										}else if(pay_type==5){
											$.each( res, function( key, value ) {
					html_each +='<option value="'+value.stf_id+'">'+value.stf_name+'</option>';
				});
				                        }else if(pay_type==8){
											$.each( res, function( key, value ) {
					html_each +='<option value="'+value.ba_id +'">'+value.ba_ifsc+'</option>';
				});
				                        }
										else{
											$.each( res, function( key, value ) {
					html_each +='<option value="'+value.customer_id+'">'+value.cus_name+'('+value.cus_phonenumber+')</option>';
					});  
                    }
   
    $('#ledger').append(html_each);  
	$('#editModal #ledger').append(html_each);  
	$('#editModal #ledger').val($('#ledgertemp').val()); 
     }
     });
   
    });

    $('#saveprint').on('click', function () {
			if ($('#savetype').val() == '' || $('#savetype').val() == 2) {
				event.preventDefault();
				$('#savetype').val(1);
				$('#saveprint').click();
			}
		});
		$('#saveonly').on('click', function () {
			if ($('#savetype').val() == '' || $('#savetype').val() == 1) {
				event.preventDefault();
				$('#savetype').val(2);
				$('#saveonly').click();
			}
		});
    $(".reset").bind("click", function() {
		$(".cleardata").val("");
	});
	function editthis(id){

		$.ajax({
			type: "POST",
			url:'<?php echo site_url('Admin/getcashpayment');?>',
		
			data:{id:id},
			success: function(result){
				var obj=JSON.parse(result);
			//	alert(result);
				
				$('#editModal #refno').val(obj.referalnumber);
				$('#editModal #refnoview').val('CPAY'+obj.referalnumber);
				$('#editModal #todaydate').val(obj.date);
				$('#editModal #ledgertemp').val(obj.ledger);
				$('#editModal #pron').val(obj.receiptorpay_on);
				if(obj.receiptorpay_on==1){
					$('#editModal #ledgernew').val(obj.le_name);
				}else if(obj.receiptorpay_on==2 || obj.receiptorpay_on==3 || obj.receiptorpay_on==7){
					$('#editModal #ledgernew').val(obj.cus_name);
				}else if(obj.receiptorpay_on==4){
					$('#editModal #ledgernew').val(obj.sup_name);
				}else if(obj.receiptorpay_on==5){
					$('#editModal #ledgernew').val(obj.stf_name);
				}
				$("#editModal #pron").change();
				$('#editModal #vouchernumber').val(obj.paymentnumber);
				$('#editModal #amount').val(obj.amount);
				$('#editModal #particulars').val(obj.narration);
				$('#editModal #bpid').val(obj.bp_id);
				$('#editModal').modal('show');
			//console.log(obj);
    	}
		
		});
		
	}
	
	function editthis1(id){

$.ajax({
	type: "POST",
	url:'<?php echo site_url('Admin/getcashpayment');?>',

	data:{id:id},
	success: function(result){
		var obj=JSON.parse(result);
		
		$('#editModal1 #refno').val(obj.referalnumber);
		$('#editModal1 #refnoview').val('CPAY'+obj.referalnumber);
		$('#editModal1 #todaydate').val(obj.date);
		$('#editModal1 #ledgertemp').val(obj.ledger);//
		$('#editModal1 #pron').val(obj.receiptorpay_on);//
		$("#editModal1 #pron").change();
		$('#editModal1 #payment').val(obj.paymentnumber);
		$('#editModal1 #amount').val(obj.amount);
		$('#editModal1 #particulars').val(obj.narration);
		$('#editModal1 #bpid').val(obj.bp_id);
		$('#editModal1 #ledger').val(obj.ledger);
		$('#editModal1').modal('show');
	//console.log(obj);
}

});

}
function validateForm() {
	form.myButton.disabled = true;
	form.myButton.value = "Please wait...";
	return true;
}
	
	 
</script>

</body>

</html>

