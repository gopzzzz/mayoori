<?php echo form_open_multipart('Admin/salesedit',array('name' => 'editform','id' => 'editform'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Sales Billing Window </h4>
</div>
<input type="hidden" name="master_id" value="<?=$sales->sales_master_id?>" />
<div class="col-sm-12" style="margin-top: 10px;">
    <div class="col-sm-1"> 
        <label class="exampleInputEmail1">BILL NO :</label>
    </div>
    <div class="col-sm-2">
        <input type="text" name="billno" class="form-control"
            value="<?=$sales->sales_master_bill_no?>" />
    </div>
    <div class="col-sm-1">
        <label class="exampleInputEmail1">BILL DATE:</label>
    </div>
    <div class="col-sm-2">
        <input type="text" name="billdate" class="form-control" value="<?php if($sales->sales_master_date == '0000-00-00')  echo date("d-m-yy"); else echo date("d-m-yy", strtotime($sales->sales_master_date));?>" />
    </div>
    <div class="col-sm-1">
        <label class="exampleInputEmail1">EWAY BILL NUMBER</label>
    </div>
    <div class="col-sm-2">
        <input type="text" name="ewaybillno" class="form-control cleardata" value="<?=$sales->sales_master_eway_billno?>"/>
    </div>

    <div class="col-sm-1">
        <label class="exampleInputEmail1">DELIVERY DATE:</label>
    </div>
    <div class="col-sm-2">
        <input type="date" name="deliverydate" class="form-control cleardata" value="<?php echo date("d-m-yy", strtotime($sales->sales_master_delivery_date));?>"/>
    </div>

</div>


<div class="col-sm-12" style="margin-top: 10px;">
    <div class="col-sm-1">
        <label class="exampleInputEmail1">CUSTOMER NAME:</label>
    </div>
    <div class="col-sm-2" id="cust_search">
        <input type="text" name="customername" id="customername" class="form-control cleardata" style="width:150px;"
            required value="<?=$sales->sales_master_customer_name?>"/>
        <i class="fa fa-search custsearchmodal" data-row="1" aria-hidden="true"
            style="font-size:12px;cursor:pointer;padding:5px;margin-left:161px;"></i>
        <div class="customer_list"></div>

    </div>
    <div class="col-sm-1">
        <label class="exampleInputEmail1">PHONE NUMBER:</label>
    </div>
    <div class="col-sm-2">
        <input type="text" name="phonenumber" class="form-control cleardata" id="phon_num"  value="<?=$sales->sales_master_phone_no?>"/>
    </div>

    <div class="col-sm-1">
        <label class="exampleInputEmail1">ADDRESS:</label>
    </div>
    <div class="col-sm-2">
        <textarea name="address" class="form-control cleardata" id="address"><?=$sales->sales_master_customer_address?></textarea>
    </div>


    <div class="col-sm-1">
        <label class="exampleInputEmail1"> DELIVERY ADDRESS:</label>
    </div>
    <div class="col-sm-2">
        <textarea name="deliveryaddress" class="form-control cleardata"><?=$sales->sales_master_delivery_address?></textarea>
    </div>


</div>

<div class="col-sm-12"> 
    <div class="col-sm-1">
        <label class="exampleInputEmail1">TRANSACTION MODE:</label>
    </div>
    <div class="col-sm-2">
        <select name="transmode" class="form-control " id="transmode">
            <option value="0">Select</option>
            <option value="1" <?php if($sales->sales_master_trans_mode==1 || $sales->sales_master_trans_mode == 0){ echo "selected";}?>>Cash</option>
            <option value="2" <?php if($sales->sales_master_trans_mode==2){ echo "selected";}?>>Credit</option>
            <option value="3" <?php if($sales->sales_master_trans_mode==3){ echo "selected";}?>>Finace</option>
        </select>
    </div>
    <div class="col-sm-1" id="financelabel" style="display:none;">
        <label class="exampleInputEmail1">FINANCE:</label>
    </div>
    <div class="col-sm-2" id="financeinput" style="display:none;">
        <select name="financeid" class="form-control ">
            <option value="0">Select</option>
            <?php foreach($finance as $finance){?>
            <option value="<?php echo  $finance->id;?>"  <?php if($sales->sales_master_finance_id==$finance->id){ echo "selected";}?>><?php echo  $finance->finance;?></option>
            <?php } ?>
        </select>
    </div>

	<div class="col-sm-4">
        <label><input type="checkbox" name="isigst" id="isigstedit"  value="1" class="cleardata" <?php if($sales->sales_master_is_igst == 1) echo "checked";?>/>IS IGST</label>
    </div>
</div>
<div class="col-sm-12" style="margin-top: 20px;"> 

    <table class="table" id="edittable">  
        <thead>
            <tr> 
                <th scope="col">Sl no</th>
                <th scope="col">Code</th>
                <th scope="col">Item Name</th>
                <th scope="col">Batch</th>
                <th scope="col">Qty</th>
                <th scope="col">Unit price</th>
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
            $count=1;
            foreach($salestrans as $transitem){?>
            <tr id="detailRow_<?=$count?>"  data-row='<?=$count?>' data-order="<?=$count?>">
                <th scope="row" class="slno"><?=$count?></th>
                <td>
                    <input type="hidden" name="purcost[]" class="form-control cleardata" id="pcost_<?=$count?>" data-order="<?=$count?>"
                        style="float:left"  value="<?=$transitem->itm_pcost?>">

                    <input type="hidden" name="puritemid[]" class="form-control cleardata" id="puritem_<?=$count?>" data-order="<?=$count?>"
                        style="float:left" value="<?=$transitem->sales_trans_item_id?>">
                    <input type="hidden" class="form-control cleardata" id="mop_<?=$count?>" data-order="<?=$count?>"
                     style="float:left" value="<?=$transitem->item_mop?>">
                    <input type="hidden" class="form-control cleardata" id="qtymop_<?=$count?>" data-order="<?=$count?>" 
                    style="float:left" value="<?=$transitem->item_mop*$transitem->sales_trans_qty?>">
					<input type="hidden"  class="form-control cleardata" id="qtyinventory_1"
											data-order="1" style="float:left" value="<?=$transitem->inventory_stock_itemcount?>" >
					
				    <input type="text" name="itemcode[]" class="form-control codeItem cleardata" id="code_<?=$count?>"
                        data-order="<?=$count?>" style="float:left" value="<?=$transitem->sales_trans_itm_code?>">

                    <i class="fa fa-search searchitemmodel" data-row="<?=$count?>" aria-hidden="true"
                        style="font-size:12px;cursor:pointer;padding:5px"></i>
                    <div id="code_list_<?=$count?>" style="position: absolute;z-index: 99;"></div>
                </td>
                <td><input type="text" name="itemname[]" class="form-control nameItem cleardata" id="itemname_<?=$count?>"
                        data-order="<?=$count?>" value="<?=$transitem->itm_name?>">
                    <div id="name_list_<?=$count?>" style="position: absolute;z-index: 99;"></div>
                </td>
                <td>
                    <?php
                    $batchList = $this->Admin_model->get_batchoption($transitem->sales_trans_item_id);
                    ?>
						<select name="itembatchid[]" class="form-control itemBatch_edit" id="itembatchid_edit_<?=$count?>" placeholder="Batch" data-order="<?=$count?>" >
							<option value="">Select Batch</option>
                            <?php
                            $selected="";
                            foreach($batchList as $batch){
                                $selected = $batch->batch_id == $transitem->sales_trans_item_batch_id ? "selected":'';
                                echo "<option value='".$batch->batch_id."' ".$selected.">".$batch->batchcode."</option>";
                            }
                            ?>
						</select>
				</td>
                <td><input type="text" name="itemqnty[]" class="form-control qnty cleardata" id="itemqty_<?=$count?>"
                        data-order="<?=$count?>" value="<?=$transitem->sales_trans_qty?>">
					<input type="hidden" name="itemqntyold[]" id="itemqntyold_<?=$count?>"
                        data-order="<?=$count?>" value="<?=$transitem->sales_trans_qty?>">	 
				</td>
                <td><input type="text" name="unitprice[]" class="form-control unitprice cleardata" id="unitprice_<?=$count?>"
                        data-order="<?=$count?>" value="<?=$transitem->t_sr?>" data-toggle="tooltip" trigger="manual" ></td>
                <td><input type="text" name="itemtaxable[]" class="form-control taxableAmount cleardata" id="taxable_<?=$count?>"
                        data-value="<?=$transitem->sales_trans_taxable_value?>" data-order="<?=$count?>" value="<?=$transitem->sales_trans_taxable_value?>">
                </td>
                <td><input type="text" name="itemgstper[]" class="form-control cleardata" id="gstper_<?=$count?>" 
                data-order="<?=$count?>" value="<?=$transitem->hsn_tax?>"> 
                </td>
                <td><input type="text" name="itemgstamount[] " class="form-control gstAmount cleardata" id="gstAmount_<?=$count?>"
                        data-value="<?=$transitem->sales_trans_gst_amount?>" data-order="<?=$count?>" value="<?=$transitem->sales_trans_gst_amount?>">
                    <input type="hidden" name="itemitemtbid[] " class="form-control itemitemtbid cleardata"
                        id="itemtbid_<?=$count?>" data-value="<?=$transitem->sales_trans_item_id?>" data-order="<?=$count?>" value="<?=$transitem->sales_trans_item_id?>">
                    <input type="hidden" name="itemhsncode[]" class="form-control itemhsncode cleardata" id="hsncode_<?=$count?>"
                        data-value="<?=$transitem->sales_trans_hsn_code?>" data-order="<?=$count?>" value="<?php echo $transitem->sales_trans_hsn_code?>">
                </td>
                <td><input type="text" name="itemcessamount[]" class="form-control cessAmount cleardata"
                        id="cessAmount_<?=$count?>" data-value="<?=$transitem->sales_trans_cess?>" data-order="<?=$count?>" value="<?=$transitem->sales_trans_cess?>">
                </td>
                <td><input type="text" name="itemtotalamount[]" class="form-control totalAmount cleardata"
                        id="totalAmount_<?=$count?>" data-value="<?=$transitem->sales_trans_total?>" data-order="<?=$count?>" value="<?=$transitem->sales_trans_total?>" readonly></td>
                <td><select name="employee[]" class="form-control cleardata">
                      <?php echo $namelist;?>
                    </select></td>
                <td>
                    <i class="fa fa-eraser detailEraseRow" data-row="<?=$count?>" aria-hidden="true"
                        style="font-size:15px;margin-top: 10px;cursor:pointer;margin-right: 7px"></i>
                    <i class="fa fa-trash detailDeleteRow" data-row="<?=$count?>" aria-hidden="true"
                        style="font-size:15px;margin-top: 10px;cursor:pointer"></i>
                </td>
            </tr>
            <?php 
            $count++;
            }?>
        </tbody>
    </table>
</div>
<div class="col-sm-12" style="text-align: center;margin-top: -25px;">
    <button type="button" id="BtnNewRow" data-order="<?php echo count($salestrans);?>" class="btn btn-info btn-sm">ADD</button>
</div>
<div class="col-sm-12">
    <div class="col-sm-6">
        <div class="col-sm-12">
            <div class="col-sm-2">
                <label class="exampleInputEmail1">NOTE</label>
            </div>
            <div class="col-sm-4">
                <textarea name="note" class="form-control cleardata"><?=$sales->sales_master_note?></textarea>
            </div>
            <div class="col-sm-2">
                <label class="exampleInputEmail1">VEHICLE NUMBER:</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="vehicleno" class="form-control cleardata" value="<?=$sales->sales_master_veh_no?>"/>
            </div>
        </div>
        <div class="col-sm-12" style="margin-top: 20px;">

            <div class="col-sm-2">
                <label class="exampleInputEmail1">OUT STANDING</label>
            </div>
            <div class="col-sm-4">
			    <input type="hidden" name="outstanding_previous" id="outstanding_previous" value="0">
                <input type="text" name="outstanding" id="outstanding" class="form-control cleardata"  value="<?=$sales->sales_master_outstanding?>"/>
            </div>
            <div class="col-sm-2">

            </div>
            
        </div>

        <div class="col-sm-12">
            <div class="col-sm-2">
                <label class="exampleInputEmail1">PAYMENT MODE</label>
            </div>
            <div class="col-sm-10">
                <input type="radio" class="custom-control-input banktrancheck" id="defaultChecked" name="paymod1"
                    value="1" <?php if($sales->sales_master_payment_mode == 1) echo "checked";?>>
                <label class="custom-control-label" for="defaultChecked">BANK TRANSFER</label>
                <input type="radio" class="custom-control-input chquecheck cleardata" id="defaultChecked" name="paymod1"
                    value="2" <?php if($sales->sales_master_payment_mode == 2) echo "checked";?>>
                <label class="custom-control-label" for="defaultChecked">CHEQUE</label>
                <input type="radio" class="custom-control-input emicheck cleardata" id="defaultChecked " name="paymod1"
                    value="3" <?php if($sales->sales_master_payment_mode == 3) echo "checked";?>>
                <label class="custom-control-label" for="defaultChecked">EMI</label>
                <input type="radio" class="custom-control-input bothcheck cleardata" id="defaultChecked " name="paymod1"
                    value="4" <?php if($sales->sales_master_payment_mode == 4) echo "checked";?>>
                <label class="custom-control-label" for="defaultChecked">BOTH</label>
                <input type="radio" class="custom-control-input bankcheck cleardata" id="defaultChecked " name="paymod1"
                    value="5" <?php if($sales->sales_master_payment_mode == 5) echo "checked";?>>
                <label class="custom-control-label" for="defaultChecked">BANK</label>
                <input type="radio" class="custom-control-input cashcheck cleardata" id="defaultChecked" name="paymod1"
                    value="6" <?php if($sales->sales_master_payment_mode == 6) echo "checked";?>>
                <label class="custom-control-label" for="defaultChecked cleardata">CASH</label>

            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-2 ">
                <label class="exampleInputEmail1 cardnumber " style="display: none;">CARD
                    NUMBER</label>
                <label class="exampleInputEmail1 salescheque " style="display: none;margin-top:10px;">CHEQUE
                    NUMBER</label>
                <label class="exampleInputEmail1 transcheq " style="display: none;margin-top:10px;">TRANSACTION
                    ID</label>
                <label class="exampleInputEmail1 bankamount1 " style="display: none;margin-top:10px;">BANK
                    AMOUNT</label><br>
                <label class="exampleInputEmail1 bank1" style="display: none;margin-top:10px;">BANK</label><br>
                <label class="exampleInputEmail1 financelabel " style="display: none;margin-top:10px;">FINANCE</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="cardnumber" class="form-control salecardnumber cleardata"
                    style="display: none;"  value="<?=$sales->sales_master_cardnum?>"/>
                <input type="text" name="chequenum" class="form-control saleschequenumber cleardata"
                    style="margin-top:10px;display: none;"  value="<?=$sales->sales_master_cheque_no?>"/>
                <input type="text" name="transcheque" class="form-control salestranscheque cleardata"
                    style="margin-top:10px;display: none;"  value="<?=$sales->sales_master_banktransaction_id?>"/>
                <input type="text" name="bankamount" id="bankamount" class="form-control bankamount cleardata"
                    style="margin-top:10px;display: none;"  value="<?=$sales->sales_master_bankamount?>"/>

                <select name="bank" class="form-control bank cleardata" style="margin-top:10px;display: none;">
                    <option value="0"></option>
                    <?php foreach($bank as $key1){
											?>
                    <option value="<?php echo $key1->bank_id;?>" <?php if($key1->bank_id ==$sales->sales_master_bank) echo "selected";?>><?php echo $key1->bank_name;?></option>
                    <?php 
										}?>
                </select>
                <select name="finance" class="form-control finance cleardata" style="margin-top:10px;display: none;">
                    <option value="0"></option>
                    <option value="1" <?php if($sales->sales_master_financetype == 1) echo "selected";?>>BAJAJ finance</option>
                    <option value="2" <?php if($sales->sales_master_financetype == 2) echo "selected";?>>HDFC finance</option>
                    <option value="3" <?php if($sales->sales_master_financetype == 3) echo "selected";?>>HDB finance</option>
                </select>
            </div>
            <div class="col-sm-2">
                <label class="exampleInputEmail1" style="margin-top:10px;">AMOUNT</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="paidamount" id="paidamount" class="form-control cleardata"
                    style="margin-top:10px;" value="<?=$sales->sales_master_amount_paid?>"/>
            </div>



        </div>


    </div>

    <div class="col-sm-6">
        <div class="col-sm-12">
            <div class="col-sm-2">
                <label class="exampleInputEmail1">DELIVERY CHARGE</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="deliverychare" id="deliverychare" class="form-control cleardata" 
                value="<?=$sales->sales_master_delivery_charge?>"/>
            </div>


            <div class="col-sm-2">
                <label class="exampleInputEmail1">TOTAL TAXABLE AMOUNT</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="totalTaxableAmount" id="totalTaxableAmount" class="form-control cleardata" 
                value="<?=$sales->sales_master_tot_taxable_amount?>" readonly/>
            </div>
        </div>




        <div class="col-sm-12">
            <div class="col-sm-2">
                <label class="exampleInputEmail1">DISCOUNT</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="discount" id="discount" class="form-control cleardata"  value="<?=$sales->sales_master_discount?>"/>
            </div>
            <div class="col-sm-2">
                <label class="exampleInputEmail1">GST AMOUNT</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="amountGst" id="amountGst" readonly class="form-control cleardata"  value="<?=$sales->sales_master_tot_gst_amount?>"/>
            </div>

        </div>
        <div class="col-sm-12" style="margin-top: 10px;">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-2">
                <label class="exampleInputEmail1">CESS</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="cessAmount" readonly id="cessAmount" class="form-control cleardata"  value="<?=$sales->sales_master_total_cess?>"/>
            </div>
        </div>
        <div class="col-sm-12" style="margin-top: 10px;">
            <div class="col-sm-6"></div>
            <div class="col-sm-2">
                <label class="exampleInputEmail1">ROUND OFF</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="roundOfValuue" readonly id="roundOfValuue" class="form-control cleardata"  value="<?=$sales->sales_master_round_off?>"/>
            </div>

        </div>
        <div class="col-sm-12" style="margin-top: 10px;">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-2">
                <label class="exampleInputEmail1">GRAND TOTAL</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="grandTotal" readonly id="grandTotal" class="form-control cleardata"  value="<?=$sales->sales_master_grand_total?>"/>
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
            <button type="submit" id="saveprint" class="btn btn-primary btn-sm">SAVE &
                PRINT</button>
        </div>
        <div class="col-sm-1">
            <button type="submit" id="saveonly" class="btn btn-success btn-sm">SAVE</button>
        </div>
        <div class="col-sm-1" style="margin-left:10px;">
            <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#mymodallisting">VIEW</button>
        </div>
        <div class="col-sm-1" style="margin-left:10px;">
            <button type="button" class="btn btn-warning btn-sm reset">CLEAR</button>
        </div>

    </div>
    <!---->


</div>


<div class="modal-footer">
    
</div>

</form>
<!-- <script src="<?php echo base_url();?>admin_styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->

<script>

		

		function recalculate() {
			var totalTaxableAmount = 0;
			var totalcessAmount = 0;
			var totalgstAmount = 0;
			var grandTotal = 0;
			var deliverycharge = 0;
			var discount = 0;

			$('#editform .taxableAmount').each(function (index) {
				if ($(this).val() != '') {
					totalTaxableAmount = totalTaxableAmount + parseFloat($(this).val());
				}
			});
			$('#editform #totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
			$('#editform .cessAmount').each(function (index) {
				if ($(this).val() != '') {
					totalcessAmount = totalcessAmount + parseFloat($(this).val());
				}
			});
			$('#editform #cessAmount').val(totalcessAmount.toFixed(2));
			$('#editform .gstAmount').each(function (index) {
				if ($(this).val() != '') {
					totalgstAmount = totalgstAmount + parseFloat($(this).val());
				}
			});
			$('#editform #amountGst').val(totalgstAmount.toFixed(2));
			grandTotal = totalTaxableAmount + totalcessAmount + totalgstAmount;
			$('#editform #roundOfValuue').val((grandTotal % 1).toFixed(2));
			if ($('#editform #deliverychare').val() != '') {
				deliverycharge = $('#editform #deliverychare').val();
			}
			else {
				deliverycharge = 0;
			}
			if ($('#editform #discount').val() != '') {
				discount = $('#editform #discount').val();
			}
			else {
				discount = 0;
			}
			$('#editform #grandTotal').val(Math.round(grandTotal + parseInt(deliverycharge) - parseInt(discount)));
			var paidamount = $('#editform #paidamount').val();
			var bankamount = $('#editform #bankamount').val();
			if (bankamount == '') {
				bankamount = 0;
			}
			if (paidamount == '') {
				paidamount = 0;
			}
			var outstanding_previous = parseInt($('#editform #outstanding_previous').val());
			$('#editform #outstanding').val(outstanding_previous + parseInt(grandTotal) + parseInt(deliverycharge) - parseInt(discount) - parseInt(paidamount) - parseInt(bankamount));
		}


		//Dynamic Row Adding Code

		$('#editform #BtnNewRow').on('click', function () {
			var rowStart = 1;
			$('#editform .slno').each(function () {
				$(this).html(rowStart);
				rowStart = rowStart + 1;
			});console.log(rowStart);
			$newrow=$('#editform #BtnNewRow').data('order')+1;
			$('#editform #BtnNewRow').data('order', $newrow);
			var current_row = $newrow;
			var new_row = '<tr id="detailRow_' + current_row + '"> <th scope="row" class="slno">' + rowStart + '</th>';
			new_row += '<td><input required type="hidden"  class="form-control  puritem" id="puritem_' + current_row + '" name="puritemid[]" data-order="' + current_row + '" style="float:left"><input required type="hidden"  class="form-control  " id="mop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  class="form-control  " id="qtymop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  class="form-control  " id="qtyinventory_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  class="form-control  codeItem" id="percost_' + current_row + '" data-order="' + current_row + '" style="float:left"><input required type="text" name="itemcode[]" class="form-control  codeItem" id="code_' + current_row + '" data-order="' + current_row + '" style="float:left"><i class="fa fa-search searchitemmodel" data-row="' + current_row + '" aria-hidden="true" style="font-size:12px;cursor:pointer;padding:5px" ></i><div id="code_list_' + current_row + '"></div></td>';
			new_row += '<td><input required type="text" name="itemname[]" class="form-control nameItem cleardata" id="itemname_' + current_row + '" data-order="' + current_row + '" ><div id="name_list_' + current_row + '"></div></td>';
			new_row += '<td><select name="itembatchid[]" class="form-control itemBatch" id="itembatchid_'+current_row+'" data-order="'+current_row+'" placeholder="Batch"><option value="">Select Batch</option></select></td>';
			
			new_row += '<td><input type="hidden" name="itemqntyold[]" id="itemqntyold_' + current_row + '" data-order="' + current_row + '" value="0"><input required type="text" name="itemqnty[]" class="form-control qnty cleardata " id="itemqty_' + current_row + '" data-order="' + current_row + '" ></td>';
			new_row += '<td><input required type="text" name="unitprice[]" class="form-control unitprice cleardata " data-toggle="tooltip" trigger="manual"  id="unitprice_' + current_row + '" data-order="' + current_row + '" ></td>';
			new_row += '<td><input required type="text" name="itemtaxable[]" class="form-control taxableAmount cleardata" id="taxable_' + current_row + '" data-value="" data-order="' + current_row + '"></td>';
			new_row += '<td><input required type="text" name="itemgstper[]" class="form-control cleardata" id="gstper_' + current_row + '" data-order="' + current_row + '"><input type="hidden" name="itemhsncode[]" class="form-control itemhsncode" id="hsncode_' + current_row + '" data-value="" data-order="' + current_row + '" required><input type="hidden" name="itemitemtbid[]" class="form-control itemitemtbid" id="itemtbid_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
			new_row += '<td><input required type="text" name="itemgstamount[]" class="form-control gstAmount cleardata" id="gstAmount_' + current_row + '" data-value="" data-order="' + current_row + '"></td>';
			new_row += '<td><input required type="text" name="itemcessamount[]" class="form-control cessAmount cleardata" id="cessAmount_' + current_row + '" data-value=""  data-order="' + current_row + '"></td>';
			new_row += '<td><input required type="text" name="itemtotalamount[]" class="form-control totalAmount cleardata" id="totalAmount_' + current_row + '" data-value="" data-order="' + current_row + '" readonly></td>';
			new_row += '<td><select name="employee[]" class="form-control cleardata" ><?php echo $namelist;?></select></td>';
			new_row += '<td>';
			new_row += '<i data-row="' + current_row + '" class="fa fa-eraser detailEraseRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer;margin-right: 7px"></i>';
			new_row += '<i data-row="' + current_row + '" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
			new_row += '</td></tr>';

			$('#editform #sales_cont').append(new_row);
			console.log(current_row);
			$('#editform #BtnNewRow').data('order', $newrow);
 
		})

		$('#editform #sales_cont').on('click', '.detailDeleteRow', function () {
			var rowNumber = $(this).data('row');
			$('#editform #detailRow_' + rowNumber).remove();
			var rowStart = 1;
			$('#editform .slno').each(function () {
				$(this).html(rowStart); 
				rowStart = rowStart + 1;
			});
// 			$('#BtnNewRow').data('order', rowStart);
// 			$('.gstAmount').keyup();
// 			$('.cessAmount').keyup();
// 			$('.totalAmount').keyup();
			recalculate();
		})

		$('#editform #sales_cont').on('click', '.detailEraseRow', function () {
			var rowNumber = $(this).data('row');
			$('#editform #detailRow_' + rowNumber + ' select').prop('selectedIndex', 0);
			$('#editform #detailRow_' + rowNumber + ' input').val('');
			recalculate();
			//   $('.gstAmount').keyup();
			//   $('.cessAmount').keyup();
			//   $('.totalAmount').keyup();
		})

		//Dynamic Row Adding Code

		$('#editform #sales_cont').on('keyup', '.gstAmount', function () {
			var gstAmount = 0;
			$('#editform .gstAmount').each(function () {
				if ($(this).val() != '') {
					gstAmount = parseInt(gstAmount) + parseInt($(this).val());
				}
			});

			$('#editform #amountGst').val(gstAmount);
		})

		$('#editform #sales_cont').on('keyup', '.cessAmount', function () {
			var cessAmount = 0;
			$('#editform .cessAmount').each(function () {
				if ($(this).val() != '') {
					cessAmount = parseInt(cessAmount) + parseInt($(this).val());
				}
			});
			$('#editform #cessAmount').val(cessAmount);
		})

		$('#editform #sales_cont').on('keyup', '.totalAmount', function () {
			var totalAmount = 0;
			$('#editform .totalAmount').each(function () {
				if ($(this).val() != '') {
					totalAmount = parseInt(totalAmount) + parseInt($(this).val());
				}
			});
			$('#editform #totalAmount').val(totalAmount);
		})

		$('#editform #sales_cont').on('keyup', '.codeItem', function () {
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
							$('#editform #code_list_' + rowOrder).show();
							$('#editform #code_list_' + rowOrder).html(res);
						} else {
							$('#editform #code_list_' + rowOrder).html("");
						}
					},
				});	
      		}
			else{
				$('#editform #code_list_' + rowOrder).html("");
			}
  })

		$('#editform #sales_cont').on('keyup', '.nameItem', function () {
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
							$('#editform #name_list_' + rowOrder).show();
							$('#editform #name_list_' + rowOrder).html(res);
						} else {
							$('#editform #name_list_' + rowOrder).html("");
						}
					},
				});	
      		}
			else{
				$('#editform #name_list_' + rowOrder).html("");
			}
  })

		$('#editform #sales_cont').on('keyup', '.batchItem', function () {
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
							$('#editform #batch_list_' + rowOrder).show();
							$('#editform #batch_list_' + rowOrder).html(res);
						} else {
							$('#editform #batch_list_' + rowOrder).html("");
						}
					},
				});	
      		}
			else{
				$('#editform #batch_list_' + rowOrder).html("");
			}
  })
		$('#editform #sales_cont').on('click','.subSelect_itemedit',function(){
			var id = $(this).data('id');
			var itemValue = $(this).data('value');
			$('#editform #code_list_'+id).hide();
			$('#editform #name_list_'+id).hide();
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
								
								optiondata += '<option value="'+batchlist[i].batch_id+'">'+batchlist[i].batchcode+'</option>';

							}
							
							$('#editform #itembatchid_'+id).html(optiondata);
							$('#editform #code_'+id).val(batchlist[0].itm_code);
							$('#editform #itemname_'+id).val(batchlist[0].itm_name);
						}
			})
		})

		//$('#editform #sales_cont').on('click', '.subSelect_itemedit', function () {
		$('#editform #sales_cont').on('change','.itemBatch',function(){ 
			var id = $(this).data('order');
			var itemValue = $(this).val();
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
					$('#editform #code_list_' + id).hide();
					$('#editform #name_list_' + id).hide();
					$('#editform #batch_list_' + id).hide();
					var obj = JSON.parse(res);
					$('#editform #hsncode_' + id).val(obj.hsn_code);
					if ((obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28)  && ! $('#isigstedit').is(":checked")) {
						var taxableAmount = (parseInt(obj.t_sr) / (101 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
					}
					else {
						var taxableAmount = (parseInt(obj.t_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
					}
					var gstAmount = ((taxableAmount * parseInt(obj.hsn_tax)) / 100).toFixed(2);
					if ((obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28)  && ! $('#isigstedit').is(":checked")) {
						var cessAmount = (taxableAmount / 100).toFixed(2);
					}
					else {
						var cessAmount = 0;
					}
					$('#editform #itemtbid_'+id).val(obj.item_id);
					$('#editform #puritem_'+id).val(obj.item_id);
					$('#editform #pcost_' + id).val(obj.t_pc);
					$('#editform #percost_' + id).val(obj.t_pc);
					$('#editform #code_' + id).val(obj.itm_code);
					$('#editform #unitprice_'+id).val(obj.t_sr);
					$('#editform #itemname_' + id).val(obj.itm_name);
					//$('#editform #batch_' + id).val(obj.item_batchcode + '-' + obj.itm_ostock);
					$('#editform #taxable_' + id).val(taxableAmount);
					$('#editform #taxable_' + id).attr('data-value', taxableAmount);
					$('#editform #gstAmount_' + id).val(gstAmount);
					$('#editform #gstAmount_' + id).attr('data-value', gstAmount);
					$('#editform #cessAmount_' + id).val(cessAmount);
					$('#editform #cessAmount_' + id).attr('data-value', cessAmount);
					$('#editform #itemqty_' + id).val(1);
					$('#editform #gstper_' + id).val(obj.hsn_tax);
					$('#editform #totalAmount_' + id).val(obj.t_sr);
					$('#editform #totalAmount_' + id).attr('data-value', obj.t_sr);
					$('#editform #totalTaxableAmount').val(taxableAmount);
					$('#editform .taxableAmount').each(function (index) {
						console.log($(this).val());
						totalTaxableAmount = totalTaxableAmount + parseFloat($(this).val());
					});
					$('#editform #totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
					$('#editform .cessAmount').each(function (index) {
						console.log($(this).val());
						totalcessAmount = totalcessAmount + parseFloat($(this).val());
					});
					$('#editform #cessAmount').val(totalcessAmount.toFixed(2));
					$('#editform .gstAmount').each(function (index) {
						console.log($(this).val());
						totalgstAmount = totalgstAmount + parseFloat($(this).val());
					});
					$('#editform #amountGst').val(totalgstAmount.toFixed(2));
					grandTotal = totalTaxableAmount + totalcessAmount + totalgstAmount;
					$('#editform #roundOfValuue').val((grandTotal % 1).toFixed(2));
					if ($('#editform #deliverychare').val() != '') {
						deliverycharge = $('#editform #deliverychare').val();
					}
					else {
						deliverycharge = 0;
					}
					if ($('#editform #discount').val() != '') {
						discount = $('#editform #discount').val();
					}
					else {
						discount = 0;
					}
					$('#editform #grandTotal').val(Math.round(grandTotal + parseInt(deliverycharge) - parseInt(discount)));
					var paidamount = $('#editform #paidamount').val();
					var bankamount = $('#editform #bankamount').val();
					if (bankamount == '') {
						bankamount = 0;
					}
					if (paidamount == '') {
						paidamount = 0;
					}
					var outstanding_previous = parseInt($('#editform #outstanding_previous').val());
					$('#editform #outstanding').val(outstanding_previous + parseInt(grandTotal) + parseInt(deliverycharge) - parseInt(discount) - parseInt(paidamount) - parseInt(bankamount));
				},
		});
 })

		$('#editform #deliverychare').on('keyup', function () {
			recalculate();
		});

		$('#editform #discount').on('keyup', function () {
			recalculate();
		});

		$('#editform #sales_cont').on('keyup', '.qnty', function () {
			var qnty = $(this).val();
			var order = $(this).data('order');
			var mop=$('#editform #mop_'+order).val();
			var inqty=$('#editform #qtyinventory_'+order).val();

		//	alert(mop);
			var totalTaxableAmount = 0;
			var totalcessAmount = 0;
			var totalgstAmount = 0;
			var deliverycharge = 0;
			var discount = 0;
			
			if(parseInt(inqty)<parseInt(qnty)){
				$('#editform #itemqty_'+order).css({"border":"1px solid red"});
			}else{
				
				$('#editform #itemqty_'+order).css({"border":"1px solid #d2d6de"});
			}

			if (qnty != '' && qnty != 0) {				

				var item_hsn_tax = $('#editform #gstper_'+order).val();
				var unitprice = $('#editform #unitprice_'+order).val();
				var taxableAmount = 0;
				if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28)  && ! $('#isigstedit').is(":checked")) {
					var taxableAmount = (parseInt(unitprice) / (101 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
				}
				else {
					var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
				}
				var gstAmount = ((taxableAmount * parseInt(item_hsn_tax)) / 100).toFixed(2);
				if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28)  && ! $('#isigstedit').is(":checked")) {
							var cessAmount = (taxableAmount / 100).toFixed(2);
				}
				else {
							var cessAmount = 0;
				}
				var gstsubtotal = qnty * gstAmount;
				var cesssubtotal = qnty * cessAmount;
				var itemsubtotal = qnty * unitprice ;
				var taxablesubtotal = qnty * taxableAmount;

				$('#editform #taxable_' + order).val((taxablesubtotal).toFixed(2));	
				$('#editform #gstAmount_' + order).val((gstsubtotal).toFixed(2));
				$('#editform #cessAmount_' + order).val((cesssubtotal).toFixed(2));
				$('#editform #totalAmount_' + order).val((itemsubtotal).toFixed(2));	


				$('#editform #qtymop_'+order).val(qnty*mop);
				$('#editform .taxableAmount').each(function (index) {
					totalTaxableAmount = totalTaxableAmount + parseFloat($(this).val());
				});
				$('#editform #totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
				$('#editform .cessAmount').each(function (index) {
					totalcessAmount = totalcessAmount + parseFloat($(this).val());
				});
				$('#editform #cessAmount').val(totalcessAmount.toFixed(2));
				$('#editform .gstAmount').each(function (index) {
					console.log($(this).val());
					totalgstAmount = totalgstAmount + parseFloat($(this).val());
				});
				$('#editform #amountGst').val(totalgstAmount.toFixed(2));
				grandTotal = totalTaxableAmount + totalcessAmount + totalgstAmount;
				$('#editform #roundOfValuue').val((grandTotal % 1).toFixed(2));
				if ($('#editform #deliverychare').val() != '') {
					deliverycharge = $('#editform #deliverychare').val();
				}
				else {
					deliverycharge = 0;
				}
				if ($('#editform #discount').val() != '') {
					discount = $('#editform #discount').val();
				}
				else {
					discount = 0;
				}
				$('#editform #grandTotal').val(Math.round(grandTotal + parseInt(deliverycharge) - parseInt(discount)));
				var paidamount = $('#paidamount').val();
				var bankamount = $('#editform #bankamount').val();
				if (bankamount == '') {
					bankamount = 0;
				} 
				if (paidamount == '') {
					paidamount = 0;
				}
				var outstanding_previous = parseInt($('#editform #outstanding_previous').val());
				$('#editform #outstanding').val(outstanding_previous + parseInt(grandTotal) + parseInt(deliverycharge) - parseInt(discount) - parseInt(paidamount) - parseInt(bankamount));
			}

		});

		

		$('#editform #paidamount, #editform #bankamount').on('keyup', function () {
			var paidamount = $('#editform #paidamount').val();
			var grandTotal = $('#editform #grandTotal').val();
			var bankamount = $('#editform #bankamount').val(); 
			if (bankamount == '') {
				bankamount = 0;
			}
			if (paidamount == '') {
				paidamount = 0;
			}
			var outstanding_previous = parseInt($('#editform #outstanding_previous').val());
			$('#editform #outstanding').val(outstanding_previous + parseInt(grandTotal) - parseInt(paidamount) - parseInt(bankamount));
		});

		$('#editform .emicheck').on('click', function () {

			$('#editform .salecardnumber').hide();
			$('#editform .cardnumber').hide();
			$('#editform .salescheque').hide();
			$('#editform .saleschequenumber').hide();
			$('#editform .transcheq').hide();
			$('#editform .salestranscheque').hide();
			$('#editform .bankamount1').show();
			$('#editform .bank1').show();
			$('#editform .bankamount').show();
			$('#editform .bank').show();
			$('#editform .financelabel').show();
			$('#editform .finance').show();
		});
		$('#editform .bankcheck').on('click', function () {

			$('#editform .salecardnumber').hide();
			$('#editform .cardnumber').hide();
			$('#editform .salescheque').hide();
			$('#editform .saleschequenumber').hide();
			$('#editform .transcheq').hide();
			$('#editform .salestranscheque').hide();
			$('#editform .bankamount1').hide();
			$('#editform .bank1').show();
			$('#editform .bankamount').hide();
			$('#editform .bank').show();
			$('#editform .financelabel').hide();
			$('#editform .finance').hide();
		});
		$('#editform .chquecheck').on('click', function () {

			$('#editform .salescheque').show();
			$('#editform .saleschequenumber').show();
			$('#editform .salecardnumber').hide();
			$('#editform .cardnumber').hide();
			$('#editform .transcheq').hide();
			$('#editform .salestranscheque').hide();
			$('#editform .bankamount1').hide();
			$('#editform .bank1').hide();
			$('#editform .bankamount').hide();
			$('#editform .bank').hide();
			$('#editform .financelabel').hide();
			$('#editform .finance').hide();
		});
		$('#editform .banktrancheck').on('click', function () {

			$('#editform .transcheq').show();
			$('#editform .salestranscheque').show();
			$('#editform .salecardnumber').hide();
			$('#editform .cardnumber').hide();
			$('#editform .salescheque').hide();
			$('#editform .saleschequenumber').hide();
			$('#editform .bankamount1').hide();
			$('#editform nk1').hide();
			$('#editform .bankamount').hide();
			$('#editform .bank').hide();
			$('#editform .financelabel').hide();
			$('#editform .finance').hide();
		});
		$('#editform .bothcheck').on('click', function () {

			$('#editform .transcheq').hide();
			$('#editform .salestranscheque').hide();
			$('#editform .salecardnumber').hide();
			$('#editform .cardnumber').hide();
			$('#editform .salescheque').hide();
			$('#editform .saleschequenumber').hide();
			$('#editform .bankamount1').show();
			$('#editform .bank1').show();
			$('#editform .bankamount').show();
			$('#editform .bank').show();
			$('#editform .financelabel').hide();
			$('#editform .finance').hide();
		});
		$('#editform .cashcheck').on('click', function () {

			$('#editform .transcheq').hide();
			$('#editform .salestranscheque').hide();
			$('#editform .salecardnumber').hide();
			$('#editform .cardnumber').hide();
			$('#editform .salescheque').hide();
			$('#editform eschequenumber').hide();
			$('#editform .bankamount1').hide();
			$('#editform .bank1').hide();
			$('#editform .bankamount').hide();
			$('#editform .bank').hide();
			$('#editform .financelabel').hide();
			$('#editform .finance').hide();
		});

		$('#editform #saveprint').on('click', function () {
			if ($('#editform #savetype').val() == '' || $('#editform #savetype').val() == 2) {
				event.preventDefault();
				$('#editform #savetype').val(1);
				$('#editform #saveprint').click();
			}
		});
		$('#editform #saveonly').on('click', function () {
			if ($('#editform #savetype').val() == '' || $('#editform #savetype').val() == 1) {
				event.preventDefault();
				$('#editform #savetype').val(2);
				$('#editform #saveonly').click();
			}
		});
		$('#editform #sales_cont').on('click','.searchitemmodel', function () {
			$('#searchModel').modal('show');
			$('#searchinput').attr('data-row',$(this).data('row'));
		});
		
			$('#cust_search').on('click','.custsearchmodal', function () {
				
			$('#custsearch_modal').modal('show');
		
		});
		
		$('#searchinput').on('keyup',function(){
			var type1=$('#editform #searchtype:checked').val();
			
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
			$('#editform #customersearchinput').on('keyup',function(){
		    var val=$(this).val();
		   
		    	$.ajax({
				type: "POST",
				url: '<?php echo site_url('Admin/searchcustomermodaladmin');?>',
				data: { itemValue: val,},
				success: function (res) {
				    $('#editform #searchcust').html(res);
				}
		    });
		});
		$('#searchbox').on('click','tr td',function(){
		    var itemValue = $(this).parent().data('id');
		    var id = $('#searchinput').attr('data-row');
			var totalTaxableAmount = 0;
			var totalcessAmount = 0;
			var totalgstAmount = 0;
			var grandTotal = 0;
			var deliverycharge = 0;
			var discount = 0;
			$.ajax({
				type: "POST",
				url: '<?php echo site_url('Admin/getItemByCode');?>',
				data: { itemValue: itemValue },
				success: function (res) {
					$('#searchModel button.close').click();
				    $('#searchinput').attr('data-row','');
				    //$('#searchbox').html('');
					console.log(res); 
					$('#editform #code_list_' + id).hide();
					$('#editform #name_list_' + id).hide();
					$('#editform #batch_list_' + id).hide();
					var obj = JSON.parse(res);
					$('#editform #hsncode_' + id).val(obj.hsn_code);
					if ((obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28)  && ! $('#isigstedit').is(":checked")) {
						var taxableAmount = (parseInt(obj.itm_srate) / (101 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
					}
					else {
						var taxableAmount = (parseInt(obj.itm_srate) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
					}
					var gstAmount = ((taxableAmount * parseInt(obj.hsn_tax)) / 100).toFixed(2);
					if ((obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28)  && ! $('#isigstedit').is(":checked")) {
						var cessAmount = (taxableAmount / 100).toFixed(2);
					}
					else {
						var cessAmount = 0;
					}
					$('#editform #pcost_' + id).val(obj.itm_pcost);
					$('#editform #puritem_'+id).val(obj.itm_id);
					$('#editform #percost_' + id).val(obj.itm_pcost);
					$('#editform #mop_' + id).val(obj.item_mop);
					$('#editform #qtymop_' + id).val(obj.item_mop);
					$('#editform #unitprice_'+id).val(obj.itm_srate);
					$('#editform #code_' + id).val(obj.itm_code);
					$('#editform #itemname_' + id).val(obj.itm_name );
					$('#editform #batch_' + id).val(obj.item_batchcode + '-' + obj.itm_ostock);
					$('#editform #taxable_' + id).val(taxableAmount);
					$('#editform #taxable_' + id).attr('data-value', taxableAmount);
					$('#editform #gstAmount_' + id).val(gstAmount);
					$('#editform #gstAmount_' + id).attr('data-value', gstAmount);
					$('#editform #cessAmount_' + id).val(cessAmount);
					$('#editform #cessAmount_' + id).attr('data-value', cessAmount);
					$('#editform #itemqty_' + id).val(1);
					$('#editform #gstper_' + id).val(obj.hsn_tax);
					$('#editform #totalAmount_' + id).val(obj.itm_srate);
					$('#editform #totalAmount_' + id).attr('data-value', obj.itm_srate);
					$('#editform #totalTaxableAmount').val(taxableAmount);
					$('#editform .taxableAmount').each(function (index) {
						console.log($(this).val());
						totalTaxableAmount = totalTaxableAmount + parseFloat($(this).val());
					});
					$('#editform #totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
					$('#editform .cessAmount').each(function (index) {
						console.log($(this).val());
						totalcessAmount = totalcessAmount + parseFloat($(this).val());
					});
					$('#editform #cessAmount').val(totalcessAmount.toFixed(2));
					$('#editform .gstAmount').each(function (index) {
						console.log($(this).val());
						totalgstAmount = totalgstAmount + parseFloat($(this).val());
					});
					$('#editform #amountGst').val(totalgstAmount.toFixed(2));
					grandTotal = totalTaxableAmount + totalcessAmount + totalgstAmount;
					$('#editform #roundOfValuue').val((grandTotal % 1).toFixed(2));
					if ($('#editform #deliverychare').val() != '') {
						deliverycharge = $('#editform #deliverychare').val();
					}
					else {
						deliverycharge = 0;
					}
					if ($('#editform #discount').val() != '') {
						discount = $('#editform #discount').val();
					}
					else {
						discount = 0;
					}
					$('#editform #grandTotal').val(Math.round(grandTotal + parseInt(deliverycharge) - parseInt(discount)));
					var paidamount = $('#editform #paidamount').val();
					var bankamount = $('#editform #bankamount').val();
					if (bankamount == '') {
						bankamount = 0;
					}
					if (paidamount == '') {
						paidamount = 0;
					}
					var outstanding_previous = parseInt($('#editform #outstanding_previous').val());
					$('#editform #outstanding').val(outstanding_previous + parseInt(grandTotal) + parseInt(deliverycharge) - parseInt(discount) - parseInt(paidamount) - parseInt(bankamount));
				},
		});	
		});
		$('#editform #phon_num').on('keyup',function(){
			var phnum=$('#editform #phon_num').val();
			var phcount =phnum.length;
			if(phcount==10 || phcount==0){
				$('#editform #phon_num').css("border","1px solid #d2d6de");
		$('#editform #phon_num').css("color","black");	
			
			}
			else{
			 $('#editform #phon_num').css("border","2px solid red");
		     $('#editform #phon_num').css("color","red");
			}
			//alert(phcount);
		});
		$("html").on('click','.customersearchlist',function(){
			$('#custsearch_modal button.close').click();
			 $('#customername').val($(this).data('id'));
			  $('#phon_num').val($(this).data('phone_num'));
			   $('#address').val($(this).data('address'));
			   $('#outstanding_previous').val($(this).data('outstanding'));
				$('#outstanding').val($(this).data('outstanding'));   
		});
		$(".reset").bind("click", function() {
  $(".cleardata").val("");
});
$('#editform #transmode').on('change',function(){
var id=$(this).val();
if(id==3){
	$('#editform #financelabel').show();
	$('#editform #financeinput').show();
}else{
	$('#editform #financelabel').hide();
	$('#editform #financeinput').hide();
}
});

$('#editform #sales_cont').on('keyup', '.unitprice', function () {
		//Compare with item_mop <

		var id = $(this).data('order');
		var unitprice = $(this).val();
				
		
		var qnty = $('#editform #itemqty_'+id).val();
		var mop = $('#editform #qtymop_'+id).val() / (qnty || 1);

				//alert(id);
		if(parseInt(unitprice)< parseInt(mop)){

			//alert("Total amount is greater than Item MOP : '"+mop+"'");
			$(this).css("border","2px solid red");
			$(this).css("color","red");
			
			$(this).attr('title', "Total amount is less than Item MOP : '"+mop+"'")
										.tooltip('fixTitle')
										.tooltip('show');  

			

							
		}
		else{ 

			$(this).css("border","1px solid #ccc");
			$(this).css("color","#555");
			$(this).tooltip('hide');
			$(this).attr('data-original-title', '');


			var item_hsn_tax = $('#editform #gstper_'+id).val();
			var taxableAmount = 0;
			if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28)  && ! $('#isigstedit').is(":checked")) {
				var taxableAmount = (parseInt(unitprice) / (101 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
			}
			else {
				var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
			}
			var gstAmount = ((taxableAmount * parseInt(item_hsn_tax)) / 100).toFixed(2);
			if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28)  && ! $('#isigstedit').is(":checked")) {
						var cessAmount = (taxableAmount / 100).toFixed(2);
			}
			else {
						var cessAmount = 0;
			}
			var gstsubtotal = qnty * gstAmount;
			var cesssubtotal = qnty * cessAmount;
			var itemsubtotal = qnty * unitprice ;
			var taxablesubtotal = qnty * taxableAmount;

			$('#editform #taxable_' + id).val((taxablesubtotal).toFixed(2));	
			$('#editform #gstAmount_' + id).val((gstsubtotal).toFixed(2));
			$('#editform #cessAmount_' + id).val((cesssubtotal).toFixed(2));
			$('#editform #totalAmount_' + id).val((itemsubtotal).toFixed(2));	
			
			recalculate();
			
		}

});

$("#isigstedit").change(function() { 
 
			
 $('.cessAmount').each(function (index) {

	 $(this).val('0.00');
	 var order = $(this).data('order');
	 var qnty = $('#editform #itemqty_'+order).val();

	 var item_hsn_tax = $('#editform #gstper_'+order).val();
	 var unitprice = $('#editform #unitprice_'+order).val();
	 var taxableAmount = 0;
	 if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigstedit').is(":checked")) {
		 var taxableAmount = (parseInt(unitprice) / (101 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
	 }
	 else {
		 var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
	 }
	 var gstAmount = ((taxableAmount * parseInt(item_hsn_tax)) / 100).toFixed(2);
	 if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigstedit').is(":checked")) {
				 var cessAmount = (taxableAmount / 100).toFixed(2);
	 }
	 else {
				 var cessAmount = 0;
	 }

	 
	 var gstsubtotal = qnty * gstAmount;
	 var cesssubtotal = qnty * cessAmount;
	 var itemsubtotal = qnty * unitprice ;
	 var taxablesubtotal = qnty * taxableAmount;

	 $('#editform #taxable_' + order).val((taxablesubtotal).toFixed(2));	
	 $('#editform #gstAmount_' + order).val((gstsubtotal).toFixed(2));
	 $('#editform #cessAmount_' + order).val((cesssubtotal).toFixed(2));
	 $('#editform #totalAmount_' + order).val((itemsubtotal).toFixed(2));	


 });

 
 recalculate();

});
</script>