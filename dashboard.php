<?php 
error_reporting(0);
include 'connection.php';
session_start();
if (!isset($_SESSION['signin'])) {
    header("Location: signin.php");
    exit;
}
if (isset($_POST['cari'])) {
   $cari = $_POST['keyword'];
   $data = mysqli_query($connection, "SELECT * FROM movie WHERE judul LIKE '%$cari%' OR tahun LIKE '%$cari%' OR kategori LIKE '%$cari%'");
   $cek = mysqli_num_rows($data);
} else {
    $data = mysqli_query($connection, "SELECT * FROM movie ORDER BY id DESC");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>urfavmovies</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="cari.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="icon" href="./img/icon.ico">
</head>
<body>
    <header>
        <div class="logo"><i class="fa fa-film"> urfavmovies</i></div>
        <nav>
            <ul>
                <li><a href="#movie" class="active">Movies</a></li>
                <li><a href="signout.php">Sign Out</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <br><br><br><br>
        <div class="content">
            <h2>DATA FILM</h2>
            <button class="btn"><a href="tambah.php" class="btn">Tambah</a></button><br><br>
                <form action="" method="POST">
                    <input  class="search"type="text" name="keyword" id="live-search" placeholder="Cari" autocomplete="off">
                    <button type="submit" name="cari" id="keyword" class="button">Cari</button>
                </form>
                <div id="searchresult"></div>
            <table class="table">
                <thead>
                    <th>NO</th>
                    <th>Judul</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th>Rating</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </thead>
                <?php if($cek == "0") { ?>
                <tr>
                    <td colspan="7" style="text-align:center;">No data available in table</td>
                </tr>
                
                <?php } ?>
                <tbody>
                    <?php 
                    include 'connection.php';
                    $no = 1;
                    while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['judul']; ?></td>
                            <td><?php echo $d['tahun']; ?></td>
                            <td><?php echo $d['kategori']; ?></td>
                            <td><?php echo $d['rating']; ?></td>
                            <td><img style="width: 40px;" src="gambar/<?php echo $d['gambar']; ?>"></td>
                            <td>
                                <button class="edit"><a href="update.php?id=<?php echo $d['id']; ?>" class="edit">Ubah</a></button>
                                <button class="hapus"><a href="hapus.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Anda yakin hapus data ini?')"
                                class="hapus">Hapus</a></button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <footer>
        <p>Copyright &copy; 2022 urfavmovies. All right reserved</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/search.js"></script>
</body>
</html>

