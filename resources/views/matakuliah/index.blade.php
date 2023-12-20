@extends('layout.template')
       
@section('konten')

<!-- START DATA -->
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

        <!-- Pesan -->
        @if (Session::has('success'))
        <div class="pt-1">
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mt-2">
            <!-- FORM PENCARIAN -->
            <div class="pb-1">
                <form class="form-inline" action="{{ url('matakuliah') }}" method="get">
                    <div class="input-group">
                        <input class="form-control" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                        <button class="btn btn-secondary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        
            <!-- Profile Name on the right -->
            <div class="pb-1">
                <span class="navbar-text text-white">
                    <a href="{{ url('matakuliah/create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </span>
            </div>
        </div>
        
        
        
        
        
        
    
  
        <table class="table table-striped table-bordered">
            <thead class="bg-warning">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Matakuliah</th>
                    <th scope="col">Nama Matakuliah</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            
            <tbody>
                <?php $i = $data->firstItem() ?>
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>{{ $item->id_matakuliah }}</td>
                    <td>{{ $item->nama_matakuliah }}</td>
                    <td>{{ $item->sks }}</td>
                    <td>{{ $item->semester }}</td>
                    <td>
                        <a href='{{ url('matakuliah/'.$item->id_matakuliah.'/edit') }}' class="btn btn-primary btn-sm">
                             Edit
                        </a>
                        
                        <form onsubmit="return confirm('Yakin akan menghapus data ?')" class="d-inline" action="{{ url('matakuliah/'.$item->id_matakuliah) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm d-inline">
                                 Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
        
       {{ $data->links()  }}
  </div>
</div>
  <!-- AKHIR DATA -->
@endsection        
       
    
