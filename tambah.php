<?php 
    session_start();
    if (!isset($_SESSION['signin'])) {
        header("Location: signin.php");
        exit;
    }
    include 'connection.php';
    if(isset($_POST['submit'])){
        $judul = $_POST['judul'];
        $tahun = $_POST['tahun'];
        $kategori = $_POST['kategori'];
        $rating = $_POST['rating'];
        $gambar = $_FILES['gambar']['name'];

        if($gambar != "") {
            $ekstensi = array('jpg', 'png');
            $x = explode('.', $gambar);
            $extension = strtolower(end($x));
            $file_tmp = $_FILES['gambar']['tmp_name'];


            if(in_array($extension, $ekstensi) === true) {
                move_uploaded_file($file_tmp, 'gambar/'.$gambar);

                $query = "INSERT INTO movie (id, judul, tahun, kategori, rating, gambar)VALUES('','$judul','$tahun','$kategori','$rating', '$gambar')";
                $result = mysqli_query($connection, $query);

                if(!$result) {
                    die("Query Error : ".mysqli_errno($connection)." - ".mysqli_error($connection));
                }else{
                    echo "<script>alert('Data berhasil ditambahkan!');window.location='dashboard.php';</script>";  
                }

            }else{
                echo "<script>alert('Ekstensi gambar hanya jpg dan png!');window.location='tambah.php';</script>";   
            }

        }else{
            $query = "INSERT INTO movie (id, judul, tahun, kategori, rating)VALUES('','$judul','$tahun','$kategori','$rating')";
            $result = mysqli_query($connection, $query);

            if(!$result) {
                die("Query Error : ".mysqli_errno($connection)." - ".mysqli_error($connection));
            }else{
                echo "<script>alert('Data berhasil ditambahkan!');window.location='dashboard.php';</script>";  
            }  
            
        }

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
    <link rel="stylesheet" href="input.css">
    <link rel="icon" href="./img/icon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
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
       <div class="wrapper">
           <h2>Tambah Data Film</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="judul" required="required">
                </div>
                <div class="form-group">
                    <label for="">Tahun</label>
                    <input type="text" name="tahun" required="required">
                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <input type="text" name="kategori" required="required">
                </div>
                <div class="form-group">
                    <label for="">Rating</label>
                    <input type="text" name="rating" required="required">
                </div>
                <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" name="gambar" required="required">
			    </div>			
                <br>
                <div class="form-group">
                    <button type="submit" name="submit" value="submit" class="btn">Tambah</button>
                </div>
            </form>
       </div>
   </section>

    <footer>
        <p>Copyright &copy; 2022 urfavmovies. All right reserved</p>
    </footer>
</body>
</html>

