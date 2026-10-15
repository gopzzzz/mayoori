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

		<h1 align="center">B2c Sale Edit<small>Preview</small></h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">B2c Sale Edit</a></li>

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
						<h4 class="modal-title">Sales Billing Edit </h4>
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

							<input type="text" name="customername" id="customername"  class="form-control cleardata" style="width:150px;"  value="<?php echo $b2c->sales_master_customer_name;?>" required />

							<input type="hidden" name="customerloginid" id="customerid"  value="<?php echo $b2c->sales_master_customer_login_id;?>">

						

							<div class="customer_list"></div>

							

						</div>

						<div class="col-sm-1">

							<label class="exampleInputEmail1">PHONE NUMBER:</label>

						</div>

						<div class="col-sm-2">

							<input type="text" name="phonenumber" maxlength="10" class="form-control cleardata" id="phon_num" value="<?php echo $b2c->sales_master_phone_no;?>" required />

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

						<!-- <div class="col-sm-2">
									<label><input type="checkbox" name="inclusive" id="inclusive" value="1" class="cleardata"/>INCLUSIVE</label>
						</div> -->

                      
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

											data-order="<?php echo $i;?>" style="float:left" value="<?php echo $single->cur_stock_item_count+ $single->sales_trans_qty;?>" >


											<input type="hidden"  class="form-control cleardata" id="oldqty_<?php echo $i;?>"

										data-order="<?php echo $i;?>" style="float:left" value="<?php echo $single->sales_trans_qty;?>" >

									<input type="text" disabled name="itemcode[]" value="<?php echo $single->sales_trans_itm_code;?>" class="form-control codeItem cleardata" id="code_<?php echo $i;?>"

											data-order="<?php echo $i;?>" style="float:left" >

											

										<!-- <i class="fa fa-search searchitemmodel" data-row="<?php echo $i;?>" aria-hidden="true"

											style="font-size:12px;cursor:pointer;padding:5px" ></i> -->

										<div id="code_list_<?php echo $i;?>" style="position: absolute;z-index: 99;"></div>

									</td>

									<td><input type="text" disabled name="itemname[]" value="<?php echo $single->itm_name;?>" class="form-control nameItem cleardata" 

											id="itemname_<?php echo $i;?>" data-order="<?php echo $i;?>"  >

										<div id="name_list_<?php echo $i;?>" style="position: absolute;z-index: 99;"></div>

									</td>

								

									<td>

                                    <?php 

                                    $itemid=$single->sales_trans_item_id;

                                    $itemvbatchfetch=$this->Admin_model->get_itembatchfeting($itemid);

                                    

                                    ?>

										<select name="itembatchid[]" required  style="width:100px;" class="form-control  itemBatchnew" id="itembatchid_<?php echo $i;?>" placeholder="Batch" data-order="<?php echo $i;?>"  data-row="<?php echo $i;?>" required>

											
											<?php foreach($itemvbatchfetch as $itemvbatchfetch){  ?>

                                            <option value="<?php echo $itemvbatchfetch->batch_id ;?>" <?php if($itemvbatchfetch->batch_id==$single->batch_id ){echo 'selected';}?>><?php echo $itemvbatchfetch->batchcode;?>(<?php echo $single->cur_stock_item_count;?>)</option>  

                                        <?php } ?>

										</select>

										<!-- <input type="text" name="batchcode" class="form-control batchcode" id="batchcode_1" data-order="1">
										<div id="batchlist_1" style="position: absolute;z-index: 99;"></div> -->

									</td>

									<td><input  step=".01"  type="text" min="0" value="<?php echo $single->sales_trans_qty;?>"  name="itemqnty[]" class="form-control qnty cleardata qntynew"

											id="itemqty_<?php echo $i;?>" data-order="<?php echo $i;?>" ></td>

											<td><input type="text"  value="<?php echo $single->sales_trans_unit_price;?>" name="unitprice[]" class="form-control unitprice  unitpricenew cleardata"

											id="unitprice_<?php echo $i;?>" data-order="<?php echo $i;?>" data-toggle="tooltip" trigger="manual"></td>

											<td><input type="text" name="mrp[]" class="form-control mrp mrpnew cleardata"
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

									<!-- <td><input type="text" value="<?php echo $single->sales_trans_cess;?>" name="itemcessamount[]" class="form-control cessAmount cleardata"

											id="cessAmount_<?php echo $i;?>" data-value="" data-valuesingle="" data-order="<?php echo $i;?>" readonly>

									</td> -->

									<td><input type="text" name="itemtotalamount[]" value="<?php echo $single->sales_trans_total;?>" class="form-control totalAmount cleardata" 

											id="totalAmount_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" readonly></td>

									<td><select name="employee[]" class="form-control Employee Employeenew cleardata"  id="employee_<?php echo $i;?>" data-order="<?php echo $i;?>" >
									<option value="0"></option>
                                   <?php 

                                   $emp=$this->Admin_model->get_staff1();

                                  foreach($emp as $emp){?>

                                   <option value="<?php echo $emp->stf_id;?>" <?php if($emp->stf_id==$single->sales_employee_name){echo 'selected';}?>><?php echo $emp->stf_name;?></option>

                                        

                                   <?php }?>

                                   

                                 

										</select>

										<input type="hidden" data-order="<?php echo $i;?>" name="incentive_id[]" value="<?php echo $single->sales_trans_incentive_id;?>" id="incentive_<?php echo $i;?>" value="<?php echo $single->sales_trans_incentive_id;?>" />

										<input type="hidden" data-order="<?php echo $i;?>" name="incentive_amount[]" value="<?php echo $single->sales_trans_incentive_amount;?>" id="incentiveamt_<?php echo $i;?>" value="<?php echo $single->sales_trans_incentive_amount;?>" />

										</td>

									<td>

									<!-- <a href="#" class="editrowb2csale" id="editicon_<?php echo $i;?>" data-row="<?php echo $i;?>"><i class="fa fa-floppy-o"></i></a> -->

									

										<i class="fa fa-trash detailDeleteRow1" onclick="deletechecked()" data-row="<?php echo $i;?>" aria-hidden="true"

											style="font-size:15px;margin-top: 10px;cursor:pointer"></i>

									</td>

								</tr>

                            <?php $i++; } ?>



							</tbody>

						</table>

					</div>

					<div class="col-sm-12" style="text-align: center;margin-top: -25px;">

						<button type="button" id="BtnNewRow" data-order="<?=count($b2ctrans)?>" class="btn btn-info btn-sm">ADD</button>

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

									<input type="hidden" name="outstanding_previous" id="outstanding_previous"  value="0">

									<input type="hidden" name="outstanding_previous1" id="outstanding_previous1"  value="<?php echo $b2c->sales_master_outstanding;?>">
									
									<input type="text" readonly name="outstanding" id="outstanding" class="form-control cleardata" value="<?php echo $b2c->sales_master_outstanding;?>"/>

								</div>

								<div class="col-sm-2">



								</div>

								

							</div>



							<div class="col-sm-12">

								<div class="col-sm-12">

									<label class="exampleInputEmail1">PAYMENT MODE</label>

								</div>

								<div class="col-sm-12">

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

                                       	<label class="exampleInputEmail1 transcheq "

										style="display: none;margin-top:10px;">TRANSACTION ID</label>
								
									<label class="exampleInputEmail1 bankamount1 "

									<?php if($b2c->sales_master_payment_mode==6 || $b2c->sales_master_payment_mode==5){ ?>style="display:none;";<?php }?>style="margin-top:10px;">BANK AMOUNT</label><br>

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
										
												

									   <input type="text" name="bankamount" id="bankamount" class="form-control bankamount cleardata"

										style="margin-top:10px;<?php if($b2c->sales_master_payment_mode==6 || $b2c->sales_master_payment_mode==5){ ?>display:none;<?php }?>"  value="<?php echo $b2c->sales_master_bankamount; ?>" />

									

									

										<select name="bank" class="form-control bank cleardata" style="margin-top:10px;" id="bankname">

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

										style="margin-top:10px;" required />

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

							<!-- <div class="col-sm-12" style="margin-top: 10px;">

								<div class="col-sm-6">

								</div>

								<div class="col-sm-2">

									<label class="exampleInputEmail1">CESS</label>

								</div>

								<div class="col-sm-4">

									<input type="text" name="cessAmount" readonly value="<?php echo $b2c->sales_master_total_cess; ?>" id="cessAmount" class="form-control cleardata"

										 />

								</div>

							</div> -->

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

					<div class="col-sm-12" style="margin-top: 20px;">

					

						<div class="col-sm-6">

							<input type="hidden" name="savetype" id="savetype" />

						

							<div class="col-sm-2">

								<button type="submit" id="saveonly" class="btn btn-success btn-sm">ADD ON</button>

							</div>

							<!-- <div class="col-sm-2">
                                <button type="button" class="btn btn-sm btn-warning" id="savemasterchange">SAVE</button>

                        </div> -->

						<div class="col-sm-2">
                               <a href="<?php echo base_url('salesprint/').$b2c->sales_master_id;?>" > <button type="button" class="btn btn-sm btn-primary" >PRINT</button></a>

                        </div>
						

							

						</div>

						<!---->





					</div>





				

				

					



		<div class="modal fade" id="custsearch_modal" role="dialog">

			<div class="modal-dialog" style="width:100%;">

				<!-- Modal content-->

				<div class="modal-content">

					<div class="modal-header">

						<button type="button" class="close" data-dismiss="modal">&times;</button>

						<h4 class="modal-title">Search</h4>

					</div>

					<div class="col-sm-12 text-center" style="padding-bottom:15px">

						<label></label>

						<input type="text" id="customersearchinput" data-row="" style="max-width: 200px;">

					</div>

					<div class="co-sm-12">

						<table  id="example2" class="table table-hover" style="width:98%;margin: 10px;">

							<thead>

								<tr>

									<th>Customer Name</th>

									<th>Customer Code</th>

									<th>Customer Address</th>

									<th>Phone Number</th>

									<th>Email</th>

									

								</tr>

							</thead>

							<tbody id="searchcust">

							
							</tbody>

						</table>

					</div>

					<div class="modal-footer">

					</div>

				</div>

			</div>

		</div>


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

	

	</section>

	<script>

		function deletechecked() {

			if (confirm("Do you really want to delete this Item?")) {

				$('#sales_cont').on('click', '.detailDeleteRow1', function () {
			var rowNumber = $(this).data('row');
			var id=$(this).data('row');
		

			
			var sid=$('#sale_id').val();
			var tid=$('#transid_'+rowNumber).val();
			var item=$('#puritem_'+rowNumber).val();
			var batch=$('#itembatchid_'+rowNumber).val();
			var itemqty=$('#itemqty_'+rowNumber).val();
				

				//alert(item);
				

			$.ajax({

				type: "POST",
				url: '<?php echo site_url('AdminController/b2csaleeditdeleterow');?>',
				data: {tid:tid,item:item,batch:batch,itemqty:itemqty
				},

				success: function(res) {
				//	console.log(res);

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
								url: '<?php echo site_url('AdminController/b2csaleeditdeleterowedit');?>',
								data: {note:note,vehiclenumber:vehiclenumber,outstanding:outstanding,
					paymod1:paymod1,paidamount:paidamount,deliverychare:deliverychare,totalTaxableAmount:totalTaxableAmount,
					amountGst:amountGst,cessAmount:cessAmount,roundOfValuue:roundOfValuue,grandTotal:grandTotal,discount:discount,
					sid:sid
								},

								success: function(res) {
									//location.reload();
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


	
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script>

		

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


var outstanding_previous = $('#outstanding_previous').val(); 
var finaloutstandingamount=parseFloat(outstanding_previous) + parseFloat(grandTotal) - parseFloat(paidamount) - parseFloat(bankamount);
$('#outstanding').val(Math.round(finaloutstandingamount));

}

function autosave(id){
	

 
 var code=$('#code_'+id).val();
 var itemqty=$('#itemqty_'+id).val();
 var taxable=$('#taxable_'+id).val();
 var hsncode=$('#hsncode_'+id).val();
 var gstper=$('#gstper_'+id).val();
 var gstamount=$('#gstAmount_'+id).val();
 var cess=$('#cessAmount_'+id).val();
 var total=$('#totalAmount_'+id).val();
 var item=$('#puritem_'+id).val();
 var batch=$('#itembatchid_'+id).val();
 var employee=$('#employee_'+id).val();
 var unitprice=$('#unitprice_'+id).val();
 var inceid=$('#incentive_'+id).val();
 var inamount=$('#incentiveamt_'+id).val();
 var mrp=$('#mrp_'+id).val();
 var tid=$('#transid_'+id).val();
 var sid=$('#sale_id').val();
 var oqty=$('#oldqty_'+id).val();
 var pcost=$('#pcost_'+id).val();


 

    var  note=$('#note').val();
	var  vehiclenumber=$('#vehiclenumber').val();
	var  cusid=$('#customerid').val();
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
	var  outstanding_previous=$('#outstanding_previous1').val();
	
if(parseInt(itemqty)<parseInt(1)){
alert("Please Enter qty is is grater than 0");
}else{
	if(parseFloat(unitprice)<parseFloat(pcost) ){
  alert("Please enter unit price is grater than purchase cost ");
 }else if(parseFloat(unitprice) !== null && parseFloat(unitprice) == ''){
	alert("Please enter unit price is grater than purchase cost ");
 }else{
	$.ajax({

type: "POST",
url: '<?php echo site_url('AdminController/b2csaletranseditnew');?>',
data: {
	code:code,itemqty:itemqty,taxable:taxable,hsncode:hsncode,gstper:gstper,gstamount:gstamount,cess:cess,
	total:total,item:item,batch:batch,employee:employee,unitprice:unitprice,inceid:inceid,inamount:inamount,
	mrp:mrp,tid:tid,note:note,vehiclenumber:vehiclenumber,outstanding:outstanding,sid:sid,oqty:oqty,
					paymod1:paymod1,paidamount:paidamount,deliverychare:deliverychare,totalTaxableAmount:totalTaxableAmount,
					amountGst:amountGst,cessAmount:cessAmount,roundOfValuue:roundOfValuue,grandTotal:grandTotal,discount:discount,cusid:cusid,outstanding_previous:outstanding_previous
},

success: function(res) {
	console.log(res);
	if(res==1){
		
		location.reload();
	}else{
	alert("stock Not available");	
	location.reload();
	}
	//
},

});
 }
}

}

function autosavenew(){
	var id=$('#sale_id').val();
	var billdate=$('#billdate').val();
	var ewaybillnum=$('#ewaybillnum').val();
	var deliverydate=$('#deliverydate').val();
	var customername=$('#customername').val();
	var customerid=$('#customerid').val();
	var phon_num=$('#phon_num').val();
	var address=$('#address').val();
	var deliveryaddress=$('#deliveryaddress').val();
	var transmode=$('#transmode').val();
	var financenew=$('#financenew').val();
	var cusid=$('#customerid').val();
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
	var  bankamount=$('#bankamount').val();
	var  bankname=$('#bankname').val();
	var  deliverychare=$('#deliverychare').val();
	var  totalTaxableAmount=$('#totalTaxableAmount').val();
	var  amountGst=$('#amountGst').val();
	var  cessAmount=$('#cessAmount').val();
	var  roundOfValuue=$('#roundOfValuue').val();
	var  grandTotal=$('#grandTotal').val();
	var  discount=$('#discount').val();
	var  outstanding_previous=$('#outstanding_previous1').val();



			$.ajax({

				type: "POST",
				url: '<?php echo site_url('AdminController/b2csaleeditnew');?>',
				data: {
					bankname:bankname,bankamount:bankamount,id: id,billdate:billdate,ewaybillnum:ewaybillnum,deliverydate:deliverydate,customername:customername,
					customerid:customerid,phon_num:phon_num,address:address,deliveryaddress:deliveryaddress,transmode:transmode,
					financenew:financenew,isigst:isigst,note:note,vehiclenumber:vehiclenumber,outstanding:outstanding,
					paymod1:paymod1,paidamount:paidamount,deliverychare:deliverychare,totalTaxableAmount:totalTaxableAmount,
					amountGst:amountGst,cessAmount:cessAmount,roundOfValuue:roundOfValuue,grandTotal:grandTotal,discount:discount,cusid:cusid,outstanding_previous:outstanding_previous
				},

				success: function(res) {
					location.reload();
				},

			});
}

		//Dynamic Row Adding Code

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
	  new_row += '<td><input type="hidden" value="0" name="purcost2[]" class="form-control cleardata" id="pcost_'+current_row+'" data-order="'+current_row+'" style="float:left" ><input required type="hidden"   value="0" class="form-control  puritem" id="puritem_' + current_row + '" name="puritemid2[]" data-order="' + current_row + '" style="float:left"><input required type="hidden"  value="0" class="form-control  " id="mop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"   value="0" class="form-control  " id="qtyinventory_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  class="form-control  "  value="0" id="qtymop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  value="0" class="form-control  codeItem" id="percost_' + current_row + '" data-order="' + current_row + '" style="float:left"><input required type="text"   name="itemcode2[]" class="form-control  cleardata codeItem" id="code_' + current_row + '" data-order="' + current_row + '" style="float:left"><div id="code_list_' + current_row + '"></div></td>';
			new_row += '<td><input required type="text"   name="itemname2[]" class="form-control nameItem cleardata" id="itemname_' + current_row + '" data-order="' + current_row + '" ><div id="name_list_' + current_row + '"></div></td>';
			new_row += '<td style="width:130px;"><select required name="itembatchid2[]" style="display:none;" class="form-control itemBatch cleardata" id="itembatchid_'+current_row+'" data-order="'+current_row+'" placeholder="Batch"><option >Select Batch</option></select><input type="text" name="batchcode" class="form-control batchcode" id="batchcode_' + current_row + '" data-order="' + current_row + '"><div id="batchlist_' + current_row + '" style="position: absolute;z-index: 99;"></td>';
			
			new_row += '<td><input required  step=".01"  type="text" min="0"  name="itemqnty2[]"  class="form-control qnty cleardata " id="itemqty_' + current_row + '" data-order="' + current_row + '" ></td>';
			new_row += '<td><input required type="text"   name="unitprice2[]" class="form-control unitprice cleardata " data-toggle="tooltip" trigger="manual" id="unitprice_' + current_row + '" data-order="' + current_row + '" ></td>';
			new_row += '<td><input required type="text"  value="0" name="mrp2[]" class="form-control mrp cleardata " data-toggle="tooltip" trigger="manual" id="mrp_' + current_row + '" data-order="' + current_row + '" ></td>';
			
			new_row += '<td><input required type="text"  value="0"  name="itemtaxable2[]" readonly class="form-control taxableAmount cleardata" id="taxable_' + current_row + '" data-value="" data-order="' + current_row + '"></td>';
			new_row += '<td><input required type="text" value="0" name="itemgstper2[]" readonly class="form-control cleardata" id="gstper_' + current_row + '" data-order="' + current_row + '"><input type="hidden" name="itemhsncode2[]" class="form-control itemhsncode" id="hsncode_' + current_row + '" data-value="" data-order="' + current_row + '" required><input type="hidden" name="itemitemtbid2[]" class="form-control itemitemtbid" id="itemtbid_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
			new_row += '<td><input required type="text" value="0"  name="itemgstamount2[]" readonly class="form-control gstAmount cleardata" id="gstAmount_' + current_row + '" data-value="" data-valuesingle="" data-order="' + current_row + '"></td>';
			// new_row += '<td><input required type="text"  value="0" name="itemcessamount2[]" readonly class="form-control cessAmount cleardata" id="cessAmount_' + current_row + '" data-value="" data-valuesingle="" data-order="' + current_row + '"></td>';
			new_row += '<td><input required type="text"  value="0" name="itemtotalamount2[]" readonly class="form-control totalAmount cleardata" id="totalAmount_' + current_row + '" data-value="" data-order="' + current_row + '" readonly></td>';
			new_row += '<td><select name="employee2[]" class="form-control Employee cleardata" id="employee_' + current_row + '" data-order="' + current_row + '"><?php echo $namelist;?></select></td>';
			new_row+='<input type="hidden" data-order="' + current_row + '"  value="0" name="incentive_id2[]" id="incentive_' + current_row + '" value=""/><input type="hidden" data-order="' + current_row + '"  value="0" name="incentive_amount2[]" id="incentiveamt_' + current_row + '" value=""/>'
			
			new_row += '<td>';
			new_row += '<i class="fa fa-cubes checkstock" data-row="' + current_row + '" id="checkstock_' + current_row + '" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
			
			new_row += '<i data-row="' + current_row + '" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
			new_row += '</td></tr>';

      $('#sales_cont').append(new_row);
      //console.log(current_row);
      $('#BtnNewRow').data('order',current_row);

	  recalculate();
      
  });

  $('#address').on('change',function(){
	autosavenew();
  });
  
  $('#deliveryaddress').on('change',function(){
	autosavenew();
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

		
	

		$('#sales_cont').on('click', '.detailEraseRow', function () {
			var rowNumber = $(this).data('row');
			$('#detailRow_' + rowNumber + ' select').prop('selectedIndex', 0);
			$('#detailRow_' + rowNumber + ' input').val('');
			recalculate();
		
		});

		//Dynamic Row Adding Code

		$('#sales_cont').on('keyup', '.gstAmount', function () {
			var gstAmount = 0;
			$('.gstAmount').each(function () {
				if ($(this).val() != '') {
					gstAmount = parseInt(gstAmount) + parseInt($(this).val());
				}
			});

			$('#amountGst').val(gstAmount);
		});

		$('#sales_cont').on('keyup', '.cessAmount', function () {
			var cessAmount = 0;
			$('.cessAmount').each(function () {
				if ($(this).val() != '') {
					cessAmount = parseInt(cessAmount) + parseInt($(this).val());
				}
			});
			$('#cessAmount').val(cessAmount);
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

		$('#sales_cont').on('keyup', '.batchItem', function () {
			var rowOrder = $(this).data('order');
			var itemBatch = $(this).val();
			if (itemBatch != '' && itemBatch != 0) {
				$.ajax({
					type: "POST",
					url: '<?php echo site_url('Admin/searchItemBatchList');?>',
					data: { itemBatch: itemBatch, rowOrder: rowOrder },
					success: function (res) {
						console.log(res);
						if (res) {
							$('#batch_list_' + rowOrder).show();
							$('#batch_list_' + rowOrder).html(res);
						} else {
							$('#batch_list_' + rowOrder).html("");
						}
					},
				});	
      		}
			else{
				$('#batch_list_' + rowOrder).html("");
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
							$('#batchcode_'+id).hide();
							$('#itembatchid_'+id).show();
							
						}
			})
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
					}else{
						$('#itemqty_'+id).css({"border":"1px solid #d2d6de"});
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
				
					}else{
					
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
					calc_outstanding();
					
					
				},
		});

	
 });

 	
 $('#sales_cont').on('change','.itemBatchnew',function(){
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
					}else{
						$('#itemqty_'+id).css({"border":"1px solid #d2d6de"});
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
				
					}else{
					
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
					calc_outstanding();
					autosave(id);
					
				},
		});

	
	}); 

		$('#deliverychare').on('change', function () {
			recalculate();
			autosavenew();
		});

		$('#discount').on('change', function () {
			recalculate();
			autosavenew();
		});
		$('#vehiclenumber').on('change', function () {
			recalculate();
			autosavenew();
		});
		$('#note').on('change', function () {
			recalculate();
			autosavenew();
		});
		$('#bankname').on('change', function () {
			recalculate();
			autosavenew();
		});
		$('#ewaybillnum').on('change', function () {
			recalculate();
			autosavenew();
		});
	

		$('#sales_cont').on('keyup', '.qnty', function () {
			$(this).val($(this).val().replace(/ +?/g, ''));
			var qnty_demo = $(this).val();
			var order = $(this).data('order');
			var mop=$('#mop_'+order).val();
			var inqty=$('#qtyinventory_'+order).val();
		
			var totalTaxableAmount = 0;
		
			var totalgstAmount = 0;
			var deliverycharge = 0;
			var discount = 0;
			var grandTotal=0;
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
				$('#editicon_'+order).show();
			}else if($(this).val() !== null && $(this).val() == ''){
				var qnty=0;
				$('#saveprint').hide();
				$('#saveonly').hide();
				$('#BtnNewRow').hide();
				$('#editicon_'+order).hide();
			}else{
				var qnty=qnty_demo;
				$('#itemqty_'+order).css({"border":"1px solid red"});
				$('#saveprint').hide();
				$('#saveonly').hide();
				$('#BtnNewRow').hide();
				$('#editicon_'+order).hide();
			}
		
				

				var item_hsn_tax = $('#gstper_'+order).val();
				
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
				
				var itemsubtotal = qnty * unitprice ;
				var taxablesubtotal = qnty * taxableAmount;

				$('#taxable_' + order).val((taxablesubtotal).toFixed(2));	
				$('#gstAmount_' + order).val((gstsubtotal).toFixed(2));
			
				if($('#inclusive').is(":checked")){
					var totalgstvalue=parseFloat(itemsubtotal);
				}else{
					
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
				calc_outstanding();
				
			

		});

		$('#sales_cont').on('change','.qntynew',function(){
			var order = $(this).data('order');
			autosave(order);
			});
		
		$ ('input[name=paymod1]'). click (function () {
			calc_outstanding();
			autosavenew();
		});

	
		$('#paidamount, #bankamount').on('change', function () {
			autosavenew();
		});
		
		$('#paidamount, #bankamount').on('keyup', function () {
			calc_outstanding();
			
		});

		$('#deliverydate').on('change', function () {
			autosavenew();
		});
		$('#transmode').on('change',function(){
			autosavenew();
		});
		$('#financenew').on('change',function(){
			autosavenew();
		});
		$('#isigst').on('click',function(){
			autosavenew();
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
			$('.bank1').hide();
			$('.bankamount').hide();
			$('.bank').show();
			$('.financelabel').hide();
			$('.finance').hide();
			$('#bankname').show();
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
			$('#bankname').show();
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
			$('#bankname').show();
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
			$('#bankname').show();
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
		


	
		$('#phon_num').on('keyup',function(){
			var phnum=$('#phon_num').val();
			var phcount =phnum.length;
			if(phcount==10 || phcount==0){
				$('#phon_num').css("border","1px solid #d2d6de");
		$('#phon_num').css("color","black");	
		autosavenew();
			}
			else{
			 $('#phon_num').css("border","2px solid red");
		     $('#phon_num').css("color","red");
			}
			//alert(phcount);
		});

		$(".reset").bind("click", function() {
		$(".cleardata").val("");
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
	



	
	$('#sales_cont').on('keyup', '.unitprice', function () {

		

		$(this).val($(this).val().replace(/ +?/g, ''));
		

		var id = $(this).data('order');
		var order=$(this).data('order');
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
	   $('#editicon_'+id).hide();
			

							
		}else if($(this).val() !== null && $(this).val() == ''){
			$('#saveprint').hide();
	   $('#saveonly').hide();
	   $('#BtnNewRow').hide();
	   $('#editicon_'+id).hide();
	   var unitprice = 0;

		}
		else{ 

			$('#unitprice_'+id).css("border","1px solid #ccc");
			$('#unitprice_'+id).css("color","#555");
			$('#unitprice_'+id).tooltip('hide');
			$('#unitprice_'+id).attr('data-original-title', '');
			var unitprice = unitpricedemo;

$('#saveprint').show();
$('#saveonly').show();
$('#BtnNewRow').show();
$('#editicon_'+id).show();
				
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
			// var cesssubtotal = qnty * cessAmount;
			var itemsubtotal = qnty * unitprice ;
			var taxablesubtotal = qnty * taxableAmount;

			$('#taxable_' + id).val((taxablesubtotal).toFixed(2));	
			$('#gstAmount_' + id).val((gstsubtotal).toFixed(2));
			// $('#cessAmount_' + id).val((cesssubtotal).toFixed(2));
			if($('#inclusive').is(":checked")){
				var totalgstvalue=parseFloat(itemsubtotal);
			}else{
			
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
								//(incentamt1234);
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
			
		

	});

	$('#sales_cont').on('change','.unitpricenew',function(){
	var id = $(this).data('order');
	autosave(id);
	});

	$('#sales_cont').on('change','.mrpnew',function(){
	var id = $(this).data('order');
	autosave(id);
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
					var taxableAmount = (parseInt(unitprice) / (101 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
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


			});

			
			recalculate();
		
	});
	$('#customername').on('keyup',function(){
	  $('#customerid').val(0);
  });
  $('#customername').on('change',function(){
	autosavenew();
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
								//(incentamt1234);
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

		
$('#sales_cont').on('change','.Employeenew',function(){
	var order = $(this).data('order');
	autosave(order);
	});

$(document).ready(function(){
		$('form').attr('autocomplete', 'off');
});


$('#savemasterchange').on('click',function(){
    var id=$('#sale_id').val();
	var billdate=$('#billdate').val();
	var ewaybillnum=$('#ewaybillnum').val();
	var deliverydate=$('#deliverydate').val();
	var customername=$('#customername').val();
	var customerid=$('#customerid').val();
	var phon_num=$('#phon_num').val();
	var address=$('#address').val();
	var deliveryaddress=$('#deliveryaddress').val();
	var transmode=$('#transmode').val();
	var financenew=$('#financenew').val();
	var cusid=$('#customerid').val();
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
	var  bankamount=$('#bankamount').val();
	var  deliverychare=$('#deliverychare').val();
	var  totalTaxableAmount=$('#totalTaxableAmount').val();
	var  amountGst=$('#amountGst').val();
	var  cessAmount=$('#cessAmount').val();
	var  roundOfValuue=$('#roundOfValuue').val();
	var  grandTotal=$('#grandTotal').val();
	var  discount=$('#discount').val();
	var  outstanding_previous=$('#outstanding_previous1').val();



			$.ajax({

				type: "POST",
				url: '<?php echo site_url('AdminController/b2csaleeditnew');?>',
				data: {
					bankamount:bankamount,id: id,billdate:billdate,ewaybillnum:ewaybillnum,deliverydate:deliverydate,customername:customername,
					customerid:customerid,phon_num:phon_num,address:address,deliveryaddress:deliveryaddress,transmode:transmode,
					financenew:financenew,isigst:isigst,note:note,vehiclenumber:vehiclenumber,outstanding:outstanding,
					paymod1:paymod1,paidamount:paidamount,deliverychare:deliverychare,totalTaxableAmount:totalTaxableAmount,
					amountGst:amountGst,cessAmount:cessAmount,roundOfValuue:roundOfValuue,grandTotal:grandTotal,discount:discount,cusid:cusid,outstanding_previous:outstanding_previous
				},

				success: function(res) {
					location.reload();
				},

			});


});
$('#sales_cont').on('click','.editrowb2csale',function(){
 
 var id=$(this).data('row');
 var code=$('#code_'+id).val();
 var itemqty=$('#itemqty_'+id).val();
 var taxable=$('#taxable_'+id).val();
 var hsncode=$('#hsncode_'+id).val();
 var gstper=$('#gstper_'+id).val();
 var gstamount=$('#gstAmount_'+id).val();
 var cess=$('#cessAmount_'+id).val();
 var total=$('#totalAmount_'+id).val();
 var item=$('#puritem_'+id).val();
 var batch=$('#itembatchid_'+id).val();
 var employee=$('#employee_'+id).val();
 var unitprice=$('#unitprice_'+id).val();
 var inceid=$('#incentive_'+id).val();
 var inamount=$('#incentiveamt_'+id).val();
 var mrp=$('#mrp_'+id).val();
 var tid=$('#transid_'+id).val();
 var sid=$('#sale_id').val();
 var oqty=$('#oldqty_'+id).val();
 var pcost=$('#pcost_'+id).val();


 

    var  note=$('#note').val();
	var  vehiclenumber=$('#vehiclenumber').val();
	var  cusid=$('#customerid').val();
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
	var  outstanding_previous=$('#outstanding_previous1').val();
	
if(parseInt(itemqty)<parseInt(1)){
alert("Please Enter qty is is grater than 0");
}else{
	if(parseFloat(unitprice)<parseFloat(pcost) ){
  alert("Please enter unit price is grater than purchase cost ");
 }else if(parseFloat(unitprice) !== null && parseFloat(unitprice) == ''){
	alert("Please enter unit price is grater than purchase cost ");
 }else{
	$.ajax({

type: "POST",
url: '<?php echo site_url('AdminController/b2csaletranseditnew');?>',
data: {
	code:code,itemqty:itemqty,taxable:taxable,hsncode:hsncode,gstper:gstper,gstamount:gstamount,cess:cess,
	total:total,item:item,batch:batch,employee:employee,unitprice:unitprice,inceid:inceid,inamount:inamount,
	mrp:mrp,tid:tid,note:note,vehiclenumber:vehiclenumber,outstanding:outstanding,sid:sid,oqty:oqty,
					paymod1:paymod1,paidamount:paidamount,deliverychare:deliverychare,totalTaxableAmount:totalTaxableAmount,
					amountGst:amountGst,cessAmount:cessAmount,roundOfValuue:roundOfValuue,grandTotal:grandTotal,discount:discount,cusid:cusid,outstanding_previous:outstanding_previous
},

success: function(res) {
	console.log(res);
	if(res==1){
		location.reload();
	}else{
	alert("stock Not available");	
	location.reload();
	}
	//
},

});
 }
}
$('.mrpnew').on('change',function(){
var id=$(this).data('order');
autosave(id);
});

 //alert(tid);



});


	</script>
<script>

function validateForm() {

	

if (confirm("Do you really want to ADDON this sales?")) {

	
var rowCount = $("#sales_cont > tr").length;
var isStockNotAvailable = false;

 var unitprice;
 $("#sales_cont tr").map(function(){
	if(!isStockNotAvailable){
				  if($(this).attr('data-row')!=undefined){
					var i = $(this).attr('data-row'); 

					unitprice=document.getElementById('unitprice_'+i+'').value;
 var minmop=document.getElementById('pcost_'+i+'').value;
 var stock=document.getElementById('qtyinventory_'+i+'').value;
 var qty=document.getElementById('itemqty_'+i+'').value;

 //alert(stock);alert(qty);
 if(parseFloat(qty)>parseFloat(stock)){
	alert("Stock is not available");
	$('#itemqty_'+i).css({"border":"2px solid red"});
	$("#saveonly").html("ADD ON");
	
	$("#saveonly").removeAttr("disabled")
	$("#saveprint").html("SAVE & PRINT");
	$("#saveprint").removeAttr("disabled");
	isStockNotAvailable = true;
	event.preventDefault();
	return false;
	
 }else if(parseFloat(qty) !== null && parseFloat(qty) == ''){
		$('#itemqty_'+i).css({"border":"2px solid red"});
		$("#saveonly").html("ADD ON");
		
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
 if(parseFloat(unitprice)<parseFloat(minmop)){
	 alert("Please enter unit price is grater than purchase cost");
	 $('#unitprice_'+i).css({"border":"2px solid red"});
	 $("#saveonly").html("ADD ON");
	
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