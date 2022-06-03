<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#!" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            </li>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#!">Settings</a>
                <a class="dropdown-item" href="#!">Activity Log</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="login.html">Logout</a>
            </div>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Bangun datar</div>
                            <a class="nav-link" href="segitiga.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-caret-up"></i></div>
                                Segitiga
                            </a>
                      
                            <a class="nav-link" href="persegi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-box-open"></i></div>
                                Persegi
                            </a>

                            <a class="nav-link" href="lingkaran.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-circle"></i></div>
                                Lingkaran
                            </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Jumlah Perhitungan</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                    //untuk menjumlahkan berapa kali melakukan hitungan pada sistem
                                    include('koneksi.php');
                                    $queryhitung = mysqli_query($koneksi, "SELECT SUM(jumlah) FROM bangun_datar");
                                    $data2 = mysqli_fetch_array($queryhitung);
                                    $sum = $data2['SUM(jumlah)'];
                                    ?>
                                    <h2 class="number"><?= $sum ?> KALI </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Presentase Segitiga</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php

                                    include('koneksi.php'); //koneksi basisdata
                                    $queryalltot = mysqli_query($koneksi, "SELECT  SUM(jumlah) FROM bangun_datar"); //query menghitung keseluruhan jumlah bangun_datar (segitiga, persegi & lingkaran)
                                    $datasemuabr = mysqli_fetch_array($queryalltot);
                                    $totsemua = $datasemuabr['SUM(jumlah)'];

                                    $querytotsegitiga = mysqli_query($koneksi, "SELECT  jumlah FROM bangun_datar WHERE bangun_datar='segitiga'"); //query mengetahui jumlah segitiga
                                    $datasegitiga = mysqli_fetch_array($querytotsegitiga);
                                    $totsegitiga = $datasegitiga['jumlah'];

                                    $persensegitiga = round((($totsegitiga / $totsemua) * 100), 2); //untuk menghitung persentase perhitungan segitiga
                                    ?>
                                    <h2 class="number"><?= $persensegitiga ?> %</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Presentase Persegi</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                    include('koneksi.php'); //koneksi basisdata
                                    $queryalltot = mysqli_query($koneksi, "SELECT  SUM(jumlah) FROM bangun_datar"); //query menghitung keseluruhan jumlah bangun_ruang (segitiga, persegi & lingkaran)
                                    $datasemuabr = mysqli_fetch_array($queryalltot);
                                    $totsemua = $datasemuabr['SUM(jumlah)'];

                                    $querytotpersegi = mysqli_query($koneksi, "SELECT  jumlah FROM bangun_datar WHERE bangun_datar='persegi'"); //uery mengetahui jumlah persegi
                                    $datapersegi = mysqli_fetch_array($querytotpersegi);
                                    $totpersegi = $datapersegi['jumlah'];

                                    $persenpersegi = round((($totpersegi / $totsemua) * 100), 2); //untuk menghitung persentase perhitungan persegi
                                    ?>
                                    <h2 class="number"><?= $persenpersegi ?> %</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Persentase Lingkaran</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                    include('koneksi.php'); //koneksi basisdata
                                    $queryalltot = mysqli_query($koneksi, "SELECT  SUM(jumlah) FROM bangun_datar"); //query menghitung keseluruhan jumlah bangun_datar (segitiga, persegi & lingkaran)
                                    $datasemuabr = mysqli_fetch_array($queryalltot);
                                    $totsemua = $datasemuabr['SUM(jumlah)'];

                                    $querytotlingkaran = mysqli_query($koneksi, "SELECT  jumlah FROM bangun_datar WHERE bangun_datar='lingkaran'"); //uery mengetahui jumlah lingkaran
                                    $datalingkaran = mysqli_fetch_array($querytotlingkaran);
                                    $totlingkaran = $datalingkaran['jumlah'];

                                    $persenlingkaran = round((($totlingkaran / $totsemua) * 100), 2); //untuk menghitung persentase perhitungan lingkaran
                                    ?>
                                    <h2 class="number"><?= $persenlingkaran ?> %</h2>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">Riwayat Hasil Perhitungan Segitiga</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <input type="button" value="Lihat Riwayat" class="btn btn-lg btn-danger btn-block" onclick="window.location.href='file/segitiga_luas.txt'" />
                                            <hr>
                                            <p>Silakan Klik Tombol di atas untuk melakukan lihat riwayat perhitungan Segitiga Anda</p> <!-- Hasil Perhitungan Luas Lingkaran-->
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">Riwayat Hasil Perhitungan Persegi</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <input type="button" value="Lihat Riwayat" class="btn btn-lg btn-success btn-block" onclick="window.location.href='file/persegi_luas.txt'" />
                                            <hr>
                                            <p>Silakan Klik Tombol di atas untuk melakukan lihat riwayat perhitungan Persegi Anda</p> <!-- Hasil Perhitungan Luas Lingkaran-->
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">Riwayat Hasil Perhitungan Lingkaran</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <input type="button" value="Lihat Riwayat" class="btn btn-lg btn-primary btn-block" onclick="window.location.href='file/lingkaran_luas.txt'" />
                                            <hr>
                                            <p>Silakan Klik Tombol di atas untuk melakukan lihat riwayat perhitungan Lingkaran Anda</p> <!-- Hasil Perhitungan Luas Lingkaran-->
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>