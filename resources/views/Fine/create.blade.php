@extends('layouts.app-layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">اضافة جزاء</h4>
                    <p class="card-category">ادخال البيانات المطلوبة</p>
                </div>
                <div class="card-body">
                    <form action="{{route('fines.store')}}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">قيمة الجزاء</label>
                                    <input type="text" name="amount" value="{{old('amount')}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">السبب</label>
                                    <textarea name="reason"  class="form-control" required>{{old('reason')}}</textarea>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_label_single">
                                        اختر هيئة تعليمية
                                    </label>
                                    <select class="select2 form-control" id="id_label_single" name="school_id" required>
                                        @isset($schools)
                                            <option>اختر هيئة تعليمية</option>
                                        @endisset
                                        @foreach($schools as $school)

                                            <option value="{{$school->id}}">{{$school->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary pull-right" style="float: left;">اضافة جزاء</button>
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
