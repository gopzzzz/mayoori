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
#example21 p{
	margin: 0 0 10px;
    border-radius: 4px;
    width: fit-content;
    font-size: 17px;
    color: #ffff;
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

<?php $data['leftmenu']='saleswindow'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



	<!-- Content Header (Page header) -->

	<section class="content-header">

		<h1 align="center">Sale Order <small>Preview</small></h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">Sale</a></li>

		</ol>

	</section><br>



	<!-- Main content -->

	<section class="content">
		<a href="<?php echo base_url('saleorderaddnew')?>"><button type="button" class="btn  btn-info btn-lg " >ADD</button></a>
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog" style="width:100%;">
				<!-- Modal content-->
				
				<form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('Admin/salesorderadd');?>">
				
				
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Sales Order Window</h4>
					</div>

					<div class="col-sm-12" style="margin-top: 10px;">
						<div class="col-sm-1">
							<label class="exampleInputEmail1">BILL NO:</label>
						</div>
						<div class="col-sm-2">
							<input type="text" name="billno" readonly class="form-control"
								value="<?php if($bilno12->mycount==0){echo "1";}else{ echo $last_bill_number1->sales_order_master_bill_no+1; }?>" />
						</div>
						<div class="col-sm-1">
							<label class="exampleInputEmail1">BILL DATE:</label>
						</div>
						<div class="col-sm-2">
							<input type="date" name="billdate" class="form-control" value="<?php echo date('Y-m-d'); ?>"
								 />
						</div>
						<div class="col-sm-1">
							<label class="exampleInputEmail1">EWAY BILL NUMBER</label>
						</div>
						<div class="col-sm-2">
							<input type="text" name="ewaybillno" class="form-control cleardata"  />
						</div>

						<div class="col-sm-1">
							<label class="exampleInputEmail1">DELIVERY DATE:</label>
						</div>
						<div class="col-sm-2">
							<input type="date" name="deliverydate" class="form-control cleardata"  value="<?php echo date('Y-m-d');?>"/>
						</div>

					</div>


					<div class="col-sm-12" style="margin-top: 10px;">
						<div class="col-sm-1">
							<label class="exampleInputEmail1">CUSTOMER NAME:</label>
						</div>
						<div class="col-sm-2" id="cust_search">
							<input type="text" name="customername" id="customername" class="searchcus form-control cleardata" style="width:150px;" required />
							<input type="hidden" name="customerloginid" id="customerid">
						
							<div id="customer_list"></div>
							
						</div>
						<div class="col-sm-1">
							<label class="exampleInputEmail1">PHONE NUMBER:</label>
						</div>
						<div class="col-sm-2">
							<input type="text" name="phonenumber" class="form-control cleardata" id="phon_num" maxlength="10"/>
							<div id="phonenum_list"></div>
						</div>

						<div class="col-sm-1">
							<label class="exampleInputEmail1">ADDRESS:</label>
						</div>
						<div class="col-sm-2">
							<textarea name="address" class="form-control cleardata" id="address"></textarea>
						</div>


						<div class="col-sm-1">
							<label class="exampleInputEmail1"> DELIVERY ADDRESS: &nbsp;&nbsp;&nbsp;<input type="checkbox" name="sameasaddress" id="sameasaddress"></label>
						</div>
						<div class="col-sm-2">
							<textarea name="deliveryaddress" id="deliveryaddress" class="form-control cleardata" ></textarea>
						</div>


					</div>

					<div class="col-sm-12">
					<div class="col-sm-1">
							<label class="exampleInputEmail1">TRANSACTION MODE:</label>
						</div>
						<div class="col-sm-2"> 
						<select name="transmode" class="form-control " id="transmode">
						<option value="0">Select</option>
					
						<option value="2" selected>Credit</option>
						<option value="3">Finace</option>
						</select>
						</div>
						<div class="col-sm-1" id="financelabel" style="display:none;">
							<label class="exampleInputEmail1">FINANCE:</label>
						</div>
						<div class="col-sm-2" id="financeinput" style="display:none;">
						<select name="financeid" class="form-control " >
						<option value="0">Select</option>
						<?php foreach($finance as $finance){?>
						<option value="<?php echo  $finance->id;?>"><?php echo  $finance->finance;?></option>
						<?php } ?>
						</select>
						</div>
						<div class="col-sm-1">
									<label><input type="checkbox" name="isigst" id="isigst" value="1" class="cleardata"/> IS IGST</label>
						</div>
						<div class="col-sm-2">
									<label><input type="checkbox" name="inclusive" id="inclusive" value="1" class="cleardata"/>INCLUSIVE</label>
						</div>

					</div>
					<div class="col-sm-12" style="margin-top: 20px;">

						<table class="table">
							<thead>
								<tr>
									<th scope="col">Sl no</th>
									<th scope="col">Code</th>
									<th scope="col">Item Name</th>
									<th scope="col">Batch</th>
									<th scope="col">Qty</th>
									<th scope="col">Unit price</th>
									<th scope="col">MRP</th>
									<th scope="col">Taxable Value</th>
									<th scope="col">Gst %</th>
									<th scope="col">Gst Amount</th>
								
									<th scope="col">Total</th>
									<th scope="col">Employee</th>
									<th scope="col" width="60px"></th>
									
								</tr>
							</thead>
							<tbody id="sales_cont">
								<tr id="detailRow_1">
									<th scope="row" class="slno">1</th> 
									<td>
									<input type="hidden" name="purcost[]" value="0" class="form-control cleardata" id="pcost_1"
											data-order="1" style="float:left" >
											
											<input type="hidden" value="0" name="puritemid[]" class="form-control cleardata" id="puritem_1"
											data-order="1" style="float:left" >
											<input type="hidden" value="0" class="form-control cleardata" id="mop_1"
											data-order="1" style="float:left" >
											<input type="hidden" value="0" class="form-control cleardata" id="qtymop_1"
											data-order="1" style="float:left" >
									<input type="text"  name="itemcode[]" class="form-control codeItem cleardata" id="code_1"
											data-order="1" style="float:left" >

											<input type="hidden"  class="form-control cleardata" id="qtyinventory_1"
											data-order="1" style="float:left" value="0" >

										<!-- <i class="fa fa-search searchitemmodel" data-row="1" aria-hidden="true"
											style="font-size:12px;cursor:pointer;padding:5px" ></i> -->
										<div id="code_list_1" style="position: absolute;z-index: 99;"></div>
									</td>
									<td><input type="text" name="itemname[]" class="form-control nameItem cleardata" 
											id="itemname_1" data-order="1"  >
										<div id="name_list_1" style="position: absolute;z-index: 99;"></div>
									</td>
									
									<td style="width:130px;">
										<select name="itembatchid[]" class="form-control itemBatch cleardata" id="itembatchid_1" placeholder="Batch" data-order="1" required>
											<option >Select Batch</option>  
										</select>
									</td>
									</td>
									<td><input step=".01"  type="text" min="0"  name="itemqnty[]"  class="form-control qnty cleardata"
											id="itemqty_1" data-order="1" ></td>
											<td><input type="text" name="unitprice[]" class="form-control unitprice cleardata"
											id="unitprice_1" data-order="1" data-toggle="tooltip" trigger="manual"></td>
											<td><input type="text" name="mrp[]" class="form-control mrp cleardata"
											id="mrp_1" data-order="1" data-toggle="tooltip" trigger="manual" value="0"></td>
								
									<td><input type="text" value="0" name="itemtaxable[]" class="form-control taxableAmount cleardata"
											 id="taxable_1" data-value="" data-order="1" readonly >
									</td>
									<td><input type="text" value="0" name="itemgstper[]" class="form-control cleardata" 
											id="gstper_1" data-order="1" readonly ></td>
									<td><input type="text" value="0" name="itemgstamount[] " class="form-control gstAmount cleardata"
											 id="gstAmount_1" data-value="" data-valuesingle="" data-order="1" readonly>
										<input type="hidden" value="0" name="itemitemtbid[] " class="form-control itemitemtbid cleardata"
											id="itemtbid_1" data-value="" data-order="1" >
												<input type="hidden" name="itemhsncode[]" class="form-control itemhsncode cleardata"
											id="hsncode_1" data-value="" data-order="1" ></td>
								
									<td><input type="text" value="0" name="itemtotalamount[]" class="form-control totalAmount cleardata" 
											id="totalAmount_1" data-value="" data-order="1" readonly></td>
									<td><select name="employee[]" class="form-control cleardata Employee" id="employee_1"  data-order="1"  >
											<?php echo $namelist; ?>
										</select >
										<input type="hidden" value="0" data-order="1" name="incentive_id[]" id="incentive_1" value="" />
										<input type="hidden" value="0" data-order="1" name="incentive_amount[]" id="incentiveamt_1" value="" />
										</td>
									<td>
										
										<i class="fa fa-trash detailDeleteRow" data-row="1" aria-hidden="true"
											style="font-size:15px;margin-top: 10px;cursor:pointer"></i>
									</td>
								</tr>

							</tbody>
						</table>
					</div>
					<div class="col-sm-12" style="text-align: center;margin-top: -25px;">
						<button type="button" id="BtnNewRow" data-order="1" class="btn btn-info btn-sm">ADD</button>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-6">
							<div class="col-sm-12">
								<div class="col-sm-2">
									<label class="exampleInputEmail1">NOTE</label>
								</div>
								<div class="col-sm-4">
									<textarea name="note" class="form-control cleardata"></textarea>
								</div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">VEHICLE NUMBER:</label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="vehicleno" class="form-control cleardata"  />
								</div>
							
							</div>
							<div class="col-sm-12" style="margin-top: 20px;">

								<div class="col-sm-2">
									<label class="exampleInputEmail1">OUT STANDING</label>
								</div>
								<div class="col-sm-4">
								<input type="hidden" name="outstanding_previous" id="outstanding_previous" value="0">
									<input type="text" readonly name="outstanding" id="outstanding" class="form-control cleardata" />
								</div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">LOCATION:</label>
								</div>
								<div class="col-sm-4" id="searchlocation">
								<input type="text" required name="location" id="location" class="searchloc form-control cleardata" style="width:150px;" required />
							    <input type="hidden" required name="locationid" id="locationid">
						
							<div id="location_list"></div>
								</div>
								
							</div>

							<div class="col-sm-12">
								<div class="col-sm-2">
									<label class="exampleInputEmail1">PAYMENT MODE</label>
								</div>
								<div class="col-sm-10">
									<input type="radio" class="custom-control-input banktrancheck" id="defaultChecked"
										name="paymod1" value="1">
									<label class="custom-control-label" for="defaultChecked">BANK TRANSFER</label>
									<input type="radio" class="custom-control-input chquecheck cleardata" id="defaultChecked"
										name="paymod1" value="2">
									<label class="custom-control-label" for="defaultChecked">CHEQUE</label>
									<input type="radio" class="custom-control-input emicheck cleardata" id="defaultChecked "
										name="paymod1" value="3">
									<label class="custom-control-label" for="defaultChecked">EMI</label>
									<input type="radio" class="custom-control-input bothcheck cleardata" id="defaultChecked "
										name="paymod1" value="4">
									<label class="custom-control-label" for="defaultChecked">BOTH</label>
									<input type="radio" class="custom-control-input bankcheck cleardata" id="defaultChecked "
										name="paymod1" value="5">
									<label class="custom-control-label" for="defaultChecked">BANK</label>
									<input type="radio" class="custom-control-input cashcheck cleardata" id="defaultChecked"
										name="paymod1" value="6" checked>
									<label class="custom-control-label" for="defaultChecked cleardata">CASH</label>

								</div>
							</div>
							<div class="col-sm-12">
								<div class="col-sm-2 ">
									<label class="exampleInputEmail1 cardnumber " style="display: none;">CARD
										NUMBER</label>
									<label class="exampleInputEmail1 salescheque "
										style="display: none;margin-top:10px;">CHEQUE NUMBER</label>
									<label class="exampleInputEmail1 transcheq "
										style="display: none;margin-top:10px;">TRANSACTION ID</label>
									<label class="exampleInputEmail1 bankamount1 "
										style="display: none;margin-top:10px;">BANK AMOUNT</label><br>
									<label class="exampleInputEmail1 bank1"
										style="display: none;margin-top:10px;">BANK</label><br>
										<label class="exampleInputEmail1 financelabel "
										style="display: none;margin-top:10px;">FINANCE</label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="cardnumber" class="form-control salecardnumber cleardata"
										style="display: none;" />
									<input type="text" name="chequenum" class="form-control saleschequenumber cleardata"
										style="margin-top:10px;display: none;" />
									<input type="text" name="transcheque" class="form-control salestranscheque cleardata"
										style="margin-top:10px;display: none;" />
									<input type="text" name="bankamount" id="bankamount" value="0" class="form-control bankamount cleardata"
										style="margin-top:10px;display: none;" />
									
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
									<label class="exampleInputEmail1" style="margin-top:10px;">AMOUNT</label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="paidamount" value="0" id="paidamount" class="form-control cleardata"
										style="margin-top:10px;"  />
								</div>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="col-sm-12">
								<div class="col-sm-2">
									<label class="exampleInputEmail1">DELIVERY CHARGE</label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="deliverychare" id="deliverychare" value="0" class="form-control cleardata"
										 />
								</div>


								<div class="col-sm-2">
									<label class="exampleInputEmail1">TOTAL TAXABLE AMOUNT</label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="totalTaxableAmount" id="totalTaxableAmount"
										class="form-control cleardata"  readonly/>
								</div>
							</div>




							<div class="col-sm-12">
								<div class="col-sm-2">
									<label class="exampleInputEmail1">DISCOUNT</label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="discount"  id="discount" value="0" class="form-control cleardata"  />
								</div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">GST AMOUNT</label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="amountGst" id="amountGst"  readonly class="form-control cleardata"  />
								</div>

							</div>
						
							<div class="col-sm-12" style="margin-top: 10px;">
								<div class="col-sm-6"></div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">ROUND OFF</label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="roundOfValuue" readonly id="roundOfValuue" class="form-control cleardata"
										 />
								</div>

							</div>
							<div class="col-sm-12" style="margin-top: 10px;">
								<div class="col-sm-6">
								</div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">GRAND TOTAL</label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="grandTotal" readonly id="grandTotal" class="form-control cleardata"
										 />
								</div>
							</div>
							<!---->
						</div>
					</div>
					<div class="col-sm-12" style="margin-top: 20px;">
						<div class="col-sm-6">
							
							<div class="col-sm-2">
								
								<a href="<?php echo base_url().'sales_rtn';?>" class="btn btn-warning btn-sm" >RETURN</a>
							</div>
						</div>
						<div class="col-sm-6">
							<input type="hidden" name="savetype" id="savetype" />
							<div class="col-sm-2">
								<button type="submit" id="saveprint" class="btn btn-primary btn-sm">SAVE &
									PRINT</button>
							</div>
							<div class="col-sm-1">
								<button type="submit" id="saveonly" class="btn btn-success btn-sm">SAVE</button>
							</div>
						
							<div class="col-sm-1" style="margin-left:10px;">
								<button type="button" class="btn btn-warning btn-sm reset">CLEAR</button>
							</div>
							
						</div>
					


					</div>


					<div class="modal-footer">
						
					</div>
				</div>
				</form>
			</div>
		</div>

		<div class="modal fade" id="viewModal" role="dialog">
			<div class="modal-dialog" style="width:100%;">
			
				<div class="modal-content salesview_content">

				</div>


				<div class="modal-footer">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Sales Orders</h3>
						<input type="hidden" id="response_noti"
							value="<?php echo $this->session->flashdata('response');?>" />


						<div class="box-tools">
						
						</div>
					</div>
				
					<div class="box-body table-responsive no-padding">
					<div class="col-sm-4">
					<input type="text" class="form-control" id="search_sale" placeholder="search customer name and phone number">
                   </div>
						<table id="example21" class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Bill No</th>
									<th>Customer Name</th>
									<th>Phone Number</th>
									<th>Bill Date</th>
									<th>Tax</th>
									<th>Advance </th>
									<th>Grand Total</th>
									<th>Status</th>
									<th>Action</th>

								</tr>
							</thead>
							<tbody id="saleb2cbody">
							<?php
                            $i=1;
                            foreach($sales as $key){
                            ?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $key->sales_order_master_id;?></td>
								<td><?php echo $key->sales_order_master_customer_name;?></td>
								<td><?php echo $key->sales_order_master_phone_no;?></td>
								<td><?php echo date("d-m-Y",strtotime($key->sales_order_master_date));?></td>
								<td><?php echo $key->sales_order_master_tot_taxable_amount;?></td>
								<td><?php if($key->sales_order_master_bankamount==''){ echo $key->sales_order_master_amount_paid;}else if($key->sales_order_master_amount_paid==''){echo $key->sales_order_master_bankamount;}else{  echo $key->sales_order_master_amount_paid + $key->sales_order_master_bankamount; }?></td>
								
								<td><?php echo $key->sales_order_master_grand_total;?></td>
								<td><p style="background-color:green;"><?php if($key->sales_created==1){echo "Converted";}?></p><p style="background-color:#1a1aff;"><?php if($key->sales_created==0){echo "Pending";}?></p><p style="background-color:red;" ><?php if($key->sales_created==2){echo "cancelled";}?></p><p style="background-color:orange;"><?php if($key->sales_created==3){echo "Partially Converted";}?></p></td>
								<td>
									
										<a href="javascript:void(0)" class="viewsalesorder" data-id="<?php echo $key->sales_order_master_id;?>" data-value="<?php echo $key->sales_order_master_bill_no;?>">

											<li class="fa fa-eye" ></li>

										</a>

								
                                        <a href="<?php echo base_url('editsaleorder/').$key->sales_order_master_id;?>" data-id="<?php echo $key->sales_order_master_id;?>" >

                                            <li class="fa fa-edit " ></li>

                                        </a>
                                  
									 <a href="<?php echo base_url('salesorderprint/').$key->sales_order_master_id;?>"

                                                    >&nbsp;

                                            <li class="fa fa-print"></li> 
                                    </a> 
								</td>
							</tr>
							<?php
				$i++;
				}
				?>
				</tbody>
						</table>
						<p><?php echo $links; ?></p>
					</div>
					
				
				</div>
			
			</div>
		</div>



	</section>



<script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->

<script src="<?php echo base_url();?>admin_styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- FastClick -->

<script src="<?php echo base_url();?>admin_styles/bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->

<script src="<?php echo base_url();?>admin_styles/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="<?php echo base_url();?>admin_styles/dist/js/demo.js"></script>



<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>



<script>

function validateForm() {

if (confirm("Do you really want to submit this sales order?")) {

form.myButton.disabled = true;
form.myButton.value = "Please wait...";

return true;

}

else {

return false;

}


}

function deletechecked() {

if (confirm("Do you really want to delete this sales order?")) {

	return true;

}

else {

	return false;

}

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


//var outstanding_previous = $('#outstanding_previous').val(); 
var finaloutstandingamount= parseFloat(grandTotal) - (parseFloat(paidamount) + parseFloat(bankamount));
console.log(finaloutstandingamount);
$('#outstanding').val(Math.round(finaloutstandingamount));

}


function recalculate() {
			var totalTaxableAmount = 0;
			// var totalcessAmount = 0;
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
			$('#grandTotal').val(Math.round(parseFloat(grandTotal) + parseFloat(deliverycharge) - parseFloat(discount)));
			
			calc_outstanding();
		
		}

	

	



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

$('.searchloc').on('keyup',function(){
     var loc = $(this).val();

    if (loc != '' && loc != 0) {
        $.ajax({
            type: "POST",
            url: '<?php echo site_url('AdminController/seachlocationlist');?>',
            data: { loc: loc },
            success: function (res) {
                console.log(res);
                if (res) {
                    $('#location_list').show();
                    $('#location_list').html(res);
                } else {
                    $('#location_list').html("");
                }
            },
        });	
      }
    else{
        $('#location_list').html("");
    }
});


$('#customer_list').on('click','.subSelect_namesearch',function(){

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
$('#customerid').val(obj.customer_id);
$('#customername').val(obj.cus_name);
$('#phon_num').val(obj.cus_phonenumber);
$('#address').val(obj.cus_address);
}
});	

});


$('#searchlocation').on('click','.subSelect_locsearch',function(){

var id=$(this).data('value');
$.ajax({

type: "POST",
url: '<?php echo site_url('Admin/get_locationfetchdetails');?>',
data: {
id:id


},

success: function(res) {

var obj = JSON.parse(res);
$('#location_list').hide();
$('#locationid').val(obj.id);
$('#location').val(obj.location);

}
});	

});

$('#sameasaddress').on('click', function() { 

$('#deliveryaddress').val($('#address').val());
});



$("#isigst").change(function() {




$(this).val('0.00');
var order = $(this).data('order');
var qnty = $('#itemqty_'+order).val();

var item_hsn_tax = $('#gstper_'+order).val();
var unitprice = $('#unitprice_'+order).val();
var taxableAmount = 0;
if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
    var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
}
else {
    var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
}
var gstAmount = ((taxableAmount * parseInt(item_hsn_tax)) / 100).toFixed(2);
if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
            var cessAmount = 0;
}
else {
            var cessAmount = 0;
}


var gstsubtotal = qnty * gstAmount;
// var cesssubtotal = qnty * cessAmount;
var itemsubtotal = qnty * unitprice ;
var taxablesubtotal = qnty * taxableAmount;

$('#taxable_' + order).val((taxablesubtotal).toFixed(2));	
$('#gstAmount_' + order).val((gstsubtotal).toFixed(2));
// $('#cessAmount_' + order).val((cesssubtotal).toFixed(2));
$('#totalAmount_' + order).val((itemsubtotal).toFixed(2));	




recalculate();

});

$('#sales_cont').on('keyup', '.codeItem', function () {
var rowOrder = $(this).data('order');
var itemCode = $(this).val();
if (itemCode != '' && itemCode != 0) {
$.ajax({
    type: "POST",
    url: '<?php echo site_url('Admin/searchItemList');?>',
    data: { itemCode: itemCode, rowOrder: rowOrder },
    success: function (res) {
        console.log(res);
        if (res) {
            $('#code_list_' + rowOrder).show();
            $('#code_list_' + rowOrder).html(res);
        } else {
            $('#code_list_' + rowOrder).html("");
        }
    },
});	
}
else{
$('#code_list_' + rowOrder).html("");
}
});

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
recalculate();
});


$('#sales_cont').on('change','.itemBatch',function(){  
var id = $(this).data('order');
$('#unitprice_'+id).css("border","1px solid #ccc");
    $('#unitprice_'+id).css("color","#555");
    $('#unitprice_'+id).tooltip('hide');
    $('#unitprice_'+id).attr('data-original-title', '');

var itemValue = $(this).val();
var godown=$('#godown').val();



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
            var taxableAmount = (parseFloat(obj.e_sr) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
        }
        
        
        
        else{
            var taxableAmount = (parseFloat(obj.t_sr) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
        }
        }else{
            if(obj.t_sr==0.00){
            var taxableAmount = (parseFloat(obj.e_sr) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
        }
        
        
        
        else{
            var taxableAmount = (parseFloat(obj.t_sr) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
        }
        }
    
        


    }
    else {
        if(obj.t_sr==0.00 ){
            var taxableAmount = (parseFloat(obj.e_sr) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
        }
    
        
        else{
            var taxableAmount = (parseFloat(obj.t_sr) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
        
        }
        
    }
    var gstAmount = ((taxableAmount * parseFloat(obj.hsn_tax)) / 100).toFixed(2);


    if(obj.t_sr==0.00){
        $('#pcost_' + id).val(obj.e_pc);
    $('#percost_' + id).val(obj.e_pc);
    $('#mop_'+id).val(obj.e_mop);
    $('#unitprice_'+id).val(obj.e_sr);
    $('#mrp_'+id).val(obj.e_mrp);
    if($('#inclusive').is(":checked")){
        var totalcssamount=parseFloat(obj.e_sr);
    }else{
    
        var totalcssamount=parseFloat(obj.e_sr);
    }
    
    $('#totalAmount_' + id).val(totalcssamount);
    $('#totalAmount_' + id).attr('data-value',totalcssamount);

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
    $('#mrp_'+id).val(obj.t_mrp);
    if($('#inclusive').is(":checked")){
        var totalcssamount=parseFloat(obj.t_sr);
    }else{
    
        var totalcssamount=parseFloat(obj.t_sr);
    }

    $('#totalAmount_' + id).val(totalcssamount);
    $('#totalAmount_' + id).attr('data-value',totalcssamount);
    
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

    
    $('#itemtbid_'+id).val(obj.item_id);
    $('#puritem_'+id).val(obj.item_id);
    
    $('#code_' + id).val(obj.itm_code);
    
    $('#itemname_' + id).val(obj.itm_name);

    $('#taxable_' + id).val(taxableAmount);
    $('#taxable_' + id).attr('data-value', taxableAmount);
    $('#gstAmount_' + id).val(gstAmount);
    $('#gstAmount_' + id).attr('data-value', gstAmount);
    $('#gstAmount_' + id).attr('data-valuesingle', gstAmount);

    $('#itemqty_' + id).val(1);
    $('#gstper_' + id).val(obj.hsn_tax);

    recalculate();

    
    
},
});


});

$('#sales_cont').on('keyup', '.qnty', function () {
var qnty_demo = $(this).val();
var order = $(this).data('order');
var mop=$('#mop_'+order).val();
var inqty=$('#qtyinventory_'+order).val();


if(parseInt(qnty_demo)>=parseInt(1)){
$('#itemqty_'+order).css({"border":"1px solid #d2d6de"});
var qnty=qnty_demo;
    
        $('#saveprint').show();
        $('#saveonly').show();
        $('#BtnNewRow').show();
}else{
$('#itemqty_'+order).css({"border":"1px solid red"});
var qnty=0;
        $('#saveprint').hide();
        $('#saveonly').hide();
        $('#BtnNewRow').hide();

}



var item_hsn_tax = $('#gstper_'+order).val();
var unitprice = $('#unitprice_'+order).val();
var taxableAmount = 0;
if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
    if($('#inclusive').is(":checked")){
        var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
    }else{
        var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
    }

    
}
else {
    var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
}
var gstAmount = ((taxableAmount * parseFloat(item_hsn_tax)) / 100).toFixed(2);



var gstsubtotal = qnty * gstAmount;
// var cesssubtotal = qnty * cessAmount;
var itemsubtotal = qnty * unitprice ;
var taxablesubtotal = qnty * taxableAmount;

$('#taxable_' + order).val((taxablesubtotal).toFixed(2));	
$('#gstAmount_' + order).val((gstsubtotal).toFixed(2));
// $('#cessAmount_' + order).val((cesssubtotal).toFixed(2));
if($('#inclusive').is(":checked")){
    var totalgstvalue=parseFloat(itemsubtotal);
}else{
    // var totalgstvalue=parseFloat(cesssubtotal)+parseFloat(itemsubtotal);
    var totalgstvalue=parseFloat(itemsubtotal);
}

$('#totalAmount_' + order).val((totalgstvalue).toFixed(2));	


var qtymop=parseFloat(qnty)*parseFloat(mop);


$('#qtymop_'+order).val(qtymop);





var batchid=$("#itembatchid_"+order).val();
var itemid=$('#puritem_'+order).val();

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
                        var incentamt12345=parseFloat(itemqty)*(parseFloat(obj.r4_amount)+parseFloat(obj.r3_amount));
                        $('#incentive_'+order).val(obj.id);
                        $('#incentiveamt_'+order).val(incentamt12345);
                    }
                    else{
                        var incentive_amountr4=(unit_price*obj.r4_amount/100)*itemqty;
                        var incentive_amountr5=(obj.range3*obj.r3_amount/100)*itemqty;
                        $('#incentive_'+order).val(obj.id);
                        $('#incentiveamt_'+order).val(parseFloat(incentive_amountr4)+parseFloat(incentive_amountr5));
                    }

                }else{
                    $('#incentive_'+order).val(obj.id);
                        $('#incentiveamt_'+order).val(0);
                }

            }
        
        },

    });

recalculate();


});


$('#sales_cont').on('keyup', '.unitprice', function () {

$(this).val($(this).val().replace(/ +?/g, ''));
//Compare with item_mop <

var id = $(this).data('order');
var unitpricedemo = $(this).val();


var qnty = $('#itemqty_'+id).val();
var mop = $('#qtymop_'+id).val() / (qnty || 1);
var minmop=$('#pcost_'+id).val();
//var pcost=$('#pcost_1')


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
if($('#inclusive').is(":checked")){
    var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
}else{
    var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
}

}
else {
var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
}
var gstAmount = ((taxableAmount * parseFloat(item_hsn_tax)) / 100).toFixed(2);


var gstsubtotal = qnty * gstAmount;
// var cesssubtotal = qnty * cessAmount;
var itemsubtotal = qnty * unitprice ;
var taxablesubtotal = qnty * taxableAmount;

$('#taxable_' + id).val((taxablesubtotal).toFixed(2));	
$('#gstAmount_' + id).val((gstsubtotal).toFixed(2));
// $('#cessAmount_' + id).val((cesssubtotal).toFixed(2));
if($('#inclusive').is(":checked")){
var totalgstvalue=parseFloat(itemsubtotal);
}else{
// var totalgstvalue=parseFloat(cesssubtotal)+parseFloat(itemsubtotal);
var totalgstvalue=parseFloat(itemsubtotal);
}

$('#totalAmount_' + id).val((totalgstvalue).toFixed(2));

var batchid=$("#itembatchid_"+id).val();
var itemid=$('#puritem_'+id).val();

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
                
            //alert();	
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
                        var incentamt12345=parseFloat(itemqty)*(parseFloat(obj.r4_amount)+parseFloat(obj.r3_amount));
                        $('#incentive_'+id).val(obj.id);
                        $('#incentiveamt_'+id).val(incentamt12345);
                    }
                    else{
                        var incentive_amountr4=(unit_price*obj.r4_amount/100)*itemqty;
                        var incentive_amountr5=(obj.range3*obj.r3_amount/100)*itemqty;
                        $('#incentive_'+id).val(obj.id);
                        $('#incentiveamt_'+id).val(parseFloat(incentive_amountr4)+parseFloat(incentive_amountr5));
                    }

                }else{
                    $('#incentive_'+id).val(obj.id);
                        $('#incentiveamt_'+id).val(0);
                }

            }
        
        },

    });	
        

recalculate();



});


$('#sales_cont').on('change','.Employee',function(){ 
var order = $(this).data('order');
var batchid=$("#itembatchid_"+order).val();
var itemid=$('#puritem_'+order).val();

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
                        var incentamt12345=parseFloat(itemqty)*(parseFloat(obj.r4_amount)+parseFloat(obj.r3_amount));
                        $('#incentive_'+order).val(obj.id);
                        $('#incentiveamt_'+order).val(incentamt12345);
                    }
                    else{
                        var incentive_amountr4=(unit_price*obj.r4_amount/100)*itemqty;
                        var incentive_amountr5=(obj.range3*obj.r3_amount/100)*itemqty;
                        $('#incentive_'+order).val(obj.id);
                        $('#incentiveamt_'+order).val(parseFloat(incentive_amountr4)+parseFloat(incentive_amountr5));
                    }

                }else{
                    $('#incentive_'+order).val(obj.id);
                        $('#incentiveamt_'+order).val(0);
                }

            }
        
        },

    });
    recalculate();
});

$('#paidamount,#bankamount').on('keyup', function () {
    recalculate();
});
$('#deliverychare').on('keyup', function () {
recalculate();
});

$('#discount').on('keyup', function () {
recalculate();
});
$ ('input[name=paymod1]'). click (function () {
    recalculate();
});
$(".reset").bind("click", function() {
$(".cleardata").val("");
});




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



$('#sales_cont').on('keyup', '.nameItem', function () {
var rowOrder = $(this).data('order');
var itemName = $(this).val();
if (itemName != '' && itemName != 0) {
$.ajax({
    type: "POST",
    url: '<?php echo site_url('Admin/searchItemNameList');?>',
    data: { itemName: itemName, rowOrder: rowOrder },
    success: function (res) {
        console.log(res);
        if (res) {
            $('#name_list_' + rowOrder).show();
            $('#name_list_' + rowOrder).html(res);
        } else {
            $('#name_list_' + rowOrder).html("");
        }
    },
});	
}
else{
$('#name_list_' + rowOrder).html("");
}
});




$('#BtnNewRow').on('click',function(){

	var rowStart = 1;
      $('.slno').each(function () {
				$(this).html(rowStart);
				rowStart = rowStart + 1;
			});
			var newrow=$('#BtnNewRow').data('order')+1;
			$('#BtnNewRow').data('order',newrow);
      		var current_row = newrow;


var new_row = '<tr id="detailRow_'+current_row+'" data-row="'+current_row+'"> <th scope="row" class="slno">'+rowStart+'</th>';
new_row += '<td><input type="hidden" value="0" name="purcost[]" class="form-control cleardata" id="pcost_'+current_row+'" data-order="'+current_row+'" style="float:left" ><input required type="hidden"   value="0" class="form-control  puritem" id="puritem_' + current_row + '" name="puritemid[]" data-order="' + current_row + '" style="float:left"><input required type="hidden"  value="0" class="form-control  " id="mop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"   value="0" class="form-control  " id="qtyinventory_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  class="form-control  "  value="0" id="qtymop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  value="0" class="form-control  codeItem" id="percost_' + current_row + '" data-order="' + current_row + '" style="float:left"><input required type="text"   name="itemcode[]" class="form-control  cleardata codeItem" id="code_' + current_row + '" data-order="' + current_row + '" style="float:left"><div id="code_list_' + current_row + '"></div></td>';
new_row += '<td><input required type="text"   name="itemname[]" class="form-control nameItem cleardata" id="itemname_' + current_row + '" data-order="' + current_row + '" ><div id="name_list_' + current_row + '"></div></td>';
new_row += '<td style="width:130px;"><select required name="itembatchid[]" class="form-control itemBatch cleardata" id="itembatchid_'+current_row+'" data-order="'+current_row+'" placeholder="Batch"><option>Select Batch</option></select></td>';

new_row += '<td><input required step=".01"  type="text" min="0"  name="itemqnty[]"  class="form-control qnty cleardata " id="itemqty_' + current_row + '" data-order="' + current_row + '" ></td>';
new_row += '<td><input required type="text"   name="unitprice[]" class="form-control unitprice cleardata " data-toggle="tooltip" trigger="manual" id="unitprice_' + current_row + '" data-order="' + current_row + '" ></td>';
new_row += '<td><input required type="text"  value="0" name="mrp[]" class="form-control mrp cleardata " data-toggle="tooltip" trigger="manual" id="mrp_' + current_row + '" data-order="' + current_row + '" ></td>';

new_row += '<td><input required type="text"  value="0"  name="itemtaxable[]" readonly class="form-control taxableAmount cleardata" id="taxable_' + current_row + '" data-value="" readonly data-order="' + current_row + '"></td>';
new_row += '<td><input required type="text" value="0" name="itemgstper[]" readonly class="form-control cleardata" id="gstper_' + current_row + '" data-order="' + current_row + '"><input type="hidden" name="itemhsncode[]" class="form-control itemhsncode" id="hsncode_' + current_row + '" data-value="" data-order="' + current_row + '" required><input type="hidden" name="itemitemtbid[]" class="form-control itemitemtbid" id="itemtbid_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
new_row += '<td><input required type="text" value="0"  name="itemgstamount[]" readonly class="form-control gstAmount cleardata" id="gstAmount_' + current_row + '" data-value="" data-valuesingle="" data-order="' + current_row + '"></td>';

new_row += '<td><input required type="text"  value="0" name="itemtotalamount[]" readonly class="form-control totalAmount cleardata" id="totalAmount_' + current_row + '" data-value="" data-order="' + current_row + '" readonly></td>';
new_row += '<td><select name="employee[]" class="form-control Employee cleardata" id="employee_' + current_row + '" data-order="' + current_row + '"><?php echo $namelist;?></select></td>';
new_row+='<input type="hidden" data-order="' + current_row + '"  value="0" name="incentive_id[]" id="incentive_' + current_row + '" value=""/><input type="hidden" data-order="' + current_row + '"  value="0" name="incentive_amount[]" id="incentiveamt_' + current_row + '" value=""/>'

new_row += '<td>';

new_row += '<i data-row="' + current_row + '" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
new_row += '</td></tr>';

$('#sales_cont').append(new_row);

$('#BtnNewRow').data('order',current_row);

recalculate();

});


$('#search_sale').on('keyup',function(){
var variable=$(this).val();
if(variable!=""){
$.ajax({
    type: "POST",
    url: '<?php echo site_url('AdminController/get_saleordersaerch');?>',
    data: {
        variable: variable
    },
    success: function(res) {
        if(res){
                            //vineeth---
                            $('#saleb2cbody').show();
                            $('#saleb2cbody').html(res);
                        }else{
                            $('#saleb2cbody').html("");
                        }
        
    },
});
}else{
location.reload();
}

});

$('#phon_num').on('keyup',function(){
    var phnum=$('#phon_num').val();
    var phcount =phnum.length;
    if(phcount==10 || phcount==0){
        $('#phon_num').css("border","1px solid #d2d6de");
$('#phon_num').css("color","black");	
    
    }
    else{
     $('#phon_num').css("border","2px solid red");
     $('#phon_num').css("color","red");
    }

    $.ajax({
            type: "POST",
            url: '<?php echo site_url('AdminController/seachphonenumberlist');?>',
            data: { phnum: phnum },
            success: function (res) {
                console.log(res);
                if (res) {
                    $('#phonenum_list').show();
                    $('#phonenum_list').html(res);
                } else {
                    $('#phonenum_list').html("");
                }
            },
        });	


    
});


$('#phonenum_list').on('click','.subSelect_namesearch',function(){

var id=$(this).data('value');
$.ajax({

type: "POST",
url: '<?php echo site_url('Admin/get_customerfetchdetails');?>',
data: {
id:id


},

success: function(res) {

$('#phon_num').css("border","1px solid #d2d6de");
$('#phon_num').css("color","black");

var obj = JSON.parse(res);
$('#phonenum_list').hide();
$('#customerid').val(id);
$('#customername').val(obj.cus_name);
$('#phon_num').val(obj.cus_phonenumber);
$('#address').val(obj.cus_address);
}
});	

});


$('#saleb2cbody').on('click','.viewsalesorder', function() {

var id = $(this).data('id');
var idd=$(this).data('value');
$('.salesview_content').empty();

if (id) {

$.ajax({

type: "POST",
url: '<?php echo site_url('Admin/getsalesorder_details');?>',
data: {
    id: id,idd:idd
},

success: function(res) {
    //console.log(res);
    $('.salesview_content').append(res);
},

});

}

$('#viewModal').modal({
backdrop: 'static',
keyboard: false
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


$(document).ready(function(){
		$('form').attr('autocomplete', 'off');
});


	</script>
	</body>

	</html>