@extends('admin.layout.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Landing Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home')  }}">Home</a></li>
                            <li class="breadcrumb-item active">landing Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8 mx-auto">
                        <!-- general form elements -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('message'))
                            <div class="alert alert-success alert-dismissible fade show text-center auto-close"
                                 role="alert">
                                <strong>{{ session('message') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Landing Page</h3>
                            </div>
                            <!-- /.card-header -->
                            <form class="form-horizontal" method="POST" action="{{ route('admin.landing') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <h4>Landing Information</h4>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Update landing Title <code>*</code></label>
                                        <input type="text" class="form-control form-control-border border-width-2"
                                               name="title"
                                               id="exampleInputBorder" placeholder="Update landing Title"
                                               value="{{ $Landing['title'] }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Update landing Sub-title <code>*</code></label>
                                        <input type="text" class="form-control form-control-border border-width-2"
                                               name="subtitle"
                                               id="exampleInputBorder" placeholder="Update landing Sub-title"
                                               value="{{ $Landing['subtitle'] }}" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleInputBorder">Update landing Image </label>
                                            <input type="file" class="form-control form-control-border border-width-2"
                                                   name="image"
                                                   id="exampleInputBorder">
                                        </div>
                                        <div class=" col-6">
                                            <label for="exampleInputBorder">Update landing Video <code></code></label>
                                            <input type="file" class="form-control form-control-border border-width-2"
                                                   name="video"
                                                   id="exampleInputBorder">
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Update</button>
                                    <a onclick="history.back()" class="btn btn-default float-right">back</a>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.card -->

    </div>
    <!-- /.content-wrapper -->
@endsection
