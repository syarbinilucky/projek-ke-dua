<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD LARAVEL</title>
    {{-- bootsrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> --}}
  {{--css  toastr --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
  <body>
  <div class="container">
    <h1 class="text-center mb-3">DATA MAHASISWA</h1>
    <a href="{{ route('mahasiswa.tambah') }}" class="btn btn-primary mb-3">Tambah Data +</a>
    <div class="row g-3 align-items-center mb-1">
        <div class="col-auto">
            <form action="mahasiswa" method="GET">
          <input type="search" id="seacrh" name="search" class="form-control" aria-describedby="search">
            </form>
        </div>
        <div class="col-auto ">
        <a href="/exportpdf" class="btn btn-info mb-3">Export PDF</a>
        </div>
        <div class="col-auto ">
            <a href="/exportexcel" class="btn btn-success mb-3">Export Excel</a>
        </div>
        {{-- modal import excel --}}
        <!-- Button trigger modal -->
    <div class="col-auto mb-3 ">
     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalimport">import excel</button>
    </div>
        <!-- Modal -->
        <div class="modal fade" id="modalimport" tabindex="-1" aria-labelledby="modalimport" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalimport">Pilih File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <form action="/importexcel" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                    <input type="file" name="file" required>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Impor Data</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        {{-- end modal --}}


    </div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>JURUSAN</th>
                    <th>SEMESTER</th>
                    <th>DIBUAT</th>
                    <th>AKSI</th>
                </thead>
                <tbody>
                    @php
                        $no =1;
                    @endphp
                    @foreach ($data as $index => $row)
                    <tr>
                        <th scope="row">{{ $index + $data->firstItem()}}</th>
                        <th>{{ $row->nim }}</th>
                        <th>{{ $row->nama }}</th>
                        <th>{{ $row->jurusan }}</th>
                        <th>{{ $row->semester }}</th>
                        {{-- <th>{{ $row->created_at->format('D M Y')}}</th> --}}
                        <th>{{ $row->created_at}}</th>
                        <td>
                            <a href="/tampilkandata/{{ $row->id }}" class="btn btn-success btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger delete btn-sm" data-id= "{{ $row->id }}" data-nama="{{ $row->nama }}">Hapus</a>
                            {{-- <button class="btn btn-info btn-sm">Show</button> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- paginations --}}
            {{ $data->links() }}
            {{-- paginations --}}
        </div>
    </div>
  </div>

  {{-- jquery alert --}}
  {{-- <script>
    src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
  integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA="
  crossorigin="anonymous"></script>  --}}
{{-- script alert --}}
{{-- jquery toastr --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
{{-- end jquery toastr --}}
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  {{-- script toastr --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
  <script>
   $('.delete').click(function(){ 
    alert('1')
    var mahasiswaid =$(this).attr('data-id');
    var nama =$(this).attr('data-nama');
            swal({
                title: "Yakin?",
                text: "Kamu Akan Menghapus Data Dengan Nama "+nama+"",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                window.location = "/delete/"+mahasiswaid+""
                swal("Data Berhasil Dihapus", {
                    icon: "success",
                });
                } else {
                swal("Data Tidak Jadi Dihapus");
                }
            });
   });

   @if (Session::has('success'))
       toastr.success("{{ Session::get('success') }}")
    @endif
 </script>
    
 </html>



