<?php  
include 'conn.php';


$id = $_GET['id'];

$query = "DELETE FROM user Where IDuser = $id";
$conn-> query($query);
$affected = $conn->affected_rows;

if ($affected>0) {
    echo"
        <script>
            alert('Data berhasil Dihapus!');
            document.location.href = 'admin.php';
        </script>            ";
}else {
    echo"
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'admin.php';
        </script>
        ";
}



?>