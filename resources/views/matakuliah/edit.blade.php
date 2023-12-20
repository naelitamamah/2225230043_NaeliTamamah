@extends('layout.template')
<!-- START FORM -->
@section('konten')

<div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100%;">
    <div class="my-3 p-3" style="background-color: #ffffff; border-radius: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) ; width: 80%;">

        <nav class="navbar navbar-expand-lg navbar-light bg-warning mb-2 rounded">
            <div class="container">
              <!-- Left-aligned items -->
              <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    Daftar Matakuliah <i class="fas fa-book"></i>
                  </a>
              </div>
          
              <!-- Right-aligned items -->
              <div class="navbar-collapse justify-content-between">
                <!-- Navbar items on the right -->
                <ul class="navbar-nav">
                  <li class="nav-item">
                    
                  </li>
                  <li class="nav-item">
                    
                  </li>
                </ul>                                  
              </div>
            </div>
          </nav>

        <form action='{{ url('matakuliah/'.$data->id_matakuliah) }}' method='post'>
            @csrf
            @method('PUT')
            <div class="my-3 p-1 bg-body rounded shadow-sm">
                <h3 class="mb-4">Edit Data Matakuliah</h3>
                <div class="mb-3 row">
                    <label for="id_matakuliah" class="col-sm-2 col-form-label">Kode Matakuliah</label>
                    <div class="col-sm-10">
                    {{ $data->id_matakuliah }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama_matakuliah" class="col-sm-2 col-form-label">Nama Matakuliah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nama_matakuliah' value="{{ $data->nama_matakuliah }}" id="nama_matakuliah">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="sks" class="col-sm-2 col-form-label">SKS</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='sks' value="{{ $data->sks }}" id="sks">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='semester' value="{{ $data->semester }}" id="semester">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="semester" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary" name="submit">
                            <i class="fas fa-save"></i> SIMPAN
                        </button>
                        <a href="{{ url('matakuliah') }}" class="btn btn-warning">
                            Kembali <i class="fas fa-home fa-arrow-left"></i> 
                        </a>
                    </div>
                </div>

            </div>
        </form>
        <!-- AKHIR FORM -->
    </div>
</div>

@endsection