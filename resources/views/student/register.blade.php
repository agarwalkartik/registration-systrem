@extends('layouts.master')


@section('content')
@endsection

@section('body_bottom')
    <!-- Select2 4.0.0 -->
    <script src="{{ asset ("/bower_components/admin-lte/select2/js/select2.min.js") }}" type="text/javascript"></script>

    <!-- Select2 js -->
    @include('partials._body_bottom_select2_js_role_search')
    @include('partials._body_bottom_select2_js_user_settings')
    @include('partials._body_bottom_submit_user_edit_form_js')
@endsection
