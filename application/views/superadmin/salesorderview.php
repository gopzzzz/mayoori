<?php echo form_open_multipart('Admin/salesorder_makepurchase',array('name' => 'editform','id' => 'editform'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Sales Order Window</h4>
</div>
<input type="hidden" name="master_id" value="<?=$sales->sales_order_master_id?>" />
<div class="col-sm-12" style="margin-top: 10px;">
    <div class="col-sm-1">  
        <label class="exampleInputEmail1">BILL NO:</label>
    </div>
    <div class="col-sm-2">
        <input type="text" name="billno" class="form-control"
            value="<?=$sales->sales_order_master_id?>" />
    </div>
    <div class="col-sm-1"> 
        <label class="exampleInputEmail1">BILL DATE:</label>
    </div>
    <div class="col-sm-2">
        <input type="text" name="billdate" class="form-control" value="<?php if($sales->sales_order_master_date == '0000-00-00'){echo date("d-m-y"); }else{ echo date_format(date_create($sales->sales_order_master_date),"d-m-y");}?>" />
    </div>
    <div class="col-sm-1">
        <label class="exampleInputEmail1">EWAY BILL NUMBER</label>
    </div>
    <div class="col-sm-2">
        <input type="text" name="ewaybillno" class="form-control cleardata" value="<?=$sales->sales_order_master_eway_billno?>"/>
    </div>

    <div class="col-sm-1">
        <label class="exampleInputEmail1">DELIVERY DATE:</label>
    </div>
    <div class="col-sm-2">
        <input type="date" name="deliverydate" class="form-control cleardata" value="<?php echo date("d-m-yy", strtotime($sales->sales_order_master_delivery_date));?>"/>
    </div>

</div>


<div class="col-sm-12" style="margin-top: 10px;">
    <div class="col-sm-1">
        <label class="exampleInputEmail1">CUSTOMER NAME:</label>
    </div>
    <div class="col-sm-2" id="cust_search">
        <input type="text" name="customername" id="customername" class="form-control cleardata" style="width:150px;"
            required value="<?=$sales->sales_order_master_customer_name?>"/>
        <i class="fa fa-search custsearchmodal" data-row="1" aria-hidden="true"
            style="font-size:12px;cursor:pointer;padding:5px"></i>
        <div class="customer_list"></div>

    </div>
    <div class="col-sm-1">
        <label class="exampleInputEmail1">PHONE NUMBER:</label>
    </div>
    <div class="col-sm-2">
        <input type="text" name="phonenumber" class="form-control cleardata" id="phon_num"  value="<?=$sales->sales_order_master_phone_no?>"/>
    </div>

    <div class="col-sm-1">
        <label class="exampleInputEmail1">ADDRESS:</label>
    </div>
    <div class="col-sm-2">
        <textarea name="address" class="form-control cleardata" id="address"><?=$sales->sales_order_master_customer_address?></textarea>
    </div>


    <div class="col-sm-1">
        <label class="exampleInputEmail1"> DELIVERY ADDRESS:</label>
    </div>
    <div class="col-sm-2">
        <textarea name="deliveryaddress" class="form-control cleardata"><?=$sales->sales_order_master_delivery_address?></textarea>
    </div>


</div>

<div class="col-sm-12"> 
    <div class="col-sm-1">
        <label class="exampleInputEmail1">TRANSACTION MODE:</label>
    </div>
    <div class="col-sm-2">
        <select name="transmode" class="form-control " id="transmode">
            <option value="0">Select</option>
            <option value="1" <?php if($sales->sales_order_master_trans_mode==1 || $sales->sales_order_master_trans_mode == 0){ echo "selected";}?>>Cash</option>
            <option value="2" <?php if($sales->sales_order_master_trans_mode==2){ echo "selected";}?>>Credit</option>
            <option value="3" <?php if($sales->sales_order_master_trans_mode==3){ echo "selected";}?>>Finace</option>
        </select>
    </div>
    <div class="col-sm-1" id="financelabel" style="display:none;">
        <label class="exampleInputEmail1">FINANCE:</label>
    </div>
    <div class="col-sm-2" id="financeinput" style="display:none;">
        <select name="financeid" class="form-control ">
            <option value="0">Select</option>
            <?php foreach($finance as $finance){?>
            <option value="<?php echo  $finance->id;?>"  <?php if($sales->sales_order_master_finance_id==$finance->id){ echo "selected";}?>><?php echo  $finance->finance;?></option>
            <?php } ?>
        </select>
    </div>

	<div class="col-sm-4">
        <label><input type="checkbox" name="isigst" id="isigstedit"  value="1" class="cleardata" <?php if($sales->sales_order_master_is_igst == 1) echo "checked";?>/>IS IGST</label>
    </div>
</div>
<div class="col-sm-12" style="margin-top: 20px;"> 

    <table class="table" id="edittable">  
        <thead>
            <tr> 
                <th scope="col">Sl no</th>
                <th scope="col">select</th>
                <th scope="col">Code</th>
                <th scope="col">Item Name</th>
                <th scope="col">Batch</th>
                <th scope="col">Qty</th>
                <th scope="col">Unit price</th>
                <th scope="col">Taxable Value</th>
                <th scope="col">Gst %</th>
                <th scope="col">Gst Amount</th>
              
                <th scope="col">Total</th>
                <th scope="col">Employee</th>
                <th scope="col" width="60px"></th>
             
            </tr>
        </thead>
        <tbody id="sales_cont">
        <?php 
            $count=1;
            foreach($salestrans as $transitem){
              
                ?>
            <tr id="detailRow_<?=$count?>"  data-row='<?=$count?>' <?php if($transitem->sales_order_status==1){ ?> style="background-color:#eee;" <?php } ?>>
                <th scope="row" class="slno"><?=$count?></th>
                <td><input type="checkbox" name="selectitem[]" class="selectitems" id="selectitem_<?=$count?>"
                        data-order="<?=$count?>" value="<?=$transitem->sales_order_trans_id?>" <?php if($transitem->sales_order_status==1){ ?> disabled <?php } ?> >
                        <input type="hidden" name="trans_id[]" class="form-control cleardata" id="trans_<?=$count?>" data-order="<?=$count?>"
                        style="float:left"  value="<?=$transitem->sales_order_trans_id?>">

                        <input type="hidden"  class="form-control cleardata" id="qtyinventory_1"
											data-order="1" name="inventorystock" style="float:left" value="<?=$transitem->sales_order_trans_id?>" >
                </td>
                <td>
                    <input type="hidden" name="purcost[]" class="form-control cleardata" id="pcost_<?=$count?>" data-order="<?=$count?>"
                        style="float:left"  value="<?=$transitem->t_pc?>">

                    <input type="hidden" name="puritemid[]" class="form-control cleardata" id="puritem_<?=$count?>" data-order="<?=$count?>"
                        style="float:left" value="<?=$transitem->sales_order_trans_item_id?>">
                    <input type="hidden" class="form-control cleardata" id="mop_<?=$count?>" data-order="<?=$count?>"
                     style="float:left" value="<?=$transitem->t_mop?>">
                    <input type="hidden" class="form-control cleardata" id="qtymop_<?=$count?>" data-order="<?=$count?>" 
                    style="float:left" value="<?=$transitem->t_mop*$transitem->sales_order_trans_qty?>">
                    <input type="text" name="itemcode[]" class="form-control codeItem cleardata" id="code_<?=$count?>"
                        data-order="<?=$count?>" style="float:left" value="<?=$transitem->sales_order_trans_itm_code?>">

                    <i class="fa fa-search searchitemmodel" data-row="<?=$count?>" aria-hidden="true"
                        style="font-size:12px;cursor:pointer;padding:5px"></i>
                    <div id="code_list_<?=$count?>" style="position: absolute;z-index: 99;"></div>
                </td>
                <td><input type="text" name="itemname[]" class="form-control nameItem cleardata" id="itemname_<?=$count?>"
                        data-order="<?=$count?>" value="<?=$transitem->itm_name?>">
                    <div id="name_list_<?=$count?>" style="position: absolute;z-index: 99;"></div>
                </td>
                <td>
                    <select name="itembatchid[]" class="form-control itemBatch" id="itembatchid_<?=$count?>" placeholder="Batch" data-order="<?=$count?>" required>
						<option value="<?=$transitem->batch_id?>" selected><?=$transitem->batchcode?></option>  
					</select>
                </td>
                </td>
                <td><input type="text" name="itemqnty[]" class="form-control qnty cleardata" id="itemqty_<?=$count?>"
                        data-order="<?=$count?>" value="<?=$transitem->sales_order_trans_qty?>">
					<input type="hidden" name="itemqntyold[]" id="itemqntyold_<?=$count?>"
                        data-order="<?=$count?>" value="<?=$transitem->sales_order_trans_qty?>">	 
				</td>
                <td><input type="text" name="unitprice[]" class="form-control unitprice cleardata" id="unitprice_<?=$count?>"
                        data-order="<?=$count?>" value="<?=$transitem->sales_order_unit_price?>" data-toggle="tooltip" trigger="manual" ></td>
                <td><input type="text" name="itemtaxable[]" class="form-control taxableAmount cleardata" id="taxable_<?=$count?>"
                        data-value="<?=$transitem->sales_order_trans_taxable_value?>" data-order="<?=$count?>" value="<?=$transitem->sales_order_trans_taxable_value?>">
                </td>
                <td><input type="text" name="itemgstper[]" class="form-control cleardata" id="gstper_<?=$count?>" 
                data-order="<?=$count?>" value="<?=$transitem->sales_order_trans_gst_percentage?>"> 
                </td>
                <td><input type="text" name="itemgstamount[] " class="form-control gstAmount cleardata" id="gstAmount_<?=$count?>"
                        data-value="<?=$transitem->sales_order_trans_gst_amount?>" data-order="<?=$count?>" value="<?=$transitem->sales_order_trans_gst_amount?>">
                    <input type="hidden" name="itemitemtbid[] " class="form-control itemitemtbid cleardata"
                        id="itemtbid_<?=$count?>" data-value="<?=$transitem->sales_order_trans_item_id?>" data-order="<?=$count?>" value="<?=$transitem->sales_order_trans_item_id?>">
                    <input type="hidden" name="itemhsncode[]" class="form-control itemhsncode cleardata" id="hsncode_<?=$count?>"
                        data-value="<?=$transitem->sales_order_trans_hsn_code?>" data-order="<?=$count?>" value="<?=$transitem->sales_order_trans_hsn_code?>">
                </td>
                <!-- <td><input type="text" name="itemcessamount[]" class="form-control cessAmount cleardata"
                        id="cessAmount_<?=$count?>" data-value="<?=$transitem->sales_order_trans_cess?>" data-order="<?=$count?>" value="<?=$transitem->sales_order_trans_cess?>">
                </td> -->
                <td><input type="text" name="itemtotalamount[]" class="form-control totalAmount cleardata"
                        id="totalAmount_<?=$count?>" data-value="<?=$transitem->sales_order_trans_total?>" data-order="<?=$count?>" value="<?=$transitem->sales_order_trans_total?>" readonly></td>
                <td><select name="employee[]" class="form-control cleardata">
                        <option value="0">Select</option>
                        <?php foreach($employee as $key){
											?>
                        <option value="<?php echo $key->stf_id;?>" <?php if($key->stf_id==$transitem->sales_order_employee){echo 'selected';}?>><?php echo $key->stf_name;?></option>
                        <?php 
                        }?>
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
    <!-- <button type="button" id="BtnNewRow" data-order="1" class="btn btn-info btn-sm">ADD</button> --> 
</div>
<div class="col-sm-12">
    <div class="col-sm-6">
        <div class="col-sm-12">
            <div class="col-sm-2">
                <label class="exampleInputEmail1">NOTE</label>
            </div>
            <div class="col-sm-4">
                <textarea name="note" class="form-control cleardata" style="font-size:14px;"><?php echo $sales->sales_order_master_note;?></textarea>
            </div>
            <div class="col-sm-2">
                <label class="exampleInputEmail1">NOTE 1</label>
            </div>
            <div class="col-sm-4">
                <textarea name="note" readonly class="form-control cleardata" style="font-size:14px;"><?php if($bankpayment!=null){?>[<?php foreach($bankpayment as $bankpayment1){ echo "Date:-".$bankpayment1->date."(".$bankpayment1->amount.")***";}?>]<?php }?></textarea>
            </div>
            <div class="col-sm-2">
                <label class="exampleInputEmail1">VEHICLE NUMBER:</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="vehicleno" class="form-control cleardata" value="<?=$sales->sales_order_master_veh_no?>"/>
            </div>
        </div>
        <div class="col-sm-12" style="margin-top: 20px;">

            <div class="col-sm-2">
                <label class="exampleInputEmail1">OUT STANDING</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="outstanding" id="outstanding" class="form-control cleardata"  value="<?=$sales->sales_order_master_outstanding?>"/>
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
                    value="1" <?php if($sales->sales_order_master_payment_mode == 1) echo "checked";?>>
                <label class="custom-control-label" for="defaultChecked">BANK TRANSFER</label>
                <input type="radio" class="custom-control-input chquecheck cleardata" id="defaultChecked" name="paymod1"
                    value="2" <?php if($sales->sales_order_master_payment_mode == 2) echo "checked";?>>
                <label class="custom-control-label" for="defaultChecked">CHEQUE</label>
                <input type="radio" class="custom-control-input emicheck cleardata" id="defaultChecked " name="paymod1"
                    value="3" <?php if($sales->sales_order_master_payment_mode == 3) echo "checked";?>>
                <label class="custom-control-label" for="defaultChecked">EMI</label>
                <input type="radio" class="custom-control-input bothcheck cleardata" id="defaultChecked " name="paymod1"
                    value="4" <?php if($sales->sales_order_master_payment_mode == 4) echo "checked";?>>
                <label class="custom-control-label" for="defaultChecked">BOTH</label>
                <input type="radio" class="custom-control-input bankcheck cleardata" id="defaultChecked " name="paymod1"
                    value="5" <?php if($sales->sales_order_master_payment_mode == 5) echo "checked";?>>
                <label class="custom-control-label" for="defaultChecked">BANK</label>
                <input type="radio" class="custom-control-input cashcheck cleardata" id="defaultChecked" name="paymod1"
                    value="6" <?php if($sales->sales_order_master_payment_mode == 6) echo "checked";?>>
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
                    style="display: none;"  value="<?=$sales->sales_order_master_cardnum?>"/>
                <input type="text" name="chequenum" class="form-control saleschequenumber cleardata"
                    style="margin-top:10px;display: none;"  value="<?=$sales->sales_order_master_cheque_no?>"/>
                <input type="text" name="transcheque" class="form-control salestranscheque cleardata"
                    style="margin-top:10px;display: none;"  value="<?=$sales->sales_order_master_banktransaction_id?>"/>
                    
                 <?php if($sales->sales_order_master_payment_mode == 4 || $sales->sales_order_master_payment_mode==5){?>
                    <input type="text" name="bankamount" class="form-control bankamount cleardata"
                    style="margin-top:10px;"  value="<?=$sales->sales_order_master_bankamount?>"/>
                    <?php } ?>

                <select name="bank" class="form-control bank cleardata" style="margin-top:10px;display: none;">
                    <option value="0"></option>
                    <?php foreach($bank as $key1){
											?>
                    <option value="<?php echo $key1->bank_id;?>" <?php if($key1->bank_id ==$sales->sales_order_master_bank) echo "selected";?>><?php echo $key1->bank_name;?></option>
                    <?php 
										}?>
                </select>
                <select name="finance" class="form-control finance cleardata" style="margin-top:10px;display: none;">
                    <option value="0"></option>
                    <option value="1" <?php if($sales->sales_order_master_financetype == 1) echo "selected";?>>BAJAJ finance</option>
                    <option value="2" <?php if($sales->sales_order_master_financetype == 2) echo "selected";?>>HDFC finance</option>
                    <option value="3" <?php if($sales->sales_order_master_financetype == 3) echo "selected";?>>HDB finance</option>
                </select>
            </div>
            <div class="col-sm-2">
                <label class="exampleInputEmail1" style="margin-top:10px;">AMOUNT</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="paidamount" id="paidamount" class="form-control cleardata"
                    style="margin-top:10px;" value="<?=$sales->sales_order_master_amount_paid?>"/>
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
                value="<?=$sales->sales_order_master_delivery_charge?>"/>
            </div>


            <div class="col-sm-2">
                <label class="exampleInputEmail1">TOTAL TAXABLE AMOUNT</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="totalTaxableAmount" id="totalTaxableAmount" class="form-control cleardata" 
                value="<?=$sales->sales_order_master_tot_taxable_amount?>"/>
            </div>
        </div>




        <div class="col-sm-12">
            <div class="col-sm-2">
                <label class="exampleInputEmail1">DISCOUNT</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="discount" id="discount" class="form-control cleardata"  value="<?=$sales->sales_order_master_discount?>"/>
            </div>
            <div class="col-sm-2">
                <label class="exampleInputEmail1">GST AMOUNT</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="amountGst" id="amountGst" class="form-control cleardata"  value="<?=$sales->sales_order_master_tot_gst_amount?>"/>
            </div>

        </div>
    
        <div class="col-sm-12" style="margin-top: 10px;">
            <div class="col-sm-6"></div>
            <div class="col-sm-2">
                <label class="exampleInputEmail1">ROUND OFF</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="roundOfValuue" id="roundOfValuue" class="form-control cleardata"  value="<?=$sales->sales_order_master_round_off?>"/>
            </div>

        </div>
        <div class="col-sm-12" style="margin-top: 10px;">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-2">
                <label class="exampleInputEmail1">GRAND TOTAL</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="grandTotal" id="grandTotal" class="form-control cleardata"  value="<?=$sales->sales_order_master_grand_total?>"/>
            </div>
        </div>
        <!---->
    </div>
</div>
<div class="col-sm-12" style="margin-top: 20px;">
    <div class="col-sm-6">
        
    </div>
    <div class="col-sm-6">
      
      
        <div class="col-sm-2" style="margin-left:10px;">
            <button type="button" class="btn btn-sm" data-dismiss="modal">CLOSE</button>
        </div>
        <?php if($sales->sales_created == 0){?>
            <div class="col-sm-2" style="margin-left:10px;">
            <button type="submit" name="submit_cancel" class="btn btn-sm btn-danger" style="margin-left: -21px;" >CANCEL THIS ORDER</button>
        </div>
      
       
        <div class="col-sm-3" style="margin-left:10px;">
        <button type="submit" name="submit_convert" class="btn btn-success btn-sm" id="converttosale" onclick="confirmcovertion();">CONVERT TO SALES</button>
        <?php }else if($sales->sales_created == 0 || $sales->sales_created == 3) {?>
            <button type="submit" name="submit_convert" class="btn btn-success btn-sm" id="converttosale" onclick="confirmcovertion();">CONVERT TO SALES</button>
        <?php }else if($sales->sales_created == 1){?>
            <button type="button" class="btn btn-info btn-sm ">SALE ALREADY CONVERTED</button>
        <?php }?>
        </div>
        

    </div>
 


</div>


<div class="modal-footer">
    
</div>

</form>
<script>
function confirmcovertion()
{
    var r = confirm("Are you sure to Convert");
 if (r == true) {
    document.getElementById("editform").submit();
  } else {
    return false;
  }
}


</script>
