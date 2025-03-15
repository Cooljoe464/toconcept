<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header" id="event-form">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Events</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')  }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Events</li>
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
                            <h3 class="card-title">{{ $isEditing ? 'Edit Event' : 'Add Event' }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <form class="form-horizontal" wire:submit.prevent="{{ $isEditing ? 'update' : 'save' }}">
                            @csrf
                            <div class="card-body">
                                <h4>Event Information</h4>
                                <div class="form-group">
                                    <label for="exampleInputBorder">Events Title <code>*</code></label>
                                    <input type="text" wire:model="title"
                                           class="form-control form-control-border border-width-2"
                                           id="exampleInputBorder" placeholder="Enter Event Title" name="title"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Tag</label>
                                    <select class="form-control form-control-border border-width-2" wire:model="tags_id" required>
                                        <option value="">Select Tag</option>
                                        @foreach($availableTags as $id => $name)
                                            <option value="{{ $id }}" {{ $tags_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>YouTube Video ID</label>
                                    <input type="text" class="form-control form-control-border border-width-2" wire:model="video_id" required>
                                </div>
                            </div>
                            <!-- /.card-body sdbddqmsU3g -->
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">
                                    {{--                                    {{ $isEditMode ? 'Update' : 'Add' }}--}}
                                    @if($isEditing == 'update')
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
                                @if ($isEditing)
                                    <button type="button" class="btn btn-default float-right"
                                            wire:click="cancelEdit">Cancel
                                    </button>
                                @endif
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>

                        @if (session()->has('message'))
                            <div class="mb-4 p-2 alert alert-default-info">
                                {{ session('message') }}
                            </div>
                        @endif
                    <h2 class="text-xl font-bold mt-6"><u>Events List</u></h2>
                    <!-- Search Input -->
                    <input type="text" wire:model.live="search" class="form-control form-control-border border-width-2"
                           placeholder="Search events..." style="margin-bottom: 10px;">
                    <table class="table table-bordered table-responsive-lg">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Tag</th>
                            <th>Video</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($videos as $video)
                            <tr>
                                <td>{{ $video->title }}</td>
                                <td>{{ $video->tag }}</td>
                                <td>
                                    <iframe width="200" height="100"
                                            src="https://www.youtube.com/embed/{{ $video->video_id }}" frameborder="0"
                                            allowfullscreen></iframe>
{{--                                    |{{ $video->video_id }}--}}
                                </td>
                                <td>
                                    <button wire:click="edit('{{ $video->uuid }}')" class="btn btn-info">Edit</button>
                                    <button wire:click="delete('{{ $video->uuid }}')" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $videos->links() }}
                    </div>

                </div>
            </div>
        </div>


        @push('scripts')

            <!-- JavaScript to scroll to the form -->
            <script>
                window.addEventListener('scroll-to-form', event => {
                    const formElement = document.getElementById('event-form');
                    if (formElement) {
                        formElement.scrollIntoView({behavior: 'smooth'});
                    }
                });
            </script>
        @endpush
    </section>
</div>


