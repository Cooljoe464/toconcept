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
                            <li class="breadcrumb-item active">Add Client</li>
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
                                <h3 class="card-title">Add Client</h3>
                            </div>
                            <!-- /.card-header -->
                            <form class="form-horizontal" method="POST" action="{{ route('admin.clients') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <h4>Client Information</h4>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Clients Name <code>*</code></label>
                                        <input type="text" wire:model="names" class="form-control form-control-border border-width-2"
                                               id="exampleInputBorder" placeholder="Enter Title" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Client link</label>
                                        <input type="url" wire:model="links" class="form-control form-control-border border-width-2"
                                               id="exampleInputBorder" placeholder="Enter Link">
                                        @error('links') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Upload Client Image <code>*</code></label>
                                        <input type="file" wire:model="newPhoto" class="form-control form-control-border border-width-2" name="image"
                                               id="image" required>
                                        @if ($photos)
                                            <img src="{{ Storage::url($photos) }}" alt="Client Photo" class="w-20 h-20 mt-2">
                                        @endif
                                        @error('newPhoto') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">{{ $isEditMode ? 'Update' : 'Add' }}</button>
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
