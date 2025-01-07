<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    function index(Request $request){
        echo "<h3>Hi, " . Auth::user()->name . "</h3>";
        echo "<a href='logout'>Logout</a>";
        
        $katakunci = $request->katakunci;
        $katakunciguru = $request->katakunciguru;

        if (strlen( $katakunci )) {
            $data = Siswa::where('kelas', 'like', "%$katakunci%")->orderBy('nama', 'asc')->get();
        } else {
            $data = Siswa::orderBy('nama', 'asc')->get();
        }

        if (strlen( $katakunciguru )) {
            $data2 = Guru::where('kelas', 'like', "%$katakunciguru%")->orderBy('nama', 'asc')->get();
        } else {
            $data2 = Guru::orderBy('guru', 'asc')->get();
        }

        $data3 = Kelas::orderBy('kelas', 'asc')->get();

        $query = Kelas::with(['siswa', 'guru']);

        if (!empty($katakunci)) {
            $query->where('kelas', 'like', "%$katakunci%");
        }

        $data4 = $query->get();

        return view("index", [
            'data'=>$data,
            'data2'=>$data2,
            'data3'=>$data3,
            'data4'=>$data4
        ]);
    }
}
