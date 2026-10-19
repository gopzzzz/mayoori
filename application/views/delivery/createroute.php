<?php $data['leftmenu']='unitcraetion'; echo $this->load->view('common/leftmenu',$data,true);?>

<div class="content-wrapper route-page">
  <section class="content-header">
    <h1>Create Route <small>Preview</small></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url().'unit';?>">Create Route</a></li>
    </ol>
  </section>

  <section class="content">
    <style>
      .route-page { color:#26364a; }
      .route-page .content-header h1 { color:#173b68; font-size:25px; font-weight:700; letter-spacing:.2px; }
      .route-page .content-header h1 small { color:#73839a; font-size:14px; font-weight:400; }
      .route-page .route-toolbar { display:flex; justify-content:flex-end; margin:0 0 16px; }
      .route-page .box { border-top:3px solid #2878c8; border-radius:8px; box-shadow:0 4px 18px rgba(30,65,100,.09); overflow:hidden; }
      .route-page .box-header { padding:16px 20px; background:#f5f9fe; border-bottom:1px solid #e3ebf5; }
      .route-page .box-title { color:#173b68; font-size:17px; font-weight:700; }
      .route-page .box-body { padding:18px; }
      .route-page .btn { border-radius:5px; font-weight:600; transition:background .15s ease; }
      .route-page .btn-info { background:#2878c8; border-color:#2878c8; }
      .route-page .btn-info:hover { background:#1d619f; border-color:#1d619f; }
      .route-page .btn-primary { background:#246fba; border-color:#246fba; }
      .route-page .btn-primary:hover { background:#195b9d; border-color:#195b9d; }
      .route-page .table-responsive { border:1px solid #e0e8f1; border-radius:7px; }
      .route-page table { width:100%; background:#fff; margin-bottom:0; }
      .route-page #example th { padding:12px 14px; background:#eaf3fc; color:#1e4774; border:1px solid #d4e1ef; font-size:12px; text-transform:uppercase; letter-spacing:.3px; }
      .route-page #example td { padding:12px 14px; vertical-align:middle; border:1px solid #e2e9f1; font-size:13px; }
      .route-page #example tbody tr:nth-child(even) { background:#f8fbff; }
      .route-page #example tbody tr:hover { background:#eef6ff; }
      .route-page .modal-content { border:0; border-radius:9px; overflow:hidden; box-shadow:0 12px 35px rgba(20,48,80,.2); }
      .route-page .modal-header { padding:18px 22px; background:#f2f7fd; border-bottom:1px solid #e1eaf5; }
      .route-page .modal-title { color:#173b68; font-size:18px; font-weight:700; }
      .route-page .modal-body { padding:22px; }
      .route-page .modal-footer { border-top:1px solid #e5edf6; padding:15px 22px; }
      .route-page .form-control { min-height:38px; border:1px solid #ccd8e6; border-radius:5px; box-shadow:none; color:#27384c; }
      .route-page .form-control:focus { border-color:#3985d6; box-shadow:0 0 0 2px rgba(57,133,214,.12); }
      .route-page .route-field { padding:0 22px 16px; }
      .route-page .route-field label { display:block; margin-bottom:7px; color:#344b66; font-weight:600; }
      @media(max-width:767px) { .route-page .content-header h1 { font-size:21px; } .route-page .box-body { padding:12px; } .route-page .route-field { padding:0 15px 15px; } }
    </style>

    <div class="route-toolbar">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Route</button>
    </div>

    <div class="modal fade" id="myModal" role="dialog" aria-labelledby="addRouteTitle">
      <div class="modal-dialog">
        <?php echo form_open_multipart('createroute');?>
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            <h4 class="modal-title" id="addRouteTitle">Add Route</h4>
          </div>
          <div class="modal-body">
            <div class="route-field">
              <label for="routeName">Route Name</label>
              <input type="text" id="routeName" class="form-control" name="route" placeholder="Enter Route Name" required />
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header"><h3 class="box-title">Route List</h3></div>
          <div class="box-body">
            <div class="table-responsive">
              <table id="example" class="listdata table table-bordered table-striped table-hover">
                <thead><tr><th class="text-nowrap">Slno</th><th class="text-nowrap">Route Name</th></tr></thead>
                <tbody>
                  <?php $i=1; foreach($routes as $key){?>
                  <tr><td><?php echo $i;?></td><td><?php echo $key->routename;?></td></tr>
                  <?php $i++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
function deletechecked(){
  if(confirm("Do you really want to delete this apartment?")){ return true; }
  else { return false; }
}
</script>
<script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>admin_styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>admin_styles/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url();?>admin_styles/dist/js/adminlte.min.js"></script>
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
