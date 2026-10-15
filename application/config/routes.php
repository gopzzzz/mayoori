<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
/////main menus//////
$route['customer']='Admin/customer_creation';
$route['customer/(:num)/(:any)']='Admin/customer_creation/$1/$2';
$route['del_cust/(:num)']='Admin/delete_customer_creation/$1';
$route['supplier']='Admin/supplier_creation';
$route['supplier/(:num)/(:any)']='Admin/supplier_creation/$1/$2';
$route['del_supplier/(:num)']='Admin/delete_supplier_creation/$1';
$route['staff']='Admin/staff_creation';
$route['staff/(:num)/(:any)']='Admin/staff_creation/$1/$2';
$route['del_staff/(:num)']='Admin/delete_staff_creation/$1';
$route['ledger']='Admin/ledger_creation';
$route['fullstockrepoprt']='Admin/fullstockrepoprt';


$route['itemwisestock']='Admin/itemwisestock';
$route['itemwisepurchase']='Admin/itemwisepurchase';
$route['aginingstock']='Admin/aginingstock';

$route['hsncodesearch']='Admin/hsncodesearch';
$route['pendingsaleorder']='Admin/pendingsaleorder';
$route['saleconvert']='Admin/saleconvert';
$route['ledger/(:num)/(:any)']='Admin/ledger_creation/$1/$2';
$route['del_ledger/(:num)']='Admin/delete_ledger_creation/$1';
$route['bank_account']='Admin/bank_account_creation';
$route['bank_account/(:num)/(:any)']='Admin/bank_account_creation/$1/$2';
$route['del_baccount/(:num)']='Admin/delete_bank_account/$1';
$route['branch']='Admin/branch_register';
$route['branch/(:num)/(:any)']='Admin/branch_register/$1/$2';
$route['del_branch/(:num)']='Admin/delete_branch_register/$1';
$route['item']='Admin/item_creation';
$route['batch_creation']='Admin/batch_creation';
$route['viewbatch']='Admin/viewbatch';
$route['print_barcode/(:any)']='Admin/print_barcode/$1';
$route['editbatch']='Admin/editbatch';
$route['item/(:num)/(:any)']='Admin/item_creation/$1/$2';
$route['del_item/(:num)']='Admin/delete_item_creation/$1';
$route['faccgp']='Admin/faccount_creation';
$route['faccgp/(:num)/(:any)']='Admin/faccount_creation/$1/$2';
$route['del_faccgp/(:num)']='Admin/delete_faccount/$1';
$route['opbal']='Admin/opbalance_creation';

$route['opbal/(:num)/(:any)']='Admin/opbalance_creation/$1/$2';
$route['del_opbal/(:num)']='Admin/delete_opbalance_creation/$1';

//settings//
$route['fyear']='Admin/financial_year';
$route['fyear/(:num)/(:any)']='Admin/financial_year/$1/$2';
$route['del_fyear/(:num)']='Admin/delete_financial_year/$1';
$route['catg']='Admin/category_item';
$route['catg/(:num)/(:any)']='Admin/category_item/$1/$2';
$route['del_catg/(:num)']='Admin/delete_category/$1';
$route['hsn']='Admin/hsn_item';
$route['hsn/(:num)/(:any)']='Admin/hsn_item/$1/$2';
$route['del_hsn/(:num)']='Admin/delete_hsn/$1';
$route['accgp']='Admin/accgp_creation';
$route['accgp/(:num)/(:any)']='Admin/accgp_creation/$1/$2';
$route['del_accgp/(:num)']='Admin/delete_account_group/$1';
$route['unit']='Admin/unit';
$route['client']='Admin/Client_information';
$route['igroup']='Admin/itemgroup_creation';
$route['itcate']='Admin/itemcategory_creation';
$route['itcate/(:num)/(:any)']='Admin/itemcategory_creation/$1/$2';
$route['del_itcate/(:num)']='Admin/delete_itemcategory_creation/$1';
$route['customer_accounts']='Admin/customer_accounts';
$route['customer_b2baccounts']='Admin/customer_b2baccounts';
$route['supplier_accounts']='Admin/supplier_accounts';
$route['openinstockdel/(:any)']='Admin/openinstockdel/$1';
$route['inventory_reports/(:any)']='Admin/inventory_reports/$1';
$route['inventory_reports/(:any)']='Admin/inventory_reports/$1';
$route['inventory_reports_firm']='Admin/inventory_reports_firm';
$route['batchstockdetails/(:any)/(:any)']='Admin/inventoryfirmitemlist/$1/$2';
$route['batchstockdetailsgodown/(:any)/(:any)']='Admin/inventoryfirmitemlist/$1/$2';
$route['stock_reports']='Admin/current_stocks';
$route['stockcompair']='Admin/stockcompair';
$route['stockhistory']='Admin/stockhistory';
$route['batchstocklist/(:any)']='Admin/batchstocklist/$1';
$route['salesorder']='Admin/salesorder';
$route['saleorderaddnew']='Admin/saleorderaddnew';

$route['sales']='Admin/saleswindow';

$route['b2b']='Admin/b2bcalc';
$route['b2baddon']='Admin/b2baddon';
$route['banklist']='Admin/banklist';
$route['sales_rtn']='Admin/salesreturn';
$route['viewsalesreturn']='Admin/viewsalesreturn';
$route['purchase']='Admin/purchasecalc';

$route['stotr']='Admin/stocktransfer';
$route['quabill']='Admin/quatationbill';
$route['respay']='Admin/receiptandpay';
$route['cashpayment']='Admin/cashpayment';
$route['cashpaymentadd']='Admin/cashpaymentadd';
$route['edit_cashpayment']='Admin/edit_cashpayment';
$route['purchase_return']='AdminController/purchase_return';
$route['purchasereturn_edit/(:num)']='AdminController/purchasereturn_edit/$1';
$route['del_sales/(:num)']='Admin/delete_saleswindow/$1';
$route['journals']='Admin/journals';
$route['journals_edit']='Admin/journals_edit';
$route['journal_list']='Admin/journal_list';
$route['gst_purchase_datewise']='Admin/gst_purchase_datewise';
$route['purchasereturndate']='Admin/purchasereturndate';
$route['cashbook']='Admin/cashbook'; 
$route['daybook']='Admin/daybook';
$route['ledgerreport']='Admin/ledgerreport';
$route['bankbook']='Admin/bankbook';
$route['printquataionbill/(:num)']='Admin/printquataionbill/$1';
$route['exportdb']='Admin/exportdb';
$route['purchaseaddon']='Admin/purchaseaddon';

$route['updateclosingbalance']='Admin/updateclosingbalance';
$route['b2bsalessummery']='Admin/b2bsalessummery';
$route['b2bsaleedit/(:num)']='AdminController/b2bsaleedit/$1';
$route['b2bsaleview/(:num)']='AdminController/b2bsaleview/$1';
$route['deliverychellan_view/(:num)']='AdminController/deliverychellan_view/$1';
$route['b2ctaxper']='Admin/b2ctaxper';
$route['b2csalessummery']='Admin/b2csalessummery';
$route['b2cexportsale']='crud/b2cexportsale';
$route['b2bexportsale']='crud/b2bexportsale';
$route['export_stock']='crud/export_stock';
$route['stockdownload']='Admin/stockdownload';
$route['itemstockexport']='crud/itemstockexport';
$route['b2btaxsalereport']='Admin/b2btaxsalereport';
$route['b2cgstsales']='Admin/b2cgstsales';
$route['salesreturngst']='Admin/salesreturngst';
$route['b2cbillwise']='Admin/b2cbillwise';
$route['b2cdatewise']='Admin/b2cdatewise';
$route['b2cdelchesalesummery']='Admin/b2cdelchesalesummery';
$route['b2cdelchesaledate']='Admin/b2cdelchesaledate';
$route['b2cdelchesalebill']='Admin/b2cdelchesalebill';
$route['b2cdelchelgstsales']='Admin/b2cdelchelgstsales';
$route['b2bsalesdate']='Admin/b2bsalesdate';
$route['b2bsalesbill']='Admin/b2bsalesbill';
$route['viesales_reports_list']='Admin/viesales_reports_list';
$route['saleb2cedit/(:any)']='AdminController/saleb2cedit/$1';
$route['viewsaleb2c/(:any)']='AdminController/viewsaleb2c/$1';
$route['b2bgstsale']='Admin/b2bgstsale';
$route['bank_payments']='Admin/bank_payments';
$route['bank_paymentsadd']='Admin/bank_paymentsadd';
$route['bank_paymentslist']='Admin/bank_paymentslist';
$route['cashrecipt']='Admin/cashrecipt';
$route['cashreciptadd']='Admin/cashreciptadd';
$route['getbalanceamount']='Admin/getbalanceamount';
$route['cashrecipt_edit']='Admin/cashrecipt_edit';
$route['cashreceipt_print/(:any)']='Admin/cashreceipt_print/$1';
$route['delete_purchase/(:any)']='Admin/delete_purchase/$1';
$route['purchaseeditnew/(:any)']='AdminController/purchaseeditnew/$1';
$route['bank_paymentslist/(:num)/(:any)']='Admin/bank_paymentslist/$1/$2';
$route['del_bank_paymentslist/(:num)']='Admin/delete_bank_paymentslist/$1';
//$route['bank_paymentslist/(:num)/(:any)']='Admin/bank_paymentslist/$1/$2';
$route['bank_receipts']='Admin/bank_receipts';
$route['bank_receiptslist']='Admin/bank_receiptslist';
$route['paymentreport']='Admin/paymentreport';
$route['receiptreport']='Admin/receiptreport';
$route['bank_receiptslist/(:num)/(:any)']='Admin/bank_receiptslist/$1/$2';
$route['del_bank_receiptslist/(:num)']='Admin/delete_bank_receiptslist/$1';
$route['inventory_transfer']='Admin/inventory_transfer';
$route['inventory_transferinsert']='Admin/inventory_transferinsert';
$route['inventory_transferedit']='Admin/inventory_transferedit';
$route['inventory_delete/(:num)']='Admin/inventory_delete/$1';
$route['print_inventory/(:num)']='Admin/print_inventory/$1'; 
$route['purchaseretuenprint/(:num)']='AdminController/purchaseretuenprint/$1'; 
$route['salesprint/(:num)']='Admin/salesprint/$1';
$route['salesreturnprint/(:num)']='Admin/salesreturnprint/$1';
$route['salesinvoice_view/(:num)']='Admin/salesinvoice_view/$1';
$route['salesorderprint/(:num)']='Admin/salesorderprint/$1';

$route['inventorylist']='Admin/inventorylist';
$route['physicalstock']='Admin/physicalstock';
$route['physicalstockinsert']='Admin/physicalstockinsert';
$route['physicalstockadlist']='Admin/physicalstockadlist';
$route['physicalstockprint/(:num)']='Admin/physicalstockprint/$1';
$route['physicalstockad_edit']='Admin/physicalstockad_edit';
$route['physicalstockad_delete/(:num)']='Admin/physicalstockad_delete/$1';
$route['barcodeprint']='Admin/barcodeprint';
$route['regoffirm']='Admin/regoffirm';
$route['firmlist']='Admin/firmlist';
$route['firmlist/(:num)/(:any)']='Admin/firmlist/$1/$2';
$route['del_firmlist/(:num)']='Admin/delete_firmlist/$1';
$route['godownlist']='Admin/godownlist';
$route['godownlist/(:num)/(:any)']='Admin/godownlist/$1/$2';
$route['del_godownlist/(:num)']='Admin/delete_godownlist/$1';
$route['regofgoddown']='Admin/regofgoddown';
$route['banreconcilation']='Admin/banreconcilation';
$route['branchstock']='Admin/branchstock';
$route['incentive']='Admin/addincentive';
$route['updateincentive']='Admin/updateincentive';
$route['b2cprofitlossreport']='Admin/b2cprofitlossreport';
$route['b2cprofitlossreportsearch']='Admin/b2cprofitlossreportsearch';
$route['b2bprofitlossreport']='Admin/b2bprofitlossreport';
$route['supplierwisesalesummery']='Admin/supplierwisesalesummery';
$route['datewisepurchasereport']='Admin/datewisepurchasereport';
$route['categorywisesalesreport']='Admin/categorywisesalesreport';
$route['categorywisesalesreportb2b']='Admin/categorywisesalesreportb2b';
$route['salesmanwisedetailedreport']='Admin/salesmanwisedetailedreport';



$route['del_bank/(:num)']='Admin/delete_bank/$1';
$route['b2bprint/(:num)']='Admin/b2bprint/$1';
$route['statecode']='Admin/statecode';
$route['del_state/(:num)']='Admin/delete_state/$1';
$route['finance']='Admin/finance_creation';
$route['del_finance/(:num)']='Admin/delete_finance/$1';

$route['oustandingpayable']='Admin/oustandingpayable';
$route['oustandingrecievable']='Admin/oustandingrecievable';
$route['trailbalance']='Admin/trailbalance';

//delivery chellan
$route['delivery_chellan']='Admin/delivery_chellan';


$route['delivery_chellanprint/(:num)']='Admin/delivery_chellanprint/$1';
$route['editsaleorder/(:any)']='AdminController/editsaleorder/$1';
$route['deliverychellan_edit/(:any)']='AdminController/deliverychellan_edit/$1';
$route['supplierwisedetailedreport']='AdminController/supplierwisedetailedreport';

$route['readexcel/(:num)']='Admin/readexcel/$1';
$route['all_item']='Admin/all_item';
$route['delete_item/(:num)']='Admin/delete_item/$1';

$route['downloadsale']='Admin/downloadsale';
$route['dcsv']='crud/dcsv';
$route['importsale/(:num)']='Admin/importsale/$1';
$route['clearsale/(:num)']='Admin/clearsale/$1';


//new updations 26-09-2021


$route['quatationbill']='AdminController/quatationbill';
$route['profitandlossitemwise']='AdminController/profitandlossitemwise';

//20-10-2021



$route['cashflow']='AdminController/cashflow';

$route['profitandlossaccount']='AdminController/profitandlossaccount';

$route['balancesheetasset']='AdminController/balancesheetasset';

$route['salesordersummery']='AdminController/salesordersummery';

$route['salesreturnedit/(:num)']='AdminController/salesreturnedit/$1';

$route['stockinout']='AdminController/stockinout';

$route['godownstock']='AdminController/godownstock';

$route['barcodeprinting']='Admin/printbarcode';

$route['createroute']='Bank/createroute';

$route['map']='Bank/map';

$route['deliverynote']='Bank/deliverynote';

$route['furniturestock/(:num)']='AdminController/furniturestockreport/$1';

$route['homeappliances']='AdminController/homeappliancesstockreport';


$route['electronics']='AdminController/electromicstockreport';

$route['incentiveedit/(:num)']='AdminController/incentiveedit/$1';

$route['incentiveedit1']='AdminController/incentiveedit1';

$route['incentiveedit2']='AdminController/incentiveedit2';




