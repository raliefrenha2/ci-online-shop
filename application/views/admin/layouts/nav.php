 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- Menu Dashboard -->
        <li><a href="<?php base_url('admin/dasboard') ?>"><i class="fa fa-dashboard text-aqua"></i> <span>DASHBOARD</span></a></li>

        <!-- Menu Produk -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap"></i> <span>PRODUK</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/product') ?>"><i class="fa fa-table"></i> Data Produk</a></li>
            <li><a href="<?php echo base_url('admin/product/create') ?>"><i class="fa fa-plus"></i> Tambah Produk</a></li>
             <li><a href="<?php echo base_url('admin/category') ?>"><i class="fa fa-tags"></i> Kategori Produk</a></li>
          </ul>
        </li>

        <!-- Menu User -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-lock"></i> <span>PENGGUNA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-table"></i> Data Pengguna</a></li>
            <li><a href="<?php echo base_url('admin/user/tambah') ?>"><i class="fa fa-plus"></i> Tambah Pengguna</a></li>
          </ul>
        </li>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">