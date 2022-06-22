<?php
    include 'koneksi.php'; //akses koneksi

    $id         = "";
    $nama       = "";
    $email      = "";
    $alamat     = "";
    $no_telp    = "";
    $sukses     = "";
    $error      = "";

    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }

    if ($op == 'delete') {
        $id         = $_GET['id'];
        $sqldelete  = "delete from user where id_user = '$id'";
        $qdelete    = mysqli_query($conn, $sqldelete);
        if ($qdelete) {
            $sukses = "Data berhasil dihapus";
        } else {
            $error  = "Data gagal dihapus!";
        }
    }

    if ($error) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
            </div>
        <?php
            header("refresh:5;url=index.php");// refresh halaman data user
        }
        ?>
        <?php
        if ($sukses) {
        ?>
            <div class="alert alert-success" role="alert">
                <?php echo $sukses ?>
            </div>
        <?php
            header("refresh:5;url=index.php");
        }
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Stand.in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        .mx-auto {
            width: 1000px;
        }

        .card {
            margin-top: 20px;
        }
    </style>

</head>

<body>
    <div class="header" style="text-align: center; padding: 20px;;">
        <h1>STAND.IN</h1>
    </div>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header" style="font-weight:bold;">
                Edit / Delete Data
            </div>

        </div>

        <div class="card">
            <div class="card-header text-white bg-secondary" style="font-weight:bold ;">
                List Data Pengguna
            </div>
            <div class="card-body">
                <table class="table" style="text-align: center;">
                    <thead>
                        <tr>
                            <th scope="col">No</>
                            <th scope="col">ID User</>
                            <th scope="col">Nama</>
                            <th scope="col">Email</>
                            <th scope="col">No. Telp</>
                            <th scope="col">Alamat</>
                            <th scope="col">Pilih Aksi</>
                        </tr>
                    <tbody>
                        <?php
                        $sqlread = "select * from user order by id_user asc";
                        $qread = mysqli_query($conn, $sqlread);
                        $urut = 1;

                        while ($read = mysqli_fetch_array($qread)) {
                            $id = $read['ID_USER'];
                            $nama = $read['NAMA_USER'];
                            $email = $read['EMAIL_USER'];
                            $notelp = $read['NO_TELP_USER'];
                            $alamat = $read['ALAMAT_USER'];

                        ?>
                            <tr>
                                <th scope="row"><?= $urut++ ?></th>
                                <td scope="row"><?= $id ?></td>
                                <td scope="row"><?= $nama ?></td>
                                <td scope="row"><?= $email ?></td>
                                <td scope="row"><?= $notelp ?></td>
                                <td scope="row"><?= $alamat ?></td>
                                <td scope="row">
                                    <!-- <a href="index.php?op=edit&id= php echo $id "><button type="button" class="btn btn-warning">Edit</button></a> -->
                                    <a href="index.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Konfirmasi hapus data ?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    </thead>

                </table>
            </div>
        </div>

    </div>

    <!-- script buat js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>