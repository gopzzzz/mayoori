<style>
	input[type=radio] {
    width: 17px;
    height: 17px;
}
.exampleInputEmail1{
	font-size: 10px;
}
	/* Tooltip */
	#sales_cont .tooltip > .tooltip-inner {
	background-color: #f25252;
	color: #FFFFFF;
	border: 1px solid red;
	}

	/* Tooltip on top */
	#sales_cont .tooltip.top > .tooltip-arrow {
	border-top: 5px solid red;
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
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

</style>
  
  <?php $data['leftmenu']='b2billing'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Delivery Challan<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'delivery_chellan';?>">Delivery Challan</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
      <button type="button" class="btn btn-info btn-lg " data-toggle="modal" data-target="#myModal">ADD</button>  
		<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog" style="width:100%;">
						<!-- Modal content-->
						
						<form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('Admin/deliverychellanadd');?>">
						<input type="hidden" name="token" readonly class="form-control cleardata" value="<?php echo $token;?>" />
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Delivery Challan </h4>
							</div>
                             
							<div class="col-sm-12" style="margin-top:20px;">
							<div class="col-sm-1">
								<label class="exampleInputEmail1">Delivery Challan NO:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="billno" readonly class="form-control" value="<?php if($bilchel->mycount!=0){echo $this->session->userdata('dc');echo $last_bill_number->deliverychellan_master_chellanno+1;}else{echo  $this->session->userdata('dc');echo "1";}?>" />
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">Delivery Challan DATE:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="billdate" class="form-control" value="<?php echo date('d-m-Y');?>"/>
							</div>
						
							
							<div class="col-sm-1">
								<label class="exampleInputEmail1">Place of Supply</label>
							</div>
							<div class="col-sm-2">
							
								<select name="stcode" class="form-control" required>
									<option value="0">SELECT</option>
									<?php foreach($statecode as $state): ?>
        						       <option value="<?php echo $state->state_id; ?>"><?php echo $state->state_code; ?></option>
								     <?php endforeach; ?>
								</select>
							</div>

						    </div>
						
							<div class="col-sm-12" style="margin-top: 10px;">
						        <h4>Consignee Details</h4>
								<div class="col-sm-1">
								    <label class="exampleInputEmail1">Consignee Name</label>
								</div>
								<div class="col-sm-2">
									<!-- <input type="text" name="consignee_name" id="consignee_name" class="form-control" /> -->
									<select name="consignee_name" id="consignee_name" class="form-control" required>

									<option>select</option>
									<?php foreach($branches as $branches){?>
									<option value="<?php echo $branches->brn_id;?>"><?php echo $branches->brn_name;?></option>
									<?php }?>

									</select>
								</div>
								<div class="col-sm-1">
								    <label class="exampleInputEmail1">Consignee Address</label>
								</div>
								<div class="col-sm-2">
								   <textarea class="form-control" name="consignee_address" id="consigneeaddress"></textarea>
									
								</div>
								<div class="col-sm-1">
								    <label class="exampleInputEmail1">Customer GSTIN</label>
								</div>
								<div class="col-sm-2">
									<input type="text" name="customer_gstin" id="customer_gstin" class="form-control" />
								</div>

						     </div>
							 <div class="col-sm-12" style="margin-top: 10px;">
						        <h4>Transport Details</h4>
								<div class="col-sm-1">
								    <label class="exampleInputEmail1">Transport mode</label>
								</div>
								<div class="col-sm-2">
									<select name="transport_mode" id="transport_mode" class="form-control">
									<option value="ROAD">ROAD</option>
									<option value="RAILWAY">RAILWAY</option>
									</select>
								
								</div>
								<div class="col-sm-1">
										<label class="exampleInputEmail1">VEHICLE NUMBER:</label>
								</div>
								<div class="col-sm-2">
										<input type="text" name="vehicleno" class="form-control" />
									</div>
								<div class="col-sm-1">
								    <label class="exampleInputEmail1">Transport purpose</label>
								</div>
								<div class="col-sm-2">
									<input type="text" name="transport_purpose" id="transport_purpose" class="form-control" />
								</div>
								<div class="col-sm-1">
								    <label class="exampleInputEmail1">Despatch Date</label>
								</div>
								<div class="col-sm-2">
									<input type="date" name="despatch_date" id="despatch_date" class="form-control" value="<?php echo date('Y-m-d');?>" required />
								</div>

						     </div>
							<div class="col-sm-12" style="margin-top:20px;">
							  <div class="col-sm-1">
								<label class="exampleInputEmail1">IS IGST</label>
								</div>
								<div class="col-sm-1">
								<input type="checkbox" name="isigst" value="1" >
									
								</div>
								<div class="col-sm-1">
									<label class="exampleInputEmail1">GST NUMBER:</label>
								</div>
								<div class="col-sm-2">
									<input type="text" name="gstnumber" id="gst_num" class="form-control"  pattern=
									"[A-Za-z0-9\s]+" maxlenght="15"/>
								</div>
							

							</div>
						    
							
						    <div class="col-sm-12" style="margin-top: 20px;">
						    	
							<table class="table">
							<thead>
								<tr>
								<th scope="col">SL No</th>
								<th scope="col">CODE</th>
								<th scope="col">ITEM NAME</th>

								<th scope="col">BATCH</th>
								<th scope="col">QTY</th>
								<th scope="col">UNIT PRICE</th>
								<th scope="col">TAXABLE VALUE</th>
								<th scope="col">GST %</th>
								<!-- <th scope="col">GST AMOUNT</th> -->
								<th scope="col">TOTAL</th>
								<!-- <th scope="col">EMPLOYEE</th> -->
								<th scope="col"></th>
								<!--<th scope="col"><button type="button" class="btn btn-info btn-sm">DELETE</button></th>-->
								<!--<th scope="col"><button type="button" class="btn btn-info btn-sm">CLEAR</button></th>-->
								</tr>
							</thead>
							<tbody id="sales_cont">
								<tr id="detailRow_1" data-row="1">
								<th scope="row" class="slno">1</th>
								<td>
								<input type="hidden" name="purcost[]" class="form-control cleardata" id="pcost_1"
											data-order="1" style="float:left" value="0">
								<input type="hidden" name="itemid[]" value="0" class="form-control " id="itemid_1" data-order="1"  >
								<input type="hidden"  class="form-control cleardata" value="0" id="qtyinventory_1"
											data-order="1" style="float:left" >
											<input type="hidden"  value="0" class="form-control cleardata" id="mop_1"
											data-order="1" style="float:left" >
											<input type="hidden"  class="form-control cleardata" value="0" id="qtymop_1"
											data-order="1" style="float:left" >
								<input type="text" name="itemcode[]" class="form-control codeItem" id="code_1" data-order="1"  >
								<div id="code_list_1" style="position: absolute;z-index: 99;"></div>
								</td>
								<td><input type="text" name="itemname[]" class="form-control nameItem" id="itemname_1" data-order="1"  required>
								<div id="name_list_1"  style="position: absolute;z-index: 99;"></div>
								</td>
								<td>
									<select name="itembatchid[]" value="0" class="form-control itemBatch" id="itembatchid_1" placeholder="Batch" data-order="1" required>
										<option value="">Select Batch</option>  
									</select>
								</td>
								<td><input type="text" step=".01"   min="0"   name="itemqnty[]" class="form-control qnty"   id="itemqty_1" data-order="1" ></td>
								<td><input type="text" name="unitprice[]" class="form-control unitprice cleardata"
											id="unitprice_1" data-order="1"  data-toggle="tooltip" trigger="manual"></td>
								<td><input type="text" value="0" name="itemtaxable[]" readonly class="form-control taxableAmount" id="taxable_1" data-value="" data-order="1" ></td>
								<td><input type="text"  value="0" name="itemgstper[]" readonly class="form-control "  id="gstper_1" data-order="1" >
								<input type="hidden" name="itemgstamount[] " class="form-control gstAmount cleardata"
											 id="gstAmount_1" data-value=""  data-order="1" readonly value="0">
								<input type="hidden" value="0" name="itemhsncode[]" class="form-control itemhsncode" id="hsncode_1" data-value="" data-order="1" ></td>
								
								<td><input type="text" value="0" name="itemtotalamount[]" readonly class="form-control totalAmount" id="totalAmount_1" data-value="" data-order="1" ></td>
							
								<td>
							
									<i class="fa fa-trash detailDeleteRow" data-row="1" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>
								</td>
								</tr>
							
							</tbody>
							</table>
							<button type="button" id="BtnNewRow" data-order="1" class="btn btn-info btn-sm">ADD</button>
						    </div>
						    <div class="col-sm-12" >
						     	<div class="col-sm-6">
						     		<div class="col-sm-12">
						     			<div class="col-sm-2">
										<label class="exampleInputEmail1">NOTE</label>
									    </div>
									
										<div class="col-sm-4">
											<textarea class="form-control" name="note"></textarea>
										</div>
									
						           </div>
						     <div class="col-sm-12" style="margin-top: 20px;">
						    	
							
							
							
							
						</div>
						
					
						  <div class="col-sm-12">
						     <div class="col-sm-2 " >
								<label class="exampleInputEmail1 cardnumber" style="display: none;">CARD NUMBER</label>
								<label class="exampleInputEmail1 salescheque " style="display: none;margin-top:10px;">CHEQUE NUMBER</label>
								<label class="exampleInputEmail1 transcheq " style="display: none;margin-top:10px;">TRANSACTION ID</label>
								<label class="exampleInputEmail1 bankamount1 " style="display: none;margin-top:10px;">BANK AMOUNT</label><br>
								<label class="exampleInputEmail1 bank1 " style="display: none;margin-top:10px;">BANK</label><br>
								<label class="exampleInputEmail1 financelabel "style="display: none;margin-top:10px;">FINANCE</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="cardnumber" class="form-control salecardnumber"  style="display: none;" />
								<input type="text" name="chequenum" class="form-control saleschequenumber" style="margin-top:10px;display: none;"  />
								<input type="text" name="transcheque" class="form-control salestranscheque" style="margin-top:10px;display: none;"  />
								<input type="text" name="bankamount" id="bankamount" class="form-control bankamount " style="margin-top:10px;display: none;"  />
								
								<select name="bank" class="form-control bank cleardata" style="margin-top:10px;display: none;">
									<option value="0"></option>
									<?php foreach($bank as $key1){
									?>
										<option value="<?php echo $key1->bank_id;?>"><?php echo $key1->bank_name.'-'.substr($key1->ba_acnumber, -4);?></option>
									<?php 
									}?>
								</select>
								<select name="finance" class="form-control finance cleardata" style="margin-top:10px;display: none;">
									<option value="0"></option>
									<option value="1">BAJAJ finance</option>
									<option value="2">HDFC finance</option>
									<option value="3">HDB finance</option>
								</select>
							</div>
						   
							
						</div>
						
						
					</div>

                        <div class="col-sm-6">
                        	<div class="col-sm-12">
				            <div class="col-sm-2">
								<!-- //<label class="exampleInputEmail1">DELIVERY CHARGE</label> -->
							</div>
							<div class="col-sm-4">
								<!-- <input type="text" name="deliverychare"  id="deliverychare" class="form-control"/> -->
							</div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">TOTAL TAXABLE AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="totalTaxableAmount"  readonly  id="totalTaxableAmount" class="form-control"/>
							</div>
								
						</div>
							
							

						   
						    <div class="col-sm-12">
							<div class="col-sm-2">
								<!-- <label class="exampleInputEmail1">DISCOUNT</label> -->
							</div>
							<div class="col-sm-4">
								<!-- <input type="text" name="discount"  id="discount" class="form-control"/> -->
							</div>
						
							
							
							
						</div>
						<div class="col-sm-12" style="margin-top:10px;">
							<div class="col-sm-6"></div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">ROUND OFF</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="roundOfValuue"  id="roundOfValuue" class="form-control"/>
							</div>
							
							</div>
							
							<div class="col-sm-12" style="margin-top:10px;">
							<div class="col-sm-6"></div>	
								<div class="col-sm-2">
								<label class="exampleInputEmail1">GRAND TOTAL</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="grandTotal"  id="grandTotal" class="form-control" readonly/>
							</div>
							</div>
							<!---->
						</div>
						</div>
						<div class="col-sm-12" style="margin-top:10px;" >
							<div class="col-sm-6">
								<div class="col-sm-2">
								<button type="button" class="btn btn-info btn-sm">HOLD BILL</button>
							</div>
							<div class="col-sm-2">
								<!-- <button type="button" class="btn btn-warning btn-sm">RETURN</button> -->
								<a href="<?php echo base_url().'sales_rtn';?>" class="btn btn-warning btn-sm" >RETURN</a>
							</div>
							</div>
							<div class="col-sm-6">
							<input type="hidden" name="savetype" id="savetype" />
									<div class="col-sm-2">
								<button type="submit" id="saveprint" class="btn btn-primary btn-sm">SAVE & PRINT</button>
							</div>
							<div class="col-sm-1">
								<button type="submit" id="saveonly" class="btn btn-success btn-sm" >SAVE</button>
							</div>
							<div class="col-sm-1" style="margin-left:10px;">
								<button type="button" class="btn btn-sm">VIEW</button>
							</div>
							<div class="col-sm-1" style="margin-left:10px;">
								<button type="button" class="btn btn-warning btn-sm">CLEAR</button>
							</div>
							<div class="col-sm-1" style="margin-left:10px;">
								<button type="button" class="btn btn-danger btn-sm">DELETE</button>
							</div>
							</div>
								<!---->
							
						
							</div>


						  

							<div class="modal-footer">
								<!--<button type="button" name="submit" class="btn btn-primary">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
							</div>
						</div>
						</form>
					</div>
		</div>
		
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Billing Report</h3>
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
				  <th>Challan No</th>
				  <th>Date</th>
				  <th>Consignee Name</th>
				  <th>Transport Mode</th>
				  <th>Transport Purpose</th>
				  <th>vehicle Number</th>
				  <th>Grand Total</th>
				  <th>Notes</th>
				  <th>Action</th>
                  
                </tr>
				 </thead>
				<?php
			 $i=1;
			foreach($delivery_chellan as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $key->deliverychellan_master_chellanno;?></td>
				  <td><?php echo $key->deliverychellan_master_date;?></td>
				  <td><?php echo $key->brn_name;?></td>
                  <td><?php echo $key->dc_master_transport_mode;?></td>
                  <td><?php echo $key->dc_master_transpor_purpose;?></td>	
				  <td><?php echo $key->deliverychellan_master_vehicleno; ?></td>
				  <td><?php echo $key->deliverychellan_master_grandtotal; ?></td>
				  <td><?php echo $key->deliverychellan_master_note; ?></td>			  
                  <td>
				  <a href="<?php echo base_url('deliverychellan_view/').$key->deliverychellan_master_id;?>"

>  <i class="fa fa-eye" ></i></A>
				  <a href="<?php echo base_url('delivery_chellanprint/').$key->deliverychellan_master_id;?>"

									>&nbsp;

							<li class="fa fa-print"></li> 

					</a> 
					<a href="<?php echo base_url('deliverychellan_edit/').$key->deliverychellan_master_id;?>"

>&nbsp;

<li class="fa fa-pencil"></li> 

</a> 
				 </td>
                </tr>
                <?php
			     $i++;
				 }
				?>
              </table>
			  <p><?php echo $links; ?></p>
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
  
 function recalculate(){
    var totalTaxableAmount = 0;
    var totalgstAmount = 0;
    var grandTotal = 0;
    var deliverycharge = 0;
    var discount = 0;
    
    $('.taxableAmount').each(function( index ) {
        if($(this).val() !=''){
            totalTaxableAmount=totalTaxableAmount+parseFloat($(this).val());
        }
     });
     $('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
     $('.gstAmount').each(function( index ) {
         if($(this).val() !=''){
            totalgstAmount=totalgstAmount+parseFloat($(this).val());
         }
     });
     $('#amountGst').val(totalgstAmount.toFixed(2));

	 $('.totalAmount').each(function (index) {
				if ($(this).val() != '') {
					grandTotal = grandTotal + parseFloat($(this).val());
				}
			});
   
     $('#roundOfValuue').val((grandTotal%1).toFixed(2));
  
     $('#grandTotal').val(Math.round(grandTotal));
	 calc_outstanding();
    
	
}
  
	function calc_outstanding(){

		var paymod = $('input[name=paymod1]:checked').val();
		var paidamount = $('#paidamount').val();
		var grandTotal = $('#grandTotal').val();
		var bankamount = $('#bankamount').val();
		if (bankamount == '' || paymod == 1 || paymod == 2 || paymod == 5 || paymod == 6 ) { 
			bankamount = 0;
		}
		if (paidamount == '') {
			paidamount = 0;
		}

		
		var outstanding_previous = parseInt($('#outstanding_previous').val()); 
		$('#outstanding').val(outstanding_previous + parseInt(grandTotal) - parseInt(paidamount) - parseInt(bankamount));

	}
  

  
  $('#BtnNewRow').on('click',function(){
      var rowStart = 1;
      $('.slno').each(function(){
          $(this).html(rowStart);
          rowStart=rowStart+1;
		  
      });
	  $newrow=$('#BtnNewRow').data('order')+1;
	  $('#BtnNewRow').data('order', $newrow);
	  
      var current_row = $newrow;
      var new_row = '<tr id="detailRow_'+current_row+'" data-row="'+current_row+'"> <th scope="row" class="slno">'+rowStart+'</th>';
      new_row+= '<td><input type="hidden" value="0" name="purcost[]" class="form-control cleardata" id="pcost_'+current_row+'" data-order="'+current_row+'" style="float:left" ><input required type="hidden"  value="0" class="form-control  " id="qtymop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden" value="0" class="form-control  " id="qtymop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden" value="0" class="form-control  " id="qtyinventory_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input type="hidden" name="itemid[]" value="0" class="form-control " id="itemid_'+current_row+'" data-order="'+current_row+'" style="width:70px;" ><input type="text" name="itemcode[]" class="form-control codeItem" id="code_'+current_row+'" data-order="'+current_row+'" ><div id="code_list_'+current_row+'"></div></td>';
      new_row+= '<td><input type="text" name="itemname[]" class="form-control nameItem" id="itemname_'+current_row+'" data-order="'+current_row+'" ><div id="name_list_'+current_row+'"></div></td>';
      new_row += '<td><select name="itembatchid[]" value="0" class="form-control itemBatch" id="itembatchid_'+current_row+'" data-order="'+current_row+'" placeholder="Batch"><option value="">Select Batch</option></select></td>';
      new_row+= '<td><input type="text"  step=".01"   min="0"  name="itemqnty[]"  class="form-control qnty" id="itemqty_'+current_row+'" data-order="'+current_row+'" ></td>';
      new_row += '<td><input required type="text" name="unitprice[]"   class="form-control unitprice cleardata " data-toggle="tooltip" trigger="manual" id="unitprice_' + current_row + '" data-order="' + current_row + '" ></td>';
	  new_row+= '<td><input type="text" name="itemtaxable[]" readonly value="0" class="form-control taxableAmount" id="taxable_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
      new_row+= '<td><input type="text" name="itemgstper[]" readonly value="0" class="form-control" id="gstper_'+current_row+'"  data-order="'+current_row+'"><input type="hidden" name="itemhsncode[]" class="form-control itemhsncode" id="hsncode_'+current_row+'" data-value="" data-order="'+current_row+'" ><input required type="hidden" value="0"  name="itemgstamount[]" readonly class="form-control gstAmount cleardata" id="gstAmount_' + current_row + '" data-value="" data-valuesingle="" data-order="' + current_row + '"></td>';
    
	
      new_row+= '<td><input type="text" name="itemtotalamount[]" readonly value="0" class="form-control totalAmount" id="totalAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
   
      new_row+= '<td>';
   
      new_row+= '<i data-row="'+current_row+'" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
      new_row+= '</td></tr>';
      
      $('#sales_cont').append(new_row);
	  $('#BtnNewRow').data('order',current_row);
      
  })
  
  $('#sales_cont').on('click','.detailDeleteRow',function(){
	var rowNumber = $(this).data('row');
			$('#detailRow_' + rowNumber).remove();
			var rowStart = 1;
			$('.slno').each(function () {
				$(this).html(rowStart); 
				rowStart = rowStart + 1;
			});
       recalculate();
  })
  
  $('#sales_cont').on('click','.detailEraseRow',function(){
      var rowNumber = $(this).data('row');
       $('#detailRow_'+rowNumber+' select').prop('selectedIndex',0);
       $('#detailRow_'+rowNumber+' input').val('');
       recalculate();
  })
  


  
  $('#sales_cont').on('keyup','.codeItem',function(){
      var rowOrder = $(this).data('order');
      var itemCode = $(this).val();
      if(itemCode != '' && itemCode != 0)
      {
      	$.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/searchItemList');?>',
			data: { itemCode : itemCode, rowOrder:rowOrder},
				success:function(res){console.log(res);
					if(res){
						$('#code_list_'+rowOrder).show();
						$('#code_list_'+rowOrder).html(res);
					}else{
						$('#code_list_'+rowOrder).html("");
					}
				},
		});	
      }
	  else{
			$('#code_list_' + rowOrder).html("");
	  }
  })
  
   $('#sales_cont').on('keyup','.nameItem',function(){
      var rowOrder = $(this).data('order');
      var itemName = $(this).val();
      if(itemName != '' && itemName != 0)
      {
      	$.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/searchItemNameList');?>',
			data: { itemName : itemName, rowOrder:rowOrder},
				success:function(res){console.log(res);
					if(res){
						$('#name_list_'+rowOrder).show();
						$('#name_list_'+rowOrder).html(res);
					}else{
						$('#name_list_'+rowOrder).html("");
					}
				},
		});	
      }
	  else{
			$('#name_list_' + rowOrder).html("");
	  }
  })
  
  $('#sales_cont').on('keyup','.batchItem',function(){
      var rowOrder = $(this).data('order');
      var itemBatch = $(this).val();
      if(itemBatch != '' && itemBatch != 0)
      {
      	$.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/searchItemBatchList');?>',
			data: { itemBatch : itemBatch, rowOrder:rowOrder},
				success:function(res){console.log(res);
					if(res){
						$('#batch_list_'+rowOrder).show();
						$('#batch_list_'+rowOrder).html(res);
					}else{
						$('#batch_list_'+rowOrder).html("");
					}
				},
		});	
      }
	  else{
			$('#batch_list_' + rowOrder).html("");
	  }
  })

  $('#sales_cont').on('click','.subSelect_itemedit',function(){
			var id = $(this).data('id');
			var itemValue = $(this).data('value');
			$('#code_list_'+id).hide();
			$('#name_list_'+id).hide();
			$.ajax({
					type:"POST",
					url:'<?php echo site_url('Admin/getBatchByItem1');?>',
					data: { itemValue : itemValue},
						success:function(res){
							var batchlist = JSON.parse(res);
						
							var i;
							var optiondata= '<option value="">Select</option>';
							for(i=0;i<batchlist.length;i++){
								
								optiondata += '<option value="'+batchlist[i].batch_id+'">'+batchlist[i].batchcode+'('+batchlist[i].inventory_stock_itemcount+')</option>';

							}
							
							$('#itembatchid_'+id).html(optiondata);
							$('#code_'+id).val(batchlist[0].itm_code);
							$('#itemname_'+id).val(batchlist[0].itm_name);
						}
			})
  })


  $('#sales_cont').on('keyup', '.unitprice', function () {

	$(this).val($(this).val().replace(/ +?/g, ''));


		var id = $(this).data('order');
		var unitprice = $(this).val();
				
		
		var qnty = $('#itemqty_'+id).val();
		var mop = $('#qtymop_'+id).val() / (qnty || 1);
		var minmop=$('#pcost_'+id).val();
		



			$(this).css("border","1px solid #ccc");
			$(this).css("color","#555");
			$(this).tooltip('hide');
			$(this).attr('data-original-title', '');


			var item_hsn_tax = $('#gstper_'+id).val();
			//alert(item_hsn_tax);
			var taxableAmount = 0; 
			if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
				var taxableAmount = (parseInt(unitprice) / (101 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
			}
			else {
				var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
			}
			var gstAmount = ((taxableAmount * parseInt(item_hsn_tax)) / 100).toFixed(2);
		
		

			var gstsubtotal = qnty * gstAmount;
			// var cesssubtotal = qnty * cessAmount;
			var itemsubtotal = qnty * unitprice ;
			var taxablesubtotal = qnty * unitprice;

			$('#taxable_' + id).val((taxablesubtotal));	
			$('#gstAmount_' + id).val((gstsubtotal).toFixed(2));
		
			$('#totalAmount_' + id).val((taxablesubtotal).toFixed(2));	
			
		
					recalculate();
			
			
		

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

 $('#sales_cont').on('change','.itemBatch',function(){ 	 

	 var id = $(this).data('order');
	 $('#unitprice_'+id).css("border","1px solid #ccc");
			$('#unitprice_'+id).css("color","#555");
			$('#unitprice_'+id).tooltip('hide');
			$('#unitprice_'+id).attr('data-original-title', '');
	 var itemValue = $(this).val();
     var totalTaxableAmount = 0;
     var totalgstAmount = 0;
     var grandTotal = 0;
     var deliverycharge = 0;
     var discount = 0;

	 
	 $.ajax({
				type: "POST",
				url: '<?php echo site_url('Admin/getbatchcount');?>',
				data: { itemValue: itemValue },
				success: function (res) {
					console.log(res);

					var obj=JSON.parse(res);
					$('#qtyinventory_'+id).val(obj.cur_stock_item_count);
				},
			});

     $.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/getItemBatchDetails');?>',
			data: { itemValue : itemValue},
				success:function(res){console.log(res);
				$('#code_list_'+id).hide();
				$('#name_list_'+id).hide();
				$('#batch_list_'+id).hide();
				var obj = JSON.parse(res);

				if(parseInt(obj.cur_stock_item_count)<parseInt(1)){
						$('#itemqty_'+id).css({"border":"1px solid red"});
						$('#saveprint').hide();
						$('#saveonly').hide();
						$('#BtnNewRow').hide();
					}else{
						$('#itemqty_'+id).css({"border":"1px solid #d2d6de"});
						$('#saveprint').show();
						$('#saveonly').show();
						$('#BtnNewRow').show();
					}
				$('#hsncode_'+id).val(obj.hsn_code);
				

				if ((obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28) ) {
					if(obj.t_sr==0.00){
							var taxableAmount = parseInt(obj.e_br);
						}
					
						else{
							var taxableAmount = parseInt(obj.t_br);
						}
						
				}
				else {
					if(obj.t_sr==0.00){
							var taxableAmount = parseInt(obj.e_br);
						}
						
						
						else{
							var taxableAmount = parseInt(obj.t_br);
						
						}
				}
				var gstAmount = ((taxableAmount*parseInt(obj.hsn_tax))/100).toFixed(2);


				if(obj.t_sr==0.00){
						$('#pcost_' + id).val(obj.e_pc);
					$('#percost_' + id).val(obj.e_pc);
					$('#mop_'+id).val(obj.e_mop);
					$('#unitprice_'+id).val(obj.e_br);
					$('#totalAmount_' + id).val(obj.e_br);
					$('#totalAmount_' + id).attr('data-value', obj.e_br);
					if(parseFloat(obj.e_sr)<parseFloat(obj.e_pc)){
						$('#unitprice_'+id).css({"border":"1px solid red"});
						
					}else{
						$('#unitprice_'+id).css({"border":"1px solid #d2d6de"});
					
					}
					}
					
					
					
					else{
					$('#pcost_' + id).val(obj.t_pc);
					$('#percost_' + id).val(obj.t_pc);
					$('#mop_'+id).val(obj.t_mop);
					$('#unitprice_'+id).val(obj.t_br);
					$('#totalAmount_' + id).val(obj.t_br);
					$('#totalAmount_' + id).attr('data-value', obj.t_br);
					if(parseFloat(obj.t_sr)<parseFloat(obj.t_pc)){
						$('#unitprice_'+id).css({"border":"1px solid red"});
						
					}else{
						$('#unitprice_'+id).css({"border":"1px solid #d2d6de"});
					
					}
					}


				$('#code_'+id).val(obj.itm_code);
				$('#itemid_'+id).val(obj.item_id);
			    $('#itemname_'+id).val(obj.itm_name);
			    $('#batch_'+id).val(obj.batchcode);
				
			    $('#taxable_'+id).val(taxableAmount);
			    $('#taxable_'+id).attr('data-value',taxableAmount);
			    $('#gstAmount_'+id).val(gstAmount);
				$('#gstper_' + id).val(obj.hsn_tax);
				
			    $('#gstAmount_'+id).attr('data-value',gstAmount);
			    $('#itemqty_'+id).val(1);
			  
			 
	
					recalculate();
				 calc_outstanding();
              
				},
		});
 }) 
 
$('#deliverychare').on('keyup',function(){
    recalculate();
});

$('#discount').on('keyup',function(){
    recalculate();
});
 
$('#sales_cont').on('keyup','.qnty',function(){
	var qnty_demo = $(this).val();
    var order = $(this).data('order');
	var inqty=$('#qtyinventory_'+order).val();
    var totalTaxableAmount = 0;
    var totalgstAmount = 0;
    var deliverycharge = 0;
    var discount = 0;
	var inqty=$('#qtyinventory_'+order).val();
	if(parseInt(inqty)>=parseInt(qnty_demo)){
				var qnty=qnty_demo;
				$('#itemqty_'+order).css({"border":"1px solid #d2d6de"});
				$('#saveprint').show();
				$('#saveonly').show();
				$('#BtnNewRow').show();
			}else if($(this).val() !== null && $(this).val() == ''){
				var qnty=0;
				$('#saveprint').hide();
				$('#saveonly').hide();
				$('#BtnNewRow').hide();
			
			}else{
				var qnty=qnty_demo;
				$('#itemqty_'+order).css({"border":"1px solid red"});
				$('#saveprint').hide();
				$('#saveonly').hide();
				$('#BtnNewRow').hide();
			
			}

    if(qnty != '' && qnty!=0){
		var unitprice=$('#unitprice_'+order).val();
		var totaltax=parseFloat(qnty)*parseFloat(unitprice);
       
     $('#taxable_'+order).val(totaltax.toFixed(2));
    
     $('#totalAmount_'+order).val(totaltax.toFixed(2));

	 recalculate();

    }
    
});



$ ('input[name=paymod1]'). click (function () {
	calc_outstanding();
});

$('#paidamount, #bankamount').on('keyup',function(){
    calc_outstanding();
});

$('.emicheck').on('click', function () {

	$('.salecardnumber').hide();
	$('.cardnumber').hide();
	$('.salescheque').hide();
	$('.saleschequenumber').hide();
	$('.transcheq').hide();
	$('.salestranscheque').hide();
	$('.bankamount1').show();
	$('.bank1').show();
	$('.bankamount').show();
	$('.bank').show();
	$('.financelabel').show();
	$('.finance').show();
});
$('.bankcheck').on('click', function () {

	$('.salecardnumber').hide();
	$('.cardnumber').hide();
	$('.salescheque').hide();
	$('.saleschequenumber').hide();
	$('.transcheq').hide();
	$('.salestranscheque').hide();
	$('.bankamount1').hide();
	$('.bank1').show();
	$('.bankamount').hide();
	$('.bank').show();
	$('.financelabel').hide();
	$('.finance').hide();
});
$('.chquecheck').on('click', function () {

	$('.salescheque').show();
	$('.saleschequenumber').show();
	$('.salecardnumber').hide();
	$('.cardnumber').hide();
	$('.transcheq').hide();
	$('.salestranscheque').hide();
	$('.bankamount1').hide();
	$('.bank1').hide();
	$('.bankamount').hide();
	$('.bank').hide();
	$('.financelabel').hide();
	$('.finance').hide();
});
$('.banktrancheck').on('click', function () {

	$('.transcheq').show();
	$('.salestranscheque').show();
	$('.salecardnumber').hide();
	$('.cardnumber').hide();
	$('.salescheque').hide();
	$('.saleschequenumber').hide();
	$('.bankamount1').hide();
	$('.bank1').hide();
	$('.bankamount').hide();
	$('.bank').hide();
	$('.financelabel').hide();
	$('.finance').hide();
});
$('.bothcheck').on('click', function () {

	$('.transcheq').hide();
	$('.salestranscheque').hide();
	$('.salecardnumber').hide();
	$('.cardnumber').hide();
	$('.salescheque').hide();
	$('.saleschequenumber').hide();
	$('.bankamount1').show();
	$('.bank1').show();
	$('.bankamount').show();
	$('.bank').show();
	$('.financelabel').hide();
	$('.finance').hide();
});
$('.cashcheck').on('click', function () {

	$('.transcheq').hide();
	$('.salestranscheque').hide();
	$('.salecardnumber').hide();
	$('.cardnumber').hide();
	$('.salescheque').hide();
	$('.saleschequenumber').hide();
	$('.bankamount1').hide();
	$('.bank1').hide();
	$('.bankamount').hide();
	$('.bank').hide();
	$('.financelabel').hide();
	$('.finance').hide();
});


  
  $('#customername').on('keyup',function(){
	  $('#customerid').val(0);
  });
  $('#gst_num').on('keyup',function(){
	$('span.error-keyup-1').remove();
	var inputval=$(this).val();
    var numericreg=/^([a-zA-Z0-9]{0,15})$/;
	var length=inputval.length;
	if(length >= 2 && length <= 15 )
	{
		$(this).after('<span class="error error-keyup-1">Minimum 15 Letters.</span>');

	}
	
   if(!numericreg.test(inputval)) {
        $(this).after('<span class="error error-keyup-1"> Maximum 15 .Allowed Only Character or Number.</span>');
    }
  });
  $('#consignee_name').on('change',function(){
	  var id=$(this).val();
	$.ajax({
				type: "POST",
				url: '<?php echo site_url('Admin/get_branchdetails');?>',
				data: { id: id },
				success: function (res) {
					console.log(res);

					var obj=JSON.parse(res);
					$('#consigneeaddress').val(obj.brn_address);
					$('#customer_gstin').val(obj.brn_gst);
				},
			});
  });
  $('form').attr('autocomplete', 'off');
</script>

<script>




  function validateForm() {

	

if (confirm("Do you really want to submit this sales?")) {

	

	var garndtotal=$('#grandTotal').val();
	


	var rowCount = $("#sales_cont > tr").length;
	var isStockNotAvailable = false;

	 
	 $("#sales_cont tr").map(function(){
		if(!isStockNotAvailable){
	 if($(this).attr('data-row')!=undefined){
	 var i = $(this).attr('data-row'); 

	 var stock=document.getElementById('qtyinventory_'+i+'').value;
	 var qty=document.getElementById('itemqty_'+i+'').value;
	
	 //alert(stock);alert(qty);
	 if(parseInt(qty)>parseInt(stock)){
		alert("Stock is not available");
		$('#itemqty_'+i).css({"border":"2px solid red"});
		$("#saveonly").html("SAVE");
		
		$("#saveonly").removeAttr("disabled")
		$("#saveprint").html("SAVE & PRINT");
		$("#saveprint").removeAttr("disabled");
		isStockNotAvailable = true;
		event.preventDefault();
		return false;
		
	 }else{
	
		$("#saveonly").html("Please Wait...");
		$("#saveonly").attr('disabled', 'disabled');
		$("#saveprint").html("Please Wait...");
		$("#saveprint").attr('disabled', 'disabled');
	
		
	 }



					  }
		}
		else{
			return false;
		}
                 });

	return true;

}

else {

	return false;

}




	}


</script>

</body>

</html>

