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

        <h2 class="my-4" style="text-align:center;">Data Mahasiswa</h2>
        <table class="table table-striped table-bordered">
            <tr bgcolor = "beige" align="center">
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Podi</th>
                <th>Kelas</th>
                <th>Angkatan</th>
                <th>Aksi</th>
            </tr>

            @foreach ($students as $index => $student)
            <tr align=center bgcolor = #FFDAB9>
                <th>{{$index + 1}}</th>
                <td>{{$student->nama}}</td>
                <td>{{$student->nim}}</td>
                <td>{{$student->prodi}}</td>
                <td>{{$student->kelas}}</td>
                <td>{{$student->angkatan}}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm">
                        <a href="students/edit/{{$student->id}}" class="text-light text-decoration-none">
                            Edit
                        </a>
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" onclick="return confirm('Hapus data atas nama {{$student->nama}}?')" >
                        <a href="students/delete/{{$student->id}}" class="text-light text-decoration-none" >
                            Delete
                        </a>
                    </button>
                </td>
            </tr>
            @endforeach
        </table>

        <div>
            <button type="button" class="btn btn-primary btn-sm my-2">
                <a href="/students/form" class="text-light" style="text-decoration: none;">
                    Tambah Data
                </a>
            </button>
            <button type="button" class="btn btn-primary btn-sm my-2">
                <a href="../" class="text-light" style="text-decoration: none;">
                    Home
                </a>
            </button>
        </div>
    </div>

</body>
</html>
