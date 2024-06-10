<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title style="text-align: center;">Edit Form Data Mahasiswa</title>
</head>
<body>
    <h1 class="my-4 mx-3">Edit Form Data Mahasiswa</h1>
    <div id="mainContainer" class="container w-75 m-4 mx-5" >
        <form method="POST" action={{ route('students.update', $student -> id )}}>
            @csrf
            <div>
                <div>
                    <label class="input-group-text w-25">Nama</label>
                </div>
                <div>
                    <input class="input-group-text w-25" type= "text" name="nama" value="{{$student->nama}}" size="30" >
                </div>
            </div>

            <div>
                <div>
                    <label class="input-group-text w-25 mt-3">NIM</label>
                </div>
                <div>
                    <input class="input-group-text w-25" type="text" name="nim" value="{{$student->nim}}" size="30"></input>
                </div>
            </div>

            <div>
                <div>
                    <label class="input-group-text w-25 mt-3">Prodi</label>
                </div>    
                <div>
                    <input class="input-group-text w-25" type= "text" name="prodi" value="{{$student->prodi}}" size="30">
                </div>
            </div>

            <div>
                <div>
                    <label class="input-group-text w-25 mt-3" >Kelas</label>
                </div>    
                <div>
                    <input class="input-group-text w-25" type= "text" name="kelas" value="{{$student->kelas}}" size="30">
                </div>
            </div>

            <div>
                <div>
                    <label class="input-group-text w-25 mt-3" >Angkatan</label>
                </div>    
                <div>
                    <input class="input-group-text w-25" type= "number" name="angkatan" value="{{$student->angkatan}}" size="30">
                </div>
            </div>
        
            <button name="submit" class="btn btn-primary w-20 mt-4">Edit Data</button>
        </form>
    </div>
</body>
</html>
