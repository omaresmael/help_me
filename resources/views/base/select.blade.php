@section('style')
    <link rel="stylesheet" href="{{asset('assets/select/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/select/custom.css')}}">
@append
@section('script_head')
    <script data-pagespeed-no-defer src="{{ asset('assets/select/bootstrap-select.min.js') }}"></script>
    <script data-pagespeed-no-defer src="{{ asset('assets/select/select.js') }}"></script>
@append

