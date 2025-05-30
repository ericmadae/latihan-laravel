<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{

    public function index()
    {
        $list_siswa = Siswa::all();

        return view('siswa-database', ["list_siswa" => $list_siswa]);
    }

    public function info($id)
    {
        $siswa = Siswa::where('id', $id)->first();
        return view('siswa-info', ["siswa" => $siswa]);
    }

    public function formAdd() {
        return view('form-siswa', ["edit" => false]);
    }

    public function store(Request $request) {
        $siswa = $request->all();
        Siswa::create($siswa);
        return redirect()->intended('/siswa-controller');
    }

    public function edit($id) {
        $siswa = Siswa::where('id', operator: $id)->first(); // SELECT FROM siswa where id = $id limit 1
        // return $siswa;
        return view('form-siswa', ["edit" => true, "siswa" => $siswa]);
    }
    public function update(Request $request, $id) {
        $siswa = $request->except(['_token', '_method']);
        $cek = Siswa::where('id', $id)->update($siswa);

        if ($cek) {
            return redirect()->intended('/siswa-controller');
        }else{
            return back();
        }
    }

    public function destroy($id) {
        $cek = Siswa::where('id', $id)->delete();
        return back();
    }

}
