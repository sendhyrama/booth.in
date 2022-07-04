<?php
session_start();
//cek apakah user sudah login 
if (!isset($_SESSION["Login"])) {
    header('Location:login.php');
}

include 'koneksi.php';

$id_stand   = "";
$id_user    = "";
$foto       = "";
$judul      = "";
$deskripsi  = "";
$ukuran     = "";
$harga      = "";
$alamat     = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'detail') {
    $id_stand   = $_GET['id_stand'];
    $sqldetail  = "select from stand where id_stand = '$id_stand'";
    $qdetail    = mysqli_query($conn, $sqldetail);
    if ($qdetail) {
        $sukses = "Data berhasil dihapus";
    } else {
        $error  = "Data gagal dihapus!";
    }
}

if ($error) {
?>
    <div class="alert alert-danger" role="alert" style="text-align:center ;">
        <?php echo $error ?>
    </div>
<?php
    header("refresh:3;url=stand.php"); // refresh halaman data user
}
?>

<?php
if ($sukses) {
?>
    <div class="alert alert-success" role="alert" style="text-align:center ;">
        <?php echo $sukses ?>
    </div>
<?php
    header("refresh:3;url=stand.php");
}



?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kelola Stand | Stand.in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="admin/assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="admin/assets/css/metisMenu.css">
    <link rel="stylesheet" href="admin/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/css/slicknav.min.css">

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
    <link rel="stylesheet" href="admin/assets/css/typography.css">
    <link rel="stylesheet" href="admin/assets/css/default-css.css">
    <link rel="stylesheet" href="admin/assets/css/styles.css">
    <link rel="stylesheet" href="admin/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="admin/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <!-- <div class="page-container"> -->
    <!-- sidebar menu area start -->
    <!-- sidebar menu area end -->
    <!-- main content area start -->
    <div class="main-content">
        <!-- header area start -->
        <div class="header-area">
            <div class="row align-items-center">
                <!-- nav and search button -->
                <div class="col-md-6 col-sm-8 clearfix">
                    <div class="nav-btn pull-left">
                        <a href="homepage.php"><button type="button" class="btn btn-dark">< Homepage</button></a>
                    </div>
                </div>
                <!-- profile info & task notification -->

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
                                <h2>Daftar Standmu</h2>
                            </div><br>
                            <div class="data-tables datatable-dark">
                                <table id="dataTable3" class="display" style="width:100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No.</th>
                                            <th>ID Stand</th>
                                            <th>Foto</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Ukuran</th>
                                            <th>Harga</th>
                                            <th>Alamat</th>
                                            <th>Pilih Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //ambil username user dari $_Session
                                        $username = $_SESSION["Login"];
                                        $user = mysqli_query($conn, "SELECT ID_USER FROM user where USERNAME_USER='$username'");
                                        $datauser = mysqli_fetch_array($user);
                                        $iduser = $datauser['ID_USER'];
                                        //ambil data stand berdasarkan id user
                                        $brgs = mysqli_query($conn, "SELECT * from stand WHERE ID_USER = '$iduser' AND status like 'Verified' ORDER BY ID_STAND ASC");
                                        $no = 1;
                                        while ($p = mysqli_fetch_array($brgs)) {
                                            $id_stand = $p['ID_STAND'];

                                        ?>

                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $p['ID_STAND'] ?></td>
                                                <td><?php echo $p['FOTO_STAND'] ?></td>
                                                <td><?php echo $p['JUDUL'] ?></td>
                                                <td><?php echo $p['DESKRIPSI'] ?></td>
                                                <td><?php echo $p['UKURAN'] ?></td>
                                                <td><?php echo $p['HARGA_STAND'] ?></td>
                                                <td><?php echo $p['ALAMAT'] ?></td>
                                                <td>
                                                    <a href="kelola_detail.php?id=<?php echo $id_stand ?>"><button type="button" class="btn btn-warning">Detail ></button></a>
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
    <script src="admin/assets/js/popper.min.js"></script>
    <script src="admin/assets/js/bootstrap.min.js"></script>
    <script src="admin/assets/js/owl.carousel.min.js"></script>
    <script src="admin/assets/js/metisMenu.min.js"></script>
    <script src="admin/assets/js/jquery.slimscroll.min.js"></script>
    <script src="admin/assets/js/jquery.slicknav.min.js"></script>
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
    <script src="admin/assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="admin/assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="admin/assets/js/plugins.js"></script>
    <script src="admin/assets/js/scripts.js"></script>

</body>

</html>