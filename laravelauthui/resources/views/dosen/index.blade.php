<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD LARAVEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
    <h1 class="text-center mb-3">DATA MAHASISWA</h1>
    <a href="{{ route('mahasiswa.tambah') }}" class="btn btn-primary mb-3">Tambah Data +</a>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>JURUSAN</th>
                    <th>SEMESTER</th>
                    <th>AKSI</th>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                    <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <th>{{ $row->nim }}</th>
                        <th>{{ $row->nama }}</th>
                        <th>{{ $row->jurusan }}</th>
                        <th>{{ $row->semester }}</th>
                        <td>
                            <a href="" class="btn btn-success btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm">Hapus</button>
                            <button class="btn btn-info btn-sm">Show</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </div>
  </body>
</html>