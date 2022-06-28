<?php
include 'koneksi.php';
$q = 'select * from user';
$result = mysqli_query($conn, $q);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css" type="text/css">
    <title>Stand.in || Upload Stand 
    </title>
    <Stand class="in"></Stand>
    
    <style>
        .title-upload{
            margin-top: 50px;
            font-size: 40px;
        }
        .form-upload{
            margin-left: auto;
            margin-right: auto;
            width: 60%;
        }
        .form-border{
            width: 100%;
            background-color: #f2f2f2;
        }
        textarea {
            width: 100%;
            height: 150px;
            padding: 12px 20px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            resize: none;
        }

        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            }

        input[type=submit]:hover {
            background-color: #45a049;
            }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            }

        form .input-harga{
            display: inline;
            width: 40%;
        }

        form .input-ukuran{
            text-align: center;
            padding: 12px 20px;
            margin: 8px 10px 8px 5px;
            display: inline;
            width: 11%;
        }

        form .block{
            display:block;
        }

        input:out-of-range {
        border:2px solid red;
        }
    </style>
</head>

<body>
    <div class="header">
        <nav>
            <h4>Standin</h4>
            <ul class="nav-links">
                <li><a href="">About</a></li>
                <li><a href="">Contacts</a></li>
                <li class="btn"><a href="signup.php">Sign Up</a></li>
                <li class="btn"><a href="login.php">Log In</a></li>
            </ul>
        </nav>
        <div class="title-upload">
            <h2>Upload Stand</h2>
        </div>
        <div class= "form-border">
        <div class= "form-upload">
        <form action="/proses_upload.php" method= post;>
            <h2>Judul</h2>
            <input type="text" id="judul" name="judul" placeholder="Judul iklan" maxlength="50" autofocus required>
            <h2>Deskripsi</h2>
            <p><strong>Tip:</strong> Deskripsikan Informasi Stand Anda Disini <b>( Maksimal: 200 kata )<b> </p>           
            <textarea maxlength="200" name = "deskripsi"></textarea>
            <h2>Bahan Stand</h2>
            <select id="bahan" name="bahan" required>
            <option value=""></option>
            <option value="BHN001">Besi</option>
            <option value="BHN002">Kayu</option>
            <option value="BHN003">Aluminium</option>
            <option value="BHN004">Spandek</option>
            </select>
            <h2>Jenis Stand</h2>
            <select id="jenis" name="jenis" required>
            <option value=""></option>
            <option value="JNS001">Makanan</option>
            <option value="JNS002">Minuman</option>
            <option value="JNS003">Makanan & Minuman</option>
            </select>
            <h2 class="block">Ukuran</h2>
            <p><strong>Contoh: </strong>3 x 3 Meter </p>
            <input type="text" class="input-ukuran" id="ukuran1" name="ukuran1" pattern="[0-9]" maxlength="4" onkeypress="return inputangka(event)" required>
            <label> X </label>
            <input type="text" class="input-ukuran" id="ukuran2" name="ukuran2" pattern="[0-9]" maxlength="4" onkeypress="return inputangka(event)" required>
            <label> Meter </label>
            <h2 class="block">Alamat</h2>
            <input type="text" id="alamat" name="alamat" placeholder="Alamat lengkap stand" maxlength="50" required>
            <h2>Kota</h2>
            <input type="text" id="kota" name="kota" placeholder="Nama kota" maxlength="50" required>
            <h2 class="block" >Harga Sewa </h2>
            <label>Rp. </label>
            <input type="text" class="input-harga" id="harga" name="harga" pattern="[0-9]" maxlength="11" onkeypress="return inputangka(event)" required>
            <label> / Bulan </label>
            <input type="submit" value="Upload Stand">
            
        </form>
        </div>
        </div>
    </div>
</body>
<script src="public/js/myscript.js"></script>
</html>
