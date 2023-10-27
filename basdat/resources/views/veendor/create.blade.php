

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
                        <li><a href="#">myadmin</a></li>
                        <li class="active">tambah vendor</li>
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
                        <Strong> DATA VENDOR </Strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('indexvendors') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i>Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="{{ route('storevendors') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Vendor</label>
                                    <input type="text" name="nama_vendor" class="form-control" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Badan Hukum</label>
                                    <select name="badan_hukum" class="form-control" required>
                                        <option value="P">P</option>
                                        <option value="Y">Y</option>
                                    </select>
                                </div>
                                </div>
                                <button type="submit" class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

