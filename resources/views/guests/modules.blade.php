@extends('layouts.guest')

@section('content')

    @push('styles')


    @endpush
    <div class="wrapper">
        <div class="container">
            <div class="page_title">
                <h1>FAQ'S</h1>
            </div>
            <div class="content_block row no-sidebar">
                <div class="fl-container">
                    <div class="posts-block">
                        <div class="contentarea">
                            <div class='row'>
                                <div class='span6 first-module module_number_1 module_cont  module_accordion'>
                                    <div class='module_inner style31'>
                                        <div class='bg_title'>
                                            <h2 class='headInModule'>FAQ'S</h2>
                                        </div>
                                        <div class='shortcode_accordion_shortcode accordion'>
                                            @foreach($Faq as $index => $faq)
                                                <h6 data-count='{{ $index }}'
                                                    class='shortcode_accordion_item_title @if($index == 0) expanded_yes @endif '>{{ $faq->question }}
                                                    <span class='ico'></span>
                                                </h6>
                                                <div class='shortcode_accordion_item_body'>
                                                    <div class='ip'>
                                                        <p>{{ $faq->answer }}</p>
                                                    </div>
                                                </div>
                                            @endforeach



                                        </div>
                                    </div>
                                </div>
                                <!-- .module_cont -->
                                <div class='span6  module_number_2 module_cont  module_text_area'>
                                    <div class='module_inner style5'>
                                        <div class='module_content'>

                                        </div>
                                    </div>
                                </div>
                                <!-- .module_cont -->
                            </div>


                            <div class='row'>
                                <div class='span12  module_number_8 module_cont  module_partners'>
                                    <div class='module_inner style19'>
                                        <div class='bg_title'>
                                            <h2 class='headInModule'>CLIENTS</h2>
                                        </div>
                                        <div class="module_content sponsors_works items4">
                                            <ul>
                                                @foreach($Clients as $client)
                                                    <li>
                                                        <div class="item_wrapper">
                                                            <div class="item">
                                                                <a href='{{ !empty($client->link) ? $client->link : '' }}' target='_blank'>
                                                                    <img src="{{ Storage::url($client->photos, env('SECURE_ASSETS')) }}" alt=""
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

                            @include('guests.addon.book_now')

                            <div class="row">
                                <div class="span12">
                                    <div id="comments"></div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src='assets/js/plugins/jquery.scrollTo.js'></script>
        <script src='assets/js/plugins/jquery.swipebox.js'></script>
        <script src='assets/js/gallery/jquery.gallery.post.js'></script>
        <script src='assets/js/plugins/jquery.waypoint.js'></script>
        <script src='assets/js/plugins/jquery.slick.min.js'></script>
        <script src='assets/js/plugins/jquery.isotope.min.js'></script>
        <script src='assets/js/theme.js'></script>
    @endpush

@endsection



