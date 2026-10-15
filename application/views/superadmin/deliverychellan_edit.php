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
					
				
						
                    <form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('AdminController/deliverychellannewrowedit');?>">
				
                <div class="modal-content">
                
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delivery Challan </h4>
                    </div>
                     
                    <div class="col-sm-12" style="margin-top:20px;">
                    <div class="col-sm-1">
                        <label class="exampleInputEmail1">Delivery Challan NO:</label>
                    </div>
                    <div class="col-sm-2">
                    <input type="hidden" class="form-control" name="master_id12" value="<?php echo $data_master->deliverychellan_master_id;?>" id="sale_id">
                        <input type="text" name="billno" readonly class="form-control" value="<?php echo $data_master->deliverychellan_master_chellanno;?>" />
                    </div>
                    <div class="col-sm-1">
                        <label class="exampleInputEmail1">Delivery Challan DATE:</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="billdate" class="form-control" value="<?php echo date("Y-m-d", strtotime($data_master->deliverychellan_master_date));?>"/>
                    </div>
                
                    
                    <div class="col-sm-1">
                        <label class="exampleInputEmail1">Place of Supply</label>
                    </div>
                    <div class="col-sm-2">
                    
                        <select name="stcode" class="form-control" required>
                            <option value="0">SELECT</option>
                            <?php foreach($statecode as $state): ?>
                            <option value="<?php echo $state->state_id; ?>" <?php if($state->state_id==$data_master->deliverychellan_master_state_code){echo 'selected';}?>><?php echo $state->state_code; ?></option>
                             <?php endforeach; ?>
                        </select>
                    </div>

                    </div>
                
                    <div class="col-sm-12" style="margin-top: 10px;">
                        <h4>Consignee Details</h4>
                        <div class="col-sm-1">
                            <label class="exampleInputEmail1">Consignee Name</label>
                        </div>
                        <div class="col-sm-2">
                            <!-- <input type="text" name="consignee_name" id="consignee_name" class="form-control" /> -->
                            <select name="consignee_name" id="consignee_name" class="form-control" >

                            <option value="0">select</option>
                            <?php foreach($branches as $branches){?>
                            <option value="<?php echo $branches->brn_id;?>" <?php if($branches->brn_id==$data_master->deliverychellan_master_consignee_name){echo 'selected';}?>><?php echo $branches->brn_name;?></option>
                            <?php }?>

                            </select>
                        </div>
                        <div class="col-sm-1">
                            <label class="exampleInputEmail1">Consignee Address</label>
                        </div>
                        <div class="col-sm-2">
                           <textarea class="form-control" name="consignee_address" id="consigneeaddress"><?php echo $data_master->deliverychellan_master_consignee_address;?></textarea>
                            
                        </div>
                        <div class="col-sm-1">
                            <label class="exampleInputEmail1">Customer GSTIN</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="customer_gstin" id="customer_gstin" class="form-control" value="<?php echo $data_master->dc_master_customer_gstin;?>" />
                        </div>

                     </div>
                     <div class="col-sm-12" style="margin-top: 10px;">
                        <h4>Transport Details</h4>
                        <div class="col-sm-1">
                            <label class="exampleInputEmail1">Transport mode</label>
                        </div>
                        <div class="col-sm-2">
						<select name="transport_mode" id="transport_mode" class="form-control">
									<option value="ROAD" <?php if($data_master->dc_master_transport_mode=='ROAD'){echo 'selected';}?>>ROAD</option>
									<option value="RAILWAY" <?php if($data_master->dc_master_transport_mode=='RAILWAY'){echo 'selected';}?>>RAILWAY</option>
									</select>
                        </div>
                        <div class="col-sm-1">
                                <label class="exampleInputEmail1">VEHICLE NUMBER:</label>
                        </div>
                        <div class="col-sm-2">
                                <input type="text" name="vehicleno" class="form-control" id="vehiclenumber" value="<?php echo $data_master->deliverychellan_master_vehicleno;?>"/>
                            </div>
                        <div class="col-sm-1">
                            <label class="exampleInputEmail1">Transport purpose</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="transport_purpose" id="transport_purpose" class="form-control" value="<?php echo $data_master->dc_master_transpor_purpose;?>" />
                        </div>
                        <div class="col-sm-1">
                            <label class="exampleInputEmail1">Despatch Date</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="date" name="despatch_date" id="despatch_date" class="form-control" value="<?php echo $data_master->dc_master_despatch_date;?>"/>
                        </div>

                     </div>
                    <div class="col-sm-12" style="margin-top:20px;">
                      <div class="col-sm-1">
                        <label class="exampleInputEmail1">IS IGST</label>
                        </div>
                        <div class="col-sm-1">
                        <input type="checkbox" name="isigst" value="1" <?php if($data_master->deliverychellan_master_is_igst==1){echo 'checked';}?>>
                            
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
                        <th scope="col">TAXABLE VALUE</th>
                        <th scope="col">GST %</th>
                        <!-- <th scope="col">GST AMOUNT</th> -->
                        <th scope="col">TOTAL</th>
                        <!-- <th scope="col">EMPLOYEE</th> -->
                        <th scope="col">ACTION</th>
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
                                    data-order="<?php echo $i;?>" style="float:left" >
                                    <input type="hidden" name="transnum[]" class="form-control cleardata" id="transid_<?php echo $i;?>"
                                    data-order="<?php echo $i;?>" style="float:left" value="<?php echo $single->deliverychellan_trans_id;?>">
                        <input type="hidden" name="itemid[]" value="<?php echo $single->deliverychellan_item_id;?>" class="form-control " id="itemid_<?php echo $i;?>" data-order="<?php echo $i;?>"  >
                        <input type="hidden"  class="form-control cleardata" value="<?php echo $single->inventory_stock_itemcount + $single->deliverychellan_trans_qty;?>" id="qtyinventory_<?php echo $i;?>"
                                    data-order="<?php echo $i;?>" style="float:left" >
                                    <input type="hidden"  value="0" class="form-control cleardata" id="mop_<?php echo $i;?>"
                                    data-order="<?php echo $i;?>" style="float:left" >
                                    <input type="hidden"  class="form-control cleardata" id="oldqty_<?php echo $i;?>"

data-order="<?php echo $i;?>" style="float:left" value="<?php echo $single->deliverychellan_trans_qty;?>" >
                                    <input type="hidden"  class="form-control cleardata" value="0" id="qtymop_<?php echo $i;?>"
                                    data-order="<?php echo $i;?>" style="float:left" >
                        <input type="text" name="itemcode[]" style="width:90px;" class="form-control codeItem" id="code_<?php echo $i;?>"  value="<?php echo $single->itm_code;?>" data-order="<?php echo $i;?>"  >
                        <div id="code_list_<?php echo $i;?>" style="position: absolute;z-index: 99;"></div>
                        </td>
                        <td><input type="text" name="itemname[]" class="form-control nameItem" id="itemname_<?php echo $i;?>" data-order="<?php echo $i;?>" value="<?php echo $single->itm_name;?>" required>
                        <div id="name_list_<?php echo $i;?>"  style="position: absolute;z-index: 99;"></div>
                        </td>
                        <td>
                        <?php 

$itemid=$single->deliverychellan_item_id;

$itemvbatchfetch=$this->Admin_model->get_itembatchfeting($itemid);



?>

                            <select name="itembatchid[]" style="width:77px;" class="form-control itemBatch itemBatchnew" id="itembatchid_<?php echo $i;?>" placeholder="Batch" data-order="<?php echo $i;?>" required>
                            <?php foreach($itemvbatchfetch as $itemvbatchfetch){  ?>
                                <option value="<?php echo $itemvbatchfetch->batch_id ;?>" <?php if($itemvbatchfetch->batch_id==$single->deliverychellan_item_batch_id ){echo 'selected';}?>><?php echo $itemvbatchfetch->batchcode;?></option>  
                                <?php } ?>
                            </select>
                        </td>
                        <td><input type="text"  step=".01"   min="0"  name="itemqnty[]" style="width:50px;" class="form-control qnty qntynew"  value="<?php echo $single->deliverychellan_trans_qty;?>"  id="itemqty_<?php echo $i;?>" data-order="<?php echo $i;?>" ></td>
                        <td><input type="text"  name="unitprice[]"  class="form-control unitprice unitpricenew cleardata" style="width:100px;"
                                    id="unitprice_<?php echo $i;?>" value="<?php echo $single->deliverychellan_trans_branchprice;?>"  data-order="<?php echo $i;?>" data-toggle="tooltip" trigger="manual"></td>
                        <td><input type="text" value="<?php echo $single->deliverychellan_trans_taxable_value;?>" name="itemtaxable[]" readonly class="form-control taxableAmount" id="taxable_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" ></td>
                        <td><input type="text"  value="<?php echo $single->deliverychellan_trans_gst_percentage;?>" name="itemgstper[]" readonly class="form-control "  id="gstper_<?php echo $i;?>" data-order="<?php echo $i;?>" >
                        <input type="hidden" name="itemgstamount[] " class="form-control gstAmount cleardata"
                                     id="gstAmount_<?php echo $i;?>" data-value=""  data-order="<?php echo $i;?>" readonly value="<?php echo $single->deliverychellan_trans_gst_amount;?>">
                        <input type="hidden" value="<?php echo $single->deliverychellan_trans_hsn_code;?>" name="itemhsncode[]" class="form-control itemhsncode" id="hsncode_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" ></td>
                        
                        <td><input type="text" value="<?php echo $single->deliverychellan_trans_total;?>" name="itemtotalamount[]" readonly class="form-control totalAmount" id="totalAmount_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" ></td>
                        <!-- <td><select name="employee[]" class="form-control" >
                            <?php //echo $namelist;?>
                        </select></td> -->
                        <td>
                        <!-- <i class="fa fa-floppy-o editrowdeliverychellan"  id="editicon_<?php echo $i;?>" data-row="<?php echo $i;?>" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer;margin-right: 7px"></i>
                        -->
                        <i class="fa fa-trash detailDeleteRow1" onclick="deletechecked()" data-row="<?php echo $i;?>" aria-hidden="true"

style="font-size:15px;margin-top: 10px;cursor:pointer"></i>

                        </td>
                        </tr>
                        <?php $i++; } ?>
                    
                    </tbody>
                    </table>
                    <button type="button" id="BtnNewRow" data-order="<?=count($data_trans)?>" class="btn btn-info btn-sm">ADD</button>
                    </div>
                    <div class="col-sm-12" >
                         <div class="col-sm-6">
                             <div class="col-sm-12">
                                 <div class="col-sm-2">
                                <label class="exampleInputEmail1">NOTE</label>
                                </div>
                            
                                <div class="col-sm-4">
                                    <textarea class="form-control" id="note" name="note"><?php echo $data_master->deliverychellan_master_note;?></textarea>
                                </div>
                                <!-- <div class="col-sm-2">
                                    <label class="exampleInputEmail1">VEHICLE NUMBER:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="vehicleno" class="form-control" />
                                </div> -->
                           </div>
                     <div class="col-sm-12" style="margin-top: 20px;">
                        
                  
                    
                    
                    
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
                        <input type="text" name="cardnumber" class="form-control salecardnumber"  style="display: none;"  />
                        <input type="text" name="chequenum" class="form-control saleschequenumber" style="margin-top:10px;display: none;"  />
                        <input type="text" name="transcheque" class="form-control salestranscheque" style="margin-top:10px;display: none;"  />
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
                   
                    
                </div>
                
                
            </div>

                <div class="col-sm-6">
                    <div class="col-sm-12">
                    <div class="col-sm-2">
                        <!-- //<label class="exampleInputEmail1">DELIVERY CHARGE</label> -->
                    </div>
                    <div class="col-sm-4">
                        <!-- <input type="text" name="deliverychare"  id="deliverychare" class="form-control"/> -->
                    </div>
                    <div class="col-sm-2">
                        <label class="exampleInputEmail1">TOTAL TAXABLE AMOUNT</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="totalTaxableAmount"  readonly  id="totalTaxableAmount" value="<?php echo $data_master->deliverychellan_master_tot_taxable_amount;?>" class="form-control"/>
                    </div>
                        
                </div>
                    
                    

                   
                    <div class="col-sm-12">
                    <div class="col-sm-2">
                        <!-- <label class="exampleInputEmail1">DISCOUNT</label> -->
                    </div>
                    <div class="col-sm-4">
                        <!-- <input type="text" name="discount"  id="discount" class="form-control"/> -->
                    </div>
                 
                    
                    
                </div>
                <div class="col-sm-12" style="margin-top:10px;">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-2">
                        <label class="exampleInputEmail1">ROUND OFF</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="roundOfValuue" value="<?php echo $data_master->deliverychellan_master_roundoff;?>" id="roundOfValuue" class="form-control"/>
                    </div>
                    
                    </div>
                    
                    <div class="col-sm-12" style="margin-top:10px;">
                    <div class="col-sm-6"></div>	
                        <div class="col-sm-2">
                        <label class="exampleInputEmail1">GRAND TOTAL</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" readonly name="grandTotal" value="<?php echo $data_master->deliverychellan_master_grandtotal;?>" id="grandTotal" class="form-control"/>
                    </div>
                    </div>
                    <!---->
                </div>
                </div>
                <div class="col-sm-12" style="margin-top:10px;" >
                    <div class="col-sm-6">
                    <div class="col-sm-2">

<button type="submit" id="saveonly" class="btn btn-success btn-sm">ADD ON</button>

</div>

<div class="col-sm-3">
<a href="<?php echo base_url('delivery_chellanprint/').$data_master->deliverychellan_master_id;?>"><button type="button" class="btn btn-sm btn-Warning" >PRINT</button></a>

</div>

                    </div>
                        <!---->
                    
                
                    </div>


                  

                    <div class="modal-footer">
                       
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
	url: '<?php echo site_url('AdminController/dceditdeleterow');?>',
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
		
		
		
			
			var  totalTaxableAmount=$('#totalTaxableAmount').val();
			
			
			var  roundOfValuue=$('#roundOfValuue').val();
			var  grandTotal=$('#grandTotal').val();
			
		$.ajax({

					type: "POST",
					url: '<?php echo site_url('AdminController/dceditdeleterowedit');?>',
					data: {note:note,vehiclenumber:vehiclenumber,totalTaxableAmount:totalTaxableAmount,
		roundOfValuue:roundOfValuue,grandTotal:grandTotal,
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

  $(function () {
    $('#example2').DataTable({
       dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5'
        ]
    })
  })
  
 function recalculate(){
    var totalTaxableAmount = 0;
    var totalgstAmount = 0;
    var grandTotal = 0;
    var deliverycharge = 0;
    var discount = 0;
    
    $('.taxableAmount').each(function( index ) {
        if($(this).val() !=''){
            totalTaxableAmount=totalTaxableAmount+parseFloat($(this).val());
        }
     });
     $('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
     $('.gstAmount').each(function( index ) {
         if($(this).val() !=''){
            totalgstAmount=totalgstAmount+parseFloat($(this).val());
         }
     });
     $('#amountGst').val(totalgstAmount.toFixed(2));
     grandTotal = totalTaxableAmount;
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
     $('#grandTotal').val(Math.round(grandTotal));
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
  
  function autosave(id){

	
 var code=$('#code_'+id).val();
 var itemqty=$('#itemqty_'+id).val();
 var taxable=$('#taxable_'+id).val();
 var hsncode=$('#hsncode_'+id).val();
 var gstper=$('#gstper_'+id).val();
 var gstamount=$('#gstAmount_'+id).val();
 var cess=$('#cessAmount_'+id).val();
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
 var oqty=$('#oldqty_'+id).val();

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


 //alert(tid);

 $.ajax({

type: "POST",
url: '<?php echo site_url('AdminController/deliverychellanrowedit');?>',
data: {
	code:code,itemqty:itemqty,taxable:taxable,hsncode:hsncode,gstper:gstper,gstamount:gstamount,cess:cess,
	total:total,item:item,batch:batch,employee:employee,unitprice:unitprice,inceid:inceid,inamount:inamount,
	mrp:mrp,tid:tid,note:note,vehiclenumber:vehiclenumber,outstanding:outstanding,sid:sid,oqty:oqty,
					paymod1:paymod1,paidamount:paidamount,deliverychare:deliverychare,totalTaxableAmount:totalTaxableAmount,
					amountGst:amountGst,cessAmount:cessAmount,roundOfValuue:roundOfValuue,grandTotal:grandTotal,discount:discount
},

success: function(res) {
	if(res==1){
		
		location.reload();
	}else{
	alert("stock Not available");	
    location.reload();
	}
},

});

  }
  //Dynamic Row Adding Code
  
  $('#BtnNewRow').on('click',function(){
      var rowStart = 1;
      $('.slno').each(function(){
          $(this).html(rowStart);
          rowStart=rowStart+1;
		  
      });
	  $newrow=$('#BtnNewRow').data('order')+1;
	  $('#BtnNewRow').data('order', $newrow);
      //$('#BtnNewRow').data('order',rowStart-1);
      var current_row = $newrow;
      var new_row = '<tr id="detailRow_'+current_row+'" data-row="'+current_row+'"> <th scope="row" class="slno">'+current_row+'</th>';
      new_row+= '<td><input type="hidden" value="0" name="purcost2[]" class="form-control cleardata" id="pcost_'+current_row+'" data-order="'+current_row+'" style="float:left" ><input required type="hidden"  value="0" class="form-control  " id="qtymop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden" value="0" class="form-control  " id="qtymop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden" value="0" class="form-control  " id="qtyinventory_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input type="hidden" name="itemid2[]" value="0" class="form-control " id="itemid_'+current_row+'" data-order="'+current_row+'" style="width:70px;" ><input type="text" name="itemcode2[]" class="form-control codeItem" style="width:90px;" codeItem" id="code_'+current_row+'" data-order="'+current_row+'" ><div id="code_list_'+current_row+'"></div></td>';
      new_row+= '<td><input type="text" name="itemnam2[]" class="form-control nameItem" id="itemname_'+current_row+'" data-order="'+current_row+'" ><div id="name_list_'+current_row+'"></div></td>';
      new_row += '<td><select name="itembatchid2[]" value="0" class="form-control itemBatch " style="width:77px;" id="itembatchid_'+current_row+'" data-order="'+current_row+'" placeholder="Batch"><option value="">Select Batch</option></select></td>';
      new_row+= '<td><input type="text"  step=".01"   min="0"  name="itemqnty2[]" style="width:50px;"  class="form-control qnty " id="itemqty_'+current_row+'" data-order="'+current_row+'" ></td>';
      new_row += '<td><input required type="text" name="unitprice2[]"  style="width:100px;"  class="form-control unitprice cleardata " data-toggle="tooltip" trigger="manual" id="unitprice_' + current_row + '" data-order="' + current_row + '" ></td>';
	  new_row+= '<td><input type="text" name="itemtaxable2[]" readonly value="0" class="form-control taxableAmount" id="taxable_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
      new_row+= '<td><input type="text" name="itemgstper2[]" readonly value="0" class="form-control" id="gstper_'+current_row+'"  data-order="'+current_row+'"><input type="hidden" name="itemhsncode2[]" class="form-control itemhsncode" id="hsncode_'+current_row+'" data-value="" data-order="'+current_row+'" ><input required type="hidden" value="0"  name="itemgstamount2[]" readonly class="form-control gstAmount cleardata" id="gstAmount_' + current_row + '" data-value="" data-valuesingle="" data-order="' + current_row + '"></td>';
    
	
      new_row+= '<td><input type="text" name="itemtotalamount2[]" readonly value="0" class="form-control totalAmount" id="totalAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
    //   new_row+= '<td><select name="employee[]" class="form-control" style="width:140px;"><?php //echo $namelist;?></select></td>';
      new_row+= '<td>';
    
      new_row+= '<i data-row="'+current_row+'" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
      new_row+= '</td></tr>';
      
      $('#sales_cont').append(new_row);
      console.log(current_row);
      $('#BtnNewRow').data('order',parseInt(current_row));
      
  });
  
  $('#sales_cont').on('click','.detailDeleteRow',function(){
      var rowNumber = $(this).data('row');
      $('#detailRow_'+rowNumber).remove();
      var rowStart = 1;
      $('.slno').each(function(){
          $(this).html(rowStart);
          rowStart++;
      });
      $('#BtnNewRow').data('order',rowStart-1);
      $('.gstAmount').keyup();
       $('.totalAmount').keyup();
       recalculate();
  });
  
  $('#sales_cont').on('click','.detailEraseRow',function(){
      var rowNumber = $(this).data('row');
       $('#detailRow_'+rowNumber+' select').prop('selectedIndex',0);
       $('#detailRow_'+rowNumber+' input').val('');
       recalculate();
  });
  
   //Dynamic Row Adding Code
  
  $('#sales_cont').on('keyup','.gstAmount',function(){
      var gstAmount = 0;
      $('.gstAmount').each(function(){
          if($(this).val() != ''){
            gstAmount = parseInt(gstAmount) + parseInt($(this).val());
          }
      });
      
      $('#amountGst').val(gstAmount);
  });
  
  
  $('#sales_cont').on('keyup','.totalAmount',function(){
      var totalAmount = 0;
      $('.totalAmount').each(function(){
          if($(this).val() != ''){
            totalAmount = parseInt(totalAmount) + parseInt($(this).val());
          }
      });
      $('#totalAmount').val(totalAmount);
  });
  
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

  $('#sales_cont').on('click','.subSelect_itemedit',function(){
			var id = $(this).data('id');
			var itemValue = $(this).data('value');
			$('#code_list_'+id).hide();
			$('#name_list_'+id).hide();
			$.ajax({
					type:"POST",
					url:'<?php echo site_url('Admin/getBatchByItem1');?>',
					data: { itemValue : itemValue},
						success:function(res){
							var batchlist = JSON.parse(res);
							//console.log(batchlist);
							var i;
							var optiondata= '<option value="">Select</option>';
							for(i=0;i<batchlist.length;i++){
								
								optiondata += '<option value="'+batchlist[i].batch_id+'">'+batchlist[i].batchcode+'('+batchlist[i].inventory_stock_itemcount+')</option>';

							}
							
							$('#itembatchid_'+id).html(optiondata);
							$('#code_'+id).val(batchlist[0].itm_code);
							$('#itemname_'+id).val(batchlist[0].itm_name);
						}
			})
  });


  $('#sales_cont').on('keyup', '.unitprice', function () {
	
        $(this).val($(this).val().replace(/ +?/g, ''));
		
		var unitprice = $(this).val();
		var id=$(this).data('order');		
		
		var qnty =$('#itemqty_'+id).val();
		var mop = $('#qtymop_'+id).val() / (qnty || 1);
		var minmop=$('#pcost_'+id).val();
		
		// alert(qnty);

	



			var item_hsn_tax = $('#gstper_'+id).val();
			//alert(item_hsn_tax);
			var taxableAmount = 0; 
			if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
				var taxableAmount = (parseFloat(unitprice) / (101 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
			}
			else {
				var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
			}
			var gstAmount = ((taxableAmount * parseFloat(item_hsn_tax)) / 100).toFixed(2);
		
		

			var gstsubtotal = qnty * gstAmount;
			// var cesssubtotal = qnty * cessAmount;
			var itemsubtotal = qnty * unitprice ;
			var taxablesubtotal = qnty * taxableAmount;
            // alert(qnty);
			$('#taxable_' + id).val((itemsubtotal));	
			$('#gstAmount_' + id).val((gstsubtotal).toFixed(2));
			// $('#cessAmount_' + id).val((cesssubtotal).toFixed(2));
			$('#totalAmount_' + id).val((itemsubtotal).toFixed(2));	
			
            recalculate();
			
		
			
		

	});

	$('#sales_cont').on('change','.unitpricenew',function(){ 
	var id = $(this).data('order');
	autosave(id);
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

 $('#sales_cont').on('change','.itemBatch',function(){ 	 

   
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

                
					if(parseInt(obj.cur_stock_item_count)<parseInt(1)){
						$('#itemqty_'+id).css({"border":"1px solid red"});
					}else{
						$('#itemqty_'+id).css({"border":"1px solid #d2d6de"});
					}
				$('#hsncode_'+id).val(obj.hsn_code);
				
             
				if ((obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28) ) {//&& ! $('#isigst').is(":checked")
					if(obj.t_sr==0.00){
							var taxableAmount = parseInt(obj.e_br);
						}
						
						else{
							var taxableAmount = parseInt(obj.t_br);
						}
						
				}
				else {
					if(obj.t_sr==0.00){
							var taxableAmount = parseInt(obj.e_br);
						}
						
					
						
						else{
							var taxableAmount = parseInt(obj.t_br);
						
						}
				}
				var gstAmount = ((taxableAmount*parseInt(obj.hsn_tax))/100).toFixed(2);


				if(obj.t_sr==0.00){
						$('#pcost_' + id).val(obj.e_pc);
					$('#percost_' + id).val(obj.e_pc);
					$('#mop_'+id).val(obj.e_mop);
					$('#unitprice_'+id).val(obj.e_br);
					$('#totalAmount_' + id).val(obj.e_br);
					$('#totalAmount_' + id).attr('data-value', obj.e_br);
					}
					
					
					
					else{
						$('#pcost_' + id).val(obj.t_pc);
					$('#percost_' + id).val(obj.t_pc);
					$('#mop_'+id).val(obj.t_mop);
					$('#unitprice_'+id).val(obj.t_br);
					$('#totalAmount_' + id).val(obj.t_br);
					$('#totalAmount_' + id).attr('data-value', obj.t_br);
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
				
				
               
				},
		});
 }); 

$('#sales_cont').on('change','.itemBatchnew',function(){ 
	var id = $(this).data('order');
	autosave(id);
});
 
$('#deliverychare').on('keyup',function(){
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
	var inqty=$('#qtyinventory_'+order).val();
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

    if(qnty != '' && qnty!=0){
    	var unitprice=$('#unitprice_'+order).val();
		var totaltax=parseFloat(qnty)*parseFloat(unitprice);
       
     $('#taxable_'+order).val(totaltax.toFixed(2));
    
     $('#totalAmount_'+order).val(totaltax.toFixed(2));

	 recalculate();
    }
    
});



$('#sales_cont').on('change','.qntynew',function(){ 
	var id = $(this).data('order');
	autosave(id);
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
  $('#consignee_name').on('change',function(){
	  var id=$(this).val();
	$.ajax({
				type: "POST",
				url: '<?php echo site_url('Admin/get_branchdetails');?>',
				data: { id: id },
				success: function (res) {
					console.log(res);

					var obj=JSON.parse(res);
					$('#consigneeaddress').val(obj.brn_address);
					$('#customer_gstin').val(obj.brn_gst);
				},
			});
  });
  $('form').attr('autocomplete', 'off');

  $('#sales_cont').on('click','.editrowdeliverychellan',function(){
 
 var id=$(this).data('row');
 var code=$('#code_'+id).val();
 var itemqty=$('#itemqty_'+id).val();
 var taxable=$('#taxable_'+id).val();
 var hsncode=$('#hsncode_'+id).val();
 var gstper=$('#gstper_'+id).val();
 var gstamount=$('#gstAmount_'+id).val();
 var cess=$('#cessAmount_'+id).val();
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
 var oqty=$('#oldqty_'+id).val();

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


 //alert(tid);

 $.ajax({

type: "POST",
url: '<?php echo site_url('AdminController/deliverychellanrowedit');?>',
data: {
	code:code,itemqty:itemqty,taxable:taxable,hsncode:hsncode,gstper:gstper,gstamount:gstamount,cess:cess,
	total:total,item:item,batch:batch,employee:employee,unitprice:unitprice,inceid:inceid,inamount:inamount,
	mrp:mrp,tid:tid,note:note,vehiclenumber:vehiclenumber,outstanding:outstanding,sid:sid,oqty:oqty,
					paymod1:paymod1,paidamount:paidamount,deliverychare:deliverychare,totalTaxableAmount:totalTaxableAmount,
					amountGst:amountGst,cessAmount:cessAmount,roundOfValuue:roundOfValuue,grandTotal:grandTotal,discount:discount
},

success: function(res) {
	if(res==1){
		
		location.reload();
	}else{
	alert("stock Not available");	
    location.reload();
	}
},

});

});

$('#savemasterchange').on('click',function(){
    var id=$('#sale_id').val();
	var billdate=$('#billdate').val();
	var chellannum=$('#chellannum').val();
	var deliverydate=$('#deliverydate').val();
	var customername=$('#consignee_name').val();
	var gstin=$('#customer_gstin').val();
	var transmode=$('#transport_mode').val();
	var transpur=$('#transport_purpose').val();
	var conadd=$('#consigneeaddress').val();

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
	var  despatch_date=$('#despatch_date').val();
	var  paymod1=$("input[name='paymod1']:checked").val();
	var  gst_num=$('#gst_num').val();
	var  deliverychare=$('#deliverychare').val();
	var  totalTaxableAmount=$('#totalTaxableAmount').val();
	var  amountGst=$('#amountGst').val();
	var  cessAmount=$('#cessAmount').val();
	var  roundOfValuue=$('#roundOfValuue').val();
	var  grandTotal=$('#grandTotal').val();
	var  discount=$('#discount').val();




			$.ajax({

				type: "POST",
				url: '<?php echo site_url('AdminController/deliverychellaneditnew');?>',
				data: {
					id: id,billdate:billdate,chellannum:chellannum,deliverydate:deliverydate,customername:customername,
					gstin:gstin,transpur:transpur,conadd:conadd,transmode:transmode,
					financenew:financenew,isigst:isigst,note:note,vehiclenumber:vehiclenumber,despatch_date:despatch_date,
					paymod1:paymod1,gst_num:gst_num,deliverychare:deliverychare,totalTaxableAmount:totalTaxableAmount,
					amountGst:amountGst,cessAmount:cessAmount,roundOfValuue:roundOfValuue,grandTotal:grandTotal,discount:discount
				},

				success: function(res) {
                    console.log(res);
					location.reload();
				},

			});


});

function autosavenew(){
	var id=$('#sale_id').val();
	var billdate=$('#billdate').val();
	var chellannum=$('#chellannum').val();
	var deliverydate=$('#deliverydate').val();
	var customername=$('#consignee_name').val();
	var gstin=$('#customer_gstin').val();
	var transmode=$('#transport_mode').val();
	var transpur=$('#transport_purpose').val();
	var conadd=$('#consigneeaddress').val();

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
	var  despatch_date=$('#despatch_date').val();
	var  paymod1=$("input[name='paymod1']:checked").val();
	var  gst_num=$('#gst_num').val();
	var  deliverychare=$('#deliverychare').val();
	var  totalTaxableAmount=$('#totalTaxableAmount').val();
	var  amountGst=$('#amountGst').val();
	var  cessAmount=$('#cessAmount').val();
	var  roundOfValuue=$('#roundOfValuue').val();
	var  grandTotal=$('#grandTotal').val();
	var  discount=$('#discount').val();




			$.ajax({

				type: "POST",
				url: '<?php echo site_url('AdminController/deliverychellaneditnew');?>',
				data: {
					id: id,billdate:billdate,chellannum:chellannum,deliverydate:deliverydate,customername:customername,
					gstin:gstin,transpur:transpur,conadd:conadd,transmode:transmode,
					financenew:financenew,isigst:isigst,note:note,vehiclenumber:vehiclenumber,despatch_date:despatch_date,
					paymod1:paymod1,gst_num:gst_num,deliverychare:deliverychare,totalTaxableAmount:totalTaxableAmount,
					amountGst:amountGst,cessAmount:cessAmount,roundOfValuue:roundOfValuue,grandTotal:grandTotal,discount:discount
				},

				success: function(res) {
                    console.log(res);
					location.reload();
				},

			});

}

$('#consignee_name').on('change',function(){
	autosavenew();
});
$('#consigneeaddress').on('change',function(){
	autosavenew();
});
$('#customer_gstin').on('change',function(){
	autosavenew();
});
$('#transport_mode').on('change',function(){
	autosavenew();
});
$('#vehiclenumber').on('change',function(){
	autosavenew();
});
$('#transport_purpose').on('change',function(){
	autosavenew();
});
$('#despatch_date').on('change',function(){
	autosavenew();
});
$('#note').on('change',function(){
	autosavenew();
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

	 var stock=document.getElementById('qtyinventory_'+i+'').value;
	 var qty=document.getElementById('itemqty_'+i+'').value;
	
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