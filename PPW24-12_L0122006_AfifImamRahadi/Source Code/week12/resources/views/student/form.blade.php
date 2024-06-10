<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title style="text-align: center;">Form Data Mahasiswa</title>
</head>
<body>
    <h1 class="my-4 mx-3">Form Data Mahasiswa</h1>
    <div class="container w-75 m-4 mx-5">
        <form method="POST" action={{ route('add-students')}}>
            @csrf
            <div>
                <div>
                    <label class="input-group-text w-25">Nama</label>
                </div>
                <div>
                    <input class="input-group-text w-25" type= "text" name="nama" size="30" placeholder="Masukkan nama anda" >
                </div>
            </div>

            <div>
                <div>
                    <label class="input-group-text w-25 mt-3">NIM</label>
                </div>
                <div>
                    <input class="input-group-text w-25" type="text" name="nim" size="30" placeholder="Masukkan nim anda"></input>
                </div>
            </div>

            <div>
                <div>
                    <label class="input-group-text w-25 mt-3">Prodi</label>
                </div>
                <div>
                    <input class="input-group-text w-25" type= "text" name="prodi" size="30" placeholder="Masukkan prodi anda">
                </div>
            </div>

            <div>
                <div>
                    <label class="input-group-text w-25 mt-3" >Kelas</label>
                </div>
                <div>
                    <input class="input-group-text w-25" type= "text" name="kelas" size="30" placeholder="Masukkan kelas anda ">
                </div>
            </div>

            <div>
                <div>
                    <label class="input-group-text w-25 mt-3" >Angkatan</label>
                </div>
                <div>
                    <input class="input-group-text w-25" type= "number" name="angkatan" size="30" placeholder="Masukkan angkatan anda ">
                </div>
            </div>

            <button name="submit" class="btn btn-primary w-20 mt-4">Tambah Data</button>
        </form>
    </div>
</body>
</html>
