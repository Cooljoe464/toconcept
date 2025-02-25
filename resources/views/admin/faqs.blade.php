@extends('admin.layout.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">FAQ</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home')  }}">Home</a></li>
                            <li class="breadcrumb-item active">FAQ's</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
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
                                <h3 class="card-title">FAQ's</h3>
                                <!-- /.card-header -->
                            </div>
                            <div class="card-body table-responsive">
                                <table id="faq" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($FAQ as $key => $faq)
                                        <tr>
                                            <td>{{ $key+1 }}.</td>
                                            <td>{{ $faq['header'] }}</td>
                                            <td>{{ $faq['description'] }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('admin.faq.destroy') }}">
                                                    @csrf
                                                    <input type="number" name="id" value="{{ $faq['id'] }}"
                                                           hidden>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                                class="btn btn-danger dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <button type="submit" class="dropdown-item"><i
                                                                    class="fa "></i>I am
                                                                sure
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
