<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;600;700;800&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
    </head>
    <body>
        <?php require_once 'ruangan.php'; ?>

        <?php
        if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg-type']?>">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>
        <?php endif ?>
        <div class="container">
        <?php
            $mysqli = new mysqli('localhost','root','','all_users');
            $result = $mysqli->query("SELECT * FROM Ruangan");
        ?>
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <h3>Room</h3>
                        <tr>
                            <th>Id</th>
                            <th>Nama Ruangan</th>
                            <th>Deskripsi </th>
                            <th>Harga</th>
                            <th>Lokasi</th>
                            <th>Kapasitas</th>
                            <th>Url</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
        <?php
            while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['idRuangan'];?></td>
                <td><?php echo $row['namaRuangan'];?></td>
                <td><?php echo $row['deskripsiRuangan'];?></td>
                <td><?php echo $row['hargaRuangan'];?></td>
                <td><?php echo $row['lokasiRuangan'];?></td>
                <td><?php echo $row['kapasitasRuangan'];?></td>
                <td><?php echo $row['urlGambarRuangan'];?></td>
                <td>
                    <a href="index.php?edit=<?php echo $row['idRuangan'];?>" class="btn btn-info">Edit</a>
                    <a href="ruangan.php?delete=<?php echo $row['idRuangan'];?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
                </table>
            </div>
        <?php
            function pre_r($array){
                echo '<pre>';
                print_r($array);
                echo '<pre>';
            }

        ?>
        <div class="row justify-content-center">
            <form action="" method="POST">
                <input type="hidden" name="idRuangan" value="<?php echo $id;?>">
                <div class="form-group">
                <label>Nama Ruangan</label> &nbsp; &nbsp; 
                <input type="text" name="namaRuangan" value="<?php echo $namaRuangan; ?>">
                </div>
                <div class="form-group">
                <label>Deskripsi</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="text" name="deskripsiRuangan" value="<?php echo $deskripsiRuangan; ?>">
                </div>
                <div class="form-group">
                <label>Harga</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="text" name="hargaRuangan" value="<?php echo $hargaRuangan; ?>">
                </div>
                <div class="form-group">
                <label>Lokasi </label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="text" name="lokasiRuangan" value="<?php echo $lokasiRuangan; ?>">
                </div>
                <div class="form-group">
                <label>Kapasitas</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="text" name="kapasitasRuangan" value="<?php echo $kapasitasRuangan; ?>">
                </div>
                <div class="form-group">
                <label>Url</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="url" name="urlGambarRuangan" id="image" value="<?php echo $urlGambarRuangan; ?>">
                </div>
                <div class="form-group">
                    <?php
                    if ($update==true):
                    ?>
                    <button type="submit" class="btn btn-info" name="update">Update</button>
                    <?php else :?>
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                    <?php endif; ?>
                    <br>
                    <br>
                </div>
            </form>
            </div>
        <hr style="width: 100%; border: 1px solid black;"> 
        <br>
        <?php require_once 'Post.php'; ?>

        <div class="container">
        <?php
            $mysqli = new mysqli('localhost','root','','all_users');
            $result = $mysqli->query("SELECT * FROM infobooking");
        ?>
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id Booking</th>
                            <th>Id Ruangan</th>
                            <th>Id User </th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Year</th>
                            <th>Month</th>
                            <th>Date</th>
                            <th>Cost</th>
                            <th colspan="1">Action</th>
                        </tr>
                    </thead>
        <?php
            while ($row = $result->fetch_assoc()): ?>          
            <h3>Booking</h3>
            <tr>
                <td><?php echo $row['idBooking'];?></td>
                <td><?php echo $row['idRuangan'];?></td>
                <td><?php echo $row['idUser'];?></td>
                <td><?php echo $row['waktuMulai'];?></td>
                <td><?php echo $row['waktuSelesai'];?></td>
                <td><?php echo $row['tahunBooking'];?></td>
                <td><?php echo $row['bulanBooking'];?></td>
                <td><?php echo $row['tanggalBooking'];?></td>
                <td><?php echo $row['hargaTotal'];?></td>
                <td>
                    <a href="Post.php?delete=<?php echo $row['idBooking'];?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
                </table>
            </div>
        </div>
        <br>
        <br>
    </body>
</html>