@extends('layouts.guest')

@section('content')

    @push('styles')
        <style>
            .rs-background-video-layer {
                pointer-events: none !important;
            }

        </style>
    @endpush

    <div class="wrapper">
        <div class="container">
            <div class="content_block row no-sidebar">
                <div class="fl-container">
                    <div class="posts-block">
                        <div class="contentarea">


                            <div class='row'>
                                <div class='span12 first-module module_number_1 module_cont  module_layer_slider'>
                                    <div class='module_inner style5'>
                                        <div class='module_content'>
                                            <div id="rev_slider_1_1_wrapper"
                                                 class="rev_slider_wrapper fullscreen-container rv-01"
                                                 data-source="gallery">
                                                <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
                                                <div id="rev_slider_1_1" class="rev_slider fullscreenbanner style4"
                                                     data-version="5.4.1">
                                                    <ul>
                                                        <!-- SLIDE  -->
                                                        <li data-index="rs-1" data-transition="3dcurtain-horizontal"
                                                            data-slotamount="default" data-hideafterloop="0"
                                                            data-hideslideonmobile="off" data-easein="default"
                                                            data-easeout="default" data-masterspeed="default"
                                                            data-thumb="assets/img/fullscreen1.jpg"
                                                            data-rotate="0"
                                                            data-saveperformance="on" data-title="Slide"
                                                            data-description="">

                                                            <!-- YOUTUBE VIDEO BACKGROUND -->
                                                            <div class="rs-background-video-layer rev-slidebg"
                                                                 data-bgposition="center center"
                                                                 data-bgfit="cover"
                                                                 data-bgrepeat="no-repeat"
                                                                 data-bgparallax="off"
                                                                 data-no-retina
                                                                 data-forcerewind="on"
                                                                 data-volume="mute"
                                                                 data-videowidth="100%"
                                                                 data-videoheight="100%"
                                                                 data-ytid="{{ $homePage->video_id }}"
                                                                 data-videoloop="loop"
                                                                 data-forceCover="1"
                                                                 data-aspectratio="16:9"
                                                                 data-autoplay="true"
                                                                 data-videoattributes="controls=0&showinfo=0&rel=0&autoplay=1&mute=1&loop=1&disablekb=1">
                                                            </div>

                                                            <div class="packery_fadder"></div>
                                                        </li>
                                                    </ul>
                                                    <div class="tp-bannertimer tp-bottom dis-02"></div>
                                                </div>
                                            </div>
                                            <!-- END REVOLUTION SLIDER -->
                                        </div>
                                    </div>
                                </div>
                                <!-- .module_cont -->
                            </div>

                            <div class="module_line_trigger fw_block bg_cover module_cont-01" data-pad-top="0px">
                                <div class='row'>
                                    <div class='span12 module_number_2 module_cont  module_text_area'>
                                        <div class='module_inner module_cont-02'>
                                            <div class='module_content'>
                                                <p class="module_cont-03">
                                                    <img class="module_cont-03-img"
                                                         src="{{ asset('assets/img/logo/logo_black.png', env('secure_assets')) }}"
                                                         alt=""
                                                         width="200" height="100"/>
                                                </p>
                                                <p class="module_cont-04"></p>
                                                <p class="welcome_text module_cont-05">
                                                    {{ $homePage->biography_home }}
                                                </p>
                                                <p class="module_cont-06">
                                                    <a href="#book_shoot"
                                                       class="hasIcon shortcode_button btn_normal btn_type19"><i
                                                            class="icon-none"></i>get in touch</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .module_cont -->
                                </div>
                            </div>

                            @include('guests.addon.portfolio-mini')

                            <!-- Our Clients -->
                            <div class="module_line_trigger fw_block bg_cover  dis-05" data-pad-top="50px">
                                <div class='row'>
                                    <div class='span12  module_number_2 module_cont text-center module_title'>
                                        <div class='module_inner style5'>
                                            <div class='bg_title'>
                                                <h2 class='headInModule style5-title'><u>OUR AWESOME CLIENTS</u></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .module_cont -->
                                </div>
                                <div class='row'>
                                    <div class='span12  module_number_9 module_cont  module_partners'>
                                        <div class='module_inner style30'>
                                            <div class="module_content sponsors_works items4">
                                                <ul>
                                                    @foreach($Clients as $client)
                                                        <li>
                                                            <div class="item_wrapper">
                                                                <div class="item">
                                                                    <a href='{{ !empty($client->link) ? $client->link : '#' }}'
                                                                       target='_blank'>
                                                                        <img
                                                                            src="{{ Storage::url($client->photos, env('SECURE_ASSETS')) }}"
                                                                            alt=""
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
                                    <!-- .module_cont -->
                                </div>
                            </div>

                            @include('guests.addon.book_now')

                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    @push('scripts')

        <!-- Slider Revolution Video Extension -->
        {{--        <script src="https://cdn.jsdelivr.net/npm/revolution/js/extensions/revolution.extension.video.min.js"></script>--}}



        <!-- Revolution slider -->
        <script src='assets/js/revslider/jquery.themepunch.revolution.min.js'></script>
        <script src='assets/js/revslider/jquery.themepunch.tools.js'></script>


        <script type="text/javascript"
                src="assets/js/revslider/extensions/revolution.extension.video.min.js"></script>

        <script type="text/javascript"
                src="assets/js/revslider/extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript"
                src="assets/js/revslider/extensions/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript"
                src="assets/js/revslider/extensions/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript"
                src="assets/js/revslider/extensions/revolution.extension.parallax.min.js"></script>
        <script src="assets/js/revslider/rvstart.js"></script>

        <script>
            jQuery("#rev_slider_1_1").revolution({
                sliderType: "standard",
                jsFileLocation: "assets/js/revslider/", // Ensure this is the correct directory
                sliderLayout: "fullscreen",
                extensions: "extensions/", // Ensures extensions load from this path
                video: {
                    disablekb: "on",
                    controls: "none",
                    mute: "on",
                    startAt: 0,
                    autoplay: true,

                },
            });

            document.addEventListener("DOMContentLoaded", function() {
                let youtubeIframe = document.querySelector("iframe");
                if (youtubeIframe) {
                    youtubeIframe.style.pointerEvents = "none"; // Ensures no interaction
                }
            });
        </script>

        <!-- Gallery -->
        <script src='assets/js/gallery/jquery.gallery.swipebox.js'></script>
        <script src='assets/js/gallery/jquery.gallery.isotope.min.js'></script>
        <script src='assets/js/gallery/jquery.gallery.sorting.js'></script>

        <script src='assets/js/plugins/jquery.swipebox.js'></script>

        <script src='assets/js/plugins/jquery.scrollTo.js'></script>
        <script src='assets/js/plugins/jquery.waypoint.js'></script>
        <script src="assets/js/plugins/jquery.slick.min.js"></script>
        <script src='assets/js/plugins/jquery.fs.gallery.js'></script>
        {{--        <script src='https://player.vimeo.com/api/player.js'></script>--}}
        <script src='assets/js/theme.js'></script>

    @endpush

@endsection
