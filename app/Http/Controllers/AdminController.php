<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index(Request $request){
        echo "<h3>Hi, " . Auth::user()->name . "</h3>";
        echo "<a href='logout'>Logout</a>";

        $data = Siswa::orderBy('nama', 'asc')->get();
        return view("index")->with('data', $data);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $request->validate([
            'nama'=>'required',
            'kelas'=>'required',
        
        ]);
        
        $data = [
            'nama'=>$request->nama,
            'kelas'=>$request->kelas,
        ];
        Siswa::create($data);

        return redirect()->to('admin');
    }

    public function edit($id){
        $data = Siswa::where('nama', $id)->first();
        return view('edit')->with('data', $data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama'=>'required',
            'kelas'=>'required',
        
        ]);
        
        $data = [
            'nama'=>$request->nama,
            'kelas'=>$request->kelas,
        ];
        Siswa::where('nama', $id)->update($data);
        return redirect()->to('admin')->with('Success', 'Berhasil edit data');
    }

    public function destroy($id){
        Siswa::where('nama', $id)->delete();
        return redirect()->to('admin')->with('Success','Berhasil melakukan delete data');
    }
}
