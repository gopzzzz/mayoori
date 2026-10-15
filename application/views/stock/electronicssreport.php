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

		<h1 align="center">Current Stocks</h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">Furniture  Stocks</a></li>

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
						<form name="myForm" onsubmit="return validateForm()" method="post" action="<?php echo site_url('AdminController/electronics');?>">
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
								<a href="<?php echo base_url('electronics');?>"><button type="button" name="submit" class="btn btn-success btn-sm">Refresh</button></a>
								</form>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table id="example2" class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Group</th>
									<th>Category</th>
									<th>Item Name</th>
									<th>Item Code</th>
									<th>BATCHCODE</th>
								   <th>Current Stock</th>
                                   <th>Branch</th>
                                   <th>Godown</th>
									
									
								</tr>
							</thead>
							<?php
                            $i=1;
                            foreach($stocks as $key){
                            ?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $key->ig_name;?></td>
								<td><?php echo $key->itcat_name;?></td>
								<td><?php echo $key->itm_name;?><input type="hidden" value="<?php echo $key->itm_id;?>" id="itemid_<?php echo $key->batch_id;?>"></td>
								
								<td><?php echo $key->itm_code;?></td>
								<td><?php echo $key->batchcode;?></td>
                                <td><input type="hidden" value="<?php echo $key->cur_stock_id;?>" id="custockid_<?php echo $key->batch_id;?>"><input type="text" value="<?php echo $key->cur_stock_item_count;?>" style="border: none;" id="cstock_<?php echo $key->batch_id;?>" readonly></td>
                                <td><?php $batchid=$key->batch_id;$branch=$this->Admin_model->get_branchstock($batchid); ?>
								<input type="hidden" value="<?php echo $branch->inventory_stock_id ;?>" id="inbstockid_<?php echo $key->batch_id;?>">
								<input type="text" class="branchstock" data-id="<?php echo $key->batch_id;?>" value="<?php if($branch->inventory_stock_itemcount==null){echo '0';}else{echo $branch->inventory_stock_itemcount;}?>" style="border: none;" id="bstock_<?php echo $key->batch_id;?>"></td>
                                <td><?php $batchid=$key->batch_id;$branch1=$this->Admin_model->get_godwonstock1($batchid); ?>
								<input type="hidden" value="<?php echo $branch1->inventory_stock_id;?>" id="ingstockid_<?php echo $key->batch_id;?>">
								<input type="text" class="godownstock" data-id="<?php echo $key->batch_id;?>" value="<?php if($branch1->inventory_stock_itemcount==null){echo '0';}else{echo $branch1->inventory_stock_itemcount;}?>" style="border: none;" id="gstock_<?php echo $key->batch_id;?>" readonly>
							</td>
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

		$('.branchstock').on('keyup',function(){
          var id=$(this).data('id');
		  var bstock=$(this).val();
		  var gstock=$('#gstock_'+id).val();
		  var cstock=parseFloat(bstock)+parseFloat(gstock);
		  var bstockid=$('#inbstockid_'+id).val();
		  var gstockid=$('#ingstockid_'+id).val();
		  var cstockid=$('#custockid_'+id).val();
		  var itemid=$('#itemid_'+id).val();
		  $('#cstock_'+id).val(cstock);
		 
		
		  
			$.ajax({

						type: "POST",
						url: '<?php echo site_url('AdminController/editstockdirect');?>',
						data: {
							bstock:bstock,gstock: gstock,cstock:cstock,bstockid:bstockid,gstockid:gstockid,
							cstockid:cstockid,itemid:itemid,id:id
						},

						success: function(res) {
							console.log(res);
							//location.reload();
						},

						});

		});

		$('.godownstock').on('keyup',function(){
          var id=$(this).data('id');
		  var gstock=$(this).val();
		  var bstock=$('#bstock_'+id).val();
		  var cstock=parseFloat(bstock)+parseFloat(gstock);
		  var bstockid=$('#inbstockid_'+id).val();
		  var gstockid=$('#ingstockid_'+id).val();
		  var cstockid=$('#custockid_'+id).val();
		  $('#cstock_'+id).val(cstock);
		  var itemid=$('#itemid_'+id).val();
			$.ajax({

						type: "POST",
						url: '<?php echo site_url('AdminController/editstockdirect');?>',
						data: {
							bstock:bstock,gstock: gstock,cstock:cstock,bstockid:bstockid,gstockid:gstockid,
							cstockid:cstockid,itemid:itemid,id:id
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