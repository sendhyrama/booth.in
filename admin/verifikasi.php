<?php
session_start();
include '../koneksi.php'; //akses koneksi

$id         = "";
$foto       = "";
$judul      = "";
$ukuran     = "";
$harga      = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'tolak') {
    $id         = $_GET['id'];
    $sqltolak  = "delete from stand where id_stand = '$id'";
    $qtolak    = mysqli_query($conn, $sqltolak);
    if ($qtolak) {
        $sukses = "Data berhasil ditolak";
    } else {
        $error  = "Data gagal ditolak!";
    }
}

if ($op == 'verifikasi') {
    $id         = $_GET['id'];
    // $sqlverifikasi  = "insert into stand ('STATUS') values ('Verified') where id_stand = '$id'";
    $sqlverifikasi  = "update stand set STATUS = 'Verified' where id_stand = '$id'";
    $qverifikasi    = mysqli_query($conn, $sqlverifikasi);
    if ($qverifikasi) {
        $sukses = "Data berhasil diverifikasi";
    } else {
        $error  = "Data gagal diverifikasi!";
    }
}

if ($error) {
?>
    <div class="alert alert-danger" role="alert" style="text-align:center ;">
        <?php echo $error ?>
    </div>
<?php
    header("refresh:3;url=verifikasi.php"); // refresh halaman data user
}
?>
<?php
if ($sukses) {
?>
    <div class="alert alert-success" role="alert" style="text-align:center ;">
        <?php echo $sukses ?>
    </div>
<?php
    header("refresh:3;url=verifikasi.php");
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Verifikasi Stand - Stand.in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">

    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li><a href="index.php"><span>Home</span></a></li>
                            <li class="active">
                                <a href="verifikasi.php"><i class="ti-dashboard"></i><span>Verifikasi Stand</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Stand
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="kategori.php">Kategori</a></li>
                                    <li><a href="bahan.php">Bahan</a></li>
                                    <li><a href="stand.php">Stand</a></li>
                                </ul>
                            </li>
                            <li><a href="kelola_user.php"><span>Kelola User</span></a></li>
                            <li><a href="kelola_admin.php"><span>Kelola Admin</span></a></li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>

                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li>
                                <h3>
                                    <div class="date">
                                        <script type='text/javascript'>
                                            // <!--
                                            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                            var date = new Date();
                                            var day = date.getDate();
                                            var month = date.getMonth();
                                            var thisDay = date.getDay(),
                                                thisDay = myDays[thisDay];
                                            var yy = date.getYear();
                                            var year = (yy < 1000) ? yy + 1900 : yy;
                                            document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                            //-->
                                        </script></b>
                                    </div>
                                </h3>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <!-- page title area end -->
            <div class="main-content-inner">

                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
                                    <h2>List Data Permintaan Verifikasi</h2>
                                    <!-- <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2">Tambah Kategori</button> -->
                                </div>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="display" style="width:100%">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No.</th>
                                                <th>ID_Stand</th>
                                                <th>Foto</th>
                                                <th>Judul</th>
                                                <th>Deskripsi</th>
                                                <th>Ukuran</th>
                                                <th>Harga</th>
                                                <th>Alamat</th>
                                                <th>Kota</th>
                                                <th>Pilih Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $sqlread = "select * from stand where status IS NULL order by id_stand asc";
                                            $qread = mysqli_query($conn, $sqlread);
                                            $urut = 1;

                                            while ($read = mysqli_fetch_array($qread)) {
                                                $id = $read['ID_STAND'];
                                                $foto = $read['FOTO_STAND'];
                                                $judul = $read['JUDUL'];
                                                $deskripsi = $read['DESKRIPSI'];
                                                $ukuran = $read['UKURAN'];
                                                $harga = $read['HARGA_STAND'];
                                                $alamat = $read['ALAMAT'];
                                                $kota = $read['KOTA'];
                                            ?>
                                                <tr>
                                                    <th scope="row"><?= $urut++ ?></th>
                                                    <td scope="row"><?= $id ?></td>
                                                    <td scope="row"><?= $foto ?></td>
                                                    <td scope="row"><?= $judul ?></td>
                                                    <td scope="row"><?= $deskripsi ?></td>
                                                    <td scope="row"><?= $ukuran ?></td>
                                                    <td scope="row"><?= $harga ?></td>
                                                    <td scope="row"><?= $alamat ?></td>
                                                    <td scope="row"><?= $kota ?></td>
                                                    <td scope="row">
                                                        <a href="verifikasi.php?op=tolak&id=<?php echo $id ?>" onclick="return confirm('Tolak verifikasi stand ?')"><button type="button" class="btn btn-danger">Tolak</button></a>
                                                        <a href="verifikasi.php?op=verifikasi&id=<?php echo $id ?>" onclick="return confirm('Konfirmasi verifikasi stand ?')"><button type="button" class="btn btn-success">Verifikasi</button></a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- row area start-->
        </div>
    </div>
    <!-- main content area end -->
    <!-- footer area start-->
    <footer>
        <div class="footer-area">
            <p>Developed by Stand.in</p>
        </div>
    </footer>
    <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <script>
        $(document).ready(function() {
            $('#dataTable3').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ]
            });
        });
    </script>

    <!-- jquery latest version -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>

</body>

</html>