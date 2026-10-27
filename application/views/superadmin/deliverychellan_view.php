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


/* Modern blue-and-white redesign: presentation only */
.content-wrapper { background:#f4f7fb; }
.content-header { padding:20px 24px 8px; }
.content-header h1 { color:#17365d; font-weight:700; letter-spacing:.2px; }
.content-header h1 small { color:#4776a8; font-weight:600; }
.content-header .breadcrumb { background:transparent; }
.content { padding:0 20px 28px; }
.content .box { border-top:3px solid #2f6fb2; border-radius:10px; box-shadow:0 3px 16px rgba(27,61,97,.08); overflow:hidden; }
.content .box-header { padding:16px 20px; }
.content .box-body { padding:18px; }
.modal-content.salesedit_content, .content .modal-content { border:1px solid #e1eaf4; border-radius:9px; box-shadow:none; }
.modal-header { padding:16px 20px; background:#f0f6fd; border-bottom:1px solid #dce8f5; border-radius:8px 8px 0 0; }
.modal-title { color:#214f80; font-size:18px; font-weight:700; }
.content h4:not(.modal-title) { color:#214f80; font-weight:700; font-size:15px; border-bottom:1px solid #dce8f5; padding-bottom:9px; margin:8px 0 14px; }
.content label { color:#42566d; font-size:11px; font-weight:700; line-height:1.45; text-transform:uppercase; }
.content .form-control { min-height:34px; border:1px solid #d5dfeb; border-radius:5px; box-shadow:none; color:#26384b; background:#fff; font-size:12px; transition:border-color .15s, box-shadow .15s; }
.content .form-control:focus { border-color:#4c8ed4; box-shadow:0 0 0 2px rgba(76,142,212,.12); }
.content textarea.form-control { min-height:58px; resize:vertical; }
.content input[type=checkbox], .content input[type=radio] { accent-color:#2f6fb2; }
#sales_cont { background:#fff; }
#sales_cont tr { transition:background .15s; }
#sales_cont tr:hover { background:#f5f9fe; }
.content table.table { border:1px solid #dce6f1; border-radius:7px; border-collapse:separate; border-spacing:0; margin-bottom:12px; }
.content table.table thead th { background:#eaf2fb; color:#234d78; font-size:10px; font-weight:700; white-space:nowrap; padding:11px 8px; border-bottom:2px solid #d3e2f2; }
.content table.table tbody td, .content table.table tbody th { vertical-align:middle; padding:7px 6px; border-top:1px solid #e8eef5; }
.content table.table .form-control { min-width:65px; padding:5px 7px; }
.content .fa-floppy-o { color:#247a55; }
.content .detailEraseRow { color:#3978b8; }
.content .detailDeleteRow, .content .detailDeleteRow1 { color:#c44848; }
.content .fa-floppy-o, .content .detailEraseRow, .content .detailDeleteRow, .content .detailDeleteRow1 { padding:5px; border-radius:4px; }
.content .fa-floppy-o:hover, .content .detailEraseRow:hover, .content .detailDeleteRow:hover, .content .detailDeleteRow1:hover { background:#eaf2fb; }
.content .modal-footer { border-top:1px solid #e5edf5; }
@media (max-width:767px) {
 .content { padding:0 8px 18px; }
 .content-header { padding:14px 10px 5px; }
 .content .box-body { padding:10px; }
 .content .col-sm-1, .content .col-sm-2, .content .col-sm-4, .content .col-sm-6 { margin-bottom:7px; }
 .content table.table { min-width:980px; }
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
                    <!-- <div class="col-sm-1">
                        <label class="exampleInputEmail1">EWAY BILL NUMBER</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="ewaybillno" class="form-control " />
                    </div> -->
                    
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
                            <input type="text" name="transport_mode" id="transport_mode" class="form-control" value="<?php echo $data_master->dc_master_transpor_purpose;?>" />
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
                        <div class="col-sm-1">
                            <label class="exampleInputEmail1">GST NUMBER:</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="gstnumber" id="gst_num" class="form-control"  pattern=
                            "[A-Za-z0-9\s]+" maxlenght="15" value="<?php echo $data_master->deliverychellan_gst_number;?>"/>
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
                        <!--<th scope="col"><button type="button" class="btn btn-info btn-sm">DELETE</button></th>-->
                        <!--<th scope="col"><button type="button" class="btn btn-info btn-sm">CLEAR</button></th>-->
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
                        <input type="hidden"  class="form-control cleardata" value="<?php echo $single->inventory_stock_itemcount;?>" id="qtyinventory_<?php echo $i;?>"
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

                            <select name="itembatchid[]" style="width:77px;" class="form-control itemBatch" id="itembatchid_<?php echo $i;?>" placeholder="Batch" data-order="<?php echo $i;?>" required>
                            <?php foreach($itemvbatchfetch as $itemvbatchfetch){  ?>
                                <option value="<?php echo $itemvbatchfetch->batch_id ;?>" <?php if($itemvbatchfetch->batch_id==$single->deliverychellan_item_batch_id ){echo 'selected';}?>><?php echo $itemvbatchfetch->batchcode;?></option>  
                                <?php } ?>
                            </select>
                        </td>
                        <td><input type="text"  name="itemqnty[]" style="width:50px;" class="form-control qnty"  value="<?php echo $single->deliverychellan_trans_qty;?>"  id="itemqty_<?php echo $i;?>" data-order="<?php echo $i;?>" ></td>
                        <td><input type="text"  name="unitprice[]" class="form-control unitprice cleardata" style="width:100px;"
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
                        <i class="fa fa-floppy-o editrowdeliverychellan"  data-row="<?php echo $i;?>" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer;margin-right: 7px"></i>
                        <i class="fa fa-eraser detailEraseRow" data-row="<?php echo $i;?>" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer;margin-right: 7px"></i>
                        <i class="fa fa-trash detailDeleteRow1" onclick="deletechecked()" data-row="<?php echo $i;?>" aria-hidden="true"

style="font-size:15px;margin-top: 10px;cursor:pointer"></i>

                        </td>
                        </tr>
                        <?php $i++; } ?>
                    
                    </tbody>
                    </table>
                  
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
                        
                        <!-- <div class="col-sm-2">
                            <label class="exampleInputEmail1">OUT STANDING</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="hidden" name="outstanding_previous" id="outstanding_previous" value="0" >
                            <input type="text" name="outstanding" id="outstanding" class="form-control"/>
                        </div> -->
                    
                    
                    
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
                    <!-- <div class="col-sm-2">
                        <label class="exampleInputEmail1" style="margin-top:10px;" >AMOUNT</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="paidamount" id="paidamount" style="margin-top:10px;" class="form-control"/>
                    </div> -->
                    
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
                    <!-- <div class="col-sm-2">
                        <label class="exampleInputEmail1">GST AMOUNT</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="amountGst"  readonly  id="amountGst" class="form-control"/>
                    </div> -->
                    
                    
                    
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
                        <input type="text" name="grandTotal" value="<?php echo $data_master->deliverychellan_master_grandtotal;?>" id="grandTotal" class="form-control"/>
                    </div>
                    </div>
                    <!---->
                </div>
                </div>
                <div class="col-sm-12" style="margin-top:10px;" >
                    <div class="col-sm-6">
      


                    </div>
                        <!---->
                    
                
                    </div>


                  

                    <div class="modal-footer">
                        <!--<button type="button" name="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
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
     grandTotal = totalTaxableAmount+totalgstAmount;
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
    //  var paidamount = $('#paidamount').val();
    //  if(paidamount == ''){
    //     paidamount = 0;
	//  }
	//  var outstanding_previous = parseInt($('#outstanding_previous').val());
    //  $('#outstanding').val(outstanding_previous + parseInt(grandTotal)+parseInt(deliverycharge)-parseInt(discount)-parseInt(paidamount));
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
      var new_row = '<tr id="detailRow_'+current_row+'"> <th scope="row" class="slno">'+current_row+'</th>';
      new_row+= '<td><input type="hidden" value="0" name="purcost2[]" class="form-control cleardata" id="pcost_'+current_row+'" data-order="'+current_row+'" style="float:left" ><input required type="hidden"  value="0" class="form-control  " id="qtymop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden" value="0" class="form-control  " id="qtymop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden" value="0" class="form-control  " id="qtyinventory_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input type="hidden" name="itemid2[]" value="0" class="form-control " id="itemid_'+current_row+'" data-order="'+current_row+'" style="width:70px;" ><input type="text" name="itemcode2[]" class="form-control codeItem" style="width:90px;" codeItem" id="code_'+current_row+'" data-order="'+current_row+'" ><div id="code_list_'+current_row+'"></div></td>';
      new_row+= '<td><input type="text" name="itemnam2[]" class="form-control nameItem" id="itemname_'+current_row+'" data-order="'+current_row+'" ><div id="name_list_'+current_row+'"></div></td>';
      new_row += '<td><select name="itembatchid2[]" value="0" class="form-control itemBatch" style="width:77px;" id="itembatchid_'+current_row+'" data-order="'+current_row+'" placeholder="Batch"><option value="">Select Batch</option></select></td>';
      new_row+= '<td><input type="text" name="itemqnty2[]" style="width:50px;" value="0" class="form-control qnty" id="itemqty_'+current_row+'" data-order="'+current_row+'" ></td>';
      new_row += '<td><input required type="text" name="unitprice2[]" style="width:100px;" value="0" class="form-control unitprice cleardata " data-toggle="tooltip" trigger="manual" id="unitprice_' + current_row + '" data-order="' + current_row + '" ></td>';
	  new_row+= '<td><input type="text" name="itemtaxable2[]" readonly value="0" class="form-control taxableAmount" id="taxable_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
      new_row+= '<td><input type="text" name="itemgstper2[]" readonly value="0" class="form-control" id="gstper_'+current_row+'"  data-order="'+current_row+'"><input type="hidden" name="itemhsncode2[]" class="form-control itemhsncode" id="hsncode_'+current_row+'" data-value="" data-order="'+current_row+'" ><input required type="hidden" value="0"  name="itemgstamount2[]" readonly class="form-control gstAmount cleardata" id="gstAmount_' + current_row + '" data-value="" data-valuesingle="" data-order="' + current_row + '"></td>';
    
	 // new_row+= '<td><input type="text" name="itemgstamount[]" readonly value="0" class="form-control gstAmount" id="gstAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><input type="text" name="itemtotalamount2[]" readonly value="0" class="form-control totalAmount" id="totalAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
    //   new_row+= '<td><select name="employee[]" class="form-control" style="width:140px;"><?php //echo $namelist;?></select></td>';
      new_row+= '<td>';
      new_row+= '<i data-row="'+current_row+'" class="fa fa-eraser detailEraseRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer;margin-right: 7px"></i>';
      new_row+= '<i data-row="'+current_row+'" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
      new_row+= '</td></tr>';
      
      $('#sales_cont').append(new_row);
      console.log(current_row);
      $('#BtnNewRow').data('order',parseInt(current_row));
      
  })
  
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
  })
  
  $('#sales_cont').on('click','.detailEraseRow',function(){
      var rowNumber = $(this).data('row');
       $('#detailRow_'+rowNumber+' select').prop('selectedIndex',0);
       $('#detailRow_'+rowNumber+' input').val('');
       recalculate();
  })
  
   //Dynamic Row Adding Code
  
  $('#sales_cont').on('keyup','.gstAmount',function(){
      var gstAmount = 0;
      $('.gstAmount').each(function(){
          if($(this).val() != ''){
            gstAmount = parseInt(gstAmount) + parseInt($(this).val());
          }
      });
      
      $('#amountGst').val(gstAmount);
  })
  
  
  $('#sales_cont').on('keyup','.totalAmount',function(){
      var totalAmount = 0;
      $('.totalAmount').each(function(){
          if($(this).val() != ''){
            totalAmount = parseInt(totalAmount) + parseInt($(this).val());
          }
      });
      $('#totalAmount').val(totalAmount);
  })
  
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
  })
  
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
  })
  
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


  $('#sales_cont').on('keyup', '.unitprice', function () {
		//Compare with item_mop <

		var id = $(this).data('order');
		var unitprice = $(this).val();
				
		
		var qnty = $('#itemqty_'+id).val();
		var mop = $('#qtymop_'+id).val() / (qnty || 1);
		var minmop=$('#pcost_'+id).val();
		

		// 		//alert(id);
		// if(parseInt(unitprice)<parseInt(minmop)){

		// 	//alert("Total amount is greater than Item MOP : '"+mop+"'");
		// 	$(this).css("border","2px solid red");
		// 	$(this).css("color","red");
			
		// 	$(this).attr('title', "Total amount is less than Item MOP : '"+mop+"'")
		// 								.tooltip('fixTitle')
		// 								.tooltip('show');  

			

							
		// }
		// else{ 

			$(this).css("border","1px solid #ccc");
			$(this).css("color","#555");
			$(this).tooltip('hide');
			$(this).attr('data-original-title', '');


			var item_hsn_tax = $('#gstper_'+id).val();
			//alert(item_hsn_tax);
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
			$('#totalAmount_' + id).val((itemsubtotal).toFixed(2));	
			
			var totaltaxamount=0;
			    	$('.taxableAmount').each(function( index ) {
					if($(this).val() !=''){
						totaltaxamount=parseFloat(totaltaxamount)+parseFloat($(this).val());
         			}
                 });
				 $('#totalTaxableAmount').val(totaltaxamount.toFixed(2));
			var totalgrand=0;
					$('.totalAmount').each(function( index ) {
         if($(this).val() !=''){
            totalgrand=parseFloat(totalgrand)+parseFloat($(this).val());
         }
     });
					$('#grandTotal').val(Math.round(totalgrand));
			//recalculate();
			
		

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
 //$('#sales_cont').on('click','.subSelect_itemedit',function(){
 $('#sales_cont').on('change','.itemBatch',function(){ 	 

    //  var id = $(this).data('id');
    //  var itemValue = $(this).data('value');
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
					$('#qtyinventory_'+id).val(obj.inventory_stock_itemcount);
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
				$('#hsncode_'+id).val(obj.hsn_code);
				// if(obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28){
				//     var taxableAmount = (parseInt(obj.t_sr)/(100+(parseInt(obj.hsn_tax)))*100).toFixed(2);
				// }
				

				if ((obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28) ) {//&& ! $('#isigst').is(":checked")
					if(obj.t_sr==0.00){
							var taxableAmount = parseInt(obj.e_br);
						}
						// else if(obj.t_sr==0.00 && obj.e_sr==0.00){
						// 	var taxableAmount = (parseInt(obj.d_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						
						// }
						else{
							var taxableAmount = parseInt(obj.t_sr);
						}
						
				}
				else {
					if(obj.t_sr==0.00){
							var taxableAmount = parseInt(obj.e_sr);
						}
						
						// else if(obj.t_sr==0.00 && obj.e_sr==0.00){
						// 	var taxableAmount = (parseInt(obj.d_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						
						// }
						
						else{
							var taxableAmount = parseInt(obj.t_sr);
						
						}
				}
				var gstAmount = ((taxableAmount*parseInt(obj.hsn_tax))/100).toFixed(2);


				if(obj.t_sr==0.00){
						$('#pcost_' + id).val(obj.e_pc);
					$('#percost_' + id).val(obj.e_pc);
					$('#mop_'+id).val(obj.e_mop);
					$('#unitprice_'+id).val(obj.e_br);
					$('#totalAmount_' + id).val(obj.e_br);
					$('#totalAmount_' + id).attr('data-value', obj.e_sr);
					}
					
					
					
					else{
						$('#pcost_' + id).val(obj.t_pc);
					$('#percost_' + id).val(obj.t_pc);
					$('#mop_'+id).val(obj.t_mop);
					$('#unitprice_'+id).val(obj.t_br);
					$('#totalAmount_' + id).val(obj.t_sr);
					$('#totalAmount_' + id).attr('data-value', obj.t_sr);
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
			  
			 
			  		var totaltaxamount=0;
			    	$('.taxableAmount').each(function( index ) {
					if($(this).val() !=''){
						totaltaxamount=parseFloat(totaltaxamount)+parseFloat($(this).val());
         			}
                 });
				
                 $('#totalTaxableAmount').val(Math.round(totaltaxamount));

                 $('.gstAmount').each(function( index ) {
                     ///totalgstAmount=totalgstAmount+parseFloat($(this).val());
					 if($(this).val() !=''){
						totalgstAmount=parseFloat(totalgstAmount)+parseFloat($(this).val());
         			}
                 });
			
                 $('#amountGst').val(Math.round(totalgstAmount));

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
				 deliverycharge = 0;
				 discount = 0;
				 var totalgrand=0;
					$('.totalAmount').each(function( index ) {
         if($(this).val() !=''){
            totalgrand=parseFloat(totalgrand)+parseFloat($(this).val());
         }
     });
					$('#grandTotal').val(Math.round(totalgrand));
               //  $('#grandTotal').val(Math.round(grandTotal));
				 //recalculate();
				 calc_outstanding();
                //  var paidamount = $('#paidamount').val();
                //     if(paidamount == ''){
                //         paidamount = 0;
				// 	}
				// 	var outstanding_previous = parseInt($('#outstanding_previous').val());
                //     $('#outstanding').val(outstanding_previous + parseInt(grandTotal)+parseInt(deliverycharge)-parseInt(discount)-parseInt(paidamount));
				},
		});
 }) 
 
$('#deliverychare').on('keyup',function(){
    recalculate();
});

$('#discount').on('keyup',function(){
    recalculate();
});
 
$('#sales_cont').on('keyup','.qnty',function(){
    var qnty = $(this).val();
    var order = $(this).data('order');
	var inqty=$('#qtyinventory_'+order).val();
    var totalTaxableAmount = 0;
    var totalgstAmount = 0;
    var deliverycharge = 0;
    var discount = 0;
	var inqty=$('#qtyinventory_'+order).val();
	if(parseInt(inqty)>=parseInt(qnty)){
				$('#itemqty_'+order).css({"border":"1px solid #d2d6de"});
			}else if(parseInt(inqty)<parseInt(qnty)){
				$('#itemqty_'+order).css({"border":"1px solid red"});
			
			}
	if(parseInt(inqty)<parseInt(qnty)){
				$('#itemqty_'+order).css({"border":"1px solid red"});
			}else if(parseInt(inqty)>parseInt(qnty)){
				$('#itemqty_'+order).css({"border":"1px solid #d2d6de"});
			}
    if(qnty != '' && qnty!=0){
     $('#taxable_'+order).val((qnty*$('#taxable_'+order).data('value')).toFixed(2));
    
     $('#totalAmount_'+order).val((qnty*$('#taxable_'+order).data('value')).toFixed(2));
	 var totaltaxamount=0;
			    	$('.taxableAmount').each(function( index ) {
					if($(this).val() !=''){
						totaltaxamount=parseFloat(totaltaxamount)+parseFloat($(this).val());
         			}
                 });

     $('#totalTaxableAmount').val(totaltaxamount.toFixed(2));
	
     $('.gstAmount').each(function( index ) {console.log($(this).val());
         totalgstAmount=totalgstAmount+parseFloat($(this).val());
     });
     $('#amountGst').val(totalgstAmount.toFixed(2));
     grandTotal = totalTaxableAmount+totalgstAmount;
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
    // $('#grandTotal').val(Math.round(grandTotal));

	var totalgrand=0;
					$('.totalAmount').each(function( index ) {
         if($(this).val() !=''){
            totalgrand=parseFloat(totalgrand)+parseFloat($(this).val());
         }
     });
					$('#grandTotal').val(Math.round(totalgrand));
	 
	// recalculate();
    //  var paidamount = $('#paidamount').val();
    // if(paidamount == ''){
    //     paidamount = 0;
	// }
	// var outstanding_previous = parseInt($('#outstanding_previous').val());
    // $('#outstanding').val(outstanding_previous + parseInt(grandTotal)+parseInt(deliverycharge)-parseInt(discount)-parseInt(paidamount));
    }
    
});

$('#sales_cont').on('keyup','.totalAmount',function(){
    if($(this).val()!=''){console.log($(this).val());
        var srate = parseInt($(this).val());
    }
    else{
       var srate =0;
    }
    var id = $(this).data('order');
    var tax = parseInt($('#gstper_'+id).val());
    $('#totalAmount_'+id).attr('data-value',$('#totalAmount_'+id).val());
    var totalTaxableAmount = 0;
    var totalgstAmount = 0;
    var grandTotal = 0;
    var deliverycharge = 0;
    var discount = 0;
    if(tax == 12 || tax == 18 || tax == 28){
	    var taxableAmount = (srate/(100+tax)*100).toFixed(2);
	}
	var gstAmount = ((taxableAmount*tax)/100).toFixed(2);
	
    $('#taxable_'+id).val(taxableAmount);
    $('#taxable_'+id).attr('data-value',taxableAmount);
    $('#gstAmount_'+id).val(gstAmount);
    $('#gstAmount_'+id).attr('data-value',gstAmount);
    $('#itemqty_'+id).val(1);
    $('#gstper_'+id).val(tax);
    $('#totalAmount_'+id).val(srate);
    $('#totalAmount_'+id).attr('data-value',srate);
    $('#totalTaxableAmount').val(taxableAmount);
    $('.taxableAmount').each(function( index ) {
         totalTaxableAmount=totalTaxableAmount+parseFloat($(this).val());
     });
     $('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
     $('.gstAmount').each(function( index ) {
         totalgstAmount=totalgstAmount+parseFloat($(this).val());
     });
     $('#amountGst').val(totalgstAmount.toFixed(2));
     grandTotal = totalTaxableAmount+totalgstAmount;
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
     $('#grandTotal').val(Math.round(grandTotal+parseInt(deliverycharge)-parseInt(discount)));
	 calc_outstanding();
    //  var paidamount = $('#paidamount').val();
    // if(paidamount == ''){
    //     paidamount = 0;
	// }
	// var outstanding_previous = parseInt($('#outstanding_previous').val());
    // $('#outstanding').val(outstanding_previous + parseInt(grandTotal)+parseInt(deliverycharge)-parseInt(discount)-parseInt(paidamount));
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

$('#cust_search').on('click','.custsearchmodal', function () {
				
	$('#custsearch_modal').modal('show');
			
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
$("html").on('click','.customersearchlist',function(){
				$('#custsearch_modal button.close').click();
			 	$('#customername').val($(this).data('id'));
				 $('#customerid').val($(this).data('cusid'));
			  	$('#phon_num').val($(this).data('phone_num'));
				$('#address').val($(this).data('address'));
				$('#outstanding_previous').val($(this).data('outstanding'));
				$('#outstanding').val($(this).data('outstanding'));
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
	console.log(res);
	location.reload();
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

</script>

<script>
function validateForm() {
	var rowCount = $("#sales_cont > tr").length;
	var i;
	var unitprice
    for(i=1;i<=rowCount;i++){
	 unitprice=document.getElementById('unitprice_'+i+'').value;
	 var minmop=document.getElementById('pcost_'+i+'').value;
	 var stock=document.getElementById('qtyinventory_'+i+'').value;
	 var qty=document.getElementById('itemqty_'+i+'').value;
	
	//alert(stock);
	 if(parseInt(qty)>parseInt(stock)){
		alert("Stock is not available");
		$("#saveonly").html("SAVE");
		
		$("#saveonly").removeAttr("disabled")
		$("#saveprint").html("SAVE & PRINT");
		$("#saveprint").removeAttr("disabled");
		return false;

	 }else{
		// alert("available");
		$("#saveonly").html("Please Wait...");
		$("#saveonly").attr('disabled', 'disabled');
		$("#saveprint").html("Please Wait...");
		$("#saveprint").attr('disabled', 'disabled');
		
	 }
	 if(parseFloat(unitprice)<=parseFloat(minmop)){
		 alert("Please enter unit price is grater than purchase cost");
		 $("#saveonly").html("SAVE");
		
		$("#saveonly").removeAttr("disabled")
		$("#saveprint").html("SAVE & PRINT");
		$("#saveprint").removeAttr("disabled");
		return false; 
	 }else{
		$("#saveonly").html("Please Wait...");
		$("#saveonly").attr('disabled', 'disabled');
		$("#saveprint").html("Please Wait...");
		$("#saveprint").attr('disabled', 'disabled');
	 }



	
}
	}
</script>
	</body>

	</html>