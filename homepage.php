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
    <title>Stand.in | Homepage
    </title>
</head>

<body>
    <div class="header">
        <nav>
            <h4>Standin</h4>
            <ul class="nav-links">
                <li><a href="">About</a></li>
                <li><a href="">Contacts</a></li>
                <li class="btn"><a href="upload.php">Upload</a></li>
                <li class="btn"><a href="kelola.php">Kelola</a></li>
            </ul>
        </nav>

    </div>










    <div class="recommendation-container">
        <h2>Tenant</h2>


        <div class="recommendation-box">
            <?php
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
                <div class="recom-hover">

                    <a href="#">
                        <div class="recom-item">
                            <div class="recom-grup">
                                <h4><?php echo $row['JUDUL']; ?></h4>
                            </div>
                            <h3> <?php echo $row['DESKRIPSI']; ?></h3>
                            <img src="public/img/right-arrow.png" class="img-arrow" alt="">
                        </div>

                    </a>

                </div>
            <?php
            }
            ?>


        </div>

    </div>
    </div>



</body>

</html>


<!-- 
    <div class="recommendation-box">
    <?php
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    ?>
                <div class="recom-hover">

                    <a href="#">
                        <div class="recom-item">
                            <div class="recom-grup">
                                <h4><?php echo $row['JUDUL']; ?></h4>
                            </div>
                            <h3> <?php echo $row['DESKRIPSI']; ?></h3>
                            <img src="public/img/right-arrow.png" class="img-arrow" alt="">
                        </div>

                    </a>

                </div>
            <?php
        }
            ?>


        </div>
 -->