<div class="module_line_trigger fw_block wall_wrap bg_cover dis-03" data-pad-top="44px">
    <div class='row'>
        <div class='span12  module_number_2 module_cont text-center module_title'>
            <div class='module_inner style5'>
                <div class='bg_title'>
                    <h2 class='headInModule style5-title'>PORTFOLIO'S</h2>
                </div>
            </div>
        </div>
        <!-- .module_cont -->
    </div>
    <div class='row'>
        <div class='span12  module_number_4 module_cont  module_portfolio'>
            <div class='module_inner style5'>
                <div class='portfolio_packery' data-filter-color="#474b52">
                    @foreach($portfolios as $index => $portfolio)
                        <div class="packery_item element {{ $portfolio->tags }} grid_item_width1" data-category="{{ $portfolio->tags }}">
                            <div class="packery_inner">
                                <div class="packery_img_block">
                                    <a target='_self' href="{{ route('portfolio') }}"
                                       class="packery_grid_href"></a>
                                    <img src="{{ Storage::url($portfolio->image) }}" alt=""/>
                                    <div class="packery_fadder"></div>
                                </div>
                                <div class="portfolio_grid_content">
                                    <div class="pgc_left_part">
                                        <h6 class="portfolio_grid_title"><a href="{{ route('portfolio') }}"
                                                                            target='_self'>{{ $portfolio->title }}</a>
                                        </h6>
                                    </div>

                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- .module_cont -->
    </div>
</div>
