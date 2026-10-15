
   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">REGISTRATION OF GODOWN<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'regofgoddown';?>">REGISTRATION OF GODOWN</a></li>

      </ol>

    </section><br>

  <style>
 
  table, td, th {
  border: 1px solid #cac6c6;
}

#example2 {
  border-collapse: separate;
}
.box-body{
    margin: 22px;
}
.divtext{
    margin-top: 21px;
}
#crud_table{
    margin-top:43px;
}
  </style>

    <!-- Main content -->

    <section class="content">
      
		<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">REGISTRATION OF GODOWN</h3>
			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	


              <div class="box-tools">
                <!--<div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>-->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding row">
            <?php echo form_open_multipart('regofgoddown');?>
            <div class="col-sm-12">
           <div class="col-sm-3 labeltext divtext"><label >Name</label>
            </div>
            
            <div class="col-sm-3 divtext">
            <input class="form-control" name="name" placeholder="Name ">
            </div>
            <div class="col-sm-3 labeltext divtext">
            <label>Phone Number</label>
            </div>
            <div class="col-sm-3 divtext">
            <input class="form-control" name="phnum" placeholder="Phone Number">
            </div>
            </div>
            <div class="col-sm-12">
            <div class="col-sm-3 labeltext divtext">
            <label>Address</label>
            </div>
            
           
            <div class="col-sm-3 divtext">
           <textarea class="form-control" name="address" placeholder="Address"></textarea>
            </div>
            <div class="col-sm-3 labeltext divtext">
            <label>GST Number</label>
            </div>
            <div class="col-sm-3 divtext">
            <input class="form-control" name="gst" placeholder="GST Number">
            </div>
            <div class="col-sm-3 labeltext divtext">
            <label>PAN Number</label>
            </div>
            <div class="col-sm-3 divtext">
            <input class="form-control" name="pan" placeholder="PAN Number">
            </div>
            <div class="col-sm-3 labeltext divtext">
            <label>Email</label>
            </div>
            <div class="col-sm-3 divtext">
            <input class="form-control" name="email" placeholder="Email">
            </div>
            <div class="col-sm-3 labeltext divtext">
            <label>Registration No(username for login)</label>
            </div>
            <div class="col-sm-3 divtext">
            <input class="form-control" name="registration"  placeholder="Registration Number">
			<!--value="<?php if($last_id==null){echo "1";}else{ foreach($last_id as $key3){ echo $key3->registration_num + 1;}}?>" readonly-->
            </div>
            <div class="col-sm-3 labeltext divtext">
            <label>Godown No</label>
            </div>
            <div class="col-sm-3 divtext">
            <input class="form-control" name="godownno" placeholder="Godown No">
            </div>
            <div class="col-sm-3 labeltext divtext">
            <label>Password</label>
            </div>
            <div class="col-sm-3 divtext">
            <input class="form-control" name="password" >
            </div>
            </div>
            <div class="col-sm-12">
            <div class="col-sm-3 divtext">
            <button type="submit" name="submit" class="btn btn-success btn-lg">Save</button>
            <a href="<?php echo base_url('godownlist');?>"><button type="button"  class="btn btn-primary btn-lg">View</button></a>
            </div>
            </div>
            </form>
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


</script>

</body>

</html>

