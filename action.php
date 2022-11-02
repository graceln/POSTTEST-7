<?php
include 'connection.php';
$output = '';

if(isset($_POST['input'])){
    $keyword = $_POST['input'];
    $stmt = $connection->prepare("SELECT * FROM movie WHERE judul LIKE CONCAT('%',?,'%')");
    // $stmt->bind_param("ss", $keyword, $keyword);
}else {
    $stmt = $connection->prepare("SELECT * FROM movie");
} 
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows>0){
    $output = "<thead>
                <th>NO</th>
                <th>Judul</th>
                <th>Tahun</th>
                <th>Kategori</th>
                <th>Rating</th>
            </thead>
            <tbody>";
            $no = 1;
            while($d = $result->fetch_assoc()){ 
                $output .="
                <tr>
                    <td>".$d['id']."</td>
                    <td>".$d['judul']."</td>
                    <td>".$d['tahun']."</td>
                    <td>".$d['kategori']."</td>
                    <td>".$d['rating']."</td>
                </tr>";
            }
            $output .="</tbody>";
            echo $output;
        } else {
            echo "<h3>No records found</h3>";
        }

?>