<?php

namespace App\Http\Controllers;

use App\Models\MasterKelas;
use Illuminate\Http\Request;

class MasterKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_kelas = MasterKelas::latest()->get();// SELECT*FROM master_kelas ORDER BY updated_at
        return view('master_kelas', ['list_kelas' => $list_kelas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form-master-kelas', ["edit" => false]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kelas = $request->only(['nama']);

        $cek = MasterKelas::create($kelas);

        if ($cek) {
            return \redirect()->route('kelas.index');
        }

        return back();
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
        $kelas = MasterKelas::find($id);
        return view('form-master-kelas', ["edit" => true, "kelas" => $kelas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kelas = $request->only(['nama']);
        $cek = MasterKelas::where('id', $id)->update($kelas);
        if ($cek) {
            return \redirect()->route('kelas.index');
        }

        return \back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MasterKelas::destroy($id);

        return \back();
    }
}
