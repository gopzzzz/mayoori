<head>
    <style>
        body {
        margin: 0;
        padding: 0;
    }        }
    * {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 100%;
    height: 1.875in; /* plus .125 inches from padding */
    padding: 0;
    margin: 0;
    background: white;
    }

.box {
        display:block;
        box-sizing: border-box;
        width:50%;
        height: 1in; /* plus .125 inches from padding */
        float:left;
        text-align: left;
        vertical-align: top;
        margin:0;
        /*border: 1px solid #e5e5e5;*/
        Padding:2mm;
    }
	
	
.relativeStyle{
	display: flex;
    flex-direction: column;
    position: relative;
    text-align: center;
	height: 1.875in; /* plus .125 inches from padding */
	align-items: center;
   justify-content: space-between;
   margin-left: -100px
}

.purchasecost{
	transform-origin: left;
    transform: translate(50%, 50%) rotate(90deg) ;
    position: absolute;
    left: 96px;
    top: 0%;
    font-size: 23px;
}

.purchaseCode{
	transform-origin: left;
    transform: translate(50%, 50%) rotate(90deg) ; 
    position: absolute;    
    right: 98px;
    top: 0%;
    font-size: 23px;  
}


.footer{
	display: flex;
    flex-direction: row;
    justify-content: center;
	margin: 0;
    padding: 0;
    list-style: none;
    font-size:23px;
}

.footer li{
	margin:0;
	padding:0 5px;
}

.container{
	width:100%;
}

.heading{
    font-size:22px;
    margin:10px 0
}

.item_name{
    font-size:22px;
    margin:0px 0
}

.Imagebox img{
    width:100%;
    max-width:100px;
}

@page {
    /* size: A4; */
    margin: 4mm 0 4mm 0 ;
    size: 4in 1in!important;  /* width height */
}


@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
}       
</style>
</head>
<body>
<div class="page">
        <div class="box"><div class="padd20 relativeStyle">
    
    <div class="purchasecost"><?php if($itemsdetails->t_purcost=="N.NN" || $itemsdetails->t_purcost=='' || $itemsdetails->t_purcost=="0.00"){
        
       // echo $itemsdetails->e_pc;
        $pcost    = strip_tags($itemsdetails->e_pc);
        $pcostarr = str_split(strip_tags($itemsdetails->e_pc)); 
        $pcode    = '';
       
        for($i=0;$i<count($pcostarr);$i++){
           if($pcostarr[$i]=='1'){
              $pcode.='J';
           }
           if($pcostarr[$i]=='2'){
              $pcode.='U';
           }
           if($pcostarr[$i]=='3'){
              $pcode.='Z';
           }
           if($pcostarr[$i]=='0'){
              $pcode.='N';
           }
           if($pcostarr[$i]=='4'){
              $pcode.='Y';
           }
           if($pcostarr[$i]=='5'){
              $pcode.='G';
           }
           if($pcostarr[$i]=='6'){
              $pcode.='V';
           }
           if($pcostarr[$i]=='7'){
              $pcode.='C';
           }
           if($pcostarr[$i]=='8'){
              $pcode.='I';
           }
           if($pcostarr[$i]=='9'){
              $pcode.='P';
           }
           if($pcostarr[$i]=='.'){
              $pcode.='.';
           }
           
        }
        echo $pcode;
        }else{echo $itemsdetails->t_purcost;}?></div>   
    
    <div class="body-content">
   		<h6 class="heading">MAYOORI</h6>
        <div class="Imagebox">
            <img src="<?php echo base_url('uploads/barcodes/'.$barcode_image);?>">
        </div>
    </div>
	
    <h6 class="item_name">
    <?php echo substr($itemsdetails->itm_name,0,15);?>
	</h6>
	
    <ul class="footer">
	<li class="itemlist">
    MRP:  
    </li>
      <li class="itemlist"> <b><?php if($itemsdetails->t_mrp==0.00){echo $itemsdetails->e_mrp;}else{echo $itemsdetails->t_mrp;}?></b></li>
    <li class="itemlist"><?php if($itemsdetails->t_mopcode=="R.RR" || $itemsdetails->t_purcost=='' || $itemsdetails->t_purcost=="0.00"){ 
    $tmop       = $itemsdetails->e_mop;
      $tmoparr    = str_split(strip_tags($tmop)); 
      $mopcode    = '';

      for($j=0;$j<count($tmoparr);$j++){
            if($tmoparr[$j]=='1'){
               $mopcode.='S';
            }
            if($tmoparr[$j]=='2'){
               $mopcode.='K';
            }
            if($tmoparr[$j]=='3'){
               $mopcode.='L';
            }
            if($tmoparr[$j]=='0'){
               $mopcode.='R';
            }
            if($tmoparr[$j]=='4'){
               $mopcode.='F';
            }
            if($tmoparr[$j]=='5'){
               $mopcode.='O';
            }
            if($tmoparr[$j]=='6'){
               $mopcode.='T';
            }
            if($tmoparr[$j]=='7'){
               $mopcode.='W';
            }
            if($tmoparr[$j]=='8'){
               $mopcode.='E';
            }
            if($tmoparr[$j]=='9'){
               $mopcode.='A';
            }
            if($tmoparr[$j]=='.'){
               $mopcode.='.';
            }           
      }
      echo $mopcode;
 }else{echo $itemsdetails->t_mopcode;}?></li>
    </ul>
    
    <div class="purchaseCode">
   <b><?php echo $itemsdetails->itm_code;?></b>
    </div>
	
    </div></div>



    


    <div class="box"><div class="padd20 relativeStyle">
    
    <div class="purchasecost"><?php if($itemsdetails->t_purcost=="N.NN" || $itemsdetails->t_purcost=='' || $itemsdetails->t_purcost=="0.00"){
        
        // echo $itemsdetails->e_pc;
         $pcost    = strip_tags($itemsdetails->e_pc);
         $pcostarr = str_split(strip_tags($itemsdetails->e_pc)); 
         $pcode    = '';
        
         for($i=0;$i<count($pcostarr);$i++){
            if($pcostarr[$i]=='1'){
               $pcode.='J';
            }
            if($pcostarr[$i]=='2'){
               $pcode.='U';
            }
            if($pcostarr[$i]=='3'){
               $pcode.='Z';
            }
            if($pcostarr[$i]=='0'){
               $pcode.='N';
            }
            if($pcostarr[$i]=='4'){
               $pcode.='Y';
            }
            if($pcostarr[$i]=='5'){
               $pcode.='G';
            }
            if($pcostarr[$i]=='6'){
               $pcode.='V';
            }
            if($pcostarr[$i]=='7'){
               $pcode.='C';
            }
            if($pcostarr[$i]=='8'){
               $pcode.='I';
            }
            if($pcostarr[$i]=='9'){
               $pcode.='P';
            }
            if($pcostarr[$i]=='.'){
               $pcode.='.';
            }
            
         }
         echo $pcode;
         }else{echo $itemsdetails->t_purcost;}?></div>   
    
    <div class="body-content">
   		<h6 class="heading">MAYOORI</h6>
        <div class="Imagebox">
            <img src="<?php echo base_url('uploads/barcodes/'.$barcode_image);?>">
        </div>
    </div>
	
    <h6 class="item_name">
    <?php echo substr($itemsdetails->itm_name,0,15);?>
	</h6>
	
    <ul class="footer">
	<li class="itemlist">
    MRP:  
    </li>
      <li class="itemlist"> <b><?php if($itemsdetails->t_mrp==0.00){echo $itemsdetails->e_mrp;}else{echo $itemsdetails->t_mrp;}?></b></li>
    <li class="itemlist"><?php if($itemsdetails->t_mopcode=="R.RR" || $itemsdetails->t_purcost=='' || $itemsdetails->t_purcost=="0.00"){ 
    $tmop       = $itemsdetails->e_mop;
      $tmoparr    = str_split(strip_tags($tmop)); 
      $mopcode    = '';

      for($j=0;$j<count($tmoparr);$j++){
            if($tmoparr[$j]=='1'){
               $mopcode.='S';
            }
            if($tmoparr[$j]=='2'){
               $mopcode.='K';
            }
            if($tmoparr[$j]=='3'){
               $mopcode.='L';
            }
            if($tmoparr[$j]=='0'){
               $mopcode.='R';
            }
            if($tmoparr[$j]=='4'){
               $mopcode.='F';
            }
            if($tmoparr[$j]=='5'){
               $mopcode.='O';
            }
            if($tmoparr[$j]=='6'){
               $mopcode.='T';
            }
            if($tmoparr[$j]=='7'){
               $mopcode.='W';
            }
            if($tmoparr[$j]=='8'){
               $mopcode.='E';
            }
            if($tmoparr[$j]=='9'){
               $mopcode.='A';
            }
            if($tmoparr[$j]=='.'){
               $mopcode.='.';
            }           
      }
      echo $mopcode;
 }else{echo $itemsdetails->t_mopcode;}?></li>
    </ul>
    
    <div class="purchaseCode">
   <b><?php echo $itemsdetails->itm_code;?></b>
    </div>
	
    </div></div>
    
             
</div> 
</body>
</html>