<style>
	input[type=radio] {
    width: 17px;
    height: 17px;
}
.exampleInputEmail1{
	font-size: 10px;
}
.titleName{
	min-width: 180px;
}
.namelist .table-hover>tbody>tr:hover {
    background-color: #3c8dbc;
    color: white;
    border-bottom: 1px;
}
#estimate1{
	border:1px solid #d32f2f;
	width:100px;
	background-color:#d32f2f;
}
#demobill1{
	border:1px solid #ffeb3b;
	width:100px;
	background-color:#ffeb3b;
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

		<h1 align="center">Purchase Edit<small>Preview</small></h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">Purchase Edit</a></li>

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

                    <form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('AdminController/purchaseeditnew1');?>">
				

<div class="col-sm-12" style="margin-top:10px;">
    <!-- <div class="col-sm-1">
        <label class="exampleInputEmail1">VOUCHER NO:</label>
    </div> -->
    <!-- <div class="col-sm-2"> -->
   
        <!-- <input type="text" name="billno" class="form-control"
            value="<?=$purchasedetails->purchase_master_billno ?>" /> -->
    <!-- </div> -->
    <input type="hidden" id="purchase_master_id" name="purchase_master_id"
                            value="<?php echo $purchasedetails->purchase_master_id;?>" />
    <div class="col-sm-1">
        <label class="exampleInputEmail1">BILL DATE:</label>
    </div>

    <div class="col-sm-2">
        <input type="date" name="billdate" id="billdate" class="form-control" value="<?php echo date('Y-m-d', strtotime($purchasedetails->purchase_master_billdate));?>" /> 
    </div>


    <div class="col-sm-1">
        <label class="exampleInputEmail1">SUPLIER:</label>
    </div>
    <div class="col-sm-2">
        <select name="supplier" id="supplierselect" class="form-control" required>
            <?php foreach($supplier as $sinle){ ?>
            <option value="<?php echo $sinle->sup_id;?>" <?php if($sinle->sup_id==$purchasedetails->purchase_master_supplier){echo 'selected';}?>><?php echo $sinle->sup_name;?></option>
            <?php } ?>

        </select>
    </div>
    <div class="col-sm-1">
        <label class="exampleInputEmail1">TAX TYPE</label>
    </div>
    <div class="col-sm-2">
        <select name="taxtype" class="form-control" id="taxtype">
            <option value="1" <?php if($purchasedetails->purchase_master_tax_type == '1') echo "selected";?>>SGST & CGST</option>
            <option value="2" <?php if($purchasedetails->purchase_master_tax_type == '2') echo "selected";?>>IGST</option>
        </select>
    </div>



</div>
<div class="col-sm-12" style="margin-top: 20px;">
    <div class="col-sm-1">
        <label class="exampleInputEmail1">REF NO:</label>
    </div>
    <div class="col-sm-2">
        <input type="text" name="refno" id="referno" class="form-control refnum" value="<?=$purchasedetails->purchase_master_ref_no ?>"/>
    </div>

    <div class="col-sm-1">
								<label class="exampleInputEmail1">Invoice No</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="invoiceno"  class="form-control cleardata1" value="<?=$purchasedetails->invoiceno; ?>" />
							</div>
	<div class="col-sm-4" style="display:none;" id="demo1">
								
								<span id="estimate1"><input  type="radio" name="esdemo" value="1" id="est_value1" class="refnumbill1 cleardata1"></span>
								<span id="demobill1"><input type="radio" name="esdemo" value="2" class="refnumbill" id="demo_value1 cleardata1"></span>
								<button type="button" class="btn btn-sm btn-success" id="reset1"><i class="fa fa-refresh"></i></button>
							</div>
</div>


<div class="col-sm-12" style="margin-top: 20px;">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">SL No</th>
                <th scope="col">CODE</th>
                <th scope="col">ITEM NAME</th>
                <th scope="col">BATCH CODE</th>
                <th scope="col">HSN CODE</th>
                <!-- <th scope="col">UOM</th> -->
                <th scope="col">RATE</th>
                <th scope="col">QTY</th>
                <th scope="col">DISCOUNT TYPE</th>
                <th scope="col">DISCOUNT</th>

                <th scope="col">TAX</th>
                <th scope="col">SELLING RATE</th>
                <th scope="col">AMOUNT</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody id="sales_contedit">
        <?php 
            $count=1;
            foreach($purchase_itemlist as $item){?>
                <tr id="detailRow_<?=$count?>"  data-row='<?=$count?>'>
                    <th scope="row" class="slno_edit"><?=$count?></th>

                    <td>
                    <input type="hidden"  class="form-control" id="itemtrans_edit_<?=$count?>" data-order="<?=$count?>"
                            style="width:70px;" value="<?=$item->purchase_trans_id;?>" >
                        <input type="hidden" name="itemid[]" class="form-control itemid_edit" id="itemtbid_edit_<?=$count?>" data-order="<?=$count?>"
                            style="width:70px;" value="<?= $item->purchase_item_id;?>" >
                        <input type="hidden" name="hsn_tax[]" class="hsn_tax" id="hsn_tax_edit_<?=$count?>" data-order="<?=$count?>" value="<?=$item->hsn_tax;?>">
                        <input type="hidden" name="discount_type[]" class="discount_type" id="discount_type_<?=$count?>" data-order="<?=$count?>" value="<?= $item->purchase_trans_discount_type;?>">
                        <input type="hidden" name="oldstockqty[]" class="oldstockqty" id="oldstockqty_<?=$count?>" data-order="<?=$count?>" value="<?= $item->purchase_trans_qty;?>">
                        <input type="text" name="itemcode[]" disabled class="form-control codeItem_edit" id="code_<?=$count?>" data-order="<?=$count?>"
                            style="width:70px;" value="<?= $item->purchase_trans_item_code;?>">
                        <div id="code_list_<?=$count?>" style="position: absolute;z-index: 99;"></div>
                    </td>
                    <td><input type="text" disabled name="itemname[]"  class="form-control nameItem_edit" id="itemname_edit_<?=$count?>" data-order="<?=$count?>"
                            style="width:140px;"  value="<?= $item->itm_name;?>" data-value="<?= $item->itm_name;?>">
                        <div id="name_list_edit_<?=$count?>" class="namelist" style="position: absolute;z-index: 99;"></div>
                    </td>
                    <td>
                    <?php
                    $batchList = $this->Admin_model->get_batchoption($item->purchase_item_id); 
                    ?>
						<select style="width:100px;" name="itembatchid[]" disabled class="form-control itemBatch_edit" id="itembatchid_edit_<?=$count?>" placeholder="Batch" data-order="<?=$count?>" >
							<option value="">Select Batch</option>
                            <?php
                            $selected="";
                            foreach($batchList as $batch){
                                $selected = $batch->batch_id == $item->purchase_item_batch_id ? "selected":'';
                                echo "<option value='".$batch->batch_id."' ".$selected.">".$batch->batchcode."(".$batch->cur_stock_item_count.")</option>";
                            }
                            ?>
						</select>
					</td>
                    <td><input type="text" name="hsncode[]" readonly class="form-control hsncode" id="hsncode_<?=$count?>" data-order="<?=$count?>"
                            style="width:60px;" value="<?= $item->purchase_trans_hsncode;?>"  data-value="<?= $item->purchase_trans_hsncode;?>">
                        <input type="hidden" name="itemitemtbid[]" class="form-control itemitemtbid" id="itemtbid_<?=$count?>"
                            data-value="<?= $item->purchase_trans_hsncode;?>" data-order="<?=$count?>" value="<?= $item->purchase_item_id;?>">
                    </td>
                    <!-- <td><input type="text" name="uom[]" class="form-control uom" style="width:50px;"  id="uom_1" data-order="1" ></td> -->
                    <td><input type="text" name="rate[]" readonly class="form-control rate_edit" id="rate_edit_<?=$count?>" data-value="<?= $item->purchase_trans_rate;?>" data-order="<?=$count?>" value="<?= $item->purchase_trans_rate;?>">
                    </td>
                    <td><input step=".01"  type="text" min="0"  name="quantity[]" class="form-control quantity_edit" style="width:50px;" data-value="<?= $item->purchase_trans_qty;?>"
                            id="quantity_edit_<?=$count?>" data-order="<?=$count?>" value="<?= $item->purchase_trans_qty;?>"></td>
                    <td>
                        <div class="radio" style="margin-top: 0;">
                            <label><input type="radio" name="optradio_edit<?=$count?>" value="percent" <?php if($item->purchase_trans_discount_type == 'percent') echo 'checked';?>
                                    onclick="calcamount();">%</label>
                            <label><input type="radio" name="optradio_edit<?=$count?>" value="cash" onclick="calcamount();" <?php if($item->purchase_trans_discount_type == 'cash') echo 'checked';?>>₹</label>
                        </div>

                    </td>
                    <td>
                        <input type="text" name="discount[]" class="form-control discount_edit" id="discount_edit_<?=$count?>" data-value="<?= $item->purchase_trans_discount_id;?>"
                            data-order="<?=$count?>" required value="<?= $item->purchase_trans_discount_id;?>">
                    </td>
                    <td><input type="text" name="tax[]" class="form-control tax_edit" readonly id="tax_edit_<?=$count?>" data-value="<?= $item->purchase_trans_tax;?>" data-order="<?=$count?>"
                            required value="<?= $item->purchase_trans_tax;?>"></td>
                    <td><input type="text" readonly  name="sellingrate[]" class="form-control sellingrate_edit" id="sellingrate_edit_<?=$count?>"
                            data-value="<?= $item->purchase_trans_selling_rate;?>" data-order="<?=$count?>" required value="<?= $item->purchase_trans_selling_rate;?>"></td>
                    <td><input type="text" readonly  name="itemtotalamount[]" class="form-control totalAmount_edit" id="totalAmount_edit_<?=$count?>"
                            data-value="<?= $item->purchase_trans_tot_amount;?>" data-order="<?=$count?>" required value="<?= $item->purchase_trans_tot_amount;?>"></td>
                    <td>
                      
                          <!-- <a href="#" class="editrowpurchase" data-row="<?=$count?>"><i class="fa fa-floppy-o"></i></a> -->
                        <i class="fa fa-trash detailDeleteRow1" onclick="deletechecked()" data-row="<?=$count?>" aria-hidden="true"
                            style="font-size:15px;margin-top: 10px;cursor:pointer"></i>
                    </td>
                </tr>
        <?php 
            $count++;
            }?>
        </tbody>
       
    </table> 
    <button type="button" id="BtnNewRowEdit" data-order="<?=count($purchase_itemlist)?>"
                        class="btn btn-info btn-sm">ADD</button>
</div>
<div class="col-sm-12" style="margin-top: 20px;">
    <div class="col-sm-6">
        <div class="col-sm-12">
            <div class="col-sm-2">
                <label class="exampleInputEmail1">NOTES</label>
            </div>
            <div class="col-sm-4">
                <textarea name="note" class="form-control" id="note"><?=$purchasedetails->purchase_master_notes ?></textarea>
            </div>
            <div class="col-sm-2">
                <label class="exampleInputEmail1">GOOD RECEIPT NOTE NO</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="goodreceipt"  id="goodreceipt" class="form-control"  value="<?=$purchasedetails->purchase_master_goods_receipt_noteno ?>"/>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-2">
                <label class="exampleInputEmail1">PAYMENT MODE</label>
            </div>
            <div class="col-sm-10">

                <input type="radio" class="custom-control-input cashcheck" id="defaultChecked"
                    name="defaultExampleRadios" value="6" <?php if($purchasedetails->purchase_master_payment_mode == '6') echo "checked";?>>
                <label class="custom-control-label" for="defaultChecked">CASH</label>

                <input type="radio" class="custom-control-input cashcheck" id="defaultChecked"
                    name="defaultExampleRadios" value="7"  <?php if($purchasedetails->purchase_master_payment_mode == '7') echo "checked";?>>
                <label class="custom-control-label" for="defaultChecked">CREDIT</label>

            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-2">
                <label class="exampleInputEmail1">AMOUNT</label>
            </div>
            <div class="col-sm-4"><input type="text" id="amount" name="amount" class="form-control" value="<?=$purchasedetails->purchase_master_grandtotal ?>"></div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="col-sm-12">
            <div class="col-sm-2">
                <label class="exampleInputEmail1">TOTAL QUANTITY</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="totalqnty" readonly  id="totalqnty_edit" class="form-control" value="<?=$purchasedetails->purchase_master_tot_quantity ?>"/>
            </div>
            <div class="col-sm-2">
                <label class="exampleInputEmail1">TAXABLE VALUE</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="totalTaxableAmount" readonly  id="totalTaxableAmount_edit" class="form-control" value="<?=$purchasedetails->purchase_master_taxable_value ?>"/>
            </div>

        </div>
        <div class="col-sm-12">


        </div>
        <div class="col-sm-12">
            <div class="col-sm-2">
                <label class="exampleInputEmail1">EXTRA DISCOUNT</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="extradiscount" id="extradiscount_edit" class="form-control" value="<?=$purchasedetails->purchase_master_extra_discount ?>"/>
            </div>

            <div class="col-sm-2">
                <label class="exampleInputEmail1">TAX</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="totaltax" readonly id="totaltax_edit" class="form-control" value="<?=$purchasedetails->purchase_master_tax ?>"/>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-2">
                <label class="exampleInputEmail1">OTHER CHARGES</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="othercharges" id="othercharge_edit" class="form-control" value="<?=$purchasedetails->purchase_master_othercharges ?>"/>
            </div>

            <div class="col-sm-2">
                <label class="exampleInputEmail1">DISCOUNT</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="totaldiscount" readonly id="discount_edit" class="form-control" value="<?=$purchasedetails->purchase_master_discount ?>"/>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-6"></div>
            <div class="col-sm-2">
                <label class="exampleInputEmail1">ROUND OFF</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="roundoff" readonly  id="roundoff_edit" class="form-control" value="<?=$purchasedetails->purchase_master_roundoff ?>"/>
            </div>
        </div>
        <div class="col-sm-12" style="margin-top:10px;">

            <div class="col-sm-6"></div>
            <div class="col-sm-2">
                <label class="exampleInputEmail1">GRAND TOTAL</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="grandTotal" readonly id="grandTotal_edit" class="form-control" value="<?=$purchasedetails->purchase_master_grandtotal ?>"/>
            </div>
        </div>
    </div>


</div>


<div class="col-sm-12 action-btns" style="margin-top: 20px;">

    <div class="col-sm-2">
        <button type="button" class="btn btn-primary btn-sm">ITEM CREATION</button>
    </div>

    <div class="col-sm-1">
        <button type="submit" name="submit" class="btn btn-success btn-sm">SAVE</button>
    </div>
    <!-- <div class="col-sm-2">
        <button type="button" id="savechanges" class="btn btn-info btn-sm">SAVE </button>
    </div> -->
    <div class="col-sm-1">
        <button type="submit"  class="btn btn-info btn-sm">ADD ON </button>
    </div>
    <div class="col-sm-1">
        <button type="button" class="btn btn-secondary btn-sm">VIEW</button>
    </div>
    
    <div class="col-sm-1">
        <button type="button" class="btn btn-danger btn-sm">DELETE</button>
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

    if (confirm("Do you really want to delete this item?")) {

        $('#sales_contedit').on('click','.detailDeleteRow1',function(){
    
    var rowNumber = $(this).data('row');
    var batchid=$('#itembatchid_edit_'+rowNumber).val();
    var qantity=$('#quantity_edit_'+rowNumber).val();
    var oldqty=$('#oldstockqty_'+rowNumber).val();
    var itemid=$('#itemtbid_edit_'+rowNumber).val();
    var transid=$('#itemtrans_edit_'+rowNumber).val();
   
  
    $.ajax({
          type: "POST",
          url: '<?php echo site_url('AdminController/getrowtranseditdelete');?>',
          data: {
              transid: transid,qantity:qantity,itemid:itemid,batchid:batchid
          },
          success: function(res) {

              $('#detailRow_'+rowNumber).remove();
                      var rowStart = 1;
                  $('.slno_edit').each(function(){
                      $(this).html(rowStart);
                      rowStart++;
                  });

                  calcamount();

                  var amount=$('#amount').val();

                  var totalqnty_edit=$('#totalqnty_edit').val();
                  var extradiscount_edit=$('#extradiscount_edit').val();
                  var othercharge_edit=$('#othercharge_edit').val();
                  var totalTaxableAmount_edit=$('#totalTaxableAmount_edit').val();
                  var totaltax_edit=$('#totaltax_edit').val();
                  var discount_edit=$('#discount_edit').val();
                  var roundoff_edit=$('#roundoff_edit').val();
                  var grandTotal_edit=$('#grandTotal_edit').val();
                  var mid=$('#purchase_master_id').val();
          
                          $.ajax({
                          type: "POST",
                          url: '<?php echo site_url('AdminController/getrowtranseditdeleteupdate');?>',
                          data: {
                              amount:amount,totalqnty_edit:totalqnty_edit,extradiscount_edit:extradiscount_edit,
                              othercharge_edit:othercharge_edit,totalTaxableAmount_edit:totalTaxableAmount_edit,totaltax_edit:totaltax_edit,
                              discount_edit:discount_edit,roundoff_edit:roundoff_edit,grandTotal_edit:grandTotal_edit,mid:mid
                          },
                          success: function(res) {
                          
                              location.reload();	
                          },
              });
          },
});

     
});

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
 
  
  function calcamount(){

     var totalTaxableAmount = 0;
     var totalcessAmount = 0;
     var totalgstAmount = 0;
     var grandTotal = 0;
     var quantity = 0;
     var discount = 0;
     var roundoff = 0;
     var tax = 0;
     var othercharge = 0;
     var extradiscount = 0;
     if($('#discount_edit').val()!=''){
         discount = $('#discount_edit').val();
     }
     if($('#extradiscount_edit').val()!=''){
         extradiscount = $('#extradiscount_edit').val();
     }
     if($('#othercharge_edit').val()!=''){
		othercharge = $('#othercharge_edit').val();
       
     }
     /*$('.tax').each(function( index ) {
        if($(this).val() !=''){
            totalTaxableAmount=totalTaxableAmount+parseFloat($(this).val());
        }
     });*/

	 //Calculate totaltaxable amount (Subtotal excluding tax)
	 var qty = 0;
	 $('.rate_edit').each(function( index ) {
        if($(this).val() !=''){
			var order = $(this).data('order');
			qty = $('#quantity_edit_'+order).val();
            totalTaxableAmount = totalTaxableAmount+parseFloat($(this).val()*qty);
        }
     });
	 
     $('#totalTaxableAmount_edit').val(totalTaxableAmount.toFixed(2));

	 //Update total discount value
	 var discount_applied = 0;
	 var discount = 0;
	 var qnty = 0;
	 var subtotal = 0;
	 $('.discount_edit').each(function( index ) {

        if($(this).val() !=''){
			
			var order 	= 	$(this).data('order');
			qnty 		= 	$('#quantity_edit_'+order).val();
			discount 	=	$(this).val();

			var radioValue = $("input[name='optradio_edit"+order+"']:checked").val();
            $('#discount_type_'+order).val(radioValue);console.log(order);
			if(radioValue == 'percent'){

				//calculate discount %wise of subtotal (totalAmount) -Niby
				subtotal 			= parseFloat($('#rate_edit_'+order).val()*qnty)+parseFloat($('#tax_edit_'+order).val()); 
				
				discount_applied 	= parseFloat(discount_applied) + (parseFloat(subtotal) * parseFloat(discount)|| 0 ) /100;
				console.log((parseFloat(subtotal) * parseFloat(discount)|| 0 ) /100);console.log(subtotal);
			}
			else if(radioValue == 'cash'){//console.log('cash>>');
				console.log((parseFloat(discount)|| 0));
				discount_applied = parseFloat(discount_applied) + (parseFloat(discount)|| 0);//console.log(discount_applied);
				//console.log('discount_applied>>');console.log(discount_applied);
			}
        }
     });
	 $('#discount_edit').val(parseFloat(discount_applied).toFixed(2));


     $('.quantity_edit').each(function( index ) {
         if($(this).val() !=''){
            quantity=quantity+parseFloat($(this).val());
         }
     });
     $('#totalqnty_edit').val(quantity);
     $('.tax_edit').each(function( index ) {
         if($(this).val() !=''){
            tax=tax+parseFloat($(this).val());
         }
     });
     $('#totaltax_edit').val(tax.toFixed(2));
     $('.totalAmount_edit').each(function( index ) {
         if($(this).val() !=''){
            grandTotal=grandTotal+parseInt($(this).val());
         }
     });
     //alert(grandTotal);
   //  grandTotal = grandTotal-discount-extradiscount+parseFloat(othercharge);
     //alert(othercharge);
     $('#grandTotal_edit').val(Math.round(parseFloat(grandTotal)-parseFloat(discount_applied)-parseFloat(extradiscount)+parseFloat(othercharge)));
     $('#roundoff').val((grandTotal%1).toFixed(2));


  }//calcamount end
  
  function autosave(id){
   
 var mid=$('#purchase_master_id').val();
 var tid=$('#itemtrans_edit_'+id).val();
 var code=$('#code_'+id).val();
 var hsncode=$('#hsncode_'+id).val();
 var rate=$('#rate_edit_'+id).val();
 var qty=$('#quantity_edit_'+id).val();
 var dtype=$('#discount_type_'+id).val();
 var discount=$('#discount_edit_'+id).val();
 var tax=$('#tax_edit_'+id).val();
 var srate=$('#sellingrate_edit_'+id).val();
 var total=$('#totalAmount_edit_'+id).val();
 var item=$('#itemtbid_edit_'+id).val();
 var batch=$('#itembatchid_edit_'+id).val();
var oqty=$('#oldstockqty_'+id).val();
 var amount=$('#amount').val();

var totalqnty_edit=$('#totalqnty_edit').val();
var extradiscount_edit=$('#extradiscount_edit').val();
var othercharge_edit=$('#othercharge_edit').val();
var totalTaxableAmount_edit=$('#totalTaxableAmount_edit').val();
var totaltax_edit=$('#totaltax_edit').val();
var discount_edit=$('#discount_edit').val();
var roundoff_edit=$('#roundoff_edit').val();
var grandTotal_edit=$('#grandTotal_edit').val();

 //alert(tid);
 $.ajax({
			type: "POST",
			url: '<?php echo site_url('AdminController/getrowtransedit');?>',
			data: {
				id: id,tid:tid,code:code,hsncode:hsncode,rate:rate,qty:qty,dtype:dtype,discount:discount,tax:tax,
                srate:srate,total:total,item:item,batch:batch, amount:amount,totalqnty_edit:totalqnty_edit,extradiscount_edit:extradiscount_edit,
                othercharge_edit:othercharge_edit,totalTaxableAmount_edit:totalTaxableAmount_edit,totaltax_edit:totaltax_edit,
                discount_edit:discount_edit,roundoff_edit:roundoff_edit,grandTotal_edit:grandTotal_edit,oqty:oqty,mid:mid
			},
			success: function(res) {
			
                location.reload();	
			},
});

  }


   $('#BtnNewRowEdit').on('click',function(){
       //alert();
      var rowStart = 1;
      $('.slno_edit').each(function () {
				$(this).html(rowStart);
				rowStart = rowStart + 1;
	  });
	  $newrow=$('#BtnNewRowEdit').data('order')+1;
	  $('#BtnNewRowEdit').data('order', $newrow);
      current_row = parseInt($("#sales_contedit tr").last().attr("data-row")) + 1;
      //var current_row = $newrow;

      var new_row = '<tr id="detailRow_'+rowStart+'" data-row="'+rowStart+'"> <th scope="row" class="slno_edit">'+rowStart+'</th>';
	  new_row+= '<td><input type="hidden" name="itemid1[]" class="form-control itemid_edit" id="itemtbid_edit_'+rowStart+'" data-order="'+rowStart+'" style="width:70px;" > <input required type="text" name="itemcode1[]" class="form-control codeItem_edit" id="code_'+rowStart+'" data-order="'+rowStart+'" style="width:70px;"><div id="code_list_'+rowStart+'"></div></td>';
      new_row+= '<td><input required type="text" name="itemname1[]" class="form-control nameItem_edit" id="itemname_edit_'+rowStart+'" data-order="'+rowStart+'" style="width:140px;"><div id="name_list_edit_'+rowStart+'"  class="namelist"></div></td>';
      new_row+= '<td><select name="itembatchid1[]" class="form-control itemBatch_edit" id="itembatchid_edit_'+rowStart+'" data-order="'+rowStart+'" placeholder="Batch"><option value="">Select Batch</option></select></td>';
      new_row+= '<td><input required type="text" name="hsncode1[]" class="form-control name="hsncode" id="hsncode_'+rowStart+'" data-order="'+rowStart+'" style="width:60px;"><input type="hidden" name="itemitemtbid1[]" class="form-control itemitemtbid" id="itemtbid_'+rowStart+'" data-value="" data-order="'+rowStart+'" ><div id="batch_list_'+rowStart+'"></div></td>';
      //new_row+= '<td><input required type="text" name="uom[]" class="form-control uom" id="uom_'+current_row+'" data-order="'+current_row+'" style="width:50px;"></td>';
      new_row+= '<td><input required type="text" name="rate1[]" class="form-control rate_edit" id="rate_edit_'+rowStart+'" data-value="" data-order="'+rowStart+'"></td>';
      new_row+= '<td><input type="hidden" name="oldstockqty1[]" class="oldstockqty" id="oldstockqty_'+rowStart+'" data-order="'+rowStart+'" value="0"><input required step=".01"  type="text" min="0"  name="quantity1[]" class="form-control quantity_edit" id="quantity_edit_'+rowStart+'" style="width:50px;" data-order="'+rowStart+'" required></td>';
     
	  new_row+=  '<td ><input type="hidden" name="discount_type1[]" class="discount_type" id="discount_type_'+rowStart+'" data-order="'+rowStart+'" value="percent"><div class="radio" style="margin-top: 0;"><label><input type="radio"  name="optradio_edit1'+rowStart+'" value="percent" checked  onclick="calcamount();">%</label> <label><input type="radio" name="optradio_edit1'+rowStart+'" value="cash"  onclick="calcamount();">₹</label></div></td>';
	  
	  
      new_row+= '<td><input required type="text" name="discount1[]" class="form-control discount_edit" id="discount_edit_'+rowStart+'" data-value="" data-order="'+rowStart+'"></td>';
      new_row+= '<td><input readonly type="hidden" name="hsn_tax1[]" class="hsn_tax" id="hsn_tax_edit_'+rowStart+'" data-order="'+rowStart+'" value=""><input required readonly  type="text" name="tax1[]" class="form-control tax_edit" id="tax_edit_'+rowStart+'" data-value=""  data-order="'+rowStart+'"></td>';
      new_row+= '<td><input readonly required type="text" name="sellingrate1[]" class="form-control sellingrate_edit" id="sellingrate_edit_'+rowStart+'" data-value="" data-order="'+rowStart+'"></td>';
      new_row+= '<td><input readonly required type="text" name="itemtotalamount1[]" class="form-control totalAmount_edit" id="totalAmount_edit_'+rowStart+'" data-value="" data-order="'+rowStart+'"></td>';
      new_row+= '<td>';
     
     
      new_row+= '<i data-row="'+rowStart+'" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
      new_row+= '</td></tr>';
      
      $('#sales_contedit').append(new_row);
      //console.log(current_row);
      $('#BtnNewRowEdit').data('order',rowStart); 
      
  })
  
  $('#sales_contedit').on('click','.detailDeleteRow',function(){
      var rowNumber = $(this).data('row');
      var batchid=$('#itembatchid_edit_'+rowNumber).val();
      var qantity=$('#quantity_edit_'+rowNumber).val();
      var oldqty=$('#oldstockqty_'+rowNumber).val();
      var itemid=$('#itemtbid_edit_'+rowNumber).val();
      var transid=$('#itemtrans_edit_'+rowNumber).val();
    
    

        $('#detailRow_'+rowNumber).remove();
                        var rowStart = 1;
                    $('.slno_edit').each(function(){
                        $(this).html(rowStart);
                        rowStart++;
                    });

       calcamount();
  })
  
  $('#sales_contedit').on('click','.detailEraseRow',function(){
      var rowNumber = $(this).data('row');
       $('#detailRow_'+rowNumber+' select').prop('selectedIndex',0);
       $('#detailRow_'+rowNumber+' input[type=hidden]').val('');
	   $('#detailRow_'+rowNumber+' input[type=text]').val('');
       calcamount();
  })
  $('#othercharge_edit').on('keyup',function(){
     
      calcamount();
  });
  $('#sales_contedit').on('keyup','.codeItem_edit',function(){
      var rowOrder = $(this).data('order');
      var itemCode = $(this).val();
      if(itemCode != '' && itemCode != 0)
      {
      	$.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/searchItemList');?>',
			data: { itemCode : itemCode, rowOrder:rowOrder},
				success:function(res){//console.log(res);
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
  
   $('#sales_contedit').on('keyup','.nameItem_edit',function(){
      var rowOrder = $(this).data('order');
      var itemName = $(this).val();
      if(itemName != '' && itemName != 0)
      {
      	$.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/searchItemNameList');?>',
			data: { itemName : itemName, rowOrder:rowOrder},
				success:function(res){//console.log(res);
					if(res){
						$('#name_list_edit_'+rowOrder).show();
						$('#name_list_edit_'+rowOrder).html(res);
					}else{
						$('#name_list_edit_'+rowOrder).html("");
					}
				},
		});	
      }
	  else{
			$('#name_list_edit_' + rowOrder).html("");
	  }
  })
  $('#sales_contedit').on('click','.subSelect_itemedit',function(){
     var id = $(this).data('id');
     var itemValue = $(this).data('value');
     $('#code_list_'+id).hide();
	 $('#name_list_edit_'+id).hide();
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
					
					$('#sales_contedit #itembatchid_edit_'+id).html(optiondata);
					$('#code_'+id).val(batchlist[0].itm_code);
			        $('#itemname_edit_'+id).val(batchlist[0].itm_name);
                
                    $('#itemtbid_edit_'+id).val(batchlist[0].item_id);
				}
     })
  })
  //$('#sales_contedit').on('click','.subSelect_itemedit',function(){
  $('#sales_contedit').on('change','.itemBatch_edit',function(){  
     var id = $(this).data('order');
     var itemValue = $(this).val();
     if ($("#demo_value1").prop("checked")) {
		var demo=$('#demo_value1').val();
		}else if($("#est_value1").prop("checked")){
			var demo=$('#est_value1').val();
		}
       // alert(demo);
       if(demo==1){
        $.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/getItemBatchDetails');?>',
			data: { itemValue : itemValue},
				success:function(res){//console.log(res);
				    $('#code_list_'+id).hide();
				    $('#name_list_edit_'+id).hide();
				    var obj = JSON.parse(res);
				    $('#itemtbid_'+id).val(obj.item_id);
				    // $('#code_'+id).val(obj.itm_code);
			        // $('#itemname_edit_'+id).val(obj.itm_name);
			        $('#hsncode_'+id).val(obj.hsn_code);
                    $('#hsn_tax_edit_'+id).val(obj.hsn_tax);
			        //$('#uom_'+id).val(obj.item_uom);
			        $('#quantity_edit_'+id).val(1);

			        $('#rate_edit_'+id).val(obj.e_pr);
			        $('#rate_edit_'+id).attr('data-value',obj.e_pr);
			        $('#sellingrate_edit_'+id).val(obj.e_sr);
			        $('#sellingrate_edit_'+id).attr('data-value',obj.e_sr);
			        var tax = ((obj.e_pr*obj.hsn_tax)/100).toFixed(2);
				    $('#tax_edit_'+id).val(tax);
				    $('#tax_edit_'+id).attr('data-value',tax);
				    $('#tax_edit_'+id).attr('data-tax',obj.hsn_tax);
				    var total = parseFloat(tax)+parseFloat(obj.e_pr);
                    $('#discount_edit_'+id).val(0);
				    $('#totalAmount_edit_'+id).val(total.toFixed(2));
				    $('#totalAmount_edit_'+id).attr('data-value',total);
				    calcamount();
				}
     })
       }else if(demo==2){
        $.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/getItemBatchDetails');?>',
			data: { itemValue : itemValue},
				success:function(res){//console.log(res);
				    $('#code_list_'+id).hide();
				    $('#name_list_edit_'+id).hide();
				    var obj = JSON.parse(res);
				    $('#itemtbid_'+id).val(obj.item_id);
				    // $('#code_'+id).val(obj.itm_code);
			        // $('#itemname_edit_'+id).val(obj.itm_name);
			        $('#hsncode_'+id).val(obj.hsn_code);
                    $('#hsn_tax_edit_'+id).val(obj.hsn_tax);
			        //$('#uom_'+id).val(obj.item_uom);
			        $('#quantity_edit_'+id).val(1);

			        $('#rate_edit_'+id).val(obj.d_pr);
			        $('#rate_edit_'+id).attr('data-value',obj.d_pr);
			        $('#sellingrate_edit_'+id).val(obj.d_sr);
			        $('#sellingrate_edit_'+id).attr('data-value',obj.d_sr);
			        var tax = ((obj.d_pr*obj.hsn_tax)/100).toFixed(2);
				    $('#tax_edit_'+id).val(tax);
				    $('#tax_edit_'+id).attr('data-value',tax);
				    $('#tax_edit_'+id).attr('data-tax',obj.hsn_tax);
				    var total = parseFloat(tax)+parseFloat(obj.d_pr);
				    $('#totalAmount_edit_'+id).val(total.toFixed(2));
                    $('#discount_edit_'+id).val(0);
				    $('#totalAmount_edit_'+id).attr('data-value',total);
				    calcamount();
				}
     }) 
       }else{
        $.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/getItemBatchDetails');?>',
			data: { itemValue : itemValue},
				success:function(res){//console.log(res);
				    $('#code_list_'+id).hide();
				    $('#name_list_edit_'+id).hide();
				    var obj = JSON.parse(res);
				    $('#itemtbid_'+id).val(obj.item_id);
				    // $('#code_'+id).val(obj.itm_code);
			        // $('#itemname_edit_'+id).val(obj.itm_name);
			        $('#hsncode_'+id).val(obj.hsn_code);
                    $('#hsn_tax_edit_'+id).val(obj.hsn_tax);
			        //$('#uom_'+id).val(obj.item_uom);
			        $('#quantity_edit_'+id).val(1);

			        $('#rate_edit_'+id).val(obj.t_pr);
			        $('#rate_edit_'+id).attr('data-value',obj.t_pr);
			        $('#sellingrate_edit_'+id).val(obj.t_sr);
			        $('#sellingrate_edit_'+id).attr('data-value',obj.t_sr);
			        var tax = ((obj.t_pr*obj.hsn_tax)/100).toFixed(2);
				    $('#tax_edit_'+id).val(tax);
				    $('#tax_edit_'+id).attr('data-value',tax);
				    $('#tax_edit_'+id).attr('data-tax',obj.hsn_tax);
				    var total = parseFloat(tax)+parseFloat(obj.t_pr);
				    $('#totalAmount_edit_'+id).val(total.toFixed(2));
                    $('#discount_edit_'+id).val(0);
				    $('#totalAmount_edit_'+id).attr('data-value',total);
				    calcamount();
				}
     }) 
       }
  
  })
  
  $('#sales_contedit').on('keyup','.quantity_edit',function(){
    var qnty = $(this).val();
    var order = $(this).data('order');
    //var tax = $('#tax_edit_'+order).data('value')-(($('#tax_edit_'+order).data('value'))*$('#discount_edit_'+order).val()*0.01);
    if(qnty != '' && qnty!=0){
        $('#quantity_edit_'+order).val(qnty);
        //--$('#rate_'+order).val((($('#rate_'+order).data('value')*qnty)).toFixed(2));
        $('#sellingrate_edit_'+order).val(($('#sellingrate_edit_'+order).data('value')*qnty).toFixed(2));
        //$('#sellingrate_edit_'+order).val(($('#sellingrate_edit_'+order).data('value')).toFixed(2));
        //$('#tax_edit_'+order).val((tax*qnty).toFixed(2));
        var tax = (( $('#rate_edit_'+order).val() * $('#hsn_tax_edit_'+order).val() )/100).toFixed(2);
       // alert(tax);
		$('#tax_edit_'+order).val(tax*qnty);
        var totalamount = parseFloat($('#rate_edit_'+order).val()*qnty)+parseFloat($('#tax_edit_'+order).val());
        $('#totalAmount_edit_'+order).val(totalamount.toFixed(2));
        $('#discount_edit_'+order).keyup();
        calcamount();
      
    }
  });
  $('#sales_contedit').on('change','.quantity_edit',function(){
    var order = $(this).data('order');
    autosave(order);
  });
  
  $('#sales_contedit').on('keyup','.discount_edit',function(){ 


        var order = $(this).data('order');
        var qnty = $('#quantity_edit_'+order).val();
        var radioValue = $("input[name='optradio_edit"+order+"']:checked").val();
    //-- var rate = $('#rate_'+order).data('value')*qnty;
        var tax = $('#tax_edit_'+order).data('value');
        var taxper = $('#tax_edit_'+order).data('tax');
        var taxdiscount = 0;
        var totaldiscount = 0;
        var subtotal = 0;
        var discount = $('#discount_edit_'+order).val();//console.log(tax+'-->');console.log(radioValue);
        if(discount!=''){
            
            if(radioValue == 'percent'){

                //calculate discount %wise of subtotal (totalAmount) -Niby
                subtotal = parseFloat($('#rate_edit_'+order).val()*qnty)+parseFloat($('#tax_edit_'+order).val()); 
                totaldiscount = ((parseFloat(subtotal)*parseFloat(discount)|| 0)/100).toFixed(2);
                subtotal_discount_applied = parseFloat(subtotal) - parseFloat(totaldiscount);
                $('#totalAmount_edit_'+order).val(subtotal_discount_applied.toFixed(2));
            }
            else if(radioValue == 'cash'){//console.log('entered');
                //calculate discount amount wise of subtotal (totalAmount) -Niby
                subtotal = parseFloat($('#rate_edit_'+order).val()*qnty)+parseFloat($('#tax_edit_'+order).val()); 
                subtotal_discount_applied = parseFloat(subtotal) - parseFloat(discount);
                $('#totalAmount_edit_'+order).val(subtotal_discount_applied.toFixed(2));
            }

            calcamount();
        }

  });
  
  $('#discount').on('keyup',function(){
      calcamount();
  });
  $('#extradiscount_edit').on('keyup',function(){
      calcamount();
  });
  $(document).ready(function() {
    $('#supplierselect').select2();
});
$(".refnum").dblclick(function(){
    //alert();
 $('#demo1').show();
});
$(".refnum").click(function(){
	$('#demo1').hide();
});
$('.refnum').on('change',function(){
	
var refnum=$(this).val();

$.ajax({
			type: "POST",
			url: '<?php echo site_url('Admin/getreferencenumberfetching');?>',
			data: {
				refnum: refnum
			},
			success: function(res) {
				console.log(res)
				if(res==1){  
					$('.refnum').css({"border":"1px solid #ff0099"});
					
         
        }else{
			$('.refnum').css({"border":"1px solid #d2d6de"});
		}
			},
});
});

$('#savechanges').on('click',function(){
var id=$('#purchase_master_id').val();
var billdate=$('#billdate').val();
var sup=$('#supplierselect').val();
var taxtype=$('#taxtype').val();
var refnumber=$('#referno').val();
var paymode=$("input[name='defaultExampleRadios']:checked").val();
var note=$('#note').val();
var amount=$('#amount').val();
var goodreceipt=$('#goodreceipt').val();
var totalqnty_edit=$('#totalqnty_edit').val();
var extradiscount_edit=$('#extradiscount_edit').val();
var othercharge_edit=$('#othercharge_edit').val();
var totalTaxableAmount_edit=$('#totalTaxableAmount_edit').val();
var totaltax_edit=$('#totaltax_edit').val();
var discount_edit=$('#discount_edit').val();
var roundoff_edit=$('#roundoff_edit').val();
var grandTotal_edit=$('#grandTotal_edit').val();

$.ajax({
			type: "POST",
			url: '<?php echo site_url('AdminController/editpurchasemaster');?>',
			data: {
				id: id,billdate:billdate,sup:sup,taxtype:taxtype,refnumber:refnumber,paymode:paymode,note:note,
                amount:amount,goodreceipt:goodreceipt,totalqnty_edit:totalqnty_edit,extradiscount_edit:extradiscount_edit,
                othercharge_edit:othercharge_edit,totalTaxableAmount_edit:totalTaxableAmount_edit,totaltax_edit:totaltax_edit,
                discount_edit:discount_edit,roundoff_edit:roundoff_edit,grandTotal_edit:grandTotal_edit
			},
			success: function(res) {
				console.log(res)
				if(res==1){  
					$('.refnum').css({"border":"1px solid #ff0099"});
					
         
        }else{
			$('.refnum').css({"border":"1px solid #d2d6de"});
		}
			},
});
});

$('#sales_contedit').on('click','.editrowpurchase',function(){
 var id=$(this).data('row');
 var mid=$('#purchase_master_id').val();
 var tid=$('#itemtrans_edit_'+id).val();
 var code=$('#code_'+id).val();
 var hsncode=$('#hsncode_'+id).val();
 var rate=$('#rate_edit_'+id).val();
 var qty=$('#quantity_edit_'+id).val();
 var dtype=$('#discount_type_'+id).val();
 var discount=$('#discount_edit_'+id).val();
 var tax=$('#tax_edit_'+id).val();
 var srate=$('#sellingrate_edit_'+id).val();
 var total=$('#totalAmount_edit_'+id).val();
 var item=$('#itemtbid_edit_'+id).val();
 var batch=$('#itembatchid_edit_'+id).val();
var oqty=$('#oldstockqty_'+id).val();
 var amount=$('#amount').val();

var totalqnty_edit=$('#totalqnty_edit').val();
var extradiscount_edit=$('#extradiscount_edit').val();
var othercharge_edit=$('#othercharge_edit').val();
var totalTaxableAmount_edit=$('#totalTaxableAmount_edit').val();
var totaltax_edit=$('#totaltax_edit').val();
var discount_edit=$('#discount_edit').val();
var roundoff_edit=$('#roundoff_edit').val();
var grandTotal_edit=$('#grandTotal_edit').val();

 //alert(tid);
 $.ajax({
			type: "POST",
			url: '<?php echo site_url('AdminController/getrowtransedit');?>',
			data: {
				id: id,tid:tid,code:code,hsncode:hsncode,rate:rate,qty:qty,dtype:dtype,discount:discount,tax:tax,
                srate:srate,total:total,item:item,batch:batch, amount:amount,totalqnty_edit:totalqnty_edit,extradiscount_edit:extradiscount_edit,
                othercharge_edit:othercharge_edit,totalTaxableAmount_edit:totalTaxableAmount_edit,totaltax_edit:totaltax_edit,
                discount_edit:discount_edit,roundoff_edit:roundoff_edit,grandTotal_edit:grandTotal_edit,oqty:oqty,mid:mid
			},
			success: function(res) {
			
                location.reload();	
			},
});

 //alert(id);
});

</script>
<script type="text/javascript" language="javascript" >

$('#reset1').click(function() {

$('input[name="esdemo"]').prop('checked', false);

});

function validateForm() {

if (confirm("Do you really want to submit this purchase?")) {

    form.myButton.disabled = true;
form.myButton.value = "Please wait...";
return true;

}

else {

return false;

}


}

</script>
	</body>

	</html>