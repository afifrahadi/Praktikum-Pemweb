<?php
    include "connection.php";
    if ($connection->connect_error) {
        die("Connection error: " . $connection->connect_error);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style type="text/css">
        .container
        {
            width: 100%;
            margin: auto;
        }
        body
        {
            margin: 8px;
            padding: 10px;
        }

        .tambah-data{
            width: 130px;
            margin-left: 187px;
        }
    </style>
</head>
<body>
    <div class="container">

        <h2 class="my-4" style="text-align:center;">Data Pendaftar Team</h2>
        <table class="table table-striped table-bordered">
            <tr bgcolor = "beige" align="center">
                <th>No</th>
                <th>Nama Team</th>
                <th>Captain Team</th>
                <th>Asal Daerah</th>
                <th>Umur</th>
                <th>Gambar Team</th>
                <th>Aksi</th>
            </tr>
    
            <?php
            $nomor = 1;
            $sql = "SELECT * FROM data_team";
            $result = $connection->query($sql);

            while($baris = mysqli_fetch_array($result))
            {
                echo "<tr align=center bgcolor = #FFDAB9>
                        <td>$nomor</td>
                        <td>$baris[nama_tim]</td>
                        <td>$baris[captain]</td>
                        <td>$baris[asal]</td>
                        <td>$baris[umur]</td>
                        <td><img src = '$baris[gambar]' width='150px'></td>
                        <td>
                            <a href=hapusData.php?nama_tim=$baris[id] onClick=\"return confirm('Apakah Team dengan nama : $baris[nama_tim] ingin dihapus?')\">
                                Hapus</a> |
                            <a href=editData.php?nama_tim=$baris[id]>
                                Edit</a>
                        </td>
                    </tr>";
                $nomor++;
            }
    
            ?>
        </table>
    </div>

    <div>
        <a href="tambahData.php">
            <button class="tambah-data btn btn-primary w-20">Tambah Data</button>
        </a>
    </div>
</body>
</html>