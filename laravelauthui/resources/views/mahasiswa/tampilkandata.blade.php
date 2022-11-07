<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD LARAVEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mb-3">EDIT DATA MAHASISWA</h1>
    <div class="container"> 
        <div class="row d-flex justify-content-center">
            <div class="card col-8">
              <div class="col">
                <div class="body">
                     <form action="/updatedata/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                      @method('PUT')
                      @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                          <input type="text" name="nama" class="form-control" id="namalengkap" aria-describedby="namalengkap" value="{{ $data->namalengkap }}">
                        </div>
                        <div class="mb-3">
                          <label for="nim" class="form-label">Nomer Induk Mahasiswa</label>
                          <input type="text" name="nim" class="form-control" id="nim" aria-describedby="nim" value="{{ $data->nim }}">
                        </div>
                        <div class="mb-3">
                          <label for="jurusan" class="form-label">Jurusan</label>
                          <input type="text" name="jurusan" class="form-control" id="jurusan" aria-describedby="jurusan" value="{{ $data->jurusan }}">
                        </div>
                        <div class="mb-3">
                          <label for="Semester" class="form-label">Semester</label>
                          <input type="text" name="semester" class="form-control" id="semester" aria-describedby="semester" value="{{ $data->semester }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
