<div>
    <div class="portfolio_grid_wrapper albums_grid_wrapper without_title show_album_content">
        <div class="filter_block">
            <!--Remove This when using the option single-->
            <ul id="options" class="splitter">
                <li>
                    <ul class="optionset" data-option-key="filter">
                        <li class="selected">
                            <a href="" data-option-value="*">All</a>
                        </li>
                        @foreach($tags as $tag)
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
                @foreach($Portfolios as $portfolio)
                    <div class="portfolio_grid_item element {{ $portfolio->tags }}" data-category="{{$portfolio->tags}}">
                        <div class="portfolio_grid_item_wrapper">
                            <div class="img_block wrapped_img fs_port_item gallery_item_wrapper">
                                <img width="960" class="img2preload" height="632" src="{{ Storage::url($portfolio->image) }}"
                                     alt="{{ $portfolio->title }}"/>
                                <div class="gallery_fadder"></div>
                            </div>
                            <div class="portfolio_grid_content">
                                <div class="pgc_left_part">
                                    <h6 class="portfolio_grid_title">{{ $portfolio->title }}</h6>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <a href="{{ Storage::url($portfolio->image) }}" class="portfolio_grid_href swipebox "
                               title="{{ $portfolio->title }}"></a>
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
</div>

