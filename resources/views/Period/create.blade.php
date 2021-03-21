@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">اضافة دفعة</h4>
                    <p class="card-category">ادخال البيانات المطلوبة</p>
                </div>
                <div class="card-body">
                    <form action="{{route('periods.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">اسم الدفعة</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" required>
                                    @if($errors->has("name"))
                                        <small style="color: red">{{$errors->first('name')}}</small>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">النسبة المالية</label>
                                    <input type="text" name="financial_ratio" value="{{old('financial_ratio')}}" class="form-control" required>
                                    @if($errors->has("financial_ratio"))
                                        <small style="color: red">{{$errors->first('financial_ratio')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="bmd-label-floating">تبدأ من</label>
                                    <input type="text" name="start_at" value="{{old('start_at')}}" class="form-control datepicker" required>
                                    @if($errors->has("start_at"))
                                        <small style="color: red">{{$errors->first('start_at')}}</small>
                                    @endif


                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">

                                    <label class="bmd-label-floating">تنتهي عند</label>
                                    <input type="text" name="end_at" value="{{old('end_at')}}" class="form-control datepicker" required>
                                    @if($errors->has("end_at"))
                                        <small style="color: red">{{$errors->first('end_at')}}</small>
                                    @endif

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="control-label">أضف الهيئات التعليمية</label>

                                    <select class="select2 form-control select2-multiple" name="schools[]" multiple="multiple" data-placeholder="اختر الهيئات التعليمية">
                                        @foreach($schools as $i => $school)
                                            <option value="{{$school->id}}">{{$school->name}}</option>

                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right" style="float: left;">اضافة دفعة</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('inc-scripts')
    <script>

        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    </script>
@endsection





