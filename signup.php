<?php
include 'koneksi.php';

// auto increment buat id_user
$autoincrement = mysqli_query($conn, "select max(id_user) as max_id from user");
$data = mysqli_fetch_array($autoincrement);
$id = $data['max_id'];
$urut = (int)substr($id, 3, 3);
$urut++;
$huruf = "USR";
$id_user = $huruf . sprintf("%03s", $urut);

if (isset($_POST['adduser'])) {
    $nama_user = $_POST['nama_user'];
    $email_user = $_POST['email_user'];
    $username_user = $_POST['username_user'];
    $password_user = $_POST['password_user'];
    $no_telp_user = $_POST['no_telp_user'];
    $alamat_user = $_POST['alamat_user'];

    $check_username= mysqli_query($conn, "SELECT USERNAME_USER FROM USER WHERE USERNAME_USER = '$username_user'");
    if(mysqli_num_rows($check_username) > 0){
        echo('username Already exists');
    }
        else {
            $tambahuser = mysqli_query($conn, "insert into user (ID_USER, NAMA_USER, EMAIL_USER, USERNAME_USER, PASSWORD_USER, NO_TELP_USER, ALAMAT_USER) 
            values('$id_user', '$nama_user', '$email_user', '$username_user', '$password_user', '$no_telp_user', '$alamat_user')");
        }
   
    if ($tambahuser) {
        echo '
        <script type="text/javascript">
            window.onload = function () { alert("Selamat, anda berhasil registrasi!"); } 
        </script>';
        header("refresh:0.5;url=signup.php");
        header("refresh:1;url=login.php");
    } else {
        echo '
        <script type="text/javascript">
            window.onload = function () { alert("Maaf, registasi anda gagal!"); } 
        </script>';
        header("refresh:0.5;url=signup.php");
    }
}

?>

<html>

<head>
    <title>Registrasi StandIn</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

        * {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 700px;
            background: lightgray;
        }

        h2 {
            text-align: center;
        }

        #regist {
            margin-left: 50px;
        }

        div.register {
            margin-top: 50px;
            background-color: #FAFAFA;
            width: 100%;
            font-size: 15px;
            border-radius: 10px;
            border: 1px;
        }

        .pointer {
            cursor: pointer;
        }

        form#regist {
            margin: 40px;
        }

        input#details {
            width: 300px;
            border: 1px solid;
            border-radius: 3px;
            outline: 0;
            padding: 7px;
        }

        input#submit {
            width: 300px;
            padding: 7px;
            border: 1px;
            font-weight: 600;
            border-radius: 7px;
            background: #eb46fa;
        }

        input#reset {
            width: 300px;
            padding: 7px;
            border: 1px;
            border-radius: 7px;
            background: #000;
            color: #fff;
        }

        select#pendidikan {
            width: 300px;
            border: 1px solid;
            border-radius: 3px;
        }

        input#telp {
            width: 300px;
            border: 1px solid;
            border-radius: 3px;
            outline: 0;
            padding: 7px;
        }

        .label {
            font-weight: bold;
        }

        input#kelamin {
            width: 60px;
        }

        input#minat {
            width: 30px;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="register">
            <br>
            <h2>REGISTRASI</h2>
            <form action="" method="post" id="regist">
                <label>Nama</label>
                <br>
                <input type="text" name="nama_user" placeholder="Masukkan nama lengkap anda" id="details" required>
                <br><br>
                <label>Email</label>
                <br>
                <input type=email name="email_user" placeholder="Masukkan email aktif anda" id="details" required>
                <br><br>
                <label>Username</label>
                <br>
                <input type="text" name="username_user" placeholder="Masukkan username anda" id="details" required>
                <br><br>
                <label>Password</label>
                <br>
                <input type="password" name="password_user" placeholder="Masukkan password anda" id="details" required>
                <br><br>
                <label>No Telp</label>
                <br>
                <input type="number" name="no_telp_user" placeholder="Nomor telepon aktif anda" id="details" required>
                <br><br>
                <label>Alamat</label>
                <br>
                <input type="text" name="alamat_user" placeholder="Alamat anda" id="details" required>
                <br><br>
                <input type="checkbox" name="setuju" required>
                <span style="font-size:14px">Saya telah mengisi data dengan benar</span>
                <br><br>
                <input name="adduser" type="submit" id="submit" class="pointer">
                <br><br>
                <input type="reset" id="reset" value="Kosongkan Form" class="pointer">
                <br>
                <br><br>
            </form>
        </div>
    </div>
</body>

</html>