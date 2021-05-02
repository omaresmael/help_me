@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">اضافة سنة مالية</h4>
                    <p class="card-category">ادخال البيانات المطلوبة</p>
                </div>
                <div class="card-body">
                    <form action="{{route('financial_years.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">السنة</label>
                                    <input type="text" name="year" class="form-control" value="{{old('year')}}" id="validationCustom01"  autocomplete="off" required>
                                    @if($errors->has("year"))
                                        <small style="color: red">{{$errors->first('name')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">تبدأ من</label>
                                    <input type="text" name="start_at" value="{{old('start_at')}}" class="form-control datepicker_start" autocomplete="off" required placeholder="السنة"> 
                                    @if($errors->has("start_at"))
                                        <small style="color: red">{{$errors->first('start_at')}}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">

                                    <label class="bmd-label-floating">تنتهي عند</label>
                                    <input type="text" name="end_at" value="{{old('end_at')}}" class="form-control datepicker_end" autocomplete="off" style='top:1px;' required>
                                    @if($errors->has("end_at"))
                                        <small style="color: red">{{$errors->first('end_at')}}</small>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary pull-right" style="float: left;">اضافة سنة مالية</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('inc-scripts')
    <script>

    $('.datepicker_start').daterangepicker({
      autoClose:true,
      singleDatePicker: true,
      locale: {format: 'YYYY-MM-DD'},
      startDate:'2020-09-01',
      singleDate: true
      });
    $('.datepicker_end').daterangepicker({
      autoClose:true,
      singleDatePicker: true,
      locale: {format: 'YYYY-MM-DD'},
      startDate:'2021-06-30',
      singleDate: true
      }); 
    </script>
@endsection
