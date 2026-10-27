<?php 
   $act=$this->session->userdata('u_type');
   if(!isset($leftmenu)){
     $leftmenu = '';
   
   }
   
   
   ?>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Mayoori Furnitures| Dashboard</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="<?php echo base_url()?>admin_styles/bower_components/bootstrap/dist/css/bootstrap.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?php echo base_url()?>admin_styles/bower_components/font-awesome/css/font-awesome.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="<?php echo base_url()?>admin_styles/bower_components/Ionicons/css/ionicons.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?php echo base_url()?>admin_styles/dist/css/AdminLTE.min.css">
   <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?php echo base_url()?>admin_styles/dist/css/skins/_all-skins.min.css">
   <!-- Morris chart -->
   <link rel="stylesheet" href="<?php echo base_url()?>admin_styles/bower_components/morris.js/morris.css">
   <!-- jvectormap -->
   <link rel="stylesheet" href="<?php echo base_url()?>admin_styles/bower_components/jvectormap/jquery-jvectormap.css">
   <!-- Date Picker -->
   <link rel="stylesheet" href="<?php echo base_url()?>admin_styles/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="<?php echo base_url()?>admin_styles/bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="<?php echo base_url()?>admin_styles/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

   <!-- Google Font -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <style>
      

/* ==========================================
   MAYOORI FURNITURES - PROFESSIONAL REPORT UI
   ========================================== */

:root {
    --report-primary: #1976d2;
    --report-primary-dark: #1259a7;
    --report-bg: #f2f6fc;
    --report-border: #e1e9f3;
    --report-text: #23344d;
    --report-muted: #718096;
}

/* Main content background */
.content-wrapper {
    background: var(--report-bg) !important;
}

/* Page heading */
.content-header {
    padding: 22px 25px 16px !important;
}

.content-header h1 {
    color: var(--report-text);
    font-size: 26px;
    font-weight: 700;
}

.content-header .breadcrumb {
    background: transparent;
    padding-top: 8px;
    font-size: 13px;
}

/* Report content spacing */
.content {
    padding: 15px 20px 25px !important;
}

/* Main report panels */
.content .box,
.content .panel {
    border: 1px solid var(--report-border) !important;
    border-radius: 12px !important;
    box-shadow: 0 4px 18px rgba(30, 60, 100, 0.06);
    overflow: hidden;
}

.content .box {
    border-top: 3px solid #dce7f5 !important;
}

.content .box-header {
    padding: 18px 20px !important;
    background: #fff;
    border-bottom: 1px solid var(--report-border);
}

.content .box-title {
    color: var(--report-text);
    font-size: 19px;
    font-weight: 700;
}

/* Report filter inputs */
.content input[type="date"],
.content input[type="text"],
.content select,
.content .form-control {
    min-height: 39px;
    border: 1px solid #d6e0ec;
    border-radius: 6px;
    box-shadow: none;
    color: var(--report-text);
    padding: 8px 11px;
}

.content input:focus,
.content select:focus,
.content .form-control:focus {
    border-color: var(--report-primary);
    outline: none;
    box-shadow: 0 0 0 2px rgba(25, 118, 210, 0.10);
}

/* Buttons */
.content .btn {
    border-radius: 6px;
    padding: 9px 16px;
    font-weight: 600;
    transition: all 0.2s ease;
}

.content .btn-primary {
    background: var(--report-primary);
    border-color: var(--report-primary);
}

.content .btn-primary:hover {
    background: var(--report-primary-dark);
    border-color: var(--report-primary-dark);
}

.content .btn-success {
    background: #159957;
    border-color: #159957;
}

.content .btn-default {
    background: #fff;
    border-color: #d9e3ef;
    color: var(--report-text);
}

.content .btn-default:hover {
    background: #f1f6fc;
}

/* Report tables */
.content .table,
.content table.dataTable {
    width: 100% !important;
    border-collapse: separate !important;
    border-spacing: 0;
    background: #fff;
    color: var(--report-text);
    font-size: 14px;
}

.content .table thead th,
.content table.dataTable thead th {
    background: #eaf2fd !important;
    color: #203858 !important;
    font-weight: 700;
    padding: 13px 12px !important;
    border-bottom: 1px solid #d5e3f4 !important;
    border-top: none !important;
    white-space: nowrap;
}

.content .table tbody td,
.content table.dataTable tbody td {
    padding: 11px 12px !important;
    border-bottom: 1px solid #e8eef6 !important;
    border-top: none !important;
    vertical-align: middle;
}

.content .table tbody tr:nth-child(even),
.content table.dataTable tbody tr:nth-child(even) {
    background: #f7faff;
}

.content .table tbody tr:hover,
.content table.dataTable tbody tr:hover {
    background: #edf5ff !important;
}

/* DataTables search and pagination */
.dataTables_wrapper .dataTables_filter input,
.dataTables_wrapper .dataTables_length select {
    border: 1px solid #d6e0ec;
    border-radius: 6px;
    padding: 6px 9px;
    margin-left: 6px;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    border-radius: 5px !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: var(--report-primary) !important;
    color: #fff !important;
    border-color: var(--report-primary) !important;
}

.dataTables_wrapper .dataTables_info {
    color: var(--report-muted);
    padding-top: 18px;
}

/* Export controls */
.dt-buttons .dt-button,
button.dt-button,
a.dt-button {
    background: #fff !important;
    border: 1px solid #d5e1ef !important;
    border-radius: 6px !important;
    color: var(--report-text) !important;
    padding: 8px 15px !important;
}

/* Responsive tables */
.table-responsive {
    border: 0;
    overflow-x: auto;
}

@media (max-width: 767px) {
    .content {
        padding: 10px !important;
    }

    .content-header {
        padding: 15px !important;
    }

    .content-header h1 {
        font-size: 21px;
    }

    .content .box-header {
        padding: 14px !important;
    }

    .content .table,
    .content table.dataTable {
        font-size: 12px;
    }
}

/* ======================================
   PROFIT & LOSS REPORT - LAYOUT REFINEMENT
====================================== */

/* Consistent report page background */
.content-wrapper {
    background: #f2f6fc !important;
}

/* Report panel */
.content .box {
    border: 1px solid #e1e9f3 !important;
    border-top: 3px solid #dce7f5 !important;
    border-radius: 12px !important;
    box-shadow: 0 5px 18px rgba(30, 60, 100, 0.06);
    overflow: visible !important;
}

/* Remove unnecessary height from report header */
.content .box-header {
    padding: 15px 18px !important;
}

/* Improve report controls */
.content .box-body {
    padding: 15px 18px !important;
}

/* Keep form controls visually consistent */
.content .box input[type="date"],
.content .box select,
.content .box input[type="text"] {
    min-height: 40px;
    border: 1px solid #d7e2ef;
    border-radius: 6px;
    background: #fff;
    box-shadow: none;
}

/* Buttons */
.content .box .btn {
    min-height: 38px;
    border-radius: 6px;
    font-weight: 600;
    padding: 8px 16px;
}

/* Export section */
.content .box .dt-buttons {
    margin-bottom: 12px;
}

/* Table heading */
.content .box table thead th {
    background: #eaf2fd !important;
    color: #203858 !important;
    font-weight: 700;
    padding: 13px 12px !important;
    border-bottom: 1px solid #d5e3f4 !important;
}

/* Table rows */
.content .box table tbody td {
    padding: 12px !important;
    border-bottom: 1px solid #e8eef6 !important;
    vertical-align: middle;
}

/* Keep table inside its container */
.content .box .table-responsive {
    width: 100%;
    overflow-x: auto;
}

/* Smaller screens */
@media (max-width: 767px) {
    .content {
        padding: 10px !important;
    }

    .content .box-body {
        padding: 12px !important;
    }
}


   </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
   <div class="wrapper">
   <header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo" style="height:65px;">
         <!-- mini logo for sidebar mini 50x50 pixels -->
         <span class="logo-mini"><b>M</b>F</span>
         <!-- logo for regular state and mobile devices -->
         <span class="logo-lg"><b>Mayoori Furnitures</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
         <!-- Sidebar toggle button-->
         <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
         <span class="sr-only">Toggle navigation</span>
         </a>
         <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
               <!-- User Account: style can be found in dropdown.less -->
               <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 
                   <h6><?php echo $this->session->userdata('name');?></h6>
                  
                 
               </a>
                  <ul class="dropdown-menu">
                     <!-- User image -->
                     <li class="user-header">
                        <?php if($act==2){
                           foreach($mem as $key4){			?>
                        <img src="<?php echo base_url('uploads/members/').$key4->photo?>" width="50"class="img-circle" alt="User Image">
                        <?php }} else if($act==4){?>
                        <img src="<?php echo base_url()?>uploads/admin/logo.png" class="img-circle" alt="User Image">
                        <?php } else if($act==1) {?>
                        <img src="<?php echo base_url()?>uploads/admin/logo.png" class="img-circle" alt="User Image">
                        <?php } ?>
                        <p>
                           <?php if($act==4){echo $this->session->userdata('office_name');}else if($act==2){echo $this->session->userdata('name');}?>
                        </p>
                     </li>
                     <!-- Menu Body -->
                     <li class="user-body">
                        <div class="row">
                           <div class="col-xs-4 text-center">
                              <a href="#">
                                 <!--Followers-->
                              </a>
                           </div>
                           <div class="col-xs-4 text-center">
                              <a href="#">
                                 <!--Sales-->
                              </a>
                           </div>
                           <div class="col-xs-4 text-center">
                              <a href="#">
                                 <!--Friends-->
                              </a>
                           </div>
                        </div>
                        <!-- /.row -->
                     </li>
                     <!-- Menu Footer-->
                     <li class="user-footer">
                        <div class="pull-left">
                           <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                           <a href="<?php echo base_url().'Admin/logout';?>" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                     </li>
                  </ul>
               </li>
              
            </ul>
         </div>
      </nav>
   </header>

   <aside class="main-sidebar">
    
      <section class="sidebar">
       
         <div class="user-panel">
            <div class="pull-left image">
             
            </div>
            <div class="pull-left info">
               <p><?php if($act==4){echo $this->session->userdata('office_name');}else if($act==2){echo $this->session->userdata('name');}?></p>
               <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
         </div>
       
         <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
               <input type="text" name="q" class="form-control" placeholder="Search...">
               <span class="input-group-btn">
               <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
               </button>
               </span>
            </div>
         </form>
       
         <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <?php
             
               if($act==1){
               ?>
          
            <!-- <li class="treeview <?php if(isset($mainmenu) && $mainmenu == 'transaction'){echo 'menu-open';}?>">
               <a href="#">
               <i class="fa fa-meetup"></i>
               <span>Transaction</span>
               <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i> 
               </span>
               </a>
               <ul class="treeview-menu" <?php if(isset($mainmenu) && $mainmenu == 'transaction'){echo 'style="display:block"';}?>>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-inr"></i>
                     <span>Sales</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li <?php if($leftmenu == 'saleswindow'){echo 'class="active"';}?>><a href="<?php echo base_url().'sales';?>"><i class="fa fa-circle-o"></i> B2C Sales Window</a></li>
                        <li <?php if($leftmenu == 'b2billing'){echo 'class="active"';}?>><a href="<?php echo base_url().'b2b';?>"><i class="fa fa-circle-o"></i>B2B Sales Window</a></li>
                        <li <?php if($leftmenu == 'deliverychellan'){echo 'class="active"';}?>><a href="<?php echo base_url().'delivery_chellan';?>"><i class="fa fa-circle-o"></i>Delivery Challan</a></li>
                        <li <?php if($leftmenu == 'salesorder'){echo 'class="active"';}?>><a href="<?php echo base_url().'salesorder';?>"><i class="fa fa-circle-o"></i>Sales Order</a></li>
                        <li <?php if($leftmenu == 'salesreturn'){echo 'class="active"';}?>><a href="<?php echo base_url().'sales_rtn';?>"><i class="fa fa-circle-o"></i>Sales Return</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-inr"></i>
                     <span>Purchase</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li <?php if($leftmenu == 'purchase'){echo 'class="active"';}?>><a href="<?php echo base_url().'purchase';?>"><i class="fa fa-circle-o"></i>Purchase</a></li>
                        <li <?php if($leftmenu == 'purchaseorder'){echo 'class="active"';}?>><a href="<?php echo base_url().'purchase_order';?>"><i class="fa fa-circle-o"></i>Purchase Order</a></li>
                        <li <?php if($leftmenu == 'purchasereturn'){echo 'class="active"';}?>><a href="<?php echo base_url().'purchase_return';?>"><i class="fa fa-circle-o"></i>Purchase Return</a></li>
                     </ul>
                  </li>
               
				  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-inr"></i>
                     <span>Payments</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li <?php if($leftmenu == 'recipt'){echo 'class="active"';}?>><a href="<?php echo base_url().'respay';?>"><i class="fa fa-circle-o"></i>Payments </a></li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="<?php echo base_url().'bank_payments';?>"><i class="fa fa-circle-o"></i>Bank Payments</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-inr"></i>
                     <span>Receipts</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li <?php if($leftmenu == 'recipt'){echo 'class="active"';}?>><a href="<?php echo base_url().'respay';?>"><i class="fa fa-circle-o"></i>Receipts </a></li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="<?php echo base_url().'bank_receipts';?>"><i class="fa fa-circle-o"></i>Bank Receipts</a></li>
                     </ul>
                  </li>
                  <li <?php if($leftmenu == 'quatationbill'){echo 'class="active"';}?>><a href="<?php echo base_url().'quabill';?>"><i class="fa fa-inr"></i>Quotation Bill</a></li>
                  <li <?php if($leftmenu == 'journal'){echo 'class="active"';}?>><a href="<?php echo base_url('journals')?>"><i class="fa fa-inr"></i>Journal</a></li>
                  <li <?php if($leftmenu == 'bankre'){echo 'class="active"';}?>><a href="<?php echo base_url().'banreconcilation';?>"><i class="fa fa-inr"></i>Bank Reconcilation</a></li>
                  <li <?php if($leftmenu == 'inventory'){echo 'class="active"';}?>><a href="<?php echo base_url('inventory_transfer');?>"><i class="fa fa-inr"></i>Inventory transfer</a></li>
                  <li <?php if($leftmenu == 'chequereg'){echo 'class="active"';}?>><a href="#"><i class="fa fa-inr"></i>Cheque Register</a></li>
                  <li <?php if($leftmenu == 'phystock'){echo 'class="active"';}?>><a href="<?php echo base_url('physicalstock');?>"><i class="fa fa-inr"></i>Physical Stock adjustment</a></li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-inr"></i>
                     <span>Delivery</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                     <li <?php if($leftmenu == 'recipt'){echo 'class="active"';}?>><a href="<?php echo base_url('createroute');?>"><i class="fa fa-circle-o"></i>Create Route </a></li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="<?php echo base_url('map');?>"><i class="fa fa-circle-o"></i>Map</a></li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="<?php echo base_url('deliverynote');?>"><i class="fa fa-circle-o"></i>Delivery List</a></li>
                     </ul>
                  </li>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-inr"></i>
                     <span>Payroll</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                      
                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-inr"></i>
                           <span>Finger Scanner</span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                           </span>
                           </a>
                           <ul class="treeview-menu">
                              <li <?php if($leftmenu == 'recipt'){echo 'class="active"';}?>><a href="#"><i class="fa fa-circle-o"></i>Download Punch </a></li>
                              <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="#"><i class="fa fa-circle-o"></i>monthly in and out report</a></li>
                           </ul>
                        </li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="#"><i class="fa fa-circle-o"></i>Generate Salary</a></li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="#"><i class="fa fa-circle-o"></i>Edit/View salary</a></li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="#"><i class="fa fa-circle-o"></i>Pay slip</a></li>
                     </ul>
                  </li>
                  <li <?php if($leftmenu == 'branchstock'){echo 'class="active"';}?>><a href="<?php echo base_url().'branchstock';?>"><i class="fa fa-inr"></i>Branch Stock</a></li>
                  <li <?php if($leftmenu == 'barcode'){echo 'class="active"';}?>><a href="<?php echo base_url('barcodeprint');?>"><i class="fa fa-inr"></i>Print Barcode</a></li>
                  
               </ul>
            </li> -->
      
            <li class="treeview">
               <a href="#">
               <i class="fa fa-meetup"></i>
               <span>Masters</span>
               <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
               </span>
               </a>
               <ul class="treeview-menu">
                  <li <?php if($leftmenu == 'customercreation'){echo 'class="active"';}?>><a href="<?php echo base_url().'customer';?>"><i class="fa fa-circle-o"></i>Customer Creation</a></li>
                  <li <?php if($leftmenu == 'suppliercreation'){echo 'class="active"';}?>><a href="<?php echo base_url().'supplier';?>"><i class="fa fa-circle-o"></i>Supplier Creation</a></li>
                  <li <?php if($leftmenu == 'item'){echo 'class="active"';}?>><a href="<?php echo base_url().'item';?>"><i class="fa fa-circle-o"></i>Item Creation</a></li>
                  <li <?php if($leftmenu == 'staffcreation'){echo 'class="active"';}?>><a href="<?php echo base_url().'staff';?>"><i class="fa fa-circle-o"></i>Staff Creation</a></li>
                  <li <?php if($leftmenu == 'ledgercreation'){echo 'class="active"';}?>><a href="<?php echo base_url().'ledger';?>"><i class="fa fa-circle-o"></i>Ledger Creation</a></li>
                  <li <?php if($leftmenu == 'bankaccountcreate'){echo 'class="active"';}?>><a href="<?php echo base_url().'bank_account';?>"><i class="fa fa-circle-o"></i>Registration of Bank A/C</a></li>
                  <li <?php if($leftmenu == 'firm'){echo 'class="active"';}?>><a href="<?php echo base_url().'regoffirm';?>"><i class="fa fa-circle-o"></i>Registration of Firm</a></li>
                  <li <?php if($leftmenu == 'branchreg'){echo 'class="active"';}?>><a href="<?php echo base_url().'branch';?>"><i class="fa fa-circle-o"></i>Registration of Branches</a></li>
                  <li <?php if($leftmenu == 'godown'){echo 'class="active"';}?>><a href="<?php echo base_url().'regofgoddown';?>"><i class="fa fa-circle-o"></i>Registration of Godown</a></li>
                  <li <?php if($leftmenu == 'accountgroupcreation'){echo 'class="active"';}?> ><a href="<?php echo base_url().'accgp';?>"><i class="fa fa-circle-o"></i> Registration of Account Group</a></li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-cog"></i>
                     <span>Settings</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li <?php if($leftmenu == 'unitcraetion'){echo 'class="active"';}?> ><a href="<?php echo base_url().'unit';?>"><i class="fa fa-circle-o"></i>Unit</a></li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="<?php echo base_url().'respay';?>"><i class="fa fa-circle-o"></i>Payment</a></li>
                        <li <?php if($leftmenu == 'financialyearcreation'){echo 'class="active"';}?> ><a href="<?php echo base_url().'fyear';?>"><i class="fa fa-circle-o"></i> Financial Year</a></li>
                        <li <?php if($leftmenu == 'hnscodecreation'){echo 'class="active"';}?>><a href="<?php echo base_url().'hsn';?>"><i class="fa fa-circle-o"></i> HSN Code</a></li>
                        <li  <?php if($leftmenu == 'itgroup'){echo 'class="active"';}?> ><a href="<?php echo base_url().'igroup';?>"><i class="fa fa-circle-o"></i>Item Group</a></li>
                        <li <?php if($leftmenu == 'itemcategorycreation'){echo 'class="active"';}?>><a href="<?php echo base_url().'itcate';?>"><i class="fa fa-circle-o"></i>Item Category</a></li>
                        <li <?php if($leftmenu == 'accountcategory'){echo 'class="active"';}?>><a href="<?php echo base_url().'catg';?>"><i class="fa fa-circle-o"></i> Account Category</a></li>
                        <li <?php if($leftmenu == 'financial'){echo 'class="active"';}?>><a href="<?php echo base_url().'faccgp';?>"><i class="fa fa-circle-o"></i>Financial Account Group</a></li>
                        <li <?php if($leftmenu == 'banklist'){echo 'class="active"';}?>><a href="<?php echo base_url().'banklist';?>"><i class="fa fa-circle-o"></i>Bank</a></li>
                        
                        <li <?php if($leftmenu == 'finance'){echo 'class="active"';}?>><a href="<?php echo base_url().'finance';?>"><i class="fa fa-circle-o"></i>Finance Creation</a></li>
                        <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url().'opbal';?>"><i class="fa fa-circle-o"></i>Opening Balance</a></li>
                   
                     </ul>
                  </li>
               </ul>
            </li>
            <li class="treeview">
               <a href="#">
               <i class="fa fa-meetup"></i>
               <span>Accounts</span>
               <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
               </span>
               </a>
               <ul class="treeview-menu">
                  <li <?php if($leftmenu == 'financialyearcreation'){echo 'class="active"';}?> ><a href="<?php echo base_url('daybook')?>"><i class="fa fa-circle-o"></i>Daybook</a></li>
                  <li <?php if($leftmenu == 'financialyearcreation'){echo 'class="active"';}?> ><a href="<?php echo base_url('cashbook')?>"><i class="fa fa-circle-o"></i>Cashbook</a></li>
                  <li <?php if($leftmenu == 'financialyearcreation'){echo 'class="active"';}?> ><a href="<?php echo base_url('bankbook')?>"><i class="fa fa-circle-o"></i>Bank book</a></li>
                  <li <?php if($leftmenu == 'financialyearcreation'){echo 'class="active"';}?> ><a href="<?php echo base_url('ledgerreport')?>"><i class="fa fa-circle-o"></i>Ledger</a></li>
                  <li <?php if($leftmenu == 'financialyearcreation'){echo 'class="active"';}?> ><a href="<?php echo base_url('trailbalance');?>"><i class="fa fa-circle-o"></i>Trail Balance</a></li>
                  <li <?php if($leftmenu == 'financialyearcreation'){echo 'class="active"';}?> ><a href="<?php echo base_url('profitandlossaccount');?>"><i class="fa fa-circle-o"></i>Trading, P&L A/c</a></li>
                  <li <?php if($leftmenu == 'financialyearcreation'){echo 'class="active"';}?> ><a href="<?php echo base_url('balancesheetasset');?>"><i class="fa fa-circle-o"></i>Balancesheet</a></li>
                 
               
                  <li <?php if($leftmenu == 'financialyearcreation'){echo 'class="active"';}?> ><a href="#"><i class="fa fa-circle-o"></i>Outstanding Recievable</a></li>
                  <li <?php if($leftmenu == 'financialyearcreation'){echo 'class="active"';}?> ><a href="#"><i class="fa fa-circle-o"></i>Outstanding Payable</a></li>
                  <li <?php if($leftmenu == 'financialyearcreation'){echo 'class="active"';}?> ><a href="<?php echo base_url('cashflow');?>"><i class="fa fa-circle-o"></i>Statement of cashflows</a></li>
               </ul>
            </li>
            <li class="treeview reports-menu">
               <a href="#">
               <i class="fa fa-meetup"></i>
               <span>Reports</span>
               <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
               </span>
               </a>
               
               <ul class="treeview-menu">
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-fire"></i>
                     <span>Sales Report</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-book"></i>
                           <span>B2C sales Report</span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                           </span>
                           </a>
                           <ul class="treeview-menu">
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('b2csalessummery')?>"><i class="fa fa-circle-o"></i>Sales Summary</a></li>
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('b2cdatewise');?>"><i class="fa fa-circle-o"></i>Sales Daywise</a></li>
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('b2cbillwise');?>"><i class="fa fa-circle-o"></i>Sales Billwise</a></li>
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('b2cgstsales');?>"><i class="fa fa-circle-o"></i>GST Sales Report (List-3)</a></li>
                             
                           </ul>
                        </li>
                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-book"></i>
                           <span>B2B sales Report</span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                           </span>
                           </a>
                           <ul class="treeview-menu">
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('b2bsalessummery')?>"><i class="fa fa-circle-o"></i>Sales Summary</a></li>
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('b2bsalesdate')?>"><i class="fa fa-circle-o"></i>Sales Daywise</a></li>
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('b2bsalesbill')?>"><i class="fa fa-circle-o"></i>Sales Billwise</a></li>
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('b2bgstsale')?>"><i class="fa fa-circle-o"></i>GST Sales Report (List-3)</a></li>
                           
                           </ul>
                        </li>
                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-book"></i>
                           <span>Delivery Challan Report</span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                           </span>
                           </a>
                           <ul class="treeview-menu">
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('b2cdelchesalesummery');?>"><i class="fa fa-circle-o"></i>Sales Summary</a></li>
                        
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('b2cdelchesalebill');?>"><i class="fa fa-circle-o"></i>Sales Billwise</a></li>
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('b2cdelchelgstsales');?>"><i class="fa fa-circle-o"></i>GST Sales Report (List-3)</a></li>
                           </ul>
                        </li>
                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-book"></i>
                           <span>Sales Order Report</span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                           </span>
                           </a>
                           <ul class="treeview-menu">
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('pendingsaleorder');?>"><i class="fa fa-circle-o"></i>Pending Sales Order Repot</a></li>
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('saleconvert');?>"><i class="fa fa-circle-o"></i>Converted Sales Order Report</a></li>
                            
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('salesordersummery');?>"><i class="fa fa-circle-o"></i>Salesorder Summery</a></li>
                           </ul>
                        </li>
                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-book"></i>
                           <span>Sales Return Report</span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                           </span>
                           </a>
                           <ul class="treeview-menu">
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('salesreturngst');?>"><i class="fa fa-circle-o"></i>GST Sales return Report</a></li>
                             
                           </ul>
                        </li>
                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-book"></i>
                           <span>Itemwise Sales Report</span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                           </span>
                           </a>
                           <ul class="treeview-menu">
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('categorywisesalesreport');?>"><i class="fa fa-circle-o"></i>B2C</a></li>
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('categorywisesalesreportb2b')?>"><i class="fa fa-circle-o"></i>B2B</a></li>
                           </ul>
                        </li>
                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-book"></i>
                           <span>Supplierwise Sales Report</span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                           </span>
                           </a>
                           <ul class="treeview-menu">
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('supplierwisedetailedreport');?>"><i class="fa fa-circle-o"></i>Detailedss Supplier Report</a></li>
                          
                           </ul>
                        </li>
                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-book"></i>
                           <span>Salesmanwise Sales Report</span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                           </span>
                           </a>
                           <ul class="treeview-menu">
                           
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('salesmanwisedetailedreport')?>"><i class="fa fa-circle-o"></i>Detailed Report</a></li>
                           </ul>
                        </li>
                       
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-fire"></i>
                     <span>Purchase Report</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-book"></i>
                           <span>Detailed Purchase Report</span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                           </span>
                           </a>
                           <ul class="treeview-menu">
                           
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('supplierwisesalesummery');?>"><i class="fa fa-circle-o"></i>Purchase Summery</a></li>
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('itemwisepurchase');?>"><i class="fa fa-circle-o"></i>Itemwise</a></li>
                           </ul>
                        </li>

                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-book"></i>
                           <span>GST Purchase report</span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                           </span>
                           </a>
                           <ul class="treeview-menu">
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('gst_purchase_datewise')?>"><i class="fa fa-circle-o"></i>Datewise Report</a></li>
                            
                           </ul>
                        </li>
                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-book"></i>
                           <span>Purchase Return Report</span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                           </span>
                           </a>
                           <ul class="treeview-menu">
                            
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('purchasereturndate')?>"><i class="fa fa-circle-o"></i> GST Datewise</a></li>
                            
                           </ul>
                        </li>
                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-book"></i>
                           <span>Purchase Order Report</span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                           </span>
                           </a>
                           <ul class="treeview-menu">
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="#"><i class="fa fa-circle-o"></i>Peniding Purchase Order Report</a></li>
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="#"><i class="fa fa-circle-o"></i>Supplierwise Purchase Order Report</a></li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-fire"></i>
                     <span>Stock Report</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-book"></i>
                           <span> Stock report</span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                           </span>
                           </a>
                           <ul class="treeview-menu">
                            
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('itemwisestock');?>"><i class="fa fa-circle-o"></i>Stock report</a></li>
                           </ul>
                        </li>

                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-book"></i>
                           <span>Stock Movement Report</span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                           </span>
                           </a>
                           <ul class="treeview-menu">
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('stockinout')?>"><i class="fa fa-circle-o"></i>Total Stock In & Out Report</a></li>
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('stockhistory')?>"><i class="fa fa-circle-o"></i>Stock History</a></li>
                            
                           </ul>
                        </li>
                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-book"></i>
                           <span>Damage Stock Report</span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                           </span>
                           </a>
                           <ul class="treeview-menu">
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="#"><i class="fa fa-circle-o"></i>Categorywise Damage Stock</a></li>
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="#"><i class="fa fa-circle-o"></i>Itemwise Damage Stock</a></li>
                           </ul>
                        </li>
                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-book"></i>
                           <span>Godown Stock Report</span>
                           <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                           </span>
                           </a>
                           <ul class="treeview-menu">
                              <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('godownstock')?>"><i class="fa fa-circle-o"></i>Godown Stock </a></li>
                           
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-fire"></i>
                     <span>Profit/loss Report</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li>
                           <a href="<?php echo base_url('b2cprofitlossreport');?>">
                           <i class="fa fa-book"></i>
                           <span>B2C</span>
                          </a>
                        </li>
                        <li>
                           <a href="<?php echo base_url('b2bprofitlossreport');?>">
                           <i class="fa fa-book"></i>
                           <span>B2B</span>
                          </a>
                        </li>
                       
                     </ul>
                  </li>
               </ul>
            </li>
            <li class="treeview <?php if(isset($mainmenu) && $mainmenu == 'details'){echo 'menu-open';}?>">
               <a href="#">
               <i class="fa fa-meetup"></i>
               <span>Details</span>
               <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
               </span>
               </a>
               <ul class="treeview-menu" <?php if(isset($mainmenu) && $mainmenu == 'details'){echo 'style="display:block"';}?>>
                  <li <?php if($leftmenu == 'customer_accounts'){echo 'class="active"';}?> ><a href="<?php echo base_url('customer_accounts')?>"><i class="fa fa-circle-o"></i>B2C Customers</a></li>
                  <li <?php if($leftmenu == 'customer_b2baccounts'){echo 'class="active"';}?> ><a href="<?php echo base_url('customer_b2baccounts')?>"><i class="fa fa-circle-o"></i>B2B Customers</a></li>
                 
                  
                  <li class="treeview <?php if($leftmenu == 'inventory_reports'){echo 'class="active"';}?>" >
                     <a href="#"><i class="fa fa-circle-o"></i>Inventory
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                     </a>
                     <ul class="treeview-menu">
                        <li <?php if($leftmenu == 'inventory_reports'){echo 'class="active"';}?>><a href="<?php echo base_url('inventory_reports/firm')?>"><i class="fa fa-circle-o"></i>Shop</a></li>
                        <li <?php if($leftmenu == 'inventory_reports'){echo 'class="active"';}?>><a href="<?php echo base_url('inventory_reports/godown')?>"><i class="fa fa-circle-o"></i>Godown</a></li> 
                     </ul>
                  </li>
                  <li <?php if($leftmenu == 'stock_reports'){echo 'class="active"';}?> ><a href="<?php echo base_url('stock_reports')?>"><i class="fa fa-circle-o"></i>Stock</a></li>
                  <li <?php if($leftmenu == 'paymentreport'){echo 'class="active"';}?> ><a href="<?php echo base_url('paymentreport')?>"><i class="fa fa-circle-o"></i>Payment Report</a></li>
                  <li <?php if($leftmenu == 'receiptreport'){echo 'class="active"';}?> ><a href="<?php echo base_url('receiptreport')?>"><i class="fa fa-circle-o"></i>Receipt Report</a></li>
               </ul>
            </li>

            <li class="treeview <?php if(isset($mainmenu) && $mainmenu == 'all item'){echo 'menu-open';}?>">
               <a href="#">
               <i class="fa fa-meetup"></i>
               <span>All Item</span>
               <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
               </span>
               </a>
               <ul class="treeview-menu" <?php if(isset($mainmenu) && $mainmenu == 'all item'){echo 'style="display:block"';}?>>
                  <li <?php if($leftmenu == 'all_item'){echo 'class="active"';}?> ><a href="<?php echo base_url('all_item')?>"><i class="fa fa-circle-o"></i>All item</a></li>
                  <li <?php if($leftmenu == 'downloadsale'){echo 'class="active"';}?> ><a href="<?php echo base_url('downloadsale')?>"><i class="fa fa-circle-o"></i>Download Sale</a></li>
            </ul>
			</li>

         <li class="treeview <?php if(isset($mainmenu) && $mainmenu == 'all item'){echo 'menu-open';}?>">
               <a href="#">
               <i class="fa fa-meetup"></i>
               <span>Incentive Edit</span>
               <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
               </span>
               </a>
               <ul class="treeview-menu" <?php if(isset($mainmenu) && $mainmenu == 'all item'){echo 'style="display:block"';}?>>
               <?php  $itemgroup=$this->Admin_model->get_itemgroup();
                  foreach($itemgroup as $itemin){?> 
               <li <?php if($leftmenu == 'all_item'){echo 'class="active"';}?> ><a href="<?php echo base_url('incentiveedit/').$itemin->ig_id;?>"><i class="fa fa-circle-o"></i><?php echo $itemin->ig_name;?></a></li>
                  <!-- <li <?php if($leftmenu == 'all_item'){echo 'class="active"';}?> ><a href="<?php echo base_url('incentiveedit1')?>"><i class="fa fa-circle-o"></i>Home Appliances</a></li>
                  <li <?php if($leftmenu == 'all_item'){echo 'class="active"';}?> ><a href="<?php echo base_url('incentiveedit2')?>"><i class="fa fa-circle-o"></i>Electronics</a></li>
  -->
                  <?php } ?>
            </ul>
			</li>
            <?php
               }
                /*END Menus for individual users*/
                
                 /*START Menus for budget admin*/
               else if($act==2){
               
               ?>
            <!---menu------->
            <?php
               }
              
               
               else if($act==4){
               
               ?>

            <li class="treeview <?php if(isset($mainmenu) && $mainmenu == 'transaction'){echo 'menu-open';}?>">
               <a href="#">
               <i class="fa fa-meetup"></i>
               <span>Transaction</span>
               <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
               </span>
               </a>
               <ul class="treeview-menu" <?php if(isset($mainmenu) && $mainmenu == 'transaction'){echo 'style="display:block"';}?>>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-inr"></i>
                     <span>Sales</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li <?php if($leftmenu == 'saleswindow'){echo 'class="active"';}?>><a href="<?php echo base_url().'sales';?>"><i class="fa fa-circle-o"></i> B2C Sales Window</a></li>
                        <li <?php if($leftmenu == 'b2billing'){echo 'class="active"';}?>><a href="<?php echo base_url().'b2b';?>"><i class="fa fa-circle-o"></i>B2B Sales Window</a></li>
                        <li <?php if($leftmenu == 'deliverychellan'){echo 'class="active"';}?>><a href="<?php echo base_url().'delivery_chellan';?>"><i class="fa fa-circle-o"></i>Delivery Challan</a></li>
                        <li <?php if($leftmenu == 'salesorder'){echo 'class="active"';}?>><a href="<?php echo base_url().'salesorder';?>"><i class="fa fa-circle-o"></i>Sales Order</a></li>
                        <li <?php if($leftmenu == 'salesreturn'){echo 'class="active"';}?>><a href="<?php echo base_url().'sales_rtn';?>"><i class="fa fa-circle-o"></i>Sales Return</a></li>
                     </ul>
                  </li>

                  
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-inr"></i>
                     <span>Purchase</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li <?php if($leftmenu == 'purchase'){echo 'class="active"';}?>><a href="<?php echo base_url().'purchase';?>"><i class="fa fa-circle-o"></i>Purchase</a></li>
                        <li <?php if($leftmenu == 'purchaseorder'){echo 'class="active"';}?>><a href="#"><i class="fa fa-circle-o"></i>Purchase Order</a></li>
                        <li <?php if($leftmenu == 'purchasereturn'){echo 'class="active"';}?>><a href="<?php echo base_url().'purchase_return';?>"><i class="fa fa-circle-o"></i>Purchase Return</a></li>
                     </ul>
                  </li>

               
				  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-inr"></i>
                     <span>Payments</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li <?php if($leftmenu == 'recipt'){echo 'class="active"';}?>><a href="<?php echo base_url().'cashpayment';?>"><i class="fa fa-circle-o"></i>Cash Payments </a></li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="<?php echo base_url().'bank_payments';?>"><i class="fa fa-circle-o"></i>Bank Payments</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-inr"></i>
                     <span>Receipts</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li <?php if($leftmenu == 'recipt'){echo 'class="active"';}?>><a href="<?php echo base_url().'cashrecipt';?>"><i class="fa fa-circle-o"></i>Cash Receipts </a></li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="<?php echo base_url().'bank_receipts';?>"><i class="fa fa-circle-o"></i>Bank Receipts</a></li>
                     </ul>
                  </li>
                  <li <?php if($leftmenu == 'phystock'){echo 'class="active"';}?>><a href="<?php echo base_url('physicalstock');?>"><i class="fa fa-inr"></i>Physical Stock </a></li>
                  <li <?php if($leftmenu == 'quatationbill'){echo 'class="active"';}?>><a href="<?php echo base_url().'quatationbill';?>"><i class="fa fa-inr"></i>Quotation Bill</a></li>
                  <li <?php if($leftmenu == 'journal'){echo 'class="active"';}?>><a href="<?php echo base_url('journals')?>"><i class="fa fa-inr"></i>Journal</a></li>
                  <li <?php if($leftmenu == 'bankre'){echo 'class="active"';}?>><a href="<?php echo base_url().'banreconcilation';?>"><i class="fa fa-inr"></i>Bank Reconcilation</a></li>
                  <li <?php if($leftmenu == 'inventory'){echo 'class="active"';}?>><a href="<?php echo base_url('inventory_transfer');?>"><i class="fa fa-inr"></i>Inventory transfer</a></li>
                  <li <?php if($leftmenu == 'chequereg'){echo 'class="active"';}?>><a href="#"><i class="fa fa-inr"></i>Cheque Register</a></li>
                

                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-inr"></i>
                     <span>Delivery</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li <?php if($leftmenu == 'recipt'){echo 'class="active"';}?>><a href="<?php echo base_url('createroute');?>"><i class="fa fa-circle-o"></i>Create Route </a></li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="<?php echo base_url('map');?>"><i class="fa fa-circle-o"></i>Map</a></li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="<?php echo base_url('deliverynote');?>"><i class="fa fa-circle-o"></i>Delivery List</a></li>
                     </ul>
                  </li>
                  </li>
                  
                  <li <?php if($leftmenu == 'branchstock'){echo 'class="active"';}?>><a href="<?php echo base_url().'branchstock';?>"><i class="fa fa-inr"></i>Branch Stock</a></li>
                  <li <?php if($leftmenu == 'barcode'){echo 'class="active"';}?>><a href="<?php echo base_url('barcodeprint');?>"><i class="fa fa-inr"></i>Print Barcode</a></li>
                  
               </ul>
            </li>
      
            <li class="treeview">
               <a href="#">
               <i class="fa fa-meetup"></i>
               <span>Masters</span>
               <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
               </span>
               </a>
               <ul class="treeview-menu">
                  <li <?php if($leftmenu == 'customercreation'){echo 'class="active"';}?>><a href="<?php echo base_url().'customer';?>"><i class="fa fa-circle-o"></i>Customer Creation</a></li>
                  <li <?php if($leftmenu == 'suppliercreation'){echo 'class="active"';}?>><a href="<?php echo base_url().'supplier';?>"><i class="fa fa-circle-o"></i>Supplier Creation</a></li>
                  <li <?php if($leftmenu == 'item'){echo 'class="active"';}?>><a href="<?php echo base_url().'item';?>"><i class="fa fa-circle-o"></i>Item Creation</a></li>
                  <li <?php if($leftmenu == 'staffcreation'){echo 'class="active"';}?>><a href="<?php echo base_url().'staff';?>"><i class="fa fa-circle-o"></i>Staff Creation</a></li>

                 
               </ul>

              
            </li>
           
            <li class="treeview">
               <a href="#">
               <i class="fa fa-meetup"></i>
               <span>Settings</span>
               <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
               </span>
               </a>
               <ul class="treeview-menu">
               <li <?php if($leftmenu == 'unitcraetion'){echo 'class="active"';}?> ><a href="<?php echo base_url().'unit';?>"><i class="fa fa-circle-o"></i>Unit</a></li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="<?php echo base_url().'respay';?>"><i class="fa fa-circle-o"></i>Payment</a></li>
                        <li <?php if($leftmenu == 'financialyearcreation'){echo 'class="active"';}?> ><a href="<?php echo base_url().'fyear';?>"><i class="fa fa-circle-o"></i> Financial Year</a></li>
                        <li <?php if($leftmenu == 'hnscodecreation'){echo 'class="active"';}?>><a href="<?php echo base_url().'hsn';?>"><i class="fa fa-circle-o"></i> HSN Code</a></li>
                        <li  <?php if($leftmenu == 'itgroup'){echo 'class="active"';}?> ><a href="<?php echo base_url().'igroup';?>"><i class="fa fa-circle-o"></i>Item Group</a></li>
                        <li <?php if($leftmenu == 'itemcategorycreation'){echo 'class="active"';}?>><a href="<?php echo base_url().'itcate';?>"><i class="fa fa-circle-o"></i>Item Category</a></li>
                        <li <?php if($leftmenu == 'accountcategory'){echo 'class="active"';}?>><a href="<?php echo base_url().'catg';?>"><i class="fa fa-circle-o"></i> Account Category</a></li>
                        <li <?php if($leftmenu == 'financial'){echo 'class="active"';}?>><a href="<?php echo base_url().'faccgp';?>"><i class="fa fa-circle-o"></i>Financial Account Group</a></li>
                        <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url().'opbal';?>"><i class="fa fa-circle-o"></i>Opening Balance</a></li>
                        <li <?php if($leftmenu == 'banklist'){echo 'class="active"';}?>><a href="<?php echo base_url().'banklist';?>"><i class="fa fa-circle-o"></i>Bank</a></li>
                        <li <?php if($leftmenu == 'statecode'){echo 'class="active"';}?>><a href="<?php echo base_url().'statecode';?>"><i class="fa fa-circle-o"></i>State</a></li>
                        <li <?php if($leftmenu == 'finance'){echo 'class="active"';}?>><a href="<?php echo base_url().'finance';?>"><i class="fa fa-circle-o"></i>Finance Creation</a></li>

                  
               </ul>

            </li>
       
            <!--menu-->

            
            <?php	  }else if($act==6){ ?>

               <li class="treeview">
               <a href="#">
               <i class="fa fa-meetup"></i>
               <span>Stock Reports</span>
               <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
               </span>
               </a>
               <ul class="treeview-menu">
                  <?php  $itemgroup=$this->Admin_model->get_itemgroup();
                  foreach($itemgroup as $items){?>
                  <li <?php if($leftmenu == 'furniture'){echo 'class="active"';}?> ><a href="<?php echo base_url('furniturestock/').$items->ig_id;?>"><i class="fa fa-circle-o"></i><?php echo $items->ig_name;?></a></li>
                  <!-- <li <?php if($leftmenu == 'homeappliances'){echo 'class="active"';}?> ><a href="<?php echo base_url('homeappliances')?>"><i class="fa fa-circle-o"></i>Home Appliances</a></li>
                  <li <?php if($leftmenu == 'electronics'){echo 'class="active"';}?> ><a href="<?php echo base_url('electronics')?>"><i class="fa fa-circle-o"></i>Electronics</a></li> -->

                <?php  }?>
                  
               </ul>
            </li>

            <li <?php if($leftmenu == 'phystock'){echo 'class="active"';}?>><a href="<?php echo base_url('physicalstock');?>"><i class="fa fa-inr"></i>Physical Stock adjustment</a></li>

          

           <?php }else if($act==5){?>
               <li class="treeview <?php if(isset($mainmenu) && $mainmenu == 'transaction'){echo 'menu-open';}?>">
               <a href="#">
               <i class="fa fa-meetup"></i>
               <span>Transaction</span>
               <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
               </span>
               </a>
               <ul class="treeview-menu" <?php if(isset($mainmenu) && $mainmenu == 'transaction'){echo 'style="display:block"';}?>>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-inr"></i>
                     <span>Sales</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li <?php if($leftmenu == 'saleswindow'){echo 'class="active"';}?>><a href="<?php echo base_url().'sales';?>"><i class="fa fa-circle-o"></i> B2C Sales Window</a></li>
                        <li <?php if($leftmenu == 'b2billing'){echo 'class="active"';}?>><a href="<?php echo base_url().'b2b';?>"><i class="fa fa-circle-o"></i>B2B Sales Window</a></li>
                        <li <?php if($leftmenu == 'deliverychellan'){echo 'class="active"';}?>><a href="<?php echo base_url().'delivery_chellan';?>"><i class="fa fa-circle-o"></i>Delivery Challan</a></li>
                        <li <?php if($leftmenu == 'salesorder'){echo 'class="active"';}?>><a href="<?php echo base_url().'salesorder';?>"><i class="fa fa-circle-o"></i>Sales Order</a></li>
                        <li <?php if($leftmenu == 'salesreturn'){echo 'class="active"';}?>><a href="<?php echo base_url().'sales_rtn';?>"><i class="fa fa-circle-o"></i>Sales Return</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-inr"></i>
                     <span>Purchase</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li <?php if($leftmenu == 'purchase'){echo 'class="active"';}?>><a href="<?php echo base_url().'purchase';?>"><i class="fa fa-circle-o"></i>Purchase</a></li>
                        <li <?php if($leftmenu == 'purchaseorder'){echo 'class="active"';}?>><a href="#"><i class="fa fa-circle-o"></i>Purchase Order</a></li>
                        <li <?php if($leftmenu == 'purchasereturn'){echo 'class="active"';}?>><a href="<?php echo base_url().'purchase_return';?>"><i class="fa fa-circle-o"></i>Purchase Return</a></li>
                     </ul>
                  </li>
               
				  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-inr"></i>
                     <span>Payments</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li <?php if($leftmenu == 'recipt'){echo 'class="active"';}?>><a href="<?php echo base_url().'cashpayment';?>"><i class="fa fa-circle-o"></i>Cash Payments </a></li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="<?php echo base_url().'bank_payments';?>"><i class="fa fa-circle-o"></i>Bank Payments</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-inr"></i>
                     <span>Receipts</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li <?php if($leftmenu == 'recipt'){echo 'class="active"';}?>><a href="<?php echo base_url().'cashrecipt';?>"><i class="fa fa-circle-o"></i>Cash Receipts </a></li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="<?php echo base_url().'bank_receipts';?>"><i class="fa fa-circle-o"></i>Bank Receipts</a></li>
                     </ul>
                  </li>
                  <li <?php if($leftmenu == 'quatationbill'){echo 'class="active"';}?>><a href="<?php echo base_url().'quatationbill';?>"><i class="fa fa-inr"></i>Quotation Bill</a></li>
                  <li <?php if($leftmenu == 'journal'){echo 'class="active"';}?>><a href="<?php echo base_url('journals')?>"><i class="fa fa-inr"></i>Journal</a></li>
                  <li <?php if($leftmenu == 'bankre'){echo 'class="active"';}?>><a href="<?php echo base_url().'banreconcilation';?>"><i class="fa fa-inr"></i>Bank Reconcilation</a></li>
                  <li <?php if($leftmenu == 'inventory'){echo 'class="active"';}?>><a href="<?php echo base_url('inventory_transfer');?>"><i class="fa fa-inr"></i>Inventory transfer</a></li>
                  <li <?php if($leftmenu == 'chequereg'){echo 'class="active"';}?>><a href="#"><i class="fa fa-inr"></i>Cheque Register</a></li>
                  <li <?php if($leftmenu == 'phystock'){echo 'class="active"';}?>><a href="<?php echo base_url('physicalstock');?>"><i class="fa fa-inr"></i>Physical Stock adjustment</a></li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-inr"></i>
                     <span>Delivery</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li <?php if($leftmenu == 'recipt'){echo 'class="active"';}?>><a href="<?php echo base_url('createroute');?>"><i class="fa fa-circle-o"></i>Create Route </a></li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="<?php echo base_url('map');?>"><i class="fa fa-circle-o"></i>Map</a></li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="<?php echo base_url('deliverynote');?>"><i class="fa fa-circle-o"></i>Delivery List</a></li>
                     </ul>
                  </li>
                  </li>
                  
                  <li <?php if($leftmenu == 'branchstock'){echo 'class="active"';}?>><a href="<?php echo base_url().'branchstock';?>"><i class="fa fa-inr"></i>Branch Stock</a></li>
                  <li <?php if($leftmenu == 'barcode'){echo 'class="active"';}?>><a href="<?php echo base_url('barcodeprint');?>"><i class="fa fa-inr"></i>Print Barcode</a></li>
                  
               </ul>
            </li>

            <li class="treeview">
               <a href="#">
               <i class="fa fa-meetup"></i>
               <span>Masters</span>
               <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
               </span>
               </a>
               <ul class="treeview-menu">
                  <li <?php if($leftmenu == 'customercreation'){echo 'class="active"';}?>><a href="<?php echo base_url().'customer';?>"><i class="fa fa-circle-o"></i>Customer Creation</a></li>
                  <li <?php if($leftmenu == 'suppliercreation'){echo 'class="active"';}?>><a href="<?php echo base_url().'supplier';?>"><i class="fa fa-circle-o"></i>Supplier Creation</a></li>
                  <li <?php if($leftmenu == 'item'){echo 'class="active"';}?>><a href="<?php echo base_url().'item';?>"><i class="fa fa-circle-o"></i>Item Creation</a></li>
                  <li <?php if($leftmenu == 'staffcreation'){echo 'class="active"';}?>><a href="<?php echo base_url().'staff';?>"><i class="fa fa-circle-o"></i>Staff Creation</a></li>
                  <li <?php if($leftmenu == 'ledgercreation'){echo 'class="active"';}?>><a href="<?php echo base_url().'ledger';?>"><i class="fa fa-circle-o"></i>Ledger Creation</a></li>
                  <li <?php if($leftmenu == 'bankaccountcreate'){echo 'class="active"';}?>><a href="<?php echo base_url().'bank_account';?>"><i class="fa fa-circle-o"></i>Registration of Bank A/C</a></li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-cog"></i>
                     <span>Settings</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li <?php if($leftmenu == 'unitcraetion'){echo 'class="active"';}?> ><a href="<?php echo base_url().'unit';?>"><i class="fa fa-circle-o"></i>Unit</a></li>
                        <li <?php if($leftmenu == 'payment'){echo 'class="active"';}?>><a href="<?php echo base_url().'respay';?>"><i class="fa fa-circle-o"></i>Payment</a></li>
                        <li <?php if($leftmenu == 'financialyearcreation'){echo 'class="active"';}?> ><a href="<?php echo base_url().'fyear';?>"><i class="fa fa-circle-o"></i> Financial Year</a></li>
                        <li <?php if($leftmenu == 'hnscodecreation'){echo 'class="active"';}?>><a href="<?php echo base_url().'hsn';?>"><i class="fa fa-circle-o"></i> HSN Code</a></li>
                        <li  <?php if($leftmenu == 'itgroup'){echo 'class="active"';}?> ><a href="<?php echo base_url().'igroup';?>"><i class="fa fa-circle-o"></i>Item Group</a></li>
                        <li <?php if($leftmenu == 'itemcategorycreation'){echo 'class="active"';}?>><a href="<?php echo base_url().'itcate';?>"><i class="fa fa-circle-o"></i>Item Category</a></li>
                        <li <?php if($leftmenu == 'accountcategory'){echo 'class="active"';}?>><a href="<?php echo base_url().'catg';?>"><i class="fa fa-circle-o"></i> Account Category</a></li>
                        <li <?php if($leftmenu == 'financial'){echo 'class="active"';}?>><a href="<?php echo base_url().'faccgp';?>"><i class="fa fa-circle-o"></i>Financial Account Group</a></li>
                        <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url().'opbal';?>"><i class="fa fa-circle-o"></i>Opening Balance</a></li>
                        <li <?php if($leftmenu == 'banklist'){echo 'class="active"';}?>><a href="<?php echo base_url().'banklist';?>"><i class="fa fa-circle-o"></i>Bank</a></li>
                        
                        <li <?php if($leftmenu == 'finance'){echo 'class="active"';}?>><a href="<?php echo base_url().'finance';?>"><i class="fa fa-circle-o"></i>Finance Creation</a></li>


                     </ul>
                  </li>
               </ul>
            </li>
            <li class="treeview">
               <a href="#">
               <i class="fa fa-meetup"></i>
               <span>Accounts</span>
               <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
               </span>
               </a>
               <ul class="treeview-menu">
                  <li <?php if($leftmenu == 'financialyearcreation'){echo 'class="active"';}?> ><a href="<?php echo base_url('daybook')?>"><i class="fa fa-circle-o"></i>Daybook</a></li>
                  <li <?php if($leftmenu == 'financialyearcreation'){echo 'class="active"';}?> ><a href="<?php echo base_url('cashbook')?>"><i class="fa fa-circle-o"></i>Cashbook</a></li>
                  <li <?php if($leftmenu == 'financialyearcreation'){echo 'class="active"';}?> ><a href="<?php echo base_url('bankbook')?>"><i class="fa fa-circle-o"></i>Bank book</a></li>
                  <li <?php if($leftmenu == 'financialyearcreation'){echo 'class="active"';}?> ><a href="<?php echo base_url('ledgerreport')?>"><i class="fa fa-circle-o"></i>Ledger</a></li>
               </ul>
            </li>


            <li class="treeview">
               <a href="#">
               <i class="fa fa-meetup"></i>
               <span>Reports</span>
               <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
               </span>
               </a>
               
               <ul class="treeview-menu">
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-fire"></i>
                     <span>Sales Report</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                     <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('b2csalessummery')?>"><i class="fa fa-circle-o"></i>B2c Sales Summary</a></li>
                     <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('b2bsalessummery')?>"><i class="fa fa-circle-o"></i>B2B Sales Summary</a></li>
                     <li <?php if($leftmenu == 'openingbal'){echo 'class="active"';}?>><a href="<?php echo base_url('b2cdelchesalesummery');?>"><i class="fa fa-circle-o"></i>DC Sales Summary</a></li>
                                     
                     
                       
                     </ul>
                  </li>
                  
                 
               </ul>
            </li>
               <?php }	?>
           
         </ul>
      </section>
      <!-- /.sidebar -->
   </aside>