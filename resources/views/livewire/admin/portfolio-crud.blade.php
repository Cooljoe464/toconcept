@push('styles')
    <link rel="stylesheet" href="{{ asset('asset/plugins/select2/css/select2.min.css', env('SECURE_ASSETS')) }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css', env('SECURE_ASSETS')) }}">
@endpush
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header" id="portfolio-form">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Portfolio</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')  }}">Home</a></li>
                        <li class="breadcrumb-item active">Portfolio</li>
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
                    <div class="card card-gray-dark ">
                        <div class="card-header">
                            <h3 class="card-title">{{ $isEditMode ? 'Edit Portfolio' : 'Add New Portfolio' }}</h3>
                        </div>

                        <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}" class="form-horizontal ">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputBorder">Select Tags<code>*</code></label>
                                    <select class="form-control form-control-border border-width-2" wire:model="tags" style="width: 100%">
                                        <option value="">Select Tags</option>
                                        @foreach($availableTags as $id => $name)
                                            <option value="{{ $id }}" {{ $tags_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tags') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBorder">Title <code>*</code></label>
                                    <input type="text" wire:model="title"
                                           class="form-control form-control-border border-width-2" name="title"
                                           id="exampleInputBorder" placeholder="Enter Title" required>

                                    @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <input type="file" wire:model="image" id="image"
                                           class="form-control form-control-border border-width-2"/>
                                    @error('image') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="flex space-x-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ $isEditMode ? 'Update' : 'Save' }}
                                    </button>
                                    @if($isEditMode)
                                        <button type="button" wire:click="resetInputFields"
                                                class="btn btn-secondary">
                                            Cancel
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>

                    @if (session()->has('message'))
                        <div class="mb-4 p-2 alert alert-default-info">
                            {{ session('message') }}
                        </div>
                    @endif

                    <h2 class="text-xl font-bold mb-2"><u>View Portfolios</u></h2>
                        <!-- Search Input -->
                        <input type="text" wire:model.live="search" class="form-control form-control-border border-width-2" placeholder="Search portfolio..." style="margin-bottom: 10px;">
                    <table class="table table-bordered table-responsive-lg">
                        <thead class="bg-gray text-bold">
                        <tr>
                            <th>Title</th>
                            <th>Tags</th>
                            <th>Image</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($portfolios as $portfolio)
                            <tr>
                                <td><strong>{{ $portfolio->title }}</strong></td>
                                <td><strong>{{ $portfolio->tags }}</strong></td>
                                <td>
                                    @if($portfolio->image)
                                        <img src="{{ Storage::url($portfolio->image) }}"
                                             alt="{{ $portfolio->title }}" width="150">
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button wire:click="edit('{{ $portfolio->uuid }}')"
                                                class="btn btn-secondary">Edit
                                        </button>
                                        <button wire:click="delete('{{ $portfolio->uuid }}')"
                                                class="btn btn-danger"
                                                onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $portfolios->links() }}
                    </div>
                </div>

            </div>
        </div>
        <!-- Pagination Links -->
        @push('scripts')
            <script src="{{ asset('asset/plugins/select2/js/select2.full.min.js') }}"></script>
            <!-- JavaScript to scroll to the form -->
            <script>
                $(function () {
                    $('.select2').select2({
                        theme: 'bootstrap4',
                        placeholder: 'Select Tags',
                    });
                });
                window.addEventListener('scroll-to-form', event => {
                    const formElement = document.getElementById('portfolio-form');
                    if (formElement) {
                        formElement.scrollIntoView({behavior: 'smooth'});
                    }
                });
            </script>
        @endpush

    </section>
</div>


