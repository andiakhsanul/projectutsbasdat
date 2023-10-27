@extends('layout.adminapp')


@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>BARANG</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">myadmin</li>
                        <li class="active">tambah barangs</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="animated fadeIn">

        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <Strong> DATA ROLES </Strong>
                </div>
                <div class="pull-right">
                    <a href="{{ route('indexbarangs') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"></i>Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ route('storebarangs') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>id_satuan</label>
                                <input type="number" name="id_satuan" class="form-control" autofocus required>
                            </div>
                            <div class="form-group">
                                <label>jenis</label>
                                <input type="text" name="jenis" class="form-control" autofocus required>
                            </div>
                            <div class="form-group">
                                <label>nama_barang</label>
                                <input type="text" name="nama_barang" class="form-control" autofocus required>
                            </div>
                            <div class="form-group">
                                <label>harga</label>
                                <input type="text" name="harga" class="form-control" autofocus required>
                            </div>
                            <button type="submit" class="btn btn-success">save</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
@endsection
