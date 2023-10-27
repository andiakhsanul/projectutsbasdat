@extends('layout.adminapp')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>barang</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">myadmin</a></li>
                        <li class="active">edit barang</li>
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
                    <strong> DATA barang </strong>
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
                        <form action="{{ url('barangs/'.$barangs->id_barang) }}" method="post">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label>Nama Satuan</label>
                                <select name="id_satuan" class="form-control" autofocus required>
                                    @foreach ($daftarSatuan as $satuan)
                                        <option value="{{ $satuan->id_satuan }}">{{ $satuan->nama_satuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <input type="text" name="jenis" value="{{ $barangs->jenis }}" class="form-control" autofocus required>
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" autofocus required>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" name="harga" class="form-control" autofocus required>
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
