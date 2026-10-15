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

<?php $data['leftmenu']='inventory_reports';$data['mainmenu']='details'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



	<!-- Content Header (Page header) -->

	<section class="content-header">

		<h1 align="center">Full Stock Report</h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">Full Stock Report</a></li>

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
						<a href="<?php echo base_url('export_stock'); ?>"><button type="button" class="btn btn-sm btn-success">Export</button></a>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table  class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Item Name</th>
                                    
									<th>Batch</th>
                                    <th>Purchase</th>
									<th>Physical Stock</th>
                                    <th>Purchase Return</th>
                                    <th>Sale</th>
                                    <th>Sale Return</th>
                                    
									<th>Closing Stock</th>
                                    <th>Closing stock Cost</th>

								</tr>
							</thead>
							
							<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td id="totalclosing">0</td>
							<td id="totalsum">0</td>
							</tr>
							<?php
                            $i=1;
                            foreach($stockreport as $key){
                            ?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $key->itm_name;?></td>
							
                                <td><?php echo $key->batchcode;?></td>
								 <td><?php $batchid=$key->batch_id;
                                 //echo $key->batch_id;
                                 $purchasecount=$this->Admin_model->get_totalpurchasecount($batchid);
                                echo $purchasecount->mysum;?></td>
                                 
								 <td><?php $batchid=$key->batch_id;
                                 //echo $key->batch_id;
                                 $physicalcount=$this->Admin_model->get_totalphysicalstockcount($batchid);
                                echo $physicalcount->mysum;?></td>
								 <td>
								 <?php
                                 //echo $key->batch_id;
                                 $purchasereturncount=$this->Admin_model->get_totalpurchasereturncount($batchid);
                                echo $purchasereturncount->mysum;?></td>

								
                                 
                                <td><?php 
                                 //echo $key->batch_id;
                                 $sale=$this->Admin_model->get_totalsalecount($batchid);
                                echo $sale->mysum ;?></td>
                                <td><?php 
                                 //echo $key->batch_id;
                                 $salereturn=$this->Admin_model->get_totalsalereturncount($batchid);
                                echo $salereturn->mysum ;?></td>
                                <td><?php $closingstock=((($purchasecount->mysum+$physicalcount->mysum)-$purchasereturncount->mysum)-$sale->mysum)+$salereturn->mysum;echo $closingstock;?></td>
							<td>
							<?php if($key->t_pc==0.00){echo $closingstock*$key->e_pc;}else{echo $closingstock*$key->t_pc;}?></td>
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
// 	//alert();
// 	$.ajax({
// 			type: "GET",
// 			url: '<?php echo site_url('Admin/totalstocksumreport');?>',
			
// 			success: function(res) {
// 				console.log(res);
// 				if(res){
// 							$('#totalsum').html(res);	
// 								}else{
// 									$('#saleb2cbody').html("");
// 								}
				
// 			},
// 		});

// 		$.ajax({
// 			type: "GET",
// 			url: '<?php echo site_url('Admin/totalstockclosingreport');?>',
			
// 			success: function(res) {
// 				console.log(res);
// 				if(res){
// 							$('#totalclosing').html(res);	
// 								}else{
// 									$('#saleb2cbody').html("");
// 								}
				
// 			},
// 		});
// });
	
	</script>


	</body>

	</html>