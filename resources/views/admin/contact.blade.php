@extends('admin.layout.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Contact</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home')  }}">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
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
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Contact Page</h3>
                            </div>
                            <!-- /.card-header -->
                            <form class="form-horizontal" method="POST" action="{{ route('admin.contact') }}">
                                @csrf
                                <div class="card-body">
                                    <h4>Contact Information</h4>
                                    <div class="row mb-3">
                                        <div class="form-group col-6">
                                            <label for="exampleInputBorder">Update Email Address
                                                <code>*</code></label>
                                            <input type="email" class="form-control form-control-border border-width-2"
                                                   name="email"
                                                   id="exampleInputBorder" placeholder="Update Email"
                                                   value="{{ $Contact['email'] }}" required>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="exampleInputBorder">Update Phone Number
                                                <code>*</code></label>
                                            <input type="tel" class="form-control form-control-border border-width-2"
                                                   name="phone"
                                                   id="exampleInputBorder" placeholder="Update Phone 1"
                                                   value="{{ $Contact['phone'] }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="exampleInputBorder">Update Facebook link </label>
                                            <input type="url" class="form-control form-control-border border-width-2"
                                                   id="exampleInputBorder" placeholder="Update Facebook link"
                                                   name="facebook"
                                                   value="@if(!empty($Contact['facebook_link'])){{ $Contact['facebook_link'] }}@endif"
                                                   required>
                                        </div>
                                        <div class="col-4">
                                            <label for="exampleInputBorder">Update Twitter Link </label>
                                            <input type="url" class="form-control form-control-border border-width-2"
                                                   id="exampleInputBorder" placeholder="Update Twitter Link"
                                                   name="twitter"
                                                   value="@if(!empty($Contact['twitter_link'])){{ $Contact['twitter_link'] }}@endif">
                                        </div>
                                        <div class="col-4">
                                            <label for="exampleInputBorder">Update Instagram Link </label>
                                            <input type="url" class="form-control form-control-border border-width-2"
                                                   id="exampleInputBorder" placeholder="Update Instagram Link"
                                                   name="instagram"
                                                   value="@if(!empty($Contact['instagram_link'])){{ $Contact['instagram_link'] }}@endif">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="exampleInputBorder">Update Address <code>*</code></label>
                                                <textarea class="form-control form-control-border border-width-2"
                                                          name="address"
                                                          id="exampleInputBorder" placeholder="Update Phone 2"
                                                          required>{{ $Contact['address'] }}</textarea>
                                            </div>
                                            <div class="col-6">
                                                <label for="exampleInputBorder">Work Hours<code>*</code></label>
                                                <textarea type="text" class="form-control form-control-border border-width-2" name="work" placeholder="Work Hours" >{{ $Contact['work_hrs'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Update</button>
                                    <button type="reset" class="btn btn-default float-right">Cancel</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- /.content-wrapper -->
@endsection
