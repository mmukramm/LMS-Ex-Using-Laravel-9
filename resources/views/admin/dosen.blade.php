@extends('template.layout')

@section('title', 'Dosen')

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
                        <p class="h3 modal_title">Tambah Dosen</p>
                    </div>
                </div>
                <hr>
                <div class="col">
                    <div class="modal_body d-flex justify-content-center">
                        <form action="/cms/dosen/adddosen" method="POST" id="modal_form">
                            @csrf
                            <input type="hidden" class="form-control for_inp" id="id" name="id"
                                placeholder="id" required>
                            <div class="form-group">
                                <div class="row text-center">
                                    <label for="nama" class="col">Nama</label>
                                    <input type="text" class="form-control for_inp" id="nama" name="nama_dosen"
                                        placeholder="nama" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row text-center">
                                    <label for="nomorInduk" class="col">NIP</label>
                                    <input type="text" class="form-control for_inp" id="nomorInduk"
                                        name="nomorInduk_dosen" placeholder="NIP" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row text-center">
                                    <label for="notelp" class="col">No Telepon</label>
                                    <input type="text" class="form-control for_inp" id="notelp" name="telp_dosen"
                                        placeholder="no telpon" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row text-center">
                                    <label for="alamat" class="col">Alamat</label>
                                    <input type="text" class="form-control for_inp" id="alamat_dosen" name="alamat_dosen"
                                        placeholder="alamat" required>
                                </div>
                            </div>
                            <div class="form-group" id="password_area">
                                <div class="row text-center">
                                    <label for="password" class="col" id="password_txt">Password</label>
                                    <input type="password" class="form-control for_inp" id="password" name="password_dosen"
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
                        <form action="/cms/dosen/deletedosen" method="POST">
                            @csrf
                            <input type="hidden" class="form-control for_inp" id="id_delete" name="id" placeholder="id" required>
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
                    <button class="btn btn-outline-dark" onclick="openModal('dosen')">
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
                <h1><strong>Daftar Dosen</strong></h1>
            </div>

            <div class="table_content">
                <div class="container">
                    <div class="table-responsive custom-table-responsive px-3">
                        <table class="table custom-table">
                            <thead>
                                <br>
                                <tr class="bg-dark head_table">
                                    <th scope="col">No</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No Telepon</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dosens as $dosen)
                                    <tr scope="row">
                                        <th scope="row"> {{ $loop->iteration }} </th>
                                        <td> {{ $dosen->noInduk }} </td>
                                        <td> {{ $dosen->name }} </td>
                                        <td> {{ $dosen->alamat }} </td>
                                        <td> {{ $dosen->notelp }} </td>
                                        <td>
                                            <button type="button" class="btn btn-warning edit"
                                                onclick="showEditAlert('edit', {{ $loop->iteration - 1 }}, 'dosen')"
                                                value="{{ $dosen }}">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger delete"
                                                onclick="showDeleteAlert('delete', {{ $loop->iteration - 1 }})"
                                                value=" {{ $dosen->id }} ">
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
