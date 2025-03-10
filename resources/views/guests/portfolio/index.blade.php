@extends('layouts.guest')

@section('content')
    @push('styles')
        @foreach($Portfolios as $portfolio)
            <link rel="preload" href="{{ Storage::url($portfolio->image) }}" as="image" />
        @endforeach
    @endpush
    <div class="wrapper">
            <div class='row'>
                <div class='span12  module_number_2 module_cont text-center module_title'>
                    <div class='module_inner style5'>
                        <div class='bg_title'>
                            <h2 class='headInModule style1-title'><strong>{{ strtoupper($PortfolioName->tags) }}</strong></h2>
                        </div>
                    </div>
                </div>
                <!-- .module_cont -->
            </div>
            <div class="portfolio_grid_wrapper albums_grid_wrapper without_title show_album_content">
                <div class="filter_block">

                </div>

                <div class="portfolio_grid port4cols" data-pad="30px" data-perload="12" data-ptf="id"
                     data-demoserver="true"
                     data-showlikes="show" data-showshare="show" data-categs="">
                    <div class="portfolio_grid_isotope">
                        @foreach($Portfolios as $portfolio)
                            <div class="portfolio_grid_item element {{ $portfolio->tags }}"
                                 data-category="{{$portfolio->tags}}">
                                <div class="portfolio_grid_item_wrapper">
                                    <div class="img_block wrapped_img fs_port_item gallery_item_wrapper">
                                        <img width="960" class="img2preload" height="632"
                                             src="{{ Storage::url($portfolio->image, env('SECURE_ASSETS')) }}"
                                             alt="{{ $portfolio->title }}"/>
                                        <div class="gallery_fadder"></div>
                                    </div>
                                    <div class="portfolio_grid_content">
                                        <div class="pgc_left_part">
                                            <h6 class="portfolio_grid_title">{{ $portfolio->title }}</h6>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <a href="{{ asset($portfolio->image) }}" class="portfolio_grid_href swipebox "
                                       title="{{ $portfolio->title }}"></a>
                                </div>
                                <!-- .portfolio_grid_item_wrapper -->
                            </div>
                        @endforeach
                    </div>
                    <!-- .portfolio_grid_isotope -->
                </div>
                <!-- .portfolio_grid -->

{{--                        <button wire:click="loadMore" class="albums_load_more shortcode_button btn_normal btn_type4">Load More</button>--}}
            </div>

        @include('guests.addon.book_now')
        </div>
    @push('scripts')
        <!-- Plugins -->
        <script src='{{ asset('assets/js/plugins/jquery.scrollTo.js') }}'></script>
        <script src='{{ asset('assets/js/plugins/jquery.swipebox.js') }}'></script>

        <!-- Gallery -->
        <script src='{{ asset('assets/js/gallery/jquery.gallery.swipebox.js') }}'></script>
        <script src='{{ asset('assets/js/gallery/jquery.gallery.isotope.min.js') }}'></script>
        <script src='{{ asset('assets/js/gallery/jquery.gallery.sorting.js') }}'></script>
{{--        <script src="{{ asset('assets/js/gallery/jquery.gallery.grid.js') }}"></script>--}}
{{--        <script src='{{ asset('assets/js/gallery/jquery.gallery.post.js') }}'></script>--}}

        <script>
            // Global variables used by your code
            var albums_grid = [],
                already_showed = 0,
                grid_container = jQuery('.portfolio_grid_isotope'),
                grid_post_per_page = parseInt(jQuery('.portfolio_grid_isotope').data('perload')) || 4; // fallback value

            // Listen for the Livewire event that updates the images
            window.addEventListener('updateAlbums', event => {
                // Update albums_grid with the new images data
                albums_grid = event.detail.images;
                // Optionally, reset the already_showed counter if you want to rebuild the grid:
                already_showed = 0;
                // (If you want to append only the new images, you can adjust this logic.)

                // Optionally, clear and reinitialize your grid container:
                grid_container.html('');
                // Then load the first batch
                loadNextBatch();
            });

            // Function to build and append the next batch of images
            function loadNextBatch() {
                var what_to_append = '',
                    allposts = albums_grid.length;

                if (already_showed >= allposts) {
                    jQuery('.albums_load_more').slideUp(300);
                } else {
                    // Calculate the index of the last item in this batch
                    var now_step = already_showed + grid_post_per_page - 1;
                    var limit = (now_step < allposts) ? now_step : (allposts - 1);

                    // Build the HTML for each new image
                    for (var i = already_showed; i <= limit; i++) {
                        var item = albums_grid[i],
                            thishref = (item.slide_type === 'video') ? item.src : item.img,
                            thisvideoclass = (item.slide_type === 'video') ? 'video_zoom' : '';

                        what_to_append += '\
<div class="portfolio_grid_item element anim_el loading ' + item.categ + '" data-category="' + item.categ + '">\
  <div class="portfolio_grid_item_wrapper">\
    <div class="img_block wrapped_img fs_port_item gallery_item_wrapper">\
      <img width="960" height="632" src="' + item.thmb + '" alt="' + item.title + '" />\
      <div class="gallery_fadder"></div>\
    </div>\
    <div class="portfolio_grid_content">\
      <div class="pgc_left_part">\
        <h6 class="portfolio_grid_title">' + item.title + '</h6>\
      </div>\
      <div class="pgc_right_part">\
        <div class="post_info">\
          <div class="post_share">\
            <a href="#">share</a>\
            <div class="share_wrap">\
              <ul>\
                <li><a target="_blank" href="https://twitter.com/intent/tweet?text=' + item.title + '&amp;url=' + item.url + '"><span class="icon-Twitter"></span></a></li>\
                <li><a target="_blank" href="https://www.facebook.com/share.php?u=' + item.url + '"><span class="icon-Facebook"></span></a></li>\
                <li><a target="_blank" href="https://pinterest.com/pin/create/button/?url=' + item.url + '&media=' + item.img + '"><span class="icon-Pinterest"></span></a></li>\
              </ul>\
            </div>\
          </div>\
        </div><!-- .post_info -->\
        <div class="clear"></div>\
      </div>\
      <div class="clear"></div>\
    </div>\
    <a href="' + thishref + '" class="portfolio_grid_href swipebox ' + thisvideoclass + '" title="' + item.title + '"></a>\
  </div><!-- .portfolio_grid_item_wrapper -->\
</div><!-- .portfolio_grid_item -->';

                        already_showed++;
                    }

                    // Convert the string HTML into jQuery elements and insert them into the grid using Isotope
                    var $newItems = jQuery(what_to_append);
                    grid_container.isotope('insert', $newItems, function() {
                        grid_container.ready(function() {
                            grid_container.isotope('reLayout');
                        });
                    });

                    // Adjust padding/margins if needed (using your data-pad attribute)
                    var set_pad = jQuery('.portfolio_grid_isotope').data('pad') || 0;
                    jQuery('.portfolio_grid_isotope').css({
                        'padding-left': set_pad,
                        'margin-top': '-' + set_pad
                    });
                    jQuery('.portfolio_grid_isotope').find('.portfolio_grid_item').css({
                        'padding-right': set_pad,
                        'padding-top': set_pad
                    });

                    // Optionally, trigger any animations
                    setTimeout("animateList()", 500);
                }

                // Re-layout the grid (with a couple of delays for best effect)
                grid_container.isotope("reLayout");
                setTimeout(function() {
                    grid_container.isotope("reLayout");
                }, 1500);
            }

            // Attach a click handler to the "Load More" button (if you’re using JS for loading more)
            jQuery(document).on("click", ".albums_load_more", function() {
                loadNextBatch();
            });

            // (Optional) Define your animateList() function or remove if not used.
            function animateList() {
                // Your animation code here (if needed)
            }
        </script>


        <!-- Init -->
        <script src='{{ asset('assets/js/theme.js') }}'></script>
    @endpush
@endsection

