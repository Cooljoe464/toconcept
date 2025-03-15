<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header" id="portfolio-form">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tags</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')  }}">Home</a></li>
                        <li class="breadcrumb-item active">Tags</li>
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
                            <h3 class="card-title">{{ $isEditMode ? 'Edit Tag' : 'Add New Tag' }}</h3>
                        </div>

                        <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}" class="form-horizontal ">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputBorder">Tag Name<code>*</code></label>
                                    <input type="text" wire:model="name"
                                           class="form-control form-control-border border-width-2" name="name"
                                           id="exampleInputBorder" placeholder="Enter Tag Name" required>

                                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                @if($isEditMode === true)
                                <div class="form-group">
                                    <label for="exampleInputBorder">Tag slug<code>*</code></label>
                                    <input type="text" wire:model="slug"
                                           class="form-control form-control-border border-width-2" name="slug"
                                           id="exampleInputBorder" placeholder="Enter tag slug" required>

                                    @error('slug') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                @endif

                                <div class="form-group">
                                    <label for="exampleInputBorder">Tag Description<code>*</code></label>
                                    <textarea wire:model="description"
                                           class="form-control form-control-border border-width-2" name="slug"
                                              id="exampleInputBorder" placeholder="Enter Description"></textarea>

                                    @error('slug') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>


                                <div class="flex space-x-4">
                                    <button type="submit" class="btn btn-success">
                                        {{--                                    {{ $isEditMode ? 'Update' : 'Add' }}--}}
                                        @if($isEditMode == 'update')
                                            <span wire:loading.remove wire:target="update">Update</span>
                                            <span wire:loading wire:target="update">
                                        <i class="fas fa-spinner fa-spin"></i> Updating...
                                    </span>
                                        @else
                                            <span wire:loading.remove wire:target="update">Add</span>
                                            <span wire:loading wire:target="update">
                                        <i class="fas fa-spinner fa-spin"></i> Adding...
                                    </span>
                                        @endif
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

                    <h2 class="text-xl font-bold mb-2"><u>View Faq's</u></h2>
                    <!-- Search Input -->
                    <input type="text" wire:model.live="search" class="form-control form-control-border border-width-2" placeholder="Search your tags" style="margin-bottom: 10px;">
                    <table class="table table-bordered table-responsive-lg">
                        <thead class="bg-gray text-bold">
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td><strong>{{ $tag->name }}</strong></td>
                                <td><strong>{{ $tag->slug }}</strong></td>
                                <td><strong>{{ $tag->description }}</strong></td>
                                <td>
                                    <div class="btn-group">
                                        <button  wire:click="edit('{{ $tag->uuid }}')"
                                                class="btn btn-secondary">Edit
                                        </button>
                                        <button  wire:click="delete('{{ $tag->uuid }}')"
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
                        {{ $tags->links() }}
                    </div>
                </div>

            </div>
        </div>
        <!-- Pagination Links -->
        @push('scripts')

            <!-- JavaScript to scroll to the form -->
            <script>
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


