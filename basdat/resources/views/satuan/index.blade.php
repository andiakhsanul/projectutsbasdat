@extends('layout.adminapp')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>SATUAN</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <form action="{{ route('restoreallsatuans') }}" method="POST">
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
                            <Strong> DATA ROLES </Strong>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('createsatuans') }}" class="btn btn-succes btn-sm">
                                <i class="fa fa-plus"></i>add
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id_satuan</th>
                                    <th>nama_satuan</th>
                                    <th>status</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <body>
                                @foreach ($satuans as $satuan)
                                    @if ($satuan->status == 1)
                                        <tr>
                                            <td>{{ $satuan->id_satuan }}</td>
                                            <td>{{ $satuan->nama_satuan }}</td>
                                            <td>{{ $satuan->status }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('satuans/edit/'.$satuan->id_satuan) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form
                                                    action="{{ route('softdeletesatuans', ['satuan' => $satuan->id_satuan]) }}"
                                                    method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ini?')">
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
