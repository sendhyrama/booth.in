<?php
include 'koneksi.php';
$q = 'select * from stand';
$result = mysqli_query($conn, $q);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/index.css" type="text/css">
    <title>Home <Stand class="in"></Stand>
    </title>
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

    </div>










    <div class="recommendation-container">
        <h2>Tenant</h2>


        <div class="recommendation-box">

            <div class="recom-hover">
                <?php
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                    <a href="#">
                        <div class="recom-item">
                            <div class="recom-grup">
                                <h4><?php echo $row['JUDUL']; ?></h4>
                            </div>
                            <h3> <?php echo $row['DESKRIPSI']; ?></h3>
                            <img src="public/img/right-arrow.png" class="img-arrow" alt="">
                        </div>

                    </a>
                <?php
                }
                ?>
            </div>


        </div>

    </div>
    </div>



</body>

</html>