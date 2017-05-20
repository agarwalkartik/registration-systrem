@extends('layouts.dialog')

@section('content')
    <p class="login-box-msg">Enter your Aadhaar Card Number</p>
        <form class="form-signin" method="POST" action="{!! route('student.registration.post-aadhaar-card') !!}" >
            {!! csrf_field() !!}

            <div class="form-group has-feedback">
                <input type="text" id="aadhaar_card_number" name="aadhaar_card_number" class="form-control" placeholder="Aadhaar Card Number" value="{{ old('aadhaar_card_number') }}" required autofocus/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Continue</button>
                </div><!-- /.col -->
            </div>
        </form>

@endsection
