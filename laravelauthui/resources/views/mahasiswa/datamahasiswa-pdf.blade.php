<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Data Mahasiswa</h1>

<table id="customers">
  <tr>
    <th>NO</th>
    <th>NIM</th>
    <th>NAMA</th>
    <th>JURUSAN</th>
    <th>SEMESTER</th>
    <th>DIBUAT</th>
  </tr>
  @php
      $no=1;
  @endphp
  @foreach ($data as $row)
  <tr>
    <th scope="row">{{ $no++ }}</th>
    <th>{{ $row->nim }}</th>
    <th>{{ $row->nama }}</th>
    <th>{{ $row->jurusan }}</th>
    <th>{{ $row->semester }}</th>
    <th>{{ $row->created_at}}</th>
  </th>
  @endforeach
    
</table>

</body>
</html>


