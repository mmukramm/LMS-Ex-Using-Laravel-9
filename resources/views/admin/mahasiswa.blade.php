@extends('template.layout')

@section('title', 'Mahasiswa')

@section('content')

    {{-- modal --}}
    <div class="modal_container">
        <div class="modal_form p-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-right">
                        <button class="btn btn-danger btn-sm modal_close_button" onclick="closeModal()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col modal_header d-flex justify-content-center">
                        <p class="h3 modal_title">Mahasiswa</p>
                    </div>
                </div>
                <hr>
                <div class="col">
                    <div class="modal_body d-flex justify-content-center">
                        <form action="/cms/mahasiswa/addmahasiswa" method="POST" id="modal_form">
                            @csrf
                            <input type="hidden" class="form-control for_inp" id="id" name="id"
                                placeholder="id" required>
                            <div class="form-group">
                                <div class="row text-center">
                                    <label for="nama" class="col">Nama</label>
                                    <input type="text" class="form-control for_inp" id="nama" name="nama_mahasiswa"
                                        placeholder="nama" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row text-center">
                                    <label for="angkatan" class="col">Angkatan</label>
                                    <select class="form-control" id="angkatan" name="angkatan">
                                        <option> Pilih Angkatan </option>
                                        @foreach ($tahunajarans as $tahunajaran)
                                            <option value="{{ $tahunajaran->tahun_ajaran }}"> {{ $tahunajaran->tahun_ajaran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row text-center">
                                    <label for="notelp" class="col">No Telepon</label>
                                    <input type="text" class="form-control for_inp" id="notelp" name="telp_mahasiswa"
                                        placeholder="no telpon" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row text-center">
                                    <label for="alamat" class="col">Alamat</label>
                                    <input type="text" class="form-control for_inp" id="alamat" name="alamat_mahasiswa"
                                        placeholder="alamat" required>
                                </div>
                            </div>
                            <div class="form-group" id="password_area">
                                <div class="row text-center">
                                    <label for="password" class="col" id="password_txt">Password</label>
                                    <input type="password" class="form-control for_inp" id="password" name="password_mahasiswa"
                                        placeholder="password" required>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center pt-2">
                                <button type="submit" class="btn btn-primary" id="submit_but">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal delete --}}
    <div class="modaldel_container">
        <div class="modaldel_form p-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-right">
                        <button class="btn btn-danger btn-sm modal_close_button" onclick="closeModal()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col modal_header d-flex justify-content-center">
                        <p class="h4 modal_title">Hapus Data Ini?</p>
                    </div>
                </div>
                <div class="col">
                    <div class="modal_body d-flex justify-content-center">
                        <form action="/cms/mahasiswa/deletemahasiswa" method="POST">
                            @csrf
                            <input type="hidden" class="form-control for_inp" id="id_delete" name="id"
                                placeholder="id" required>
                            <div class="form-group d-flex justify-content-center pt-2">
                                <button type="submit" class="btn-sm btn-danger" id="submit_but">Hapus Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <button class="btn btn-outline-dark">
                        <i class="fas fa-bars"></i>
                    </button>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link">
                    <button class="btn btn-outline-dark" onclick="openModal('mahasiswa')">
                        <i class="bi bi-person-add"></i>
                    </button>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main content -->
    <section class="content">
        <div class="container pt-4">
            {{-- Content --}}
            <div class="container">
                <h1><strong>Daftar Mahasiswa</strong></h1>
            </div>

            <div class="table_content">
                <div class="container">
                    <div class="table-responsive custom-table-responsive px-2">
                        <table class="table custom-table">
                            <thead>
                                <br>
                                <tr class="bg-dark head_table">
                                    <th scope="col">No</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No Telepon</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswas as $mahasiswa)
                                    <tr scope="row">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td> {{ $mahasiswa->noInduk }} </td>
                                        <td> {{ $mahasiswa->name }} </td>
                                        <td> {{ $mahasiswa->alamat }} </td>
                                        <td> {{ $mahasiswa->notelp }} </td>
                                        <td>
                                            <button type="button" class="btn btn-warning edit"
                                            onclick="showEditAlert('edit', {{ $loop->iteration - 1 }}, 'mahasiswa')"
                                            value="{{ $mahasiswa }}">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger delete"
                                            onclick="showDeleteAlert('delete', {{ $loop->iteration - 1 }})"
                                            value=" {{ $mahasiswa->id }} ">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="table_spacer">
                                        <td colspan="10"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
    <script type="text/javascript" src="{{ asset('dist/js/func.js') }}"></script>
@endsection
