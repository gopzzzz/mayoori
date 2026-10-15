<style>
	input[type=radio] {
		width: 17px;
		height: 17px;
	}

	.exampleInputEmail1 {
		font-size: 10px;
	}
	
	#searchbox tr{
	    height: 25px;
    border: 1px solid;
    background: #d0d0ff;
	}
	
	#searchModel label, #searchModel th, #searchModel .form-control, #searchModel td {
    font-size: 12px;
    text-align: center;
	}
	button.close{
		font-size: 39px;
	}
	.custsearchmodal{
		margin-left: 157px;
		margin-top: -25px;
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

<?php $data['leftmenu']='saleswindow';$data['mainmenu'] = 'transaction'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



	<!-- Content Header (Page header) -->

	<section class="content-header">

		<h1 align="center">B2B VIEW<small>Preview</small></h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">B2B VIEW</a></li>

		</ol>

	</section><br>



	<!-- Main content -->

	<section class="content">
		
		

		<div class="modal fade" id="editModal" role="dialog">
			<div class="modal-dialog" style="width:100%;">
				<!-- Modal content-->
				<div class="modal-content salesedit_content">

				</div>


				<div class="modal-footer">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						
						<input type="hidden" id="response_noti"
							value="<?php echo $this->session->flashdata('response');?>" />


						<div class="box-tools">
						
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
					
				
						
						<form name="myForm" onsubmit="return validateForm()" method="post" action="<?php echo site_url('AdminController/salesb2beditnew');?>">
				
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button> 
								<h4 class="modal-title">B2B VIEW</h4>
                               <a href="<?php echo base_url('b2b');?>"> <button type="button" class="btn btn-sm btn-success">BACK</button></a>
							</div>
                             
							<div class="col-sm-12" style="margin-top:20px;">
							<div class="col-sm-1">
								<label class="exampleInputEmail1">BILL NO:</label>
							</div>
							<div class="col-sm-2">
							<input type="hidden" id="sale_id" value="<?php echo $data_master->billing_master_id;?>" name="master_id12">
								<input type="text" name="billno" readonly class="form-control cleardata" value="<?php echo $data_master->billing_master_billno; ?>" />
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">BILL DATE:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="billdate" id="billdate" class="form-control cleardata" value="<?php echo $data_master->billingdate; ?>" readonly/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">EWAY BILL NUMBER</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="ewaybillno" class="form-control cleardata" id="ewaybillnumber" value="<?php echo $data_master->billing_master_eway_billno; ?>"/>
							</div>
							
							<div class="col-sm-1">
								<label class="exampleInputEmail1">STATE CODE</label>
							</div>
							<div class="col-sm-2">
								<select name="stcode" class="form-control cleardata" required>
									<option value="0">SELECT</option>
									<?php foreach($statecode as $state): ?>
        						       <option value="<?php echo $state->state_id; ?>" <?php if($data_master->billing_master_state_code==$state->state_id){echo 'selected';}?>><?php echo $state->state_code; ?></option>
								     <?php endforeach; ?>
								</select>
							</div>

						    </div>
						    <div class="col-sm-12" style="margin-top: 10px;">
							<div class="col-sm-1">
								<label class="exampleInputEmail1">CUSTOMER NAME:</label>
							</div>
							<div class="col-sm-2"  id="cust_search" style="display: inline-flex;">
							<input type="hidden" name="customerloginid" id="customerid" value="<?php echo $data_master->billing_master_customer_login_id; ?>">
								<input type="text" name="customername" id="customername" class="form-control cleardata" value="<?php echo $data_master->billing_master_customer_name; ?>" required style="width:150px;"/>
							
								<div class="customer_list"></div>
							</div>
						    	<div class="col-sm-1">
								<label class="exampleInputEmail1">PHONE NUMBER:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="phonenumber" maxlength="10" id="phon_num" class="form-control cleardata" value="<?php echo $data_master->billing_master_phoneno; ?>" required/>
							</div>
							
						    	<div class="col-sm-1">
								<label class="exampleInputEmail1">ADDRESS:</label>
							</div>
							<div class="col-sm-2">
								<textarea name="address" class="form-control cleardata"  id="address"><?php echo $data_master->billing_master_customer_address;?></textarea>
							</div>
						    
							
						    	<div class="col-sm-1">
								<label class="exampleInputEmail1"> DELIVERY ADDRESS:</label>
							</div>
							<div class="col-sm-2">
								<textarea name="deliveryaddress" class="form-control cleardata" id="deliveryaddress" ><?php echo $data_master->billing_master_delivery_address;?></textarea>
							</div>
							
							
							</div>
							<div class="col-sm-12" style="margin-top:20px;">
							  <div class="col-sm-1">
								<label class="exampleInputEmail1">IS IGST</label>
								</div>
								<div class="col-sm-1">
								<input type="checkbox" name="isigst" value="1" <?php if($data_master->billing_master_is_igst==1){echo 'checked';}?>>
									
								</div>
								<div class="col-sm-1">
									<label class="exampleInputEmail1">GST NUMBER:</label>
								</div>
								<div class="col-sm-2">
									<input type="text" name="gstnumber" id="gst_num" class="form-control cleardata" required pattern=
									"[A-Za-z0-9\s]+" maxlength="15" value="<?php echo $data_master->billing_gst_number; ?>"/>
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
								<th scope="col">MRP</th>
								<th scope="col">TAXABLE VALUE</th>
								<th scope="col">GST %</th>
								<th scope="col">GST AMOUNT</th>
								<th scope="col">TOTAL</th>
								<th scope="col">EMPLOYEE</th>
								
								<!--<th scope="col"><button type="button" class="btn btn-info btn-sm">DELETE</button></th>-->
								<!--<th scope="col"><button type="button" class="btn btn-info btn-sm">CLEAR</button></th>-->
								</tr>
							</thead>
							<tbody id="sales_cont">
                            <?php 

$i=1;

foreach($data_trans as $single){?>
								<tr id="detailRow_<?php echo $i;?>">
								<th scope="row" class="slno"><?php echo $i;?></th>
								<td>
								<input type="hidden" name="purcost[]" class="form-control cleardata" id="pcost_<?php echo $i;?>"
											data-order="<?php echo $i;?>" style="float:left" value="<?php if($single->t_pc==0.00){echo $single->e_pc;}else{echo $single->t_pc;} ?>">
								<input type="hidden" name="itemid[]" class="form-control " id="itemid_<?php echo $i;?>" data-order="1" value="<?php echo $single->billing_item_id;?>" >
								<input type="hidden"  class="form-control cleardata" id="qtyinventory_<?php echo $i;?>"
											data-order="1" style="float:left" value="<?php echo $single->inventory_stock_itemcount;?>">
                                            <input type="hidden" value="<?php echo $single->billing_trans_id ;?>" name="transnedid[]" class="form-control cleardata" id="transid_<?php echo $i;?>"

data-order="<?php echo $i;?>" style="float:left" >
											<input type="hidden"  class="form-control cleardata" id="mop_<?php echo $i;?>"
											data-order="<?php echo $i;?>" style="float:left" value="0" >
											<input type="hidden"  class="form-control cleardata" id="qtymop_<?php echo $i;?>"
											data-order="<?php echo $i;?>" style="float:left" value="0">
								<input type="text" name="itemcode[]" value="<?php echo $single->billing_trans_item_code;?>" class="form-control codeItem cleardata" id="code_<?php echo $i;?>" data-order="<?php echo $i;?>"  >
								<div id="code_list_<?php echo $i;?>" style="position: absolute;z-index: 99;"></div>
								</td>
								<td><input type="text" name="itemname[]" value="<?php echo $single->itm_name;?>" class="form-control cleardata nameItem" id="itemname_<?php echo $i;?>" data-order="<?php echo $i;?>"  required>
								<div id="name_list_<?php echo $i;?>"  style="position: absolute;z-index: 99;"></div>
								</td>
								<td style="width:130px;">
                                <?php 

$itemid=$single->billing_item_id;

$itemvbatchfetch=$this->Admin_model->get_itembatchfeting($itemid);



?>
									<select name="itembatchid[]" class="form-control itemBatch cleardata" id="itembatchid_<?php echo $i;?>" placeholder="Batch" data-order="<?php echo $i;?>" required>
                                    <?php foreach($itemvbatchfetch as $itemvbatchfetch){  ?>
                                        <option value="<?php echo $itemvbatchfetch->batch_id ;?>" <?php if($itemvbatchfetch->batch_id==$single->batch_id ){echo 'selected';}?>><?php echo $itemvbatchfetch->batchcode;?></option>  
                                        <?php } ?>
									</select>
								</td>
								<td>
                                <input type="hidden"  value="<?php echo $single->billing_trans_qty;?>" class="form-control qnty1"   id="peritemqty_<?php echo $i;?>" data-order="<?php echo $i;?>" >
                                <input type="text" name="itemqnty[]" value="<?php echo $single->billing_trans_qty;?>" class="form-control qnty cleardata"   id="itemqty_<?php echo $i;?>" data-order="<?php echo $i;?>" ></td>
								<td><input type="text" name="unitprice[]" value="<?php echo $single->billing_trans_unitprice;?>" class="form-control unitprice cleardata"
											id="unitprice_<?php echo $i;?>" data-order="<?php echo $i;?>" data-toggle="tooltip" trigger="manual"></td>
											<td><input type="text" name="mrp[]" class="form-control mrp cleardata"
											id="mrp_<?php echo $i;?>" data-order="<?php echo $i;?>" data-toggle="tooltip" trigger="manual" value="<?php echo $single->billing_trans_mrp;?>" readonly></td>
								
								<td><input type="text" name="itemtaxable[]" value="<?php echo $single->billing_trans_taxable_value;?>" readonly class="form-control cleardata  taxableAmount" id="taxable_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" ></td>
								<td><input type="text"  name="itemgstper[]" value="<?php echo $single->billing_trans_gst_percentage;?>" readonly class="form-control cleardata "  id="gstper_<?php echo $i;?>" data-order="<?php echo $i;?>" >
								<input type="hidden" name="itemhsncode[]" value="<?php echo $single->billing_trans_hsn_code;?>" class="form-control itemhsncode cleardata" id="hsncode_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" ></td>
								<td><input type="text" name="itemgstamount[]" value="<?php echo $single->billing_trans_gst_amount;?>" readonly class="form-control cleardata gstAmount" id="gstAmount_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" ></td>
								<td><input type="text" name="itemtotalamount[]" value="<?php echo $single->billing_trans_total;?>" readonly class="form-control cleardata totalAmount" id="totalAmount_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" ></td>
								<td>
  
                                <select name="employee[]" class="form-control Employee cleardata"  id="employee_<?php echo $i;?>" data-order="<?php echo $i;?>" >
                                <?php 

$emp=$this->Admin_model->get_staff1();

foreach($emp as $emp){?>
                                <option value="<?php echo $emp->stf_id;?>" <?php if($emp->stf_id==$single->billing_employee_id){echo 'selected';}?>><?php echo $emp->stf_name;?></option>

                                <?php }?>

								</select>
                                
								<input type="hidden" data-order="<?php echo $i;?>" name="incentive_id[]" value="<?php echo $single->billing_incentive_id;?>" id="incentive_<?php echo $i;?>" value="" />
										<input type="hidden" data-order="<?php echo $i;?>" name="incentive_amount[]" value="<?php echo $single->billing_incentive_amount;?>" id="incentiveamt_<?php echo $i;?>" value="" />
								</td>
								
								</tr>
                                <?php $i++; }?>
							
							</tbody>
							</table>
							
						    </div>
						    <div class="col-sm-12" >
						     	<div class="col-sm-6">
						     		<div class="col-sm-12">
						     			<div class="col-sm-2">
										<label class="exampleInputEmail1">NOTE</label>
									</div>
									<div class="col-sm-4">
										<textarea class="form-control cleardata" name="note" id="note"><?php echo $data_master->billing_master_note;?></textarea>
									</div>
									<div class="col-sm-2">
										<label class="exampleInputEmail1">VEHICLE NUMBER:</label>
									</div>
									<div class="col-sm-4">
										<input type="text" name="vehicleno" id="vehiclenumber" class="form-control cleardata" value="<?php echo $data_master->billing_master_vehicleno;?>"/>
									</div>
						     		</div>
						     		<div class="col-sm-12" style="margin-top: 20px;">
						    	
							<div class="col-sm-2">
								<label class="exampleInputEmail1">OUT STANDING</label>
							</div>
							<div class="col-sm-4">
								<input type="hidden" name="outstanding_previous" id="outstanding_previous" value="<?php echo $data_master->billing_master_outstanding;?>" >
								<input type="text" name="outstanding" id="outstanding" class="form-control cleardata" value="<?php echo $data_master->billing_master_outstanding;?>" readonly/>
							</div>
							
							
						</div>
						
						<div class="col-sm-12">
							<div class="col-sm-2">
								<label class="exampleInputEmail1">PAYMENT MODE</label>
							</div>
							<div class="col-sm-10">
								<input type="radio"  class="custom-control-input banktrancheck" id="defaultChecked" name="paymod1" value="1" <?php if($data_master->billing_master_paymentmode==1){ echo 'checked';}?> >
  								 <label class="custom-control-label" for="defaultChecked">BANK TRANSFER</label>

  								  <input type="radio" class="custom-control-input chquecheck" id="defaultChecked" name="paymod1" value="2" <?php if($data_master->billing_master_paymentmode==2){ echo 'checked';}?>>
  								 <label class="custom-control-label" for="defaultChecked" >CHEQUE</label>

  								  <input type="radio" class="custom-control-input emicheck" id="defaultChecked" name="paymod1" value="3" <?php if($data_master->billing_master_paymentmode==3){ echo 'checked';}?>>
  								 <label class="custom-control-label" for="defaultChecked">EMI</label>

  								  <input type="radio" class="custom-control-input bothcheck" id="defaultChecked" name="paymod1" value="4" <?php if($data_master->billing_master_paymentmode==4){ echo 'checked';}?>>
  								 <label class="custom-control-label " for="defaultChecked">BOTH</label>

								 <input type="radio" class="custom-control-input bankcheck" id="defaultChecked" name="paymod1" value="5" <?php if($data_master->billing_master_paymentmode==5){ echo 'checked';}?>>
  								 <label class="custom-control-label " for="defaultChecked">BANK</label>

  								  <input type="radio" class="custom-control-input cashcheck" id="defaultChecked" name="paymod1" value="6" <?php if($data_master->billing_master_paymentmode==6){ echo 'checked';}?>checked>
  								 <label class="custom-control-label" for="defaultChecked">CASH</label>

							</div>
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
								<input type="text" name="cardnumber" value="<?php echo $data_master->billing_master_cardnumber;?>" class="form-control salecardnumber"  style="display: none;" />
								<input type="text" name="chequenum" value="<?php echo $data_master->billing_master_chequenumber;?>"class="form-control saleschequenumber" style="margin-top:10px;display: none;"  />
								<input type="text" name="transcheque"  value="<?php echo $data_master->billing_master_cardnumber;?>" class="form-control salestranscheque" style="margin-top:10px;display: none;"  />
								<input type="text" name="bankamount" value="<?php echo $data_master->billing_master_bankamount;?>" id="bankamount" class="form-control bankamount " style="margin-top:10px;display: none;"  />
								
								<select name="bank" class="form-control bank cleardata" style="margin-top:10px;display: none;">
									<option value="0"></option>
									<?php foreach($bank as $key1){
									?>
										<option value="<?php echo $key1->bank_id;?>" <?php if($data_master->billing_master_bank==$key1->bank_id){echo 'selected';}?>><?php echo $key1->bank_name.'-'.substr($key1->ba_acnumber, -4);?></option>
									<?php 
									}?>
								</select>
								<select name="finance" class="form-control finance cleardata" id="financenew" style="margin-top:10px;display: none;">
									<option value="0"></option>
									<option value="1" >BAJAJ finance</option>
									<option value="2" >HDFC finance</option>
									<option value="3">HDB finance</option>
								</select>
							</div>
						    	<div class="col-sm-2">
								<label class="exampleInputEmail1" style="margin-top:10px;" >AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="paidamount" value="<?php echo $data_master->billing_master_paid_amount;?>" id="paidamount" style="margin-top:10px;" class="form-control cleardata"/>
							</div>
							
						</div>
						
						
					</div>

                        <div class="col-sm-6">
                        	<div class="col-sm-12">
				            <div class="col-sm-2">
								<label class="exampleInputEmail1">DELIVERY CHARGE</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="deliverychare"  value="<?php echo $data_master->billing_master_delivery_charge;?>"id="deliverychare" class="form-control cleardata"/>
							</div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">TOTAL TAXABLE AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="totalTaxableAmount" value="<?php echo $data_master->billing_master_tot_taxable_amount;?>" readonly  id="totalTaxableAmount" class="form-control cleardata"/>
							</div>
								
						</div>
							
							

						   
						    <div class="col-sm-12">
							<div class="col-sm-2">
								<label class="exampleInputEmail1">DISCOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="discount"  value="<?php echo $data_master->billing_master_discount;?>" id="discount" class="form-control cleardata"/>
							</div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">GST AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="amountGst" value="<?php echo $data_master->billing_master_tot_gst_amount;?>" readonly readonly  id="amountGst" class="form-control cleardata"/>
							</div>
							
							
							
						</div>
						<div class="col-sm-12" style="margin-top:10px;">
							<div class="col-sm-6"></div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">ROUND OFF</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="roundOfValuue" value="<?php echo $data_master->billing_master_roundoff;?>" readonly id="roundOfValuue" class="form-control cleardata"/>
							</div>
							
							</div>
							
							<div class="col-sm-12" style="margin-top:10px;">
							<div class="col-sm-6"></div>	
								<div class="col-sm-2">
								<label class="exampleInputEmail1">GRAND TOTAL</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="grandTotal"  value="<?php echo $data_master->billing_master_grandtotal;?>" id="grandTotal" readonly class="form-control cleardata"/>
							</div>
							</div>
							
						</div>
						</div>
						
							</div>
							
								<!---->
							
						
							</div>


							
						</div>
						</form>
					


	</section>

	<script>

function deletechecked() {

if (confirm("Do you really want to delete this Item?")) {

	$('#sales_cont').on('click', '.detailDeleteRow1', function () {
var rowNumber = $(this).data('row');
var id=$(this).data('row');



var sid=$('#sale_id').val();
var tid=$('#transid_'+rowNumber).val();
var item=$('#itemid_'+rowNumber).val();
var batch=$('#itembatchid_'+rowNumber).val();
var itemqty=$('#itemqty_'+rowNumber).val();
	

	// alert(tid);
	

$.ajax({

	type: "POST",
	url: '<?php echo site_url('AdminController/b2bsaleeditdeleterow');?>',
	data: {tid:tid,item:item,batch:batch,itemqty:itemqty
	},

	success: function(res) {

$('#detailRow_' + rowNumber).remove();
var rowStart = 1;
$('.slno').each(function () {
	$(this).html(rowStart); 
	rowStart = rowStart + 1;
});
recalculate();
			var  note=$('#note').val();
			var  vehiclenumber=$('#vehiclenumber').val();
			var  outstanding=$('#outstanding').val();
			var  paymod1=$("input[name='paymod1']:checked").val();
			var  paidamount=$('#paidamount').val();
			var  deliverychare=$('#deliverychare').val();
			var  totalTaxableAmount=$('#totalTaxableAmount').val();
			var  amountGst=$('#amountGst').val();
			var  cessAmount=$('#cessAmount').val();
			var  roundOfValuue=$('#roundOfValuue').val();
			var  grandTotal=$('#grandTotal').val();
			var  discount=$('#discount').val();
		
		$.ajax({

					type: "POST",
					url: '<?php echo site_url('AdminController/b2bsaleeditdeleterowedit');?>',
					data: {note:note,vehiclenumber:vehiclenumber,outstanding:outstanding,
		paymod1:paymod1,paidamount:paidamount,deliverychare:deliverychare,totalTaxableAmount:totalTaxableAmount,
		amountGst:amountGst,cessAmount:cessAmount,roundOfValuue:roundOfValuue,grandTotal:grandTotal,discount:discount,
		sid:sid
					},

					success: function(res) {
						location.reload();
					},

					});
	},

});


});

	return true;

}

else {

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
  });
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
  });



  $('#sales_cont').on('change','.itemBatch',function(){ 	 

//  var id = $(this).data('id');
//  var itemValue = $(this).data('value');
 var id = $(this).data('order');
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
				$('#qtyinventory_'+id).val(obj.inventory_stock_itemcount);
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
			$('#hsncode_'+id).val(obj.hsn_code);
			// if(obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28){
			//     var taxableAmount = (parseInt(obj.t_sr)/(100+(parseInt(obj.hsn_tax)))*100).toFixed(2);
			// }
			

			if ((obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28) ) {//&& ! $('#isigst').is(":checked")
				if(obj.t_sr==0.00){
						var taxableAmount = (parseInt(obj.e_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
					}
					
					// else if(obj.t_sr==0.00 && obj.e_sr==0.00){
					// 	var taxableAmount = (parseInt(obj.d_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
					
					// }
					
					else{
						var taxableAmount = (parseInt(obj.t_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
					}
					
			}
			else {
				if(obj.t_sr==0.00){
						var taxableAmount = (parseInt(obj.e_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
					}
					
					// else if(obj.t_sr==0.00 && obj.e_sr==0.00){
					// 	var taxableAmount = (parseInt(obj.d_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
					
					// }
					
					else{
						var taxableAmount = (parseInt(obj.t_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
					
					}
			}
			var gstAmount = ((taxableAmount*parseInt(obj.hsn_tax))/100).toFixed(2);


			if(obj.t_sr==0.00){
					$('#pcost_' + id).val(obj.e_pc);
				$('#percost_' + id).val(obj.e_pc);
				$('#mop_'+id).val(obj.e_mop);
				$('#unitprice_'+id).val(obj.e_sr);
				$('#totalAmount_' + id).val(obj.e_sr);
				$('#totalAmount_' + id).attr('data-value', obj.e_sr);
				$('#mrp_'+id).val(obj.e_mrp);
				}
				
				// else if(obj.t_sr==0.00 && obj.e_sr==0.00){
				// 	$('#pcost_' + id).val(obj.d_pc);
				// $('#percost_' + id).val(obj.d_pc);
				// $('#mop_'+id).val(obj.d_mop);
				// $('#unitprice_'+id).val(obj.d_sr);
				// $('#totalAmount_' + id).val(obj.d_sr);
				// $('#totalAmount_' + id).attr('data-value', obj.t_sr);
				// }
				
				else{
					$('#pcost_' + id).val(obj.t_pc);
				$('#percost_' + id).val(obj.t_pc);
				$('#mop_'+id).val(obj.t_mop);
				$('#unitprice_'+id).val(obj.t_sr);
				$('#totalAmount_' + id).val(obj.t_sr);
				$('#totalAmount_' + id).attr('data-value', obj.t_sr);
				$('#mrp_'+id).val(obj.t_mrp);
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
		  
			$('#totalTaxableAmount').val(taxableAmount);
			$('.taxableAmount').each(function( index ) {console.log($(this).val());
				 totalTaxableAmount=totalTaxableAmount+parseFloat($(this).val());
			 });
			 $('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
			 $('.gstAmount').each(function( index ) {console.log($(this).val());
				 totalgstAmount=totalgstAmount+parseFloat($(this).val());
			 });
			 $('#amountGst').val(totalgstAmount.toFixed(2));
			 grandTotal = totalTaxableAmount+totalgstAmount;
			 $('#roundOfValuue').val((grandTotal%1).toFixed(2));
			 if($('#deliverychare').val()!=''){
				 deliverycharge = $('#deliverychare').val();
			 }
			 else{
				 deliverycharge = 0;
			 }
			 if($('#discount').val()!=''){
				 discount = $('#discount').val();
			 }
			 else{
				 discount = 0;
			 }
			 $('#grandTotal').val(Math.round(grandTotal+parseInt(deliverycharge)-parseInt(discount)));
			 calc_outstanding();
			//  var paidamount = $('#paidamount').val();
			//     if(paidamount == ''){
			//         paidamount = 0;
			// 	}
			// 	var outstanding_previous = parseInt($('#outstanding_previous').val());
			//     $('#outstanding').val(outstanding_previous + parseInt(grandTotal)+parseInt(deliverycharge)-parseInt(discount)-parseInt(paidamount));
			},
	});
}) ;

 
$('#BtnNewRow').on('click',function(){
      var rowStart = 1;
      $('.slno').each(function () {
				$(this).html(rowStart);
				rowStart = rowStart + 1;
			});
			$newrow=$('#BtnNewRow').data('order')+1;
			$('#BtnNewRow').data('order', $newrow);
      		var current_row = $newrow;
	  //var current_row = parseInt($("#sales_contedit tr").last().attr("data-row")) + 1;

      var new_row ='<tr id="detailRow_'+current_row+'" data-row="'+current_row+'"> <th scope="row" class="slno">'+rowStart+'</th>';
	  new_row+= '<td><input type="hidden" value="0" name="purcost2[]" class="form-control cleardata" id="pcost_'+current_row+'" data-order="'+current_row+'" style="float:left" ><input required type="hidden"  value="0" class="form-control  " id="qtymop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  value="0" class="form-control  " id="qtymop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  class="form-control  " value="0" id="qtyinventory1_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input type="hidden" value="0" name="itemid2[]" class="form-control cleardata" id="itemid_'+current_row+'" data-order="'+current_row+'"  ><input type="text" name="itemcode2[]" class="form-control cleardata codeItem" id="code_'+current_row+'" data-order="'+current_row+'" ><div id="code_list_'+current_row+'"></div></td>';
      new_row+= '<td><input type="text" name="itemname2[]" class="form-control cleardata nameItem" id="itemname_'+current_row+'" data-order="'+current_row+'" ><div id="name_list_'+current_row+'"></div></td>';
      new_row += '<td style="width:130px;"><select name="itembatchid2[]" class="form-control cleardata itemBatch" id="itembatchid_'+current_row+'" data-order="'+current_row+'" placeholder="Batch"><option value="">Select Batch</option></select></td>';
      new_row+= '<td><input type="text" value="0" name="itemqnty2[]" class="form-control cleardata qnty" id="itemqty_'+current_row+'" data-order="'+current_row+'" ></td>';
      new_row += '<td><input required type="text" value="0" name="unitprice2[]" class="form-control unitprice cleardata " data-toggle="tooltip" trigger="manual" id="unitprice_' + current_row + '" data-order="' + current_row + '" ></td>';
	  new_row += '<td><input required type="text"  value="0" name="mrp2[]" class="form-control mrp cleardata " data-toggle="tooltip" trigger="manual" id="mrp_' + current_row + '" data-order="' + current_row + '" readonly ></td>';
			
	  new_row+= '<td><input type="text" value="0" name="itemtaxable2[]" readonly class="form-control cleardata taxableAmount" id="taxable_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
      new_row+= '<td><input type="text" value="0" name="itemgstper2[]" readonly class="form-control cleardata cleardatal" id="gstper_'+current_row+'" data-order="'+current_row+'"><input type="hidden" name="itemhsncode2[]" class="form-control itemhsncode" id="hsncode_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
      new_row+= '<td><input type="text" value="0" name="itemgstamount2[]" readonly class="form-control cleardata gstAmount" id="gstAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><input type="text" value="0" name="itemtotalamount2[]" readonly class="form-control cleardata totalAmount" id="totalAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><select name="employee2[]" class="form-control Employee cleardata" id="employee_' + current_row + '" data-order="' + current_row + '" ><?php echo $namelist;?></select></td>';
      
	  new_row+='<input type="hidden" value="0" data-order="' + current_row + '" name="incentive_id2[]" id="incentive_' + current_row + '" value=""/><input type="hidden" data-order="' + current_row + '" name="incentive_amount2[]" id="incentiveamt_' + current_row + '" value=""/>'
			new_row += '<td>';
      new_row+= '<i data-row="'+current_row+'" class="fa fa-eraser detailEraseRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer;margin-right: 7px"></i>';
      new_row+= '<i data-row="'+current_row+'" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
      new_row+= '</td></tr>';

      $('#sales_cont').append(new_row);
      //console.log(current_row);
      $('#BtnNewRow').data('order',current_row);
      
  })

  $(function () {
    $('#example2').DataTable({
       dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5'
        ]
    })
  })

  
  function recalculate() {
			var totalTaxableAmount = 0;
			var totalcessAmount = 0;
			var totalgstAmount = 0;
			var grandTotal = 0;
			var deliverycharge = 0;
			var discount = 0;

			$('.taxableAmount').each(function (index) {
				if ($(this).val() != '') {
					totalTaxableAmount = totalTaxableAmount + parseFloat($(this).val());
				}
			});
			$('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
			$('.cessAmount').each(function (index) {
				if ($(this).val() != '') {
					totalcessAmount = totalcessAmount + parseFloat($(this).val());
				}
			});
			$('#cessAmount').val(totalcessAmount.toFixed(2));
			$('.gstAmount').each(function (index) {
				if ($(this).val() != '') {
					totalgstAmount = totalgstAmount + parseFloat($(this).val());
				}
			});
			$('#amountGst').val(totalgstAmount.toFixed(2));
			grandTotal = totalTaxableAmount + totalcessAmount + totalgstAmount;
			$('#roundOfValuue').val((grandTotal % 1).toFixed(2));
			if ($('#deliverychare').val() != '') {
				deliverycharge = $('#deliverychare').val();
			}
			else {
				deliverycharge = 0;
			}
			if ($('#discount').val() != '') {
				discount = $('#discount').val();
			}
			else {
				discount = 0;
			}
			$('#grandTotal').val(Math.round(grandTotal + parseInt(deliverycharge) - parseInt(discount)));
			
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

	 
  
	$('#sales_cont').on('click', '.detailDeleteRow', function () {
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
  
  //===========================================================================


  $('#sales_cont').on('click','.subSelect_itemedit',function(){
			var id = $(this).data('id');
			var itemValue = $(this).data('value');
			$('#code_list_'+id).hide();
			$('#name_list_'+id).hide();
			$.ajax({
					type:"POST",
					url:'<?php echo site_url('Admin/getBatchByItem');?>',
					data: { itemValue : itemValue},
						success:function(res){
							var batchlist = JSON.parse(res);
							//console.log(batchlist);
							var i;
							var optiondata= '<option value="">Select</option>';
							for(i=0;i<batchlist.length;i++){
								
								optiondata += '<option value="'+batchlist[i].batch_id+'">'+batchlist[i].batchcode+'('+batchlist[i].cur_stock_item_count+')</option>';

							}
							
							$('#itembatchid_'+id).html(optiondata);
							$('#code_'+id).val(batchlist[0].itm_code);
							$('#itemname_'+id).val(batchlist[0].itm_name);
						}
			})
  })

  
  //Dynamic Row Adding Code




  
   //Dynamic Row Adding Code
  
  $('#sales_cont').on('keyup','.gstAmount',function(){
      var gstAmount = 0;
      $('.gstAmount').each(function(){
          if($(this).val() != ''){
            gstAmount = parseInt(gstAmount) + parseInt($(this).val());
          }
      });
      
      $('#amountGst').val(gstAmount);
  })
  
  
  $('#sales_cont').on('keyup','.totalAmount',function(){
      var totalAmount = 0;
      $('.totalAmount').each(function(){
          if($(this).val() != ''){
            totalAmount = parseInt(totalAmount) + parseInt($(this).val());
          }
      });
      $('#totalAmount').val(totalAmount);
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




  $('#sales_cont').on('keyup', '.unitprice', function () {
		//Compare with item_mop <

		var id = $(this).data('order');
		var unitprice = $(this).val();
				
		
		var qnty = $('#itemqty_'+id).val();
		var mop = $('#qtymop_'+id).val() / (qnty || 1);
		var minmop=$('#pcost_'+id).val();
		//var pcost=$('#pcost_1')

				
		if(parseFloat(unitprice)<=parseFloat(minmop)){

			//alert("Total amount is greater than Item MOP : '"+mop+"'");
			$('#unitprice_'+id).css("border","2px solid red");
			$('#unitprice_'+id).css("color","red");
			
			$('#unitprice_'+id).attr('title', "Total amount is less than Item Purchase Cost : '"+minmop+"'")
										.tooltip('fixTitle')
										.tooltip('show');  

			

							
		}
		else{ 

			$('#unitprice_'+id).css("border","1px solid #ccc");
			$('#unitprice_'+id).css("color","#555");
			$('#unitprice_'+id).tooltip('hide');
			$('#unitprice_'+id).attr('data-original-title', '');


			var item_hsn_tax = $('#gstper_'+id).val();
			var taxableAmount = 0; 
			if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
				var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
			}
			else {
				var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
			}
			var gstAmount = ((taxableAmount * parseInt(item_hsn_tax)) / 100).toFixed(2);
			if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
						var cessAmount = (taxableAmount / 100).toFixed(2);
			}
			else {
						var cessAmount = 0;
			}
		

			var gstsubtotal = qnty * gstAmount;
			var cesssubtotal = qnty * cessAmount;
			var itemsubtotal = qnty * unitprice ;
			var taxablesubtotal = qnty * taxableAmount;

			$('#taxable_' + id).val((taxablesubtotal).toFixed(2));	
			$('#gstAmount_' + id).val((gstsubtotal).toFixed(2));
			$('#cessAmount_' + id).val((cesssubtotal).toFixed(2));
			$('#totalAmount_' + id).val((itemsubtotal).toFixed(2));	
			
			recalculate();
			
		}

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
 //$('#sales_cont').on('click','.subSelect_itemedit',function(){

 
$('#deliverychare').on('keyup',function(){
    recalculate();
});

$('#discount').on('keyup',function(){
    recalculate();
});
 
$('#sales_cont').on('keyup','.qnty',function(){
    var qnty = $(this).val();
    var order = $(this).data('order');
	var inqty=$('#qtyinventory_'+order).val();
    var totalTaxableAmount = 0;
    var totalgstAmount = 0;
    var deliverycharge = 0;
    var discount = 0;
	var unitprice=$('#unitprice_'+order).val();
	//alert(unitprice);
	var inqty=$('#qtyinventory_'+order).val();
	if(parseInt(inqty)>=parseInt(qnty)){
				$('#itemqty_'+order).css({"border":"1px solid #d2d6de"});
			}else if(parseInt(inqty)<parseInt(qnty)){
				$('#itemqty_'+order).css({"border":"1px solid red"});
			
			}
	if(parseInt(inqty)<parseInt(qnty)){
				$('#itemqty_'+order).css({"border":"1px solid red"});
			}else if(parseInt(inqty)>parseInt(qnty)){
				$('#itemqty_'+order).css({"border":"1px solid #d2d6de"});
			}
    if(qnty != '' && qnty!=0){
    


			var item_hsn_tax = $('#gstper_'+order).val();
			var taxableAmount = 0; 
			if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
				var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
			}
			else {
				var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
			}
			var gstAmount = ((taxableAmount * parseInt(item_hsn_tax)) / 100).toFixed(2);
			if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
						var cessAmount = (taxableAmount / 100).toFixed(2);
			}
			else {
						var cessAmount = 0;
			}
		

			var gstsubtotal = qnty * gstAmount;
			var cesssubtotal = qnty * cessAmount;
			var itemsubtotal = qnty * unitprice ;
			var taxablesubtotal = qnty * taxableAmount;

			$('#taxable_' + order).val((taxablesubtotal).toFixed(2));	
			$('#gstAmount_' + order).val((gstsubtotal).toFixed(2));
			$('#cessAmount_' + order).val((cesssubtotal).toFixed(2));
			$('#totalAmount_' + order).val((itemsubtotal).toFixed(2));	
			
			recalculate();
		
    }
    
});

$('#sales_cont').on('keyup','.totalAmount',function(){
    if($(this).val()!=''){console.log($(this).val());
        var srate = parseInt($(this).val());
    }
    else{
       var srate =0;
    }
    var id = $(this).data('order');
    var tax = parseInt($('#gstper_'+id).val());
    $('#totalAmount_'+id).attr('data-value',$('#totalAmount_'+id).val());
    var totalTaxableAmount = 0;
    var totalgstAmount = 0;
    var grandTotal = 0;
    var deliverycharge = 0;
    var discount = 0;
    if(tax == 12 || tax == 18 || tax == 28){
	    var taxableAmount = (srate/(100+tax)*100).toFixed(2);
	}
	var gstAmount = ((taxableAmount*tax)/100).toFixed(2);
	
    $('#taxable_'+id).val(taxableAmount);
    $('#taxable_'+id).attr('data-value',taxableAmount);
    $('#gstAmount_'+id).val(gstAmount);
    $('#gstAmount_'+id).attr('data-value',gstAmount);
    $('#itemqty_'+id).val(1);
    $('#gstper_'+id).val(tax);
    $('#totalAmount_'+id).val(srate);
    $('#totalAmount_'+id).attr('data-value',srate);
    $('#totalTaxableAmount').val(taxableAmount);
    $('.taxableAmount').each(function( index ) {
         totalTaxableAmount=totalTaxableAmount+parseFloat($(this).val());
     });
     $('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
     $('.gstAmount').each(function( index ) {
         totalgstAmount=totalgstAmount+parseFloat($(this).val());
     });
     $('#amountGst').val(totalgstAmount.toFixed(2));
     grandTotal = totalTaxableAmount+totalgstAmount;
     $('#roundOfValuue').val((grandTotal%1).toFixed(2));
     if($('#deliverychare').val()!=''){
         deliverycharge = $('#deliverychare').val();
     }
     else{
         deliverycharge = 0;
     }
     if($('#discount').val()!=''){
         discount = $('#discount').val();
     }
     else{
         discount = 0;
     }
     $('#grandTotal').val(Math.round(grandTotal+parseInt(deliverycharge)-parseInt(discount)));
	 calc_outstanding();
    //  var paidamount = $('#paidamount').val();
    // if(paidamount == ''){
    //     paidamount = 0;
	// }
	// var outstanding_previous = parseInt($('#outstanding_previous').val());
    // $('#outstanding').val(outstanding_previous + parseInt(grandTotal)+parseInt(deliverycharge)-parseInt(discount)-parseInt(paidamount));
});
$('#b2bsalesaerch').on('keyup',function(){
var variable=$(this).val();
if(variable!=""){
$.ajax({
			type: "POST",
			url: '<?php echo site_url('AdminController/get_b2bbillsearch');?>',
			data: {
				variable: variable
			},
			success: function(res) {
				if(res){
									//vineeth---
									$('#saleb2bbody').show();
									$('#saleb2bbody').html(res);
								}else{
									$('#saleb2bbody').html("");
								}
				
			},
		});
}else{
	location.reload();
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

$('#cust_search').on('click','.custsearchmodal', function () {

	$.ajax({

type:"POST",

url:'<?php echo site_url('AdminController/getcustomerfetchingnew');?>',


	success:function(res){

	console.log(res);

	//alert(res);

if (res) {



$('#searchcust').html(res);



} 

	},

});	
				
	$('#custsearch_modal').modal('show');
			
});
$('#customersearchinput').on('keyup',function(){
		    var val=$(this).val();
		   
		    	$.ajax({
				type: "POST",
				url: '<?php echo site_url('Admin/searchcustomermodaladmin');?>',
				data: { itemValue: val,},
				success: function (res) {
				    $('#searchcust').html(res);
				}
		    });
});
$("html").on('click','.customersearchlist',function(){
				$('#custsearch_modal button.close').click();
			 	$('#customername').val($(this).data('id'));
				 $('#customerid').val($(this).data('cusid'));
			  	$('#phon_num').val($(this).data('phone_num'));
				$('#address').val($(this).data('address'));
				$('#outstanding_previous').val($(this).data('outstanding'));
				$('#outstanding').val($(this).data('outstanding'));
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
  $(".reset").bind("click", function() {
		$(".cleardata").val("");
		});
  $('#sales_cont').on('change','.Employee',function(){ 
	var order = $(this).data('order');
	var batchid=$("#itembatchid_"+order).val();
	var itemid=$('#itemid_'+order).val();

	var itemqty=$('#itemqty_'+order).val();
	var unit_price=$('#unitprice_'+order).val();
	
	  $.ajax({

				type: "POST",
				url: '<?php echo site_url('Admin/getbath_incentives');?>',
				data: {
					batchid:batchid,
					itemid:itemid


				},

				success: function(res) {
					console.log(res);
					var obj = JSON.parse(res);
					if(obj.incentive_type==1)
					{
						$('#incentive_'+order).val(obj.id);
						$('#incentiveamt_'+order).val(obj.in_peramount);
						// console.log(obj.in_peramount);
					}
					else if(obj.incentive_type==2)
					{
						$('#incentive_'+order).val(obj.id);
						var incentive_amount=(unit_price*obj.in_peramount/100)*itemqty;
						$('#incentiveamt_'+order).val(incentive_amount);
						console.log(obj.in_peramount);
					}
					else 
					{
						
						if(parseInt(unit_price)==parseInt(obj.range1))
						{
							if(obj.r1_type=1)
							{
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(obj.r1_amount);
							}
							else{
								var incentive_amountr1=(unit_price*obj.r1_amount/100)*itemqty;
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentive_amountr1);
							}

						}
						else if(parseInt(obj.range1)<parseInt(unit_price) && parseInt(obj.range2)>=parseInt(unit_price))
						{
							
							if(obj.r2_type=1)
							{
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(obj.r2_amount);
							}
							else{
								var incentive_amountr2=(unit_price*obj.r2_amount/100)*itemqty;
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentive_amountr2);
							}

						}
						else if(parseInt(obj.range2)<parseInt(unit_price) && parseInt(obj.range3)>=parseInt(unit_price))
						{
							if(obj.r3_type=1)
							{
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(obj.r3_amount);
							}
							else{
								var incentive_amountr3=(unit_price*obj.r3_amount/100)*itemqty;
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentive_amountr3);
							}

						}
						else if(parseInt(obj.range3)<parseInt(unit_price)){
							//alert(unit_price);alert(obj.range3);
							
							if(obj.r4_type=1)
							{
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(obj.r4_amount);
							}
							else{
								var incentive_amountr4=(unit_price*obj.r4_amount/100)*itemqty;
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentive_amountr4);
							}

						}else{
							$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(0);
						}

					}
					//$('.salesedit_content').append(res);
				},

			});
	
});

$('#sales_cont').on('click','.editrowb2bsale',function(){
 
 var id=$(this).data('row');
 var code=$('#code_'+id).val();
 var itemqty=$('#itemqty_'+id).val();
 var taxable=$('#taxable_'+id).val();
 var hsncode=$('#hsncode_'+id).val();
 var gstper=$('#gstper_'+id).val();
 var gstamount=$('#gstAmount_'+id).val();
 var inventorystock=$('#qtyinventory_'+id).val();

 var total=$('#totalAmount_'+id).val();
 var item=$('#itemid_'+id).val();
 var batch=$('#itembatchid_'+id).val();
 var employee=$('#employee_'+id).val();
 var unitprice=$('#unitprice_'+id).val();
 var inceid=$('#incentive_'+id).val();
 var inamount=$('#incentiveamt_'+id).val();
 var mrp=$('#mrp_'+id).val();
 var tid=$('#transid_'+id).val();
 var sid=$('#sale_id').val();
 var oqty=$('#peritemqty_'+id).val();

 var  note=$('#isigst').val();
	var  vehiclenumber=$('#vehiclenumber').val();
	var  outstanding=$('#outstanding').val();
	var  paymod1=$("input[name='paymod1']:checked").val();
	var  paidamount=$('#paidamount').val();
	var  deliverychare=$('#deliverychare').val();
	var  totalTaxableAmount=$('#totalTaxableAmount').val();
	var  amountGst=$('#amountGst').val();
	
	var  roundOfValuue=$('#roundOfValuue').val();
	var  grandTotal=$('#grandTotal').val();
	var  discount=$('#discount').val();
   
    

    if(parseInt(inventorystock)>=parseInt(itemqty)){
        $.ajax({

type: "POST",
url: '<?php echo site_url('AdminController/b2bsaletranseditnew');?>',
data: {
	code:code,itemqty:itemqty,taxable:taxable,hsncode:hsncode,gstper:gstper,gstamount:gstamount,
	total:total,item:item,batch:batch,employee:employee,unitprice:unitprice,inceid:inceid,inamount:inamount,
	mrp:mrp,tid:tid,note:note,vehiclenumber:vehiclenumber,outstanding:outstanding,sid:sid,oqty:oqty,
					paymod1:paymod1,paidamount:paidamount,deliverychare:deliverychare,totalTaxableAmount:totalTaxableAmount,
					amountGst:amountGst,roundOfValuue:roundOfValuue,grandTotal:grandTotal,discount:discount,inventorystock:inventorystock
},

success: function(res) {
	console.log(res);
	location.reload();
},

});
    }else{
alert("stock not available");
    }


 //alert(tid);



});

$('#savemasterchange').on('click',function(){
    var id=$('#sale_id').val();
	var billdate=$('#billdate').val();
	var ewaybillnum=$('#ewaybillnumber').val();
	
	var customername=$('#customername').val();
	var customerid=$('#customerid').val();
	var phon_num=$('#phon_num').val();
	var address=$('#address').val();
	var deliveryaddress=$('#deliveryaddress').val();
	
	var financenew=$('#financenew').val();
	if ($('#isigst').is(":checked")){
	//	var isigst=$('#isigst').val();
	var isigst=1;
	}else{
		var isigst=0;
	}
	//alert(isigst);

	var  note=$('#note').val();
	var  vehiclenumber=$('#vehiclenumber').val();
	var  outstanding=$('#outstanding').val();
	var  paymod1=$("input[name='paymod1']:checked").val();
	var  paidamount=$('#paidamount').val();
	var  deliverychare=$('#deliverychare').val();
	var  totalTaxableAmount=$('#totalTaxableAmount').val();
	var  amountGst=$('#amountGst').val();
	
	var  roundOfValuue=$('#roundOfValuue').val();
	var  grandTotal=$('#grandTotal').val();
	var  discount=$('#discount').val();




			$.ajax({

				type: "POST",
				url: '<?php echo site_url('AdminController/b2bsaleeditnew');?>',
				data: {
					id: id,billdate:billdate,ewaybillnum:ewaybillnum,customername:customername,
					customerid:customerid,phon_num:phon_num,address:address,deliveryaddress:deliveryaddress,
					financenew:financenew,isigst:isigst,note:note,vehiclenumber:vehiclenumber,outstanding:outstanding,
					paymod1:paymod1,paidamount:paidamount,deliverychare:deliverychare,totalTaxableAmount:totalTaxableAmount,
					amountGst:amountGst,roundOfValuue:roundOfValuue,grandTotal:grandTotal,discount:discount
				},

				success: function(res) {
					console.log(res);
					location.reload();
				},

			});


});

$(document).ready(function(){
		$('form').attr('autocomplete', 'off');
});

</script>
<script>
 function validateForm() {
	var rowCount = $("#sales_cont > tr").length;
	var i;
	var unitprice
for(i=1;i<=rowCount;i++){
	 unitprice=document.getElementById('unitprice_'+i+'').value;
	 var minmop=document.getElementById('pcost_'+i+'').value;
	 var stock=document.getElementById('qtyinventory1_'+i+'').value;
	 var qty=document.getElementById('itemqty_'+i+'').value;
	 if(parseFloat(unitprice)<=parseFloat(minmop)){
		 alert("Please enter unit price is grater than purchase cost");
		return false; 
	 }else{
		$('#myFormId').submit(function(){
    $("#saveonly", this)
      .html("Please Wait...")
      .attr('disabled', 'disabled');
    return true;
});
$('#myFormId').submit(function(){
    $("#saveprint", this)
      .html("Please Wait...")
      .attr('disabled', 'disabled');
    return true;
}); 
	 }
	 alert(qty);alert(stock);
	 if(parseInt(qty)>parseInt(stock)){
		alert("Stock is not available");
		return false; 
	 }else{
		$('#myFormId').submit(function(){
    $("#saveonly", this)
      .html("Please Wait...")
      .attr('disabled', 'disabled');
    return true;
});
$('#myFormId').submit(function(){
    $("#saveprint", this)
      .html("Please Wait...")
      .attr('disabled', 'disabled');
    return true;
}); 
	 }
	
}
	}
</script>
	</body>

	</html>