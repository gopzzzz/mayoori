<!-- Modern blue-and-white styling; existing PHP, routes, and JavaScript are preserved. -->
<style>
/* B2B Billing Report - scoped to this view */
.content-wrapper { background:#f2f6fc; }
.content-wrapper .content-header { padding:20px 24px 10px; }
.content-wrapper .content-header h1 { color:#173b66; font-weight:700; letter-spacing:.2px; }
.content-wrapper .content-header h1 small { color:#4776a8; font-weight:500; }
.content-wrapper .content { padding:18px 22px 28px; }
.content-wrapper .content > a .btn-info,
.content-wrapper .content .btn-info { background:#1769aa; border-color:#1769aa; border-radius:7px; box-shadow:0 3px 8px rgba(23,105,170,.16); font-weight:600; margin-bottom:14px; }
.content-wrapper .content > a .btn-info:hover,
.content-wrapper .content .btn-info:hover { background:#105487; border-color:#105487; }
.content-wrapper .box { border-top:0; border-radius:10px; overflow:visible; box-shadow:0 5px 22px rgba(26,65,110,.10); background:#fff; }
.content-wrapper .box-header { padding:17px 20px; border-bottom:1px solid #e3ebf5; background:#fff; }
.content-wrapper .box-title { color:#173b66; font-weight:700; font-size:18px; }
.content-wrapper #b2bsalesaerch { max-width:380px; height:40px; border:1px solid #cbd9e8; border-radius:5px; box-shadow:none; padding:8px 12px; margin:0 0 12px; }
.content-wrapper #b2bsalesaerch:focus { border-color:#3986c8; box-shadow:0 0 0 3px rgba(57,134,200,.12); }
.content-wrapper .box-body { padding:18px 20px; }
.content-wrapper table.table { width:100%; border-collapse:collapse !important; background:#fff; margin-bottom:12px; }
.content-wrapper table.table thead th { background:#eaf3fc; color:#173b65; font-weight:700; white-space:nowrap; border:1px solid #c8d9e9 !important; border-bottom:2px solid #9dbbd8 !important; padding:10px 8px; vertical-align:middle; }
.content-wrapper table.table tbody td { color:#34465b; border:1px solid #d5e0eb !important; padding:8px 7px; vertical-align:middle; }
.content-wrapper table.table tbody tr:nth-child(even) { background:#f8fbff; }
.content-wrapper table.table tbody tr:hover { background:#edf6ff; }
.content-wrapper table.table td a { display:inline-block; margin:0 5px 0 0; padding:6px 8px; color:#1769aa; background:#edf6ff; border:1px solid #c8e0f7; border-radius:5px; text-decoration:none; }
.content-wrapper table.table td a:hover { color:#fff; background:#1769aa; border-color:#1769aa; }
.content-wrapper table.table td a .fa, .content-wrapper table.table td a .fa:before { font-size:14px; }
.content-wrapper .pagination { margin:14px 0 4px; }
.content-wrapper .pagination a, .content-wrapper .pagination strong { padding:7px 11px; border:1px solid #d3dfec; border-radius:4px; margin-right:3px; }
@media (max-width:767px) {
 .content-wrapper .content { padding:12px 8px 22px; }
 .content-wrapper .box-body { padding:10px; }
 .content-wrapper .content-header { padding:15px 12px 8px; }
 .content-wrapper #b2bsalesaerch { max-width:100%; }
 .content-wrapper table.table { min-width:1100px; }
}
</style>

<style>
	input[type=radio] {
    width: 17px;
    height: 17px;
}
.exampleInputEmail1{
	font-size: 10px;
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
  
  <?php $data['leftmenu']='b2billing'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">B2B<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'b2b';?>">B2B</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
     <a href="<?php echo base_url('b2baddon');?>"> <button type="button" class="btn btn-info btn-lg " >ADD</button>  </a>



		

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Billing Report</h3>
			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	


              <div class="box-tools">
               
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table  class="table table-hover">
			  <thead>
			  <div class="row">
			  <div class="col-sm-4">
			  <input type="text" class="form-control" id="b2bsalesaerch" placeholder="search customr name or phonenumber">
			  </div>
			  </div>
                <tr>
                  <th>#</th>
				  <th>Bill No</th>
				  <th>Bill Date</th>
				  <th>Customer Name</th>
				  <th>Phone Number</th>
				  <th>Tax</th>
				  <th>Grand Total</th>
				  <th>Transaction Mode</th>
				  <th>By Cash</th>
				  <th>By Bank</th>
				  <th>Outstanding</th>
				  <th>Notes</th>
				  <th>Action</th>
                  
                </tr>
				 </thead>
				 <tbody id="saleb2bbody">
				<?php
			$i=1;
			foreach($b2b as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $key->billing_master_billno;?></td>
				  <td><?php echo $key->billingdate;?></td>
				  <td><?php echo $key->billing_master_customer_name;?></td>
				  <td><?php echo $key->billing_master_phoneno;?></td>
                  <td><?php echo $key->billing_master_tot_taxable_amount;?></td>
                  <td><?php echo $key->billing_master_grandtotal;?></td>
				  <td><?php if($key->billing_master_paymentmode==6){echo "CASH";}else if($key->billing_master_paymentmode==5){echo "BANK";}else if($key->billing_master_paymentmode==4){echo "BOTH";}?></td>	
				  <td><?php if($key->billing_master_paymentmode==6){echo $key->billing_master_paid_amount;}else if($key->billing_master_paymentmode==4){echo $key->billing_master_paid_amount;}  ?></td>
				  <td><?php if($key->billing_master_paymentmode==5){echo $key->billing_master_paid_amount;}else if($key->billing_master_paymentmode==4){echo $key->billing_master_bankamount;} ?></td>
				  <td><?php if($key->billing_master_outstanding!=0){echo $key->billing_master_outstanding;} ?></td>	
				  <td><?php echo $key->billing_master_note; ?></td>	
				  		  
                  <td>
				  <!-- <i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i> -->
				  
				  <a href="<?php echo base_url('b2bsaleview/').$key->billing_master_id;?>" ><i class="fa fa-eye" aria-hidden="true" data-toggle="modal" data-target="#viewModal<?php echo $key->billing_master_id;?>"></i></a>
				  <a href="<?php echo base_url('b2bprint/').$key->billing_master_id;?>"

									>&nbsp;

							<li class="fa fa-print"></li> 

						

					</a> 

					<a href="<?php echo base_url('b2bsaleedit/').$key->billing_master_id;?>" ><li class="fa fa-pencil"></li> </a>
				 </td>
                </tr>
                <?php
				$i++;
				}
				?>
				</tbody>
              </table>
			  <p><?php echo $links; ?></p>
            </div>
     
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		</div>

		

		
		
		<!----------------view section ------------------------------>
		

     
    </section>

<script>

  function deletechecked(){

  if(confirm("Do you really want to delete this apartment?")){



return true;



  } 

  else{

    

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



  $('#sales_cont').on('change','.itemBatch',function(){ 	 


 var id = $(this).data('order');
 $('#unitprice_'+id).css("border","1px solid #ccc");
			$('#unitprice_'+id).css("color","#555");
			$('#unitprice_'+id).tooltip('hide');
			$('#unitprice_'+id).attr('data-original-title', '');
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
			$('#hsncode_'+id).val(obj.hsn_code);
			
			if(parseInt(obj.cur_stock_item_count)<parseInt(1)){
						$('#itemqty_'+id).css({"border":"1px solid red"});
						$('#saveprint').hide();
						$('#saveonly').hide();
						$('#BtnNewRow').hide();
					}else{
						$('#itemqty_'+id).css({"border":"1px solid #d2d6de"});
						$('#saveprint').show();
						$('#saveonly').show();
						$('#BtnNewRow').show();
					}

			if ((obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28) ) {//&& ! $('#isigst').is(":checked")
				if(obj.t_sr==0.00){
						var taxableAmount = (parseFloat(obj.e_sr) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
					}
			
					
					else{
						var taxableAmount = (parseFloat(obj.t_sr) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
					}
					
			}
			else {
				if(obj.t_sr==0.00){
						var taxableAmount = (parseFloat(obj.e_sr) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
					}
					
				
					
					else{
						var taxableAmount = (parseFloat(obj.t_sr) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
					
					}
			}
			var gstAmount = ((taxableAmount*parseFloat(obj.hsn_tax))/100).toFixed(2);


			if(obj.t_sr==0.00){
					$('#pcost_' + id).val(obj.e_pc);
				$('#percost_' + id).val(obj.e_pc);
				$('#mop_'+id).val(obj.e_mop);
				$('#unitprice_'+id).val(obj.e_sr);
				$('#totalAmount_' + id).val(obj.e_sr);
				$('#totalAmount_' + id).attr('data-value', obj.e_sr);
				$('#mrp_'+id).val(obj.e_mrp);
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
				$('#totalAmount_' + id).val(obj.t_sr);
				$('#totalAmount_' + id).attr('data-value', obj.t_sr);
				$('#mrp_'+id).val(obj.t_mrp);
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
			 calc_outstanding();
		
			},
	});
}) ;

 
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
	  new_row+= '<td><input type="hidden" value="0" name="purcost[]" class="form-control cleardata" id="pcost_'+current_row+'" data-order="'+current_row+'" style="float:left" ><input required type="hidden"  value="0" class="form-control  " id="qtymop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  value="0" class="form-control  " id="qtymop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  class="form-control  " value="0" id="qtyinventory_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input type="hidden" value="0" name="itemid[]" class="form-control cleardata" id="itemid_'+current_row+'" data-order="'+current_row+'"  ><input type="text" name="itemcode[]" class="form-control cleardata codeItem" id="code_'+current_row+'" data-order="'+current_row+'" ><div id="code_list_'+current_row+'"></div></td>';
      new_row+= '<td><input type="text" name="itemname[]" class="form-control cleardata nameItem" id="itemname_'+current_row+'" data-order="'+current_row+'" ><div id="name_list_'+current_row+'"></div></td>';
      new_row += '<td style="width:130px;"><select required name="itembatchid[]" class="form-control  itemBatch cleardata" style="display:none;" id="itembatchid_'+current_row+'" data-order="'+current_row+'" placeholder="Batch"><option value="0">Select Batch</option></select>	<input type="hidden" name="batchidd" class="form-control batchidd" id="batchidd_' + current_row + '"><input type="text" name="batchcode" class="form-control batchcode" id="batchcode_' + current_row + '" data-order="' + current_row + '"><div id="batchlist_' + current_row + '" style="position: absolute;z-index: 99;"></div></td>';
      new_row+= '<td><input step=".01"  type="text" min="0"  name="itemqnty[]" class="form-control cleardata qnty" id="itemqty_'+current_row+'" data-order="'+current_row+'" ></td>';
      new_row += '<td><input required type="text"  name="unitprice[]" class="form-control unitprice cleardata " data-toggle="tooltip" trigger="manual" id="unitprice_' + current_row + '" data-order="' + current_row + '" ></td>';
	  new_row += '<td><input required type="text"   name="mrp[]" class="form-control mrp cleardata " data-toggle="tooltip" trigger="manual" id="mrp_' + current_row + '" data-order="' + current_row + '"  ></td>';
			
	  new_row+= '<td><input type="text" value="0" name="itemtaxable[]" readonly class="form-control cleardata taxableAmount" id="taxable_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
      new_row+= '<td><input type="text" value="0" name="itemgstper[]" readonly class="form-control cleardata cleardatal" id="gstper_'+current_row+'" data-order="'+current_row+'"><input type="hidden" name="itemhsncode[]" class="form-control itemhsncode" id="hsncode_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
      new_row+= '<td><input type="text" value="0" name="itemgstamount[]" readonly class="form-control cleardata gstAmount" id="gstAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><input type="text" value="0" name="itemtotalamount[]" readonly class="form-control cleardata totalAmount" id="totalAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><select name="employee[]" class="form-control Employee cleardata" id="employee_' + current_row + '" data-order="' + current_row + '" ><?php echo $namelist;?></select></td>';
      
	  new_row+='<input type="hidden" value="0" data-order="' + current_row + '" name="incentive_id[]" id="incentive_' + current_row + '" value=""/><input type="hidden" data-order="' + current_row + '" name="incentive_amount[]" id="incentiveamt_' + current_row + '" value=""/>'
			new_row += '<td>';
      
      new_row+= '<i class="fa fa-cubes checkstock" data-row="' + current_row + '" id="checkstock_' + current_row + '" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i><i data-row="'+current_row+'" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
      new_row+= '</td></tr>';

      $('#sales_cont').append(new_row);
     
      $('#BtnNewRow').data('order',current_row);

	  recalculate();
      
  });

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
			$('#totalamount').val(Math.round(grandTotal + parseInt(deliverycharge) - parseInt(discount)));

			if($('[type="checkbox"]').is(":checked")){
          var grandtotal=$('#grandTotal').val();
		  var finalgrandTotal=Math.round(parseFloat(grandtotal)*parseFloat(.1)/parseFloat(100))+parseFloat(grandtotal);
		  $('#totalamount').val(finalgrandTotal);
		  $('#tcscharge').val(parseFloat(grandtotal)*parseFloat(.1)/parseFloat(100).toFixed(2));
        }else{
			var grandtotal=$('#grandTotal').val();
			$('#totalamount').val(grandtotal);
			$('#tcscharge').val(0);
         }
			calc_outstanding();
		
		}
  
		function calc_outstanding(){

var paymod = $('input[name=paymod1]:checked').val();
var paidamount = $('#paidamount').val();
var grandTotal = $('#totalamount').val();
var bankamount = $('#bankamount').val();
if (bankamount == '' || paymod == 1 || paymod == 2 || paymod == 5 || paymod == 6 ) { 
	bankamount = 0;
}
if (paidamount == '') {
	paidamount = 0;
}


var outstanding_previous = $('#outstanding_previous').val(); 
var finaloutstandingamount=parseFloat(outstanding_previous) + parseFloat(grandTotal) - parseFloat(paidamount) - parseFloat(bankamount);
$('#outstanding').val(Math.round(finaloutstandingamount).toFixed(2));

}
	 
  
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

  
  $('#sales_cont').on('click','.detailEraseRow',function(){
      var rowNumber = $(this).data('row');
       $('#detailRow_'+rowNumber+' select').prop('selectedIndex',0);
       $('#detailRow_'+rowNumber+' input').val('');
       recalculate();
  });
  
  //==============================================================================================


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




  $('#sales_cont').on('keyup', '.unitprice', function () {

	    $(this).val($(this).val().replace(/ +?/g, ''));
	

		var id = $(this).data('order');

		var order = $(this).data('order');

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
				var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
			}
			else {
				var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
			}
			var gstAmount = ((taxableAmount * parseFloat(item_hsn_tax)) / 100).toFixed(2);
			// if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
			// 			var cessAmount = (taxableAmount / 100).toFixed(2);
			// }
			// else {
			// 			var cessAmount = 0;
			// }
		

			var gstsubtotal = qnty * gstAmount;
			// var cesssubtotal = qnty * cessAmount;
			var itemsubtotal = qnty * unitprice ;
			var taxablesubtotal = qnty * taxableAmount;

			$('#taxable_' + id).val((taxablesubtotal).toFixed(2));	
			$('#gstAmount_' + id).val((gstsubtotal).toFixed(2));
			// $('#cessAmount_' + id).val((cesssubtotal).toFixed(2));
			$('#totalAmount_' + id).val((itemsubtotal).toFixed(2));	
			
			recalculate();


	var batchid=$("#itembatchid_"+id).val();
	var itemid=$('#itemid_'+id).val();

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
						$('#incentive_'+id).val(obj.id);
						$('#incentiveamt_'+id).val(incentamt);
						console.log(obj.in_peramount);
					}
					else if(parseInt(obj.incentive_type)==parseInt(2))
					{
						$('#incentive_'+id).val(obj.id);
						var incentive_amount=(unit_price*obj.in_peramount/100)*itemqty;
						$('#incentiveamt_'+id).val(incentive_amount);
						console.log(obj.in_peramount);
					}
					else 
					{
						
						
						if(parseInt(unit_price)>=parseInt(obj.range1) && parseInt(unit_price)<parseInt(obj.range2) )
						{
							
							if(parseInt(obj.r1_type)==parseInt(1))
							{
								var incentamt12=parseFloat(itemqty)*parseFloat(obj.r1_amount);
								$('#incentive_'+id).val(obj.id);
								$('#incentiveamt_'+id).val(incentamt12);
							}
							else{
								var incentive_amountr1=(unit_price*obj.r1_amount/100)*itemqty;
								$('#incentive_'+id).val(obj.id);
								$('#incentiveamt_'+id).val(incentive_amountr1);
							}

						}
						else if(parseInt(unit_price)>=parseInt(obj.range2) && parseInt(unit_price)<parseInt(obj.range3))
						{
							
							if(parseInt(obj.r2_type)==parseInt(1))
							{
								var incentamt123=parseFloat(itemqty)*parseFloat(obj.r2_amount);
								$('#incentive_'+id).val(obj.id);
								$('#incentiveamt_'+id).val(incentamt123);
							}
							else{
								
								var incentive_amountr2=(unit_price*obj.r2_amount/100)*itemqty;
								$('#incentive_'+id).val(obj.id);
								$('#incentiveamt_'+id).val(incentive_amountr2);
							}

						}
						else if(parseInt(unit_price)>=parseInt(obj.range3) && parseInt(unit_price)<parseInt(obj.range4))
						{
						
							if(parseInt(obj.r3_type)==parseInt(1))
							{
								
								var incentamt1234=parseFloat(itemqty)*parseFloat(obj.r3_amount);
								$('#incentive_'+id).val(obj.id);
								$('#incentiveamt_'+id).val(incentamt1234);
							}
							else{

							    
								var incentive_amountr3=(unit_price*obj.r3_amount/100)*itemqty;
							
								$('#incentive_'+id).val(obj.id);
								$('#incentiveamt_'+id).val(incentive_amountr3);
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
							$('#incentive_'+id).val(obj.id);
								$('#incentiveamt_'+id).val(0);
						}

					}
				
				},

			});	
			
		

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
 

 
$('#deliverychare').on('keyup',function(){
    recalculate();
});


$('.ticktcs').on('click',function(){
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
	var unitprice=$('#unitprice_'+order).val();



	if(parseInt(inqty)>=parseInt(qnty_demo)){
				var qnty=qnty_demo;
				$('#itemqty_'+order).css({"border":"1px solid #d2d6de"});
				$('#saveprint').show();
				$('#saveonly').show();
				$('#BtnNewRow').show();
			}else if($(this).val() !== null && $(this).val() == ''){
				var qnty=0;
				$('#saveprint').hide();
				$('#saveonly').hide();
				$('#BtnNewRow').hide();
			
			}else{
				var qnty=qnty_demo;
				$('#itemqty_'+order).css({"border":"1px solid red"});
				$('#saveprint').hide();
				$('#saveonly').hide();
				$('#BtnNewRow').hide();
			
			}
		
		
    if(qnty != '' && qnty!=0){
    


			var item_hsn_tax = $('#gstper_'+order).val();
			var taxableAmount = 0; 
			if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
				var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
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
			var cesssubtotal = qnty * cessAmount;
			var itemsubtotal = qnty * unitprice ;
			var taxablesubtotal = qnty * taxableAmount;

			$('#taxable_' + order).val((taxablesubtotal).toFixed(2));	
			$('#gstAmount_' + order).val((gstsubtotal).toFixed(2));
			$('#cessAmount_' + order).val((cesssubtotal).toFixed(2));
			$('#totalAmount_' + order).val((itemsubtotal).toFixed(2));	

			
	var batchid=$("#itembatchid_"+order).val();
	var itemid=$('#itemid_'+order).val();

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
		
    }
    
});


$('#b2bsalesaerch').on('keyup',function(){
var variable=$(this).val();
if(variable!=""){
$.ajax({
			type: "POST",
			url: '<?php echo site_url('AdminController/get_b2bbillsearch');?>',
			data: {
				variable: variable
			},
			success: function(res) {
				if(res){
									//vineeth---
									$('#saleb2bbody').show();
									$('#saleb2bbody').html(res);
								}else{
									$('#saleb2bbody').html("");
								}
				
			},
		});
}else{
	location.reload();
}

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
  $(".reset").bind("click", function() {
		$(".cleardata").val("");
		});
  $('#sales_cont').on('change','.Employee',function(){ 
	var order = $(this).data('order');
	var batchid=$("#itembatchid_"+order).val();
	var itemid=$('#itemid_'+order).val();

	var itemqty=$('#itemqty_'+order).val();
	var unit_price=$('#unitprice_'+order).val();
	//alert(batchid);alert(itemid);alert(itemqty);alert(unit_price);
	  $.ajax({

				type: "POST",
				url: '<?php echo site_url('Admin/getbath_incentives');?>',
				data: {
					batchid:batchid,
					itemid:itemid


				},

				success: function(res) {
					console.log(res);
					
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
								//alert(incentamt1234);
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
	
});
$(document).ready(function(){
		$('form').attr('autocomplete', 'off');
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
		
		
	
</script>
<script>
 function validateForm() {

if (confirm("Do you really want to submit this sales?")) {

	

var isStockNotAvailable = false;

var unitprice;
 $("#sales_cont tr").map(function(){
	if(!isStockNotAvailable){
				  if($(this).attr('data-row')!=undefined){
					var i = $(this).attr('data-row'); 

 var stock=document.getElementById('qtyinventory_'+i+'').value;
 var qty=document.getElementById('itemqty_'+i+'').value;

 unitprice=document.getElementById('unitprice_'+i+'').value;
	 var minmop=document.getElementById('pcost_'+i+'').value;

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
	
 }else if(parseFloat(qty) !== null && parseFloat(qty) == ''){
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
	form.myButton.disabled = true;
		form.myButton.value = "Please wait...";
		return true;
	
 }
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
		form.myButton.disabled = true;
		form.myButton.value = "Please wait...";
		return true;
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

