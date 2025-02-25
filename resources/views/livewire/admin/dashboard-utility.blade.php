<div class="content-wrapper" id="dashboard-form">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')  }}">Dashboard</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>24</h3>

                            <p>No of Portfolios</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>23</h3>

                            <p>Total Clients</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- left column -->
                <div class="col-md-12 mx-auto">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="mb-4 p-2 alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <!-- general form elements -->
                    <div class="card card-dark">

                        <div class="card-header">
                            <h3 class="card-title">Update Information </h3>
                        </div>
                        <!-- /.card-header -->
                        <form class="form-horizontal" wire:submit.prevent="update">
                            @csrf
                            <div class="card-body">
                                <h4>Contact Information</h4>
                                <div class="row">
                                    <div class="form-group col-xl-2 col-lg-2 col-md-2 col-sm-2">
                                        <label for="exampleInputBorder">Youtube ID <code>*</code></label>
                                        <input type="text" wire:model="video_id"
                                               class="form-control form-control-border border-width-2"
                                               id="exampleInputBorder" placeholder="Enter Id" name="title" required/>
                                    </div>

                                    <div class="form-group col-xl-2 col-lg-2 col-md-2 col-sm-2">
                                        <label for="exampleInputBorder">Email 1 <code>*</code></label>
                                        <input type="email" wire:model="email1"
                                               class="form-control form-control-border border-width-2"
                                               id="exampleInputBorder" placeholder="Enter Email" required/>
                                    </div>

                                    <div class="form-group col-xl-2 col-lg-2 col-md-2 col-sm-2">
                                        <label for="exampleInputBorder">Email 2 <code>*</code></label>
                                        <input type="email" wire:model="email2"
                                               class="form-control form-control-border border-width-2"
                                               id="exampleInputBorder" placeholder="Enter Email"/>
                                    </div>
                                    <div class="form-group col-xl-2 col-lg-2 col-md-2 col-sm-2">
                                        <label for="exampleInputBorder">Phone 1 <code>*</code></label>
                                        <input type="text" wire:model="phone1"
                                               class="form-control form-control-border border-width-2"
                                               id="exampleInputBorder" placeholder="Enter Phone Number" required/>
                                    </div>

                                    <div class="form-group col-xl-2 col-lg-2 col-md-2 col-sm-2">
                                        <label for="exampleInputBorder">Phone 2 <code>*</code></label>
                                        <input type="text" wire:model="phone2"
                                               class="form-control form-control-border border-width-2"
                                               id="exampleInputBorder" placeholder="Enter Phone Number"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label for="exampleInputBorder">Office Address <code>*</code></label>
                                        <textarea type="text" wire:model="address"
                                                  class="form-control form-control-border border-width-2"
                                                  id="exampleInputBorder" placeholder="Enter Office Address"
                                                  name="title" required></textarea>
                                    </div>
                                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label for="exampleInputBorder">Map Address <code>*</code></label>
                                        <textarea type="text" wire:model="map_address"
                                                  class="form-control form-control-border border-width-2"
                                                  id="exampleInputBorder" placeholder="Enter Map Address" name="title"
                                                  required></textarea>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-xl-2 col-lg-2 col-md-2 col-sm-2">
                                        <label for="exampleInputBorder">Facebook</label>
                                        <input type="text" wire:model="facebook"
                                               class="form-control form-control-border border-width-2"
                                               id="exampleInputBorder" placeholder="Enter Facebook" name="title"/>
                                    </div>

                                    <div class="form-group col-xl-2 col-lg-2 col-md-2 col-sm-2">
                                        <label for="exampleInputBorder">Twitter</label>
                                        <input type="text" wire:model="twitter"
                                               class="form-control form-control-border border-width-2"
                                               id="exampleInputBorder" placeholder="Enter Twitter"/>
                                    </div>

                                    <div class="form-group col-xl-2 col-lg-2 col-md-2 col-sm-2">
                                        <label for="exampleInputBorder">Instagram</label>
                                        <input type="text" wire:model="instagram"
                                               class="form-control form-control-border border-width-2"
                                               id="exampleInputBorder" placeholder="Enter Instagram"/>
                                    </div>
                                    <div class="form-group col-xl-2 col-lg-2 col-md-2 col-sm-2">
                                        <label for="exampleInputBorder">Tiktok <code>*</code></label>
                                        <input type="text" wire:model="tiktok"
                                               class="form-control form-control-border border-width-2"
                                               id="exampleInputBorder" placeholder="Enter Tiktok"/>
                                    </div>

                                    <div class="form-group col-xl-2 col-lg-2 col-md-2 col-sm-2">
                                        <label for="exampleInputBorder">Linkedin <code>*</code></label>
                                        <input type="text" wire:model="linkedin"
                                               class="form-control form-control-border border-width-2"
                                               id="exampleInputBorder" placeholder="Enter Linkedin"/>
                                    </div>
                                    <div class="form-group col-xl-2 col-lg-2 col-md-2 col-sm-2">
                                        <label for="exampleInputBorder">Youtube <code>*</code></label>
                                        <input type="text" wire:model="youtube"
                                               class="form-control form-control-border border-width-2"
                                               id="exampleInputBorder" placeholder="Enter Youtube"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                        <label for="exampleInputBorder">Home Biography <code>*</code></label>
                                        <textarea type="text" wire:model="biography_home"
                                                  class="form-control form-control-border border-width-2"
                                                  id="exampleInputBorder" placeholder="Enter Home Biography"
                                                  name="title" required></textarea>
                                    </div>
                                    <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                        <label for="exampleInputBorder">About Biography</label>
                                        <textarea type="text" wire:model="biography_about"
                                                  class="form-control form-control-border border-width-2"
                                                  id="exampleInputBorder" placeholder="Enter About Biography"
                                                  required></textarea>
                                        @error('links') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                        <label for="exampleInputBorder">Footer Biography</label>
                                        <textarea type="text" wire:model="biography_footer"
                                                  class="form-control form-control-border border-width-2"
                                                  id="exampleInputBorder" placeholder="Enter Footer Biography"
                                                  name="title" required></textarea>
                                        @error('links') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputBorder">Biography Image <code>*</code></label>
                                    <input type="file" wire:model="biography_photo"
                                           class="form-control form-control-border border-width-2" name="image"
                                           id="image"/>
                                    @if ($photo)
                                        <img src="{{ Storage::url($photo) }}" class="img-thumbnail mt-2" width="200"
                                             alt="Biography Image">
                                    @endif
                                    @error('biography_photo') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">
                                    <span wire:loading.remove wire:target="update">Update</span>
                                    <span wire:loading wire:target="update">
                                        <i class="fas fa-spinner fa-spin"></i> Updating...
                                    </span>
                                </button>
                                <a onclick="history.back()" class="btn btn-default float-right">back</a>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->

        @push('scripts')

            <!-- JavaScript to scroll to the form -->
            <script>
                window.addEventListener('scroll-to-form', event => {
                    const formElement = document.getElementById('dashboard-form');
                    if (formElement) {
                        formElement.scrollIntoView({behavior: 'smooth'});
                    }
                });
            </script>
        @endpush
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
