<div class="pre_footer">
    <div class="container">
        <div class="prefooter_wrapper">
            <div class="footer_widget">
                <div class="sidepanel widget_text">
                    <div class="textwidget">
                        <p>
                            <img src="assets/img/logo/logo.png" width="150" height="100" alt=""/>
                            <br/>{{ __($homePage['biography_footer']) }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="footer_widget">
                <div class="sidepanel widget_categories">
                    <h3 class="title">Categories</h3>
                    <ul>
                        @foreach($getTags as $tags)
                        <li class="cat-item cat-item-2">
                            <a href="{{ route('portfolio.others', $tags->id) }}">{{ $tags->name }}</a>
                        </li>
                        @endforeach
                            <li class="cat-item cat-item-2">
                                <a href="{{ route('about') }}">About Us</a>
                            </li>
                            <li class="cat-item cat-item-2">
                                <a href="{{ route('portfolio') }}">Portfolio</a>
                            </li>

                    </ul>
                </div>
            </div>

            <div class="footer_widget">
                <div class="sidepanel widget_text">
                    <h3 class="title">GET IN TOUCH</h3>
                    <div class="textwidget">
                        <div class="contact_info">
                            <div class="module_content">
                                <p>tel <a href="tel:{{ $homePage['phone1'] }}"></a>{{ $homePage['phone1'] }}</p>
                                @if($homePage['phone2'])
                                    <p>tel <a href="tel:{{ $homePage['phone2'] }}">{{ $homePage['phone2'] }}</a></p>
                                @endif

                                <span class="icon-Phone"></span>
                            </div>
                            <div class="module_content">
                                <p>{{ $homePage['address'] }}</p>
                                <span class="icon-Location"></span>
                            </div>
                            <div class="module_content">
                                <p>
                                    <a href="mailto:{{ $homePage['email1'] }}">{{ ucfirst($homePage['email1']) }}</a>
                                    @if($homePage['email2'])
                                        <a href="mailto:{{ $homePage['email2'] }}">{{ ucfirst($homePage['email2']) }}</a>
                                    @endif
                                </p>
                                <span class="icon-Mail"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
