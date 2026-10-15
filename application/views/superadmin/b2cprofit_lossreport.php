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

<?php $data['leftmenu']=$pagename;$data['mainmenu']='details'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



	<!-- Content Header (Page header) -->

	<section class="content-header">

		<h1 align="center">B2C Profit and Loss</h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">B2C Profit and Loss</a></li>

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

<div class="input-group input-group-sm" style="width: 150px;">

  <form method="POST" action="<?php echo base_url('b2cprofitlossreportsearch');?>">
	<input type="date" name="fdate" id="fdate" class="form-control pull-right" value="<?php echo $from; ?>"/>
	<input type="date" name="tdate" id="tdate" class="form-control pull-right" value="<?php echo $to; ?>"/>
	<select name="category" class="form-control">
		<option value="">Select category</option>
		<?php foreach($category as $category){?>
			<option value="<?php echo $category->itcat_id ;?>"><?php echo $category->itcat_name ;?></option>
			<?php }?>
	</select>

	<select name="group" class="form-control">
		<option value="">Select Group</option>
		<?php foreach($group as $group){?>
			<option value="<?php echo $group->ig_id ;?>"><?php echo $group->ig_name ;?></option>
			<?php }?>
	</select>

	<select name="salesman" class="form-control">
		<option value="">Select Staff</option>
		<?php foreach($staff as $staff){?>
			<option value="<?php echo $staff->stf_id;?>"><?php echo $staff->stf_name;?></option>
			<?php }?>
	</select>


	 <div class="input-group-btn">

	  <button type="submit" name="filter" class="btn btn-default">Filter</button>

	</div> 
	</form>

	<a href="<?php echo base_url('b2cprofitlossreport');?>"><button typpe="button" class="btn btn-default">Refresh</button></a>

  </div>

</div>

					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table  class="table table-hover">
						
						<a href="<?= base_url() ?>crud/export_csv"><button type="button" name="filter" class="btn btn-default">EXPORT</button></a>
							<thead>
								<tr>
									<th>#</th>
									<th>Bill date</th>
									<th>Bill  Number</th>
									
									<th>Item Name</th>
                                    <th>Purchase Cost</th>
                                    <th>Selling Price</th>
                                    <th>Quantity</th>
                                    <th>Profit /loss</th>
									

								</tr>
							</thead>
							<!-- <tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td id="pcostid"></td>
							<td id="sellingpriceid"></td>
							<td></td>
							<td id="profitid"></td>
							
							</tr> -->
							<?php
                             $i=1;
                             foreach($profit_lossDetails as $key){
                            ?>
							<tr>
								<td><?php echo $i;?></td>
                                <td><?php echo $key->sales_master_date;?></td>
								<td><?php echo $key->sales_master_bill_no	;?></td>
								
								<td><?php echo $key->itm_name;?></td>
                                <td><?php if($key->t_pc==0.00){ echo $key->e_pc; }else{
									echo $key->t_pc;
								} ?></td>
                                <td><?php echo $key->sales_trans_unit_price;?></td>
                                <td><?php echo $key->sales_trans_qty;?></td>
                                <td>
								
								<?php
							if($key->t_pc==0.00){
								echo $key->sales_trans_qty*($key->sales_trans_unit_price-$key->e_pc);
						
							}else
						
							
							{
								echo $key->sales_trans_qty*($key->sales_trans_unit_price-$key->t_pc);
								
							}


                                    
                                        ?></td>
                                
							</tr>
							<?php
                             $i++;
                             }
                            ?>
						</table>
						<p><?php echo $links; ?></p>
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
		})


// $( document ).ready(function() {
// 	var from=$('#fdate').val();
// 	var to=$('#tdate').val();
// 	$.ajax({

// type: "POST",
// url: '<?php echo site_url('Admin/get_profitandlosstotal');?>',
// data: { from: from , to:to },


// success: function(res) {
// // 	var a = 0;

// // 	$.each( res, function( key, value ) {

// // 		if(value['t_pc']==0.00){
// //             a+=parseInt(value['sales_trans_qty'])*parseInt(value['sales_trans_unit_price']-value['e_pc']);
      
// //          }else
// //         {
// // 			a+=parseInt(value['sales_trans_qty'])*parseInt(value['sales_trans_unit_price']-value['t_pc']);
            
            
// //        }

// // });

// console.log(res);

// },

// });
// });
	
	</script>


	</body>

	</html>