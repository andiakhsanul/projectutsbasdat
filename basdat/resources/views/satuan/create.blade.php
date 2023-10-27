@extends('layout.adminapp')


@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>satuans</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">myadmin</li>
                        <li class="active">tambah satuans</li>
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
                        <Strong> DATA satuans </Strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('indexsatuans') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i>Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="{{ route('storesatuans') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>nama_satuans</label>
                                    <input type="text" name="name" class="form-control" autofocus required>
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
