
 <?php $data['leftmenu']='ledgercreation'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



  <!-- Content Header (Page header) -->

  <section class="content-header">

    <h1 align="center">Finance Creation<small>Preview</small></h1>

    

    <ol class="breadcrumb">

      <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

      <li><a href="<?php echo base_url().'finance';?>">Finance Creation</a></li>

    </ol>

  </section><br>



  <!-- Main content -->

  <section class="content">

 <?php echo form_open_multipart('dcsv');?>
                      <div class="modal-content">
                      
                     
                        
                            <div  class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
                            <h4 class="text-success">Download CSV</h4>
                            <hr>
                              <!-- <div class="col-sm-4">
                              <label class="exampleInputEmail1" >From</label>
                              </div>
                              <div class="form-group col-sm-8">
                              <input type="date" class="form-control" name="from"   id="fullname">
                              </div>
                              
                              <div class="col-sm-4">
                              <label class="exampleInputEmail1">To</label>
                              </div>
                              <div class="form-group col-sm-8">
                              <input type="date" class="form-control" name="to"   id="fullname">
                              </div> -->
                         
                              <div class="col-sm-4">
                              <label class="exampleInputEmail1">Table</label>
                              </div>
                              <div class="form-group col-sm-8">
                              <select class="form-control" name="tablename" required>
								<option value="tbl_sales_master">sales master</option>
								<option value="tbl_sales_trans">sales items</option>
								</select>
                              </div>
                              
                              </div>
                              
                          
                         
                         <div class="modal-footer">
                              <button type="submit" name="submit" class="btn btn-primary">Download</button>
                          
                          </div>
                      </div>
                      </form>
   
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


</body>

</html>