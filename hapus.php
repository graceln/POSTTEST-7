<?php 
include 'connection.php';
$id = $_GET['id'];
$query = "DELETE FROM movie WHERE id='$id'";
$result = mysqli_query($connection, $query);
 
if(!$result) {
    die("Query Error : ".mysqli_errno($connection)." - ".mysqli_error($connection));
}else{
    echo "<script>alert('Data berhasil dihapus!');window.location='dashboard.php';</script>";  
}     
?>