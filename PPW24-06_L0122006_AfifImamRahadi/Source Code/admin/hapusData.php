<?php
    include "../connection.php";

    $nomor = $_GET['nm'];
    $sql = "DELETE FROM basket WHERE id = $nomor";

    $perintah = mysqli_query($connection, $sql);

    if($perintah)
    {
        echo "<script> 
                alert('Data Sukses Terhapus');
                window.location='tampilData.php';
            </script>";
    }
    
    else
    {
        echo "Data Gagal Terhapus";
    }
?>