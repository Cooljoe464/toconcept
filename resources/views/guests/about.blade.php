@extends('layouts.guest')

@section('content')
    @push('preloads')
        @foreach($Clients as $client)
            <link rel="preload" href="{{ asset($client->photo, env('SECURE_ASSETS')) }}" as="image"/>
        @endforeach

        @foreach($Teams as $team)
            <link rel="preload" href="{{ asset($team->photo, env('SECURE_ASSETS')) }}" as="image"/>
        @endforeach

    @endpush

    @push('styles')

    @endpush
    <div class="wrapper">
        <div class="container container_with_scroll">
            <div class="content_block row no-sidebar">
                <div class="fl-container">
                    <div class="posts-block">
                        <div class="contentarea">
                            <div class="row">
                                <div class="span12 span-sm12 scroll_span">
                                    <div class="scroll_pane_wrap">
                                        <div class="page_title">
                                            <h1>About</h1>
                                        </div>
                                        <div class='row'>
                                            <div
                                                    class='span12 first-module module_number_1 module_cont  module_content'>
                                                <div class='module_inner style1'>
                                                    <div class='bg_title'>
                                                        <h2 class='headInModule head-01'>BIOGRAPHY</h2>
                                                    </div>
                                                    <div class='module_content'>
                                                        <blockquote>
                                                            {{ $homePage['biography_about'] }}
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="clear"></div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">


                            </div>

                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <!-- FS Slider Start -->
        <div class="fs_gallery_megawrapper">
            <div class="fs_gallery_trigger personal_preloader"></div>
            <div class="fs_gallery_wrapper fadeOnLoad">
                <ul class="no_fit fs_gallery_container autoplay fs_slider fade video_cover controls_on"
                    data-video="0"
                    data-interval="5000" data-autoplay="autoplay">
                    <li class="fs_slide slide_image block2preload fs_slide1" data-count="1"
                        data-src="{{ asset($homePage['biography_photo'], env('SECURE_ASSETS')) }}" data-title="Bio Image"
                         data-type="image"></li>
{{--                    <li class="fs_slide slide_image block2preload fs_slide2" data-count="2"--}}
{{--                        data-src="assets/img/img7.jpg" data-title="Girls Office" data-descr="NY Studio <br />2020"--}}
{{--                        data-type="image"></li>--}}
{{--                    <li class="fs_slide slide_image block2preload fs_slide3" data-count="3"--}}
{{--                        data-src="assets/img/img18.jpg" data-title="Sporty woman" data-descr="NY Studio <br />2020"--}}
{{--                        data-type="image"></li>--}}
                </ul>
            </div>
            <div class='fs_gallery_slider' data-thumbs-btn-title='Thumbs'></div>
        </div>
        <!-- .fs_gallery_megawrapper -->
        <!-- FS Slider End -->

    </div>


    <div class='span12  module_number_9 module_cont  module_partners'>
        <br/>
        <h2 class="text-center">Our Clients</h2>
        <div class='module_inner style30'>
            <div class="module_content sponsors_works items4">
                <ul>
                    @foreach($Clients as $client)
                        <li>
                            <div class="item_wrapper">
                                <div class="item">
                                    <a href='{{ !empty($client->link) ? $client->link : '' }}' target='_blank'>
                                        <img src="{{ asset($client->photo, env('SECURE_ASSETS')) }}" alt=""
                                             title="{{ $client->names }}"/>
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach


                </ul>
            </div>
        </div>
    </div>


    <div class="portfolio_grid_wrapper albums_grid_wrapper without_title show_album_content">
        <div class="filter_block">
            <ul id="options" class="splitter text-center">
                <li>
                    <h2 class="text-center">Our Teams</h2>
                </li>
            </ul>
        </div>
        <div class="portfolio_grid port4cols" data-pad="30px" data-perload="12" data-ptf="id"
             data-demoserver="true" data-showlikes="show" data-showshare="show" data-categs="">
            <div class="portfolio_grid_isotope">
                <!-- .portfolio_grid_item -->
                @foreach($Teams as $team)
                    <!-- .portfolio_grid_item -->
                    <div class="portfolio_grid_item element " data-category="{{ $team->names }}">
                        <div class="portfolio_grid_item_wrapper">
                            <div class="img_block wrapped_img fs_port_item gallery_item_wrapper">
                                <img width="960" class="img2preload" height="632" src="{{ asset($team->photo, env('SECURE_ASSETS')) }}"
                                     alt=""/>
                                <div class="gallery_fadder"></div>
                            </div>
                            <div class="portfolio_grid_content">
                                <div class="pgc_left_part">
                                    <h6 class="portfolio_grid_title">{{ $team->names }}</h6>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <a href="{{ asset($team->photo, env('SECURE_ASSETS')) }}" class="portfolio_grid_href swipebox "
                               title="Photo of {{ $team->names }}"></a>
                        </div>
                        <!-- .portfolio_grid_item_wrapper -->
                    </div>
                    <!-- .portfolio_grid_item -->
                @endforeach
            </div>
            <!-- .portfolio_grid_isotope -->
        </div>
        <!-- .portfolio_grid -->
    </div>
    @include('guests.addon.book_now')

    @push('scripts')
        <script src='assets/js/plugins/jquery.jscrollpane.min.js'></script>
        <script src='assets/js/plugins/jquery.scrollTo.js'></script>
        <script src='assets/js/plugins/jquery.fs.gallery.js'></script>

        <script src='assets/js/plugins/jquery.waypoint.js'></script>
        <script src="assets/js/plugins/jquery.slick.min.js"></script>


        <!-- Gallery -->
        <script src='assets/js/gallery/jquery.gallery.swipebox.js'></script>
        <script src='assets/js/gallery/jquery.gallery.isotope.min.js'></script>
        <script src='assets/js/gallery/jquery.gallery.sorting.js'></script>
        <script src="assets/js/gallery/jquery.gallery.grid.js"></script>
        <script src='assets/js/theme.js'></script>
    @endpush

@endsection
