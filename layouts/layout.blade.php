<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Beranda</title>

    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" style="background-color: #F5F5F5">
        <img src="{{asset('asset/img/pngkodai.png')}}" width="70">
        </div>
        <a class="navbar-brand" href="index.html">KODAI DOOR <br>OFFICIAL</a>

        <!-- Navbar Search-->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        </form>
        <?php
        date_default_timezone_set('Asia/Jakarta');
        echo "<font color='white' face='arial bold'>";
        echo date('d-M-Y H:i:s');
        echo " WIB";
        echo "</font>";
        ?>
        <div class="topbar-divider d-none d-sm-block"></div>
        <marquee>
            <font size="4" face="Copperplate Gothic Bold">Sistem Inventori <i>PT. Graha Sentra Artha</i></font>
        </marquee>

        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-light-primary sidebar sidebar-#FFE4E1 accordion" style="background-color: 	#F5F5F5" id="accordionSidebar">

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    @role('admin')
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Data Master</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item fas fa-arrow-circle-right" href="{{ route('user.index') }}"> Master User</a>
                            <a class="collapse-item fas fa-arrow-circle-right" href="{{ route('barang.index') }}"> Master Barang</a>
                            <a class="collapse-item fas fa-arrow-circle-right" href="{{ route('supplier.index') }}"> Master Supplier</a>
                            <a class="collapse-item fas fa-arrow-circle-right" href="{{ route('akun.index') }}"> Master Akun</a>
                            <a class="collapse-item fas fa-arrow-circle-right" href="{{ route('setting.index') }}"> Master Setting Akun</a>
                        </div>
                    </div>
                    @endrole
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages1">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Transaksi</span>
                    </a>
                    <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item fas fa-arrow-circle-right" href="{{ route('order.transaksi') }}"> Order</a>
                            <a class="collapse-item fas fa-arrow-circle-right" href="{{ route('barangmasuk.transaksi') }}"> Barang Masuk</a>
                            <a class="collapse-item fas fa-arrow-circle-right" href="{{ route('barangkeluar.transaksi') }}"> Barang Keluar</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages2">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <span>Laporan</span></a>
                    </a>
                    <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item fas fa-arrow-circle-right" href="{{ route('laporan.index') }}"> Jurnal Umum</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">


                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                            </a>
                        </div>
                    </li>
                    </ul>
                    </nav>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- DataTales Example -->
                        <!-- Page Heading -->
                        @yield('content')
                        <!-- Footer -->
                        <footer class="sticky-footer bg-aqua">
                            <div class="container my-auto">
                                <div class="copyright text-center my-auto">
                                    <span>Create By: Kelompok 3<br>Copyright &copy; FMMW 2022
                                    </span>

                                    <!-- End of Footer -->

                                </div>
                                <!-- End of Content Wrapper -->

                            </div>
                            <!-- End of Page Wrapper -->

                            <!-- Scroll to Top Button-->
                            <a class="scroll-to-top rounded" href="#page-top">
                                <i class="fas fa-angle-up"></i>
                            </a>

                            <!-- Logout Modal-->
                            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar aplikasi ?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Pilih "Logout" apabila ingin keluar aplikasi</div>
                                        <div class="modal-footer">
                                            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bootstrap core JavaScript-->
                            <script src="asset/vendor/jquery/jquery.min.js"></script>
                            <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                            <!-- Core plugin JavaScript-->
                            <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

                            <!-- Custom scripts for all pages-->
                            <script src="asset/js/sb-admin-2.min.js"></script>

                            <!-- Page level plugins -->
                            <script src="asset/vendor/chart.js/Chart.min.js"></script>
                            <script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
                            <script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

                            <!-- Page level custom scripts -->
                            <script src="asset/js/demo/chart-area-demo.js"></script>
                            <script src="asset/js/demo/chart-pie-demo.js"></script>
                            <script src="asset/js/demo/datatables-demo.js"></script>
    </body>

</html>