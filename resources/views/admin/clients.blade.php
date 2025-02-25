@extends('admin.layout.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Clients</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home')  }}">Home</a></li>
                            <li class="breadcrumb-item active">Clients</li>
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
                                <h3 class="card-title">Clients</h3>
                                <!-- /.card-header -->
                            </div>
                            <div class="card-body table-responsive">
                                <table id="client" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Title</th>
                                        <th>Client Website</th>
                                        <th>Image</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Partner as $key => $partner)
                                        <tr>
                                            <td>{{ $key+1 }}.</td>
                                            <td>{{ $partner['title'] }}</td>
                                            <td><a src="{{ $partner['link'] }}">{{ $partner['link'] }}</a></td>
                                            <td><img
                                                    src="{{ url(str_replace('public/', 'storage/', $partner['image'] )) }}"
                                                    class="img-fluid img-lg"/></td>
                                            <td>
                                                <form method="POST" action="{{ route('admin.clients.destroy') }}">
                                                    @csrf
                                                    <input type="number" name="id" value="{{ $partner['id'] }}"
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
                                        <th>Partner Website</th>
                                        <th>Image</th>
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
