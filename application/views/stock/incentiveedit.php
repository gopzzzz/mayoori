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
</style>

<?php $data['leftmenu']='stock_reports';$data['mainmenu']='details'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



	<!-- Content Header (Page header) -->

	<section class="content-header">

		<h1 align="center"><?php echo $groups->ig_name;?> Incentive Edit</h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#"><?php echo $groups->ig_name;?> Incentive Edit</a></li>

		</ol>

	</section><br>



	<!-- Main content -->

	<section class="content">
		

		

		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<input type="hidden" id="response_noti"
							value="<?php echo $this->session->flashdata('response');?>" />


						<div class="box-tools">
						<form name="myForm" onsubmit="return validateForm()" method="post" action="<?php echo site_url('AdminController/incentiveedit');?>">
							<div class="row">
								<label>Category</label>
							<select name="category" class="form-control">
								<option value="">select</option>
								<?php foreach($category as $key1){ ?>
									<option value="<?php echo $key1->itcat_id;?>" <?php if($cat==$key1->itcat_id){echo 'selected';}?>><?php echo $key1->itcat_name;?></option>
								
								<?php }?>
							</select>
							<label>Supplier</label>
							<select name="supplier" class="form-control">
								<option value="">select</option>
								<?php foreach($supplier as $key2){ ?>
									<option value="<?php echo $key2->sup_id;?>" <?php if($sup==$key2->sup_id){echo 'selected';}?>><?php echo $key2->sup_name;?></option>
								
								<?php }?>
							</select>
								</div>
								<br>
								<button type="submit" name="submit" class="btn btn-success btn-sm">filter</button>
								<a href="<?php echo base_url('incentiveedit');?>"><button type="button" name="submit" class="btn btn-success btn-sm">Refresh</button></a>
								</form>
						
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table id="example2" class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Item Name</th>
									<th>Item Code</th>
									<th>BATCHCODE</th>
								   <th>Incentive Type</th>
                                   <th>Value</th>
                                  
                                   <th>Range1</th>
                                   <th>Range1 Type</th>
                                   <th>Range1 Value</th>
                                   <th>Range2</th>
                                   <th>Range2 Type</th>
                                   <th>Range2 Value</th>
                                   <th>Range3</th>
                                   <th>Range3 Type</th>
                                   <th>Range3 Value</th>
                                   <th>Range4</th>
                                   <th>Range4 Type</th>
                                   <th>Range4 Value</th>
									
									
								</tr>
							</thead>
							<?php
                            $i=1;
                            foreach($incentive as $key){
                            ?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $key->itm_name;?></td>
								
								<td><?php echo $key->itm_code;?></td>
								<td><?php echo $key->batchcode;?></td>
                                <td><select class="form-control incentivetype" data-id="<?php echo $key->id;?>" name="incentivetype" id="incentivetype_<?php echo $key->id;?>"><option value="">Select</option><option value="1" <?php if($key->incentive_type==1){echo 'selected';}?>>Amount</option><option value="2" <?php if($key->incentive_type==2){echo 'selected';}?>>Percentage</option><option value="3" <?php if($key->incentive_type==3){echo 'selected';}?>>Both</option></select></td>
                                <td><input type="text" class="form-control amountpercentage" data-id="<?php echo $key->id;?>" value="<?php echo $key->in_peramount;?>" id="value_<?php echo $key->id;?>"></td>
                              
                                <td><input type="text" class="form-control range1" data-id="<?php echo $key->id;?>" value="<?php echo $key->range1;?>" id="range1_<?php echo $key->id;?>"></td>
                                <td><select class="form-control rangre1type" data-id="<?php echo $key->id;?>" name="incentivetype" id="range1type_<?php echo $key->id;?>"><option value="">Select</option><option value="1" <?php if($key->r1_type==1){echo 'selected';}?>>Amount</option><option value="2" <?php if($key->r1_type==2){echo 'selected';}?>>Percentage</option></select></td>
                                <td><input type="text" class="form-control r1amount" data-id="<?php echo $key->id;?>"  id="r1amount_<?php echo $key->id;?>" value="<?php echo $key->r1_amount;?>"></td>
                                <td><input type="text" class="form-control range2" data-id="<?php echo $key->id;?>" id="range2_<?php echo $key->id;?>" value="<?php echo $key->range2;?>"></td>
								<td><select class="form-control r2type" data-id="<?php echo $key->id;?>" id="r2type_<?php echo $key->id;?>" name="incentivetype"><option value="">Select</option><option value="1" <?php if($key->r2_type==1){echo 'selected';}?>>Amount</option><option value="2" <?php if($key->r2_type==2){echo 'selected';}?>>Percentage</option></select></td>
                                <td><input type="text" class="form-control r2amount" data-id="<?php echo $key->id;?>" id="r2amount_<?php echo $key->id;?>" value="<?php echo $key->r2_amount;?>"></td>
                                <td><input type="text" class="form-control range3" data-id="<?php echo $key->id;?>" id="range3_<?php echo $key->id;?>" value="<?php echo $key->range3;?>"></td>
                                <td><select class="form-control r3type" data-id="<?php echo $key->id;?>" id="r3type_<?php echo $key->id;?>" name="incentivetype"><option value="">Select</option><option value="1"  <?php if($key->r3_type==1){echo 'selected';}?>>Amount</option><option value="2" <?php if($key->r3_type==2){echo 'selected';}?>>Percentage</option></select></td>
                                <td><input type="text" class="form-control r3amount" data-id="<?php echo $key->id;?>"  id="r3amount_<?php echo $key->id;?>" value="<?php echo $key->r3_amount;?>"></td>
                                <td><input type="text" class="form-control range4" data-id="<?php echo $key->id;?>" id="range4_<?php echo $key->id;?>" value="<?php echo $key->range4;?>"></td>
								<td><select class="form-control r4type" data-id="<?php echo $key->id;?>"  id="r4type_<?php echo $key->id;?>" name="incentivetype"><option value="">Select</option><option value="1" <?php if($key->r4_type==1){echo 'selected';}?>>Amount</option><option value="2" <?php if($key->r4_type==2){echo 'selected';}?>>Percentage</option></select></td>
                                <td><input type="text" class="form-control r4amount" data-id="<?php echo $key->id;?>" id="r4amount_<?php echo $key->id;?>" value="<?php echo $key->r4_amount;?>"></td>
							</tr>
							<?php
                            $i++;
                            }
                            ?>
						</table>
					</div>
					
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>

	</section>

	

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

		$('.incentivetype').on('change',function(){
          var id=$(this).data('id');
		  var incentivetype=$(this).val();
		  var amount=$('#value_'+id).val();
		  var range1=$('#range1_'+id).val();
		  var r1type=$('#range1type_'+id).val();
		  var r1amount=$('#r1amount_'+id).val();
		  var range2=$('#range2_'+id).val();
		  var r2type=$('#r2type_'+id).val();
		  var r2amount=$('#r2amount_'+id).val();
		  var range3=$('#range3_'+id).val();
		  var r3type=$('#r3type_'+id).val();
		  var r3amount=$('#r3amount_'+id).val();
		  var range4=$('#range4_'+id).val();
		  var r4type=$('#r4type_'+id).val();
		  var r4amount=$('#r4amount_'+id).val();
		  //$('#cstock_'+id).val(cstock);
		 
		
		  
			$.ajax({

						type: "POST",
						url: '<?php echo site_url('AdminController/editincentive');?>',
						data: {
							incentivetype:incentivetype,amount: amount,range1:range1,r1type:r1type,r1amount:r1amount,
							range2:range2,r2type:r2type,id:id,r2amount:r2amount,range3:range3,r3type:r3type,r3amount:r3amount,
							range4:range4,r4type:r4type,r4amount:r4amount
						},

						success: function(res) {
							console.log(res);
							//location.reload();
						},

						});

				if(incentivetype==1){
					$('#range1_'+id).attr('readonly', true);
					$('#range1type_'+id).attr('readonly', true);
					$('#r1amount_'+id).attr('readonly', true);
					$('#range2_'+id).attr('readonly', true);
					$('#r2amount_'+id).attr('readonly', true);
					$('#r2type_'+id).attr('readonly', true);
					$('#range3_'+id).attr('readonly', true);
					$('#r3type_'+id).attr('readonly', true);
					$('#r3amount_'+id).attr('readonly', true);
					$('#range4_'+id).attr('readonly', true);
					$('#r4type_'+id).attr('readonly', true);
					$('#r4amount_'+id).attr('readonly', true);
					$('#value_'+id).attr('readonly', false);
				}else if(incentivetype==2){
					$('#range1_'+id).attr('readonly', true);
					$('#range1type_'+id).attr('readonly', true);
					$('#r1amount_'+id).attr('readonly', true);
					$('#range2_'+id).attr('readonly', true);
					$('#r2amount_'+id).attr('readonly', true);
					$('#r2type_'+id).attr('readonly', true);
					$('#range3_'+id).attr('readonly', true);
					$('#r3type_'+id).attr('readonly', true);
					$('#r3amount_'+id).attr('readonly', true);
					$('#range4_'+id).attr('readonly', true);
					$('#r4type_'+id).attr('readonly', true);
					$('#r4amount_'+id).attr('readonly', true);
					$('#value_'+id).attr('readonly', false);
				}else if(incentivetype==3){
					$('#value_'+id).attr('readonly', true);
					$('#range1_'+id).attr('readonly', false);
					$('#range1type_'+id).attr('readonly', false);
					$('#r1amount_'+id).attr('readonly', false);
					$('#range2_'+id).attr('readonly', false);
					$('#r2amount_'+id).attr('readonly', false);
					$('#r2type_'+id).attr('readonly', false);
					$('#range3_'+id).attr('readonly', false);
					$('#r3type_'+id).attr('readonly', false);
					$('#r3amount_'+id).attr('readonly', false);
					$('#range4_'+id).attr('readonly', false);
					$('#r4type_'+id).attr('readonly', false);
					$('#r4amount_'+id).attr('readonly', false);
					
				}		

		});

		$('.amountpercentage').on('keyup',function(){
          var id=$(this).data('id');
		  var incentivetype=$('#incentivetype_'+id).val();
		  var amount=$(this).val();
		  var range1=$('#range1_'+id).val();
		  var r1type=$('#range1type_'+id).val();
		  var r1amount=$('#r1amount_'+id).val();
		  var range2=$('#range2_'+id).val();
		  var r2type=$('#r2type_'+id).val();
		  var r2amount=$('#r2amount_'+id).val();
		  var range3=$('#range3_'+id).val();
		  var r3type=$('#r3type_'+id).val();
		  var r3amount=$('#r3amount_'+id).val();
		  var range4=$('#range4_'+id).val();
		  var r4type=$('#r4type_'+id).val();
		  var r4amount=$('#r4amount_'+id).val();
		  //$('#cstock_'+id).val(cstock);
		 
		
		  
			$.ajax({

						type: "POST",
						url: '<?php echo site_url('AdminController/editincentive');?>',
						data: {
							incentivetype:incentivetype,amount: amount,range1:range1,r1type:r1type,r1amount:r1amount,
							range2:range2,r2type:r2type,id:id,r2amount:r2amount,range3:range3,r3type:r3type,r3amount:r3amount,
							range4:range4,r4type:r4type,r4amount:r4amount
						},

						success: function(res) {
							console.log(res);
							//location.reload();
						},

						});

		});

		
		$('.range1').on('keyup',function(){
          var id=$(this).data('id');
		  var incentivetype=$('#incentivetype_'+id).val();
		  var amount=$('#value_'+id).val();
		  var range1=$(this).val();
		  var r1type=$('#range1type_'+id).val();
		  var r1amount=$('#r1amount_'+id).val();
		  var range2=$('#range2_'+id).val();
		  var r2type=$('#r2type_'+id).val();
		  var r2amount=$('#r2amount_'+id).val();
		  var range3=$('#range3_'+id).val();
		  var r3type=$('#r3type_'+id).val();
		  var r3amount=$('#r3amount_'+id).val();
		  var range4=$('#range4_'+id).val();
		  var r4type=$('#r4type_'+id).val();
		  var r4amount=$('#r4amount_'+id).val();
		  //$('#cstock_'+id).val(cstock);
		 
		
		  
			$.ajax({

						type: "POST",
						url: '<?php echo site_url('AdminController/editincentive');?>',
						data: {
							incentivetype:incentivetype,amount: amount,range1:range1,r1type:r1type,r1amount:r1amount,
							range2:range2,r2type:r2type,id:id,r2amount:r2amount,range3:range3,r3type:r3type,r3amount:r3amount,
							range4:range4,r4type:r4type,r4amount:r4amount
						},

						success: function(res) {
							console.log(res);
							//location.reload();
						},

						});

		});

		$('.rangre1type').on('change',function(){
          var id=$(this).data('id');
		  var incentivetype=$('#incentivetype_'+id).val();
		  var amount=$('#value_'+id).val();
		  var range1=$('#range1_'+id).val();
		  var r1type=$(this).val();
		  var r1amount=$('#r1amount_'+id).val();
		  var range2=$('#range2_'+id).val();
		  var r2type=$('#r2type_'+id).val();
		  var r2amount=$('#r2amount_'+id).val();
		  var range3=$('#range3_'+id).val();
		  var r3type=$('#r3type_'+id).val();
		  var r3amount=$('#r3amount_'+id).val();
		  var range4=$('#range4_'+id).val();
		  var r4type=$('#r4type_'+id).val();
		  var r4amount=$('#r4amount_'+id).val();
		  //$('#cstock_'+id).val(cstock);
		 
		
		  
			$.ajax({

						type: "POST",
						url: '<?php echo site_url('AdminController/editincentive');?>',
						data: {
							incentivetype:incentivetype,amount: amount,range1:range1,r1type:r1type,r1amount:r1amount,
							range2:range2,r2type:r2type,id:id,r2amount:r2amount,range3:range3,r3type:r3type,r3amount:r3amount,
							range4:range4,r4type:r4type,r4amount:r4amount
						},

						success: function(res) {
							console.log(res);
							//location.reload();
						},

						});

		});
	

		$('.r1amount').on('keyup',function(){
          var id=$(this).data('id');
		  var incentivetype=$('#incentivetype_'+id).val();
		  var amount=$('#value_'+id).val();
		  var range1=$('#range1_'+id).val();
		  var r1type=$('#range1type_'+id).val();
		  var r1amount=$(this).val();
		  var range2=$('#range2_'+id).val();
		  var r2type=$('#r2type_'+id).val();
		  var r2amount=$('#r2amount_'+id).val();
		  var range3=$('#range3_'+id).val();
		  var r3type=$('#r3type_'+id).val();
		  var r3amount=$('#r3amount_'+id).val();
		  var range4=$('#range4_'+id).val();
		  var r4type=$('#r4type_'+id).val();
		  var r4amount=$('#r4amount_'+id).val();
		  //$('#cstock_'+id).val(cstock);
		 
		
		  
			$.ajax({

						type: "POST",
						url: '<?php echo site_url('AdminController/editincentive');?>',
						data: {
							incentivetype:incentivetype,amount: amount,range1:range1,r1type:r1type,r1amount:r1amount,
							range2:range2,r2type:r2type,id:id,r2amount:r2amount,range3:range3,r3type:r3type,r3amount:r3amount,
							range4:range4,r4type:r4type,r4amount:r4amount
						},

						success: function(res) {
							console.log(res);
							//location.reload();
						},

						});

		});

		$('.range2').on('keyup',function(){
          var id=$(this).data('id');
		  var incentivetype=$('#incentivetype_'+id).val();
		  var amount=$('#value_'+id).val();
		  var range1=$('#range1_'+id).val();
		  var r1type=$('#range1type_'+id).val();
		  var r1amount=$('#r1amount_'+id).val();
		  var range2=$(this).val();
		  var r2type=$('#r2type_'+id).val();
		  var r2amount=$('#r2amount_'+id).val();
		  var range3=$('#range3_'+id).val();
		  var r3type=$('#r3type_'+id).val();
		  var r3amount=$('#r3amount_'+id).val();
		  var range4=$('#range4_'+id).val();
		  var r4type=$('#r4type_'+id).val();
		  var r4amount=$('#r4amount_'+id).val();
		  //$('#cstock_'+id).val(cstock);
		 
		
		  
			$.ajax({

						type: "POST",
						url: '<?php echo site_url('AdminController/editincentive');?>',
						data: {
							incentivetype:incentivetype,amount: amount,range1:range1,r1type:r1type,r1amount:r1amount,
							range2:range2,r2type:r2type,id:id,r2amount:r2amount,range3:range3,r3type:r3type,r3amount:r3amount,
							range4:range4,r4type:r4type,r4amount:r4amount
						},

						success: function(res) {
							console.log(res);
							//location.reload();
						},

						});

		});

		$('.r2type').on('change',function(){
          var id=$(this).data('id');
		  var incentivetype=$('#incentivetype_'+id).val();
		  var amount=$('#value_'+id).val();
		  var range1=$('#range1_'+id).val();
		  var r1type=$('#range1type_'+id).val();
		  var r1amount=$('#r1amount_'+id).val();
		  var range2=$('#range2_'+id).val();
		  var r2type=$(this).val();
		  var r2amount=$('#r2amount_'+id).val();
		  var range3=$('#range3_'+id).val();
		  var r3type=$('#r3type_'+id).val();
		  var r3amount=$('#r3amount_'+id).val();
		  var range4=$('#range4_'+id).val();
		  var r4type=$('#r4type_'+id).val();
		  var r4amount=$('#r4amount_'+id).val();
		  //$('#cstock_'+id).val(cstock);
		 
		
		  
			$.ajax({

						type: "POST",
						url: '<?php echo site_url('AdminController/editincentive');?>',
						data: {
							incentivetype:incentivetype,amount: amount,range1:range1,r1type:r1type,r1amount:r1amount,
							range2:range2,r2type:r2type,id:id,r2amount:r2amount,range3:range3,r3type:r3type,r3amount:r3amount,
							range4:range4,r4type:r4type,r4amount:r4amount
						},

						success: function(res) {
							console.log(res);
							//location.reload();
						},

						});

		});

		$('.r2amount').on('keyup',function(){
          var id=$(this).data('id');
		  var incentivetype=$('#incentivetype_'+id).val();
		  var amount=$('#value_'+id).val();
		  var range1=$('#range1_'+id).val();
		  var r1type=$('#range1type_'+id).val();
		  var r1amount=$('#r1amount_'+id).val();
		  var range2=$('#range2_'+id).val();
		  var r2type=$('#r2type_'+id).val();
		  var r2amount=$(this).val();
		  var range3=$('#range3_'+id).val();
		  var r3type=$('#r3type_'+id).val();
		  var r3amount=$('#r3amount_'+id).val();
		  var range4=$('#range4_'+id).val();
		  var r4type=$('#r4type_'+id).val();
		  var r4amount=$('#r4amount_'+id).val();
		  //$('#cstock_'+id).val(cstock);
		 
		
		  
			$.ajax({

						type: "POST",
						url: '<?php echo site_url('AdminController/editincentive');?>',
						data: {
							incentivetype:incentivetype,amount: amount,range1:range1,r1type:r1type,r1amount:r1amount,
							range2:range2,r2type:r2type,id:id,r2amount:r2amount,range3:range3,r3type:r3type,r3amount:r3amount,
							range4:range4,r4type:r4type,r4amount:r4amount
						},

						success: function(res) {
							console.log(res);
							//location.reload();
						},

						});

		});

		$('.range3').on('keyup',function(){
          var id=$(this).data('id');
		  var incentivetype=$('#incentivetype_'+id).val();
		  var amount=$('#value_'+id).val();
		  var range1=$('#range1_'+id).val();
		  var r1type=$('#range1type_'+id).val();
		  var r1amount=$('#r1amount_'+id).val();
		  var range2=$('#range2_'+id).val();
		  var r2type=$('#r2type_'+id).val();
		  var r2amount=$('#r2amount_'+id).val();
		  var range3=$(this).val();
		  var r3type=$('#r3type_'+id).val();
		  var r3amount=$('#r3amount_'+id).val();
		  var range4=$('#range4_'+id).val();
		  var r4type=$('#r4type_'+id).val();
		  var r4amount=$('#r4amount_'+id).val();
		  //$('#cstock_'+id).val(cstock);
		 
		
		  
			$.ajax({

						type: "POST",
						url: '<?php echo site_url('AdminController/editincentive');?>',
						data: {
							incentivetype:incentivetype,amount: amount,range1:range1,r1type:r1type,r1amount:r1amount,
							range2:range2,r2type:r2type,id:id,r2amount:r2amount,range3:range3,r3type:r3type,r3amount:r3amount,
							range4:range4,r4type:r4type,r4amount:r4amount
						},

						success: function(res) {
							console.log(res);
							//location.reload();
						},

						});

		});

		$('.r3type').on('change',function(){
          var id=$(this).data('id');
		  var incentivetype=$('#incentivetype_'+id).val();
		  var amount=$('#value_'+id).val();
		  var range1=$('#range1_'+id).val();
		  var r1type=$('#range1type_'+id).val();
		  var r1amount=$('#r1amount_'+id).val();
		  var range2=$('#range2_'+id).val();
		  var r2type=$('#r2type_'+id).val();
		  var r2amount=$('#r2amount_'+id).val();
		  var range3=$('#range3_'+id).val();
		  var r3type=$(this).val();
		  var r3amount=$('#r3amount_'+id).val();
		  var range4=$('#range4_'+id).val();
		  var r4type=$('#r4type_'+id).val();
		  var r4amount=$('#r4amount_'+id).val();
		  //$('#cstock_'+id).val(cstock);
		 
		
		  
			$.ajax({

						type: "POST",
						url: '<?php echo site_url('AdminController/editincentive');?>',
						data: {
							incentivetype:incentivetype,amount: amount,range1:range1,r1type:r1type,r1amount:r1amount,
							range2:range2,r2type:r2type,id:id,r2amount:r2amount,range3:range3,r3type:r3type,r3amount:r3amount,
							range4:range4,r4type:r4type,r4amount:r4amount
						},

						success: function(res) {
							console.log(res);
							//location.reload();
						},

						});

		});
		$('.r3amount').on('keyup',function(){
          var id=$(this).data('id');
		  var incentivetype=$('#incentivetype_'+id).val();
		  var amount=$('#value_'+id).val();
		  var range1=$('#range1_'+id).val();
		  var r1type=$('#range1type_'+id).val();
		  var r1amount=$('#r1amount_'+id).val();
		  var range2=$('#range2_'+id).val();
		  var r2type=$('#r2type_'+id).val();
		  var r2amount=$('#r2amount_'+id).val();
		  var range3=$('#range3_'+id).val();
		  var r3type=$('#r3type_'+id).val();
		  var r3amount=$(this).val();
		  var range4=$('#range4_'+id).val();
		  var r4type=$('#r4type_'+id).val();
		  var r4amount=$('#r4amount_'+id).val();
		  //$('#cstock_'+id).val(cstock);
		 
		
		  
			$.ajax({

						type: "POST",
						url: '<?php echo site_url('AdminController/editincentive');?>',
						data: {
							incentivetype:incentivetype,amount: amount,range1:range1,r1type:r1type,r1amount:r1amount,
							range2:range2,r2type:r2type,id:id,r2amount:r2amount,range3:range3,r3type:r3type,r3amount:r3amount,
							range4:range4,r4type:r4type,r4amount:r4amount
						},

						success: function(res) {
							console.log(res);
							//location.reload();
						},

						});

		});
		$('.range4').on('keyup',function(){
          var id=$(this).data('id');
		  var incentivetype=$('#incentivetype_'+id).val();
		  var amount=$('#value_'+id).val();
		  var range1=$('#range1_'+id).val();
		  var r1type=$('#range1type_'+id).val();
		  var r1amount=$('#r1amount_'+id).val();
		  var range2=$('#range2_'+id).val();
		  var r2type=$('#r2type_'+id).val();
		  var r2amount=$('#r2amount_'+id).val();
		  var range3=$('#range3_'+id).val();
		  var r3type=$('#r3type_'+id).val();
		  var r3amount=$('#r3amount_'+id).val();
		  var range4=$(this).val();
		  var r4type=$('#r4type_'+id).val();
		  var r4amount=$('#r4amount_'+id).val();
		  //$('#cstock_'+id).val(cstock);
		 
		
		  
			$.ajax({

						type: "POST",
						url: '<?php echo site_url('AdminController/editincentive');?>',
						data: {
							incentivetype:incentivetype,amount: amount,range1:range1,r1type:r1type,r1amount:r1amount,
							range2:range2,r2type:r2type,id:id,r2amount:r2amount,range3:range3,r3type:r3type,r3amount:r3amount,
							range4:range4,r4type:r4type,r4amount:r4amount
						},

						success: function(res) {
							console.log(res);
							//location.reload();
						},

						});

		});

		$('.r4type').on('change',function(){
          var id=$(this).data('id');
		  var incentivetype=$('#incentivetype_'+id).val();
		  var amount=$('#value_'+id).val();
		  var range1=$('#range1_'+id).val();
		  var r1type=$('#range1type_'+id).val();
		  var r1amount=$('#r1amount_'+id).val();
		  var range2=$('#range2_'+id).val();
		  var r2type=$('#r2type_'+id).val();
		  var r2amount=$('#r2amount_'+id).val();
		  var range3=$('#range3_'+id).val();
		  var r3type=$('#r3type_'+id).val();
		  var r3amount=$('#r3amount_'+id).val();
		  var range4=$('#range4_'+id).val();
		  var r4type=$(this).val();
		  var r4amount=$('#r4amount_'+id).val();
		  //$('#cstock_'+id).val(cstock);
		 
		
		  
			$.ajax({

						type: "POST",
						url: '<?php echo site_url('AdminController/editincentive');?>',
						data: {
							incentivetype:incentivetype,amount: amount,range1:range1,r1type:r1type,r1amount:r1amount,
							range2:range2,r2type:r2type,id:id,r2amount:r2amount,range3:range3,r3type:r3type,r3amount:r3amount,
							range4:range4,r4type:r4type,r4amount:r4amount
						},

						success: function(res) {
							console.log(res);
							//location.reload();
						},

						});

		});

		$('.r4amount').on('keyup',function(){
          var id=$(this).data('id');
		  var incentivetype=$('#incentivetype_'+id).val();
		  var amount=$('#value_'+id).val();
		  var range1=$('#range1_'+id).val();
		  var r1type=$('#range1type_'+id).val();
		  var r1amount=$('#r1amount_'+id).val();
		  var range2=$('#range2_'+id).val();
		  var r2type=$('#r2type_'+id).val();
		  var r2amount=$('#r2amount_'+id).val();
		  var range3=$('#range3_'+id).val();
		  var r3type=$('#r3type_'+id).val();
		  var r3amount=$('#r3amount_'+id).val();
		  var range4=$('#range4_'+id).val();
		  var r4type=$('#r4type_'+id).val();
		  var r4amount=$(this).val();
		  //$('#cstock_'+id).val(cstock);
		 
		
		  
			$.ajax({

						type: "POST",
						url: '<?php echo site_url('AdminController/editincentive');?>',
						data: {
							incentivetype:incentivetype,amount: amount,range1:range1,r1type:r1type,r1amount:r1amount,
							range2:range2,r2type:r2type,id:id,r2amount:r2amount,range3:range3,r3type:r3type,r3amount:r3amount,
							range4:range4,r4type:r4type,r4amount:r4amount
						},

						success: function(res) {
							console.log(res);
							//location.reload();
						},

						});

		});
	</script>


	</body>

	</html>