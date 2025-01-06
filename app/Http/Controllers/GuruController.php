<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.created');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'guru'=>'required',
            'kelas'=>'required',
        
        ]);
        
        $data2 = [
            'guru'=>$request->guru,
            'kelas'=>$request->kelas,
        ];
        Guru::create($data2);

        return redirect()->to('admin');
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
        $data2 = Guru::where('guru', $id)->first();
        return view('guru.edited')->with('data2', $data2);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'guru'=>'required',
            'kelas'=>'required',
        
        ]);
        
        $data2 = [
            'guru'=>$request->guru,
            'kelas'=>$request->kelas,
        ];
        Guru::where('guru', $id)->update($data2);
        return redirect()->to('admin')->with('Success', 'Berhasil edit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Guru::where('guru', $id)->delete();
        return redirect()->to('admin')->with('Success','Berhasil melakukan delete data');
    }
}
