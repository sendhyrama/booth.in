<?php

function upload(){
    //ambil informasi gambar
    $namagambar = $_FILES['file']['name'];
    $ukurangambar = $_FILES["file"]["size"];
    $tmpname = $_FILES["file"]["tmp_name"];

    //cek ekstensi gambar
    $ekstensidiperbolehkan = ['png','jpg','jpeg'];
    $ekstensigambar = explode('.', $namagambar);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if( !in_array($ekstensigambar, $ekstensidiperbolehkan)){
        echo "
        <script>
            alert('Upload gagal, yang anda upload bukan gambar');
        </script>
        ";
        return false;
    }

    //cek ukuran gambar
    if($ukurangambar > 20971520){
        echo "
        <script>
            alert('Upload gagal, ukuran gambar terlalu besar, maksimal 20mb');
        </script>
        ";
        return false;
    }

    //jika gambar yang diupload sudah memenuhi syarat

    //beri nama gambar yang akan disimpan
    $namagambarbaru = uniqid();
    $namagambarbaru .= ".";
    $namagambarbaru .= $ekstensigambar;
    move_uploaded_file($tmpname, 'img/' . $namagambarbaru);
    return $namagambarbaru;
}

//masukkan data ke database
function tambah($data){
    include 'koneksi.php';

    $gambar = upload();
    if(!$gambar){
        return false;
    }

    // mengambil id_stand yang paling besar
    $query = mysqli_query($conn, "SELECT max(ID_STAND) as IDTerbesar FROM stand");
    $standid = mysqli_fetch_array($query);
    $ID_STAND = $standid['IDTerbesar'];
    
    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($ID_STAND, 3, 3);
    
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
    
    // membuat id stand baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $kode = "STD";
    $ID_STAND = $kode . sprintf("%03s", $urutan);

    //ambil username user dari $_Session
    $username = $_SESSION["Login"];
    $user = mysqli_query($conn, "SELECT ID_USER FROM user where USERNAME_USER='$username'");
    $datauser = mysqli_fetch_array($user);
    $ID_USER= $datauser['ID_USER'];

    $judul=$data["judul"];
    $desk=$data["deskripsi"];
    $idbahan=$data["bahan"];
    $idjenis=$data["jenis"];
    $ukuran_temp1=$data["ukuran1"];
    $ukuran_temp2=$data["ukuran2"];
    $ukuran=$ukuran_temp1 . ' x ' . $ukuran_temp2 ;
    $alamat=$data["alamat"];
    $kota=$data["kota"];
    $harga=$data["harga"];
    $status="";

    $insert = "INSERT INTO stand VALUES
        ('$ID_STAND','$ID_USER','$idjenis','$idbahan','$judul','$gambar','$desk','$ukuran','$harga','$alamat','$kota','$status')
    ";
    
    if(mysqli_query($conn, $insert)) {
        echo "
            <script>
                alert('Upload stand berhasil !!, iklan anda akan ditampilkan setelah admin melakukan verifikasi!');
                document.location.href = 'homepage.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Upload stand gagal :( Harap coba lagi');
            </script>
        ";
    }
}   
    ?>

