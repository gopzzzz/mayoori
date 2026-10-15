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
	input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>

<?php
/*** begin the session ***/
session_start();
 
/*** create the form token ***/
$form_token = uniqid();
 
/*** add the form token to the session ***/
$_SESSION['form_token'] = $form_token;
?>

<?php $data['leftmenu']='saleswindow';$data['mainmenu'] = 'transaction'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



	<!-- Content Header (Page header) -->

	<section class="content-header">

		<h1 align="center">Sale<small>Preview</small></h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">Sale</a></li>

		</ol>

	</section><br>



	<!-- Main content -->

	<section class="content">
		
		
    <div class="modal" tabindex="-1" role="dialog" id="stockgodownmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Check Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <table class="table table-bordered">
		 <thead>
			 <th>Branch</th>
			 <th>Godown</th>
		 </thead>
		
		 <tbody>
			 <tr id="branchAndgodown"></tr>
		 </tbody>
	 </table>
      </div>
     
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
					
					<form name="myForm" onsubmit="return validateForm()" method="post" action="<?php echo site_url('Admin/b2badd');?>">
					<input type="hidden" name="token" readonly class="form-control cleardata" value="<?php echo $token;?>" />
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button> 
								<h4 class="modal-title">B2B</h4>
							</div>
							
							<div class="col-sm-12" style="margin-top:20px;">
							<div class="col-sm-1">
								<label class="exampleInputEmail1">BILL NO:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="billno" readonly class="form-control cleardata" value="<?php if($bilb2b->mycount==0){ echo $this->session->userdata('b2b');echo "1"; } else{ echo  $this->session->userdata('b2b'); echo $last_bill_number->billing_master_billno+1;} ?>" />
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">BILL DATE:</label>
							</div>
							<div class="col-sm-2">
								<input type="date" name="billdate" class="form-control cleardata" value="<?php echo date('Y-m-d');?>"/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">EWAY BILL NUMBER</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="ewaybillno" class="form-control cleardata" />
							</div>
							
							<div class="col-sm-1">
								<label class="exampleInputEmail1">STATE CODE</label>
							</div>
							<div class="col-sm-2">
								<select name="stcode" class="form-control cleardata" required>
									<option value="0">SELECT</option>
									<?php foreach($statecode as $state): ?>
        						       <option value="<?php echo $state->state_id; ?>"><?php echo $state->state_code; ?></option>
								     <?php endforeach; ?>
								</select>
							</div>

						    </div>
						    <div class="col-sm-12" style="margin-top: 10px;">
							<div class="col-sm-1">
								<label class="exampleInputEmail1">CUSTOMER NAME:</label>
							</div>
							<div class="col-sm-2"  id="cust_search" >
							    <input type="hidden" name="customerloginid" id="customerid">
								<input type="text" name="customername" id="customername" class="form-control searchcus cleardata" required style="width:150px;"/>
								
								<div id="customer_list"></div>
							</div>
						    	<div class="col-sm-1">
								<label class="exampleInputEmail1">PHONE NUMBER:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="phonenumber" maxlength="10" minlength="10" id="phon_num" class="form-control cleardata" required/>
							</div>
							
						    	<div class="col-sm-1">
								<label class="exampleInputEmail1">ADDRESS:</label>
							</div>
							<div class="col-sm-2">
								<textarea name="address" class="form-control cleardata"  id="address"></textarea>
							</div>
						    
							
						    	<div class="col-sm-1">
								<label class="exampleInputEmail1"> DELIVERY ADDRESS:</label>
							</div>
							<div class="col-sm-2">
								<textarea name="deliveryaddress" class="form-control cleardata" ></textarea>
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
									<input type="text" name="gstnumber" id="gst_num" class="form-control cleardata" required pattern=
									"[A-Za-z0-9\s]+" maxlength="15" minlength="15"/>
								</div>
								

							</div>
						    
							
						    <div class="col-sm-12" style="margin-top: 20px;">
						    	
							<table class="table">
							
							<thead>
							
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
								<th scope="col"></th>
								<!--<th scope="col"><button type="button" class="btn btn-info btn-sm">DELETE</button></th>-->
								<!--<th scope="col"><button type="button" class="btn btn-info btn-sm">CLEAR</button></th>-->
								
							</thead>
							<tbody id="sales_cont">
								<tr id="detailRow_1" data-row="1">
								<th scope="row" class="slno">1</th>
								<td>
								<input type="hidden" name="purcost[]" class="form-control cleardata" id="pcost_1"
											data-order="1" style="float:left" value="0">
								<input type="hidden" name="itemid[]" class="form-control " id="itemid_1" data-order="1" value="0" >
								<input type="hidden"  class="form-control cleardata" id="qtyinventory_1"
											data-order="1" style="float:left" value="0">
											<input type="hidden"  class="form-control cleardata" id="mop_1"
											data-order="1" style="float:left" value="0" >
											<input type="hidden"  class="form-control cleardata" id="qtymop_1"
											data-order="1" style="float:left" value="0">
								<input type="text" name="itemcode[]" class="form-control codeItem cleardata" id="code_1" data-order="1"  >
								<div id="code_list_1" style="position: absolute;z-index: 99;"></div>
								</td>
								<td><input type="text" name="itemname[]" class="form-control cleardata nameItem" id="itemname_1" data-order="1"  required>
								<div id="name_list_1"  style="position: absolute;z-index: 99;"></div>
								</td>
								<td style="width:130px;">
								<select name="itembatchid[]" required style="display:none;" class="form-control itemBatch cleardata" id="itembatchid_1" placeholder="Batch" data-order="1" required>
											<option value="">Select Batch</option>  
										</select>
										<input type="hidden" name="batchidd" class="form-control batchidd" id="batchidd_1">
										<input type="text" name="batchcode" class="form-control batchcode" id="batchcode_1" data-order="1">
										<div id="batchlist_1" style="position: absolute;z-index: 99;"></div>
								</td>
								<td><input step=".01"  type="text" min="0" required name="itemqnty[]"  class="form-control qnty cleardata"   id="itemqty_1" data-order="1" ></td>
								<td><input type="text" name="unitprice[]"  class="form-control unitprice cleardata"
											id="unitprice_1" data-order="1" data-toggle="tooltip" trigger="manual"></td>
											<td><input type="text" name="mrp[]" class="form-control mrp cleardata"
											id="mrp_1" data-order="1" data-toggle="tooltip" trigger="manual"  ></td>
								
								<td><input type="text" name="itemtaxable[]" value="0" readonly class="form-control cleardata  taxableAmount" id="taxable_1" data-value="" data-order="1" ></td>
								<td><input type="text"  name="itemgstper[]" value="0" readonly class="form-control cleardata "  id="gstper_1" data-order="1" >
								<input type="hidden" name="itemhsncode[]" value="0" class="form-control itemhsncode cleardata" id="hsncode_1" data-value="" data-order="1" ></td>
								<td><input type="text" name="itemgstamount[]" value="0" readonly class="form-control cleardata gstAmount" id="gstAmount_1" data-value="" data-order="1" ></td>
								<td><input type="text" name="itemtotalamount[]" value="0" readonly class="form-control cleardata totalAmount" id="totalAmount_1" data-value="" data-order="1" ></td>
								<td><select name="employee[]" class="form-control Employee cleardata"  id="employee_1" data-order="1" >
									<?php echo $namelist;?>

								</select>
								<input type="hidden" data-order="1" name="incentive_id[]" value="0" id="incentive_1" value="" />
										<input type="hidden" data-order="1" name="incentive_amount[]" value="0" id="incentiveamt_1" value="" />
								</td>
								<td>
								<i class="fa fa-cubes checkstock" data-row="1" id="checkstock_1" aria-hidden="true"
											style="font-size:15px;margin-top: 10px;cursor:pointer"></i>
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
										<textarea class="form-control cleardata" name="note"></textarea>
									</div>
									<div class="col-sm-2">
										<label class="exampleInputEmail1">VEHICLE NUMBER:</label>
									</div>
									<div class="col-sm-4">
										<input type="text" name="vehicleno" class="form-control cleardata" />
									</div>
						     		</div>
						     		<div class="col-sm-12" style="margin-top: 20px;">
						    	
							<div class="col-sm-2">
								<label class="exampleInputEmail1">OUT STANDING</label>
							</div>
							<div class="col-sm-4">
								<input type="hidden" name="outstanding_previous" id="outstanding_previous" value="0" >
								<input type="text" name="outstanding" id="outstanding" class="form-control cleardata" readonly/>
							</div>
							
							
						</div>
						
						<div class="col-sm-12">
							<div class="col-sm-2">
								<label class="exampleInputEmail1">PAYMENT MODE</label>
							</div>
							<div class="col-sm-10">
								<input type="radio"  class="custom-control-input banktrancheck" id="defaultChecked" name="paymod1" value="1" >
  								 <label class="custom-control-label" for="defaultChecked">BANK TRANSFER</label>

  								  <input type="radio" class="custom-control-input chquecheck" id="defaultChecked" name="paymod1" value="2">
  								 <label class="custom-control-label" for="defaultChecked" >CHEQUE</label>

  								  <input type="radio" class="custom-control-input emicheck" id="defaultChecked" name="paymod1" value="3">
  								 <label class="custom-control-label" for="defaultChecked">EMI</label>

  								  <input type="radio" class="custom-control-input bothcheck" id="defaultChecked" name="paymod1" value="4">
  								 <label class="custom-control-label " for="defaultChecked">BOTH</label>

								 <input type="radio" class="custom-control-input bankcheck" id="defaultChecked" name="paymod1" value="5">
  								 <label class="custom-control-label " for="defaultChecked">BANK</label>

  								  <input type="radio" class="custom-control-input cashcheck" id="defaultChecked" name="paymod1" value="6" checked>
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
								<input type="text" name="cardnumber" class="form-control salecardnumber"  style="display: none;" value="0"  />
								<input type="text" name="chequenum" class="form-control saleschequenumber" style="margin-top:10px;display: none;"  value="0" />
								<input type="text" name="transcheque" class="form-control salestranscheque" style="margin-top:10px;display: none;" value="0"  />
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
						    	<div class="col-sm-2">
								<label class="exampleInputEmail1" style="margin-top:10px;" >AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" required  name="paidamount" id="paidamount" style="margin-top:10px;" class="form-control cleardata"/>
							</div>
							
						</div>
						
						
					</div>

                        <div class="col-sm-6">
                        	<div class="col-sm-12">
				            <div class="col-sm-2">
								<label class="exampleInputEmail1">DELIVERY CHARGE</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="deliverychare"  id="deliverychare" class="form-control cleardata"/>
							</div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">TOTAL TAXABLE AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="totalTaxableAmount"  readonly  id="totalTaxableAmount" class="form-control cleardata"/>
							</div>
								
						</div>
							
							

						   
						    <div class="col-sm-12">
							<div class="col-sm-2">
								<label class="exampleInputEmail1">DISCOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="discount"   id="discount" class="form-control cleardata"/>
							</div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">GST AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="amountGst" readonly readonly  id="amountGst" class="form-control cleardata"/>
							</div>
							
							
							
						</div>
						<div class="col-sm-12" style="margin-top:10px;">
							<div class="col-sm-6"></div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">ROUND OFF</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="roundOfValuue" readonly id="roundOfValuue" class="form-control cleardata"/>
							</div>
							
							</div>
							
							<div class="col-sm-12" style="margin-top:10px;">
							<div class="col-sm-6"></div>	
								<div class="col-sm-2">
								<label class="exampleInputEmail1"> TOTAL AMT:</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="grandTotal"  id="grandTotal" readonly class="form-control cleardata"/>
							</div>

							<div class="col-sm-6"></div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">TCS </label>
								<input type="checkbox" name="checktcs" class="ticktcs">
							</div>
							<div class="col-sm-4">
								<input type="text" name="tcscharge"   value="0" id="tcscharge" readonly class="form-control cleardata"/>
							</div>
							

							<div class="col-sm-6"></div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">GRAND TOTAL: </label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="totalamount"   id="totalamount" readonly class="form-control cleardata"/>
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
									
								<button type="submit" id="saveprint" class="btn btn-primary btn-sm">SAVE & PRINT</button>
						
							
								<button type="submit" id="saveonly" class="btn btn-success btn-sm" >SAVE</button>
						
							
								<button type="button" class="btn btn-sm">VIEW</button>
						
							
								<button type="button" class="btn btn-warning btn-sm reset">CLEAR</button>
						
						
								<button type="button" class="btn btn-danger btn-sm">DELETE</button>
						
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
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>


	</section>
    <script>

		function deletechecked() {

			if (confirm("Do you really want to delete this sales?")) {

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
			$('#hsncode_'+id).val(obj.hsn_code);
			
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

			if ((obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28) ) {//&& ! $('#isigst').is(":checked")
				if(obj.t_sr==0.00){
						var taxableAmount = (parseFloat(obj.e_sr) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
					}
			
					
					else{
						var taxableAmount = (parseFloat(obj.t_sr) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
					}
					
			}
			else {
				if(obj.t_sr==0.00){
						var taxableAmount = (parseFloat(obj.e_sr) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
					}
					
				
					
					else{
						var taxableAmount = (parseFloat(obj.t_sr) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
					
					}
			}
			var gstAmount = ((taxableAmount*parseFloat(obj.hsn_tax))/100).toFixed(2);


			if(obj.t_sr==0.00){
					$('#pcost_' + id).val(obj.e_pc);
				$('#percost_' + id).val(obj.e_pc);
				$('#mop_'+id).val(obj.e_mop);
				$('#unitprice_'+id).val(obj.e_sr);
				$('#totalAmount_' + id).val(obj.e_sr);
				$('#totalAmount_' + id).attr('data-value', obj.e_sr);
				$('#mrp_'+id).val(obj.e_mrp);
				if(parseFloat(obj.e_sr)<parseFloat(obj.e_pc)){
						$('#unitprice_'+id).css({"border":"1px solid red"});
						$('#saveprint').hide();
						$('#saveonly').hide();
						$('#BtnNewRow').hide();
					}else{
						$('#unitprice_'+id).css({"border":"1px solid #d2d6de"});
						$('#saveprint').show();
						$('#saveonly').show();
						$('#BtnNewRow').show();
					}
				}
			
				
				else{
					$('#pcost_' + id).val(obj.t_pc);
				$('#percost_' + id).val(obj.t_pc);
				$('#mop_'+id).val(obj.t_mop);
				$('#unitprice_'+id).val(obj.t_sr);
				$('#totalAmount_' + id).val(obj.t_sr);
				$('#totalAmount_' + id).attr('data-value', obj.t_sr);
				$('#mrp_'+id).val(obj.t_mrp);
				if(parseFloat(obj.t_sr)<parseFloat(obj.t_pc)){
						$('#unitprice_'+id).css({"border":"1px solid red"});
						$('#saveprint').hide();
						$('#saveonly').hide();
						$('#BtnNewRow').hide();
					}else{
						$('#unitprice_'+id).css({"border":"1px solid #d2d6de"});
						$('#saveprint').show();
						$('#saveonly').show();
						$('#BtnNewRow').show();
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
	  

      var new_row = '<tr id="detailRow_'+current_row+'" data-row="'+current_row+'"> <th scope="row" class="slno">'+rowStart+'</th>';
	  new_row+= '<td><input type="hidden" value="0" name="purcost[]" class="form-control cleardata" id="pcost_'+current_row+'" data-order="'+current_row+'" style="float:left" ><input required type="hidden"  value="0" class="form-control  " id="qtymop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  value="0" class="form-control  " id="qtymop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  class="form-control  " value="0" id="qtyinventory_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input type="hidden" value="0" name="itemid[]" class="form-control cleardata" id="itemid_'+current_row+'" data-order="'+current_row+'"  ><input type="text" name="itemcode[]" class="form-control cleardata codeItem" id="code_'+current_row+'" data-order="'+current_row+'" ><div id="code_list_'+current_row+'"></div></td>';
      new_row+= '<td><input type="text" name="itemname[]" class="form-control cleardata nameItem" id="itemname_'+current_row+'" data-order="'+current_row+'" ><div id="name_list_'+current_row+'"></div></td>';
      new_row += '<td style="width:130px;"><select required name="itembatchid[]" class="form-control  itemBatch cleardata" style="display:none;" id="itembatchid_'+current_row+'" data-order="'+current_row+'" placeholder="Batch"><option value="0">Select Batch</option></select>	<input type="hidden" name="batchidd" class="form-control batchidd" id="batchidd_' + current_row + '"><input type="text" name="batchcode" class="form-control batchcode" id="batchcode_' + current_row + '" data-order="' + current_row + '"><div id="batchlist_' + current_row + '" style="position: absolute;z-index: 99;"></div></td>';
      new_row+= '<td><input step=".01"  type="text" min="0"  name="itemqnty[]" class="form-control cleardata qnty" id="itemqty_'+current_row+'" data-order="'+current_row+'" ></td>';
      new_row += '<td><input required type="text"  name="unitprice[]" class="form-control unitprice cleardata " data-toggle="tooltip" trigger="manual" id="unitprice_' + current_row + '" data-order="' + current_row + '" ></td>';
	  new_row += '<td><input required type="text"   name="mrp[]" class="form-control mrp cleardata " data-toggle="tooltip" trigger="manual" id="mrp_' + current_row + '" data-order="' + current_row + '"  ></td>';
			
	  new_row+= '<td><input type="text" value="0" name="itemtaxable[]" readonly class="form-control cleardata taxableAmount" id="taxable_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
      new_row+= '<td><input type="text" value="0" name="itemgstper[]" readonly class="form-control cleardata cleardatal" id="gstper_'+current_row+'" data-order="'+current_row+'"><input type="hidden" name="itemhsncode[]" class="form-control itemhsncode" id="hsncode_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
      new_row+= '<td><input type="text" value="0" name="itemgstamount[]" readonly class="form-control cleardata gstAmount" id="gstAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><input type="text" value="0" name="itemtotalamount[]" readonly class="form-control cleardata totalAmount" id="totalAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><select name="employee[]" class="form-control Employee cleardata" id="employee_' + current_row + '" data-order="' + current_row + '" ><?php echo $namelist;?></select></td>';
      
	  new_row+='<input type="hidden" value="0" data-order="' + current_row + '" name="incentive_id[]" id="incentive_' + current_row + '" value=""/><input type="hidden" data-order="' + current_row + '" name="incentive_amount[]" id="incentiveamt_' + current_row + '" value=""/>'
			new_row += '<td>';
      
      new_row+= '<i class="fa fa-cubes checkstock" data-row="' + current_row + '" id="checkstock_' + current_row + '" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i><i data-row="'+current_row+'" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
      new_row+= '</td></tr>';

      $('#sales_cont').append(new_row);
     
      $('#BtnNewRow').data('order',current_row);

	  recalculate();
      
  });

  $(function () {
    $('#example2').DataTable({
       dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5'
        ]
    })
  });

  
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
		
			$('.gstAmount').each(function (index) {
				if ($(this).val() != '') {
					totalgstAmount = totalgstAmount + parseFloat($(this).val());
				}
			});
			$('#amountGst').val(totalgstAmount.toFixed(2));
		
			$('.totalAmount').each(function (index) {
				if ($(this).val() != '') {
					grandTotal = grandTotal + parseFloat($(this).val());
				}
			});
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
			$('#totalamount').val(Math.round(grandTotal + parseInt(deliverycharge) - parseInt(discount)));

			if($('[type="checkbox"]').is(":checked")){
          var grandtotal=$('#grandTotal').val();
		  var finalgrandTotal=Math.round(parseFloat(grandtotal)*parseFloat(.1)/parseFloat(100))+parseFloat(grandtotal);
		  $('#totalamount').val(finalgrandTotal);
		  $('#tcscharge').val(parseFloat(grandtotal)*parseFloat(.1)/parseFloat(100).toFixed(2));
        }else{
			var grandtotal=$('#grandTotal').val();
			$('#totalamount').val(grandtotal);
			$('#tcscharge').val(0);
         }
			calc_outstanding();
		
		}
  
		function calc_outstanding(){

var paymod = $('input[name=paymod1]:checked').val();
var paidamount = $('#paidamount').val();
var grandTotal = $('#totalamount').val();
var bankamount = $('#bankamount').val();
if (bankamount == '' || paymod == 1 || paymod == 2 || paymod == 5 || paymod == 6 ) { 
	bankamount = 0;
}
if (paidamount == '') {
	paidamount = 0;
}


var outstanding_previous = $('#outstanding_previous').val(); 
var finaloutstandingamount=parseFloat(outstanding_previous) + parseFloat(grandTotal) - parseFloat(paidamount) - parseFloat(bankamount);
$('#outstanding').val(Math.round(finaloutstandingamount).toFixed(2));

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
		});

  
  $('#sales_cont').on('click','.detailEraseRow',function(){
      var rowNumber = $(this).data('row');
       $('#detailRow_'+rowNumber+' select').prop('selectedIndex',0);
       $('#detailRow_'+rowNumber+' input').val('');
       recalculate();
  });
  
  //==============================================================================================


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
							
							var i;
							var optiondata= '<option value="">Select</option>';
							for(i=0;i<batchlist.length;i++){
								
								optiondata += '<option value="'+batchlist[i].batch_id+'">'+batchlist[i].batchcode+'('+batchlist[i].cur_stock_item_count+')</option>';

							}
							
							$('#itembatchid_'+id).html(optiondata);
							$('#code_'+id).val(batchlist[0].itm_code);
							$('#itemname_'+id).val(batchlist[0].itm_name);
							$('#batchcode_'+id).hide();
							$('#itembatchid_'+id).show();
						}
			})
  });

  $('#sales_cont').on('click','.checkstock',function(){
     var id=$(this).data('row');
	
	 
	 var batchid=$('#itembatchid_'+id).val();
	 
	

				$.ajax({
					type: "POST",
					url: '<?php echo site_url('AdminController/get_branchandgodownstock');?>',
					data: { batchid: batchid},
					success: function (res) {
						console.log(res);
						if (res) {
							$('#stockgodownmodal').modal('show');
							$('#branchAndgodown').html(res);
						} else {
							$('#branchAndgodown').html("");
						}
					},
				});	
	
	});


  

  
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
  });
  

  

  
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
  });




  $('#sales_cont').on('keyup', '.unitprice', function () {

	    $(this).val($(this).val().replace(/ +?/g, ''));
	

		var id = $(this).data('order');

		var order = $(this).data('order');

		var unitpricedemo = $(this).val();
				
		
		var qnty = $('#itemqty_'+id).val();
		var mop = $('#qtymop_'+id).val() / (qnty || 1);
		var minmop=$('#pcost_'+id).val();
		
			
		if(parseFloat(unitpricedemo)<parseFloat(minmop)){

var unitprice = unitpricedemo;


$('#unitprice_'+id).css("border","2px solid red");
$('#unitprice_'+id).css("color","red");

$('#unitprice_'+id).attr('title', "Total amount is less than Item Purchase Cost : '"+minmop+"'")
							.tooltip('fixTitle')
							.tooltip('show');  

$('#saveprint').hide();
$('#saveonly').hide();
$('#BtnNewRow').hide();
	
}else if($(this).val() !== null && $(this).val() == ''){
$('#saveprint').hide();
$('#saveonly').hide();
$('#BtnNewRow').hide();
var unitprice = 0;

}else{ 

var unitprice = unitpricedemo;

$('#saveprint').show();
$('#saveonly').show();
$('#BtnNewRow').show();

$('#unitprice_'+id).css("border","1px solid #ccc");
$('#unitprice_'+id).css("color","#555");
$('#unitprice_'+id).tooltip('hide');
$('#unitprice_'+id).attr('data-original-title', '');

}


			var item_hsn_tax = $('#gstper_'+id).val();
			var taxableAmount = 0; 
			if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
				var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
			}
			else {
				var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
			}
			var gstAmount = ((taxableAmount * parseFloat(item_hsn_tax)) / 100).toFixed(2);
			// if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
			// 			var cessAmount = (taxableAmount / 100).toFixed(2);
			// }
			// else {
			// 			var cessAmount = 0;
			// }
		

			var gstsubtotal = qnty * gstAmount;
			// var cesssubtotal = qnty * cessAmount;
			var itemsubtotal = qnty * unitprice ;
			var taxablesubtotal = qnty * taxableAmount;

			$('#taxable_' + id).val((taxablesubtotal).toFixed(2));	
			$('#gstAmount_' + id).val((gstsubtotal).toFixed(2));
			// $('#cessAmount_' + id).val((cesssubtotal).toFixed(2));
			$('#totalAmount_' + id).val((itemsubtotal).toFixed(2));	
			
			recalculate();


	var batchid=$("#itembatchid_"+id).val();
	var itemid=$('#itemid_'+id).val();

	var itemqty=$('#itemqty_'+id).val();
	var unit_price=$('#unitprice_'+id).val();
	  $.ajax({

				type: "POST",
				url: '<?php echo site_url('Admin/getbath_incentives');?>',
				data: {
					batchid:batchid,
					itemid:itemid


				},

				success: function(res) {
					
					var obj = JSON.parse(res);
					
				
					if(parseInt(obj.incentive_type)==parseInt(1))
					{
						
						var incentamt=parseFloat(itemqty)*parseFloat(obj.in_peramount);
						$('#incentive_'+id).val(obj.id);
						$('#incentiveamt_'+id).val(incentamt);
						console.log(obj.in_peramount);
					}
					else if(parseInt(obj.incentive_type)==parseInt(2))
					{
						$('#incentive_'+id).val(obj.id);
						var incentive_amount=(unit_price*obj.in_peramount/100)*itemqty;
						$('#incentiveamt_'+id).val(incentive_amount);
						console.log(obj.in_peramount);
					}
					else 
					{
						
						
						if(parseInt(unit_price)>=parseInt(obj.range1) && parseInt(unit_price)<parseInt(obj.range2) )
						{
							
							if(parseInt(obj.r1_type)==parseInt(1))
							{
								var incentamt12=parseFloat(itemqty)*parseFloat(obj.r1_amount);
								$('#incentive_'+id).val(obj.id);
								$('#incentiveamt_'+id).val(incentamt12);
							}
							else{
								var incentive_amountr1=(unit_price*obj.r1_amount/100)*itemqty;
								$('#incentive_'+id).val(obj.id);
								$('#incentiveamt_'+id).val(incentive_amountr1);
							}

						}
						else if(parseInt(unit_price)>=parseInt(obj.range2) && parseInt(unit_price)<parseInt(obj.range3))
						{
							
							if(parseInt(obj.r2_type)==parseInt(1))
							{
								var incentamt123=parseFloat(itemqty)*parseFloat(obj.r2_amount);
								$('#incentive_'+id).val(obj.id);
								$('#incentiveamt_'+id).val(incentamt123);
							}
							else{
								
								var incentive_amountr2=(unit_price*obj.r2_amount/100)*itemqty;
								$('#incentive_'+id).val(obj.id);
								$('#incentiveamt_'+id).val(incentive_amountr2);
							}

						}
						else if(parseInt(unit_price)>=parseInt(obj.range3) && parseInt(unit_price)<parseInt(obj.range4))
						{
						
							if(parseInt(obj.r3_type)==parseInt(1))
							{
								
								var incentamt1234=parseFloat(itemqty)*parseFloat(obj.r3_amount);
								$('#incentive_'+id).val(obj.id);
								$('#incentiveamt_'+id).val(incentamt1234);
							}
							else{

							    
								var incentive_amountr3=(unit_price*obj.r3_amount/100)*itemqty;
							
								$('#incentive_'+id).val(obj.id);
								$('#incentiveamt_'+id).val(incentive_amountr3);
							}

						}
						else if(parseInt(unit_price)>=parseInt(obj.range4)){
						
							if(parseInt(obj.r4_type)==parseInt(1))
							{
								
								
								if(parseInt(obj.r3_type)==parseInt(1)){
									 var r3amountextra=parseFloat(itemqty)*parseFloat(obj.r3_amount);
								}else{
									var r3amountextra=(obj.range3*obj.r3_amount/100)*itemqty;
								}
								var incentamt12345=parseFloat(itemqty)*(parseFloat(obj.r4_amount)+parseFloat(r3amountextra));
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentamt12345);
							}
							else{
								if(parseInt(obj.r3_type)==parseInt(1)){
									 var r3amountextra=parseFloat(itemqty)*parseFloat(obj.r3_amount);
								}else{
									var r3amountextra=(obj.range3*obj.r3_amount/100)*itemqty;
								}
								var incentive_amountr4=(unit_price*obj.r4_amount/100)*itemqty;
								//var incentive_amountr5=(obj.range3*obj.r3_amount/100)*itemqty;
								//alert(parseFloat(incentive_amountr4)+parseFloat(r3amountextra));
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(parseFloat(incentive_amountr4)+parseFloat(r3amountextra));
							}

						}else{
							$('#incentive_'+id).val(obj.id);
								$('#incentiveamt_'+id).val(0);
						}

					}
				
				},

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
 

 
$('#deliverychare').on('keyup',function(){
    recalculate();
});


$('.ticktcs').on('click',function(){
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
	var unitprice=$('#unitprice_'+order).val();



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
    


			var item_hsn_tax = $('#gstper_'+order).val();
			var taxableAmount = 0; 
			if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
				var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
			}
			else {
				var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
			}
			var gstAmount = ((taxableAmount * parseFloat(item_hsn_tax)) / 100).toFixed(2);
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
					
					var obj = JSON.parse(res);
					
				
					if(parseInt(obj.incentive_type)==parseInt(1))
					{
						
						var incentamt=parseFloat(itemqty)*parseFloat(obj.in_peramount);
						$('#incentive_'+order).val(obj.id);
						$('#incentiveamt_'+order).val(incentamt);
						console.log(obj.in_peramount);
					}
					else if(parseInt(obj.incentive_type)==parseInt(2))
					{
						$('#incentive_'+order).val(obj.id);
						var incentive_amount=(unit_price*obj.in_peramount/100)*itemqty;
						$('#incentiveamt_'+order).val(incentive_amount);
						console.log(obj.in_peramount);
					}
					else 
					{
						
						
						if(parseInt(unit_price)>=parseInt(obj.range1) && parseInt(unit_price)<parseInt(obj.range2) )
						{
							
							if(parseInt(obj.r1_type)==parseInt(1))
							{
								var incentamt12=parseFloat(itemqty)*parseFloat(obj.r1_amount);
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentamt12);
							}
							else{
								var incentive_amountr1=(unit_price*obj.r1_amount/100)*itemqty;
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentive_amountr1);
							}

						}
						else if(parseInt(unit_price)>=parseInt(obj.range2) && parseInt(unit_price)<parseInt(obj.range3))
						{
							
							if(parseInt(obj.r2_type)==parseInt(1))
							{
								var incentamt123=parseFloat(itemqty)*parseFloat(obj.r2_amount);
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentamt123);
							}
							else{
								
								var incentive_amountr2=(unit_price*obj.r2_amount/100)*itemqty;
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentive_amountr2);
							}

						}
						else if(parseInt(unit_price)>=parseInt(obj.range3) && parseInt(unit_price)<parseInt(obj.range4))
						{
						
							if(parseInt(obj.r3_type)==parseInt(1))
							{
								var incentamt1234=parseFloat(itemqty)*parseFloat(obj.r3_amount);
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentamt1234);
							}
							else{

							    
								var incentive_amountr3=(unit_price*obj.r3_amount/100)*itemqty;
							
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentive_amountr3);
							}

						}
						else if(parseInt(unit_price)>=parseInt(obj.range4)){
						
							if(parseInt(obj.r4_type)==parseInt(1))
							{
								
								
								if(parseInt(obj.r3_type)==parseInt(1)){
									 var r3amountextra=parseFloat(itemqty)*parseFloat(obj.r3_amount);
								}else{
									var r3amountextra=(obj.range3*obj.r3_amount/100)*itemqty;
								}
								var incentamt12345=parseFloat(itemqty)*(parseFloat(obj.r4_amount)+parseFloat(r3amountextra));
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentamt12345);
							}
							else{
								if(parseInt(obj.r3_type)==parseInt(1)){
									 var r3amountextra=parseFloat(itemqty)*parseFloat(obj.r3_amount);
								}else{
									var r3amountextra=(obj.range3*obj.r3_amount/100)*itemqty;
								}
								var incentive_amountr4=(unit_price*obj.r4_amount/100)*itemqty;
								//var incentive_amountr5=(obj.range3*obj.r3_amount/100)*itemqty;
								//alert(parseFloat(incentive_amountr4)+parseFloat(r3amountextra));
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(parseFloat(incentive_amountr4)+parseFloat(r3amountextra));
							}


						}else{
							$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(0);
						}

					}
				
				},

			});
			
			recalculate();
		
    }
    
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
	$('.bank1').show();
	$('.bankamount').hide();
	$('.bank').show();
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
	$('.bank1').show();
	$('.bankamount').hide();
	$('.bank').show();
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
  $(".reset").bind("click", function() {
		$(".cleardata").val("");
		});
  $('#sales_cont').on('change','.Employee',function(){ 
	var order = $(this).data('order');
	var batchid=$("#itembatchid_"+order).val();
	var itemid=$('#itemid_'+order).val();

	var itemqty=$('#itemqty_'+order).val();
	var unit_price=$('#unitprice_'+order).val();
	//alert(batchid);alert(itemid);alert(itemqty);alert(unit_price);
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
					if(parseInt(obj.incentive_type)==parseInt(1))
					{
					
						var incentamt=parseFloat(itemqty)*parseFloat(obj.in_peramount);
						$('#incentive_'+order).val(obj.id);
						$('#incentiveamt_'+order).val(incentamt);
						console.log(obj.in_peramount);
					}
					else if(parseInt(obj.incentive_type)==parseInt(2))
					{
						
						$('#incentive_'+order).val(obj.id);
						var incentive_amount=(unit_price*obj.in_peramount/100)*itemqty;
						$('#incentiveamt_'+order).val(incentive_amount);
						console.log(obj.in_peramount);
					}
					else 
					{
					
						
						
						if(parseInt(unit_price)>=parseInt(obj.range1) && parseInt(unit_price)<parseInt(obj.range2) )
						{
						
							
							if(parseInt(obj.r1_type)==parseInt(1))
							{
								var incentamt12=parseFloat(itemqty)*parseFloat(obj.r1_amount);
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentamt12);
							}
							else{
								var incentive_amountr1=(unit_price*obj.r1_amount/100)*itemqty;
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentive_amountr1);
							}

						}
						else if(parseInt(unit_price)>=parseInt(obj.range2) && parseInt(unit_price)<parseInt(obj.range3))
						{
							
							
							if(parseInt(obj.r2_type)==parseInt(1))
							{
								var incentamt123=parseFloat(itemqty)*parseFloat(obj.r2_amount);
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentamt123);
							}
							else{
								
								var incentive_amountr2=(unit_price*obj.r2_amount/100)*itemqty;
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentive_amountr2);
							}

						}
						else if(parseInt(unit_price)>=parseInt(obj.range3) && parseInt(unit_price)<parseInt(obj.range4))
						{
							//alert(3);
							
							if(parseInt(obj.r3_type)==parseInt(1))
							{
								
								var incentamt1234=parseFloat(itemqty)*parseFloat(obj.r3_amount);
								//alert(incentamt1234);
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentamt1234);
							}
							else{

							    
								var incentive_amountr3=(unit_price*obj.r3_amount/100)*itemqty;
							
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentive_amountr3);
							}

						}
						else if(parseInt(unit_price)>=parseInt(obj.range4)){
						
							
							if(parseInt(obj.r4_type)==parseInt(1))
							{
								
								
								if(parseInt(obj.r3_type)==parseInt(1)){
									 var r3amountextra=parseFloat(itemqty)*parseFloat(obj.r3_amount);
								}else{
									var r3amountextra=(obj.range3*obj.r3_amount/100)*itemqty;
								}
								var incentamt12345=parseFloat(itemqty)*(parseFloat(obj.r4_amount)+parseFloat(r3amountextra));
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentamt12345);
							}
							else{
								if(parseInt(obj.r3_type)==parseInt(1)){
									 var r3amountextra=parseFloat(itemqty)*parseFloat(obj.r3_amount);
								}else{
									var r3amountextra=(obj.range3*obj.r3_amount/100)*itemqty;
								}
								var incentive_amountr4=(unit_price*obj.r4_amount/100)*itemqty;
								//var incentive_amountr5=(obj.range3*obj.r3_amount/100)*itemqty;
								//alert(parseFloat(incentive_amountr4)+parseFloat(r3amountextra));
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(parseFloat(incentive_amountr4)+parseFloat(r3amountextra));
							}

						}else{
							$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(0);
						}

					}
				
				},

			});
	
});
$(document).ready(function(){
		$('form').attr('autocomplete', 'off');
});

$('#sales_cont').on('keyup', '.batchcode', function () {
			var rowOrder = $(this).data('order');
			var batchcode = $(this).val();
			if (batchcode != '' && batchcode != 0) {
				
				$.ajax({
					type: "POST",
					url: '<?php echo site_url('Admin/searchbatchList');?>',
					data: { batchcode: batchcode, rowOrder: rowOrder },
					success: function (res) {
						console.log(res);
						if (res) {
							$('#batchlist_' + rowOrder).show();
							$('#batchlist_' + rowOrder).html(res);
						} else {
							$('#batchlist_' + rowOrder).html("");
						}
					},
				});	
      		}
			else{
				$('#batchlist_' + rowOrder).html("");
			}
      });
	  $('#sales_cont').on('click','.subSelect_batchid',function(){
			var id = $(this).data('id');
			var itemValue = $(this).data('value');
		
			$('#batchlist_'+id).hide();
			
			$godown=$('#godown').val();
			
			var totalTaxableAmount = 0;
			var totalcessAmount = 0;
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
				type: "POST",
				url: '<?php echo site_url('Admin/getItemBatchDetails');?>',
				data: { itemValue: itemValue },
				success: function (res) {
					console.log(res); console.log(res);
					$('#code_list_' + id).hide();
					$('#name_list_' + id).hide();
					$('#batch_list_' + id).hide();
					var obj = JSON.parse(res);
					
					$('#hsncode_' + id).val(obj.hsn_code);
					if ((obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28) && ! $('#isigst').is(":checked")) {

						if($('#inclusive').is(":checked")){
							if(obj.t_sr==0.00){
							var taxableAmount = (parseInt(obj.e_sr) / (101 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						}
						
						
						
						else{
							var taxableAmount = (parseInt(obj.t_sr) / (101 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						}
						}else{
							if(obj.t_sr==0.00){
							var taxableAmount = (parseInt(obj.e_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						}
						
						
						
						else{
							var taxableAmount = (parseInt(obj.t_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						}
						}
					
						


					}
					else {
						if(obj.t_sr==0.00 ){
							var taxableAmount = (parseInt(obj.e_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						}
					
						
						else{
							var taxableAmount = (parseInt(obj.t_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						
						}
						
					}
					var gstAmount = ((taxableAmount * parseInt(obj.hsn_tax)) / 100).toFixed(2);
				
					if ((obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28) && ! $('#isigst').is(":checked")) {
						var cessAmount = (taxableAmount / 100).toFixed(2);
					}
					else {
						var cessAmount = 0;
					}
					if(obj.t_sr==0.00){
						$('#pcost_' + id).val(obj.e_pc);
					$('#percost_' + id).val(obj.e_pc);
					$('#mop_'+id).val(obj.e_mop);
					$('#unitprice_'+id).val(obj.e_sr);
					$('#mrp_'+id).val(obj.e_mrp);
					if($('#inclusive').is(":checked")){
						var totalcssamount=parseFloat(obj.e_sr);
					}else{
						var totalcssamount=parseFloat(obj.e_sr)+parseFloat(cessAmount);
					}
					
					$('#totalAmount_' + id).val(totalcssamount);
					$('#totalAmount_' + id).attr('data-value',totalcssamount);
				
					}
					
				
					
					else{
				
					$('#pcost_' + id).val(obj.t_pc);
					$('#percost_' + id).val(obj.t_pc);
					$('#mop_'+id).val(obj.t_mop);
					$('#unitprice_'+id).val(obj.t_sr);
					$('#mrp_'+id).val(obj.t_mrp);
					if($('#inclusive').is(":checked")){
						var totalcssamount=parseFloat(obj.t_sr);
					}else{
						var totalcssamount=parseFloat(obj.t_sr)+parseFloat(cessAmount);
					}
				
					$('#totalAmount_' + id).val(totalcssamount);
					$('#totalAmount_' + id).attr('data-value',totalcssamount);
					}
					
					$('#itemtbid_'+id).val(obj.item_id);
					$('#batchcode_'+id).val(obj.batchcode+'('+obj.cur_stock_item_count+')');
					   
								
								var optiondata = '<option value="'+obj.batch_id+'">'+obj.batchcode+'</option>';

							
							
							$('#itembatchid_'+id).html(optiondata);
				
			
					$('#puritem_'+id).val(obj.item_id);
					
					$('#code_' + id).val(obj.itm_code);
					
					$('#itemname_' + id).val(obj.itm_name);
				
					$('#taxable_' + id).val(taxableAmount);
					$('#taxable_' + id).attr('data-value', taxableAmount);
					$('#gstAmount_' + id).val(gstAmount);
					$('#gstAmount_' + id).attr('data-value', gstAmount);
					$('#gstAmount_' + id).attr('data-valuesingle', gstAmount);
					$('#cessAmount_' + id).val(cessAmount);
					$('#cessAmount_' + id).attr('data-value', cessAmount);
					$('#cessAmount_' + id).attr('data-valuesingle', cessAmount);
					$('#itemqty_' + id).val(1);
					$('#gstper_' + id).val(obj.hsn_tax);
					
					recalculate();
				
					calc_outstanding();
					
				},
		});

		});
$('.searchcus').on('keyup',function(){
	var cus = $(this).val();
		
			if (cus != '' && cus != 0) {
				$.ajax({
					type: "POST",
					url: '<?php echo site_url('AdminController/seachcustomerlist');?>',
					data: { cus: cus },
					success: function (res) {
						console.log(res);
						if (res) {
							$('#customer_list').show();
							$('#customer_list').html(res);
						} else {
							$('#customer_list').html("");
						}
					},
				});	
      		}
			else{
				$('#customer_list').html("");
			}
});

$('#customer_list').on('click','.subSelect_namesearch',function(){
	//alert();
	var id=$(this).data('value');
	$.ajax({

type: "POST",
url: '<?php echo site_url('Admin/get_customerfetchdetails');?>',
data: {
	id:id


},

success: function(res) {
	
	var obj = JSON.parse(res);
	$('#customer_list').hide();
	$('#customerid').val(id);
	$('#customername').val(obj.cus_name);
	$('#phon_num').val(obj.cus_phonenumber);
	$('#address').val(obj.cus);
}
});	//alert(id);

});
		
		
	
</script>
<script>
 function validateForm() {

if (confirm("Do you really want to submit this sales?")) {

	

var isStockNotAvailable = false;

var unitprice;
 $("#sales_cont tr").map(function(){
	if(!isStockNotAvailable){
				  if($(this).attr('data-row')!=undefined){
					var i = $(this).attr('data-row'); 

 var stock=document.getElementById('qtyinventory_'+i+'').value;
 var qty=document.getElementById('itemqty_'+i+'').value;

 unitprice=document.getElementById('unitprice_'+i+'').value;
	 var minmop=document.getElementById('pcost_'+i+'').value;

 //alert(stock);alert(qty);
 if(parseFloat(qty)>parseFloat(stock)){
	alert("Stock is not available");
	$('#itemqty_'+i).css({"border":"2px solid red"});
	$("#saveonly").html("SAVE");
	
	$("#saveonly").removeAttr("disabled")
	$("#saveprint").html("SAVE & PRINT");
	$("#saveprint").removeAttr("disabled");
	isStockNotAvailable = true;
	event.preventDefault();
	return false;
	
 }else if(parseFloat(qty) !== null && parseFloat(qty) == ''){
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
	form.myButton.disabled = true;
		form.myButton.value = "Please wait...";
		return true;
	
 }
 if(parseFloat(unitprice)<parseFloat(minmop)){
		 alert("Please enter unit price is grater than purchase cost");
		 $('#unitprice_'+i).css({"border":"2px solid red"});
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
		form.myButton.disabled = true;
		form.myButton.value = "Please wait...";
		return true;
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