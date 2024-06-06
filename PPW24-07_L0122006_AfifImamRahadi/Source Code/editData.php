<?php
    include "connection.php";
    if ($connection->connect_error) {
        die("Connection error: " . $connection->connect_error);
    }
    $nomor=$_GET['nama_tim'];

    $sql = "SELECT * FROM data_team WHERE id=$nomor";
    $perintah = $connection->query($sql);
    $baris = mysqli_fetch_array($perintah);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form Pendataan Team</title>
</head>
<body>
    <pre>
        <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $baris['id']; ?>">
            <label>Nama Team</label>
            <input type="text" class="input-group-text w-25" name="nama_team" value="<?php echo $baris['nama_tim'];?>">
            <label>Captain Team</label>
            <input type="text" name="captain" value="<?php echo $baris['captain'];?>">
            <label>Asal Daerah</label>
            <input type="text" name="asal" value="<?php echo $baris['asal']; ?>">
            <label>Umur</label>
            <input type="number" name="umur" value="<?php echo $baris['umur']; ?>">
            <label>Gambar</label>
            <img src = "
                <?php 
                    echo $baris['gambar'];
                ?>" width = '150px'
            >
            <input type="checkbox" name="gambar_ganti" value="<?php echo $baris['gambar']; ?>" readonly> Ceklis Jika Ganti Gambar
            <input type="file" name="gambar">

            <input type="submit" name="submit" value="Edit">
        </form>
    </pre>

    <?php
        include "connection.php";

        if(isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $nama_team = $_POST['nama_team'];
            $captain_team = $_POST['captain'];
            $asal = $_POST['asal'];
            $umur = $_POST['umur'];

            if(isset($_POST['gambar_ganti']))
            {
                $gbr = $_FILES['gambar']['name'];
                $file_tmp = $_FILES['gambar']['tmp_name'];

                move_uploaded_file($file_tmp, 'gambar/'.$gbr);
                $sql = "UPDATE data_team SET nama_tim = '$nama_team', captain = '$captain_team', asal = '$asal', umur = '$umur', gambar = 'gambar/$gbr' WHERE id = $id";

                $perintah = $connection->query($sql);
                
                if($perintah)
                {
                    echo "Data Sukses terinput";
                    header("location:index.php");
                }
            
                else
                {
                    echo "Data Gagal teriput";
                }
            }

            else
            {
                $sql = "UPDATE data_team SET nama_tim = '$nama_team', captain = '$captain_team', asal = '$asal', umur = '$umur' WHERE id = $id";

                $perintah = $connection->query($sql);
                
                if($perintah)
                {
                    echo "Data Sukses terinput";
                    header("location:index.php");
                }
            
                else
                {
                    echo "Data Gagal teriput";
                }
            }
        }
    ?>
</body>
</html>