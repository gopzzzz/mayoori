<?php 
foreach($cust as $keycust){
								$outstanding = $this->Admin_model->get_customer_outstanding($keycust->login_id);
								?>
								<tr class="customersearchlist"  data-cusid="<?php echo $keycust->customer_id;?>" data-id="<?=$keycust->cus_name;?>" data-phone_num="<?=$keycust->cus_phonenumber;?>" data-address="<?=$keycust->cus_address;?>"  data-outstanding="<?=$outstanding?>">
									<td><?php echo $keycust->cus_name;?></td>
									<td><?php echo $keycust->cus_code;?></td>
									<td><?php echo $keycust->cus_address;?></td>
									<td><?php echo $keycust->cus_phonenumber;?></td>
									<td><?php echo $keycust->cus_email;?></td>
									
								</tr>
								<?php } ?>

