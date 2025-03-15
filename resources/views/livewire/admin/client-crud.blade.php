<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header" id="client-form">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Clients</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')  }}">Home</a></li>
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
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">{{ $isEditMode ? 'Edit Client' : 'Add Client' }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <form class="form-horizontal" wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                            @csrf
                            <div class="card-body">
                                <h4>Client Information</h4>
                                <div class="form-group">
                                    <label for="exampleInputBorder">Clients Name <code>*</code></label>
                                    <input type="text" wire:model="names"
                                           class="form-control form-control-border border-width-2"
                                           id="exampleInputBorder" placeholder="Enter Title" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBorder">Client link</label>
                                    <input type="url" wire:model="links"
                                           class="form-control form-control-border border-width-2"
                                           id="exampleInputBorder" placeholder="Enter Link">
                                    @error('links') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBorder">Upload Client Image <code>*</code></label>
                                    <input type="file" wire:model="photos"
                                           class="form-control form-control-border border-width-2" name="image"
                                           id="image">
                                    @if ($photos)
                                        <img src="{{ Storage::url($photos) }}" alt="Client Photo" width="150"
                                             class="w-20 h-20 mt-2">
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

                        @if (session()->has('message'))
                            <div class="mb-4 p-2 alert alert-default-info">
                                {{ session('message') }}
                            </div>
                        @endif
                    <h2 class="text-xl font-bold mt-6"><u>Clients List</u></h2>
                        <!-- Search Input -->
                        <input type="text" wire:model.live="search" class="form-control form-control-border border-width-2" placeholder="Search clients..." style="margin-bottom: 10px;">
                    <table class="table table-bordered table-responsive-lg">
                        <tr>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->names }}</td>
                                <td>
                                    <a href="{{ $client->link }}" target="_blank"
                                       class="text-blue">{{ $client->link }}</a>
                                </td>
                                <td>
                                    @if($client->photos)
                                        <img src="{{ Storage::url($client->photos) }}" class="w-16 h-16" width="150"
                                             alt="{{ $client->names }}">
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button wire:click="edit('{{ $client->uuid }}')" class="btn btn-secondary">Edit
                                        </button>
                                        <button wire:click="delete('{{ $client->uuid }}')" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" class="btn btn-danger">Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    {{ $clients->links() }}

                </div>
            </div>
        </div>


        @push('scripts')

            <!-- JavaScript to scroll to the form -->
            <script>
                window.addEventListener('scroll-to-form', event => {
                    const formElement = document.getElementById('client-form');
                    if (formElement) {
                        formElement.scrollIntoView({behavior: 'smooth'});
                    }
                });
            </script>
        @endpush
    </section>
</div>


