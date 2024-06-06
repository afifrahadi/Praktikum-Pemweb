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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title style="text-align: center;">Formulir Berita Basket</title>
</head>
<body>
    <h1 class="my-4 mx-3">Formulir Pendataan Team</h1>
    <div id="mainContainer" class="container w-75 m-4 mx-5" >
        <form method="post" enctype="multipart/form-data">
            <div>
                <div>
                    <label class="input-group-text w-25">Nama Tim</label>
                </div>
                <div>
                    <input class="input-group-text w-25" type= "text" name="nama_team" size="30" placeholder="Masukkan nama tim anda" >
                </div>
            </div>

            <div>
                <div>
                    <label class="input-group-text w-25 mt-3">Captain Team</label>
                </div>
                <div>
                    <input class="input-group-text w-25" type="text" name="captain" size="30" placeholder="Masukkan captain team anda"></input>
                </div>
            </div>

            <div>
                <div>
                    <label class="input-group-text w-25 mt-3">Asal Daerah</label>
                </div>    
                <div>
                    <input class="input-group-text w-25" type= "text" name="asal" size="30" placeholder="Masukkan asal daerah">
                </div>
            </div>

            <div>
                <div>
                    <label class="input-group-text w-25 mt-3" >Umur</label>
                </div>    
                <div>
                    <input class="input-group-text w-25" type= "number" name="umur" size="30" placeholder="Masukkan Umur ">
                </div>
            </div>

            <div>
                <div>
                    <label class="input-group-text w-25 mt-3" >Upload Gambar</label>
                </div>
                <div>
                    <input class="input-group-text w-25" type="file" name="gambar">
                </div>
            </div>
        
            <button name="submit" class="btn btn-primary w-20 mt-4">Tambah Data</button>
        </form>
    </div>
</body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        $nm_team = $_POST['nama_team'];
        $captain_team = $_POST['captain'];
        $asal_daerah = $_POST['asal'];
        $umur = $_POST['umur'];
        $gambar = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'];

        if($nm_team == '')
        {
            echo "
            <script>
            alert('Nama Team Tidak Boleh Kosong');
            </script>";
        }

        elseif(!preg_match("/^[a-zA-Z ]*$/", $captain_team))
        {
            echo "
            <script>
            alert('Captain Team Tidak Boleh Mengandung Angka');
            </script>";
        }

        else
        {
            if(!empty($gambar))
            {
                move_uploaded_file($file_tmp, 'gambar/'.$gambar);
                $sql = "INSERT INTO data_team VALUES ('', '$nm_team', '$captain_team', '$asal_daerah', '$umur', 'gambar/$gambar')";

                $perintah = mysqli_query($connection, $sql);
                
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
                echo "Belum menginputkan file gambar";
            }
        }
    }
?>
