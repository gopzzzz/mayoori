



				

			

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

								 />

						</div>

						<div class="col-sm-1">

							<label class="exampleInputEmail1">EWAY BILL NUMBER</label>

						</div>

						<div class="col-sm-2">

							<input type="text" name="ewaybillno" class="form-control cleardata"  value="<?php echo $b2c->sales_master_eway_billno;?>" />

						</div>



						<div class="col-sm-1">

							<label class="exampleInputEmail1">DELIVERY DATE:</label>

						</div>

						<div class="col-sm-2">

							<input type="date" name="deliverydate" class="form-control cleardata"  value="<?php echo $b2c->sales_master_delivery_date;?>" />

						</div>



					</div>





					<div class="col-sm-12" style="margin-top: 10px;">

						<div class="col-sm-1">

							<label class="exampleInputEmail1">CUSTOMER NAME:</label>

						</div>

						<div class="col-sm-2" id="cust_search">

							<input type="text" name="customername" id="customername" class="form-control cleardata" style="width:150px;"  value="<?php echo $b2c->sales_master_customer_name;?>" required />

							<input type="hidden" name="customerloginid" id="customerid"  value="<?php echo $b2c->sales_master_customer_login_id;?>">

							<i class="fa fa-search custsearchmodal" data-row="1" aria-hidden="true"

											style="font-size:12px;cursor:pointer;padding:5px;margin-left:171px;" ></i>

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

						<select name="financeid" class="form-control " >

						<option value="0">Select</option>

						<?php foreach($finance as $finance){?>

						<option value="<?php echo  $finance->id;?>" <?php if($finance->id==$b2c->sales_master_finance_id){echo 'selected';}?>><?php echo  $finance->finance;?></option>

						<?php } ?>

						</select>

						</div>

						<div class="col-sm-4">

									<label><input type="checkbox" name="isigst" id="isigst" value="1" class="cleardata" <?php if($b2c->sales_master_is_igst==1){echo 'checked';}?>/> IS IGST</label>

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

                                            <input type="hidden" value="<?php echo $single->sales_trans_id;?> " name="transnedid[]" class="form-control cleardata" id="transid_<?php echo $i;?>"

											data-order="<?php echo $i;?>" style="float:left" >

											<input type="hidden" name="puritemid[]" value="<?php echo $single->sales_trans_item_id;?>" class="form-control cleardata" id="puritem_<?php echo $i;?>"

											data-order="<?php echo $i;?>" style="float:left" >

											<input type="hidden"  class="form-control cleardata" id="mop_<?php echo $i;?>"

											data-order="<?php echo $i;?>" style="float:left" >

											<input type="hidden"  class="form-control cleardata" id="qtymop_<?php echo $i;?>"

											data-order="<?php echo $i;?>" style="float:left" >

											<input type="hidden"  class="form-control cleardata" id="qtyinventory_<?php echo $i;?>"

											data-order="<?php echo $i;?>" style="float:left" value="<?php echo $single->inventory_stock_itemcount;?>" >

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

									<!-- <td><input type="text" name="itembatch[]" class="form-control batchItem cleardata"

											id="batch_1" data-order="1" readonly>

										<div id="batch_list_1"  style="position: absolute;z-index: 99;"></div>

									</td> -->

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
											id="mrp_1" data-order="<?php echo $i;?>" data-toggle="tooltip" trigger="manual" value="<?php echo $single->sale_trans_mrp;?>"></td>
								
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

										<i class="fa fa-eraser detailEraseRow" data-row="<?php echo $i;?>" aria-hidden="true"

											style="font-size:15px;margin-top: 10px;cursor:pointer;margin-right: 7px"></i>

										<i class="fa fa-trash detailDeleteRow" data-row="<?php echo $i;?>" aria-hidden="true"

											style="font-size:15px;margin-top: 10px;cursor:pointer"></i>

									</td>

								</tr>

                            <?php $i++; } ?>



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

									<textarea name="note" class="form-control cleardata"><?php echo $b2c->sales_master_note;?></textarea>

								</div>

								<div class="col-sm-2">

									<label class="exampleInputEmail1">VEHICLE NUMBER:</label>

								</div>

								<div class="col-sm-4">

									<input type="text" name="vehicleno" class="form-control cleardata" value="<?php echo $b2c->sales_master_veh_no;?>" />

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

									<input type="text" name="cardnumber" value="<?php echo $b2c->sales_master_cardnum; ?>" class="form-control salecardnumber cleardata"

										style="display: none;" />

									<input type="text" name="chequenum" value="<?php echo $b2c->sales_master_cheque_no; ?>" class="form-control saleschequenumber cleardata"

										style="margin-top:10px;display: none;" />

									<input type="text" name="transcheque" class="form-control salestranscheque cleardata"

										style="margin-top:10px;" value="<?php echo $b2c->sales_master_banktransaction_id; ?>" />

									<input type="text" name="bankamount" id="bankamount" class="form-control bankamount cleardata"

										style="margin-top:10px;display: none;" value="<?php echo $b2c->sales_master_bankamount; ?>" />

									

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

					<div class="col-sm-12" style="margin-top: 20px;">

					

						<div class="col-sm-6">

							<input type="hidden" name="savetype" id="savetype" />

						

							<div class="col-sm-1">

								<button type="submit" id="saveonly" class="btn btn-success btn-sm">SAVE CHANGES</button>

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

							<?php $cust=$this->Admin_model->get_customer();

							foreach($cust as $keycust){

								$outstanding = $this->Admin_model->get_customer_outstanding($keycust->login_id);

								?>

								<tr class="customersearchlist"  data-cusid="<?php echo $keycust->customer_id;?>" data-id="<?=$keycust->cus_name;?>" data-phone_num="<?=$keycust->cus_phonenumber;?>" data-address="<?=$keycust->cus_address;?>"  data-outstanding="<?=$outstanding?>">

									<td><?php echo $keycust->cus_name;?></td>

									<td><?php echo $keycust->cus_code;?></td>

									<td><?php echo $keycust->cus_address;?></td>

									<td><?php echo $keycust->cus_phonenumber;?></td>

									<td><?php echo $keycust->cus_email;?></td>

									

								</tr>

								<?php } ?>

							</tbody>

						</table>

					</div>

					<div class="modal-footer">

					</div>

				</div>

			</div>

		</div>



		<div class="modal fade" id="searchModel" role="dialog">

			<div class="modal-dialog" style="width:100%;">

				<!-- Modal content-->

				<div class="modal-content">

					<div class="modal-header">

						

						<button type="button" class="close" data-dismiss="modal">&times;</button>

						<div class="col-sm-12 text-center" >

						<input type="radio" id="searchtype" value="1" name="searchtype">Item Code

						<input type="radio" id="searchtype" value="2" name="searchtype">Item Name

						<input type="radio" id="searchtype" value="3" name="searchtype">Batch

						

					</div>

						<h4 class="modal-title">Search</h4>

					</div>

				

					<div class="col-sm-12 text-center" style="padding-bottom:15px">

						<label></label>

						<input type="text" id="searchinput" data-row="" style="max-width: 200px;">

					</div>

					<div class="co-sm-12">

						<table style="width:98%;margin: 10px;">

							<thead>

								<tr>

									<th>ItemCode</th>

									<th>Name</th>

									<!-- <th>Batch</th>

									<th>Stock</th>

									<th>MRP</th>

									<th>Srate</th>

									<th>Tax %</th> -->

								</tr>

							</thead>

							<tbody id="searchbox">

							<?php $itemlist=$this->Admin_model->get_item1();

							foreach($itemlist as $keyitem){?>

								<tr data-id="<?php echo $keyitem->itm_id;?>" data-row="1" data-batch="<?php echo $keyitem->itm_id;?>">

									<td><?php echo $keyitem->itm_code;?></td>

									<td><?php echo $keyitem->itm_name;?></td>

									<!-- <td><?php echo $keyitem->batchcode;?></td>

									<td><?php echo $keyitem->opening_stock;?></td>

									<td><?php echo $keyitem->t_mrp;?></td>

									<td><?php echo $keyitem->t_sr;?></td>

									<td><?php echo $keyitem->hsn_tax;?></td> -->

								</tr>

								<?php } ?>

							</tbody>

						</table>

					</div>

					<div class="modal-footer">

					</div>

				</div>

			</div>

		</div>





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





	<script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/dbjs/jquery.min.js"></script>

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

			grandTotal = totalTaxableAmount + totalcessAmount + totalgstAmount + totalcessAmount;

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

// 		var totalgrand=0;

// $('.totalAmount').each(function( index ) {
// if($(this).val() !=''){
// totalgrand=parseFloat(totalgrand)+parseFloat($(this).val());
// }
// });
// $('#grandTotal').val(Math.round(totalgrand));
			calc_outstanding();

			// var paidamount = $('#paidamount').val();

			// var bankamount = $('#bankamount').val();

			// if (bankamount == '') {

			// 	bankamount = 0;

			// }

			// if (paidamount == '') {

			// 	paidamount = 0;

			// }

			// var outstanding_previous = parseInt($('#outstanding_previous').val());

			// $('#outstanding').val(outstanding_previous + parseInt(grandTotal) + parseInt(deliverycharge) - parseInt(discount) - parseInt(paidamount) - parseInt(bankamount));

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

		//Dynamic Row Adding Code



		$('#BtnNewRow').on('click', function () {

			var rowStart = 1;

           

			$('.slno').each(function () {

				$(this).html(rowStart);

				rowStart = rowStart + 1;

			});console.log(rowStart);

			$newrow=$('#BtnNewRow').data('order')+1;

            //alert($('#BtnNewRow').data('order'));

            //$newrow=parseInt($('#mycount').val())+parseInt(1);

			$('#BtnNewRow').data('order', $newrow);

			var current_row = $newrow;

			var new_row = '<tr id="detailRow_' + rowStart + '"> <th scope="row" class="slno">' + rowStart + '</th>';

			new_row += '<td><input required type="hidden"  class="form-control  puritem" id="puritem_' + rowStart + '" name="puritemid[]" data-order="' + rowStart + '" style="float:left"><input required type="hidden"  class="form-control  " id="mop_' + rowStart + '"  data-order="' + rowStart + '" style="float:left"> <input type="hidden" value="1" name="transnewid[]" class="form-control cleardata" id="transid_'+rowStart+'" data-order="'+rowStart+'" style="float:left" ><input required type="hidden"  class="form-control  " id="qtyinventory_' + rowStart + '"  data-order="' + rowStart + '" style="float:left"><input required type="hidden"  class="form-control  " id="qtymop_' + rowStart + '"  data-order="' + rowStart + '" style="float:left"><input required type="hidden"  class="form-control  codeItem" id="percost_' + rowStart + '" data-order="' + rowStart + '" style="float:left"><input required type="text" name="itemcode[]" class="form-control  codeItem" id="code_' + rowStart + '" data-order="' + rowStart + '" style="float:left"><i class="fa fa-search searchitemmodel" data-row="' + rowStart + '" aria-hidden="true" style="font-size:12px;cursor:pointer;padding:5px" ></i><div id="code_list_' + rowStart + '"></div></td>';

			new_row += '<td><input required type="text" name="itemname[]" class="form-control nameItem cleardata" id="itemname_' + rowStart + '" data-order="' + rowStart + '" ><div id="name_list_' + rowStart + '"></div></td>';

			new_row += '<td><select name="itembatchid[]" class="form-control itemBatch" id="itembatchid_'+rowStart+'" data-order="'+rowStart+'" placeholder="Batch"><option value="">Select Batch</option></select></td>';

			

			new_row += '<td><input required type="text" name="itemqnty[]" class="form-control qnty cleardata " id="itemqty_' + rowStart + '" data-order="' + rowStart + '" ></td>';

			new_row += '<td><input required type="text" name="unitprice[]" class="form-control unitprice cleardata " data-toggle="tooltip" trigger="manual" id="unitprice_' + rowStart + '" data-order="' + rowStart + '" ></td>';

			new_row += '<td><input required type="text"  value="0" name="mrp[]" class="form-control mrp cleardata " data-toggle="tooltip" trigger="manual" id="mrp_' + rowStart + '" data-order="' + rowStart + '" ></td>';
			
			new_row += '<td><input required type="text" name="itemtaxable[]" readonly class="form-control taxableAmount cleardata" id="taxable_' + rowStart + '" data-value="" data-order="' + rowStart + '"></td>';

			new_row += '<td><input required type="text" name="itemgstper[]" readonly class="form-control cleardata" id="gstper_' + rowStart + '" data-order="' + rowStart + '"><input type="hidden" name="itemhsncode[]" class="form-control itemhsncode" id="hsncode_' + rowStart + '" data-value="" data-order="' + rowStart + '" required><input type="hidden" name="itemitemtbid1[]" class="form-control itemitemtbid" id="itemtbid_'+rowStart+'" data-value="" data-order="'+rowStart+'" ></td>';

			new_row += '<td><input required type="text" name="itemgstamount[]" readonly class="form-control gstAmount cleardata" id="gstAmount_' + rowStart + '" data-value="" data-valuesingle="" data-order="' + rowStart + '"></td>';

			new_row += '<td><input required type="text" name="itemcessamount[]" readonly class="form-control cessAmount cleardata" id="cessAmount_' + rowStart + '" data-value="" data-valuesingle="" data-order="' + rowStart + '"></td>';

			new_row += '<td><input required type="text" name="itemtotalamount[]" readonly class="form-control totalAmount cleardata" id="totalAmount_' + rowStart + '" data-value="" data-order="' + rowStart + '" readonly></td>';

			new_row += '<td><select name="employee[]" class="form-control Employee cleardata" id="employee_' + rowStart + '" data-order="' + rowStart + '"><?php echo $namelist;?></select></td>';

			new_row+='<input type="hidden" data-order="' + rowStart + '" name="incentive_id[]" id="incentive_' + rowStart + '" value=""/><input type="hidden" data-order="' + rowStart + '" name="incentive_amount[]" id="incentiveamt_' + rowStart + '" value=""/>'

			new_row += '<td>';

			new_row += '<i data-row="' + rowStart + '" class="fa fa-eraser detailEraseRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer;margin-right: 7px"></i>';

			new_row += '<i data-row="' + rowStart + '" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';

			new_row += '</td></tr>';



			$('#sales_cont').append(new_row);

			console.log(rowStart);

			$('#BtnNewRow').data('order', $newrow); 



		})



		$('#sales_cont').on('click', '.detailDeleteRow', function () {

			var rowNumber = $(this).data('row');

            var transid=$('#transid_'+rowNumber).val();

            // $.ajax({

			// 		type: "POST",

			// 		url: '<?php echo site_url('Admin/deleteb2csaletrans');?>',

			// 		data: { transid: transid},

			// 		success: function (res) {

			// 			console.log(res);

						

			// 		},

			// 	});

            //alert(transid);

			$('#detailRow_' + rowNumber).remove();

			var rowStart = 1;



			$('.slno').each(function () {

				$(this).html(rowStart); 

				rowStart = rowStart + 1;

			});



            

// 			$('#BtnNewRow').data('order', rowStart);

// 			$('.gstAmount').keyup();

// 			$('.cessAmount').keyup();

// 			$('.totalAmount').keyup();

			recalculate();

		})



		$('#sales_cont').on('click', '.detailEraseRow', function () {

			var rowNumber = $(this).data('row');

			$('#detailRow_' + rowNumber + ' select').prop('selectedIndex', 0);

			$('#detailRow_' + rowNumber + ' input').val('');

			recalculate();

			//   $('.gstAmount').keyup();

			//   $('.cessAmount').keyup();

			//   $('.totalAmount').keyup();

		})



		//Dynamic Row Adding Code



		$('#sales_cont').on('keyup', '.gstAmount', function () {

			var gstAmount = 0;

			$('.gstAmount').each(function () {

				if ($(this).val() != '') {

					gstAmount = parseInt(gstAmount) + parseInt($(this).val());

				}

			});



			$('#amountGst').val(gstAmount);

		})



		$('#sales_cont').on('keyup', '.cessAmount', function () {

			var cessAmount = 0;

			$('.cessAmount').each(function () {

				if ($(this).val() != '') {

					cessAmount = parseInt(cessAmount) + parseInt($(this).val());

				}

			});

			$('#cessAmount').val(cessAmount);

		})



		// $('#sales_cont').on('keyup', '.totalAmount', function () {

		// 	var totalAmount = 0;

		// 	$('.totalAmount').each(function () {

		// 		if ($(this).val() != '') {

		// 			totalAmount = parseInt(totalAmount) + parseInt($(this).val());

		// 		}

		// 	});

		// 	$('#totalAmount').val(totalAmount);

		// })



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

  })



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

  })



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

  		})



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





		//$('#sales_cont').on('click', '.subSelect_itemedit', function () {

		$('#sales_cont').on('change','.itemBatch',function(){  

			var id = $(this).data('order');

			//var itemValue = $(this).data('value');

			var itemValue = $(this).val();

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

						if(obj.t_sr==0.00 && obj.d_sr==0.00){

							var taxableAmount = (parseInt(obj.e_sr) / (101 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);

						}else if(obj.t_sr==0.00 && obj.e_sr==0.00){

							var taxableAmount = (parseInt(obj.d_sr) / (101 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);

						

						}else{

							var taxableAmount = (parseInt(obj.t_sr) / (101 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);

						}

						

					}

					else {

						if(obj.t_sr==0.00 && obj.d_sr==0.00){

							var taxableAmount = (parseInt(obj.e_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);

						}else if(obj.t_sr==0.00 && obj.e_sr==0.00){

							var taxableAmount = (parseInt(obj.d_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);

						

						}else{

							var taxableAmount = (parseInt(obj.t_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);

						

						}

						

					}

					var gstAmount = ((taxableAmount * parseInt(obj.hsn_tax)) / 100).toFixed(2);

					//if igst is checked no cess amount 

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

					var totalgstvalue=parseFloat(obj.e_sr)+parseFloat(cessAmount);

					$('#totalAmount_' + id).val(totalgstvalue);

					$('#totalAmount_' + id).attr('data-value', totalgstvalue);

					$('#mrp_'+id).val(obj.e_mrp);

					}else{

						$('#pcost_' + id).val(obj.t_pc);

					$('#percost_' + id).val(obj.t_pc);

					$('#mop_'+id).val(obj.t_mop);

					$('#unitprice_'+id).val(obj.t_sr);

					var totalgstvalue=parseFloat(obj.t_sr)+parseFloat(cessAmount);

					$('#totalAmount_' + id).val(totalgstvalue);

					$('#totalAmount_' + id).attr('data-value', totalgstvalue);

					$('#mrp_'+id).val(obj.t_mrp);

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

					$('#cessAmount_' + id).val(cessAmount);

					$('#cessAmount_' + id).attr('data-value', cessAmount);

					$('#cessAmount_' + id).attr('data-valuesingle', cessAmount);

					$('#itemqty_' + id).val(1);

					$('#gstper_' + id).val(obj.hsn_tax);

					

					$('#totalTaxableAmount').val(taxableAmount);

					$('.taxableAmount').each(function (index) {

						console.log($(this).val());

						totalTaxableAmount = totalTaxableAmount + parseFloat($(this).val());

					});

					$('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));

					$('.cessAmount').each(function (index) {

						console.log($(this).val());

						totalcessAmount = totalcessAmount + parseFloat($(this).val());

					});

					$('#cessAmount').val(totalcessAmount.toFixed(2));

					$('.gstAmount').each(function (index) {

						console.log($(this).val());

						totalgstAmount = totalgstAmount + parseFloat($(this).val());

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

					//$('#grandTotal').val(Math.round(grandTotal + parseInt(deliverycharge) - parseInt(discount)));
var totalgrand=0;

					$('.totalAmount').each(function( index ) {
         if($(this).val() !=''){
            totalgrand=parseFloat(totalgrand)+parseFloat($(this).val());
         }
     });
					$('#grandTotal').val(Math.round(totalgrand));
					calc_outstanding();

					// var paidamount = $('#paidamount').val();

					// var bankamount = $('#bankamount').val();

					// if (bankamount == '') {

					// 	bankamount = 0;

					// }

					// if (paidamount == '') {

					// 	paidamount = 0;

					// }

					// var outstanding_previous = parseInt($('#outstanding_previous').val()); 

					// $('#outstanding').val(parseInt(outstanding_previous + grandTotal) + parseInt(deliverycharge) - parseInt(discount) - parseInt(paidamount) - parseInt(bankamount));

				},

		});



	

 })



		$('#deliverychare').on('keyup', function () {

			recalculate();

		});



		$('#discount').on('keyup', function () {

			recalculate();

		});



		$('#sales_cont').on('keyup', '.qnty', function () {

			var qnty = $(this).val();

			var order = $(this).data('order');

			var mop=$('#mop_'+order).val();

			var inqty=$('#qtyinventory_'+order).val();

			//alert(inqty);



			//	alert(mop);

			var totalTaxableAmount = 0;

			var totalcessAmount = 0;

			var totalgstAmount = 0;

			var deliverycharge = 0;

			var discount = 0;

			if(parseInt(inqty)>=parseInt(qnty)){

				$('#itemqty_'+order).css({"border":"1px solid #d2d6de"});

			}else if(parseInt(inqty)<parseInt(qnty)){

				$('#itemqty_'+order).css({"border":"1px solid red"});

			

			}

			

				



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

				var totalgstvalue=parseFloat(cesssubtotal)+parseFloat(itemsubtotal);

				$('#totalAmount_' + order).val((totalgstvalue).toFixed(2));	





				$('#qtymop_'+order).val(qnty*mop);

				$('.taxableAmount').each(function (index) {

					totalTaxableAmount = totalTaxableAmount + parseFloat($(this).val());

				});

				$('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));

				$('.cessAmount').each(function (index) {

					totalcessAmount = totalcessAmount + parseFloat($(this).val());

				});

				$('#cessAmount').val(totalcessAmount.toFixed(2));

				$('.gstAmount').each(function (index) {

					console.log($(this).val());

					totalgstAmount = totalgstAmount + parseFloat($(this).val());

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

				//$('#grandTotal').val(Math.round(grandTotal + parseInt(deliverycharge) - parseInt(discount)));


				var totalgrand=0;

$('.totalAmount').each(function( index ) {
if($(this).val() !=''){
totalgrand=parseFloat(totalgrand)+parseFloat($(this).val());
}
});
$('#grandTotal').val(Math.round(totalgrand));
				calc_outstanding();

				// var paidamount = $('#paidamount').val();

				// var bankamount = $('#bankamount').val();

				// if (bankamount == '') {

				// 	bankamount = 0;

				// }

				// if (paidamount == '') {

				// 	paidamount = 0;

				// }

				// var outstanding_previous = parseInt($('#outstanding_previous').val());

				// $('#outstanding').val(outstanding_previous + parseInt(grandTotal) + parseInt(deliverycharge) - parseInt(discount) - parseInt(paidamount) - parseInt(bankamount));

			

			



		});



		

		

		$ ('input[name=paymod1]'). click (function () {

			calc_outstanding();

		});



		$('#paidamount, #bankamount').on('keyup', function () {

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

			// $('.financelabel').show();

			// $('.finance').show();

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

				

			$('#custsearch_modal').modal('show');

		

		});

		

		$('#searchinput').on('keyup',function(){

			var type1=$('#searchtype:checked').val();

			

		    var val=$(this).val();

		    var rowno=$('#searchinput').data('row');console.log('row--'+rowno);

		    	$.ajax({

				type: "POST",

				url: '<?php echo site_url('Admin/searchitemmodal');?>',

				data: { itemValue: val,row:rowno ,type1:type1},

				success: function (res) {

				    $('#searchbox').html(res);

				}

		    });

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

		$('#searchbox').on('click','tr td',function(){



		    var itemValue 	= $(this).parent().data('id');

			var itemBatchid = $(this).parent().data('batch');

			//var itemBatchid = itemBatchid.trim();

		    var id = $('#searchinput').attr('data-row');

			//alert(id);

			// var totalTaxableAmount = 0;

			// var totalcessAmount = 0;

			// var totalgstAmount = 0;

			// var grandTotal = 0;

			// var deliverycharge = 0;

			// var discount = 0;

			$.ajax({

				type: "POST",

				dataType: "json",

				url: '<?php echo site_url('Admin/getItemBatchDetailseach');?>',

				

				data: { itemValue: itemValue },

				success: function (res) {

					console.log(res);

				

					

				

					 $('#itembatchid_'+id).empty();

					

					$('#itembatchid_'+id).append('<option value="0">select</option>');

						$.each(res,function(index,data){

            		 $('#itembatchid_'+id).append('<option value="'+data['batch_id']+'">'+data['batchcode']+'</option>');

          			});



				},

			});



			$.ajax({

				type: "POST",

				url: '<?php echo site_url('Admin/getItemlist');?>',

				

				data: { itemValue: itemValue },

				success: function (res) {

					$('#searchModel button.close').click();

				    $('#searchinput').attr('data-row','');

				    //$('#searchbox').html('');

					console.log(res); 

					

					 var obj = JSON.parse(res);

					

					$('#code_' + id).val(obj.itm_code);

					$('#itemname_' + id).val(obj.itm_name );

					

				},

		});	

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

		$("html").on('click','.customersearchlist',function(){

				//$('#custsearch_modal button.close').click();

			 	$('#customername').val($(this).data('id'));

			  	$('#phon_num').val($(this).data('phone_num'));

				  $('#customerid').val($(this).data('cusid'));

				$('#address').val($(this).data('address'));

				$('#outstanding_previous').val($(this).data('outstanding'));

				$('#outstanding').val($(this).data('outstanding'));

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

	



	//Edit

	$('.editsales').on('click', function() {



		var id = $(this).data('id');

		$('.salesedit_content').empty();



		if (id) {



			$.ajax({



				type: "POST",

				url: '<?php echo site_url('Admin/getsalesb2c_details');?>',

				data: {

					id: id

				},



				success: function(res) {

					//console.log(res);

					$('.salesedit_content').append(res);

				},



			});



		}



		$('#editModal').modal({

			backdrop: 'static',

			keyboard: false

		});



	});



	

	$('#sales_cont').on('keyup', '.unitprice', function () {
		//Compare with item_mop <

		var id = $(this).data('order');
		var unitprice = $(this).val();
				
		
		var qnty = $('#itemqty_'+id).val();
		var mop = $('#qtymop_'+id).val() / (qnty || 1);
		var minmop=$('#pcost_'+id).val();
		
		if(parseInt(unitprice)<parseInt(minmop)){

			//alert("Total amount is greater than Item MOP : '"+mop+"'");
			$('#unitprice_'+id).css("border","2px solid red");
			$('#unitprice_'+id).css("color","red");
			
			$('#unitprice_'+id).attr('title', "Total amount is less than Item Purchase Cost : '"+mop+"'")
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

			$('#taxable_' + id).val((taxablesubtotal).toFixed(2));	
			$('#gstAmount_' + id).val((gstsubtotal).toFixed(2));
			$('#cessAmount_' + id).val((cesssubtotal).toFixed(2));
			var totalgstvalue=parseFloat(itemsubtotal)+parseFloat(cesssubtotal);
			$('#totalAmount_' + id).val((totalgstvalue).toFixed(2));	
			
			recalculate();
			
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

					if(obj.incentive_type==1)

					{

						$('#incentive_'+order).val(obj.id);

						$('#incentiveamt_'+order).val(obj.in_peramount);

						console.log(obj.in_peramount);

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

	</script>
	<script>
 function validateForm() {

var rowCount = $("#sales_cont > tr").length;



 $("#sales_cont tr").map(function(){
				 
				  if($(this).attr('data-row')!=undefined){
					var i = $(this).attr('data-row'); 


 var stock=document.getElementById('qtyinventory_'+i+'').value;
 var qty=document.getElementById('itemqty_'+i+'').value;

 if(parseInt(qty)>parseInt(stock)){
	alert("Stock is not available");
	$("#saveonly").html("SAVE NEW");
	
	$("#saveonly").removeAttr("disabled")
	$("#saveprint").html("SAVE & PRINT");
	$("#saveprint").removeAttr("disabled");
	event.preventDefault();
		return false;

 }else{
	// alert("available");
	$("#saveonly").html("Please Wait...");
	$("#saveonly").attr('disabled', 'disabled');
	$("#saveprint").html("Please Wait...");
	$("#saveprint").attr('disabled', 'disabled');
	
 }



				  }
			 });

}

</script>





