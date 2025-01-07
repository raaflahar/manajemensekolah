<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
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
        return view('kelas.creates');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required|numeric|unique:kelas,kelas',
        ], [
            'kelas.numeric' => 'Kelas harus berupa angka',
            'kelas.unique' => 'Kelas yang diisikan sudah ada dalam Database'
        ]);

        $data3 = ['kelas' => $request->kelas];
        
        Kelas::create($data3);
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
        $data3 = Kelas::where('kelas', $id)->first();
        return view('kelas.edites')->with('data3', $data3);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kelas' => 'required|numeric|unique:kelas,kelas',
        ], [
            'kelas.numeric' => 'Kelas harus berupa angka',
            'kelas.unique' => 'Kelas yang diisikan sudah ada dalam Database'
        ]);
        
        $data3 = ['kelas' => $request->kelas];

        Kelas::where('kelas', $id)->update($data3);
        return redirect()->to('admin')->with('Success', 'Berhasil edit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kelas::where('kelas', $id)->delete();
        return redirect()->to('admin')->with('Success','Berhasil melakukan delete data');
    }
}
