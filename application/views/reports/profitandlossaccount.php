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
.form-group{
    padding-top: 20px;
}
</style>

<?php $data['leftmenu']='inventory_reports';$data['mainmenu']='details'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



	<!-- Content Header (Page header) -->

	<section class="content-header">

		<h1 align="center">Trading , Profit and Loss Account</h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">Trading , Profit and Loss Account</a></li>

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
					

					<?php echo form_open_multipart('profitandlossaccount');?>



<div class=" col-sm-3" style="width: 200px;">


<input type="date" name="from" class="form-control" id="from" value="<?php echo $from;?>">
<input type="date" name="to" class="form-control" id="to" value="<?php echo $to;?>" >

	
</div>


	<div class="input-group-btn">

	  <button type="submit" name="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
      <a href="<?php echo base_url('profitandlossaccount');?>"><button type="button"  class="btn btn-default">Refresh</button></a>
	</div>
 </form>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding row">
					<div class="col-sm-6">
                        <div class="form-group">
                        <div class="col-sm-4"><label>Total Purchase</label></div>
                        <div class="col-sm-8"><input type="text" class="form-control" value="<?php echo $totalpurchase->mysum;?>"></div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-4"><label>Total Purchase Return</label></div>
                        <div class="col-sm-8"><input type="text" class="form-control" value="<?php echo $totalpreturn->mysum;?>"></div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-4"><label>Net Purchase</label></div>
                        <div class="col-sm-8"><input type="text" class="form-control" value="<?php  $tpurchase=$totalpurchase->mysum-$totalpreturn->mysum+$directexpense->mysum; echo $tpurchase;?>"></div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-4"><label>Direct Expense</label></div>
                        <div class="col-sm-8"><input type="text" class="form-control" value="<?php echo $directexpense->mysum;?>"></div>
                        </div>
                        <?php $totalsales=(($slesb2c->paidsum+$slesb2b->paidsum)-$salesreturn->Mysum)+$directincome->mysum;?>
                        <div class="form-group">
                        <div class="col-sm-4"><label>Gross Profit</label></div>
                        <div class="col-sm-8"><input type="text" class="form-control" value="<?php $grossprofit=$totalsales-$tpurchase;  if($grossprofit>0){echo $grossprofit;}?>"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <div class="col-sm-4"><label>Total Sales</label></div>
                        <div class="col-sm-8"><input type="text" class="form-control" value="<?php echo $slesb2c->paidsum+$slesb2b->paidsum;?>"></div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-4"><label>Total Sales Return</label></div>
                        <div class="col-sm-8"><input type="text" class="form-control" value="<?php echo $salesreturn->Mysum;?>"></div>
                        </div>
                      
                        <div class="form-group">
                        <div class="col-sm-4"><label>Net Sale:</label></div>
                        <div class="col-sm-8"><input type="text" class="form-control" value="<?php echo $totalsales;?>"></div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-4"><label>Direct Income</label></div>
                        <div class="col-sm-8"><input type="text" class="form-control" value="<?php echo $directincome->mysum;?>"></div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-4"><label>Gross Loss</label></div>
                        <div class="col-sm-8"><input type="text" class="form-control" value="<?php if($grossprofit<0){echo $grossprofit;}?>"></div>
                        </div>
                    </div> 
                    </div>
                    <hr>

                    <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col-sm-4"><label>Indirect Expense</label></div>
                        <div class="col-sm-8"><input type="text" class="form-control" value="<?php echo $indirectexpense->mysum;?>"></div>
                        </div>
                        
                        <div class="form-group">
                        <div class="col-sm-4"><label>Net Profit/Loss</label></div>
                        <div class="col-sm-8"><input type="text" class="form-control" value="<?php echo  ($grossprofit+$indirectincome->mysum+$indirectjournal->Mysum)-$indirectexpense->mysum;?>"></div>
                        </div>
                    </div>
					<div class="col-sm-6">
                    <div class="form-group">
                        <div class="col-sm-4"><label>Gross Profit/Loss</label></div>
                        <div class="col-sm-8"><input type="text" class="form-control" value="<?php echo $grossprofit;?>"></div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-4"><label>Indirect Income</label></div>
                        <div class="col-sm-8"><input type="text" class="form-control" value="<?php echo $indirectincome->mysum+$indirectjournal->Mysum;?>"></div>
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
		});
	

	</body>

	</html>