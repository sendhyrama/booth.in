<?php
include 'koneksi.php';
if (isset($_POST['Login'])) {
    $username_user = $_POST['username_user'];
    $password_user = $_POST['password_user'];
    // echo ($username_user);

    $validasi = mysqli_query($conn, "SELECT * FROM USER WHERE USERNAME_USER = '$username_user'");
    // $data = mysqli_fetch_array($validasi);
    // // $id = $data[];
    // var_dump($id);
    // var_dump($data);

    if (mysqli_num_rows($validasi) === 1) {
        //cek password
        $row = mysqli_fetch_array($validasi);
        if ($password_user === $row["PASSWORD_USER"]) {
            header("location: homepage.php");
            session_start();
            $_SESSION['Login'] = $username_user;
        }
    }
}


?>


<html>

<head>
    <title>Login User | Stand.in</title>
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
            height: 650px;
            background: lightgray;
        }

        h2 {
            text-align: center;
        }

        div.register {
            margin-top: 70px;
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
            font-size: 20;
        }

        input#details {
            width: 300px;
            border: 1px solid gray;
            border-radius: 3px;
            outline: 0;
            padding: 7px;
        }

        input#details:hover {
            width: 300px;
            border: 2px solid black;
            transition: 0.5s;
        }

        input#submit {
            width: 300px;
            padding: 7px;
            border: 1px;
            font-weight: 600;
            font-size: 20;
            background: #46fa49;
            border-radius: 3px;
        }

        input#submit:hover {
            background: #88ff8a;
        }

        .label {
            font-weight: bold;
        }

        #forgot {
            padding: 7px;
            border: 1px;
            font-weight: 500;
            font-size: 15;
            border-radius: 3px;
            background-color: fafafa;
            margin: auto;
            display: flex;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="register">
            <br>
            <h2>LOGIN</h2>
            <form id="regist" method="post" action="">
                <label>Username</label>
                <br>
                <input type="text" name="username_user" placeholder="Masukkan username anda" id="details" required>
                <br><br>
                <label>Password</label>
                <br>
                <input type="password" name="password_user" placeholder="Masukkan password anda" id="details" required>
                <br><br><br><br>
                <input name="Login" type="submit" value="Login" id="submit" class="pointer">
                <br><br>
                <input type="button" value="Lupa password?" id="forgot" class="pointer" onclick="location.href='lupa_password.php';">
                <br>
                <hr><br>
                <input type="button" value="Buat Akun Baru" id="submit" class="pointer" onclick="location.href='registrasi-standin.html';">
                <br><br>
            </form>
        </div>
    </div>
</body>