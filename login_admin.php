<?php
include 'koneksi.php';
if (isset($_POST['Login'])) {
    $username_admin = $_POST['username_admin'];
    $password_admin = $_POST['password_admin'];
    // echo ($username_admin;

    $validasi = mysqli_query($conn, "SELECT * FROM ADMIN WHERE USERNAME_ADMIN = '$username_admin'");
    // $data = mysqli_fetch_array($validasi);
    // // $id = $data[];
    // var_dump($id);
    // var_dump($data);

    if (mysqli_num_rows($validasi) === 1) {
        //cek password
        $row = mysqli_fetch_array($validasi);
        if ($password_admin === $row["PASSWORD_ADMIN"]) {
            header("location: admin/index.php");
            session_start();
            $_SESSION['Login'] = $username_admin;
        }
    }
}


?>


<html>

<head>
    <title>Login Admin | Stand.in</title>
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

        h5 {
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
                <input type="text" name="username_admin" placeholder="Masukkan username anda" id="details" required>
                <br><br>
                <label>Password</label>
                <br>
                <input type="password" name="password_admin" placeholder="Masukkan password anda" id="details" required>
                <br><br>
                <input name="Login" type="submit" value="Login" id="submit" class="pointer">
                <br><br>

                <h5>Log As Admin</h5>
                <br><br>
            </form>
        </div>
    </div>
</body>