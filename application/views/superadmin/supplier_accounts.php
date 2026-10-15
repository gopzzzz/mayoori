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

<?php $data['leftmenu']='supplier_accounts';$data['mainmenu']='details'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



	<!-- Content Header (Page header) -->

	<section class="content-header">

		<h1 align="center">Suppliers</h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">Suppliers</a></li>

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
						
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table id="example2" class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Supplier</th>
									<th>Phone Number</th>
                                    <th>GST</th>
								
									<th>Bill Amount</th>
									<th>Balance Pay</th>
									<th>Bill Details</th>
									<th>Opening Stock</th>
								</tr>
							</thead>
							<?php
                            $i=1;
                            foreach($suppliers as $key){
                            ?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $key->sup_name;?></td>
								<td><?php echo $key->sup_phoneno;?></td>
                                <td><?php echo $key->sup_gst;?></td>
								
								<td><?php $suplierid=$key->sup_id;$totalamt=$this->Admin_model->getallsupplier_purchase($suplierid); echo $totalamt->MySum;?></td>
								<td><?php $suplierid=$key->sup_id;$payout=$this->Admin_model->getsupplierbalanceamount($suplierid); $paidamount=$this->Admin_model->get_supplierpaidamountNew($suplierid); echo ($totalamt->MySum)-($paidamount->MySum);?></td>
                              <td><button type="button" data-id="<?php echo $suplierid=$key->sup_id;?>" class="btn btn-success btn-sm billdetails" >Bill Details</button></td>
							  <td><a href="<?php echo base_url('openinstockdel/').$key->sup_id; ?>"><button type="button"  class="btn btn-success btn-sm openingstock" >Opening Stock</button></a></td>
							</tr>
							<?php
                            $i++;
                            }
                            ?>
						</table>

						<div class="modal" tabindex="-1" role="dialog" id="billdetailsmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Bill Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

	  <table class="table table-bordered">
<thead>
	  <tr>
	  <th>Sl.no</th>
	 
	  <th>Bill Number</th>
	  <th>Amount</th>
	  <th>Status</th>
	  </tr>
	  </thead>
	  <tbody id="supplierbilldetails">
	  

	  </tbody>

	  </table>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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

		$('.billdetails').on('click',function(){
			var supid=$(this).data('id');
            $('#supplierbilldetails').empty();
			if(supid){
				$.ajax({
						type:"POST",
						url:'<?php echo site_url('Admin/suplierbillsearch');?>',
						data: { supid : supid},
							success:function(res){console.log(res);
							//alert(res);
								if(res){
									console.log(res);
									
									$('#supplierbilldetails').html(res);
								}
							},
					});	
			}
			$('#billdetailsmodal').modal('show');
		});


	
	</script>


	</body>

	</html>