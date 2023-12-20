<?php

namespace App\Http\Controllers;

use App\Models\matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class matakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = matakuliah::where('id_matakuliah', 'like', "%$katakunci%")
                ->orWhere('nama_matakuliah', 'like', "%$katakunci%")
                ->orWhere('sks', 'like', "%$katakunci%")
                ->orWhere('semester', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = matakuliah::orderBy('id_matakuliah', 'desc')->paginate($jumlahbaris);
        }
        return view('matakuliah.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_matakuliah', $request->id_matakuliah);
        Session::flash('nama_matakuliah', $request->nama_matakuliah);
        Session::flash('sks', $request->sks);
        Session::flash('semester', $request->semester);

        $request->validate([
            'id_matakuliah' => 'required|numeric|unique:matakuliah,id_matakuliah',
            'nama_matakuliah' => 'required',
            'sks' => 'required',
            'semester' => 'required',
        ]);
        $data = [
            'id_matakuliah' => $request->id_matakuliah,
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ];
        matakuliah::create($data);
        return redirect()->to('matakuliah')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = matakuliah::where('id_matakuliah', $id)->first();
        return view('matakuliah.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_matakuliah' => 'required',
            'sks' => 'required',
            'semester' => 'required',
        ], [
            'nama_matakuliah.required' => 'Nama matakuliah wajib diisi',
            'sks.required' => 'Sks wajib diisi',
            'semester.required' => 'Semester wajib diisi',
        ]);
        $data = [
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ];
        matakuliah::where('id_matakuliah', $id)->update($data);
        return redirect()->to('matakuliah')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        matakuliah::where('id_matakuliah', $id)->delete();
        return redirect()->to('matakuliah')->with('success', 'Berhasil melakukan delete data');
    }
}
