<div class="module_line_trigger fw_block wall_wrap bg_cover dis-03" data-pad-top="44px">
    <div class='row'>
        <div class='span12  module_number_2 module_cont text-center module_title'>
            <div class='module_inner style5'>
                <div class='bg_title'>
                    <h2 class='headInModule style5-title'><u> OUR PORTFOLIO'S</u></h2>
                </div>
            </div>
        </div>
        <!-- .module_cont -->
    </div>
    <div class='row'>
        <div class='span12  module_number_4 module_cont  module_portfolio'>
            <div class='module_inner style5'>


                <div class="portfolio_grid port4cols" data-pad="30px" data-perload="12" data-ptf="id" data-demoserver="true"
                     data-showlikes="show" data-showshare="show" data-categs="">
                    <div class="portfolio_grid_isotope">
                        @foreach($portfolios as $portfolio)
                            <div class="portfolio_grid_item element {{ $portfolio->tags }}" data-category="{{$portfolio->tags}}">
                                <div class="portfolio_grid_item_wrapper">
{{--                                    <div class="img_block wrapped_img fs_port_item gallery_item_wrapper">--}}
                                        <img width="960" class="img2preload" height="632" src="{{ Storage::url($portfolio->image) }}"
                                             alt="{{ $portfolio->title }}"/>
                                        <div class="gallery_fadder"></div>
{{--                                    </div>--}}
                                </div>
                                <!-- .portfolio_grid_item_wrapper -->
                            </div>
                        @endforeach
                    </div>
                    <!-- .portfolio_grid_isotope -->
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- .module_cont -->
    </div>
</div>
