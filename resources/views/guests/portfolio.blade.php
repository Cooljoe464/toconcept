@extends('layouts.guest')

@section('content')
    @push('styles')


    @endpush
    <div class="wrapper">
        <livewire:portfolio-view/>

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

