@extends('layouts.guest')

@section('content')
    @push('styles')
        <!-- Google maps -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNm8iTBBSJr4h7dXOwqvw_8AbWIpw_sMo"></script>
    @endpush

    <div class="wrapper">
    <div class="portfolio_grid_wrapper albums_grid_wrapper without_title show_album_content">
        <div class="filter_block">
            <!--Remove This when using the option single-->
            <ul id="options" class="splitter">
                <li>
                    <ul class="optionset" data-option-key="filter">
                        <li class="selected">
                            <a href="" data-option-value="*">All</a>
                        </li>
                        @foreach($getTags as $tag)
                            <li>
                                <a data-option-value=".{{ $tag->slug }}" href=""
                                   title="View all post filed under ">{{ $tag->name }}</a>
                            </li>
                        @endforeach

                    </ul>
                </li>
            </ul>
        </div>

        <div class="portfolio_grid port4cols" data-pad="30px" data-perload="12" data-ptf="id" data-demoserver="true"
             data-showlikes="show" data-showshare="show" data-categs="">
            <div class="portfolio_grid_isotope">
                @foreach($videos as $video)
                    <div class="portfolio_grid_item element {{ $video->tag }}" data-category="{{$video->tag}}"  >
                        <div class="portfolio_grid_item_wrapper">
                            <div class="img_block wrapped_img fs_port_item gallery_item_wrapper">
                                <iframe width="1000" height="300"
                                        src="https://www.youtube.com/embed/{{ $video->video_id }}" frameborder="0"
                                        allowfullscreen></iframe>
                            </div>
{{--                            <div class="portfolio_grid_content">--}}
{{--                                <div class="pgc_left_part" >--}}
{{--                                    <h6 class="portfolio_grid_title">{{ $video->title }}</h6>--}}
{{--                                </div>--}}
{{--                                <div class="clear"></div>--}}
{{--                            </div>--}}
                        </div>
                        <hr/>
                        <hr/>
                        <div class="pgc_left_part"  >
                            <h6 class="portfolio_grid_title">{{ $video->title }}</h6>
                        </div>
                        <!-- .portfolio_grid_item_wrapper -->
                    </div>
                @endforeach
            </div>
            <!-- .portfolio_grid_isotope -->
        </div>
        <!-- .portfolio_grid -->

        {{--        <button wire:click="loadMore" class="albums_load_more btn_normal btn_type4">Load More</button>--}}
    </div>
        @include('guests.addon.book_now')
    </div>
    @push('scripts')
        <script src='{{ asset('assets/js/plugins/jquery.scrollTo.js') }}'></script>
        <script src='{{ asset('assets/js/plugins/jquery.swipebox.js') }}'></script>

        <script src='{{ asset('assets/js/gallery/jquery.gallery.swipebox.js') }}'></script>
        <script src='{{ asset('assets/js/gallery/jquery.gallery.isotope.min.js') }}'></script>
        <script src='{{ asset('assets/js/gallery/jquery.gallery.sorting.js') }}'></script>
        <script src="{{ asset('assets/js/gallery/jquery.gallery.grid.js') }}"></script>



        <script src="{{ asset('assets/js/gallery/jquery.gallery.post.js') }}"></script>

        <!-- Init -->
        <script src='{{ asset('assets/js/theme.js') }}'></script>



    @endpush
@endsection




