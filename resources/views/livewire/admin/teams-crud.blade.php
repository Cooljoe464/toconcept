<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header" id="teams-form">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Teams</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')  }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Teams</li>
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
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">{{ $isEditMode ? 'Edit Teams' : 'Add Teams' }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <form class="form-horizontal" wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                            @csrf
                            <div class="card-body">
                                <h4>Team Information</h4>
                                <div class="form-group">
                                    <label for="exampleInputBorder">Teams Name <code>*</code></label>
                                    <input type="text" wire:model="name"
                                           class="form-control form-control-border border-width-2"
                                           id="exampleInputBorder" placeholder="Enter Name" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBorder">Upload Teams Image <code>*</code></label>
                                    <input type="file" wire:model="photo"
                                           class="form-control form-control-border border-width-2" name="image"
                                           id="image">
                                    @if ($isEditMode && $photo)
                                        <img src="{{ Storage::url($photo) }}" alt="Teams Photo" width="150"
                                             class="w-20 h-20 mt-2">
                                    @endif
                                    @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
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


                    <h2 class="text-xl font-bold mt-6"><u>Teams List</u></h2>
                        <!-- Search Input -->
                        <input type="text" wire:model.live="search" class="form-control form-control-border border-width-2" placeholder="Search teams..." style="margin-bottom: 10px;">
                    <table class="table table-bordered table-responsive-lg">
                        <tr>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($teams as $team)
                            <tr>
                                <td>{{ $team->name }}</td>
                                <td>
                                    @if($team->photo)
                                        <img src="{{ Storage::url($team->photo) }}" class="w-16 h-16" width="150"
                                             alt="{{ $team->name }}">
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button wire:click="edit({{ $team->id }})" class="btn btn-secondary">Edit
                                        </button>
                                        <button wire:click="delete({{ $team->id }})" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" class="btn btn-danger">Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    {{ $teams->links() }}
                </div>
            </div>
        </div>


        @push('scripts')

            <!-- JavaScript to scroll to the form -->
            <script>
                window.addEventListener('scroll-to-form', event => {
                    const formElement = document.getElementById('teams-form');
                    if (formElement) {
                        formElement.scrollIntoView({behavior: 'smooth'});
                    }
                });
            </script>
        @endpush
    </section>
</div>


