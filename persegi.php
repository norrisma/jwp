<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Soal JWP</title>
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
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Menghitung persegi</h1>

                        <div class="card-body">
                             <form role="form" action="" method="post">
                                <div class="form-group">
                                    <label class="small mb-3" for="inputEmailAddress">Masukkan sisi</label>
                                    <input class="form-control" name="sisi_persegi" type="number" placeholder="Masukkan alas" required/>
                                </div>
                                
                                <div>
                                <button id="payment-button" type="submit" name="simpan" class="btn btn-lg btn-success btn-block">
                                    <span id="payment-button-amount">Hitung</span>
                                </button>
                                <input type="button" value="Hitung Ulang" class="btn btn-lg btn-danger btn-block" onclick="window.location.href='persegi.php'" /><hr>
                                </div>
                                </div>
                                              
                            </form>
                            <?php 
                                        if (isset($_POST['simpan'])){ //melakukan pengecekan klik tombol simpan atau tidak
                                            include('koneksi.php'); //memanggil file koneksi_basisdata.php untuk menghubungkan basis data
                                            $sisi_persegi = $_POST['sisi_persegi']; // menyimpan masukan nilai sisi persegi ke dalam variabel
                                            

                                            $tanggal = date('Y-m-d'); //menyimpan tanggal saat ini pada variabel tanggal
                                            $jam = date('h:i:s'); // menyimpan waktu (timestamp) pada variabel jam
                                        

                                        //fungsi untuk menghitung luas persegi
                                        function luas_persegi($sisi_persegi) { //nama function luas_persegi menangkap nilai pada kedua variabel yaitu pada nilai sisi persegi
                                            $luas = ($sisi_persegi * $sisi_persegi);//rumus luas persegi yaitu sisi kali sisi
                                            return $luas; //mengembalikan nilai perhitungan luas
                                        }

                                        //menyimpan perhitungan luas segitiga pada file TXT
                                        $file = fopen("file/persegi_luas.txt","w");

                                        fwrite($file, //proses penulisan pada file txt
                                        '====================================================
                                                HASIL PERHITUNGAN LUAS PERSEGI ANDA
                                        ====================================================
                                        Tanggal Perhitungan     : '. $tanggal.' 
                                        Jam Perhitungan         : '. $jam. ' 
                                        Nilai Sisi Persegi      : '. $sisi_persegi. ' 
                                        Rumus Luas Persegi      : Sisi x Sisi
                                                                '. $sisi_persegi. ' x '. $sisi_persegi. ' 
                                        Luas Persegi            : '. luas_persegi($sisi_persegi));
                                        fclose($file);

                                        $querypilihpersegi = mysqli_query($koneksi, "SELECT * FROM bangun_datar WHERE bangun_datar='persegi'") or die(mysqli_connect_error()); //query menampilkan bangun_datar: persegi
                                        $data = mysqli_fetch_array($querypilihpersegi); //variable data berisikan mysqli array
                                        $persegi = $data['jumlah']; //mengambil data jumlah 
                                        $qty = $persegi + 1; //data jumlah+1 pada qty

                                        mysqli_query($koneksi, "UPDATE bangun_datar SET jumlah='$qty' WHERE bangun_datar='persegi'") or die(mysqli_connect_error()); //query update qty
                                        
                                        ?>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">Hasil Perhitungan</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2" name="luas"><?php echo luas_persegi($sisi_persegi)?></h3> <!-- Hasil Perhitungan Luas Persegi-->
                                        </div>
                                        <hr>
                                    </div>
                                    <?php } ?>
                                </div>
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
