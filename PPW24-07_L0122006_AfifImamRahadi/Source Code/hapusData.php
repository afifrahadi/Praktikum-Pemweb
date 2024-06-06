<?php
    include "connection.php";

    $nomor = $_GET['nama_tim'];
    $query = "DELETE FROM data_team WHERE id=$nomor";
    $connection->query($query);

    if($query)
    {
        echo "<script> 
                alert('Data Berhasil Terhapus');
                window.location='index.php';
            </script>";
    }
    
    else
    {
        echo "Data Gagal Terhapus";
    }
?>