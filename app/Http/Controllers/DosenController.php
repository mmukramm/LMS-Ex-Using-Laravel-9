<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens = User::where('role', '1')->get();
        return view('admin.dosen', [
            'title' => 'Dosen',
            'dosens' => $dosens
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_dosen' => 'required',
            'nomorInduk_dosen' => 'required|unique:users,noInduk',
            'telp_dosen' => 'required',
            'alamat_dosen' => 'required',
            'password_dosen' => 'required'
        ]);
        $data['password_dosen'] = bcrypt($data['password_dosen']);
        $data['role'] = '1';
        $dosen = new User;
        $dosen->name = $data['nama_dosen'];
        $dosen->noInduk = $data['nomorInduk_dosen'];
        $dosen->alamat = $data['alamat_dosen'];
        $dosen->notelp = $data['telp_dosen'];
        $dosen->role = $data['role'];
        $dosen->password = $data['password_dosen'];
        $dosen->save();
        return redirect()->back()->with('success', 'Data Dosen Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'nama_dosen' => 'required',
            'nomorInduk_dosen' => 'required',
            'telp_dosen' => 'required',
            'alamat_dosen' => 'required',
        ]);
        $dosen = User::find($request->id);
        $dosen->name = $data['nama_dosen'];
        $dosen->noInduk = $data['nomorInduk_dosen'];
        $dosen->alamat = $data['alamat_dosen'];
        $dosen->notelp = $data['telp_dosen'];
        $dosen->save();
        return redirect()->back()->with('success', 'Data Dosen Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $dosen = User::find($request->id);
        $dosen->delete();
        return redirect()->back()->with('success', 'Data Dosen Berhasil Dihapus');
    }
}
