<style>
	input[type=radio] {
    width: 17px;
    height: 17px;
}
</style>
  
  <?php $data['leftmenu']='quotationbill'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Quotation Bill<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'quabill';?>">Quotation Bill</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
   
<div class="row">
       
          <div class="box">
            <div class="box-header">
              
			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	


              <div class="box-tools">
             
              </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example2" class="table table-hover">
			  <thead>
                <tr>
                  <th>#</th>
				  <th>Quotation No</th>
				  <th>Customer Name</th>
				  <th>Phone Number</th>
				  <th>Tax</th>
				  <th>Grand Total</th>
				  <th>Action</th>
                  
                </tr>
				 </thead>
				<?php
			$i=1;
			foreach($quotationtrans as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $key->quotationbill_master_quotation_no;?></td>
				  <td><?php echo $key->quotationbill_master_name;?></td>
				  <td><?php echo $key->quotationbill_master_phoneno;?></td>
                  <td><?php echo $key->quotationbill_master_tot_taxable_amount;?></td>
                  <td><?php echo $key->quotationbill_master_grandtotal;?></td>				  
                  <td><i class="fa fa-trash " aria-hidden="true" onclick="return deletechecked();"></i>
				  <i class="fa fa-eye viewquatationbill" data-id="<?php echo $key->quotationbill_master_id;?>"></i>
				 <a href="<?php echo base_url('printquataionbill/').$key->quotationbill_master_id;?>"><i class="fa fa-print" aria-hidden="true" data-toggle="modal" ></i></a>
                </td>
                </tr>
                <?php
				$i++;
				}
				?>
              </table>

    



<div class="modal" tabindex="-1" role="dialog" id="viewModalquatation">
  <div class="modal-dialog" role="document" style="width:100%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Quotation Bill view</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalviewbody">
      
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>
            </div>
        
            </div>
            </div>
		
 
	

     
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

$('.viewquatationbill').on('click',function(){
    var id=$(this).data('id');
    //$('#modalviewbody').empty();
    $.ajax({
      	    type:"POST",
			url:'<?php echo site_url('AdminController/viewquatationbill');?>',
			data: { id : id},
				success:function(res){
                    console.log(res);
                   $('#modalviewbody').html(res);
                }
    });
  $('#viewModalquatation').modal('show');
});

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
    var totalcessAmount = 0;
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
     $('.cessAmount').each(function( index ) {
         if($(this).val() !=''){
            totalcessAmount=totalcessAmount+parseFloat($(this).val());
         }
     });
     $('#cessAmount').val(totalcessAmount.toFixed(2));
     $('.gstAmount').each(function( index ) {
         if($(this).val() !=''){
            totalgstAmount=totalgstAmount+parseFloat($(this).val());
         }
     });
     $('#amountGst').val(totalgstAmount.toFixed(2));
     grandTotal = totalTaxableAmount+totalcessAmount+totalgstAmount;
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
      var new_row = '<tr id="detailRow_'+current_row+'"> <th scope="row" class="slno">'+rowStart+'</th>';
      new_row+= '<td><input type="text" name="itemcode[]" class="form-control codeItem" id="code_'+current_row+'" data-order="'+current_row+'" style="width:70px;"><div id="code_list_'+current_row+'"></div></td>';
      new_row+= '<td><input type="text" name="itemname[]" class="form-control nameItem" id="itemname_'+current_row+'" data-order="'+current_row+'" style="width:140px;"><div id="name_list_'+current_row+'"></div></td>';
      new_row+= '<td><input type="text" name="itembatch[]" class="form-control batchItem" id="batch_'+current_row+'" data-order="'+current_row+'" style="width:150px;"><div id="batch_list_'+current_row+'"></div></td>';
      new_row+= '<td><input type="text" name="itemqnty[]" class="form-control qnty" id="itemqty_'+current_row+'" data-order="'+current_row+'" style="width:50px;"></td>';
      new_row+= '<td><input type="text" name="itemtaxable[]" class="form-control taxableAmount" id="taxable_'+current_row+'" data-value="" data-order="'+current_row+'" style="width:60px;"></td>';
      new_row+= '<td><input type="text" name="itemgstper[]" class="form-control" id="gstper_'+current_row+'" style="width:50px;" data-order="'+current_row+'"><input type="hidden" name="itemhsncode[]" class="form-control itemhsncode" id="hsncode_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
      new_row+= '<td><input type="text" name="itemgstamount[]" class="form-control gstAmount" id="gstAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><input type="text" name="itemcessamount[]" class="form-control cessAmount" id="cessAmount_'+current_row+'" data-value="" style="width:70px;" data-order="'+current_row+'"></td>';
      new_row+= '<td><input type="text" name="itemtotalamount[]" class="form-control totalAmount" id="totalAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><select name="code" class="form-control" style="width:140px;"><?php echo $namelist;?></select></td>';
      new_row+= '<td>';
      new_row+= '<i data-row="'+current_row+'" class="fa fa-eraser detailEraseRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer;margin-right: 7px"></i>';
      new_row+= '<i data-row="'+current_row+'" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
      new_row+= '</td></tr>';
      
      $('#sales_cont').append(new_row);
      console.log(current_row);
      $('#BtnNewRow').data('order',$newrow);
      
  })
  
  $('#sales_cont').on('click','.detailDeleteRow',function(){
      var rowNumber = $(this).data('row');
      $('#detailRow_'+rowNumber).remove();
      var rowStart = 1;
      $('.slno').each(function(){
          $(this).html(rowStart);
          rowStart++;
      });
      //$('#BtnNewRow').data('order',rowStart-1);
    //   $('.gstAmount').keyup();
    //   $('.cessAmount').keyup();
    //   $('.totalAmount').keyup();
       recalculate();
  })
  
  $('#sales_cont').on('click','.detailEraseRow',function(){
      var rowNumber = $(this).data('row');
       $('#detailRow_'+rowNumber+' select').prop('selectedIndex',0);
       $('#detailRow_'+rowNumber+' input').val('');
       recalculate();
    //   $('.gstAmount').keyup();
    //   $('.cessAmount').keyup();
    //   $('.totalAmount').keyup();
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
  
  $('#sales_cont').on('keyup','.cessAmount',function(){
      var cessAmount = 0;
      $('.cessAmount').each(function(){
          if($(this).val() != ''){
            cessAmount = parseInt(cessAmount) + parseInt($(this).val());
          }
      });
      $('#cessAmount').val(cessAmount);
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
  })

 $('#sales_cont').on('click','.subSelect_itemedit',function(){
     var id = $(this).data('id');
     var itemValue = $(this).data('value');
     var totalTaxableAmount = 0;
     var totalcessAmount = 0;
     var totalgstAmount = 0;
     var grandTotal = 0;
     var deliverycharge = 0;
     var discount = 0;
     $.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/getItemByCode');?>',
			data: { itemValue : itemValue},
				success:function(res){console.log(res);
				$('#code_list_'+id).hide();
				$('#name_list_'+id).hide();
				$('#batch_list_'+id).hide();
				var obj = JSON.parse(res);
				$('#hsncode_'+id).val(obj.hsn_code);
				if(obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28){
				    var taxableAmount = (parseInt(obj.itm_srate)/(101+(parseInt(obj.hsn_tax)))*100).toFixed(2);
				}
				else{
				    var taxableAmount = (parseInt(obj.itm_srate)/(100+(parseInt(obj.hsn_tax)))*100).toFixed(2);
				}
				var gstAmount = ((taxableAmount*parseInt(obj.hsn_tax))/100).toFixed(2);
				if(obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28){
				    var cessAmount = (taxableAmount/100).toFixed(2);
				}
				else{
				    var cessAmount = 0;
				}
				$('#code_'+id).val(obj.itm_code);
			    $('#itemname_'+id).val(obj.itm_name);
			    $('#batch_'+id).val(obj.item_batchcode);
			    $('#taxable_'+id).val(taxableAmount);
			    $('#taxable_'+id).attr('data-value',taxableAmount);
			    $('#gstAmount_'+id).val(gstAmount);
			    $('#gstAmount_'+id).attr('data-value',gstAmount);
			    $('#cessAmount_'+id).val(cessAmount);
			    $('#cessAmount_'+id).attr('data-value',cessAmount);
			    $('#itemqty_'+id).val(1);
			    $('#gstper_'+id).val(obj.hsn_tax);
			    $('#totalAmount_'+id).val(obj.itm_srate);
			    $('#totalAmount_'+id).attr('data-value',obj.itm_srate);
			    $('#totalTaxableAmount').val(taxableAmount);
			    $('.taxableAmount').each(function( index ) {console.log($(this).val());
                     totalTaxableAmount=totalTaxableAmount+parseFloat($(this).val());
                 });
                 $('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
                 $('.cessAmount').each(function( index ) {console.log($(this).val());
                     totalcessAmount=totalcessAmount+parseFloat($(this).val());
                 });
                 $('#cessAmount').val(totalcessAmount.toFixed(2));
                 $('.gstAmount').each(function( index ) {console.log($(this).val());
                     totalgstAmount=totalgstAmount+parseFloat($(this).val());
                 });
                 $('#amountGst').val(totalgstAmount.toFixed(2));
                 grandTotal = totalTaxableAmount+totalcessAmount+totalgstAmount;
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
    var totalTaxableAmount = 0;
    var totalcessAmount = 0;
    var totalgstAmount = 0;
    var deliverycharge = 0;
    var discount = 0;
    if(qnty != '' && qnty!=0){
     $('#taxable_'+order).val((qnty*$('#taxable_'+order).data('value')).toFixed(2));
     $('#gstAmount_'+order).val((qnty*$('#gstAmount_'+order).data('value')).toFixed(2));
     $('#cessAmount_'+order).val((qnty*$('#cessAmount_'+order).data('value')).toFixed(2));
     $('#totalAmount_'+order).val((qnty*$('#totalAmount_'+order).data('value')).toFixed(2));
     $('.taxableAmount').each(function( index ) {
         totalTaxableAmount=totalTaxableAmount+parseFloat($(this).val());
     });
     $('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
     $('.cessAmount').each(function( index ) {
         totalcessAmount=totalcessAmount+parseFloat($(this).val());
     });
     $('#cessAmount').val(totalcessAmount.toFixed(2));
     $('.gstAmount').each(function( index ) {console.log($(this).val());
         totalgstAmount=totalgstAmount+parseFloat($(this).val());
     });
     $('#amountGst').val(totalgstAmount.toFixed(2));
     grandTotal = totalTaxableAmount+totalcessAmount+totalgstAmount;
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
    var totalcessAmount = 0;
    var totalgstAmount = 0;
    var grandTotal = 0;
    var deliverycharge = 0;
    var discount = 0;
    if(tax == 12 || tax == 18 || tax == 28){
	    var taxableAmount = (srate/(101+tax)*100).toFixed(2);
	}
	else{
	    var taxableAmount = (srate/(100+tax)*100).toFixed(2);
	}
	var gstAmount = ((taxableAmount*tax)/100).toFixed(2);
	if(tax == 12 || tax == 18 || tax == 28){
	    var cessAmount = (taxableAmount/100).toFixed(2);
	}
	else{
	    var cessAmount = 0;
	}
	
    $('#taxable_'+id).val(taxableAmount);
    $('#taxable_'+id).attr('data-value',taxableAmount);
    $('#gstAmount_'+id).val(gstAmount);
    $('#gstAmount_'+id).attr('data-value',gstAmount);
    $('#cessAmount_'+id).val(cessAmount);
    $('#cessAmount_'+id).attr('data-value',cessAmount);
    $('#itemqty_'+id).val(1);
    $('#gstper_'+id).val(tax);
    $('#totalAmount_'+id).val(srate);
    $('#totalAmount_'+id).attr('data-value',srate);
    $('#totalTaxableAmount').val(taxableAmount);
    $('.taxableAmount').each(function( index ) {
         totalTaxableAmount=totalTaxableAmount+parseFloat($(this).val());
     });
     $('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
     $('.cessAmount').each(function( index ) {
         totalcessAmount=totalcessAmount+parseFloat($(this).val());
     });
     $('#cessAmount').val(totalcessAmount.toFixed(2));
     $('.gstAmount').each(function( index ) {
         totalgstAmount=totalgstAmount+parseFloat($(this).val());
     });
     $('#amountGst').val(totalgstAmount.toFixed(2));
     grandTotal = totalTaxableAmount+totalcessAmount+totalgstAmount;
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

});



  
</script>

</body>

</html>

