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

		<h1 align="center">B2c Sale view<small>Preview</small></h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">B2c Sale view</a></li>

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
					
					<form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('AdminController/salesb2ceditnew');?>">
				
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Sales Billing view </h4>
					</div>
                    <input type="hidden" class="form-control" name="master_id12" value="<?php echo $b2c->sales_master_id;?>" id="sale_id">

					<div class="col-sm-12" style="margin-top: 10px;">

						<div class="col-sm-1">

							<label class="exampleInputEmail1">BILL NO :</label>

						</div>

						<div class="col-sm-2">

							<input type="text" name="billno" class="form-control"

								value="<?php echo $b2c->sales_master_bill_no;?>"

								readonly />

                                <input type="hidden" name="mycount" value="<?php echo $b2c->mycount;?>" id="mycount">

						</div>

						<div class="col-sm-1">

							<label class="exampleInputEmail1">BILL DATE:</label>

						</div>

						<div class="col-sm-2">

							<input type="text" name="billdate" class="form-control" value="<?php echo $b2c->sales_master_date;?>"

							id="billdate"	 />

						</div>

						<div class="col-sm-1">

							<label class="exampleInputEmail1">EWAY BILL NUMBER</label>

						</div>

						<div class="col-sm-2">

							<input type="text" name="ewaybillno" class="form-control cleardata"  id="ewaybillnum" value="<?php echo $b2c->sales_master_eway_billno;?>" />

						</div>



						<div class="col-sm-1">

							<label class="exampleInputEmail1">DELIVERY DATE:</label>

						</div>

						<div class="col-sm-2">

							<input type="date" name="deliverydate" id="deliverydate" class="form-control cleardata"  value="<?php echo $b2c->sales_master_delivery_date;?>" />

						</div>



					</div>





					<div class="col-sm-12" style="margin-top: 10px;">

						<div class="col-sm-1">

							<label class="exampleInputEmail1">CUSTOMER NAME:</label>

						</div>

						<div class="col-sm-2" id="cust_search">

							<input type="text" name="customername" id="customername" class="form-control cleardata" style="width:150px;"  value="<?php echo $b2c->sales_master_customer_name;?>" required />

							<input type="hidden" name="customerloginid" id="customerid"  value="<?php echo $b2c->sales_master_customer_login_id;?>">

							<!-- <i class="fa fa-search custsearchmodal" data-row="1" aria-hidden="true"

											style="font-size:12px;cursor:pointer;padding:5px;margin-left:171px;" ></i> -->

							<div class="customer_list"></div>

							

						</div>

						<div class="col-sm-1">

							<label class="exampleInputEmail1">PHONE NUMBER:</label>

						</div>

						<div class="col-sm-2">

							<input type="text" name="phonenumber" class="form-control cleardata" id="phon_num" value="<?php echo $b2c->sales_master_phone_no;?>" required />

						</div>



						<div class="col-sm-1">

							<label class="exampleInputEmail1">ADDRESS:</label>

						</div>

						<div class="col-sm-2">

							<textarea name="address" class="form-control cleardata" id="address"><?php echo $b2c->sales_master_customer_address;?></textarea>

						</div>





						<div class="col-sm-1">

							<label class="exampleInputEmail1"> DELIVERY ADDRESS: &nbsp;&nbsp;&nbsp;<input type="checkbox" name="sameasaddress" id="sameasaddress"></label>

						</div>

						<div class="col-sm-2">

							<textarea name="deliveryaddress" id="deliveryaddress" class="form-control cleardata" ><?php echo $b2c->sales_master_delivery_address;?></textarea>

						</div>





					</div>



					<div class="col-sm-12">

					<div class="col-sm-1">

							<label class="exampleInputEmail1">TRANSACTION MODE:</label>

						</div>

						<div class="col-sm-2"> 

						<select name="transmode" class="form-control " id="transmode">

						<option value="0">Select</option>

						<option value="1" <?php if($b2c->sales_master_trans_mode==1){echo 'selected';}?>>Cash</option>

						<option value="2" <?php if($b2c->sales_master_trans_mode==2){echo 'selected';}?>>Credit</option>

						<option value="3" <?php if($b2c->sales_master_trans_mode==3){echo 'selected';}?>>Finace</option>

						</select>

						</div>

						<div class="col-sm-1" id="financelabel" <?php if($b2c->sales_master_trans_mode!=3){?>style="display:none;"<?php }?>>

							<label class="exampleInputEmail1">FINANCE:</label>

						</div>

						<div class="col-sm-2" id="financeinput" <?php if($b2c->sales_master_trans_mode!=3){?>style="display:none;"<?php }?>>

						<select name="financeid" class="form-control" id="financenew">

						<option value="0">Select</option>

						<?php foreach($finance as $finance){?>

						<option value="<?php echo  $finance->id;?>" <?php if($finance->id==$b2c->sales_master_finance_id){echo 'selected';}?>><?php echo  $finance->finance;?></option>

						<?php } ?>

						</select>

						</div>

						<div class="col-sm-2">

									<label><input type="checkbox" name="isigst" id="isigst" value="1" class="cleardata" <?php if($b2c->sales_master_is_igst==1){echo 'checked';}?>/> IS IGST</label>

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

									<th scope="col">Cess</th>

									<th scope="col">Total</th>

									<th scope="col">Employee</th>

									

							
								</tr>

							</thead>

							<tbody id="sales_cont">

                            <?php 

                            $i=1;

                            foreach($b2ctrans as $single){?>

								<tr id="detailRow_<?php echo $i;?>">

									<th scope="row" class="slno"><?php echo $i;?></th> 

									<td>

									<input type="hidden" name="purcost[]"  class="form-control cleardata" id="pcost_<?php echo $i;?>"

											data-order="<?php echo $i;?>" style="float:left" value="<?php if($single->t_pc==0.00){echo $single->e_pc;}else{echo $single->t_pc;} ?>" >

                                            <input type="hidden" value="<?php echo $single->sales_trans_id;?>" name="transnedid[]" class="form-control cleardata" id="transid_<?php echo $i;?>"

											data-order="<?php echo $i;?>" style="float:left" >

											<input type="hidden" name="puritemid[]" value="<?php echo $single->sales_trans_item_id;?>" class="form-control cleardata" id="puritem_<?php echo $i;?>"

											data-order="<?php echo $i;?>" style="float:left" >

											<input type="hidden"  class="form-control cleardata" id="mop_<?php echo $i;?>"

											data-order="<?php echo $i;?>" style="float:left" >

											<input type="hidden"  class="form-control cleardata" id="qtymop_<?php echo $i;?>"

											data-order="<?php echo $i;?>" style="float:left" >

											<input type="hidden"  class="form-control cleardata" id="qtyinventory_<?php echo $i;?>"

											data-order="<?php echo $i;?>" style="float:left" value="<?php echo $single->inventory_stock_itemcount;?>" >


											<input type="hidden"  class="form-control cleardata" id="oldqty_<?php echo $i;?>"

										data-order="<?php echo $i;?>" style="float:left" value="<?php echo $single->sales_trans_qty;?>" >

									<input type="text" name="itemcode[]" value="<?php echo $single->sales_trans_itm_code;?>" class="form-control codeItem cleardata" id="code_<?php echo $i;?>"

											data-order="<?php echo $i;?>" style="float:left" >

											

										<i class="fa fa-search searchitemmodel" data-row="<?php echo $i;?>" aria-hidden="true"

											style="font-size:12px;cursor:pointer;padding:5px" ></i>

										<div id="code_list_<?php echo $i;?>" style="position: absolute;z-index: 99;"></div>

									</td>

									<td><input type="text" name="itemname[]" value="<?php echo $single->itm_name;?>" class="form-control nameItem cleardata" 

											id="itemname_<?php echo $i;?>" data-order="<?php echo $i;?>"  >

										<div id="name_list_<?php echo $i;?>" style="position: absolute;z-index: 99;"></div>

									</td>

								

									<td>

                                    <?php 

                                    $itemid=$single->sales_trans_item_id;

                                    $itemvbatchfetch=$this->Admin_model->get_itembatchfeting($itemid);

                                    

                                    ?>

										<select name="itembatchid[]" style="width:100px;" class="form-control itemBatch" id="itembatchid_<?php echo $i;?>" placeholder="Batch" data-order="<?php echo $i;?>" required>

											
											<?php foreach($itemvbatchfetch as $itemvbatchfetch){  ?>

                                            <option value="<?php echo $itemvbatchfetch->batch_id ;?>" <?php if($itemvbatchfetch->batch_id==$single->batch_id ){echo 'selected';}?>><?php echo $itemvbatchfetch->batchcode;?></option>  

                                        <?php } ?>

										</select>

									</td>

									<td><input type="text" value="<?php echo $single->sales_trans_qty;?>"  name="itemqnty[]" class="form-control qnty cleardata"

											id="itemqty_<?php echo $i;?>" data-order="<?php echo $i;?>" ></td>

											<td><input type="text"  value="<?php echo $single->sales_trans_unit_price;?>" name="unitprice[]" class="form-control unitprice cleardata"

											id="unitprice_<?php echo $i;?>" data-order="<?php echo $i;?>" data-toggle="tooltip" trigger="manual"></td>

											<td><input type="text" name="mrp[]" class="form-control mrp cleardata"
											id="mrp_<?php echo $i;?>" data-order="<?php echo $i;?>" data-toggle="tooltip" trigger="manual" value="<?php echo $single->sale_trans_mrp;?>"></td>
								
									<td><input type="text" name="itemtaxable[]" value="<?php echo $single->sales_trans_taxable_value;?>" class="form-control taxableAmount cleardata"

											 id="taxable_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" readonly>

									</td>

									<td><input type="text" name="itemgstper[]" class="form-control cleardata" 

											id="gstper_<?php echo $i;?>" value="<?php echo $single->sales_trans_gst_percentage;?>" data-order="<?php echo $i;?>" readonly></td>

									<td><input type="text" name="itemgstamount[] " class="form-control gstAmount cleardata"

											 id="gstAmount_<?php echo $i;?>" value="<?php echo $single->sales_trans_gst_amount;?>" data-value="" data-valuesingle="" data-order="<?php echo $i;?>" readonly>

										<input type="hidden" name="itemitemtbid[] " class="form-control itemitemtbid cleardata"

											id="itemtbid_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" >

												<input type="hidden" name="itemhsncode[]" class="form-control itemhsncode cleardata"

											id="hsncode_<?php echo $i;?>" data-value="" value="<?php echo $single->sales_trans_hsn_code;?>" data-order="<?php echo $i;?>" ></td>

									<td><input type="text" value="<?php echo $single->sales_trans_cess;?>" name="itemcessamount[]" class="form-control cessAmount cleardata"

											id="cessAmount_<?php echo $i;?>" data-value="" data-valuesingle="" data-order="<?php echo $i;?>" readonly>

									</td>

									<td><input type="text" name="itemtotalamount[]" value="<?php echo $single->sales_trans_total;?>" class="form-control totalAmount cleardata" 

											id="totalAmount_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" readonly></td>

									<td><select name="employee[]" class="form-control Employee cleardata"  id="employee_<?php echo $i;?>" data-order="<?php echo $i;?>" >
									
									<option value="">select</option>
                                   <?php 

                                   $emp=$this->Admin_model->get_staff1();

                                  foreach($emp as $emp){?>

                                   <option value="<?php echo $emp->stf_id;?>" <?php if($emp->stf_id==$single->sales_employee_name){echo 'selected';}?>><?php echo $emp->stf_name;?></option>

                                        

                                   <?php }?>

                                   

                                 

										</select>

										<input type="hidden" data-order="<?php echo $i;?>" name="incentive_id[]" value="<?php echo $single->sales_trans_incentive_id;?>" id="incentive_<?php echo $i;?>" value="<?php echo $single->sales_trans_incentive_id;?>" />

										<input type="hidden" data-order="<?php echo $i;?>" name="incentive_amount[]" value="<?php echo $single->sales_trans_incentive_amount;?>" id="incentiveamt_<?php echo $i;?>" value="<?php echo $single->sales_trans_incentive_amount;?>" />

										</td>

								</tr>

                            <?php $i++; } ?>



							</tbody>

						</table>

					</div>

					<div class="col-sm-12" style="text-align: center;margin-top: -25px;">

						<!-- <button type="button" id="BtnNewRow" data-order="<?=count($b2ctrans)?>" class="btn btn-info btn-sm">ADD</button> -->

					</div>

					<div class="col-sm-12">

						<div class="col-sm-6">

							<div class="col-sm-12">

								<div class="col-sm-2">

									<label class="exampleInputEmail1">NOTE</label>

								</div>

								<div class="col-sm-4">

									<textarea name="note" id="note" class="form-control cleardata"><?php echo $b2c->sales_master_note;?></textarea>

								</div>

								<div class="col-sm-2">

									<label class="exampleInputEmail1">VEHICLE NUMBER:</label>

								</div>

								<div class="col-sm-4">

									<input type="text" name="vehicleno" id="vehiclenumber" class="form-control cleardata" value="<?php echo $b2c->sales_master_veh_no;?>" />

								</div>

							</div>

							<div class="col-sm-12" style="margin-top: 20px;">



								<div class="col-sm-2">

									<label class="exampleInputEmail1">OUT STANDING</label>

								</div>

								<div class="col-sm-4">

									<input type="hidden" name="outstanding_previous" id="outstanding_previous" value="0" value="<?php echo $b2c->sales_master_outstanding;?>">

									<input type="text" name="outstanding" id="outstanding" class="form-control cleardata" value="<?php echo $b2c->sales_master_outstanding;?>"/>

								</div>

								<div class="col-sm-2">



								</div>

								

							</div>



							<div class="col-sm-12">

								<div class="col-sm-2">

									<label class="exampleInputEmail1">PAYMENT MODE</label>

								</div>

								<div class="col-sm-10">

									<input type="radio" class="custom-control-input banktrancheck" id="defaultChecked"

										name="paymod1" value="1" <?php if($b2c->sales_master_payment_mode==1){echo 'checked';}?>>

									<label class="custom-control-label" for="defaultChecked">BANK TRANSFER</label>

									<input type="radio" class="custom-control-input chquecheck cleardata" id="defaultChecked"

										name="paymod1" value="2" <?php if($b2c->sales_master_payment_mode==2){echo 'checked';}?>>

									<label class="custom-control-label" for="defaultChecked">CHEQUE</label>

									<!-- <input type="radio" class="custom-control-input emicheck cleardata" id="defaultChecked "

										name="paymod1" value="3" <?php if($b2c->sales_master_payment_mode==3){echo 'checked';}?>>

									<label class="custom-control-label" for="defaultChecked">EMI</label> -->

									<input type="radio" class="custom-control-input bothcheck cleardata" id="defaultChecked "

										name="paymod1" value="4" <?php if($b2c->sales_master_payment_mode==4){echo 'checked';}?>>

									<label class="custom-control-label" for="defaultChecked">BOTH</label>

									<input type="radio" class="custom-control-input bankcheck cleardata" id="defaultChecked "

										name="paymod1" value="5" <?php if($b2c->sales_master_payment_mode==5){echo 'checked';}?>>

									<label class="custom-control-label" for="defaultChecked">BANK</label>

									<input type="radio" class="custom-control-input cashcheck cleardata" id="defaultChecked"

										name="paymod1" value="6" <?php if($b2c->sales_master_payment_mode==6){echo 'checked';}?>>

									<label class="custom-control-label" for="defaultChecked cleardata">CASH</label>



								</div>

							</div>

							<div class="col-sm-12">

								<div class="col-sm-2 ">

									<label class="exampleInputEmail1 cardnumber " style="display: none;">CARD

										NUMBER</label>

									<label class="exampleInputEmail1 salescheque "

										style="display: none;margin-top:10px;">CHEQUE NUMBER</label>

                                        <?php if($b2c->sales_master_payment_mode==1){?>	<label class="exampleInputEmail1 transcheq "

										style="display: none;margin-top:10px;">TRANSACTION ID</label><?php } ?>

										<?php if($b2c->sales_master_payment_mode==5 || $b2c->sales_master_payment_mode==4){?>

									<label class="exampleInputEmail1 bankamount1 "

										style="margin-top:10px;">BANK AMOUNT</label><br>
										<?php } ?>

									<label class="exampleInputEmail1 bank1"

										style="display: none;margin-top:10px;">BANK</label><br>

										<label class="exampleInputEmail1 financelabel "

										style="display: none;margin-top:10px;">FINANCE</label>

								</div>

								<div class="col-sm-4">

									<input type="text" name="cardnumber" value="<?php echo $b2c->sales_master_cardnum; ?>" class="form-control salecardnumber cleardata"

										style="display: none;" />

									<input type="text" name="chequenum" value="<?php echo $b2c->sales_master_cheque_no; ?>" class="form-control saleschequenumber cleardata"

										style="margin-top:10px;display: none;" />

									<input type="text" name="transcheque" class="form-control salestranscheque cleardata"

										style="margin-top:10px;display:none;" value="<?php echo $b2c->sales_master_banktransaction_id; ?>" />

										<?php if($b2c->sales_master_payment_mode==5 || $b2c->sales_master_payment_mode==4){?>
									<input type="text" name="bankamount" id="bankamount" class="form-control bankamount cleardata"

										style="margin-top:10px;" value="<?php echo $b2c->sales_master_bankamount; ?>" />

										<?php } ?>

									

										<select name="bank" class="form-control bank cleardata" style="margin-top:10px;display: none;">

										<option value="0"></option>

										<?php foreach($bank as $key1){

											?>

											<option value="<?php echo $key1->bank_id;?>" <?php if($b2c->sales_master_bank==$key1->bank_id){echo 'selected';}?>><?php echo $key1->bank_name.'-'.substr($key1->ba_acnumber, -4);?></option>

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

									<input type="text" name="paidamount" value="<?php echo $b2c->sales_master_amount_paid; ?>" id="paidamount" class="form-control cleardata"

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

									<input type="text" name="deliverychare" value="<?php echo $b2c->sales_master_delivery_charge; ?>" id="deliverychare" class="form-control cleardata"

										 />

								</div>





								<div class="col-sm-2">

									<label class="exampleInputEmail1">TOTAL TAXABLE AMOUNT</label>

								</div>

								<div class="col-sm-4">

									<input type="text" readonly name="totalTaxableAmount" id="totalTaxableAmount"

										class="form-control cleardata" value="<?php echo $b2c->sales_master_tot_taxable_amount; ?>" />

								</div>

							</div>









							<div class="col-sm-12">

								<div class="col-sm-2">

									<label class="exampleInputEmail1">DISCOUNT</label>

								</div>

								<div class="col-sm-4">

									<input type="text" name="discount" id="discount" class="form-control cleardata" value="<?php echo $b2c->sales_master_discount; ?>" />

								</div>

								<div class="col-sm-2">

									<label class="exampleInputEmail1">GST AMOUNT</label>

								</div>

								<div class="col-sm-4">

									<input type="text" name="amountGst" readonly id="amountGst" class="form-control cleardata" value="<?php echo $b2c->sales_master_tot_gst_amount; ?>"  />

								</div>



							</div>

							<div class="col-sm-12" style="margin-top: 10px;">

								<div class="col-sm-6">

								</div>

								<div class="col-sm-2">

									<label class="exampleInputEmail1">CESS</label>

								</div>

								<div class="col-sm-4">

									<input type="text" name="cessAmount" readonly value="<?php echo $b2c->sales_master_total_cess; ?>" id="cessAmount" class="form-control cleardata"

										 />

								</div>

							</div>

							<div class="col-sm-12" style="margin-top: 10px;">

								<div class="col-sm-6"></div>

								<div class="col-sm-2">

									<label class="exampleInputEmail1">ROUND OFF</label>

								</div>

								<div class="col-sm-4">

									<input type="text" name="roundOfValuue" readonly value="<?php echo $b2c->sales_master_round_off; ?>" id="roundOfValuue" class="form-control cleardata"

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

									<input type="text" name="grandTotal" readonly value="<?php echo $b2c->sales_master_grand_total; ?>" id="grandTotal" class="form-control cleardata"

										 />

								</div>

							</div>

							<!---->

						</div>

					</div>





				

				

					



	



	

	</section>

	<script>

		function deletechecked() {

			if (confirm("Do you really want to delete this Item?")) {

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
	
	</body>

	</html>