
  <?php $data['leftmenu']='unitcraetion'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



  <!-- Content Header (Page header) -->

  <section class="content-header">

    <h1 align="center">Bank<small>Preview</small></h1>

    

    <ol class="breadcrumb">

      <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

      <li><a href="<?php echo base_url().'unit';?>">Unit</a></li>

    </ol>

  </section><br>



  <!-- Main content -->

  <section class="content">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
      <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">
                      <!-- Modal content-->
                      <?php echo form_open_multipart('banklist');?>
                      <div class="modal-content">
                      
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Add Bank</h4>
                          </div>
                          
                          <div class="form-group col-sm-6">
                              <label for="exampleInputEmail1">Bank</label>
                              <input type="text" class="form-control" name="bank" Placeholder="Enter Bank" required />
                          </div>
                          

                              
                          <div class="modal-footer">
                              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                      </form>
                  </div>
      </div>
      
<div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Bank</h3>
            <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	


          
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
          <table id="example" class="listdata table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th class="text-nowrap">Slno</th>
      <th class="text-nowrap">bank</th>
      
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach($banklist as $key){?>
    <tr>
    <td><?php echo $i;?></td>
      <td><?php echo $key->bank_name;?></td>
</tr>
  <?php  $i++; } ?>
  </tbody>
 
</table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      </div>
      
   
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
<!-- <script>
        $(document).ready(function() {
            $('#example').DataTable({
                url: '<?php base_url(); ?>Bank/index',
                processing: true,
                serverSide: true,
                paging: true,
                searching: true,
                ordering: true,
                order: [[0, "asc"]],
                scrollX: true,
                scroller: true,
                columns: [{data: "parameter"}, {data: "method"}, {data: "parameter_type"}, {data: "action"}]
               
                /** this will create datatable with above column data **/
            });
        });
    </script> -->

</body>

</html>

