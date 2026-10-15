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
				
					<form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('Admin/salesadd2');?>">
					<input type="hidden" name="token" readonly class="form-control cleardata" value="<?php echo $token;?>" />
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Sales Billing Window</h4>
					</div>

					<div class="col-sm-12" style="margin-top: 10px;">
						<div class="col-sm-1">
							<label class="exampleInputEmail1">BILL NO:</label>
						</div>
						<div class="col-sm-2">
							<input type="text" name="billno" class="form-control"
								value="<?php  if($bilno12->mycount==0){echo "1";}else{ echo $last_bill_number->sales_master_bill_no+1; } ?>"
								 />
                                 <input type="hidden" name="billid" class="form-control"
								value="<?php echo $master['sales_order_master_id'];?>"
								 />
                                 <input type="hidden" name="totalcount" id="totalcountnum" class="form-control"
								value="<?php echo $counttolarow;?>"
								 />
                                 <input type="hidden" name="selectedcount" id="selectedcount" class="form-control"
								value="<?php echo $selectedcount;?>"
								 />
						</div>
						<div class="col-sm-1">
							<label class="exampleInputEmail1">BILL DATE:</label>
						</div>
						<div class="col-sm-2">
							<input type="text" name="billdate" class="form-control" value="<?php echo date('d-m-Y'); ?>"
								 />
						</div>
						<div class="col-sm-1">
							<label class="exampleInputEmail1">EWAY BILL NUMBER</label>
						</div>
						<div class="col-sm-2">
							<input type="text" name="ewaybillno" class="form-control cleardata" value="<?php echo $master['sales_master_eway_billno'];?>" >
						</div>

						<div class="col-sm-1">
							<label class="exampleInputEmail1">DELIVERY DATE:</label>
						</div>
						<div class="col-sm-2">
							<input type="date" name="deliverydate" class="form-control cleardata" value="<?php echo date('Y-m-d');?>" />
						</div>

					</div>


					<div class="col-sm-12" style="margin-top: 10px;">
						<div class="col-sm-1">
							<label class="exampleInputEmail1">CUSTOMER NAME:</label>
						</div>
						<div class="col-sm-2" id="cust_search">
							<input type="text" name="customername" id="customername" class="form-control cleardata" style="width:150px;" value="<?php echo $master['sales_master_customer_name'];?>" required />
							
							<input type="hidden" name="customerloginid" id="customerid" value="<?php echo $master['sales_master_login_id'];?>">
							
							<div class="customer_list"></div>
							
						</div>
						<div class="col-sm-1">
							<label class="exampleInputEmail1">PHONE NUMBER:</label>
						</div>
						<div class="col-sm-2">
							<input type="text" name="phonenumber" maxlength="10" class="form-control cleardata" id="phon_num" value="<?php echo $master['sales_master_phone_no'];?>" required />
						</div>

						<div class="col-sm-1">
							<label class="exampleInputEmail1">ADDRESS:</label>
						</div>
						<div class="col-sm-2">
							<textarea name="address" class="form-control cleardata" id="address"><?php echo $master['sales_master_customer_address'];?></textarea>
						</div>


						<div class="col-sm-1">
							<label class="exampleInputEmail1"> DELIVERY ADDRESS: &nbsp;&nbsp;&nbsp;<input type="checkbox" name="sameasaddress" id="sameasaddress"></label>
						</div>
						<div class="col-sm-2">
							<textarea name="deliveryaddress" id="deliveryaddress" class="form-control cleardata" ><?php echo $master['sales_master_delivery_address'];?></textarea>
						</div>


					</div>

					<div class="col-sm-12">
					<div class="col-sm-1">
							<label class="exampleInputEmail1">TRANSACTION MODE:</label>
						</div>
						<div class="col-sm-2"> 
						<select name="transmode" class="form-control " id="transmode">
						<option value="0">Select</option>
						<option value="1" <?php if($master['sales_master_trans_mode']==1){echo 'selected';}?>>Cash</option>
						<option value="2" <?php if($master['sales_master_trans_mode']==2){echo 'selected';}?>>Credit</option>
						<option value="3" <?php if($master['sales_master_trans_mode']==3){echo 'selected';}?>>Finace</option>
						</select>
						</div>
						<div class="col-sm-1" id="financelabel" <?php if($master['sales_master_trans_mode']==3){ ?>  style="dsiplay:block;" <?php }?>>
							<label class="exampleInputEmail1">FINANCE:</label>
						</div>
						<div class="col-sm-2" id="financeinput" <?php if($master['sales_master_trans_mode']==3){ ?>  style="dsiplay:block;" <?php }?>>
						<select name="financeid" class="form-control " >
						<option value="0">Select</option>
						<?php foreach($finance as $finance){?>
						<option value="<?php echo  $finance->id;?>" <?php if($master['sales_master_finance_id']==$finance->id){echo 'selected';}?>><?php echo  $finance->finance;?></option>
						<?php } ?>
						</select>
						</div>
						<div class="col-sm-4">
									<label><input type="checkbox" name="isigst" id="isigst" value="1" <?php if($master['sales_master_financetype']==1){echo 'checked';}?> class="cleardata"/> IS IGST</label>
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
									<th scope="col">Batch Code</th>
									<th scope="col">Qty</th>
									<th scope="col">Unit price</th>
									<th scope="col">MRP</th>
									<th scope="col">Taxable Value</th>
									<th scope="col">Gst %</th>
									<th scope="col">Gst Amount</th>
									<!-- <th scope="col">Cess</th> -->
									<th scope="col">Total</th>
									<th scope="col">Employee</th>
									<th scope="col" width="60px"></th>
									<!--<th scope="col"><button type="button" class="btn btn-info btn-sm">DELETE</button></th>-->
									<!--<th scope="col"><button type="button" class="btn btn-info btn-sm">CLEAR</button></th>-->
								</tr>
							</thead>
							<tbody id="sales_cont">
							
                            <?php 
							$i=1;
							foreach($datatrans1 as $datatra){
								
								
                               
								
									
                                ?>

								<tr id="detailRow_<?php echo $i;?>" data-row="<?php echo $i;?>">
									<th scope="row" class="slno"><?php echo $i;?></th> 
									<td>
									<input type="hidden"  name="purcost[]" class="form-control cleardata" id="pcost_<?php echo $i;?>"
											data-order="<?php echo $i;?>" style="float:left" value="<?php echo $datatra->sales_order_purchase_cost;?>" >
											
											<input type="hidden"  name="puritemid[]" class="form-control cleardata" id="puritem_<?php echo $i;?>"
											data-order="<?php echo $i;?>" style="float:left" value="<?php echo $datatra->sales_order_trans_item_id;?>">
											<input type="hidden"   class="form-control cleardata" id="mop_<?php echo $i;?>"
											data-order="<?php echo $i;?>" style="float:left" >
											<input type="hidden"  class="form-control cleardata" id="qtymop_<?php echo $i;?>"
											data-order="<?php echo $i;?>" style="float:left" >
											<input type="hidden"   class="form-control cleardata" id="qtyinventory_<?php echo $i;?>"
											data-order="<?php echo $i;?>" style="float:left" value="<?php if($datatra->cur_stock_item_count==null){echo "0";}else { echo $datatra->cur_stock_item_count;}?>">
                                            <input type="hidden"  class="form-control cleardata" name="trans_id[]" id="transid_<?php echo $i;?>"
											data-order="<?php echo $i;?>" style="float:left" value="<?php echo $datatra->sales_order_trans_id;?>">
									<input type="text"   name="itemcode[]" value="<?php echo $datatra->itm_code;?>" class="form-control codeItem cleardata" id="code_<?php echo $i;?>"
											data-order="<?php echo $i;?>" style="float:left" >
											
										<i class="fa fa-search searchitemmodel" data-row="<?php echo $i;?>" aria-hidden="true"
											style="font-size:12px;cursor:pointer;padding:5px" ></i>
										<div id="code_list_<?php echo $i;?>" style="position: absolute;z-index: 99;"></div>
									</td>
									<td><input type="text"  name="itemname[]" value="<?php echo $datatra->itm_name;?>" class="form-control nameItem cleardata" 
											id="itemname_<?php echo $i;?>" data-order="<?php echo $i;?>"  >
										<div id="name_list_<?php echo $i;?>" style="position: absolute;z-index: 99;"></div>  
									</td>
									<!-- <td><input type="text" name="itembatch[]" class="form-control batchItem cleardata"
											id="batch_1" data-order="1" readonly>
										<div id="batch_list_1"  style="position: absolute;z-index: 99;"></div>   
									</td> -->
									<td> 
										<select style="width:80px;" name="itembatchid[]" class="form-control itemBatch" id="itembatchid_<?php echo $i;?>" placeholder="Batch" data-order="<?php echo $i;?>" required>
                                        <?php 
                                        $itemid=$datatra->itm_id;
                                        $batchfetch=$this->Admin_model->get_itembatchfeting($itemid);
                                        foreach($batchfetch as  $batchfetch){ ?>
                                        <option value="<?php echo $batchfetch->batch_id;?>" <?php if($batchfetch->batch_id==$datatra->sales_order_batch_id){echo 'selected';}?>><?php echo $batchfetch->batchcode;?>(<?php echo $datatra->cur_stock_item_count;?>)</option>
                                       <?php  }
                                        ?>

											  
										</select>
									</td>
									<td><input type="text" required min="1" name="itemqnty[]" class="form-control qnty cleardata"
											id="itemqty_<?php echo $i;?>" data-order="<?php echo $i;?>"  value="<?php echo $datatra->sales_order_trans_qty;?>" ></td>
											<td><input type="text" value="<?php echo $datatra->sales_order_unit_price;?>" name="unitprice[]" class="form-control unitprice cleardata"
											id="unitprice_<?php echo $i;?>" data-order="<?php echo $i;?>" data-toggle="tooltip" trigger="manual"></td>
											<td><input type="text" name="mrp[]" class="form-control mrp cleardata"
											id="mrp_<?php echo $i;?>" data-order="<?php echo $i;?>" data-toggle="tooltip" trigger="manual" value="<?php echo $datatra->sales_order_mrp;?>"></td>
								
									<td><input type="text" value="<?php echo $datatra->sales_order_trans_taxable_value;?>" name="itemtaxable[]" class="form-control taxableAmount cleardata"
											 id="taxable_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" readonly>
									</td>
									<td><input type="text" value="<?php echo $datatra->sales_order_trans_gst_percentage;?>" name="itemgstper[]" class="form-control cleardata" 
											id="gstper_<?php echo $i;?>" data-order="<?php echo $i;?>" readonly></td>
									<td><input type="text" value="<?php echo $datatra->sales_order_trans_gst_amount;?>" name="itemgstamount[] " class="form-control gstAmount cleardata"
											 id="gstAmount_<?php echo $i;?>" data-value="" data-valuesingle="" data-order="<?php echo $i;?>" readonly>
										<input type="hidden" name="itemitemtbid[] " class="form-control itemitemtbid cleardata"
											id="itemtbid_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" >
												<input type="hidden" name="itemhsncode[]" class="form-control itemhsncode cleardata"
											id="hsncode_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" value="<?php echo $datatra->sales_order_trans_hsn_code;?>"></td>
									<!-- <td><input type="text" value="0"  name="itemcessamount[]" class="form-control cessAmount cleardata"
											id="cessAmount_<?php echo $i;?>" data-value="" data-valuesingle="" data-order="<?php echo $i;?>" readonly>
									</td> -->
									<td><input type="text"  value="<?php echo $datatra->sales_order_trans_total;?>" name="itemtotalamount[]" class="form-control totalAmount cleardata" 
											id="totalAmount_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" readonly></td>
									<td>
                                    <!-- <select name="employee[]" class="form-control Employee cleardata"  id="employee_1" data-order="1" >
											<?php echo $namelist; ?>
										</select> -->
                                        <select name="employee[]" class="form-control Employee cleardata"  id="employee_<?php echo $i;?>" data-order="<?php $i;?>" >
										<option value="0">Select</option>
                                        <?php 

$emp=$this->Admin_model->get_staff1();

foreach($emp as $emp){?>

<option value="<?php echo $emp->stf_id;?>" <?php if($emp->stf_id==$datatra->sales_order_employee){echo 'selected';}?>><?php echo $emp->stf_name;?></option>

     

<?php }?>
</select>

										<input type="hidden" data-order="<?php echo $i;?>" name="incentive_id[]" id="incentive_<?php echo $i;?>" value="<?php echo $datatra->sales_order_incentive_id;?>" />
										<input type="hidden" data-order="<?php echo $i;?>" name="incentive_amount[]" id="incentiveamt_<?php echo $i;?>" value="<?php echo $datatra->sales_order_incentive_amount;?>" />
										</td>
									<td>
										
										<i class="fa fa-trash detailDeleteRow" data-row="<?php echo $i;?>" aria-hidden="true"
											style="font-size:15px;margin-top: 10px;cursor:pointer"></i>
									</td>
								</tr>
                            <?php   $i++;} ?>

							</tbody>
						</table>
					</div>
					<div class="col-sm-12" style="text-align: center;margin-top: -25px;">
						<button type="button" id="BtnNewRow" data-order="<?php echo $i;?>" class="btn btn-info btn-sm">ADD</button>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-6">
							<div class="col-sm-12">
								<div class="col-sm-2">
									<label class="exampleInputEmail1">NOTE</label>
								</div>
								<div class="col-sm-4">
									<?php $sidd=$master['sales_order_no'];$bankpay=$this->Admin_model->get_bankpaymentreceiptlistnew($sidd);?>
									<textarea name="note" class="form-control cleardata">SO:-<?php echo $master['sales_order_no'];?>  <?php echo $master['sales_master_note'];foreach($bankpay as $bankpay1){echo "Date:-".$bankpay1->date."(".$bankpay1->amount.")***";}?></textarea>
								</div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">VEHICLE NUMBER:</label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="vehicleno" class="form-control cleardata" value="<?php echo $master['sales_master_veh_no'];?>" />
								</div>
							</div>
							<div class="col-sm-12" style="margin-top: 20px;">

								<div class="col-sm-2">
									<label class="exampleInputEmail1">OUT STANDING</label>
								</div>
								<div class="col-sm-4">
									<input type="hidden" name="outstanding_previous" id="outstanding_previous" >
									<input type="text" name="outstanding" id="outstanding" value="<?php if($master['sales_master_outstanding']!=null){echo $master['sales_master_outstanding'];}else{echo '0';}?>" class="form-control cleardata" readonly/>
								</div>
								<div class="col-sm-2">

								</div>
								
							</div>

							<div class="col-sm-12">
								<div class="col-sm-2">
									<label class="exampleInputEmail1">PAYMENT MODE </label>
								</div>
								<div class="col-sm-10">
									<input type="radio" class="custom-control-input banktrancheck" id="defaultChecked"
										name="paymod1" value="1"  <?php if($master['sales_master_payment_mode']==1){ echo 'checked';}?>>
									<label class="custom-control-label" for="defaultChecked">BANK TRANSFER</label>
									<input type="radio" class="custom-control-input chquecheck cleardata" id="defaultChecked"
										name="paymod1" value="2" <?php if($master['sales_master_payment_mode']==2){ echo 'checked';}?>>
									<label class="custom-control-label" for="defaultChecked">CHEQUE</label>
									
									<input type="radio" class="custom-control-input bothcheck cleardata" id="defaultChecked "
										name="paymod1" value="4" <?php if($master['sales_master_payment_mode']==4){ echo 'checked';}?>>
									<label class="custom-control-label" for="defaultChecked">BOTH</label>
									<input type="radio" class="custom-control-input bankcheck cleardata" id="defaultChecked "
										name="paymod1" value="5" <?php if($master['sales_master_payment_mode']==5){ echo 'checked';}?>>
									<label class="custom-control-label" for="defaultChecked">BANK</label>
									<input type="radio" class="custom-control-input cashcheck cleardata" id="defaultChecked"
										name="paymod1" value="6" <?php if($master['sales_master_payment_mode']==6){ echo 'checked';}?>>
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

										
										<?php if($master['sales_master_payment_mode']==4){ ?>
											
									<label class="exampleInputEmail1 bankamount1 "
										style="margin-top:10px;">BANK AMOUNT</label><br><?php } ?>
									<label class="exampleInputEmail1 bank1"
										style="display: none;margin-top:10px;">BANK</label><br>
										<label class="exampleInputEmail1 financelabel "
										style="display: none;margin-top:10px;">FINANCE</label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="cardnumber" class="form-control salecardnumber cleardata"
										style="display: none;" value="<?php echo $master['sales_master_cardnum']; ?>" />
									<input type="text" name="chequenum" class="form-control saleschequenumber cleardata"
										style="margin-top:10px;display: none;" value="<?php echo $master['sales_master_cheque_no']; ?>"/>
									<input type="text" name="transcheque" class="form-control salestranscheque cleardata"
										style="margin-top:10px;display: none;" value="<?php echo $master['sales_master_banktransaction_id']; ?>" />
									
										<input type="text" name="bankamount" id="bankamount" class="form-control bankamount cleardata"
										<?php if($master['sales_master_payment_mode']!=4){?>style="margin-top:10px;display:none;" <?php } ?> value="<?php echo $master['sales_master_bankamount']; ?>" />
										
									
										<select name="bank" class="form-control bank cleardata" style="margin-top:10px;display: none;">
										<option value="0"></option>
										<?php foreach($bank as $key1){
											?>
											<option value="<?php echo $key1->bank_id;?>" <?php if($master['sales_master_bank']==$key1->bank_id){echo 'selected';}?>><?php echo $key1->bank_name.'-'.substr($key1->ba_acnumber, -4);?></option>
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
									<input type="text" required name="paidamount" value="<?php echo $master['sales_master_amount_paid'];?>" id="paidamount" class="form-control cleardata"
										style="margin-top:10px;"  />
                                        <?php if($master['sales_created']==0 || $master['sales_created']==3 ){?>
                                        Amount Received : <input type="text" id="amountrecived" name="received_amount" class="form-control" value="<?php if($master['sales_master_amount_paid']!=null && $master['sales_master_bankamount']==null ){echo $master['sales_master_amount_paid'];}elseif($master['sales_master_bankamount']!=null && $master['sales_master_amount_paid']==null ){echo $master['sales_master_bankamount'];}elseif($master['sales_master_bankamount']!=null && $master['sales_master_amount_paid']!=null){ echo $master['sales_master_bankamount']+$master['sales_master_amount_paid'];}else{echo "0";}?>"  readonly> <?php } ?>

								</div>



							</div>


						</div>

						<div class="col-sm-6">
							<div class="col-sm-12">
								<div class="col-sm-2">
									<label class="exampleInputEmail1">DELIVERY CHARGE</label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="deliverychare" id="deliverychare" value="<?php if($master['sales_master_delivery_charge']==0 || $master['sales_master_delivery_charge']==null ){echo "0";}else{echo $master['sales_master_delivery_charge'];} ?>" class="form-control cleardata"
										 />
								</div>


								<div class="col-sm-2">
									<label class="exampleInputEmail1">TOTAL TAXABLE AMOUNT</label>
								</div>
								<div class="col-sm-4">
									<input type="text"  readonly name="totalTaxableAmount"  id="totalTaxableAmount"
										class="form-control cleardata"  />
								</div>
							</div>




							<div class="col-sm-12">
								<div class="col-sm-2">
									<label class="exampleInputEmail1">DISCOUNT</label>
								</div>
								<div class="col-sm-4">
									<input type="text"  name="discount" id="discount" value="<?php if(empty($master['sales_master_discount'])){ echo "0";}else{echo $master['sales_master_discount']; }?>" class="form-control cleardata"  />
								</div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">GST AMOUNT</label>
								</div>
								<div class="col-sm-4">
									<input type="text" readonly name="amountGst" id="amountGst"  class="form-control cleardata"  />
								</div>

							</div>
							<!-- <div class="col-sm-12" style="margin-top: 10px;">
								<div class="col-sm-6">
								</div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">CESS</label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="cessAmount" id="cessAmount"  class="form-control cleardata"
										 />
								</div>
							</div> -->
							<div class="col-sm-12" style="margin-top: 10px;">
								<div class="col-sm-6"></div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">ROUND OFF</label>
								</div>
								<div class="col-sm-4">
									<input type="text" readonly name="roundOfValuue" id="roundOfValuue"  class="form-control cleardata"
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
									<input type="text" readonly name="grandTotal" id="grandTotal"  class="form-control cleardata"
										 />
								</div>
							</div>
							<!---->
						</div>
					</div>
					<div class="col-sm-12" style="margin-top: 20px;">
						<div class="col-sm-6">
							<div class="col-sm-2">
								<button type="button" class="btn btn-info btn-sm">HOLD BILL</button>
							</div>
							<div class="col-sm-2">
								<!-- <button type="button" class="btn btn-warning btn-sm" class="close" data-dismiss="modal">RETURN</button> -->
								<a href="<?php echo base_url().'sales_rtn';?>" class="btn btn-warning btn-sm" >RETURN</a>
							</div>
						</div>
						<div class="col-sm-6">
							<input type="hidden" name="savetype" id="savetype" />
							<div class="col-sm-2">
								<button type="submit" id="saveprint" class="btn btn-primary btn-sm" style="margin-left:-20px;">SAVE &
									PRINT</button>
							</div>
							<div class="col-sm-1">
								<button type="submit" id="saveonly" class="btn btn-success btn-sm">SAVE</button>
							</div>
							<div class="col-sm-1" style="margin-left:10px;">
								<a href="<?php echo base_url('viesales_reports_list');?>"><button type="button" class="btn btn-sm" data-toggle="modal" data-target="#mymodallisting">VIEW</button></a>
							</div>
							<div class="col-sm-1" style="margin-left:10px;">
								<button type="button" class="btn btn-warning btn-sm reset">CLEAR</button>
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


	
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script>

function calc_outstanding(){

var paymod = $('input[name=paymod1]:checked').val();
var paidamount = $('#paidamount').val();
var grandTotal = $('#grandTotal').val();
var bankamount = $('#bankamount').val();
var amountrecived = $('#amountrecived').val();
if (bankamount == '' || paymod == 1 || paymod == 2 || paymod == 5 || paymod == 6 ) { 
	bankamount = 0;
}
if (paidamount == '') {
	paidamount = 0;
}


var outstanding_previous = $('#outstanding_previous').val(); 
var finaloutstandingamount=parseFloat(grandTotal) - (parseFloat(paidamount) + parseFloat(bankamount) + parseFloat(amountrecived)  );
//alert(finaloutstandingamount);
$('#outstanding').val(Math.round(finaloutstandingamount));

}

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
			//grandTotal = parseFloat(totalTaxableAmount) + parseFloat(totalcessAmount) + parseFloat(totalgstAmount);
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
			$newrow=$('#BtnNewRow').data('order')+1;
			$('#BtnNewRow').data('order', $newrow);
      		var current_row = $newrow;
	  

      	var new_row = '<tr id="detailRow_'+current_row+'" data-row="'+current_row+'"> <th scope="row" class="slno">'+rowStart+'</th>';
  			new_row += '<td><input type="hidden" value="0" name="purcost[]" class="form-control cleardata" id="pcost_'+current_row+'" data-order="'+current_row+'" style="float:left" ><input required type="hidden"   value="0" class="form-control  puritem" id="puritem_' + current_row + '" name="puritemid[]" data-order="' + current_row + '" style="float:left"><input required type="hidden"  value="0" class="form-control  " id="mop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"   value="0" class="form-control  " id="qtyinventory_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  class="form-control  "  value="0" id="qtymop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  value="0" class="form-control  codeItem" id="percost_' + current_row + '" data-order="' + current_row + '" style="float:left"><input required type="text"   name="itemcode[]" class="form-control  cleardata codeItem" id="code_' + current_row + '" data-order="' + current_row + '" style="float:left"><i class="fa fa-search searchitemmodel" data-row="' + current_row + '" aria-hidden="true" style="font-size:12px;cursor:pointer;padding:5px" ></i><div id="code_list_' + current_row + '"></div></td>';
			new_row += '<td><input required type="text"   name="itemname[]" class="form-control nameItem cleardata" id="itemname_' + current_row + '" data-order="' + current_row + '" ><div id="name_list_' + current_row + '"></div></td>';
			new_row += '<td style="width:130px;"><select name="itembatchid[]" class="form-control itemBatch cleardata" id="itembatchid_'+current_row+'" data-order="'+current_row+'" placeholder="Batch"><option value="0">Select Batch</option></select></td>';
			
			new_row += '<td><input required type="text" min="1" name="itemqnty[]"  class="form-control qnty cleardata " id="itemqty_' + current_row + '" data-order="' + current_row + '" ></td>';
			new_row += '<td><input required type="text"   name="unitprice[]" class="form-control unitprice cleardata " data-toggle="tooltip" trigger="manual" id="unitprice_' + current_row + '" data-order="' + current_row + '" ></td>';
			new_row += '<td><input required type="text"  value="0" name="mrp[]" class="form-control mrp cleardata " data-toggle="tooltip" trigger="manual" id="mrp_' + current_row + '" data-order="' + current_row + '" ></td>';
			
			new_row += '<td><input required type="text"  value="0"  name="itemtaxable[]" readonly class="form-control taxableAmount cleardata" id="taxable_' + current_row + '" data-value="" data-order="' + current_row + '"></td>';
			new_row += '<td><input required type="text" value="0" name="itemgstper[]" readonly class="form-control cleardata" id="gstper_' + current_row + '" data-order="' + current_row + '"><input type="hidden" name="itemhsncode[]" class="form-control itemhsncode" id="hsncode_' + current_row + '" data-value="" data-order="' + current_row + '" required><input type="hidden" name="itemitemtbid[]" class="form-control itemitemtbid" id="itemtbid_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
			new_row += '<td><input required type="text" value="0"  name="itemgstamount[]" readonly class="form-control gstAmount cleardata" id="gstAmount_' + current_row + '" data-value="" data-valuesingle="" data-order="' + current_row + '"></td>';
			// new_row += '<td><input required type="text"  value="0" name="itemcessamount[]" readonly class="form-control cessAmount cleardata" id="cessAmount_' + current_row + '" data-value="" data-valuesingle="" data-order="' + current_row + '"></td>';
			
			new_row += '<td><input required type="text"  value="0" name="itemtotalamount[]" readonly class="form-control totalAmount cleardata" id="totalAmount_' + current_row + '" data-value="" data-order="' + current_row + '" readonly></td>';
			new_row += '<td><select name="employee[]" class="form-control Employee cleardata" id="employee_' + current_row + '" data-order="' + current_row + '"><?php echo $namelist;?></select></td>';
			new_row+='<input type="hidden" data-order="' + current_row + '"  value="0" name="incentive_id[]" id="incentive_' + current_row + '" value=""/><input type="hidden" data-order="' + current_row + '"  value="0" name="incentive_amount[]" id="incentiveamt_' + current_row + '" value=""/>'
			
			new_row += '<td>';
		
			new_row += '<i data-row="' + current_row + '" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
			new_row += '</td></tr>';

      $('#sales_cont').append(new_row);
     
      $('#BtnNewRow').data('order',current_row);
      
  });

  $('#sales_cont').on('change','.itemBatch',function(){  
	     
			var id = $(this).data('order');
			$('#unitprice_'+id).css("border","1px solid #ccc");
			$('#unitprice_'+id).css("color","#555");
			$('#unitprice_'+id).tooltip('hide');
			$('#unitprice_'+id).attr('data-original-title', '');
			var itemValue = $(this).val();
			var godown=$('#godown').val();
			
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
					$('#qtyinventory_'+id).val(obj.cur_stock_item_count);
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
						// var totalcssamount=parseFloat(obj.e_sr)+parseFloat(cessAmount);
					}
					
					$('#totalAmount_' + id).val(totalcssamount);
					$('#totalAmount_' + id).attr('data-value',totalcssamount);

					if(parseInt(obj.e_sr)<parseInt(obj.e_pc)){
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
					//alert(parseInt(obj.e_sr)+parseInt(cessAmount));
					}
					
				
					
					else{
					//	alert(parseInt(obj.t_sr)+parseInt(cessAmount));
					$('#pcost_' + id).val(obj.t_pc);
					$('#percost_' + id).val(obj.t_pc);
					$('#mop_'+id).val(obj.t_mop);
					$('#unitprice_'+id).val(obj.t_sr);
					$('#mrp_'+id).val(obj.t_mrp);
					if($('#inclusive').is(":checked")){
						var totalcssamount=parseFloat(obj.t_sr);
					}else{
						var totalcssamount=parseFloat(obj.t_sr);
						// var totalcssamount=parseFloat(obj.t_sr)+parseFloat(cessAmount);
					}
				
					$('#totalAmount_' + id).val(totalcssamount);
					$('#totalAmount_' + id).attr('data-value',totalcssamount);

					if(parseInt(obj.t_sr)<parseInt(obj.t_pc)){
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
					//$('#batch_' + id).val(obj.item_batchcode + '-' + obj.itm_ostock);
					$('#taxable_' + id).val(taxableAmount);
					$('#taxable_' + id).attr('data-value', taxableAmount);
					$('#gstAmount_' + id).val(gstAmount);
					$('#gstAmount_' + id).attr('data-value', gstAmount);
					$('#gstAmount_' + id).attr('data-valuesingle', gstAmount);
				
					$('#itemqty_' + id).val(1);
					$('#gstper_' + id).val(obj.hsn_tax);

					recalculate();
				
					//calc_outstanding();
					
				},
		});

	
 });


 $('#sales_cont').on('keyup', '.qnty', function () {
	$(this).val($(this).val().replace(/ +?/g, ''));
	var qnty_demo = $(this).val();
			var order = $(this).data('order');
			var mop=$('#mop_'+order).val();
			var inqty=$('#qtyinventory_'+order).val();
		

			var totalTaxableAmount = 0;
			var totalcessAmount = 0;
			var totalgstAmount = 0;
			var deliverycharge = 0;
			var discount = 0;

			var unitprice_demo = $('#unitprice_'+order).val();

if(unitprice_demo !== null && unitprice_demo == ''){
   var unitprice=0;
}else{
	var unitprice=unitprice_demo;
}

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
			
				

				var item_hsn_tax = $('#gstper_'+order).val();
				// var unitprice = $('#unitprice_'+order).val();
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
					var totalgstvalue=parseFloat(itemsubtotal);
					// var totalgstvalue=parseFloat(cesssubtotal)+parseFloat(itemsubtotal);
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
		

		var id = $(this).data('order');
		var unitpricedemo = $(this).val();
				
		
		var qnty = $('#itemqty_'+id).val();
		var mop = $('#qtymop_'+id).val() / (qnty || 1);
		var minmop=$('#pcost_'+id).val();
	
		// alert(unitpricedemo);alert(minmop);
				
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
			// $('#cessAmount_' + id).val((cesssubtotal).toFixed(2));
			if($('#inclusive').is(":checked")){
				var totalgstvalue=parseFloat(itemsubtotal);
			}else{
				var totalgstvalue=parseFloat(itemsubtotal);
				// var totalgstvalue=parseFloat(cesssubtotal)+parseFloat(itemsubtotal);
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
								$('#incentiveamt_'+order).val(obj.incentamt123);
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
								$('#incentiveamt_'+order).val(obj.incentamt1234);
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
	
});

$('#deliverychare').on('keyup', function () {
			recalculate();
		});

		$('#discount').on('keyup', function () {
			recalculate();
		});
		$('#paidamount, #bankamount').on('keyup', function () {
			recalculate();
		});

		$(".reset").bind("click", function() {
		$(".cleardata").val("");
		});

		$ ('input[name=paymod1]'). click (function () {
			recalculate();
		});

		//=====================================================================

	

		$('#sales_cont').on('click', '.detailDeleteRow', function () {
			var rowNumber = $(this).data('row');
			$('#detailRow_' + rowNumber).remove();
			var rowStart = 1;
			$('.slno').each(function () {
				$(this).html(rowStart); 
				rowStart = rowStart + 1;
			});
			var selectedcount=$('#selectedcount').val();
			var finalcount=parseInt(selectedcount)-parseInt(1);
			//alert(finalcount);
			$('#selectedcount').val(finalcount);


			recalculate();
		});

	
		//===============================================================

	


		
		
	

	

		

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
		$('#sales_cont').on('click','.searchitemmodel', function () {
			$('#searchModel').modal('show');
			$('#searchinput').attr('data-row',$(this).data('row'));
		});
		
		$('#cust_search').on('click','.custsearchmodal', function () {
		//	alert();

		
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
			//alert(phcount);
		});
	
		
		$('#transmode').on('change',function(){
			var id=$(this).val();
			if(id==3){
				$('#financelabel').show();
				$('#financeinput').show();
			}else{
				$('#financelabel').hide();
				$('#financeinput').hide();
			}
		});
	

	


	
	$('#sameasaddress').on('click', function() { 

		$('#deliveryaddress').val($('#address').val());
	});

	

	$("#isigst").change(function() {
 
			
			$('.cessAmount').each(function (index) {

				$(this).val('0.00');
				var order = $(this).data('order');
				var qnty = $('#itemqty_'+order).val();

				var item_hsn_tax = $('#gstper_'+order).val();
				var unitprice = $('#unitprice_'+order).val();
				var taxableAmount = 0;
				if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
					var taxableAmount = (parseFloat(unitprice) / (101 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
				}
				else {
					var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
				}
				var gstAmount = ((taxableAmount * parseFloat(item_hsn_tax)) / 100).toFixed(2);
			

				
				var gstsubtotal = qnty * gstAmount;
			
				var itemsubtotal = qnty * unitprice ;
				var taxablesubtotal = qnty * taxableAmount;

				$('#taxable_' + order).val((taxablesubtotal).toFixed(2));	
				$('#gstAmount_' + order).val((gstsubtotal).toFixed(2));
			
				$('#totalAmount_' + order).val((itemsubtotal).toFixed(2));	


			});

			
			recalculate();
		
	});
	$('#customername').on('keyup',function(){
	  $('#customerid').val(0);
  });



$(document).ready(function(){
		$('form').attr('autocomplete', 'off');

	

});

	</script>
<script>
 


$( document ).ready(function() {
	var discount=$('#discount').val();
	var deliverycharge=$('#deliverychare').val();
	var totalgrand=0;
					$('.totalAmount').each(function( index ) {
         if($(this).val() !=''){
            totalgrand=parseFloat(totalgrand)+parseFloat($(this).val());
         }
     });
	 var finalgarndtotal=parseFloat(totalgrand)+parseFloat(deliverycharge)-parseFloat(discount);
	// alert(finalgarndtotal);
	 $('#roundOfValuue').val((finalgarndtotal % 1).toFixed(2));
	 
	$('#grandTotal').val(Math.round(finalgarndtotal));



		
		var received=$('#amountrecived').val();
		var outstanding=parseInt(finalgarndtotal)-parseInt(received);
		//alert(finalgarndtotal);alert(received);alert(outstanding);
		$('#outstanding').val(outstanding);

	var cessamount=0;
					$('.cessAmount').each(function( index ) {
         if($(this).val() !=''){
            cessamount=parseFloat(cessamount)+parseFloat($(this).val());
         }
		 $('#cessAmount').val(cessamount.toFixed(2));
     });

	 var gstAmount=0;
					$('.gstAmount').each(function( index ) {
         if($(this).val() !=''){
            gstAmount=parseFloat(gstAmount)+parseFloat($(this).val());
         }
		 $('#amountGst').val(gstAmount.toFixed(2));
     });

	 var taxableAmount=0;
					$('.taxableAmount').each(function( index ) {
         if($(this).val() !=''){
            taxableAmount=parseFloat(taxableAmount)+parseFloat($(this).val());
         }
		 $('#totalTaxableAmount').val(taxableAmount.toFixed(2));
     });
});



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

	 var unitprice=document.getElementById('unitprice_'+i+'').value;
	 var minmop=document.getElementById('pcost_'+i+'').value;
	 var stock=document.getElementById('qtyinventory_'+i+'').value;
	 var qty=document.getElementById('itemqty_'+i+'').value;
	 var itembatch=document.getElementById('itembatchid_'+i+'').value;

	 //alert(qty);alert(stock);
	 if(parseInt(itembatch)==0){
		alert("Batch Not selected");
		$('#itembatchid_'+i).css({"border":"2px solid red"});
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
		// form.myButton.disabled = true;
		// form.myButton.value = "Please wait...";
		// return true;
	 }
	
	 
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
		
	 }else if(parseInt(qty) !== null && parseInt(qty) == ''){
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
		// form.myButton.disabled = true;
		// form.myButton.value = "Please wait...";
		// return true;
		
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
		// form.myButton.disabled = true;
		// form.myButton.value = "Please wait...";
		// return true;
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