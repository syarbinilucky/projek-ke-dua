<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\MahasiswaExport;
use App\Imports\mahasiswaImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class mahasiswacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->has('search')) {
            $data = Mahasiswa::where('nama', 'LIKE' . '%' . $request->search . '%')->paginate(5);
        } else
            $data = Mahasiswa::paginate(5);

        $data = mahasiswa::paginate(5);
        // dd($data);
        return view('mahasiswa.data', compact('data'));
    }

    public function tambahmahasiswa()
    {
        return view('mahasiswa.tambah');
    }

    public function insertdata(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'jurusan' => 'required|string',
            'semester' => 'required|integer'
        ]);
        Mahasiswa::create($data);
        return redirect()->route('mahasiswa.index')->with('success', 'data data berhasil ditambahkan');
    }
    public function tampilkandata($id)
    {
        $data = Mahasiswa::find($id);
        // dd($data);
        return view('mahasiswa.tampilkandata', compact('data'));
    }
    public function updatedata(Request $request, $id)
    {
        $data = Mahasiswa::find($id);
        $data->update($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'data data berhasil diupdate');
    }
    public function delete($id)
    {
        $data = Mahasiswa::find($id);
        $data->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'data data berhasil dihapus');
    }
    public function exportpdf()
    {
        $data = Mahasiswa::all();
        view()->share('data', $data);
        $pdf = Pdf::loadview('mahasiswa.datamahasiswa-pdf', ['data' => $data]);
        return $pdf->download('data.pdf');
        // return 'berhasil;';

    }
    public function exportexcel()
    {
        return Excel::download(new MahasiswaExport, 'datamahasiswa.xlsx');
    }
    public function importexcel(Request $request)
    {
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        $data->move('mahasiswadata', $namafile);
        excel::import(new mahasiswaImport, \public_path('/mahasiswadata/' . $namafile));
        return \redirect()->back();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
