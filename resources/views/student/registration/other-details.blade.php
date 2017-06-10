@extends('layouts.student')
@section('content')

<div class="content">
<div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editable Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{!! route('student.registration.post-other-details') !!}" >
            {!! csrf_field() !!}
            <input type="hidden" name="aadhaar_card_number" value="{!! $studentDetails['aadhaar_card_number'] !!}">
              <div class="box-body">
                <div class="form-group">
                  <label for="student_mobile_number">Student Mobile Number</label>
                  <input type="text" class="form-control" name="student_mobile_number" id="student_mobile_number" placeholder="Student Mobile Number" value="{!! $studentDetails['student_mobile_number'] !!}">
                </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="student_local_address">Local Address</label>
                  <textarea class="form-control" name="student_local_address" id="student_local_address" placeholder="Local Address" >{!! $studentDetails['student_local_address'] !!}</textarea>
                </div>
                <div class="form-group col-md-6">
                  <label for="student_local_address_district">District</label>
                  <input type="text" class="form-control" name="student_local_address_district" id="student_local_address_district" placeholder="District" value="{!! $studentDetails['student_local_address_district'] !!}">
                </div>
                <div class="form-group col-md-6">
                  <label for="student_local_address_state">State</label>
                  <input type="text" class="form-control" name="student_local_address_state" id="student_local_address_state" placeholder="State" value="{!! $studentDetails['student_local_address_state'] !!}">
                </div>
                 <div class="form-group col-md-6">
                  <label for="student_local_address_pin_code">Pin Code</label>
                  <input type="number" class="form-control" name="student_local_address_pin_code" id="student_local_address_pin_code" placeholder="Pin Code" value="{!! $studentDetails['student_local_address_pin_code'] !!}">
                </div>
                <div class="form-group col-md-6">
                  <label for="student_local_address_phone_number">Phone Number</label>
                  <input type="number" class="form-control" name="student_local_address_phone_number" id="student_local_address_phone_number" placeholder="Phone Number" value="{!! $studentDetails['student_local_address_phone_number'] !!}">
                </div>
              </div>
                <div class="row">
                <div class="form-group col-md-4">
                  <label for="fee_receipt_number">Fee Receipt Number</label>
                  <input required type="number" class="form-control" name="fee_receipt_number" id="fee_receipt_number" placeholder="Fee Receipt Number">
                </div>
                <div class="form-group col-md-4">
                  <label for="fee_receipt_date">Fee Receipt Date</label>
                  <input required type="date" class="form-control" name="fee_receipt_date" id="fee_receipt_date" placeholder="Fee Receipt Date">
                </div>
                 <div class="form-group col-md-4">
                  <label for="amount_deposited">Amount Deposited (Rs.)</label>
                  <input required type="number" class="form-control" name="amount_deposited" id="amount_deposited" placeholder="Amount Deposited  (Rs.)">
                </div>
                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
      </div>

</div>

@endsection
