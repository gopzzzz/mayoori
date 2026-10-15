<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link rel="stylesheet" href="<?php echo base_url()?>admin_styles/bower_components/bootstrap/dist/css/bootstrap.min.css">  
      <style type="text/css" media="print">
      @media print { 
          body{
              margin-left:-2px;
          }
.btn-success{
    display:none;
}
.no-print{
    display:none;
  }
@page {
           margin-top: -100px;;
           margin-bottom: 0;
           margin-left:-100px;
           font-size:15px;
         }
         @page :footer {
        display: none
    }

    @page :header { 
        display: none
    } 
    @page
   {
    size: 5.5in 8.5in;
  }
  a[href]:after {
        content: none !important;
    }
}


      </style>
    </head>
    <body onload="window.print()">
       <div class="container">
      <a href="<?php echo base_url('purchase_return');?>" class="no-print"> <button type="button" class="btn btn-sm btn-success">Back</button></a>
           <div class="row" style="padding-top: 20px;padding-bottom: 20px;border-bottom: 1px solid;">
                <div class="col-md-12 text-center"> MAYOORI</div>
                <div class="col-md-12 text-center">FURNITURE & ELECTRONICS HOME APPLIANCES</div>
                <div class="col-md-12 text-center"><?php echo  $address->address;?></div>
                <div class="col-md-12 text-center">Ph :<?php echo  $address->phonenum;?>,Email: <?php echo  $address->email;?></div>
                <div class="col-md-12 text-center">GST :<?php echo  $address->gst_num;?>   PAN :<?php echo  $address->pan_num;?></div>
           </div>
           <div class="row"  style="padding-bottom:20px;padding-top:20px">
               <div class="col-md-12 text-center"> DEBIT NOTE </div>
           </div>
           <div class="row">
               <div style="width:50%;float:left">
               <?php $id=$this->session->userdata('id');
               $branch=$this->Admin_model->get_branchlist($id);?>
                   <address> 
                    Bill Date  :<?php echo date("d-m-Y",strtotime($datamaster->purreturn_master_date));?><br>
                    Time       :<?php echo date( "h:i:s", strtotime($datamaster->purchase_return_time));?> <br>                        
                    Bill No    :<?php echo $branch->pr;echo $datamaster->purreturn_master_debitno;?>   <br>                                     
                           <?php $supid=$datamaster->purreturn_master_supplier;
                           $datasupplier=$this->Admin_model->get_supplierdetailsnew($supid);
                            ?>                                          
                    Supplier Name : <?php echo $datasupplier->sup_name;?><br>    
                    GST Number    :<?php echo $datasupplier->sup_gst;?> <br>                                 
                    Mob Number : <?php echo $datasupplier->purreturn_master_phoneno;?><br>
                    Address    :<?php echo $datasupplier->sup_address;?>,
                    
                    </address>
               </div>
               <div style="width:50%;float:left">
               Eway Number : <?php echo $datamaster->purreturn_master_ewbno;?><br> 
               Vehicle Number : <?php echo $datamaster->purreturn_master_vehicleno;?><br>

               </div>
           </div>
           <div class="row">
               <table  class="table table-bordered" style="width:100%;border-bottom: 2px dotted;padding-bottom:10px;margin-bottom:10px;border:2px dotted;">
                   <thead>
                       <tr>
                           <th width="5%">Sl</th>
                           <th width="10%">HSN Code</th>
                            <th width="10%">MRP</th> 
                           <!-- <th width="10%">Purchase Cost</th> -->
                           <th width="20%">Item Name</th>
                           <th width="5%">Qty</th>
                           <th width="10%">Taxable Amt</th>
                           <th width="10%">Gst%</th>
                           <!-- <th width="10%">Gst Amt</th>
                           <th width="10%">Cess 1%</th> -->
                           <th width="10%">T.Amt</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php $i=1;
                       $Totalmrp=0;
                       $Totalqty=0;
                       $Totalsellingrate=0;
                       foreach($datatrans as $sinletransaction){?>
                                            
                       <tr>
                           <td><?php echo $i; ?></td>
                           <td><?php echo $sinletransaction->hsn_code;?></td>
                            <td><?php echo $sinletransaction->purchasereturn_trans_mrp; ?></td> 
                           <!-- <td><?php if($sinletransaction->t_mrp==0.00 ){ echo $sinletransaction->e_mrp;}else{echo $sinletransaction->t_mrp;} ?></td>
                          -->
                           <td><?php echo $sinletransaction->itm_name; ?></td>
                           <td><?php echo $sinletransaction->purreturn_trans_qty; ?></td>
                           <td><?php echo $sinletransaction->purreturn_trans_taxable_value; ?></td>
                           <td><?php echo $sinletransaction->purreturn_trans_gst_percentage; ?></td>
                           <td><?php echo $sinletransaction->purreturn_trans_total; ?></td>
                           <!-- <td><?php echo $sinletransaction->sales_trans_cess; ?></td>
                           <td><?php echo $sinletransaction->sales_trans_total; ?></td> -->
                       </tr>
                       
                       <?php 
                       if($sinletransaction->t_mrp==0.00){ $Totalmrp+=$sinletransaction->e_mrp*$sinletransaction->purreturn_trans_qty;}else {$Totalmrp+=$sinletransaction->t_mrp*$sinletransaction->purreturn_trans_qty;}
                       $Totalqty+=$sinletransaction->purreturn_trans_qty;
                       $Totalsellingrate+=$sinletransaction->purreturn_trans_rate;
                       
                       $i++;} ?>
                   </tbody>
               </table>
           </div>
           <div class="row" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">
               <div style="width:50%;float:right">
                 Total Taxable Amount        : <?php echo $datamaster->purreturn_master_taxable_value;?> <br>
                 Total GST Amount            : <?php echo $datamaster->purchase_return_gstamount;?> <br> 
                 <!-- Total Kerala flood Cess     : <?php echo $datamaster->sales_master_total_cess;?> <br>
                 Delivery/Other Charge       : <?php echo $datamaster->sales_master_delivery_charge;?>  <br> -->
                 <!-- Total Discount              : <?php echo $datamaster->sales_master_discount;?> <br> -->
                 <!-- Round Off                     :<?php echo $datamaster->purreturn_master_roundoff;?> -->
                 Total Amount                : <?php echo $datamaster->purreturn_master_grandtotal;?><br>
               </div>
           </div>
         
           <div class="row" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">
           <?php $cgst=$datamaster->purchase_return_gstamount/2;
                 $sgst=$datamaster->purchase_return_gstamount/2;
           
           ?>
             
              
               SGST :<?php if($datamaster->purreturn_master_is_igst==1){echo "0";}else{ echo $sgst;}  ?> | CGST :<?php if($datamaster->purreturn_master_is_igst==1){echo "0";}else{echo $cgst;}  ?> | IGST : <?php if($datamaster->purreturn_master_is_igst==1){echo $datamaster->purchase_return_gstamount;}else{echo "0";}?>
           </div>
           <div class="row" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">
              Note:<?php echo $datamaster->purreturn_master_notes; ?>
              </div>
           <div class="col-md-12 text-center" style="padding-top:20px">
               Verify the bill before leaving the shop 
              </div>
           <div class="col-md-12 text-center">
                 CASH CANNOT BE REFUNDED       
                 </div>
             <div class="col-md-12 text-center" style="padding-bottom: 10px;border-bottom: 2px dotted;">
            THANK YOU
            </div>
            
       
           </div>
       </div> 
        
        
        <!-- jQuery 3 -->

        <script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap 3.3.7 -->

        <script src="<?php echo base_url();?>admin_styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>
  
  