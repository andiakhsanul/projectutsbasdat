@extends('layout.adminapp')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>VENDOR</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <form action="{{ route('restoreallvendors') }}" method="POST">
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
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <Strong> DATA VENDOR </Strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('createvendors') }}" class="btn btn-succes btn-sm">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Vendor</th>
                                <th>Nama Vendor</th>
                                <th>Badan Hukum</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendors as $vendor)
                                @if ($vendor->status == 1)
                                    <tr>
                                        <td>{{ $vendor->id_vendor }}</td>
                                        <td>{{ $vendor->nama_vendor }}</td>
                                        <td>{{ $vendor->badan_hukum }}</td>
                                        <td>{{ $vendor->status }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('vendors/edit/'.$vendor->id_vendor) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('softdeletevendors', ['vendor' => $vendor->id_vendor]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ini?')">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
