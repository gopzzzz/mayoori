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

		<h1 align="center">Batch Wise Stock Report</h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">Batch Wise Stock Report</a></li>

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
						<a href="<?php echo base_url('stockdownload'); ?>"><button type="button" class="btn btn-sm btn-success">Export</button></a>
						


					</div>
					

					<?php echo form_open_multipart('Admin/itemwisestock');?>

<div class=" col-sm-3" style="width: 200px;">
<select name="typeoffilter" class="form-control filtertype">
	<option value="1" <?php if($id==1){echo 'selected';}?>>Item Wise</option>
	<option value="2" <?php if($id==2){echo 'selected';}?>>Supplier</option>
	<option value="3" <?php if($id==3){echo 'selected';}?>>Category</option>
	<option value="4" <?php if($id==4){echo 'selected';}?>>Group</option>
	<option value="5" <?php if($id==5){echo 'selected';}?>>Aging Stock</option>
	
	<!-- <option value="6">Closing Stock</option> -->
</select>
	

	
</div>	

<div class=" col-sm-3" style="width: 200px;" id="barcodeprintselect">
<select name="selectfilter" class="form-control" id="selectfilter" <?php if($id!=1){?>style="display:bloack;"<?php}else{?>style="display:none;"<?php }?>>
	<?php if($id==2){ foreach($supplier as $supplier){?>
		 
    <option value="<?php echo $supplier->sup_id;?>" <?php if($supplier->sup_id==$name){echo 'selected';}?>><?php echo  $supplier->sup_name;?></option>
	<?php }}else if($id==3){ foreach($category as $category){ ?>
		<option value="<?php echo $category->itcat_id ;?>" <?php if($category->itcat_id ==$name){echo 'selected';}?>><?php echo  $category->itcat_name;?></option>
<?php 	}}else if($id==4){ foreach($group as $group){ ?>
	<option value="<?php echo $group->ig_id  ;?>" <?php if($group->ig_id  ==$name){echo 'selected';}?>><?php echo  $group->ig_name;?></option>
	 <?php


}

	}?>
	
</select>
<input type="text"  class="form-control nameItem" id="itemname" placeholder="Search Itemnmae">
<input class="form-control " name="itemname" type="hidden" id="itemid">
            <div id="name_list"></div>

<input type="date" name="from" class="form-control" id="from" style="display:none;">
<input type="date" name="to" class="form-control" id="to" style="display:none;" >

	
</div>


	<div class="input-group-btn">

	  <button type="submit" name="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	  <a href="<?php echo base_url('itemwisestock');?>"><button type="button"  class="btn btn-default">REFRESH</button></a>
	</div>
 </form>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table  class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Item Name</th>
                                    
									<th>Batch</th>
                                   
									<th>Closing Stock</th>
                                    <th>Closing stock Cost</th>

								</tr>
							</thead>
							
							
							<?php
                            $i=1;
                            foreach($stockreport as $key){
							?>
							<tr>
								<td><?php echo $i;?></td>
                                <td><?php echo $key->itm_name;?></td>
                                <td><?php echo $key->batchcode;?></td>
                                <td><?php echo $key->cur_stock_item_count;?></td>
                                <td><?php if($key->t_pc==0.00){echo $key->cur_stock_item_count*$key->e_pc;}else{echo $key->cur_stock_item_count*$key->t_pc;}?></td>
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
		$('.filtertype').on('change',function(){
             var pay_type=$(this).val();
			 $.ajax({
        type: "POST",
        dataType: "json",
				url: '<?php echo site_url('Admin/getstockreportfilter');?>',
				data: { pay_type: pay_type },
				success: function (res) {
                   console.log(res);
                    $('#selectfilter').empty();
                    var html_each='<option value="0">select</option>';
                    if(pay_type==1){
						
						$('#from').hide();
											$('#to').hide();
											$('#selectfilter').hide();
											$('#itemname').show();

										}else if(pay_type==2){
											$.each( res, function( key, value ) {
					html_each +='<option value="'+value.sup_id+'">'+value.sup_name+'</option>';
				});  
				$('#from').hide();
											$('#to').hide();
											$('#selectfilter').show();
											$('#itemname').hide();
										}else if(pay_type==3){
											$.each( res, function( key, value ) {
					html_each +='<option value="'+value.itcat_id +'">'+value.itcat_name+'</option>';
				});
				$('#from').hide();
											$('#to').hide();
											$('#selectfilter').show();
											$('#itemname').hide();
				                        }else if(pay_type==4){
											$.each( res, function( key, value ) {
					html_each +='<option value="'+value.ig_id +'">'+value.ig_name+'</option>';
				});
				                            $('#from').hide();
											$('#to').hide();
											$('#selectfilter').show();
											$('#itemname').hide();
				                        }else{
										//	window.location.replace("http://127.0.0.1/mayoori_krp_test/Admin/aginingstock");
											$('#selectfilter').hide();
											$('#from').show();
											$('#to').show();
											$('#itemname').hide();
										}
										
   
    $('#selectfilter').append(html_each);  
	
     }
     });
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