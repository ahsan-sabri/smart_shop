<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Smart Shop | Admin</title>
        <!-- Bootstrap core CSS-->
        <link href="{{ asset('public/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="{{ asset('public/admin/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="{{ asset('public/admin/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="{{ asset('public/admin/css/sb-admin.css') }}" rel="stylesheet">
    </head>

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="{{ url('/dashboard') }}">Admin Panel</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="{{ url('/dashboard') }}">
                            <i class="fa fa-fw fa-dashboard"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    
                    <!--category links-->
                    
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-list"></i>
                            <span class="nav-link-text">Category</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents">
                            <li>
                                <a href="{{ url('category/add') }}"><i class="fa fa-fw fa-plus"></i> Add Category</a>
                            </li>
                            <li class="">
                                <a href="{{ url('category/manage') }}"><i class="fa fa-fw fa-edit"></i> Manage Category</a>
                            </li>
                        </ul>
                    </li>
                    
                    <!--manufacturer links--> 
                    
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsManufacturer" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-list"></i>
                            <span class="nav-link-text">Manufacturer</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponentsManufacturer">
                            <li>
                                <a href="{{ url('manufacturer/add') }}"><i class="fa fa-fw fa-plus"></i> Add Manufacturer</a>
                            </li>
                            <li class="">
                                <a href="{{ url('manufacturer/manage') }}"><i class="fa fa-fw fa-edit"></i> Manage Manufacturer</a>
                            </li>
                        </ul>
                    </li>
                    
                    <!--product links-->   
                    
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsProduct" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-list"></i>
                            <span class="nav-link-text">Product</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponentsProduct">
                            <li>
                                <a href="{{ url('product/add') }}"><i class="fa fa-fw fa-plus"></i> Add Product</a>
                            </li>
                            <li class="">
                                <a href="{{ url('product/manage') }}"><i class="fa fa-fw fa-edit"></i> Manage Product</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                        <a class="nav-link" href="{{ url('user/manage') }}">
                            <i class="fa fa-fw fa-user"></i>
                            <span class="nav-link-text">Users</span>
                        </a>
                    </li>
                    
                    <!--general settings-->   
                    
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsSettings" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-cog"></i>
                            <span class="nav-link-text">General Settings</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponentsSettings">
                            <li>
                                <a href="{{ url('logo') }}"><i class="fa fa-fw fa-superpowers"></i> Logo</a>
                            </li>
                            <li class="">
                                <a href="{{ url('slider') }}"><i class="fa fa-fw fa-bars"></i> Slides</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
                <ul class="navbar-nav sidenav-toggler">
                    <li class="nav-item">
                        <a class="nav-link text-center" id="sidenavToggler">
                            <i class="fa fa-fw fa-angle-left"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="fa fa-fw fa-user"></i>{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>