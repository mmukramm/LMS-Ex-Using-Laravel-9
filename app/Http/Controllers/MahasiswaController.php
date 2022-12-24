<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TahunAjaran;
use Illuminate\Support\Str;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahunajarans = TahunAjaran::all();
        $mahasiswas = User::where('role', '2')->get();
        return view('admin.mahasiswa', [
            'title' => 'Mahasiswa',
            'tahunajarans' => $tahunajarans,
            'mahasiswas' => $mahasiswas
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
            'nama_mahasiswa' => 'required',
            'angkatan' => 'required',
            'telp_mahasiswa' => 'required',
            'alamat_mahasiswa' => 'required',
            'password_mahasiswa' => 'required'
        ]);

        $cmahasiswa = User::where('role', '2')->count();
        $data['password'] = bcrypt($data['password_mahasiswa']);

        $tahun_tmp = substr($data['angkatan'], Str::length($data['angkatan']) - 2);
        $mahasiswa = new User;
        $mahasiswa->name = $data['nama_mahasiswa'];
        $mahasiswa->noInduk = 'H071'. $tahun_tmp . '1' . sprintf("%03d", $cmahasiswa + 1);
        $mahasiswa->alamat = $data['alamat_mahasiswa'];
        $mahasiswa->notelp = $data['telp_mahasiswa'];
        $mahasiswa->password = $data['password'];
        $mahasiswa->role = '2';
        $mahasiswa->save();

        return redirect()->back()->with('success', 'Data Mahasiswa Berhasil Ditambahkan');

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
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
