<?php $data['leftmenu']='unitcraetion'; echo $this->load->view('common/leftmenu',$data,true);?>

<div class="content-wrapper route-map-page">
  <section class="content-header">
    <h1>Create Route Locations (MAP) <small>Preview</small></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url().'unit';?>">Create Route Locations (MAP)</a></li>
    </ol>
  </section>

  <section class="content">
    <style>
      .route-map-page { color:#26364a; }
      .route-map-page .content-header h1 { color:#173b68; font-size:25px; font-weight:700; letter-spacing:.2px; }
      .route-map-page .content-header h1 small { color:#73839a; font-size:14px; }
      .route-map-page .route-add-btn { margin:0 0 18px; border-radius:5px; background:#246fba; border-color:#246fba; font-weight:600; box-shadow:0 3px 8px rgba(36,111,186,.18); }
      .route-map-page .route-add-btn:hover { background:#195b9d; border-color:#195b9d; }
      .route-map-page .box { border-top:3px solid #2878c8; border-radius:8px; box-shadow:0 4px 18px rgba(30,65,100,.09); overflow:hidden; }
      .route-map-page .box-body { padding:18px; }
      .route-map-page .table-responsive { border:1px solid #e0e8f1; border-radius:7px; }
      .route-map-page table { width:100%; background:#fff; margin-bottom:0; }
      .route-map-page #example thead th { padding:12px 14px; background:#eaf3fc; color:#1e4774; border-color:#d4e1ef; font-size:12px; text-transform:uppercase; letter-spacing:.3px; white-space:nowrap; }
      .route-map-page #example tbody td { padding:11px 14px; vertical-align:middle; border-color:#e2e9f1; font-size:13px; }
      .route-map-page #example tbody tr:nth-child(even) { background:#f8fbff; }
      .route-map-page #example tbody tr:hover { background:#eef6ff; }
      .route-map-page .btn { border-radius:5px; font-weight:600; }
      .route-map-page .btn-info { background:#2878c8; border-color:#2878c8; }
      .route-map-page .btn-info:hover { background:#1e609f; border-color:#1e609f; }
      .route-map-page .modal-content { border:0; border-radius:9px; overflow:hidden; box-shadow:0 12px 35px rgba(20,45,75,.22); }
      .route-map-page .modal-header { padding:17px 20px; background:#f2f7fd; border-bottom:1px solid #e0e9f4; }
      .route-map-page .modal-title { color:#173b68; font-size:18px; font-weight:700; }
      .route-map-page .modal-body { padding:20px; }
      .route-map-page .modal-content .form-group { padding:0 20px; margin:20px 0 12px; }
      .route-map-page .modal-content label { display:block; margin-bottom:7px; color:#344b66; font-weight:600; }
      .route-map-page .form-control { min-height:38px; border:1px solid #ccd8e6; border-radius:5px; box-shadow:none; color:#27384c; }
      .route-map-page .form-control:focus { border-color:#3985d6; box-shadow:0 0 0 2px rgba(57,133,214,.12); }
      .route-map-page .modal-footer { margin-top:18px; padding:14px 20px; background:#f8fbff; border-top:1px solid #e4ebf4; }
      .route-map-page .modal-footer .btn-primary { background:#246fba; border-color:#246fba; }
      .route-map-page .modal-footer .btn-default { border-color:#d3deea; color:#43566d; }
      @media (max-width:767px) {
        .route-map-page .content-header h1 { font-size:21px; }
        .route-map-page .box-body { padding:10px; }
        .route-map-page .modal-dialog { margin:10px; }
        .route-map-page .modal-content .form-group { float:none; width:auto; }
      }
    </style>

    <button type="button" class="btn btn-info btn-lg route-add-btn" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> ADD</button>
    <div class="modal fade" id="myModal" role="dialog" aria-labelledby="addMapTitle">
      <div class="modal-dialog">
        <?php echo form_open_multipart('map');?>
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            <h4 class="modal-title" id="addMapTitle">Create Route Location</h4>
          </div>
          <div class="form-group col-sm-6">
            <label for="add_route">Route</label>
            <select name="route" id="add_route" class="form-control">
              <?php foreach($routes as $key){?>
                <option value="<?php echo $key->id;?>"><?php echo $key->routename;?></option>
              <?php }?>
            </select>
          </div>
          <div class="form-group col-sm-6">
            <label for="add_location">Location</label>
            <input type="text" id="add_location" class="form-control" name="location" placeholder="Enter Location Name" required />
          </div>
          <div class="clearfix"></div>
          <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header"><h3 class="box-title" style="color:#173b68;font-weight:700;">Route Location List</h3></div>
          <div class="box-body table-responsive">
            <table id="example" class="listdata table table-bordered table-striped table-hover">
              <thead><tr><th class="text-nowrap">Sl No</th><th class="text-nowrap">Route Name</th><th class="text-nowrap">Location Name</th><th class="text-nowrap">Action</th></tr></thead>
              <tbody>
                <?php $i=1; foreach($maps as $key1){?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $key1->routename;?></td>
                  <td><?php echo $key1->location;?></td>
                  <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2<?php echo $key1->id;?>"><i class="fa fa-pencil"></i> Edit</button></td>
                </tr>
                <div class="modal fade" id="myModal2<?php echo $key1->id;?>" role="dialog" aria-labelledby="editMapTitle<?php echo $key1->id;?>">
                  <div class="modal-dialog">
                    <?php $id=$key1->id; $edit_unit=$this->Newadminmodel->locationedit($id); ?>
                    <?php echo form_open_multipart('map');?>
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                        <h4 class="modal-title" id="editMapTitle<?php echo $key1->id;?>">Edit Route Location</h4>
                      </div>
                      <input type="hidden" class="form-control" name="locid" value="<?php echo $edit_unit->id;?>" />
                      <div class="form-group col-sm-6">
                        <label for="edit_route_<?php echo $key1->id;?>">Route</label>
                        <select name="route" id="edit_route_<?php echo $key1->id;?>" class="form-control">
                          <?php foreach($routes as $key4){?>
                            <option value="<?php echo $key4->id;?>" <?php if($key4->id==$edit_unit->route_id){echo 'selected';}?>><?php echo $key4->routename;?></option>
                          <?php }?>
                        </select>
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="edit_location_<?php echo $key1->id;?>">Location</label>
                        <input type="text" id="edit_location_<?php echo $key1->id;?>" class="form-control" name="location" value="<?php echo $edit_unit->location;?>" required />
                      </div>
                      <div class="clearfix"></div>
                      <div class="modal-footer">
                        <button type="submit" name="submit_edit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
                <?php $i++; }?>
              </tbody>
            </table>
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
<!-- <script>
$(document).ready(function() {
  $('#example').DataTable({
    url: '<?php base_url(); ?>Bank/index', processing:true, serverSide:true, paging:true,
    searching:true, ordering:true, order:[[0, "asc"]], scrollX:true, scroller:true,
    columns:[{data:"parameter"},{data:"method"},{data:"parameter_type"},{data:"action"}]
  });
});
</script> -->
</body>
</html>
