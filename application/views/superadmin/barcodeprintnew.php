<html>
<body>
<p>

^XA~TA000~JSN^LT0^MNW^MTT^PON^PMN^LH0,0^JMA^PR2,2~SD17^JUS^LRN^CI0^XZ
^XA
^MMT
^PW799
^LL0200
^LS0
<?php if($barcode->incentive_type==1){ 
      $in_peramount  = $barcode->in_peramount;
      $amt   = str_split(strip_tags($in_peramount)); 
      $amountcode    = '';

      for($j=0;$j<count($amt);$j++){
            if($amt[$j]=='1'){
               $amountcode.='S';
            }
            if($amt[$j]=='2'){
               $amountcode.='K';
            }
            if($amt[$j]=='3'){
               $amountcode.='L';
            }
            if($amt[$j]=='0'){
               $amountcode.='R';
            }
            if($amt[$j]=='4'){
               $amountcode.='F';
            }
            if($amt[$j]=='5'){
               $amountcode.='O';
            }
            if($amt[$j]=='6'){
               $amountcode.='T';
            }
            if($amt[$j]=='7'){
               $amountcode.='W';
            }
            if($amt[$j]=='8'){
               $amountcode.='E';
            }
            if($amt[$j]=='9'){
               $amountcode.='A';
            }
            if($amt[$j]=='.'){
               $amountcode.='.';
            }           
      }
      echo $amountcode;?>

^FT233,123^A0N,20,19^FH\^FD<?php echo $amountcode;?>^FS

<?php }else if($barcode->incentive_type==2){ 
     $in_peramount  = $barcode->in_peramount;
     $amt  = str_split(strip_tags($in_peramount)); 
     $amountcode    = '';

     for($j=0;$j<count($amt);$j++){
           if($amt[$j]=='1'){
              $amountcode.='S';
           }
           if($amt[$j]=='2'){
              $amountcode.='K';
           }
           if($amt[$j]=='3'){
              $amountcode.='L';
           }
           if($amt[$j]=='0'){
              $amountcode.='R';
           }
           if($amt[$j]=='4'){
              $amountcode.='F';
           }
           if($amt[$j]=='5'){
              $amountcode.='O';
           }
           if($amt[$j]=='6'){
              $amountcode.='T';
           }
           if($amt[$j]=='7'){
              $amountcode.='W';
           }
           if($amt[$j]=='8'){
              $amountcode.='E';
           }
           if($amt[$j]=='9'){
              $amountcode.='A';
           }
           if($amt[$j]=='.'){
              $amountcode.='.';
           }           
     }
     echo $amountcode;?>
   
   ^FT233,123^A0N,20,19^FH\^FD<?php echo '*'.$amountcode;?>^FS
<?php }else if($barcode->incentive_type==3){ 
   $range1  = $barcode->range1;
   $rang1  = str_split(strip_tags($range1)); 
   $range1code    = '';

   for($j=0;$j<count($rang1);$j++){
         if($rang1[$j]=='1'){
            $range1code.='S';
         }
         if($rang1[$j]=='2'){
            $range1code.='K';
         }
         if($rang1[$j]=='3'){
            $range1code.='L';
         }
         if($rang1[$j]=='0'){
            $range1code.='R';
         }
         if($rang1[$j]=='4'){
            $range1code.='F';
         }
         if($rang1[$j]=='5'){
            $range1code.='O';
         }
         if($rang1[$j]=='6'){
            $range1code.='T';
         }
         if($rang1[$j]=='7'){
            $range1code.='W';
         }
         if($rang1[$j]=='8'){
            $range1code.='E';
         }
         if($rang1[$j]=='9'){
            $range1code.='A';
         }
         if($rang1[$j]=='.'){
            $range1code.='.';
         }           
   }
   
     $r1amount  = $barcode->r1_amount;
     $amount1  = str_split(strip_tags($r1amount)); 
     $amt1code    = '';

     for($j=0;$j<count($amount1);$j++){
           if($amount1[$j]=='1'){
              $amt1code.='S';
           }
           if($amount1[$j]=='2'){
              $amt1code.='K';
           }
           if($amount1[$j]=='3'){
              $amt1code.='L';
           }
           if($amount1[$j]=='0'){
              $amt1code.='R';
           }
           if($amount1[$j]=='4'){
              $amt1code.='F';
           }
           if($amount1[$j]=='5'){
              $amt1code.='O';
           }
           if($amount1[$j]=='6'){
              $amt1code.='T';
           }
           if($amount1[$j]=='7'){
              $amt1code.='W';
           }
           if($amount1[$j]=='8'){
              $amt1code.='E';
           }
           if($amount1[$j]=='9'){
              $amt1code.='A';
           }
           if($amount1[$j]=='.'){
              $amt1code.='.';
           }           
     }

     $range2  = $barcode->range2;
     $rang2  = str_split(strip_tags($range2)); 
     $range2code    = '';
  
     for($j=0;$j<count($rang2);$j++){
           if($rang2[$j]=='1'){
              $range2code.='S';
           }
           if($rang2[$j]=='2'){
              $range2code.='K';
           }
           if($rang2[$j]=='3'){
              $range2code.='L';
           }
           if($rang2[$j]=='0'){
              $range2code.='R';
           }
           if($rang2[$j]=='4'){
              $range2code.='F';
           }
           if($rang2[$j]=='5'){
              $range2code.='O';
           }
           if($rang2[$j]=='6'){
              $range2code.='T';
           }
           if($rang2[$j]=='7'){
              $range2code.='W';
           }
           if($rang2[$j]=='8'){
              $range2code.='E';
           }
           if($rang2[$j]=='9'){
              $range2code.='A';
           }
           if($rang2[$j]=='.'){
              $range2code.='.';
           }           
     }
     
       $r2amount  = $barcode->r2_amount;
       $amount2  = str_split(strip_tags($r2amount)); 
       $amt2code    = '';
  
       for($j=0;$j<count($amount2);$j++){
             if($amount2[$j]=='1'){
                $amt2code.='S';
             }
             if($amount2[$j]=='2'){
                $amt2code.='K';
             }
             if($amount2[$j]=='3'){
                $amt2code.='L';
             }
             if($amount2[$j]=='0'){
                $amt2code.='R';
             }
             if($amount2[$j]=='4'){
                $amt2code.='F';
             }
             if($amount2[$j]=='5'){
                $amt2code.='O';
             }
             if($amount2[$j]=='6'){
                $amt2code.='T';
             }
             if($amount2[$j]=='7'){
                $amt2code.='W';
             }
             if($amount2[$j]=='8'){
                $amt2code.='E';
             }
             if($amount2[$j]=='9'){
                $amt2code.='A';
             }
             if($amount2[$j]=='.'){
                $amt2code.='.';
             }           
       }
       $range3  = $barcode->range3;
       $rang3  = str_split(strip_tags($range3)); 
       $range3code    = '';
    
       for($j=0;$j<count($rang3);$j++){
             if($rang3[$j]=='1'){
                $range3code.='S';
             }
             if($rang3[$j]=='2'){
                $range3code.='K';
             }
             if($rang3[$j]=='3'){
                $range3code.='L';
             }
             if($rang3[$j]=='0'){
                $range3code.='R';
             }
             if($rang3[$j]=='4'){
                $range3code.='F';
             }
             if($rang3[$j]=='5'){
                $range3code.='O';
             }
             if($rang3[$j]=='6'){
                $range3code.='T';
             }
             if($rang3[$j]=='7'){
                $range3code.='W';
             }
             if($rang3[$j]=='8'){
                $range3code.='E';
             }
             if($rang3[$j]=='9'){
                $range3code.='A';
             }
             if($rang3[$j]=='.'){
                $range3code.='.';
             }           
       }
       
         $r3amount  = $barcode->r3_amount;
         $amount3  = str_split(strip_tags($r3amount)); 
         $amt3code    = '';
    
         for($j=0;$j<count($amount3);$j++){
               if($amount3[$j]=='1'){
                  $amt3code.='S';
               }
               if($amount3[$j]=='2'){
                  $amt3code.='K';
               }
               if($amount3[$j]=='3'){
                  $amt3code.='L';
               }
               if($amount3[$j]=='0'){
                  $amt3code.='R';
               }
               if($amount3[$j]=='4'){
                  $amt3code.='F';
               }
               if($amount3[$j]=='5'){
                  $amt3code.='O';
               }
               if($amount3[$j]=='6'){
                  $amt3code.='T';
               }
               if($amount3[$j]=='7'){
                  $amt3code.='W';
               }
               if($amount3[$j]=='8'){
                  $amt3code.='E';
               }
               if($amount3[$j]=='9'){
                  $amt3code.='A';
               }
               if($amount3[$j]=='.'){
                  $amt3code.='.';
               }           
         }
         $range4  = $barcode->range4;
         $rang4  = str_split(strip_tags($range4)); 
         $range4code    = '';
      
         for($j=0;$j<count($rang4);$j++){
               if($rang4[$j]=='1'){
                  $range4code.='S';
               }
               if($rang4[$j]=='2'){
                  $range4code.='K';
               }
               if($rang4[$j]=='3'){
                  $range4code.='L';
               }
               if($rang4[$j]=='0'){
                  $range4code.='R';
               }
               if($rang4[$j]=='4'){
                  $range4code.='F';
               }
               if($rang4[$j]=='5'){
                  $range4code.='O';
               }
               if($rang4[$j]=='6'){
                  $range4code.='T';
               }
               if($rang4[$j]=='7'){
                  $range4code.='W';
               }
               if($rang4[$j]=='8'){
                  $range4code.='E';
               }
               if($rang4[$j]=='9'){
                  $range4code.='A';
               }
               if($rang4[$j]=='.'){
                  $range4code.='.';
               }           
         }
         
           $r4amount  = $barcode->r4_amount;
           $amount4  = str_split(strip_tags($r4amount)); 
           $amt4code    = '';
      
           for($j=0;$j<count($amount4);$j++){
                 if($amount4[$j]=='1'){
                    $amt4code.='S';
                 }
                 if($amount4[$j]=='2'){
                    $amt4code.='K';
                 }
                 if($amount4[$j]=='3'){
                    $amt4code.='L';
                 }
                 if($amount4[$j]=='0'){
                    $amt4code.='R';
                 }
                 if($amount4[$j]=='4'){
                    $amt4code.='F';
                 }
                 if($amount4[$j]=='5'){
                    $amt4code.='O';
                 }
                 if($amount4[$j]=='6'){
                    $amt4code.='T';
                 }
                 if($amount4[$j]=='7'){
                    $amt4code.='W';
                 }
                 if($amount4[$j]=='8'){
                    $amt4code.='E';
                 }
                 if($amount4[$j]=='9'){
                    $amt4code.='A';
                 }
                 if($amount4[$j]=='.'){
                    $amt4code.='.';
                 }           
           }
   ?>
 
^FT233,123^A0N,20,19^FH\^FD<?php echo $range1code;?>  <?php if($barcode->r1_type==1){ echo $amt1code;}else{echo '*'.$amt1code;}?>^FS
^FT233,191^A0N,20,19^FH\^FD<?php echo $range4code;?>  <?php if($barcode->r4_type==1){ echo $amt4code;}else{echo '*'.$amt4code;}?>^FS
^FT233,168^A0N,20,19^FH\^FD<?php echo $range3code;?>  <?php if($barcode->r3_type==1){ echo $amt3code;}else{echo '*'.$amt3code;}?>^FS

^FT233,146^A0N,20,19^FH\^FD<?php echo $range2code;?>  <?php if($barcode->r2_type==1){ echo $amt2code;}else{echo '*'.$amt2code;}?>^FS


<?php } ?>



^FT371,90^A0R,23,24^FH\^FD<?php if($barcode->t_purcost=="N.NN" || $barcode->t_purcost=='' || $barcode->t_purcost=="0.00"){
        
        // echo $itemsdetails->e_pc;
         $pcost    = strip_tags($barcode->e_pc);
         $pcostarr = str_split(strip_tags($barcode->e_pc)); 
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
         }else{echo $barcode->t_purcost;}?>^FS


^FT233,91^A0N,23,24^FH\^FD<?php if($barcode->t_mopcode=="R.RR" || $barcode->t_purcost=='' || $barcode->t_purcost=="0.00"){ 
      $tmop       = $barcode->e_mop;
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
 }else{echo $barcode->t_mopcode;}?>^FS

^FT67,140^A0N,23,24^FH\^FD<?php echo $barcode->batchcode;?>^FS
^FT13,65^A0N,23,24^FH\^FD<?php echo $barcode->itm_code;?>^FS
^FT233,67^A0N,23,24^FH\^FDMRP:<?php if($barcode->t_mrp==0.00){echo $barcode->e_mrp;}else{echo $barcode->t_mrp;}?>^FS
^FT13,169^A0N,20,19^FH\^FD<?php echo substr($barcode->itm_name,0,21);?>^FS
^FT131,33^A0N,28,28^FH\^FDMAYOORI^FS
^FO16,71^BY2^BCN,44,N,N^FD<?php echo $barcode->batchcode;?>^FS


<?php if($barcode->incentive_type==1){ 
      $in_peramount  = $barcode->in_peramount;
      $amt   = str_split(strip_tags($in_peramount)); 
      $amountcode    = '';

      for($j=0;$j<count($amt);$j++){
            if($amt[$j]=='1'){
               $amountcode.='S';
            }
            if($amt[$j]=='2'){
               $amountcode.='K';
            }
            if($amt[$j]=='3'){
               $amountcode.='L';
            }
            if($amt[$j]=='0'){
               $amountcode.='R';
            }
            if($amt[$j]=='4'){
               $amountcode.='F';
            }
            if($amt[$j]=='5'){
               $amountcode.='O';
            }
            if($amt[$j]=='6'){
               $amountcode.='T';
            }
            if($amt[$j]=='7'){
               $amountcode.='W';
            }
            if($amt[$j]=='8'){
               $amountcode.='E';
            }
            if($amt[$j]=='9'){
               $amountcode.='A';
            }
            if($amt[$j]=='.'){
               $amountcode.='.';
            }           
      }
      echo $amountcode;?>



^FT633,123^A0N,20,19^FH\^FD<?php echo $amountcode;?>^FS

<?php }else if($barcode->incentive_type==2){ 
     $in_peramount  = $barcode->in_peramount;
     $amt  = str_split(strip_tags($in_peramount)); 
     $amountcode    = '';

     for($j=0;$j<count($amt);$j++){
           if($amt[$j]=='1'){
              $amountcode.='S';
           }
           if($amt[$j]=='2'){
              $amountcode.='K';
           }
           if($amt[$j]=='3'){
              $amountcode.='L';
           }
           if($amt[$j]=='0'){
              $amountcode.='R';
           }
           if($amt[$j]=='4'){
              $amountcode.='F';
           }
           if($amt[$j]=='5'){
              $amountcode.='O';
           }
           if($amt[$j]=='6'){
              $amountcode.='T';
           }
           if($amt[$j]=='7'){
              $amountcode.='W';
           }
           if($amt[$j]=='8'){
              $amountcode.='E';
           }
           if($amt[$j]=='9'){
              $amountcode.='A';
           }
           if($amt[$j]=='.'){
              $amountcode.='.';
           }           
     }
     echo $amountcode;?>

   ^FT633,123^A0N,20,19^FH\^FD<?php echo '*'.$amountcode;?>^FS
<?php }else if($barcode->incentive_type==3){ 
    $range1  = $barcode->range1;
    $rang1  = str_split(strip_tags($range1)); 
    $range1code    = '';
 
    for($j=0;$j<count($rang1);$j++){
          if($rang1[$j]=='1'){
             $range1code.='S';
          }
          if($rang1[$j]=='2'){
             $range1code.='K';
          }
          if($rang1[$j]=='3'){
             $range1code.='L';
          }
          if($rang1[$j]=='0'){
             $range1code.='R';
          }
          if($rang1[$j]=='4'){
             $range1code.='F';
          }
          if($rang1[$j]=='5'){
             $range1code.='O';
          }
          if($rang1[$j]=='6'){
             $range1code.='T';
          }
          if($rang1[$j]=='7'){
             $range1code.='W';
          }
          if($rang1[$j]=='8'){
             $range1code.='E';
          }
          if($rang1[$j]=='9'){
             $range1code.='A';
          }
          if($rang1[$j]=='.'){
             $range1code.='.';
          }           
    }
    
      $r1amount  = $barcode->r1_amount;
      $amount1  = str_split(strip_tags($r1amount)); 
      $amt1code    = '';
 
      for($j=0;$j<count($amount1);$j++){
            if($amount1[$j]=='1'){
               $amt1code.='S';
            }
            if($amount1[$j]=='2'){
               $amt1code.='K';
            }
            if($amount1[$j]=='3'){
               $amt1code.='L';
            }
            if($amount1[$j]=='0'){
               $amt1code.='R';
            }
            if($amount1[$j]=='4'){
               $amt1code.='F';
            }
            if($amount1[$j]=='5'){
               $amt1code.='O';
            }
            if($amount1[$j]=='6'){
               $amt1code.='T';
            }
            if($amount1[$j]=='7'){
               $amt1code.='W';
            }
            if($amount1[$j]=='8'){
               $amt1code.='E';
            }
            if($amount1[$j]=='9'){
               $amt1code.='A';
            }
            if($amount1[$j]=='.'){
               $amt1code.='.';
            }           
      }
 
      $range2  = $barcode->range2;
      $rang2  = str_split(strip_tags($range2)); 
      $range2code    = '';
   
      for($j=0;$j<count($rang2);$j++){
            if($rang2[$j]=='1'){
               $range2code.='S';
            }
            if($rang2[$j]=='2'){
               $range2code.='K';
            }
            if($rang2[$j]=='3'){
               $range2code.='L';
            }
            if($rang2[$j]=='0'){
               $range2code.='R';
            }
            if($rang2[$j]=='4'){
               $range2code.='F';
            }
            if($rang2[$j]=='5'){
               $range2code.='O';
            }
            if($rang2[$j]=='6'){
               $range2code.='T';
            }
            if($rang2[$j]=='7'){
               $range2code.='W';
            }
            if($rang2[$j]=='8'){
               $range2code.='E';
            }
            if($rang2[$j]=='9'){
               $range2code.='A';
            }
            if($rang2[$j]=='.'){
               $range2code.='.';
            }           
      }
      
        $r2amount  = $barcode->r2_amount;
        $amount2  = str_split(strip_tags($r2amount)); 
        $amt2code    = '';
   
        for($j=0;$j<count($amount2);$j++){
              if($amount2[$j]=='1'){
                 $amt2code.='S';
              }
              if($amount2[$j]=='2'){
                 $amt2code.='K';
              }
              if($amount2[$j]=='3'){
                 $amt2code.='L';
              }
              if($amount2[$j]=='0'){
                 $amt2code.='R';
              }
              if($amount2[$j]=='4'){
                 $amt2code.='F';
              }
              if($amount2[$j]=='5'){
                 $amt2code.='O';
              }
              if($amount2[$j]=='6'){
                 $amt2code.='T';
              }
              if($amount2[$j]=='7'){
                 $amt2code.='W';
              }
              if($amount2[$j]=='8'){
                 $amt2code.='E';
              }
              if($amount2[$j]=='9'){
                 $amt2code.='A';
              }
              if($amount2[$j]=='.'){
                 $amt2code.='.';
              }           
        }
        $range3  = $barcode->range3;
        $rang3  = str_split(strip_tags($range3)); 
        $range3code    = '';
     
        for($j=0;$j<count($rang3);$j++){
              if($rang3[$j]=='1'){
                 $range3code.='S';
              }
              if($rang3[$j]=='2'){
                 $range3code.='K';
              }
              if($rang3[$j]=='3'){
                 $range3code.='L';
              }
              if($rang3[$j]=='0'){
                 $range3code.='R';
              }
              if($rang3[$j]=='4'){
                 $range3code.='F';
              }
              if($rang3[$j]=='5'){
                 $range3code.='O';
              }
              if($rang3[$j]=='6'){
                 $range3code.='T';
              }
              if($rang3[$j]=='7'){
                 $range3code.='W';
              }
              if($rang3[$j]=='8'){
                 $range3code.='E';
              }
              if($rang3[$j]=='9'){
                 $range3code.='A';
              }
              if($rang3[$j]=='.'){
                 $range3code.='.';
              }           
        }
        
          $r3amount  = $barcode->r3_amount;
          $amount3  = str_split(strip_tags($r3amount)); 
          $amt3code    = '';
     
          for($j=0;$j<count($amount3);$j++){
                if($amount3[$j]=='1'){
                   $amt3code.='S';
                }
                if($amount3[$j]=='2'){
                   $amt3code.='K';
                }
                if($amount3[$j]=='3'){
                   $amt3code.='L';
                }
                if($amount3[$j]=='0'){
                   $amt3code.='R';
                }
                if($amount3[$j]=='4'){
                   $amt3code.='F';
                }
                if($amount3[$j]=='5'){
                   $amt3code.='O';
                }
                if($amount3[$j]=='6'){
                   $amt3code.='T';
                }
                if($amount3[$j]=='7'){
                   $amt3code.='W';
                }
                if($amount3[$j]=='8'){
                   $amt3code.='E';
                }
                if($amount3[$j]=='9'){
                   $amt3code.='A';
                }
                if($amount3[$j]=='.'){
                   $amt3code.='.';
                }           
          }
          $range4  = $barcode->range4;
          $rang4  = str_split(strip_tags($range4)); 
          $range4code    = '';
       
          for($j=0;$j<count($rang4);$j++){
                if($rang4[$j]=='1'){
                   $range4code.='S';
                }
                if($rang4[$j]=='2'){
                   $range4code.='K';
                }
                if($rang4[$j]=='3'){
                   $range4code.='L';
                }
                if($rang4[$j]=='0'){
                   $range4code.='R';
                }
                if($rang4[$j]=='4'){
                   $range4code.='F';
                }
                if($rang4[$j]=='5'){
                   $range4code.='O';
                }
                if($rang4[$j]=='6'){
                   $range4code.='T';
                }
                if($rang4[$j]=='7'){
                   $range4code.='W';
                }
                if($rang4[$j]=='8'){
                   $range4code.='E';
                }
                if($rang4[$j]=='9'){
                   $range4code.='A';
                }
                if($rang4[$j]=='.'){
                   $range4code.='.';
                }           
          }
          
            $r4amount  = $barcode->r4_amount;
            $amount4  = str_split(strip_tags($r4amount)); 
            $amt4code    = '';
       
            for($j=0;$j<count($amount4);$j++){
                  if($amount4[$j]=='1'){
                     $amt4code.='S';
                  }
                  if($amount4[$j]=='2'){
                     $amt4code.='K';
                  }
                  if($amount4[$j]=='3'){
                     $amt4code.='L';
                  }
                  if($amount4[$j]=='0'){
                     $amt4code.='R';
                  }
                  if($amount4[$j]=='4'){
                     $amt4code.='F';
                  }
                  if($amount4[$j]=='5'){
                     $amt4code.='O';
                  }
                  if($amount4[$j]=='6'){
                     $amt4code.='T';
                  }
                  if($amount4[$j]=='7'){
                     $amt4code.='W';
                  }
                  if($amount4[$j]=='8'){
                     $amt4code.='E';
                  }
                  if($amount4[$j]=='9'){
                     $amt4code.='A';
                  }
                  if($amount4[$j]=='.'){
                     $amt4code.='.';
                  }           
            }
   ?>
 
^FT633,123^A0N,20,19^FH\^FD<?php echo $range1code;?>  <?php if($barcode->r1_type==1){ echo $amt1code;}else{echo '*'.$amt1code;}?>^FS
^FT633,146^A0N,20,19^FH\^FD<?php echo $range2code;?>  <?php if($barcode->r1_type==1){ echo $amt2code;}else{echo '*'.$amt2code;}?>^FS
^FT633,168^A0N,20,19^FH\^FD<?php echo $range3code;?>  <?php if($barcode->r1_type==1){ echo $amt3code;}else{echo '*'.$amt3code;}?>^FS
^FT633,191^A0N,20,19^FH\^FD<?php echo $range4code;?>  <?php if($barcode->r1_type==1){ echo $amt4code;}else{echo '*'.$amt4code;}?>^FS

<?php } ?>

^FT771,90^A0R,23,24^FH\^FD<?php if($barcode->t_purcost=="N.NN" || $barcode->t_purcost=='' || $barcode->t_purcost=="0.00"){
        
        // echo $itemsdetails->e_pc;
         $pcost    = strip_tags($barcode->e_pc);
         $pcostarr = str_split(strip_tags($barcode->e_pc)); 
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
         }else{echo $barcode->t_purcost;}?>^FS





^FT633,91^A0N,23,24^FH\^FD<?php if($barcode->t_mopcode=="R.RR" || $barcode->t_purcost=='' || $barcode->t_purcost=="0.00"){ 
    $tmop       = $barcode->e_mop;
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
 }else{echo $barcode->t_mopcode;}?>^FS

^FT467,140^A0N,23,24^FH\^FD<?php echo $barcode->batchcode;?>^FS
^FT413,65^A0N,23,24^FH\^FD<?php echo $barcode->itm_code;?>^FS
^FT633,67^A0N,23,24^FH\^FDMRP:<?php if($barcode->t_mrp==0.00){echo $barcode->e_mrp;}else{echo $barcode->t_mrp;}?>^FS
^FT413,169^A0N,20,19^FH\^FD<?php echo substr($barcode->itm_name,0,21);?>^FS
^FT531,33^A0N,28,28^FH\^FDMAYOORI^FS
^FO417,71^BCN,44,N,N^FD<?php echo $barcode->batchcode;?>^FS
^PQ<?php echo $number;?>
^XZ

    </p>
</tbody>

<script type="text/VBScript" language="VBScript">
        Sub Print()
               OLECMDID_PRINT = 6
               OLECMDEXECOPT_DONTPROMPTUSER = 2
               OLECMDEXECOPT_PROMPTUSER = 1
               call WB.ExecWB(OLECMDID_PRINT, OLECMDEXECOPT_DONTPROMPTUSER,1)
        End Sub
        document.write "<object ID='WB' WIDTH=0 HEIGHT=0 CLASSID='CLSID:8856F961-340A-11D0-A96B-00C04FD705A2'></object>"
</script>

<script type="text/javascript">
   setTimeout(function() { 
        window.print();
        self.close();
   }, 1000);
</script>
<script>
   $('#sidebar').on('click','.action-button',function(){ 
     
      window.location.replace("http://127.0.0.1/mayoori_krp_test/barcodeprint");
   });
   </script>
</html>
