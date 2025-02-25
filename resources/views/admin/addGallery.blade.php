@extends('admin.layout.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Gallery</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home')  }}">Home</a></li>
                            <li class="breadcrumb-item active">Add Gallery</li>
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
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Gallery</h3>
                            </div>
                            <!-- /.card-header -->
                            <form class="form-horizontal" method="POST" action="{{ route('admin.gallery') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <h4>Gallery Information</h4>
                                    <div class="form-group">
                                        <label for="exampleInputBorder" hidden="">Title <code>*</code></label>
                                        <input type="hidden" hidden="hidden" class="form-control form-control-border border-width-2"
                                               id="exampleInputBorder" placeholder="Enter Title" value="Default Images" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="exampleInputBorder">Upload Image <code>*</code></label>
                                                <input type="file" class="form-control form-control-border border-width-2"
                                                       id="image" name="image" required multiple>
                                                <div class="cleardiv">&nbsp;&nbsp;&nbsp;</div>
                                                <figure><img src="" id="image_preview" style="width: 20%"
                                                             alt=""></figure>
                                            </div>
                                            <div class="col-6">
                                                <label for="tag">Select Tag <code>*</code></label>
                                                <select class="form-control form-control-border border-width-2" id="tag" name="tag">
                                                    <option selected>Equipment</option>
                                                    <option>Factory</option>
                                                    <option>Projects</option>
                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <a onclick="history.back()" class="btn btn-default float-right">back</a>
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

    <script>
        const imageInput = document.getElementById('image');
        const previewImg = document.getElementById('image_preview');

        imageInput.addEventListener('change', function () {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
