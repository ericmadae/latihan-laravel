<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_guru = Guru::all();
        return view('guru.list-guru', [
            "list_guru" => $list_guru
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.form-add-guru');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // $only =  $request->only(["nama", "usia", "jenis_kelamin"]);
        // $exception = $request->except(['_token']);
        $validation = $request->validate([
            'nama' => 'required|string',
            'usia' => 'required|numeric',
            'jenis_kelamin' => Rule::in(['L', 'P'])
        ], [
            "nama.required" => "Nama harus diisi!",
            "usia.numeric" => "Usia harus angka!",
            "usia.required" => "Usia Harus di isi!",
            "jenis_kelamin.required" => "Jenis kelamin harus di pilih!"
        ]);
        
        // Guru::create($validation);

        Guru::create([
            "nama" => $request->nama,
            "usia" => $request->usia,
            "jenis_kelamin" => $request->jenis_kelamin
        ]);

        // Guru::insert($validation);

        // $guru = new Guru();
        // $guru->nama = $request->nama;
        // $guru->usia = $request->usia;
        // $guru->jenis_kelamin = $request->jenis_kelamin;
        // $guru->save();

        // return gettype($request);


        return redirect()->route('guru.index');
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
        $guru = Guru::find($id);
        // $guru_where = Guru::where('id', $id)->first();

        return view('guru.form-edit-guru', [
            "guru" => $guru
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'nama' => 'required|string',
            'usia' => 'required|numeric',
            'jenis_kelamin' => Rule::in(['L', 'P'])
        ], [
            "nama.required" => "Nama harus diisi!",
            "usia.numeric" => "Usia harus angka!",
            "usia.required" => "Usia Harus di isi!",
            "jenis_kelamin.required" => "Jenis kelamin harus di pilih!"
        ]);

        Guru::where('id', $id)->update([
            "nama" => $request->nama,
            "usia" => $request->usia,
            "jenis_kelamin" => $request->jenis_kelamin
        ]);

        return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Guru::where('id', $id)->delete();

        // Guru::destroy($id);

        return redirect()->route('guru.index');
    }
}
