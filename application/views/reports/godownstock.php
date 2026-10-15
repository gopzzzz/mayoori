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

		<h1 align="center">Godown Stock Report</h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">Godown Stock Report</a></li>

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
			


						<div class="box-tools" id="barcodeprintselect">
                        <?php echo form_open_multipart('godownstock');?>
                        <select name="category" class="form-control">
                            <option value="">Select Category</option>
                            <?php foreach($category as $category1){?>
                            <option value="<?php echo $category1->itcat_id;?>"><?php echo $category1->itcat_name;?></option>
                            <?php } ?>
                        </select>
                        <input type="text"  class="form-control nameItem" id="itemname" placeholder="search item name" >
<input class="form-control " name="itemname" type="hidden" id="itemid">
            <div id="name_list"></div>
            <button type="submit" name="filter" class="btn btn-sm btn-success">Search</button>
            <a href="<?php echo base_url('godownstock');?>"><button type="button"  class="btn btn-default">REFRESH</button></a>
                  </form>

					   </div>
					

	
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table  class="table table-hover" id="example2">
							<thead>
								<tr>
									<th>#</th>

                                    <th>Godown Name</th>

									<th>Item Name</th>

                                    <th>Item Code</th>

                                  
									<th>Batch</th>

                                    <th>Stock</th>

                                   
                                   

								</tr>
							</thead>
							
							
							<?php
                            $i=1;
                            foreach($stock as $key){
							?>
							<tr>
								<td><?php echo $i;?></td>
                                <td><?php echo $key->name;?></td>
                                <td><?php echo $key->itm_name;?></td>
                                <td><?php echo $key->itm_code;?></td>
                                <td><?php echo $key->batchcode;?></td>
                             
                                <td><?php  echo $key->inventory_stock_itemcount;?></td>
                            </td>
                          
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
		});
        $('.nameItem').on('keyup', function () {
		
		var itemName = $(this).val();
  //alert(itemName);
		if (itemName != '' && itemName != 0) {
			$.ajax({
				type: "POST",
				url: '<?php echo site_url('Admin/searchItemNameListbarcode1');?>',
				data: { itemName: itemName },
				success: function (res) {
					console.log(res);
					if (res) {
						$('#name_list').show();
						$('#name_list').html(res);
					} else {
						$('#name_list').html("");
					}
				},
			});	
		  }
		else{
			$('#name_list').html("");
		}
}); 

$('#barcodeprintselect').on('click','.subSelect_itemedit',function(){
  
  var itemValue = $(this).data('value');
  //alert(itemValue);
 
  $('#name_list').hide();
  $.ajax({
		type:"POST",
		url:'<?php echo site_url('Admin/getBatchByItem');?>',
		data: { itemValue : itemValue},
		   success:function(res){
			  var batchlist = JSON.parse(res);
			  console.log(res);
			  var i;
			  var optiondata= '<option value="">Select</option>';
			  for(i=0;i<batchlist.length;i++){
				 
				 optiondata += '<option value="'+batchlist[i].batch_id+'">'+batchlist[i].batchcode+'('+batchlist[i].cur_stock_item_count+')</option>';

			  }
			  
			  $('#itembatchid').html(optiondata);
			  $('#itemid').val(batchlist[0].itm_id);
			  $('#itemname').val(batchlist[0].itm_name);
			  
			  
		   }
  })
});
		</script>

	</body>

	</html>