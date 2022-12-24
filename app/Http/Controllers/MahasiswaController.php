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
        $tahunajarans = TahunAjaran::all()->sortBy('tahun_ajaran');
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
            'angkatan' => 'required|integer',
            'telp_mahasiswa' => 'required',
            'alamat_mahasiswa' => 'required',
            'password_mahasiswa' => 'required'
        ]);
        $data['password'] = bcrypt($data['password_mahasiswa']);

        $tahun_tmp = substr($data['angkatan'], Str::length($data['angkatan']) - 2);
        // dd($tahun_tmp);
        $cmahasiswa = User::where([
                                ['role', '=', '2'],
                                ['noInduk', 'LIKE', "H071{$tahun_tmp}1%"]
                            ])->count();
        // $cmahasiswa = User::where('role', '2')->count();
        // $cmahasiswa = User::where('role', '2')->count();
        // dd($cmahasiswa);

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
        $mahasiswa = User::find($request->id);
        $mahasiswa->delete();
        return redirect()->back()->with('success', 'Data Dosen Berhasil Dihapus');
    }
}
