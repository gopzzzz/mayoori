<html>

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

      <link rel="stylesheet" href="<?php echo base_url()?>admin_styles/bower_components/bootstrap/dist/css/bootstrap.min.css">  

    </head>

	<style>

	div.form-group {

  position: absolute;

  right: 100px;

  width: 100px;

  height: 100px;

  

} 

  </style>

	<div class="form-group"> 

                <a href="<?php echo base_url('physicalstock');?>"><button type="button" class="btn btn-success btn-sm">Back to Physical Stock</button></a>

            </div> 

		<br><br>

    <body onload="window.print()">

       <div class="container">

           <div class="row" style="padding-top: 20px;padding-bottom: 20px;border-bottom: 1px solid;">

           <div class="col-md-12 text-center"> MAYOORI FURNITURE</div>
                <div class="col-md-12 text-center">GEETHANJALI JN,MAYOORI BUILDING</div>
                <div class="col-md-12 text-center">NEAR HP PETROL PUMP PONNURUNNI,VYTTILA,ERNAKULAM</div>
                <div class="col-md-12 text-center">Ph :0471-2755200, 0471-2755100,7510800700</div>
                <div class="col-md-12 text-center">GST :32AAXFM3674M17J   PAN :AAXFM3674M</div>

           </div>

           <div class="row"  style="padding-bottom:20px;padding-top:20px">

               <div class="col-md-12 text-center"> SALE INVOICE </div>

           </div>

           <div class="row">

               <div style="width:50%;float:left">

                  

               </div>

               <div style="width:50%;float:left">

                   <address> 

                    Referal Number   : <?php echo $physicalstockmaster->referalnumber;?><br>

                     Date: <?php echo $physicalstockmaster->psa_date;?>

                    </address>

               </div>

           </div>

           <div class="row">

               <table style="width:100%;border-bottom: 2px dotted;padding-bottom:10px;margin-bottom:10px">

                   <thead>

                       <tr>

                           <th width="5%">Sl</th>

                           <th width="10%">Item Name</th>

                           <th width="10%">Item Code</th>

                          <th width="5%">Qty</th>

                           <th width="10%">Unit</th>

                           

                       </tr>

                   </thead>

                   <tbody>

                       <?php $i=1; foreach($physicalstocktrans as $physicalstocktrans){?>

                       <tr>

                           <td><?php echo $i; ?></td>

                           <td><?php echo $physicalstocktrans->itm_name; ?></td>

                           <td><?php echo $physicalstocktrans->itm_code; ?></td>

                           <td><?php echo $physicalstocktrans->psat_qty; ?></td>

                           <td><?php echo $physicalstocktrans->itm_unit; ?></td>

                          

                           

                       </tr>

                       <?php $i++;} ?>

                   </tbody>

               </table>

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

        




        <script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/jquery.min.js"></script>



        <script src="<?php echo base_url();?>admin_styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    </body>

</html>

  

  