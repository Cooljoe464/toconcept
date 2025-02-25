@extends('layouts.guest')

@section('content')
    @push('styles')
        <!-- Google maps -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNm8iTBBSJr4h7dXOwqvw_8AbWIpw_sMo"></script>
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
                                            <h1>Contacts</h1>
                                        </div>
                                        <div class='row'>
                                            <div class='span12 first-module module_number_1 module_cont module_title'>
                                                <div class='module_inner style5'>
                                                    <div class='bg_title'>
                                                        <h2 class='headInModule'>CONTACT INFO</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .module_cont -->
                                        </div>
                                        <div class='row'>
                                            <div class='span6  module_number_2 module_cont contact_info module_html'>
                                                <div class='module_inner style6'>
                                                    <div class='module_content'>
                                                        <p>
                                                            {{ $homePage['address'] }}
                                                        </p>
                                                        <span class="icon-Location"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .module_cont -->
                                            <div class='span6  module_number_3 module_cont contact_info module_html'>
                                                <div class='module_inner style6'>
                                                    <div class='module_content'>
                                                        <p>tel: <a href="tel:{{ $homePage['phone1'] }}">{{ $homePage['phone1'] }}</a></p>
                                                        @if(!empty($homePage['phone2']))
                                                            <p>tel: <a href="tel:{{ $homePage['phone2'] }}"></a>{{ $homePage['phone2'] }}</p>
                                                        @endif
                                                        <span class="icon-Phone"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .module_cont -->
                                        </div>
                                        <div class='row'>
                                            <div class='span6  module_number_4 module_cont contact_info module_html'>
                                                <div class='module_inner style6'>
                                                    <div class='module_content'>
                                                        <p>General: <a href="mailto:{{ $homePage['email1'] }}">{{ $homePage['email1'] }}</a></p>
                                                        @if(!empty($homePage['email2']))
                                                        <p>Other: <a href="mailto:{{ $homePage['email2'] }}">{{ $homePage['email2'] }}</a></p>
                                                        @endif
                                                        <span class="icon-Mail"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .module_cont -->
                                            <div class='span6  module_number_5 module_cont  module_html'>
                                                <div class='module_inner style6'>
                                                    <div class='module_content'>
                                                        <ul class="social_icons">
                                                            @if(!empty($homePage['twitter']))
                                                                <li>
                                                                    <a title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                                                                </li>
                                                            @endif
                                                            @if(!empty($homePage['facebook']))
                                                                <li>
                                                                    <a title="Facebook" href="#"><i class="fa fa-facebook"></i></a>
                                                                </li>
                                                            @endif
                                                            @if(!empty($homePage['linkedin']))
                                                                <li>
                                                                    <a title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                                                                </li>
                                                            @endif
                                                            @if(!empty($homePage['instagram']))
                                                                <li>
                                                                    <a title="Instagram" href="#"><i class="fa fa-instagram"></i></a>
                                                                </li>
                                                            @endif
                                                            @if(!empty($homePage['tiktok']))
                                                                <li>
                                                                    <a title="Tiktok" href="#"><i class="fa fa-tiktok"></i></a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .module_cont -->
                                        </div>
                                        <div class='row'>
                                            <div class='span12 module_number_6 module_cont module_layer_slider'>
                                                <div class='module_inner style45'>
                                                    <div class='bg_title'>
                                                        <h2 class='headInModule'>BOOK NOW</h2>
                                                    </div>
                                                    <div class='module_content'>
                                                        <div role="form" class="contact_form" lang="en-US" dir="ltr">
                                                            <div class="screen-reader-response"></div>
                                                            <div id="note"></div>
                                                            <div id="fields">
                                                                <form id=""
                                                                      action="{{ route('send-mail') }}" method="post"
                                                                      class="contact-form-01">
                                                                    <div class="row">
                                                                        @csrf
                                                                        <div class="span4">
																			<span class="your-name">
																				<input type="text" name="name" value=""
                                                                                       size="40" aria-required="true"
                                                                                       aria-invalid="false"
                                                                                       placeholder="Your Name *"/>
																			</span>
                                                                        </div>
                                                                        <div class="span4">
																			<span class="your-email">
																				<input type="email" name="email"
                                                                                       value="" size="40"
                                                                                       aria-required="true"
                                                                                       aria-invalid="false"
                                                                                       placeholder="Your Email *"/>
																			</span>
                                                                        </div>
                                                                        <div class="span4">
																			<span class="your-phone">
																				<input type="tel" name="phone"
                                                                                       value="" size="40"
                                                                                       aria-required="true"
                                                                                       aria-invalid="false"
                                                                                       placeholder="Your Phone No *"/>
																			</span>
                                                                        </div>
                                                                        <div class="span12">
																			<span class="your-message">
																				<textarea name="message" cols="40"
                                                                                          rows="10" aria-invalid="false"
                                                                                          placeholder="Your Message"></textarea>
																			</span>
                                                                        </div>
                                                                    </div>
                                                                    <p>
                                                                        <input type="submit" value="Send message"/>
                                                                    </p>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .module_cont -->
                                        </div>
                                        <div class="clear"></div>
                                        <div class="row">
                                            <div class="span12">
                                                <div id="comments"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <!-- Map -->
        <div class="contacts_map">
            {!! $homePage['map_address'] !!}
        </div>
        <!-- Map End -->
    </div>

    @push('scripts')
        <script src='assets/js/plugins/jquery.jscrollpane.min.js'></script>
        <script src='assets/js/plugins/jquery.scrollTo.js'></script>
        <script src='assets/js/plugins/jquery.waypoint.js'></script>
        <script src="assets/js/plugins/jquery.slick.min.js"></script>
        <script src='assets/js/theme.js'></script>
    @endpush

@endsection
