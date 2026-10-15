<?php 
$i=0;
foreach($bill_details as $val): ?>
<tr>
    <td><?php echo $i+1; ?></td>
   
    <td><?php echo $val->purchase_master_billno	;  ?></td>
    <td><?php echo $val->paybal_amount	;?></td>
    <td><?php if($val->status==7) {echo 'Not paid';}else{ echo 'Paid';}?></td>
    
</tr>
<?php $i++; endforeach;  ?>