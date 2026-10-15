<div class="row col-sm-12">

<input type="hidden" name="current_batch_id" id="current_batch_id" value="<?php echo $batch_details->batch_id; ?>">
<div class="row col-sm-6 " style="border:2px solid #34a73d; margin-top: 20px;    margin-left: 10px;">
    <br>
    <div class="col-sm-3">
        <label class="exampleInputEmail1">Barcode Num:</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" name="barcode"
            value="<?php echo $batch_details->barcode; ?>"
            placeholder="Enter barcode number" required readonly>
    </div>
    <div class="col-sm-3">
        <label class="exampleInputEmail1">Batch Code:</label>
    </div> 
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" name="batchcode" id="batchcode" placeholder="Enter batchcode"
        value="<?php echo $batch_details->batchcode; ?>" required readonly>
        <input type="hidden" id="tax1" value="<?php echo $batch_details->hsn_tax; ?>"  class="form-control">
    </div>
    <div class="col-sm-3">
        <label class="exampleInputEmail1">Supplier:</label>
    </div> 
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" readonly id="supplieredit" 
        value="<?php echo $batch_details->sup_name; ?>" required>
       
    </div>
    <div class="col-sm-12">

        <label class="exampleInputEmail1">HSN Code</label>
    </div>
    <div class="form-group col-sm-8">
        <select class="form-control" name="hsn" id="hsncode1" required>
            <option value="0">Select HSN Code</option>
            <?php foreach($hsn as $key1){ ?>
            <option value="<?php echo $key1->hsn_id;?>"  <?php if($batch_details->hsncode_id == $key1->hsn_id){ echo 'selected';}  ?>><?php echo $key1->hsn_code;?>( <?php echo $key1->hsn_tax; ?> %)</option>
            <?php } ?>
        </select>
        
    </div>
    <!-- <div class="col-sm-4"><i class="fa fa-plus-square-o" style="font-size:24px;margin-top:5px;padding-right:10px;"
            data-toggle="modal" data-target="#createhsncode"></i></div> -->






    <!-- <div class="col-sm-12">
        <label for="exampleInputEmail1">Opening Balance</label>


        <input type="text" class="form-control" value="<?php echo $batch_details->batchcode; ?>" name="opbal" Placeholder="Enter Opening Balance" required />
    </div> -->
    <!-- <div class="col-sm-12" style="margin-top:102px;">

        <div class="col-sm-3">
            <label class="exampleInputEmail1">Incentive :</label>
        </div>
        <div class="form-group col-sm-9">
            <input type="radio" name="intv" id="amount_val" value="1" required <?php if($batch_details->incentive == 1) echo "checked"; ?>/>Fixed Amount
            <input type="radio" name="intv" id="amount_per" value="2" required  <?php if($batch_details->incentive == 2) echo "checked"; ?>/>Percentage
            <input type="radio" name="intv" id="both" value="3" required  <?php if($batch_details->incentive == 3) echo "checked"; ?>/>Both
        </div>
        <div class="col-sm-3" id="amt_text">
            <label class="exampleInputEmail1">Amount</label>
        </div>
        <div class="form-group col-sm-9">
            <input type="text" class="form-control" name="amount_insen_1" id="amt_val" Placeholder="Enter Amount"  value="<?php echo $batch_details->amount; ?>"/>
            <input type="text" class="form-control" name="amount_insen_2" id="amt_per"  value="<?php echo $batch_details->amount; ?>"
                Placeholder="Enter Amount In percentage" />
        </div>
        <div class="col-sm-3">
            <label class="exampleInputEmail1">Opening Stock</label>
        </div>
        <div class="form-group col-sm-9">
            <input type="text" class="form-control" id="openingstock" name="ostock" value="<?php echo $batch_details->opening_stock; ?>" Placeholder="Enter Stock" />
        </div>
    </div> -->

</div>
<div class="row col-sm-6 type_t" style="border:2px solid #34a73d; #e1e3ea; margin-top: 20px;margin-left: 10px;">
    <br>

    <div class="form-group col-sm-9">
        <label class="exampleInputEmail1">Purchase Rate</label>
        <input type="text" class="form-control prate" name="prate" Placeholder="Enter Rate" id="purrate1" required
        value="<?php echo $batch_details->t_pr; ?>"   />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">Purchase Cost</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" name="pcost" Placeholder="Enter Cost" id="purcost1" required
        value="<?php echo $batch_details->t_pc; ?>" readonly />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">Wholesale Rate</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" name="wholesalerate" Placeholder="Enter Wholesale Rate"
        value="<?php echo $batch_details->t_wr; ?>" id="wholesale1" required readonly />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">MRP</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" name="mrp" value="<?php echo $batch_details->t_mrp; ?>" Placeholder="Enter MRP" required />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">Selling Rate</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" name="srate" value="<?php echo $batch_details->t_sr; ?>" Placeholder="Enter Rate" required />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">MOP</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" name="mop" value="<?php echo $batch_details->t_mop; ?>" Placeholder="Enter MOP" required />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">Branch Rate</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" readonly name="brate" Placeholder="Enter Rate" value="<?php echo $batch_details->t_br; ?>" id="brn_rate1" required />
    </div>
    <!-- <button type="button" class="btn" style=" float: right;">T</button> -->
</div>

<div class="row col-sm-6 type_d" style="border:2px solid #e1e409; margin-top: 20px;margin-left: 10px;display:none;">
    <br>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">Purchase Rate</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control prate" name="d_prate" value="<?php echo $batch_details->d_pr; ?>" Placeholder="Enter Rate" id="d_purrate"
            required  />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">Purchase Cost</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" name="d_pcost" Placeholder="Enter Cost" id="d_purcost" value="<?php echo $batch_details->d_pc; ?>" required
            readonly />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">Wholesale Rate</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" name="d_wholesalerate" Placeholder="Enter Wholesale Rate"
        value="<?php echo $batch_details->d_wr; ?>" id="d_wholesale" required readonly />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">MRP</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" name="d_mrp" Placeholder="Enter MRP" required  value="<?php echo $batch_details->d_mrp; ?>" />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">Selling Rate</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" name="d_srate" Placeholder="Enter Rate" required  value="<?php echo $batch_details->d_sr; ?>" />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">MOP</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" name="d_mop" Placeholder="Enter MOP" required  value="<?php echo $batch_details->d_mop; ?>" />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">Branch Rate</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" readonly name="d_brate" Placeholder="Enter Rate" id="d_brn_rate" required  value="<?php echo $batch_details->d_br; ?>" />
    </div>
    <!-- <button type="button" class="btn" style=" float: right;">D</button> -->
</div>

<div class="row col-sm-6 type_e"
    style="border:2px solid #e47809; margin-top: 20px;   display:none; margin-left: 10px;">
    <br>
    <div class="form-group col-sm-9">
        <label class="exampleInputEmail1">Purchase Rate</label>
        <input type="text" class="form-control prate" name="e_prate" Placeholder="Enter Rate" id="e_purrate"
        value="<?php echo $batch_details->e_pr; ?>"  required  />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">Purchase Cost</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" name="e_pcost" Placeholder="Enter Cost" id="e_purcost" required
        value="<?php echo $batch_details->e_pc; ?>" readonly />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">Wholesale Rate</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" name="e_wholesalerate" Placeholder="Enter Wholesale Rate"
        value="<?php echo $batch_details->e_wr; ?>"  id="e_wholesale" required readonly />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">MRP</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" name="e_mrp" Placeholder="Enter MRP" value="<?php echo $batch_details->e_mrp; ?>"  required />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">Selling Rate</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" name="e_srate" Placeholder="Enter Rate" required value="<?php echo $batch_details->e_sr; ?>" />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">MOP</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" name="e_mop" Placeholder="Enter MOP" required value="<?php echo $batch_details->e_mop; ?>" />
    </div>
    <div class="col-sm-4">
        <label class="exampleInputEmail1">Branch Rate</label>
    </div>
    <div class="form-group col-sm-9">
        <input type="text" class="form-control" readonly name="e_brate" Placeholder="Enter Rate" id="e_brn_rate" required value="<?php echo $batch_details->e_br; ?>" />
    </div>
    <!-- <button type="button" class="btn" style=" float: right;">E</button> -->
</div>

</div>
<script>
$( "#editBatch #batchcode" ).dblclick(function() {
$('#editBatch .type_e').show();
$('#editBatch .type_d').show();
});
$("#editBatch #batchcode").click(function(){
    $('#taxbill').hide(); 
     $('#demobill').hide(); 
      $('#estimatebill').hide();  
	  $('.type_e').hide();
	  $('.type_d').hide();
  });
$(document).ready(function(){
    $('#purrate1').keyup(function(){
  	var prate=$(this).val();
  	var taxrate=$('#tax1').val();
  	var onper=parseFloat(1/100);
  	//alert(onper);
  	//var cal =parseFloat(prate * ((taxrate)/100));
  	//alert(cal);
	  var answer = parseFloat(prate)+parseFloat(prate * ((taxrate)/100));//Purchase cost
	  
	  var wholesale = parseFloat(answer) + parseFloat(answer)*(10/100);

	  var purtax=parseFloat(prate)*1/100;

	  var brate=parseFloat(purtax)+parseFloat(prate);
  	///alert(cal);
	  var branchrate = parseFloat(answer)+parseFloat(answer * onper); 
	  
  	$('#wholesale1').val(wholesale.toFixed(2));
  	$('#purcost1').val(answer.toFixed(2));
  	$('#brn_rate1').val(brate.toFixed(2));
  });

$('#editBatch #d_purrate').keyup(function(){
    
var prate=$(this).val();
var taxrate=$('#editBatch #tax1').val();


var onper=parseFloat(1/100);

var answer = parseFloat(prate)+parseFloat(prate * ((taxrate)/100));//Purchase cost

var wholesale = parseFloat(answer) + parseFloat(answer)*(10/100);
var branchrate = parseFloat(answer)+parseFloat(answer * onper); 

var purtax=parseFloat(prate)*1/100;

var brate=parseFloat(purtax)+parseFloat(prate);

$('#editBatch #d_wholesale').val(wholesale.toFixed(2));
$('#editBatch #d_purcost').val(answer.toFixed(2));
$('#editBatch #d_brn_rate').val(brate.toFixed(2));
});

$('#editBatch #e_purrate').keyup(function(){ 
var prate=$(this).val();
var taxrate=$('#editBatch #tax1').val();
var onper=parseFloat(1/100);
var answer = parseFloat(prate)+parseFloat(prate * ((taxrate)/100));//Purchase cost

var wholesale = parseFloat(answer) + parseFloat(answer)*(10/100);
var branchrate = parseFloat(answer)+parseFloat(answer * onper); 

var purtax=parseFloat(prate)*1/100;

var brate=parseFloat(purtax)+parseFloat(prate);

$('#editBatch #e_wholesale').val(wholesale.toFixed(2));
$('#editBatch #e_purcost').val(answer.toFixed(2));
$('#editBatch #e_brn_rate').val(brate.toFixed(2));
});

});

$('#hsncode1').on('change',function(){
	//alert();
	var id=$(this).val();
	
	if(id==0){
		$('.prate').attr("disabled", true); 
	}else{
		$('.prate').attr("disabled", false); 
	}
	
	//alert("Hello! I am an alert box!!");
      var hsn = this.value; 
//alert(hsn);	  
    $.ajax({
        type: "POST",
        url: "<?php echo site_url(); ?>/Admin/hsncodesearch",
        data:{hsn:hsn},
        success: function(result){
			console.log(result);
			var obj=JSON.parse(result)
			$('#tax1').val(obj.hsn_tax);
			
			
       
    }});
  });
</script>