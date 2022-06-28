<h3>Lupa Password</h3>
<?php
if(isset($_SESSION['username_user']) != '') {
    header("location:index.php");
    exit();
}

$error  = "";
$sukses = "";
$email  = "";

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    if($email == '') {
        $error = "Masukkan email";
    }else {
        $sqli = "select * from user where email_user = 'email'";
        $q1 = mysqli_query($koneksi, $sqli);
        $n1 = mysqli_num_rows($q1);

        if($n1 < 1) {
            $error = "Email : <b>$email</b> tidak ditemukan";
    
        }
    }

    if (empty($error)) {
        $token_ganti_pass = md5(rand(0,1000));
        $judul_email  = "ganti password";
        $isi_email = "seseorang sdasdasdada";
        
    }
}
?>

<form action="" method="POST">
    <table>
        <tr>
            <td class="label">Email</td>
            <td><input type="text" name="email" class="input" value="<?php echo $email ?>"></td>

        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Lupa Password" class="tbl-biru"/> 

            </td>
        </tr>
    </table>



</form>