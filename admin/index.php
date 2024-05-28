<?php 
include '../private/initialize.php';
include SHARED_PATH . '/admin_header.php';?>
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>N</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Book</b>Notes</span>
    </a>
<?php include SHARED_PATH . '/admin_navigation.php';?>
    
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
<?php include SHARED_PATH . '/admin_sidebar.php';?>
    
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        BookNotes
        <small>Welcome to the Admin Area</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h1>Dashboard goes here</h1>
            </div>
            <!-- /.box-header -->
            
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <?php include SHARED_PATH . '/admin_footer.php';?>
  