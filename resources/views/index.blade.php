@extends('layouts.template')
@section('konten')
    
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">
          <a href='admin/create' class="btn btn-primary">+ Tambah Data Siswa</a>
          <a href='admin/created' class="btn btn-primary">+ Tambah Data Guru</a>
        </div>

        <h1>Daftar Siswa</h1>
        <div class="pb-3">
            <form class="d-flex" action=" {{ url('admin') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kelas" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Filter</button>
            </form>
        </div>
  
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-3">Nama</th>
                    <th class="col-md-4">Kelas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->kelas}}</td>
                    <td>
                        <a href='{{ url('siswa/'.$item->nama.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Yakin untuk menghapus data?')" class="d-inline" action="{{ url('siswa'.$item->nama) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h1>Daftar Guru</h1>
        <div class="pb-3">
            <form class="d-flex" action="{{ url('admin') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunciguru" value="{{ Request::get('katakunciguru') }}" placeholder="Masukkan kelas" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Filter</button>
            </form>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-3">Nama Guru</th>
                    <th class="col-md-4">Kelas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data2 as $item)
                <tr>
                    <td>{{$item->guru}}</td>
                    <td>{{$item->kelas}}</td>
                    <td>
                        <a href='{{ url('guru/'.$item->guru.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Yakin untuk menghapus data?')" class="d-inline" action="{{ url('guru'.$item->guru) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
@endsection
    