<?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>

<div class="content-wrapper barcode-page">
  <section class="content-header">
    <h1 align="center">BARCODE<small>Preview</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">BARCODE</a></li>
    </ol>
  </section><br>

  <style>
    /* Styling only: existing page content and controls remain unchanged. */
    .barcode-page { color:#26364a; padding-bottom:24px; }
    .barcode-page .content-header h1 { color:#173b68; font-size:26px; font-weight:700; letter-spacing:.3px; }
    .barcode-page .content-header h1 small { color:#73839a; font-size:14px; font-weight:400; }
    .barcode-page .content-header .breadcrumb { background:transparent; }
    .barcode-page .content-header .breadcrumb a { color:#47749f; }
    .barcode-page .box { border:1px solid #e1e9f2; border-top:4px solid #2878c8; border-radius:10px; background:#fff; box-shadow:0 8px 26px rgba(30,65,100,.09); overflow:visible; }
    .barcode-page .box-header { padding:0; }
    .barcode-page .modal-content { border:1px solid #e0e8f1; border-radius:10px; box-shadow:0 8px 24px rgba(25,55,90,.10); overflow:hidden; background:#fff; }
    .barcode-page .modal-header { padding:19px 22px; background:#f3f8fe; border-bottom:1px solid #e0e9f3; }
    .barcode-page .modal-title { color:#173b68; font-size:18px; font-weight:700; }
    .barcode-page .form-group { padding-top:12px; padding-bottom:4px; }
    .barcode-page label { display:block; margin-bottom:8px; color:#344b66; font-size:13px; font-weight:600; }
    .barcode-page .form-control { min-height:42px; padding:9px 12px; border:1px solid #ccd9e7; border-radius:6px; box-shadow:none; color:#27384c; transition:border-color .18s ease,box-shadow .18s ease; }
    .barcode-page .form-control:focus { border-color:#3985d6; box-shadow:0 0 0 3px rgba(57,133,214,.12); }
    .barcode-page .modal-footer { clear:both; padding:17px 20px; border-top:1px solid #e6edf5; background:#fbfdff; }
    .barcode-page .btn { border-radius:6px; font-weight:600; transition:background .18s ease,border-color .18s ease,box-shadow .18s ease; }
    .barcode-page .btn-primary { background:#246fba; border-color:#246fba; box-shadow:0 3px 8px rgba(36,111,186,.14); }
    .barcode-page .btn-primary:hover,.barcode-page .btn-primary:focus { background:#195b9d; border-color:#195b9d; }
    .barcode-page #name_list { position:relative; z-index:1000; }
    .barcode-page #name_list:empty { display:none; }
    .barcode-page #name_list:not(:empty) { margin-top:4px; border:1px solid #dbe5f0; border-radius:6px; background:#fff; box-shadow:0 8px 20px rgba(29,55,85,.12); overflow:hidden; }
    @media (max-width:767px) {
      .barcode-page .content-header h1 { font-size:22px; }
      .barcode-page .form-group { padding-left:12px; padding-right:12px; }
      .barcode-page .modal-footer .btn { margin-bottom:4px; }
    }
  </style>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('barcodeprinting');?>">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">BARCODE</h4>
                </div>
                <input type="hidden" class="form-control" name="cg_id" />
                <div class="form-group col-sm-6" id="barcodeprintselect">
                  <label for="exampleInputEmail1">Item Name</label>
                  <input class="form-control nameItem" name="itemname" placeholder="Item Name " id="itemname">
                  <input class="form-control " name="itemname" type="hidden" id="itemid">
                  <div id="name_list"></div>
                </div>
                <div class="form-group col-sm-6">
                  <label for="exampleInputEmail1">Batch ID</label>
                  <select name="batchcode" class="form-control" id="itembatchid"></select>
                </div>
                <div class="form-group col-sm-6">
                  <label for="exampleInputEmail1">Number of Stickers</label>
                  <input class="form-control" name="numberofsticker" placeholder="Number of srickers">
                </div>
                <div class="form-group col-sm-6">
                  <label for="exampleInputEmail1">Select Printer</label>
                  <select name="printname" class="form-control">
                    <option value="1">DATAMAX</option>
                    <option value="2">ZEBRA</option>
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
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
<script>
  $(function () {
    $('#example2').DataTable({ dom: 'Bfrtip', buttons: ['excelHtml5', 'csvHtml5'] });
  });

  $('.nameItem').on('keyup', function () {
    var itemName = $(this).val();
    if (itemName != '' && itemName != 0) {
      $.ajax({
        type: "POST",
        url: '<?php echo site_url('Admin/searchItemNameListbarcode');?>',
        data: { itemName: itemName },
        success: function (res) {
          console.log(res);
          if (res) { $('#name_list').show(); $('#name_list').html(res); }
          else { $('#name_list').html(""); }
        }
      });
    } else {
      $('#name_list').html("");
    }
  });

  $('#barcodeprintselect').on('click', '.subSelect_itemedit', function () {
    var itemValue = $(this).data('value');
    $('#name_list').hide();
    $.ajax({
      type: "POST",
      url: '<?php echo site_url('Admin/getBatchByItem');?>',
      data: { itemValue: itemValue },
      success: function (res) {
        var batchlist = JSON.parse(res);
        console.log(res);
        var optiondata= '<option value="">Select</option>';
        for (var i = 0; i < batchlist.length; i++) {
          optiondata += '<option value="' + batchlist[i].batch_id + '">' + batchlist[i].batchcode + '(' + batchlist[i].cur_stock_item_count + ')</option>';
        }
        $('#itembatchid').html(optiondata);
        if (batchlist.length) {
          $('#itemid').val(batchlist[0].itm_id);
          $('#itemname').val(batchlist[0].itm_name);
        } else {
          $('#itemid').val('');
        }
      }
    });
  });
</script>
</body>
</html>
