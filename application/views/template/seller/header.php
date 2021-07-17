<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
        href="<?php echo base_url().'public/sellerasset/';?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url().'public/sellerasset/';?>assets/vendor/fonts/circular-std/style.css"
        rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'public/sellerasset/';?>assets/libs/css/style.css">
    <link rel="stylesheet"
        href="<?php echo base_url().'public/sellerasset/';?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet"
        href="<?php echo base_url().'public/sellerasset/';?>assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet"
        href="<?php echo base_url().'public/sellerasset/';?>assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <title>Seller Dashboard</title>
     <script src="https://www.gstatic.com/charts/loader.js"></script>
 
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="<?php echo base_url();?>">Travel</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="dropdown-item" href="<?php echo base_url('vandar_cl/Logout');?>">
                                <i class="fas fa-power-off mr-2"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url('Seller/index') ?>"><i
                                        class="fa fa-fw fa-user-circle"></i>Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-2" aria-controls="submenu-2"><i
                                        class="fa fa-fw fa-rocket"></i>Service</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('Sellerawork/addcab');?>">Cabs
                                                <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="<?php echo base_url('Sellerawork/AddHotel') ?>">Hotels</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('VendrRooms/addrooms');?>">
                                                Rooms</a>
                                            </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-3" aria-controls="submenu-3"><i
                                        class="fas fa-fw fa-chart-pie"></i>Data</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('Seller/totaldata') ?>">Cab
                                                Data</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('Seller/hoteldata') ?>">Hotel
                                                Data</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="<?php echo base_url('VendrRooms/RoomsData');?>">Rooms</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->