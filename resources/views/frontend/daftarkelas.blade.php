@extends('template.fenavbar')

@section('title', $title)

@section('content')
    <br> <br> <br>
    <div class="container">
        <div class="main_header my-4">
            <p class="h1">Daftar Kelas</p>
            <hr>
        </div>
        <div class="main_content my-2">
            <div class="row">
                <div class="col-4">
                    <div class="card bg-light">
                        <div class="card-header"><strong>Nama Mata Kuliah</strong></div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="#"><strong>Nama Kelas</strong></a></h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <button class="btn btn-secondary"><i class="bi bi-info-square"></i></button>
                            <button class="btn btn-success"><i class="bi bi-window-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
