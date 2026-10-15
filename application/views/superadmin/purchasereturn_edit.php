
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
#name_list_1 .table-hover>tbody>tr:hover {
    background-color: #3c8dbc;
    color: white;
    border-bottom: 1px;
}
#estimate{
	border:1px solid #d32f2f;
	width:100px;
	background-color:#d32f2f;
}
#demobill{
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
</style>

  <?php $data['leftmenu']='purchase'; echo $this->load->view('common/leftmenu',$data,true);?>
   <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />



  <div class="content-wrapper">

  

  

    <section class="content-header"> 

      <h1 align="center">PURCHASE RETURN EDIT<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'purchase_return';?>">PURCHASE RETURN EDIT</a></li>

      </ol>

    </section><br>

  

    

    <section class="content">
     
	

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            
			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	
			 
                  

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                 
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('AdminController/purchasereturnaddnew');?>">
				
                <div class="modal-content">
                
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">PURCHASE RETURN EDIT</h4>
                    </div>
					<input type="hidden" class="form-control" name="master_id12" value="<?php echo $master->purreturn_master_id;?>" id="sale_id">

                    <div class="col-sm-12" style="margin-top:10px;">
                    <div class="col-sm-1">
                        <label class="exampleInputEmail1">DEBIT NOTE NO:</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" readonly id="debitnote_no" name="debitnote_no" class="form-control cleardata" value="<?php echo $master->purreturn_master_debitno;?>"/>
                    </div>
                        <div class="col-sm-1">
                        <label class="exampleInputEmail1">DATE:</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" name="date" id="billdate" class="form-control cleardata" value="<?php echo $master->purreturn_master_date;?>"/>
                    </div>
                
                    
                    <div class="col-sm-1">
                        <label class="exampleInputEmail1">SUPPLIER:</label>
                    </div>
                    <div class="col-sm-2">
                        <select name="supplier" id="supplierselect" class="form-control cleardata">
                            <?php foreach($supplier as $sinle){ ?>
                            <option value="<?php echo $sinle->sup_id;?>" <?php if($sinle->sup_id==$master->purreturn_master_supplier){echo 'selected';}?>><?php echo $sinle->sup_name;?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <label class="exampleInputEmail1">ADDRESS</label>
                    </div>
                    <div class="col-sm-2">
                        <textarea name="address" class="form-control cleardata" id="supadd"><?php echo $master->purreturn_master_address;?></textarea>
                    </div>

                    
                    
                    </div>
                    <div class="col-sm-12"  style="margin-top: 20px;">

                    <div class="col-sm-1">
                        <label class="exampleInputEmail1">PHONE NUMBER:</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" name="phone_num" id="phone_num" maxlength="10"  class="form-control cleardata" value="<?php echo $master->purreturn_master_phoneno;?>" />
                    </div>
                     <div class="col-sm-1">
                        <label class="exampleInputEmail1">REF NO:</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="refno"  class="form-control cleardata refnum"  value="<?php echo $master->purreturn_master_ref_no;?>" />
                    </div>

                    <div class="col-sm-4" style="display:none;" id="demo">
                        
                        <span id="estimate"><input  type="radio" name="esdemo" value="1" id="est_value" class="refnumbill"></span>
                        <span id="demobill"><input type="radio" name="esdemo" value="2" class="refnumbill" id="demo_value"></span>
                        <button type="button" class="btn btn-sm btn-success" id="reset"><i class="fa fa-refresh"></i></button>
                    </div>
                    <div class="col-sm-1">
                        <label class="exampleInputEmail1">EWB NUMBER:</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="ewb_num" id="ewb_num"  class="form-control cleardata" value="<?php echo $master->purreturn_master_ewbno;?>"/>
                    </div>
                    <div class="col-sm-1">
                        <label class="exampleInputEmail1">VEHICLE NUMBER:</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="vehicle_num"  class="form-control cleardata"  value="<?php echo $master->purreturn_master_vehicleno;?>"/>
                    </div>
                    
                    
                    
                    </div>
                    <div class="col-sm-12" style="margin-top: 20px;">

                       <div class="col-sm-1">
                            <label class="exampleInputEmail1">LIST BILLNUMBER:</label>
                        </div>
                        <div class="col-sm-2">
                           <input type="text" readonly  class="form-control" name="listbillno" id="listbillno" value="<?php echo $master->purreturn_master_billno;?>" >
                        </div>
                        <div class="col-sm-1">
                            <label class="exampleInputEmail1">SUP-CRN NUMBER:</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="supcrn_num" id="supcrn_num" class="form-control cleardata" value="<?php echo $master->purreturn_master_sub_crnno;?>"/>
                        </div>
                        <div class="col-sm-1">
                           <label class="exampleInputEmail1">IS IGST</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="checkbox" name="isigst" id="isigst" value="1" <?php if($master->purreturn_master_is_igst==1){echo 'checked';}?>>
                            
                        </div>
                        <div class="col-sm-1">
                            <label class="exampleInputEmail1">GST NUMBER:</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="gst_num" id="gst_number_new"  class="form-control cleardata" value="<?php echo $master->purreturn_master_gstnum;?>"/>
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
                            
                            <th scope="col">QTY</th>
                            <th scope="col">UNIT PRICE</th>
                            
                            
                            <th scope="col">TAXABLE AMOUNT</th>
                            <th scope="col">GST %</th>
                            <th scope="col">GST AMOUNT</th>
                            <th scope="col">AMOUNT</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="sales_cont">
                            <?php $i=1;foreach($transe as $trans){ ?>
                            <tr id="detailRow_<?php echo $i;?>"  data-row="<?php echo $i;?>">
                                <th scope="row" class="slno"><?php echo $i;?></th>

                            <td>
                            <input type="hidden"  class="form-control cleardata" id="qtyinventory_<?php echo $i;?>"
                                    data-order="<?php echo $i;?>" style="float:left" value="<?php echo $trans->cur_stock_item_count;?>" >
									<input type="hidden"  class="form-control cleardata" id="transid_<?php echo $i;?>"
                                    data-order="<?php echo $i;?>" style="float:left" value="<?php echo $trans->purreturn_trans_id;?>" >
                            <input type="hidden" name="itemid[]" value="<?php echo $trans->purreturn_item_id;?>" class="form-control itemid cleardata" id="itemtbid_<?php echo $i;?>" data-order="<?php echo $i;?>" style="width:70px;" >
                           
                            <input type="hidden" name="hsn_tax[]" value="<?php echo $trans->purreturn_trans_gst_percentage;?>" class="hsn_tax cleardata" id="hsn_tax_<?php echo $i;?>" data-order="<?php echo $i;?>" value="">
                            <input type="text" name="itemcode[]" value="<?php echo $trans->itm_code;?>" class="form-control codeItem cleardata" id="code_<?php echo $i;?>" data-order="<?php echo $i;?>" style="width:70px;" >
                            <input type="hidden"  class="form-control cleardata" id="itemoldqty_<?php echo $i;?>"
                                    data-order="<?php echo $i;?>" style="float:left" value="<?php echo $trans->purreturn_trans_qty;?>" >
							
							<div id="code_list_<?php echo $i;?>" style="position: absolute;z-index: 99;"></div>
                            </td>
                            <td><input type="text" name="itemname[]" value="<?php echo $trans->itm_name;?>" class="form-control nameItem cleardata" id="itemname_<?php echo $i;?>" data-order="<?php echo $i;?>" style="width:140px;" required >
                            <div id="name_list_<?php echo $i;?>" style="position: absolute;z-index: 99;"></div>
                            </td>
                            <td>
                                <?php $itemid=$trans->purreturn_item_id;
                                $batchFetch=$this->Admin_model->get_batchoption($itemid);?>
                                <select name="itembatchid[]" class="form-control itemBatch cleardata" id="itembatchid_<?php echo $i;?>" placeholder="Batch" data-order="<?php echo $i;?>" >
                                    <option value="">Select Batch</option>
                                    <?php foreach($batchFetch as $batchFetch){?>
                                        <option value="<?php echo $batchFetch->batch_id;?>" <?php if($batchFetch->batch_id==$trans->purreturn_item_batch_id){echo 'selected';}?>><?php echo $batchFetch->batchcode;?>(<?php echo $batchFetch->cur_stock_item_count;?>)</option>
                                       
										<?php } ?>
                                </select>
                            </td>
                            
                            <td><input step=".01"  type="text" min="0"  name="itemqnty[]" value="<?php echo $trans->purreturn_trans_qty;?>" class="form-control qnty qntynew cleardata"   id="itemqty_<?php echo $i;?>" data-order="<?php echo $i;?>" ></td>
                            <td><input type="text" required name="unitprice[]" value="<?php echo $trans->purreturn_trans_rate;?>"  class="form-control unitprice unitpricenew cleardata"
                                    id="unitprice_<?php echo $i;?>" data-order="<?php echo $i;?>" data-toggle="tooltip" trigger="manual"></td>
                                    <input type="hidden" value="<?php echo $trans->purchasereturn_trans_mrp;?>" name="mrp[]" class="form-control mrp cleardata"
                                    id="mrp_<?php echo $i;?>" data-order="<?php echo $i;?>" data-toggle="tooltip" trigger="manual" >
                        
                                <td><input type="text" value="<?php echo $trans->purreturn_trans_taxable_value;?>" name="itemtaxable[]" readonly class="form-control cleardata taxableAmount" id="taxable_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" ></td>

                            <td><input type="text" value="<?php echo $trans->hsn_tax;?>"  name="itemgstper[]" readonly class="form-control cleardata"  id="gstper_<?php echo $i;?>" data-order="<?php echo $i;?>" >
                            <input type="hidden" name="sellingrate[]" value="<?php echo $trans->purreturn_trans_rate;?>"  class="form-control sellingrate cleardata cleardata1" id="sellingrate_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" required>
                                  <input type="hidden" name="itemhsncode[]" value="<?php echo $trans->hsn_id;?>" class="form-control itemhsncode cleardata" id="hsncode_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" ></td>
                            <td><input type="text" name="itemgstamount[]" value="<?php echo $trans->purreturn_trans_gst_amount;?>" readonly class="form-control gstAmount cleardata" id="gstAmount_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" ></td>
                            <td><input type="text" name="itemtotalamount[]" readonly value="<?php echo $trans->purreturn_trans_total;?>" class="form-control totalAmount cleardata" id="totalAmount_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" required></td>
                            <td>
                           
                                <i class="fa fa-trash detailDeleteRow1" onclick="deletechecked()" data-row="<?php echo $i;?>" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>
                            </td>
                            </tr>
                            
                            <?php $i++; } ?>
                        
                        </tbody>
                    </table>
					<button type="button" id="BtnNewRow" data-order="<?=count($transe);?>"
                        class="btn btn-info btn-sm">ADD</button>
					
                    </div>
                     <div class="col-sm-12" style="margin-top: 20px;">
                     <div class="col-sm-6">
                     <div class="col-sm-12">
                     <div class="col-sm-2">
                        <label class="exampleInputEmail1">NOTES</label>
                    </div>
                    <div class="col-sm-4">
                        <textarea name="notes" class="form-control cleardata"><?php echo $master->purreturn_master_notes;?></textarea>
                     </div>
                
                      </div>
                      <div class="col-sm-12">
                
                      </div>
                      <div class="col-sm-12">
                      
                      </div>
                     </div>
                     
                      <div class="col-sm-6">
                      <div class="col-sm-12">
                    
                    
                      </div>
                      <div class="col-sm-12">
                      
                    
                      </div>
                    <div class="col-sm-12">
                    
                    </div>
                    <div class="col-sm-12">
                    
                    </div>
                    <div class="col-sm-12">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-2">
                        <label class="exampleInputEmail1">TAXABLE AMOUNT</label>
                    </div>
                    <div class="col-sm-4">
                      <input type="text" name="totalTaxableAmount"  value="<?php echo $master->purreturn_master_taxable_value;?>" readonly  id="totalTaxableAmount" class="form-control cleardata"/>
                    </div>
                    <div class="col-sm-6"></div>
                    <div class="col-sm-2">
                        <label class="exampleInputEmail1">GST AMOUNT</label>
                    </div>
                    <div class="col-sm-4">
                       <input type="text" name="amountGst" value="<?php echo $master->purchase_return_gstamount;?>"  readonly  id="amountGst" class="form-control cleardata "/>
                    </div>
                    <div class="col-sm-6"></div>
                    <div class="col-sm-2">
                        <label class="exampleInputEmail1">ROUND OFF</label>
                    </div>
                    <div class="col-sm-4">
                       <input type="text" readonly name="roundOfValuue"  value="<?php echo $master->purreturn_master_roundoff;?>" id="roundOfValuue" class="form-control cleardata"/>
                    </div>
                    </div>
                    <div class="col-sm-12" style="margin-top:10px;">
                
                    <div class="col-sm-6"></div>
                    <div class="col-sm-2">
                        <label class="exampleInputEmail1">GRAND TOTAL</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" readonly  value="<?php echo $master->purreturn_master_grandtotal;?>" name="grandTotal" id="grandTotal" class="form-control cleardata"/>
                    </div>
                    </div>
                      </div>
                        
                    
                    </div>
                    
                   
                    <div class="col-sm-6" style="margin-top: 20px;">
                        
                    <div class="col-sm-2">
                        <a href="<?php echo base_url('purchaseretuenprint/').$master->purreturn_master_id;?>"><button type="button" class="btn btn-primary btn-sm">PRINT</button></a>
                    </div>
                    <input type="hidden" name="savetype" id="savetype" />
                    <div class="col-sm-2">
                        <button type="submit"  id="saveonly"  name="submit" class="btn btn-success btn-sm">ADD ON</button>
                    </div>
                    <div class="col-sm-2">
                        <button type="button"  id="savemasterchange" class="btn btn-info btn-sm">SAVE</button>
                    </div>
                    
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-warning btn-sm reset">CLAR</button>
                    </div>
                    
                    </div>
                    

                    <div class="modal-footer">
                    
                    </div>
                </div>
                </form>
             
            </div>
        

		<!-- Edit Modal -->
		<div class="modal fade" id="editModal" role="dialog">

			<div class="modal-dialog modal-lg" style="width:100%;">

				<!-- Modal content-->

				<div class="modal-content">

					<div class="modal-header">

						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Purchase</h4>
					</div>

					<div class="">
						<div id="purchaseedit_content"></div>
					</div>

					<div class="modal-footer">

						<button type="button" class="btn btn-default"

							data-dismiss="modal">Close</button>

					</div>

				</div>

			</div>

		</div>
	 <!-- Edit Modal End -->

    </section>

	<script>

function deletechecked() {

	if (confirm("Do you really want to delete this Item?")) {

		$('#sales_cont').on('click', '.detailDeleteRow1', function () {
	var rowNumber = $(this).data('row');
	var id=$(this).data('row');


	
	var sid=$('#sale_id').val();
	var tid=$('#transid_'+rowNumber).val();
	var item=$('#itemtbid_'+rowNumber).val();
	var batch=$('#itembatchid_'+rowNumber).val();
	var itemqty=$('#itemqty_'+rowNumber).val();
		

		// alert(tid);
		

	$.ajax({

		type: "POST",
		url: '<?php echo site_url('AdminController/purchasereturneditdeleterow');?>',
		data: {tid:tid,item:item,batch:batch,itemqty:itemqty
		},

		success: function(res) {

	$('#detailRow_' + rowNumber).remove();
	var rowStart = 1;
	$('.slno').each(function () {
		$(this).html(rowStart); 
		rowStart = rowStart + 1;
	});
	calcamount();
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
						url: '<?php echo site_url('AdminController/purchasereturndeleterowedit');?>',
						data: {note:note,vehiclenumber:vehiclenumber,outstanding:outstanding,
			paymod1:paymod1,paidamount:paidamount,deliverychare:deliverychare,totalTaxableAmount:totalTaxableAmount,
			amountGst:amountGst,cessAmount:cessAmount,roundOfValuue:roundOfValuue,grandTotal:grandTotal,discount:discount,
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
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
  
  function calcamount(){

     var totalTaxableAmount = 0;
     var totalcessAmount = 0;
     var totalgstAmount = 0;
     var grandTotal = 0;
     var quantity = 0;
     var discount = 0;
     var roundoff = 0;
     var tax = 0;
     var extradiscount = 0;
	 var othercharge = 0;
     if($('#discount').val()!=''){
		
         discount = $('#discount').val();
     }
     if($('#extradiscount').val()!=''){
         extradiscount = $('#extradiscount').val();
     }
	 if($('#othercharge').val()!=''){
		othercharge = $('#othercharge').val();
     }
    
	 var qty = 0;
	 $('.rate').each(function( index ) {
        if($(this).val() !=''){
			var order = $(this).data('order');
			qty = $('#quantity_'+order).val();
            totalTaxableAmount = totalTaxableAmount+parseFloat($(this).val()*qty);
        }
     });
	 
   

   var totaltaxamount=0;
					$('.taxableAmount').each(function( index ) {
         if($(this).val() !=''){
            totaltaxamount=parseFloat(totaltaxamount)+parseFloat($(this).val());
         }
     });
					$('#totalTaxableAmount').val(Math.round(totaltaxamount));

	 //Update total discount value
	 var discount_applied = 0;
	 var discount = 0;
	 var qnty = 0;
	 var subtotal = 0;
	 $('.discount').each(function( index ) {

        if($(this).val() !=''){
			
			var order 	= 	$(this).data('order');
			qnty 		= 	$('#quantity_'+order).val();
			discount 	=	$(this).val();

			var radioValue = $("input[name='optradio_"+order+"']:checked").val();
			
			$('#discount_type_'+order).val(radioValue);
			if(radioValue == 'percent'){//console.log('percent>>');

				//calculate discount %wise of subtotal (totalAmount) -Niby
				var subtotal1 			= parseFloat($('#rate_'+order).val()*qnty)+parseFloat($('#tax_'+order).val()); 
				subtotal =parseFloat($('#rate_'+order).val()*qnty);
				//console.log('subtotal>>');console.log(subtotal);console.log(typeof subtotal); console.log(typeof parseFloat(discount));
				discount_applied 	= parseFloat(discount_applied) + (parseFloat(subtotal) * parseFloat(discount)|| 0 ) /100;
				//console.log('discount_applied>>');console.log(discount_applied);
			}
			else if(radioValue == 'cash'){//console.log('cash>>');
				
				discount_applied = parseFloat(discount_applied) + (parseFloat(discount)|| 0);//console.log(discount_applied);
				//console.log('discount_applied>>');console.log(discount_applied);
			}
        }
     });
	 $('#discount').val(parseFloat(discount_applied).toFixed(2));


     $('.quantity').each(function( index ) {
         if($(this).val() !=''){
            quantity=quantity+parseFloat($(this).val());
         }
     });
     $('#totalqnty').val(quantity);
     $('.tax').each(function( index ) {
         if($(this).val() !=''){
            tax=tax+parseFloat($(this).val());
         }
     });
     $('#totaltax').val(tax.toFixed(2));
     $('.totalAmount').each(function( index ) {
         if($(this).val() !=''){
            grandTotal=grandTotal+parseFloat($(this).val());console.log($(this).val());
         }
     });

	 var totalgstamounttotal=0;
					$('.gstAmount').each(function( index ) {
         if($(this).val() !=''){
            totalgstamounttotal=parseFloat(totalgstamounttotal)+parseFloat($(this).val());
         }
     });

	 $('#amountGst').val(Math.round(totalgstamounttotal));

	var totalgrand=0;
					$('.totalAmount').each(function( index ) {
         if($(this).val() !=''){
            totalgrand=parseFloat(totalgrand)+parseFloat($(this).val());
         }
     });
					$('#grandTotal').val(Math.round(totalgrand));
     $('#roundOfValuue').val((grandTotal%1).toFixed(2));


  }//calcamount end
  
  function autosave(id){
	  

 var code=$('#code_'+id).val();
 var itemqty=$('#itemqty_'+id).val();
 var taxable=$('#taxable_'+id).val();
 var hsncode=$('#hsncode_'+id).val();
 var gstper=$('#gstper_'+id).val();
 var gstamount=$('#gstAmount_'+id).val();
 var cess=$('#cessAmount_'+id).val();
 var total=$('#totalAmount_'+id).val();
 var item=$('#itemtbid_'+id).val();
 var batch=$('#itembatchid_'+id).val();
 var employee=$('#employee_'+id).val();
 var unitprice=$('#unitprice_'+id).val();

 var mrp=$('#mrp_'+id).val();
 var tid=$('#transid_'+id).val();
 var sid=$('#sale_id').val();
 var oqty=$('#itemoldqty_'+id).val();
 var pcost=$('#pcost_'+id).val();
 var supplier=$('#supplierselect').val();
 var listbill=$('#listbillno').val();

//alert(listbill);

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
	var  phone_num=$('#phone_num').val();
	var  supcrn_num=$('#supcrn_num').val();
	var  ewb_num=$('#ewb_num').val();
	var  supadd=$('#supadd').val();
	var  gst_number_new=$('#gst_number_new').val();
	var billno=$('#debitnote_no').val();
	
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
url: '<?php echo site_url('AdminController/purchasereturneditnew');?>',
data: {
	listbill:listbill,billno:billno,gst_number_new:gst_number_new,supadd:supadd,ewb_num:ewb_num,supcrn_num:supcrn_num,phone_num:phone_num,supplier:supplier,code:code,itemqty:itemqty,taxable:taxable,hsncode:hsncode,gstper:gstper,gstamount:gstamount,cess:cess,
	total:total,item:item,batch:batch,employee:employee,unitprice:unitprice,
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


   $('#BtnNewRow').on('click',function(){
      var rowStart = 1;
      $('.slno').each(function () {
				$(this).html(rowStart);
				rowStart = rowStart + 1;
			});
			$newrow=$('#BtnNewRow').data('order')+1;
			$('#BtnNewRow').data('order', $newrow);
      var current_row = $newrow;
	  //var current_row = parseInt($("#sales_contedit tr").last().attr("data-row")) + 1;

      var new_row = '<tr id="detailRow_'+current_row+'" data-row="'+current_row+'"> <th scope="row" class="slno">'+rowStart+'</th>';
	  new_row+= '<td><input required type="hidden"   value="0" class="form-control  " id="qtyinventory_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input type="hidden" name="itemid2[]" class="form-control itemid cleardata" id="itemtbid_'+current_row+'" data-order="'+current_row+'" style="width:70px;" > <input required type="text" name="itemcode2[]" class="form-control codeItem cleardata"  id="code_'+current_row+'" data-order="'+current_row+'" style="width:70px;"><div id="code_list_'+current_row+'"></div></td>';
      new_row+= '<td><input required type="text" name="itemname2[]" class="form-control nameItem cleardata" id="itemname_'+current_row+'" data-order="'+current_row+'" style="width:140px;"><div id="name_list_'+current_row+'"></div></td>';
	  new_row+= '<td><select name="itembatchid2[]" class="form-control itemBatch cleardata" id="itembatchid_'+current_row+'" data-order="'+current_row+'" placeholder="Batch"><option value="">Select Batch</option></select></td>';
     
	  new_row+= '<td><input step=".01"  type="text" min="0"  name="itemqnty2[]" class="form-control qnty cleardata" id="itemqty_'+current_row+'" data-order="'+current_row+'" ></td>';
      new_row += '<td><input required type="text" name="unitprice2[]" class="form-control unitprice cleardata " data-toggle="tooltip" trigger="manual" id="unitprice_' + current_row + '" data-order="' + current_row + '" ><input required type="hidden"  value="0" name="mrp2[]" class="form-control mrp cleardata " data-toggle="tooltip" trigger="manual" id="mrp_' + rowStart + '" data-order="' + rowStart + '" ></td>';
     
	
      new_row+= '<td><input type="text" name="itemtaxable2[]" readonly class="form-control cleardata taxableAmount" id="taxable_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><input type="text" name="itemgstper2[]" readonly class="form-control cleardata" id="gstper_'+current_row+'"  data-order="'+current_row+'"><input required type="hidden" value="0" name="sellingrate2[]" class="form-control sellingrate cleardata cleardata1" id="sellingrate_'+rowStart+'" data-value="" data-order="'+rowStart+'"><input type="hidden" name="itemhsncode2[]" class="form-control cleardata itemhsncode" id="hsncode_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
      new_row+= '<td><input type="text" name="itemgstamount2[]" readonly class="form-control cleardata gstAmount" id="gstAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><input required type="text" name="itemtotalamount2[]" class="form-control cleardata totalAmount cleardata" id="totalAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td>';
    
      new_row+= '<i data-row="'+current_row+'" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
      new_row+= '</td></tr>';

      $('#sales_cont').append(new_row);
     
      $('#BtnNewRow').data('order',current_row);
      
  });
  
  $('#sales_cont').on('click','.detailDeleteRow',function(){
      var rowNumber = $(this).data('row');
      $('#detailRow_'+rowNumber).remove();
      var rowStart = 1;
      $('.slno').each(function(){
          $(this).html(rowStart);
          rowStart++;
      });
   
	
       calcamount();
  });
  
  $('#sales_cont').on('click','.detailEraseRow',function(){
      var rowNumber = $(this).data('row');
       $('#detailRow_'+rowNumber+' select').prop('selectedIndex',0);
       $('#detailRow_'+rowNumber+' input[type=hidden]').val('');
	   $('#detailRow_'+rowNumber+' input[type=text]').val('');

       calcamount();
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
				success:function(res){//console.log(res);
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
					console.log(batchlist);
					var i;
					var optiondata= '<option value="">Select</option>';
					for(i=0;i<batchlist.length;i++){
						
						optiondata += '<option value="'+batchlist[i].batch_id+'">'+batchlist[i].batchcode+'('+batchlist[i].cur_stock_item_count+')</option>';

					}
					
					$('#itembatchid_'+id).html(optiondata);
					$('#code_'+id).val(batchlist[0].itm_code);
			        $('#itemname_'+id).val(batchlist[0].itm_name);
					$('#itemtbid_'+id).val(batchlist[0].itm_id);
				}
     })
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
//alert(obj.inventory_stock_itemcount);
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
				$('#itemoldqty_'+id).val(0);
				var obj = JSON.parse(res);
				$('#hsncode_'+id).val(obj.hsn_code);

				if(parseInt(obj.cur_stock_item_count)<parseInt(1)){
						$('#itemqty_'+id).css({"border":"1px solid red"});
					}else{
						$('#itemqty_'+id).css({"border":"1px solid #d2d6de"});
					}
				// if(obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28){
				//     var taxableAmount = (parseInt(obj.t_sr)/(100+(parseInt(obj.hsn_tax)))*100).toFixed(2);
				// }
				

				if ((obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28) ) {//&& ! $('#isigst').is(":checked")
					if(obj.t_pc==0.00){
							var taxableAmount = (parseFloat(obj.e_pc) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
							
						}else{
							var taxableAmount = (parseFloat(obj.t_pc) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
						}
						
				}
				else {
					if(obj.t_pc==0.00 ){
							var taxableAmount = (parseFloat(obj.e_pc) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
						}else{
							var taxableAmount = (parseFloat(obj.t_pc) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
						
						}
				}
				//alert(taxableAmount);
				var gstAmount = ((taxableAmount*parseFloat(obj.hsn_tax))/100).toFixed(2);

              
				if(obj.t_pc==0.00){
						$('#pcost_' + id).val(obj.e_pc);
					$('#percost_' + id).val(obj.e_pc);
					$('#mop_'+id).val(obj.e_mop);
					$('#unitprice_'+id).val(obj.e_pc);
					$('#totalAmount_' + id).val(obj.e_pc);
					$('#totalAmount_' + id).attr('data-value', obj.e_pc);
					$('#sellingrate_'+id).val(obj.e_pc);
					$('#mrp_'+id).val(obj.e_mrp);
					}
					
					else{
						$('#pcost_' + id).val(obj.t_pc);
					$('#percost_' + id).val(obj.t_pc);
					$('#mop_'+id).val(obj.t_mop);
					$('#unitprice_'+id).val(obj.t_pc);
					$('#totalAmount_' + id).val(obj.t_pc);
					$('#totalAmount_' + id).attr('data-value', obj.t_pc);
					$('#sellingrate_'+id).val(obj.t_pc);
					$('#mrp_'+id).val(obj.t_mrp);
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
				calcamount();
				
               
				},
		});
 
  });

  $('.refnumbill').on('click',function(){
	  
	$(".cleardata").val("");
	if ($("#demo_value").prop("checked")) {
		var demo=$('#demo_value').val();
		}else if(("#est_value").prop("checked")){
		var demo=$('#est_value').val();
		}
		var id = $(this).data('order');
    	 var itemValue = $(this).val();

  });
  $('#sales_cont').on('keyup','.unitprice',function(){

			var order = $(this).data('order');
			var qnty = $('#itemqty_'+order).val();
			var mop=$('#mop_'+order).val();
			var inqty=$('#qtyinventory_'+order).val();
			//alert(inqty);

			//	alert(mop);
			var totalTaxableAmount = 0;
			var totalcessAmount = 0;
			var totalgstAmount = 0;
			var deliverycharge = 0;
			var discount = 0;
		
			
				

				var item_hsn_tax = $('#gstper_'+order).val();
				var unitprice = $(this).val();
				var taxableAmount = 0;
				if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
					var taxableAmount = (parseFloat(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
				}
				else {
					var taxableAmount = (parseFloat(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
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


				$('#qtymop_'+order).val(qnty*mop);
				calcamount();
				
			
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
					var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
				}
				else {
					var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
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


				$('#qtymop_'+order).val(qnty*mop);

				calcamount();
				
			
			
			

		});

$('#sales_cont').on('change', '.qntynew', function () {
var order = $(this).data('order');
autosave(order);
  });

  $('#sales_cont').on('change', '.unitpricenew', function () {
var order = $(this).data('order');
autosave(order);
  });
  
  $('#sales_cont').on('keyup','.discount',function(){ 
	
    var order = $(this).data('order');
	//alert(order);
    var qnty = $('#quantity_'+order).val();
   var radioValue = $("input[name='optradio_"+order+"']:checked").val();

   
    var tax = $('#tax_'+order).data('value');
    var taxper = $('#tax_'+order).data('tax');
    var taxdiscount = 0;
    var totaldiscount = 0;
	var subtotal = 0;
    var discount = $('#discount_'+order).val();//console.log(tax+'-->');console.log(radioValue);
	
	if(discount!=''){
		if(radioValue == 'percent'){
		
			subtotal = parseFloat($('#rate_'+order).val()*qnty)+parseFloat($('#tax_'+order).val()); 
			totaldiscount = ((parseFloat(subtotal)*parseFloat(discount)|| 0)/100).toFixed(2);
			subtotal_discount_applied = parseFloat(subtotal) - parseFloat(totaldiscount);
			var subtotalvalue=parseFloat($('#rate_'+order).val()*qnty)-totaldiscount;
			var qtyprice=parseFloat($('#rate_'+order).val()*qnty);
			var discountvalue=((parseFloat(qtyprice)*parseFloat(discount)|| 0)/100).toFixed(2);
			
			
			var discounde_value=parseFloat(qtyprice) - parseFloat(discountvalue);
			var taxvalue = (( discounde_value * $('#hsn_tax_'+order).val() )/100).toFixed(2);
			var discounttaxvalue=parseInt(discounde_value)+parseInt(taxvalue);
			$('#totalAmount_'+order).val(discounttaxvalue.toFixed(2));
			$('#tax_'+order).val(taxvalue);
			$('#tax_'+order).attr('data-value', taxvalue);
		}
		else if(radioValue == 'cash'){
		
			subtotal = parseFloat($('#rate_'+order).val()*qnty)+parseFloat($('#tax_'+order).val()); 
			var qtyprice=parseFloat($('#rate_'+order).val()*qnty);
			subtotal_discount_applied = parseFloat(qtyprice) - parseFloat(discount);
			var taxvalue = (( subtotal_discount_applied * $('#hsn_tax_'+order).val() )/100).toFixed(2);
			var discounttaxvalue=parseFloat(subtotal_discount_applied)+parseFloat(taxvalue);
			alert(discounttaxvalue);
			$('#totalAmount_'+order).val(Math.round(discounttaxvalue.toFixed(2)));
		}

		calcamount();
	}else{
		
		if(radioValue == 'percent'){
		
			subtotal = parseFloat($('#rate_'+order).val()*qnty)+parseFloat($('#tax_'+order).val()); 
			totaldiscount = ((parseFloat(subtotal)*parseFloat(0)|| 0)/100).toFixed(2);
			subtotal_discount_applied = parseFloat(subtotal) - parseFloat(totaldiscount);
			var qtyprice=parseFloat($('#rate_'+order).val()*qnty);
			var discountvalue=((parseFloat(qtyprice)*parseFloat(0)|| 0)/100).toFixed(2);
			var discounde_value=parseFloat(qtyprice) - parseFloat(discountvalue);
			var taxvalue = (( discounde_value * $('#hsn_tax_'+order).val() )/100).toFixed(2);
			var discounttaxvalue=parseInt(discounde_value)+parseInt(taxvalue);
			$('#totalAmount_'+order).val(Math.round(discounttaxvalue.toFixed(2)));
		}
		else if(radioValue == 'cash'){//console.log('entered');
		
			subtotal = parseFloat($('#rate_'+order).val()*qnty)+parseFloat($('#tax_'+order).val()); 
			var qtyprice=parseFloat($('#rate_'+order).val()*qnty);
			subtotal_discount_applied = parseFloat(qtyprice) - parseFloat(0);
			var taxvalue = (( subtotal_discount_applied * $('#hsn_tax_'+order).val() )/100).toFixed(2);
			var discounttaxvalue=parseInt(subtotal_discount_applied)+parseInt(taxvalue);
			$('#totalAmount_'+order).val(Math.round(discounttaxvalue.toFixed(2)));
		}


		calcamount();
	}

	var toltaxable=$('#totalTaxableAmount').val();
	var toldisc=$('#discount').val();
	var toltax=parseFloat(toltaxable)+parseFloat($('#totaltax').val());
	var tolgrand=parseFloat(toltax)-parseFloat(toldisc);

  });
  
  $('#extradiscount').on('keyup',function(){
      calcamount();
  });
  $('#othercharge').on('keyup',function(){
      calcamount();
  });

  $(document).ready(function() {
    $('#supplierselect').select2();

  });


$('#supplierselect').on('change',function(){
	var id=$(this).val();
	$.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/get_supplierdetails');?>',
			data: { id : id},
			success: function(res) {
				console.log(res);
				var obj = JSON.parse(res);
				//alert(res);
				$('#supadd').val(obj.sup_address);
				$('#gst_number_new').val(obj.sup_gst);
			}
	})
})

//==========Edited By Niby========//

$('.editpurchase').on('click', function() {

	var id = $(this).data('id');
	$('#purchaseedit_content').empty();

	if (id) {

		$.ajax({

			type: "POST",
			url: '<?php echo site_url('Admin/getpurchase_details');?>',
			data: {
				id: id
			},

			success: function(res) {
				//console.log(res);
				$('#purchaseedit_content').append(res);
			},

		});

	}

	$('#editModal').modal({
		backdrop: 'static',
		keyboard: false
	});
 
});

$('.viewpurchase').on('click', function() {

	var id = $(this).data('id');
	$('#purchaseedit_content').empty();

	if (id) {

		$.ajax({
			type: "POST",
			url: '<?php echo site_url('Admin/getpurchase_details');?>',
			data: {
				id: id
			},
			success: function(res) {
				//console.log(res);
				$('#purchaseedit_content').append(res);
				$('.action-btns').hide();
				
			},
		});
	}

	$('#editModal').modal({
		backdrop: 'static',
		keyboard: false
	});

});



$('#sales_cont').on('click','.editrowpurchasereturn',function(){
 
 var id=$(this).data('row');
 var code=$('#code_'+id).val();
 var itemqty=$('#itemqty_'+id).val();
 var taxable=$('#taxable_'+id).val();
 var hsncode=$('#hsncode_'+id).val();
 var gstper=$('#gstper_'+id).val();
 var gstamount=$('#gstAmount_'+id).val();
 var cess=$('#cessAmount_'+id).val();
 var total=$('#totalAmount_'+id).val();
 var item=$('#itemtbid_'+id).val();
 var batch=$('#itembatchid_'+id).val();
 var employee=$('#employee_'+id).val();
 var unitprice=$('#unitprice_'+id).val();

 var mrp=$('#mrp_'+id).val();
 var tid=$('#transid_'+id).val();
 var sid=$('#sale_id').val();
 var oqty=$('#itemoldqty_'+id).val();
 var pcost=$('#pcost_'+id).val();
 var supplier=$('#supplierselect').val();
 var listbill=$('#listbillno').val();

alert(listbill);

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
	var  phone_num=$('#phone_num').val();
	var  supcrn_num=$('#supcrn_num').val();
	var  ewb_num=$('#ewb_num').val();
	var  supadd=$('#supadd').val();
	var  gst_number_new=$('#gst_number_new').val();
	var billno=$('#debitnote_no').val();
	
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
url: '<?php echo site_url('AdminController/purchasereturneditnew');?>',
data: {
	listbill:listbill,billno:billno,gst_number_new:gst_number_new,supadd:supadd,ewb_num:ewb_num,supcrn_num:supcrn_num,phone_num:phone_num,supplier:supplier,code:code,itemqty:itemqty,taxable:taxable,hsncode:hsncode,gstper:gstper,gstamount:gstamount,cess:cess,
	total:total,item:item,batch:batch,employee:employee,unitprice:unitprice,
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





});

$('#savemasterchange').on('click',function(){
    var id=$('#sale_id').val();
	var billdate=$('#billdate').val();
	var ewaybillnum=$('#ewb_num').val();
	var deliverydate=$('#deliverydate').val();
	var customername=$('#customername').val();
	var customerid=$('#customerid').val();
	var phon_num=$('#phon_num').val();
	var address=$('#supadd').val();
	var deliveryaddress=$('#deliveryaddress').val();
	var transmode=$('#transmode').val();
	var financenew=$('#financenew').val();
	var cusid=$('#customerid').val();
	var supplierselect=$('#supplierselect').val();
	var supcrn_num=$('#supcrn_num').val();
	var gst_number_new=$('#gst_number_new').val();
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
				url: '<?php echo site_url('AdminController/purchaseditnewsave');?>',
				data: {
					gst_number_new:gst_number_new,supcrn_num:supcrn_num,supplierselect:supplierselect,id: id,billdate:billdate,ewaybillnum:ewaybillnum,deliverydate:deliverydate,customername:customername,
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


$(".reset").bind("click", function() {
		$(".cleardata").val("");
		});


$(".refnum").dblclick(function(){
 $('#demo').show();
});
$(".refnum").click(function(){
	$('#demo').hide();
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



//==========Edited By Niby  End========//
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
</script>

<script type="text/javascript" language="javascript" >

$('#reset').click(function() {

$('input[name="esdemo"]').prop('checked', false);

});

function validateForm() {

if (confirm("Do you really want to submit this purchase Return?")) {

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

