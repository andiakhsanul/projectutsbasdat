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
                        <form action="{{ route('restoreallbarangs') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-refresh"></span> Restore
                            </button>
                        </form>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content mt-3">
        <div class="content mt-3">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <Strong> DATA Users </Strong>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('createbarangs') }}" class="btn btn-succes btn-sm">
                                <i class="fa fa-plus"></i>add
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id_barang</th>
                                    <th>id_satuan/nama satuan</th>
                                    <th>jenis</th>
                                    <th>nama_barang</th>
                                    <th>status</th>
                                    <th>harga</th>
                                    <th>action</th>
                                </tr>
                            </thead>

                            <body>
                                @foreach ($barangs as $barang)
                                    @if ($barang->status == 1)
                                        <tr>
                                            <td>{{ $barang->id_barang }}</td>
                                            <td>{{ $barang->nama_satuan }}</td>
                                            <td>{{ $barang->jenis }}</td>
                                            <td>{{ $barang->nama_barang }}</td>
                                            <td>{{ $barang->status }}</td>
                                            <td>{{ $barang->harga }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('barangs/edit/' . $barang->id_barang) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form
                                                    action="{{ route('softdeletebarangs', ['barang' => $barang->id_barang]) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus ini?')">
                                                    @method('PUT')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </body>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
