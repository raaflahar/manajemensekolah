@extends('layouts.template')

@section('konten')
@if ($errors->any())
<div class="pt-3">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{$item}}</li>
            @endforeach
        </ul>
    </div>
</div>
    
@endif
<form action='{{ url('kelas') }}' method='POST'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3">
                <label for="kelas" class="form-label">Nama Kelas</label>
                <input type="number" class="form-control" id="kelas" name="kelas">
            </div>
            <div class="mb-3 row">
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
    </div>
</form>

@endsection
    