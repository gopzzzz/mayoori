<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link rel="stylesheet" href="<?php echo base_url()?>admin_styles/bower_components/bootstrap/dist/css/bootstrap.min.css"> 
      
      <style type="text/css" media="print">
      body{
        font-family: Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; font-style: normal;font-weight: 90; line-height: 20px; 
        /* font-family: Verdana, Geneva, sans-serif; font-size: 18px; font-style: normal;  */
        /* font-family:"Calibri, sans-serif"; font-size: 18px; font-style: normal; */
       
        
		
      }
      .table{
            font-family: Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; font-style: normal;font-weight: 90; line-height: 20px; 
            /* font-family: Verdana, Geneva, sans-serif; font-size: 18px; font-style: normal;  */
            /* font-family:"Calibri, sans-serif"; font-size: 18px; font-style: normal; */
         
        
          }
      @media print { 
          body{
           
			  
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
           font-size:20px;
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

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

      </style>
    </head>
    <body onload="window.print()">
       <div class="container">
      <a href="<?php echo base_url('sales');?>" class="no-print"> <button type="button" class="btn btn-sm btn-success">Back</button></a>
           <div class="row" style="padding-top: 20px;padding-bottom: 20px;border-bottom: 1px solid;">
                <div class="col-md-12 text-center"> MAYOORI</div>
                <div class="col-md-12 text-center">FURNITURE & ELECTRONICS HOME APPLIANCES</div>
                <div class="col-md-12 text-center"><?php echo  $address->address;?></div>
                <div class="col-md-12 text-center">Ph :<?php echo  $address->phonenum;?>,Email: <?php echo  $address->email;?></div>
                <div class="col-md-12 text-center">GST :<?php echo  $address->gst_num;?>   PAN :<?php echo  $address->pan_num;?></div>
           </div>
           <div class="row"  style="padding-bottom:20px;padding-top:20px">
               <div class="col-md-12 text-center"> QUOTATION INVOICE </div>
           </div>
           <div class="row">
               <div style="width:50%;float:left">
               <?php $id=$this->session->userdata('id');
               $branch=$this->Admin_model->get_branchlist($id);?>
                   <address> 
                    Bill Date  :<?php echo date("d-m-Y",strtotime($datamaster->quotationbill_master_billdate));?><br>
                    Time       :<?php echo date( "h:i:s", strtotime($datamaster->quotationbill_master_billdate));?> <br>                        
                    Bill No    :<?php echo "QT".$datamaster->quotationbill_master_quotation_no;?>   <br>                                     
                                                                     
                    Cust. Name : <?php echo $datamaster->quotationbill_master_name;?>  <br>                                               
                    Mob Number : <?php echo $datamaster->quotationbill_master_phoneno;?><br>
                    Address    :<?php echo $datamaster->quotationbill_master_address;?>
                    </address>
               </div>
             
           </div>
           <div class="row">
               <table  class="table table-bordered" style="width:100%;border-bottom: 2px dotted;padding-bottom:10px;margin-bottom:10px;border:2px dotted;">
                   <thead>
                       <tr>
                           <th width="5%">Sl</th>
                           <th width="10%">Hsn</th>
                          
                           <th width="20%">Item Name</th>
                           <th width="5%">Qty</th>
                           <th width="10%">Taxable Amt</th>
                           
                           <th width="10%">Gst Amt</th>
                           <!-- <th width="10%">Cess 1%</th> -->
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
                           <td><?php echo $sinletransaction->quotationbill_trans_hsn_code; ?></td>
                          
                           <td><?php echo strtolower($sinletransaction->itm_name); ?></td>
                           <td><?php echo $sinletransaction->quotationbill_trans_qty; ?></td>
                           <td><?php echo $sinletransaction->quotationbill_trans_taxablevale; ?></td>
                        
                           <td><?php echo $sinletransaction->quotationbill_trans_gstamount; ?></td>
                           <!-- <td><?php echo $sinletransaction->quotationbill_trans_cess; ?></td> -->
                           <td><?php echo $sinletransaction->quotationbill_trans_total; ?></td>
                       </tr>
                       
                       <?php 

                      
                      
                       $Totalqty+=$sinletransaction->quotationbill_trans_qty;
                      
                       
                       $i++;} ?>
                   </tbody>
               </table>
           </div>
           <div class="row" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">
               <div style="width:50%;float:right">
                 Total Taxable Amount        : <?php echo $datamaster->quotationbill_master_tot_taxable_amount;?> <br>
                 Total GST Amount            : <?php echo $datamaster->quotationbill_master_tot_gst_amount;?> <br>
                 <!-- Total Kerala flood Cess     : <?php echo $datamaster->sales_master_total_cess;?> <br> -->
                
               
                 Total Amount                : <?php echo $datamaster->quotationbill_master_grandtotal;?><br>
               </div>
           </div>
           <div class="row" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">
               <div style="width:50%;float:left">
               <?php $number = $datamaster->quotationbill_master_grandtotal;
                        $no = floor($number);
                        $point = round($number - $no, 2) * 100;
                        $hundred = null;
                        $digits_1 = strlen($no);
                        $i = 0;
                        $str = array();
                        $words = array('0' => '', '1' => 'one', '2' => 'two',
                            '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
                            '7' => 'seven', '8' => 'eight', '9' => 'nine',
                            '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
                            '13' => 'thirteen', '14' => 'fourteen',
                            '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
                            '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
                            '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
                            '60' => 'sixty', '70' => 'seventy',
                            '80' => 'eighty', '90' => 'ninety');
                        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
                        while ($i < $digits_1) {
                            $divider = ($i == 2) ? 10 : 100;
                            $number = floor($no % $divider);
                            $no = floor($no / $divider);
                            $i += ($divider == 10) ? 1 : 2;
                            if ($number) {
                                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                                $str [] = ($number < 21) ? $words[$number] .
                                    " " . $digits[$counter] . $plural . " " . $hundred
                                    :
                                    $words[floor($number / 10) * 10]
                                    . " " . $words[$number % 10] . " "
                                    . $digits[$counter] . $plural . " " . $hundred;
                            } else $str[] = null;
                        }
                        $str = array_reverse($str);
                        $result = implode('', $str);
                        $points = ($point) ?
                            "." . $words[$point / 10] . " " . 
                                $words[$point = $point % 10] : ''; ?>
                                (<?php echo $result . "Rupees  "; ?>)
                              
                   
               </div>
               <div style="width:50%;float:left">
                   Grand Total: <?php echo $datamaster->quotationbill_master_grandtotal;?>
               </div>
           </div>
           <div class="row" style="padding-top: 10px;padding-bottom: 10px;border-bottom: 2px dotted;">
           <?php $sgst=$datamaster->quotationbill_master_tot_gst_amount/2;
                 $cgst=$datamaster->quotationbill_master_tot_gst_amount/2;
               
            ?>
              
               SGST :<?php if($datamaster->quotationbill_master_isigst==1){echo "0";}else{ echo $sgst;}  ?> | CGST :<?php if($datamaster->quotationbill_master_isigst==1){echo "0";}else{echo $cgst;}  ?> | IGST : <?php if($datamaster->quotationbill_master_isigst==1){echo $datamaster->quotationbill_master_tot_gst_amount;}else{echo "0";}?>
           </div>
           <div class="row">
               
             <div class="col-md-12">
               Note:<?php echo $datamaster->quotationbill_master_note; ?>
             </div>
             <div class="col-md-12 text-center" style="padding-top:20px">
              This Quotation valid for 14 days from the date of quote taken.
              </div>
             <div class="col-md-12 text-center" style="padding-top:20px">
               Verify the quotation before leaving the shop 
              </div>
           <div class="col-md-12 text-center">
                
        

                 </div>
             <div class="col-md-12 text-center" style="padding-bottom: 10px;border-bottom: 2px dotted;">
            THANK YOU
            </div>
            <div class="col-md-12" style="padding-top: 10px">
            <?php if(!empty($employee)){?>
            Sales Man: <?php echo $employee->stf_name;?><br>
            STAFF ID :<?php echo $employee->stf_code;?> 
            <?php } ?>
            </div>
           </div>
       </div> 
        
        
        <!-- jQuery 3 -->

        <script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap 3.3.7 -->

        <script src="<?php echo base_url();?>admin_styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>
  
  