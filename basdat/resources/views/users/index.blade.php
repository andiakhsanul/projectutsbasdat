@extends('layout.adminapp')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>USERS</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <form action="{{ route('restoreallusers') }}" method="POST">
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
                            <a href="{{ route('createusers') }}" class="btn btn-succes btn-sm">
                                <i class="fa fa-plus"></i>add
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>iduser</th>
                                    <th>id_role</th>
                                    <th>username</th>
                                    <th>password</th>
                                    <th>status</th>
                                    <th>action</th>
                                </tr>
                            </thead>

                            <body>
                                @foreach ($users as $user)
                                    @if ($user->status == 1)
                                        <tr>
                                            <td>{{ $user->id_user }}</td>
                                            <td>{{ $user->nama_role }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->password }}</td>
                                            <td>{{ $user->status }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('users/edit/'.$user->id_user) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ route('softdeleteusers', ['user' => $user->id_user]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ini?')">
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
    @endsection
