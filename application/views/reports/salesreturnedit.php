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
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>

<?php $data['leftmenu']='salesreturn'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



	<!-- Content Header (Page header) -->

	<section class="content-header">

		<h1 align="center">Sales Return Edit<small>Preview</small></h1>



		<ol class="breadcrumb">

			<li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="<?php echo base_url().'sales_rtn';?>">Sales Return Edit</a></li>

		</ol>

	</section><br>



	<!-- Main content -->

	<section class="content">
		
	
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<!-- <h3 class="box-title">Sales Return Report</h3> -->
						<input type="hidden" id="response_noti"
							value="<?php echo $this->session->flashdata('response');?>" />


						<div class="box-tools">
					
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
							
							<form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('AdminController/salesreturnaddnewInsert');?>" >
				
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Sales Return Edit</h4>
					</div>

					<div class="col-sm-12" style="margin-top: 10px;">
						<div class="col-sm-1">
							<label class="exampleInputEmail1">RETURN NO:</label>
						</div>
						<div class="col-sm-2">

						<input type="hidden" class="form-control" name="master_id12" value="<?php echo $master->sales_return_id;?>" id="sale_id">

							<input type="text" readonly name="rtnno" class="form-control" value="<?php   echo $master->sales_retuurn_bill_no;?>">
			
								 
						</div>
						<div class="col-sm-1">
							
						</div>
						<div class="col-sm-2">
							
								 
						</div>

						<div class="col-sm-1">
							<label class="exampleInputEmail1">DATE:</label>
						</div>
						<div class="col-sm-2">
							<input type="date" name="date" class="form-control cleardata" value="<?php   echo $master->sales_return_date;?>" readonly/>
						</div>

						<div class="col-sm-1">
							<label class="exampleInputEmail1">SALE TYPE:</label>
						</div>
						<div class="col-sm-2">
						<select name="saletype" class="form-control" id="saletype">
							<option value="1" <?php if($master->sale_type==1){echo 'selected';}?>>B2C</option>
							<option value="2" <?php if($master->sale_type==2){echo 'selected';}?>>B2B</option>
                        </select>
						</div>

					</div>


					<div class="col-sm-12" style="margin-top: 10px;">
						<div class="col-sm-1">
							<label class="exampleInputEmail1">CUSTOMER NAME:</label>
						</div>
						<div class="col-sm-2" id="cust_search">
							<input type="text" value="<?php   echo $master->salesreturn_customername;?>" name="customername" id="customername" class="form-control searchcus cleardata" style="width:150px;" required />
							<input type="hidden" value="<?php   echo $master->salesreturn_cus_loginid;?>" name="customerloginid" id="customerid">
							
							<div id="customer_list"></div>
							
						</div>
						
						<div class="col-sm-1">
							
						</div>
						<div class="col-sm-2">
							
								 
						</div>
						
						

					</div>
					<div class="col-sm-12" style="margin-top: 10px;">
					    <div class="col-sm-1">
							<label class="exampleInputEmail1">ADDRESS:</label>
						</div>
						<div class="col-sm-2">
							<textarea name="address" class="form-control cleardata" id="address"><?php   echo $master->salesreturn_cusaddress;?></textarea>
						</div>
						<div class="col-sm-1">
							
						</div>
						<div class="col-sm-2">
							
								 
						</div>
						<div class="col-sm-1">
							<label class="exampleInputEmail1">REF NO:</label>
						</div>
						<div class="col-sm-1">
							<input type="text" name="refno" id="refno" class="form-control cleardata" value="<?php   echo $master->salesreturn_ref_number;?>">
							 
						</div>

						<div class="col-sm-1">
								<button type="button" class="btn btn-info btn-sm">LOAD BILL</button>
							</div>

					</div>
					<div class="col-sm-12" style="margin-top: 10px;">
					    <div class="col-sm-1">
							<label class="exampleInputEmail1">PHONE NUMBER:</label>
						</div>
						<div class="col-sm-2">
							<input type="text" value="<?php   echo $master->salesreturn_phonenumber;?>" name="phonenumber" maxlength="10" class="form-control cleardata" id="phon_num" required />
						</div>
						<div class="col-sm-2">
									<label><input type="checkbox" name="inclusive" id="inclusive" value="1" class="cleardata"/>INCLUSIVE</label>
						</div>
						<div class="col-sm-1">
							
								 
						</div>
						<div class="col-sm-1">
							<label class="exampleInputEmail1"> REASON:</label>
						</div>
						<div class="col-sm-2">
							<textarea name="reason" class="form-control cleardata" ><?php   echo $master->sales_return_note;?></textarea>
						</div>

						

					</div>

					<div class="col-sm-12">


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
      <th scope="col">GST AMOUNT</th>
	  <!-- <th scope="col">CESS</th> -->
      <th scope="col">TOTAL</th>
      <th scope="col">EMPLOYEE</th>
      <th scope="col"></th>
   
    </tr>
  </thead>
  <tbody id="sales_cont">
      <?php $i=1;foreach($transs as $trans){?>
    <tr id="detailRow_<?php echo $i;?>" data-row="<?php echo $i;?>">
      <th scope="row" class="slno"><?php echo $i;?></th>
      <td>
	  <input type="hidden" name="oldqty[]" class="form-control cleardata" id="oldqty_<?php echo $i;?>"
											data-order="<?php echo $i;?>" style="float:left" value="<?php echo $trans->salesreturntrans_qty;?>">
	  <input type="hidden" name="tid[]" class="form-control cleardata" id="transid_<?php echo $i;?>"
											data-order="<?php echo $i;?>" style="float:left" value="<?php echo $trans->salesreturntrans_id;?>">
	  <input type="hidden" name="purcost[]" class="form-control cleardata" id="pcost_<?php echo $i;?>"
											data-order="<?php echo $i;?>" style="float:left" value="<?php if($trans->t_pc=='0.00'){ echo $trans->e_pc;}else{echo $trans->t_pc;}?>">
	  <input type="hidden" name="puritemid[]" class="form-control cleardata" id="puritem_<?php echo $i;?>"
											data-order="<?php echo $i;?>" style="float:left" value="<?php echo $trans->salesreturntrans_trans_item_id;?>">
	  <input type="text" readonly name="itemcode[]"  class="form-control codeItem" id="code_<?php echo $i;?>" data-order="<?php echo $i;?>" value="<?php echo $trans->salesreturntrans_itemcode;?>" >
      <div id="code_list_<?php echo $i;?>" style="position: absolute;z-index: 99;"></div>
      </td>
      <td><input type="text" readonly value="<?php echo $trans->itm_name;?>" name="itemname[]" class="form-control cleardata nameItem" id="itemname_<?php echo $i;?>" data-order="<?php echo $i;?>"  required>
      <div id="name_list_<?php echo $i;?>" style="position: absolute;z-index: 99;"></div>
      </td>
	  <td style="width:130px;"><select name="itembatchid[]" class="form-control cleardata itemBatch itemBatchnew" id="itembatchid_<?php echo $i;?>" placeholder="Batch" data-order="<?php echo $i;?>" required>
			<?php $itemid=$trans->salesreturntrans_trans_item_id;
              $batchFetch=$this->Admin_model->get_batchoption($itemid);
              foreach($batchFetch as $batchFetch){?>

<option value="<?php echo $batchFetch->batch_id;?>" <?php if($batchFetch->batch_id==$trans->salesreturntrans_item_batch_id){echo 'selected';}?>><?php echo $batchFetch->batchcode;?>(<?php echo $batchFetch->cur_stock_item_count;?>)</option>
                                       
      <?php } ?> 
			</select>
									</td>
	  <div id="batch_list_<?php echo $i;?>" style="position: absolute;z-index: 99;"></div>
      </td>
      </td>
      <td><input step=".01"  type="text" min="0"  value="<?php echo $trans->salesreturntrans_qty;?>" name="itemqnty[]"  class="form-control cleardata qnty qntynew"   id="itemqty_<?php echo $i;?>" data-order="<?php echo $i;?>" ></td>
	  <td><input type="text" value="<?php echo $trans->sales_trans_unit_price;?>" name="unitprice[]" class="form-control unitprice cleardata unitpricenew"
											id="unitprice_<?php echo $i;?>" data-order="<?php echo $i;?>" data-toggle="tooltip" trigger="manual" ></td>
      <td><input type="text"value="<?php echo $trans->salesreturntrans_taxable_amount;?>"  readonly name="itemtaxable[]" value="0" class="form-control cleardata taxableAmount" id="taxable_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" ></td>
      <td><input type="text" value="<?php echo $trans->salesreturntrans_gst_percentage;?>" readonly name="itemgstper[]" value="0" class="form-control cleardata "  id="gstper_<?php echo $i;?>" data-order="<?php echo $i;?>" >
      <input type="hidden" value="<?php echo $trans->hsn_id;?>" name="itemhsncode[]" value="0" class="form-control cleardata itemhsncode" id="hsncode_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" ></td>
      <td><input type="text" value="<?php echo $trans->salesreturntrans_gst_amount;?>" readonly name="itemgstamount[]" value="0" class="form-control cleardata gstAmount" id="gstAmount_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" ></td>
	  <!-- <td><input type="text" name="itemcess[]" value="0" class="form-control cleardata cessAmount" id="cessAmount_1" data-value="" data-order="1" ></td> -->
      <td><input type="text" value="<?php echo $trans->salesreturntrans_trans_total;?>" readonly name="itemtotalamount[]" value="0" class="form-control cleardata totalAmount" id="totalAmount_<?php echo $i;?>" data-value="" data-order="<?php echo $i;?>" ></td>
      <td><select name="employee[]" class="form-control Employee Employeenew cleardata"  id="employee_<?php echo $i;?>" data-order="<?php echo $i;?>" >
      <?php 

$emp=$this->Admin_model->get_staff1();

foreach($emp as $emp){?>

<option value="<?php echo $emp->stf_id;?>" <?php if($emp->stf_id==$trans->salesreturntrans_employee_name){echo 'selected';}?>><?php echo $emp->stf_name;?></option>

     

<?php }?>

										</select>
										<input type="hidden" value="<?php echo $trans->salesreturntrans_incentive_id;?>" value="0" data-order="<?php echo $i;?>" name="incentive_id[]" id="incentive_<?php echo $i;?>" value="" />
										<input type="hidden" value="<?php echo $trans->salesreturntrans_incentive_amount;?>" value="0" data-order="<?php echo $i;?>" name="incentive_amount[]" id="incentiveamt_<?php echo $i;?>" value="" />
										
										</td>
      <td>
	  <!-- <a href="#" class="editrowb2csalereturn" id="editicon_<?php echo $i;?>" data-row="<?php echo $i;?>"><i class="fa fa-floppy-o"></i></a> -->

          <i class="fa fa-trash detailDeleteRow1" onclick="deletechecked()" data-row="<?php echo $i;?>" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>
      </td>
    </tr>
    <?php $i++;} ?>
   
  </tbody>
 
</table>

						    </div>
							<button type="button" id="BtnNewRow" data-order="<?=count($transs);?>" class="btn btn-info btn-sm">ADD</button>
					<div class="col-sm-12">


					</div>
					<div class="col-sm-12">


					</div>
					<div class="col-sm-12">
						<div class="col-sm-6">
							<div class="col-sm-12">
								<div class="col-sm-4">
									<input type="checkbox" name="isigst" value="1" class="cleardata"/ <?php if($master->sales_return_isigst==1){echo 'selected';}?>>  IS IGST
								</div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">CASH:</label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="cash" id="returnamount" class="form-control cleardata" value="<?php echo $master->sales_return_amountpaid;?>" required />
								</div>
							</div>
							


						</div>

						<div class="col-sm-6">
						    <div class="col-sm-12" style="margin-top: 10px;">
								<div class="col-sm-6">
								</div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">TOTAL TAXABLE AMOUNT</label>
								</div>
								<div class="col-sm-4">
									<input type="text" readonly name="totalTaxableAmount" value="<?php   echo $master->sales_return_taxable_amnount;?>" id="totalTaxableAmount"
										class="form-control cleardata"  />
								</div>
							</div>
							
                            <div class="col-sm-12" style="margin-top: 10px;">
								<div class="col-sm-6">
								</div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">GST AMOUNT</label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="amountGst" readonly id="amountGst" value="<?php   echo $master->sales_return_gst_amount;?>" class="form-control cleardata"  />
								</div>
							</div>
							<div class="col-sm-12" style="margin-top: 10px;">
								<div class="col-sm-6">
								</div>
							
							</div>
							<div class="col-sm-12" style="margin-top: 10px;">
								<div class="col-sm-6"></div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">ROUND OFF</label>
								</div>
								<div class="col-sm-4">
									<input type="text" readonly value="<?php   echo $master->salesreturn_roundoff;?>" name="roundOfValuue" id="roundOfValuue" class="form-control cleardata"
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
									<input type="text" readonly value="<?php   echo $master->sales_return_grandtotal;?>" name="grandTotal" id="grandTotal" class="form-control cleardata"
										 />
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-sm-12" style="margin-top: 20px;">
					
						<div class="col-sm-4">
						</div>
						<div class="col-sm-6">
							<input type="hidden" name="savetype" id="savetype" />
							<div class="col-sm-2">
								<button type="submit" id="saveonly" class="btn btn-primary btn-sm">ADD ON</button>
							</div>
							<div class="col-sm-2">
							<a href="<?php echo base_url('salesreturnprint/').$master->sales_return_id;?>"><button type="button"  class="btn btn-success btn-sm">PRINT</button></a>
							</div>
							<div class="col-sm-2" style="margin-left:10px;">
								<a href="<?php echo base_url('viewsalesreturn');?>"><button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#mymodallisting">VIEW</button></a>
							</div>
							<div class="col-sm-2" style="margin-left:10px;">
								<button type="button" class="btn btn-warning btn-sm reset">CLAR</button>
							</div>
							<div class="col-sm-2" style="margin-left:10px;">
								<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">DELETE</button>
							</div>
						</div>
					


					</div>


					<div class="modal-footer">
					
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

			if (confirm("Do you really want to delete this Item?")) {

				$('#sales_cont').on('click', '.detailDeleteRow1', function () {
			var rowNumber = $(this).data('row');
			var id=$(this).data('row');
		

			
			var sid=$('#sale_id').val();
			var tid=$('#transid_'+rowNumber).val();
			var item=$('#puritem_'+rowNumber).val();
			var batch=$('#itembatchid_'+rowNumber).val();
			var itemqty=$('#itemqty_'+rowNumber).val();
				

				// alert(tid);
				

			$.ajax({

				type: "POST",
				url: '<?php echo site_url('AdminController/salesreturneditdeleterow');?>',
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
						var saletype=$('#saletype').val();
						var refno=$('#refno').val();
					
					$.ajax({

								type: "POST",
								url: '<?php echo site_url('AdminController/salesreturndeleterowedit');?>',
								data: {itemqty:itemqty,batch:batch,saletype:saletype,refno:refno,note:note,vehiclenumber:vehiclenumber,outstanding:outstanding,
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
	<script>

		$(function () {
			$('#example2').DataTable({
				dom: 'Bfrtip',
				buttons: [
					'excelHtml5',
					'csvHtml5'
				]
			})
		});

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
			//grandTotal = totalTaxableAmount + totalcessAmount + totalgstAmount ;
			$('.totalAmount').each(function (index) {
				if ($(this).val() != '') {
					grandTotal = grandTotal + parseFloat($(this).val());
				}
			});
			//alert(grandTotal);
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
			$('#grandTotal').val(Math.round(grandTotal));
			var paidamount = $('#paidamount').val();
			if (paidamount == '') {
				paidamount = 0;
			}
			
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
 
 var tid=$('#transid_'+id).val();
 var sid=$('#sale_id').val();
 var oqty=$('#oldqty_'+id).val();
 var pcost=$('#pcost_'+id).val();

 

 var  note=$('#note').val();

	

	
	var  paidamount=$('#paidamount').val();
	
	var  totalTaxableAmount=$('#totalTaxableAmount').val();
	var  amountGst=$('#amountGst').val();
	var  cessAmount=$('#cessAmount').val();
	var  roundOfValuue=$('#roundOfValuue').val();
	var  grandTotal=$('#grandTotal').val();
	//alert(grandTotal);
	var saletype=$('#saletype').val();
	var refno=$('#refno').val();
	
  if(itemqty>0){
	$.ajax({

type: "POST",
url: '<?php echo site_url('AdminController/salesreturneditrow');?>',
data: {
	refno:refno,saletype:saletype,code:code,itemqty:itemqty,taxable:taxable,hsncode:hsncode,gstper:gstper,gstamount:gstamount,cess:cess,
	total:total,item:item,batch:batch,employee:employee,unitprice:unitprice,inceid:inceid,inamount:inamount,
	tid:tid,note:note,sid:sid,oqty:oqty,paidamount:paidamount,totalTaxableAmount:totalTaxableAmount,
	amountGst:amountGst,cessAmount:cessAmount,roundOfValuue:roundOfValuue,grandTotal:grandTotal
},

success: function(res) {
	console.log(res);
	if(res==1){
		
		location.reload();
	}else{
	alert("stock Not available");	
	//location.reload();
	}
	
},

});
 
  }else{
	alert("Enter stock grater than 0");
  }
	


		}


		//Dynamic Row Adding Code

		$('#BtnNewRow').on('click', function () {
			var rowStart = 1;
			$('.slno').each(function () {
				$(this).html(rowStart);
				rowStart = rowStart + 1;
			});console.log(rowStart);
			$newrow=$('#BtnNewRow').data('order')+1;
			$('#BtnNewRow').data('order', $newrow);
			var current_row = $newrow;
			var new_row = '<tr id="detailRow_' + current_row + '" data-row="' + current_row + '"> <th scope="row" class="slno">' + rowStart + '</th>';
			new_row += '<td><input type="hidden" value="0" name="purcost2[]" class="form-control cleardata" id="pcost_'+current_row+'" data-order="'+current_row+'" style="float:left" ><input required type="hidden"   value="0" class="form-control  cleardata puritem" id="puritem_' + current_row + '" name="puritemid2[]" data-order="' + current_row + '" style="float:left"><input required type="hidden"  class="form-control  codeItem" id="percost_' + current_row + '" data-order="' + current_row + '" style="float:left"><input required type="text" name="itemcode2[]" class="form-control  codeItem" id="code_' + current_row + '" data-order="' + current_row + '" style="float:left"><div id="code_list_' + current_row + '"></div></td>';
			new_row += '<td><input required type="text" name="itemname2[]" class="form-control nameItem cleardata" id="itemname_' + current_row + '" data-order="' + current_row + '" ><div id="name_list_' + current_row + '"></div></td>';
			new_row += '<td style="width:130px;"><select name="itembatchid2[]" class="form-control cleardata itemBatch itemBatchnew" id="itembatchid_'+current_row+'" data-order="'+current_row+'" placeholder="Batch"><option value="">Select Batch</option></select></td>';
			
			new_row += '<td><input required step=".01"  type="text" min="0"  name="itemqnty2[]" class="form-control qnty cleardata" id="itemqty_' + current_row + '" data-order="' + current_row + '" ></td>';
			new_row +='<td><input required type="text"   name="unitprice2[]" class="form-control unitprice   cleardata " data-toggle="tooltip" trigger="manual" id="unitprice_' + current_row + '" data-order="' + current_row + '" ></td>';
			new_row += '<td><input required readonly type="text" name="itemtaxable2[]" class="form-control taxableAmount cleardata" id="taxable_' + current_row + '" data-value="" data-order="' + current_row + '"></td>';
			new_row += '<td><input required readonly type="text" name="itemgstper2[]" class="form-control cleardata" id="gstper_' + current_row + '"  data-order="' + current_row + '"><input type="hidden" name="itemhsncode2[]" class="form-control itemhsncode" id="hsncode_' + current_row + '" data-value="" data-order="' + current_row + '" required><input type="hidden" name="itemitemtbid2[]" class="form-control itemitemtbid" id="itemtbid_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
			new_row += '<td><input required readonly type="text" name="itemgstamount2[]" class="form-control gstAmount cleardata" id="gstAmount_' + current_row + '" data-value="" data-order="' + current_row + '"></td>';
			// new_row += '<td><input required type="text" name="itemcess[]" class="form-control cessAmount cleardata" id="cessAmount_' + current_row + '" data-value=""  data-order="' + current_row + '"></td>';
			new_row += '<td><input required readonly type="text" name="itemtotalamount2[]" class="form-control totalAmount cleardata" id="totalAmount_' + current_row + '" data-value="" data-order="' + current_row + '"></td>';
			new_row += '<td><select name="employee2[]" class="form-control Employee cleardata" id="employee_' + current_row + '" data-order="' + current_row + '"><?php echo $namelist;?></select></td>';
			new_row+='<input type="hidden" data-order="' + current_row + '"  value="0" name="incentive_id2[]" id="incentive_' + current_row + '" value=""/><input type="hidden" data-order="' + current_row + '"  value="0" name="incentive_amount2[]" id="incentiveamt_' + current_row + '" value=""/>'
			
			new_row += '<td>';
		
			new_row += '<i data-row="' + current_row + '" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
			new_row += '</td></tr>';

			$('#sales_cont').append(new_row);
			console.log(current_row);
			$('#BtnNewRow').data('order', $newrow);

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
							
						}
			})
		});








		$('#sales_cont').on('change','.itemBatch',function(){  
			var id = $(this).data('order');
			$('#unitprice_'+id).css("border","1px solid #ccc");
			$('#unitprice_'+id).css("color","#555");
			$('#unitprice_'+id).tooltip('hide');
			$('#unitprice_'+id).attr('data-original-title', '');
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
						if($('#inclusive').is(":checked")){
							if(obj.t_sr==0.00){
							var taxableAmount = (parseInt(obj.e_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						}
						
						
						
						else{
							var taxableAmount = (parseInt(obj.t_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
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
					if($('#inclusive').is(":checked")){
						var totalgstvalue=parseFloat(obj.e_sr);
					}else{
						
						var totalgstvalue=parseFloat(obj.e_sr);
					}
					$('#totalAmount_' + id).val(totalgstvalue);
					$('#totalAmount_' + id).attr('data-value', totalgstvalue);

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
					}
					
				
					
					else{
					$('#pcost_' + id).val(obj.t_pc);
					$('#percost_' + id).val(obj.t_pc);
					$('#mop_'+id).val(obj.t_mop);
					$('#unitprice_'+id).val(obj.t_sr);
					if($('#inclusive').is(":checked")){
						var totalgstvalue=parseFloat(obj.t_sr);
					}else{
						var totalgstvalue=parseFloat(obj.t_sr);
						
					}
					$('#totalAmount_' + id).val(totalgstvalue);
					$('#totalAmount_' + id).attr('data-value', totalgstvalue);

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
				    
				
					
					
				},
		});

	
 });

 $('#sales_cont').on('change','.itemBatchnew', function () {
	var id = $(this).data('order');
	autosave(id);
		});


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
		
			var totalTaxableAmount = 0;
			var totalcessAmount = 0;
			var totalgstAmount = 0;
			var deliverycharge = 0;
			var discount = 0;
			var grandTotal=0;
		
				

				var item_hsn_tax = $('#gstper_'+order).val();
				var unitprice = $('#unitprice_'+order).val();
				var taxableAmount = 0;
				if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
					if($('#inclusive').is(":checked")){
						var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
					}else{
						var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
					}
				
					
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
				if($('#inclusive').is(":checked")){
					var totalgstvalue=parseFloat(itemsubtotal);
				}else{
					var totalgstvalue=parseFloat(itemsubtotal);
					
				}
				
				$('#totalAmount_' + order).val((totalgstvalue).toFixed(2));	


				$('#qtymop_'+order).val(qnty*mop);

				recalculate();
				
			
			

		});


		$('#sales_cont').on('change','.itemBatchnew', function () {
			var order = $(this).data('order');
			autosave(order);
		});



		$('#paidamount').on('keyup', function () {
			var paidamount = $('#paidamount').val();
			var grandTotal = $('#grandTotal').val();
			if (paidamount == '') {
				paidamount = 0;
			}
			$('#outstanding').val(parseInt(grandTotal) - parseInt(paidamount));
		});

		$('.emicheck').on('click', function () {

			$('.salecardnumber').show();
			$('.cardnumber').show();
			$('.salescheque').hide();
			$('.saleschequenumber').hide();
			$('.transcheq').hide();
			$('.salestranscheque').hide();
			$('.bankamount1').hide();
			$('.bank1').hide();
			$('.bankamount').hide();
			$('.bank').hide();
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
		
			
	


		$('.searchcus').on('keyup',function(){
	var cus = $(this).val();
		
			if (cus != '' && cus != 0) {
				$.ajax({
					type: "POST",
					url: '<?php echo site_url('AdminController/seachcustomerlist');?>',
					data: { cus: cus },
					success: function (res) {
						console.log(res);
						if (res) {
							$('#customer_list').show();
							$('#customer_list').html(res);
						} else {
							$('#customer_list').html("");
						}
					},
				});	
      		}
			else{
				$('#customer_list').html("");
			}
});

$('#customer_list').on('click','.subSelect_namesearch',function(){
	//alert();
	var id=$(this).data('value');
	$.ajax({

type: "POST",
url: '<?php echo site_url('Admin/get_customerfetchdetails');?>',
data: {
	id:id


},

success: function(res) {
	
	var obj = JSON.parse(res);
	$('#customer_list').hide();
	$('#customerid').val(id);
	$('#customername').val(obj.cus_name);
	$('#phon_num').val(obj.cus_phonenumber);
	$('#address').val(obj.cus);
}
});	//alert(id);

});

$('#customername').on('change',function(){
autosavenew();
});
$('#address').on('change',function(){
autosavenew();
});
$('#phon_num').on('change',function(){
autosavenew();
});
$('#returnamount').on('change',function(){
autosavenew();
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
	
		$(".reset").bind("click", function() {
  $(".cleardata").val("");
});
$('#sales_cont').on('keyup', '.unitprice', function () {
	$(this).val($(this).val().replace(/ +?/g, ''));
		
		var id = $(this).data('order');
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
					var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
				}else{
					var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
				}
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
			
			if($('#inclusive').is(":checked")){
				var totalgstvalue=parseFloat(itemsubtotal);
			}else{
			
				var totalgstvalue=parseFloat(itemsubtotal);
			}
			$('#totalAmount_' + id).val((totalgstvalue).toFixed(2));	
			
			recalculate();
		
			
		

	});

	$('#sales_cont').on('change','.unitpricenew', function () {
	var id = $(this).data('order');
		autosave(id);
		});

		$('#sales_cont').on('change','.qntynew', function () {
	    var id = $(this).data('order');
		autosave(id);
		});
 $('#sales_cont').on('change','.Employeenew', function () {
	var id = $(this).data('order');
		autosave(id);
		});

$('form').attr('autocomplete', 'off');




$('#sales_cont').on('click','.editrowb2csalereturn',function(){
 
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
 
 var tid=$('#transid_'+id).val();
 var sid=$('#sale_id').val();
 var oqty=$('#oldqty_'+id).val();
 var pcost=$('#pcost_'+id).val();

 

 var  note=$('#note').val();

	

	
	var  paidamount=$('#paidamount').val();
	
	var  totalTaxableAmount=$('#totalTaxableAmount').val();
	var  amountGst=$('#amountGst').val();
	var  cessAmount=$('#cessAmount').val();
	var  roundOfValuue=$('#roundOfValuue').val();
	var  grandTotal=$('#grandTotal').val();
	var saletype=$('#saletype').val();
	var refno=$('#refno').val();
	
  if(itemqty>0){
	$.ajax({

type: "POST",
url: '<?php echo site_url('AdminController/salesreturneditrow');?>',
data: {
	refno:refno,saletype:saletype,code:code,itemqty:itemqty,taxable:taxable,hsncode:hsncode,gstper:gstper,gstamount:gstamount,cess:cess,
	total:total,item:item,batch:batch,employee:employee,unitprice:unitprice,inceid:inceid,inamount:inamount,
	tid:tid,note:note,sid:sid,oqty:oqty,paidamount:paidamount,totalTaxableAmount:totalTaxableAmount,
	amountGst:amountGst,cessAmount:cessAmount,roundOfValuue:roundOfValuue,grandTotal:grandTotal
},

success: function(res) {
	console.log(res);
	if(res==1){
		
		location.reload();
	}else{
	alert("stock Not available");	
	location.reload();
	}
	
},

});
 
  }else{
	alert("Enter stock grater than 0");
  }
	



});
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
	var ramount=$('#returnamount').val();
	
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
				url: '<?php echo site_url('AdminController/salesreturnsavenew');?>',
				data: {
					ramount:ramount,id: id,billdate:billdate,ewaybillnum:ewaybillnum,deliverydate:deliverydate,customername:customername,
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
				url: '<?php echo site_url('AdminController/salesreturnsavenew');?>',
				data: {
					id: id,billdate:billdate,ewaybillnum:ewaybillnum,deliverydate:deliverydate,customername:customername,
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
</script>

	<script>
  function validateForm() {

	if (confirm("Do you really want to ADDON this sales?")) {

		var rowCount = $("#sales_cont > tr").length;

var isStockNotAvailable = false;

 
 $("#sales_cont tr").map(function(){
	if(!isStockNotAvailable){
 if($(this).attr('data-row')!=undefined){
 var i = $(this).attr('data-row'); 

 var unitprice=document.getElementById('unitprice_'+i+'').value;
 var minmop=document.getElementById('pcost_'+i+'').value;


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