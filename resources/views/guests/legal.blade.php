@extends('layouts.guest')

@section('content')
    @push('styles')

    @endpush

    <div class="wrapper">
        <div class="container ">

            <div class="page_title">
                <h1>Legal</h1>
            </div>

            <div class="content_block row no-sidebar">
                <div class="fl-container ">
                    <div class="posts-block ">
                        <div class="contentarea">

                            <div class='row'>
                                <div class='span12 module_number_3 module_cont  module_title'>
                                    <div class='module_inner style42'>
                                        <div class='bg_title'>
                                            <h2 class='headInModule bg_title-title'><u>Terms and Client Agreement</u>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- .module_cont -->
                            </div>
                            <div class='row'>
                                <div class='span12  module_number_4 module_cont  module_text_area'>
                                    <div class='module_inner module-block'>
                                        <div class='module_content'>
                                            <p class="large-text"><a href="#">Temporibus autem</a> quibusdam et aut
                                                officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates
                                                repudian sint et molestiae non recusandae. Itaque earum rerum hic.
                                                Morbis vene nisi sed enim vulputate, nec eleifend ex imperdiet.</p>
                                            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum
                                                necessitatibus saepe eveniet ut et voluptates repudian sint et molestiae
                                                non recusandae. Itaque earum rerum hic. Morbis vene nisi sed enim
                                                vulputate, nec eleifend ex imperdiet. Donec vitae sapien hendrerit mole.
                                                Nullam sem dui, faucibus vel vulputate sed, sodales vel leo. Se ornare
                                                nibh faucibus eros ullamcorper dic.</p>
                                            <p class="small-text">Temporibus autem quibusdam et aut officiis debitis aut
                                                rerum necessitatibus saepe eveniet ut et voluptates repudian sint et
                                                molestiae non recusandae. Itaque earum rerum hic. Morbis vene nisi sed
                                                enim vulputate, nec eleifend ex imperdiet. Donec vitae sapien hendrerit
                                                mole. Nullam sem dui, faucibus vel vulputate sed, sodales vel leo. Se
                                                ornare nibh faucibus eros ullamcorper dic. Temporibus autem quibusdam et
                                                aut officiis debitis aut rerum necessitatibus.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- .module_cont -->
                            </div>
                            <div class='row'>
                                <div class='span12  module_number_5 module_cont  module_title'>
                                    <div class='module_inner style42'>
                                        <div class='bg_title'>
                                            <h2 class='headInModule bg_title-title'><u>Booking and Cancellation
                                                    Policy</u></h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- .module_cont -->
                            </div>
                            <div class='row'>
                                <div class='span12  module_number_6 module_cont  module_text_area'>
                                    <div class='module_inner module-block2'>
                                        <div class='module_content'>
                                            <p><span class='highlighted_colored'>Temporibus autem quibusdam</span> et
                                                aut officiis debitis aut rerum necessitatibus saepe eveniet ut et
                                                voluptates repudian sint et molestiae non recusandae. Itaque earum rerum
                                                hic. Morbis vene nisi sed enim vulputate, nec eleifend ex imperdiet.
                                                Donec vitae sapien hendrerit mole.
                                                <br/>Nullam sem dui, faucibus vel vulputate sed, sodales vel leo. Se
                                                ornare nibh faucibus eros ullamcorper dic.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- .module_cont -->
                            </div>

                         @include('guests.addon.book_now')

                            <div class="clear"></div>
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
        <script src='assets/js/plugins/jquery.jscrollpane.min.js'></script>
        <script src='assets/js/plugins/jquery.scrollTo.js'></script>
        <script src='assets/js/plugins/jquery.waypoint.js'></script>
        <script src="assets/js/plugins/jquery.slick.min.js"></script>
        <script src='assets/js/theme.js'></script>
    @endpush

@endsection
